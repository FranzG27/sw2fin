@extends('templates.login')

@section('titulo')
    Donador
@endsection

@section('formulario')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('donors.login') }}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <!-- ... -->
        <!-- Display Error Messages -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!-- End Error Messages -->
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-4">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
        </div>

        <div class="row mb-3">
            <label for="inputPhoto" class="col-sm-2 col-form-label">Foto de su rostro</label>
            <div class="col-sm-10">
                
                <video id="videoElement" style="max-width: 100%;"></video>
                <input type="hidden" id="photo-data" name="photo_data">
                    <canvas id="photo-preview" style="display: none;"></canvas>
                
                    <button type="button" class="btn btn-primary" onclick="capturePhoto('inputPhoto', 'photo-data', 'photo-preview')">Capturar</button>
            </div>
        </div>

        <input type="hidden" id="photo-data" name="photo">

        <div class="row mb-3">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <img id="captured-photo" style="display: none; max-width: 300px; max-height: 225px;">
            </div>
        </div>

        <div class="form-floating mb-4">
            <input type="submit" class="btn btn-primary py-3 w-100 mb-4" value="Iniciar Sesion" />
        </div>
        <!-- ... -->
    </form>

    <script>
        // Get media devices
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(function (stream) {
                const videoElement = document.getElementById('videoElement');
                videoElement.srcObject = stream;
                videoElement.play();
            })
            .catch(function (error) {
                console.error('Error accessing media devices', error);
            });

        // Add an event listener to the capture button
        function capturePhoto() {
            const videoElement = document.getElementById('videoElement');
            const canvas = document.getElementById('photo-preview');
            const dataInput = document.getElementById('photo-data');
            const capturedPhoto = document.getElementById('captured-photo');

            // Set canvas dimensions to match the video stream
            canvas.width = videoElement.videoWidth;
            canvas.height = videoElement.videoHeight;

            // Draw video frame onto the canvas
            const context = canvas.getContext('2d');
            context.drawImage(videoElement, 0, 0, canvas.width, canvas.height);

            // Get the image data as base64 string
            const imageData = canvas.toDataURL('image/jpeg');

            // Store the image data in the hidden input field
            dataInput.value = imageData;

            // Show the canvas with the captured photo
            //canvas.style.display = 'block';
            // Show the captured photo below the live video
            capturedPhoto.src = imageData;
            capturedPhoto.style.display = 'block';
        }
    </script>
@endsection