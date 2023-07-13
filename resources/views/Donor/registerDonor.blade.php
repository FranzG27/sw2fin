<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Registrar Donador</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('plantilla/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('plantilla/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('plantilla/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('plantilla/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <h1>Crear Donante</h1>
                        <div class="bg-secondary rounded h-100 p-4">
                            <form method="POST" action="{{route('donors.register')}}" enctype="multipart/form-data">
                                @csrf
                                @method('POST')

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

                                <div class="row mb-3">
                                    <label for="inputFullName" class="col-sm-2 col-form-label">Nombre Completo</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputFullName" name="fullName"
                                            value="{{ old('fullName') }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Correo Electrónico</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" name="email"
                                            value="{{ old('email') }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Contraseña</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword" name="password">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputCi" class="col-sm-2 col-form-label">CI</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputCi" name="ci"
                                            value="{{ old('ci') }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputBirthdate" class="col-sm-2 col-form-label">Fecha de Nacimiento</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="inputBirthdate" name="birthdate"
                                            value="{{ old('birthdate') }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputCellphone" class="col-sm-2 col-form-label">Teléfono</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputCellphone" name="cellphone"
                                            value="{{ old('cellphone') }}">
                                    </div>
                                </div>
                                <center><a href="">SE DEBE USAR LA MISMA OPCION DE CAPTURAR O SUBIR FOTO PARA AMBAS FOTOS</a></center>
                                <div class="row mb-3">
                                    <label for="inputPhoto1" class="col-sm-2 col-form-label">Foto de su rostro</label>
                                    <div class="col-sm-10">
                                        <video id="videoElement" style="max-width: 100%;"></video>
                                        <input type="hidden" id="photo1-data" name="photo1_data">
                                        <canvas id="photo1-preview" style="display: none;"></canvas>
                                        <input type="file" accept="image/*" id="inputPhoto1" name="photo1" style="display: none;">
                                        <button type="button" class="btn btn-primary" onclick="capturePhoto('inputPhoto1', 'photo1-data', 'photo1-preview')">Capturar</button>
                                        <button type="button" class="btn btn-primary" onclick="openFileInput('inputPhoto1')">Subir Foto</button>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputPhoto2" class="col-sm-2 col-form-label">Foto frontal de su carnet</label>
                                    <div class="col-sm-10">
                                        <video id="videoElement2" style="max-width: 100%;"></video>
                                        <input type="hidden" id="photo2-data" name="photo2_data">
                                        <canvas id="photo2-preview" style="display: none;"></canvas>
                                        <input type="file" accept="image/*" id="inputPhoto2" name="photo2" style="display: none;">
                                        <button type="button" class="btn btn-primary" onclick="capturePhoto('inputPhoto2', 'photo2-data', 'photo2-preview')">Capturar</button>
                                        <button type="button" class="btn btn-primary" onclick="openFileInput('inputPhoto2')">Subir Foto</button>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary">Crear Donante</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('plantilla/lib/chart/chart.min.js')}}"></script>
    <script src="{{asset('plantilla/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('plantilla/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('plantilla/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('plantilla/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('plantilla/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('plantilla/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('plantilla/js/main.js')}}"></script>
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

        navigator.mediaDevices.getUserMedia({ video: true })
            .then(function (stream) {
                const videoElement2 = document.getElementById('videoElement2');
                videoElement2.srcObject = stream;
                videoElement2.play();
            })
            .catch(function (error) {
                console.error('Error accessing media devices', error);
            });

        // Add an event listener to the capture button
        function capturePhoto(inputId, dataInputId, previewId) {
            const videoElement = document.getElementById('videoElement');
            const videoElement2 = document.getElementById('videoElement2');
            const canvas = document.getElementById(previewId);
            const context = canvas.getContext('2d');
            const fileInput = document.getElementById(inputId);
            const dataInput = document.getElementById(dataInputId);

            if (inputId === 'inputPhoto1') {
                context.drawImage(videoElement, 0, 0, canvas.width, canvas.height);
            } else if (inputId === 'inputPhoto2') {
                context.drawImage(videoElement2, 0, 0, canvas.width, canvas.height);
            }

            const imageData = canvas.toDataURL('image/jpeg');

            fileInput.value = '';
            dataInput.value = imageData;

            canvas.style.display = 'block';
        }

        function openFileInput(inputId) {
            document.getElementById(inputId).click();
        }

        // Preview the selected file
        function previewFile(inputId, previewId) {
            const fileInput = document.getElementById(inputId);
            const preview = document.getElementById(previewId);

            const file = fileInput.files[0];
            const reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
                preview.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        }

        // Add event listeners to file inputs
        document.getElementById('inputPhoto1').addEventListener('change', function () {
            previewFile('inputPhoto1', 'photo1-preview');
        });

        document.getElementById('inputPhoto2').addEventListener('change', function () {
            previewFile('inputPhoto2', 'photo2-preview');
        });
    </script>
</body>

</html>
