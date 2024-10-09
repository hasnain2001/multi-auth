<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employe Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('images/LaLzGo.png')}}" type="image/x-icon">
    <style>
        body {
            height: 80vh; 
             background: url({{ asset('images/teacher-login.png') }}) no-repeat center center; 
            background-size: cover; 
            backdrop-filter: blur(5px); 
        }

        .container {
            margin-top: 100px;
            max-width: 400px;
        }

        .card {
            padding: 30px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .form-label {
            font-weight: 600;
        }

        .show-password-icon {
            cursor: pointer;
            position: absolute;
            right: 15px;
            top: 37px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <h2 class="text-center mb-4">Employee Login</h2>

            <div class="mb-4" id="session-status">
                <!-- Session Status -->
            </div>

            <form method="POST" action="{{ route('employe.login') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" class="form-control" type="email" name="email" required autofocus autocomplete="username" />
                    <div class="invalid-feedback" id="email-error" style="display: none;">
                        Please provide a valid email.
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-3 position-relative">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                    <span class="show-password-icon" onclick="togglePasswordVisibility()">
                        <img id="toggle-password-icon" src="https://img.icons8.com/ios-glyphs/30/000000/invisible.png" alt="Show/Hide Password">
                    </span>
                    <div class="invalid-feedback" id="password-error" style="display: none;">
                        Please provide your password.
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="form-check mb-3">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label for="remember_me" class="form-check-label">Remember me</label>
                </div>

                <div class="d-grid gap-2">
                    {{-- <a class="text-muted" href="{{route('teacher.password.request')}}">Forgot your password?</a> --}}
                    <button type="submit" class="btn btn-primary">Log in</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Show/Hide Password Functionality
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.getElementById('toggle-password-icon');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.src = 'https://img.icons8.com/ios-glyphs/30/000000/visible.png'; // Change icon
            } else {
                passwordField.type = 'password';
                toggleIcon.src = 'https://img.icons8.com/ios-glyphs/30/000000/invisible.png'; // Revert icon
            }
        }

        // Example of displaying error messages dynamically
        const emailError = document.getElementById('email-error');
        const passwordError = document.getElementById('password-error');

        // Add logic here to show errors if needed
        // For demonstration, you can set these to display:
        // emailError.style.display = 'block';
        // passwordError.style.display = 'block';
    </script>
</body>

</html>
