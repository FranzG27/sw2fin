<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Aws\Rekognition\RekognitionClient;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreDonorRequest;
use App\Http\Requests\UpdateDonorRequest;
use Illuminate\Http\UploadedFile;

class DonorController extends Controller
{
    public function __construct()
    {
       $this->middleware('guest:donor');
    }


    public function loginView(){
        return view('Donor.auth.login');
    }

    public function index()
    {
        // $donors = Donor::all();
        // return view('Donor.index', compact('donors'));
        return view('Donor.index');
    }


    public function login(Request $request)
    {
        $validate = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
            'photo_data' => ['nullable'],
        ]);
    
        $donor = Donor::where('email', $request->email)->first();
    
        if (is_null($donor)) {
            return back()->withErrors(['error' => 'El Usuario no existe!']);
        }
    
        // Process and save the captured photo
        if ($request->filled('photo_data')) {
            $photoData = $request->input('photo_data');
            $photo = $this->convertBase64ToImage($photoData, 'photo');
        } else {
            $photo = null;
            return back()->withErrors(['error' => 'La foto no se cargo correctamente']);
        }
    
        // Retrieve the photo1 file from the donor's photo1 path
        $photo1file = $this->getImageFromFile($donor->photo1);
    
        if ($photo && !$this->compareFaces($photo, $photo1file)) {
            // Delete the temporary photo
            if ($photo && file_exists($photo)) {
                unlink($photo);
            }
    
            return back()->withErrors(['error' => 'La foto de la cara es incorrecta']);
        }
    
        if (Auth::guard('donor')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Delete the temporary photo
            if ($photo && file_exists($photo)) {
                unlink($photo);
            }
    
            return redirect()->route('donors.index');
        }
    
        // Delete the temporary photo
        if ($photo && file_exists($photo)) {
            unlink($photo);
        }
    
        return back()->withErrors(['error' => 'La contraseña es incorrecta']);
    }


private function getImageFromFile($imagePath)
{
    $file = file_get_contents($imagePath);
    if ($file === false) {
        return null;
    }

    $image = finfo_buffer(finfo_open(), $file, FILEINFO_MIME_TYPE);
    if (strpos($image, 'image/') === false) {
        return null;
    }

    $tmpFile = tempnam(sys_get_temp_dir(), 'image');
    if ($tmpFile === false) {
        return null;
    }

    file_put_contents($tmpFile, $file);
    $imageFile = new \Illuminate\Http\UploadedFile($tmpFile, basename($imagePath), $image);

    return $imageFile;
}

    
    public function menuView(){

        return view('Donor.index');
    }

    public function registerView()
    {
        return view('Donor.registerDonor');
    }

    
    

    public function register(Request $request)
    {
    $data = $request->validate([
        'fullName' => ['required'],
        'email' => ['required', 'email'],
        'password' => ['required'],
        'ci' => ['required'],
        'birthdate' => ['required'],
        'cellphone' => ['required'],
        'photo1' => ['nullable'],
        'photo2' => ['nullable'],
        'photo1_data' => ['nullable'],
        'photo2_data' => ['nullable'],
    ]);

    $data['password'] = Hash::make($request->password);

    // Process and save photo1, photo2
    if ($request->hasFile('photo1') && $request->hasFile('photo2')) {
        // File uploads
        $photo1 = $request->file('photo1');
        $photo2 = $request->file('photo2');
    } elseif ($request->filled('photo1_data') && $request->filled('photo2_data')) {
        // Base64-encoded images from webcam
        $photo1Data = $request->input('photo1_data');
        $photo2Data = $request->input('photo2_data');

        // Convert base64-encoded images to file format
        $photo1 = $this->convertBase64ToImage($photo1Data, 'photo1');
        $photo2 = $this->convertBase64ToImage($photo2Data, 'photo2');

        

    } else {
        $photo1 = null;
        $photo2 = null;
    }
        //dd($photo1); // Inspect the value of $photo1Data
        //dd($photo2Data); // Inspect the value of $photo2Data
    // Verify if photo2 is an ID
    // Implement your own logic here to verify if the photo is an ID
    if ($photo2 && !$this->verifyID($photo2)) {
        // Delete the temporary images
        if ($photo1 && file_exists($photo1)) {
            unlink($photo1);
        }
        if ($photo2 && file_exists($photo2)) {
            unlink($photo2);
        }
    
        return redirect()->back()->withErrors(['error' => 'la foto 2 no corresponde a una cedula de identidad.']);
    }
    
    // Compare faces in photo1 and photo2
    //if ($isID) {
    if ($photo1 && $photo2 && !$this->compareFaces($photo1, $photo2)) {
        // Delete the temporary images
        if ($photo1 && file_exists($photo1)) {
            unlink($photo1);
        }
        if ($photo2 && file_exists($photo2)) {
            unlink($photo2);
        }
    
        return redirect()->back()->withErrors(['error' => 'la persona en foto 1 y foto 2 no coincide.']);
    }
    //}
    
    if ($photo1 && $photo2) {
        $destinationPath = 'images/donors/';
        $filename1 = time() . '_photo1.jpg';
        $filename2 = time() . '_photo2.jpg';

        $uploadSuccess1 = $photo1->move($destinationPath, $filename1);
    $uploadSuccess2 = $photo2->move($destinationPath, $filename2);

    if ($uploadSuccess1 && $uploadSuccess2) {
        $data['photo1'] = $destinationPath . $filename1;
        $data['photo2'] = $destinationPath . $filename2;
    } else {
        // Delete the temporary images
        if ($photo1 && $photo1->getPathname()) {
            unlink($photo1->getPathname());
        }
        if ($photo2 && $photo2->getPathname()) {
            unlink($photo2->getPathname());
        }

        return redirect()->back()->withErrors(['error' => 'Error uploading images.']);
    }

        //dd($photo1); // Inspect the value of $photo1Data
    
        /*$uploadSuccess1 = move_uploaded_file($photo1, $destinationPath . $filename1);
        $uploadSuccess2 = move_uploaded_file($photo2, $destinationPath . $filename2);
    
        dd($uploadSuccess1);

        if ($uploadSuccess1 && $uploadSuccess2) {
            $data['photo1'] = $destinationPath . $filename1;
            $data['photo2'] = $destinationPath . $filename2;
        } else {
            // Delete the temporary images
            if ($photo1 && file_exists($photo1)) {
                unlink($photo1);
            }
            if ($photo2 && file_exists($photo2)) {
                unlink($photo2);
            }
    
            return redirect()->back()->withErrors(['error' => 'Error uploading images.']);
        }*/
    
        // Delete the temporary images
        if ($photo1 && file_exists($photo1)) {
            unlink($photo1);
        }
        if ($photo2 && file_exists($photo2)) {
            unlink($photo2);
        }
    }

    Donor::create($data);

    return redirect()->route('donors.index')->with('success', 'Donor created successfully.');
    }

    private function saveBase64Image($imageData, $name)
{
    if (preg_match('/^data:image\/(\w+);base64,/', $imageData, $type)) {
        $data = substr($imageData, strpos($imageData, ',') + 1);

        $type = strtolower($type[1]); // jpg, png, gif

        if (!in_array($type, ['jpg', 'jpeg', 'gif', 'png'])) {
            return false; // Invalid image type
        }

        $data = base64_decode($data);

        $tempPath = sys_get_temp_dir() . '/' . uniqid() . '.' . $type;

        if (file_put_contents($tempPath, $data)) {
            return $tempPath;
        }
    }

    return false;
}

private function convertBase64ToImage($base64Image, $imageName)
{
    // Extract image data and MIME type from base64 string
    list($mime, $data) = explode(';', $base64Image);
    list(, $data) = explode(',', $data);

    // Decode base64 data
    $data = base64_decode($data);

    // Determine file extension based on MIME type
    $extension = explode('/', $mime)[1];

    // Generate a unique filename
    $filename = $imageName . '_' . time() . '.' . $extension;

    // Specify the file path to save the image
    $filePath = 'images/' . $filename;

    // Save the image file to the storage disk
    Storage::disk('public')->put($filePath, $data);

    // Return an instance of UploadedFile
    return new UploadedFile(
        storage_path('app/public/' . $filePath),
        $filename,
        $mime,
        null,
        true
    );
}

    private function compareFaces($photo1, $photo2)
    {
        $rekognition = new RekognitionClient([
            'region' => env('AWS_DEFAULT_REGION'),
            'version' => 'latest',
            'credentials' => [
                'key' => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
        ]);

        $image1 = file_get_contents($photo1->getRealPath());
        $image2 = file_get_contents($photo2->getRealPath());

        $result = $rekognition->compareFaces([
            'SimilarityThreshold' => 80,
            'SourceImage' => ['Bytes' => $image1],
            'TargetImage' => ['Bytes' => $image2],
        ]);

        $faceMatches = $result['FaceMatches'];

        // Check if any faces were matched
        if (!empty($faceMatches)) {
            return true;
        }

        return false;
    }

    private function verifyID($photo)
{
    $rekognition = new RekognitionClient([
        'region' => env('AWS_DEFAULT_REGION'),
        'version' => 'latest',
        'credentials' => [
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
        ],
    ]);

    $image = file_get_contents($photo->getRealPath());

    $result = $rekognition->detectText([
        'Image' => ['Bytes' => $image],
    ]);

    $textDetections = $result['TextDetections'];

    // Check if any ID-related text is detected
    foreach ($textDetections as $textDetection) {
        $detectedText = $textDetection['DetectedText'];
        
        // Modify the conditions based on the ID text patterns you want to detect
        if (strpos($detectedText, 'ID') !== false || strpos($detectedText, 'Driver License') !== false) {
            return true; // ID verification successful
        }
    }

    return false; // ID verification failed
}
    

    public function edit(Donor $donor)
    {
        return view('Donor.edit', compact('donor'));
    }

    public function update(UpdateDonorRequest $request, Donor $donor)
{
    $validatedData = $request->validated();

    if ($request->hasFile('photo1')) {
        $photo1 = $request->file('photo1');
        $destinationPath = 'images/donors/';
        $filename = time() . '_' . $photo1->getClientOriginalName();
        $uploadSuccess = $request->file('photo1')->move($destinationPath, $filename);
        $image_name = $destinationPath . $filename;

        $validatedData['photo1'] = $image_name;
    }

    if ($request->hasFile('photo2')) {
        $photo2 = $request->file('photo2');
        $destinationPath = 'images/donors/';
        $filename = time() . '_' . $photo2->getClientOriginalName();
        $uploadSuccess = $request->file('photo2')->move($destinationPath, $filename);
        $image_name = $destinationPath . $filename;

        $validatedData['photo2'] = $image_name;
    }

    $donor->update($validatedData);

    return redirect()->route('donors.index')->with('success', 'Donor updated successfully.');
}

public function destroy(Donor $donor)
{
    $donor->delete();
    return redirect()->route('donors.index')->with('success', 'Donor deleted successfully.');
}
}