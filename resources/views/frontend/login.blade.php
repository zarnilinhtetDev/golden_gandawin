<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<style>
    .btn-color {
        background-color: #FEAC00;
        color: #fff;

    }

    .profile-image-pic {
        height: 100px;
        width: 100px;
        object-fit: cover;
    }

    body {
        background-image: url('{{ asset('image/12554.jpg') }}');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .cardbody-color {
        background-color: #0C0C0C;

    }

    a {
        text-decoration: none;
    }
</style>

<body>


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3 ">
                {{-- <h2 class="text-center text-dark mt-5">Login Form</h2> --}}

                <div class="card my-5 " style="border-color: black">

                    <form class="card-body cardbody-color p-lg-5 " method="POST" action="{{ route('admin. login') }}">
                        @csrf
                        <div class="text-center ">
                            <img src="{{ asset('logo.png') }}" alt="" width="200px">
                        </div>

                        <div class="mb-3 mt-4">
                            <input type="email" class="form-control" id="Username" aria-describedby="emailHelp"
                                placeholder=" Email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" placeholder=" Password"
                                name="password" value="{{ old('password') }}">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="text-center"><button type="submit"
                                class="btn btn-color px-5 mb-5 w-100">Login</button></div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    </form>
</body>

</html>
