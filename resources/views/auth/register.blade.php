<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register | Management Perpustakaan</title>

    <!-- MDBootstrap -->
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://use.fontawesome.com/releases/v6.0.0/css/all.css">

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            min-height: 100vh;

            background:
                linear-gradient(
                    rgba(10, 43, 45, 0.78),
                    rgba(10, 43, 45, 0.88)
                ),
                url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?q=80&w=2000&auto=format&fit=crop')
                center/cover no-repeat;
        }

        .register-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 35px 15px;
        }

        /* Glassmorphism */
        .register-card {
            width: 100%;
            max-width: 470px;
            padding: 38px;
            border-radius: 24px;

            background: rgba(255, 255, 255, 0.13);

            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);

            border: 1px solid rgba(255, 255, 255, 0.25);

            box-shadow:
                0 20px 50px rgba(0, 0, 0, 0.30);

            color: white;
        }

        .library-icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 15px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 18px;

            background: rgba(255, 255, 255, 0.16);

            border: 1px solid rgba(255, 255, 255, 0.25);

            font-size: 27px;
        }

        .register-title {
            text-align: center;
            font-size: 27px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .register-subtitle {
            text-align: center;
            color: rgba(255, 255, 255, 0.75);
            margin-bottom: 28px;
            font-size: 14px;
        }

        .form-label {
            color: white !important;
        }

        .form-outline input {
            color: white !important;

            border-color:
                rgba(255, 255, 255, 0.45) !important;

            background:
                rgba(255, 255, 255, 0.08) !important;
        }

        .form-outline input:focus {
            border-color: white !important;
        }

        .form-outline .form-control:focus ~ .form-label,
        .form-outline .form-control.active ~ .form-label {
            color: white !important;
        }

        .register-button {
            width: 100%;

            border: none;
            border-radius: 12px;

            padding: 13px;

            background: rgba(255, 255, 255, 0.92);

            color: #163b3d;

            font-weight: 700;
            font-size: 15px;

            transition: 0.3s ease;
        }

        .register-button:hover {
            transform: translateY(-2px);

            background: white;

            box-shadow:
                0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .error-message {
            color: #ffd6d6;
            font-size: 13px;
            margin-top: -12px;
            margin-bottom: 15px;
        }

        .login-link {
            text-align: center;
            margin-top: 22px;

            color: rgba(255, 255, 255, 0.75);

            font-size: 14px;
        }

        .login-link a {
            color: white;
            font-weight: 600;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .copyright {
            text-align: center;

            color: rgba(255, 255, 255, 0.55);

            font-size: 12px;

            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="register-wrapper">

        <div class="register-card">

            <!-- Icon -->
            <div class="library-icon">
                <i class="fas fa-book-open"></i>
            </div>

            <!-- Title -->
            <h1 class="register-title">
                Buat Akun
            </h1>

            <p class="register-subtitle">
                Daftar untuk mengakses Management Perpustakaan
            </p>

            <!-- Register Form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="form-outline mb-4">
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        autocomplete="name"
                    >

                    <label class="form-label" for="name">
                        Nama
                    </label>
                </div>

                @error('name')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror


                <!-- Email -->
                <div class="form-outline mb-4">
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        required
                        autocomplete="username"
                    >

                    <label class="form-label" for="email">
                        Email
                    </label>
                </div>

                @error('email')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror


                <!-- Password -->
                <div class="form-outline mb-4">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control"
                        required
                        autocomplete="new-password"
                    >

                    <label class="form-label" for="password">
                        Password
                    </label>
                </div>

                @error('password')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror


                <!-- Confirm Password -->
                <div class="form-outline mb-4">
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="form-control"
                        required
                        autocomplete="new-password"
                    >

                    <label
                        class="form-label"
                        for="password_confirmation"
                    >
                        Konfirmasi Password
                    </label>
                </div>


                <!-- Register Button -->
                <button
                    type="submit"
                    class="register-button"
                >
                    <i class="fas fa-user-plus me-2"></i>
                    Daftar
                </button>

            </form>


            <!-- Login Link -->
            <div class="login-link">
                Sudah punya akun?
                <a href="{{ route('login') }}">
                    Masuk di sini
                </a>
            </div>


            <div class="copyright">
                © {{ date('Y') }} Management Perpustakaan
            </div>

        </div>

    </div>


    <!-- MDBootstrap JS -->
    <script src="{{ asset('js/mdb.umd.min.js') }}"></script>

</body>

</html>