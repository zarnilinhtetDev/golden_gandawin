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
        background-color: #0e1c36;
        color: #fff;

    }

    .profile-image-pic {
        height: 100px;
        width: 100px;
        object-fit: cover;
    }



    .cardbody-color {
        background-color: #ebf2fa;
    }

    a {
        text-decoration: none;
    }
</style>

<body>


    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 ">
                <h2 class="text-center text-dark mt-5">Login Form</h2>

                <div class="card my-5 ">

                    <form class="card-body cardbody-color p-lg-5 " method="POST" action="{{ route('admin. login') }}">
                        @csrf
                        <div class="text-center">
                            <img src="https://png.pngtree.com/png-vector/20191125/ourmid/pngtree-beautiful-admin-roles-line-vector-icon-png-image_2035379.jpg"
                                class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="150px"
                                alt="profile">

                        </div>

                        <div class="mb-3">
                            <input type="email" class="form-control" id="Username" aria-describedby="emailHelp"
                                placeholder="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" placeholder="password"
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
