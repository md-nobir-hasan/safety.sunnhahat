<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Company Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


<body>


    {{-- <div class="container">
        <div class="brand-logo"></div>
        <div class="company-details text-center">
            <h1>Login</h1>
        </div> --}}

    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5">

                            <h1 class="mb-5 text-center">Sign in</h1>
                            <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="typeEmailX-2">Email</label>
                                    <input name="email" type="email" id="typeEmailX-2"
                                        class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="typePasswordX-2">Password</label>
                                    <input name="password" type="password" id="typePasswordX-2"
                                        class="form-control form-control-lg" />
                                </div>

                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <a href="#">MADE BY Nobir</a> --}}
    {{-- </div> --}}

</body>

</html>



{{-- <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="inputs tab" id="tab-1">

        <label>E-Mail
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Inter your email" />
        </label>

        <label>Password
            <input type="password" name="password" value="{{ old('password') }}" />
        </label>


        <div class="row">
            <div class="col-sm-6 text-right">
                <button class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</form> --}}
