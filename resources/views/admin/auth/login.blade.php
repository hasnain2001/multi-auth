<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh; 
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center; 
            align-items: center; 
            background: url({{ asset('images/admin-login.jpg') }}) no-repeat center center; 
            background-size: cover; 
            backdrop-filter: blur(5px); 
        }

        .container {
            background-color: rgba(255, 255, 255, 0.3); /* Transparent background */
            border-radius: 15px;
            padding: 30px;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); /* Box shadow */
        }

        .card {
            border: none;
            background-color: transparent;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
            font-weight: bold;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.6); /* Semi-transparent inputs */
            border: none;
            box-shadow: none;
        }

        .form-control:focus {
            box-shadow: none;
            border: 1px solid #007bff;
        }

        .btn-primary {
            width: 100%;
            background-color: #007bff;
            border: none;
            padding: 10px;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .form-check-label, .text-muted {
            color: #333;
        }

        .form-check-input:checked {
            background-color: #007bff;
        }

        .invalid-feedback {
            color: red;
            display: none;
        }

        a.text-muted {
            color: #007bff;
            text-decoration: none;
        }

        a.text-muted:hover {
            text-decoration: underline;
        }

        .show-password {
            display: flex;
            align-items: center;
        }

        .show-password input {
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Admin Login</h2>
            <div class="mb-4" id="session-status">
                <!-- Session Status -->
            </div>

            <form id="loginForm" method="POST" action="{{ route('admin.login') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" 
                           class="form-control" 
                           type="email" 
                           name="email" 
                           required autofocus 
                           autocomplete="username" />
                    <div class="invalid-feedback" id="email-error">
                        Please provide a valid email.
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" 
                           class="form-control" 
                           type="password" 
                           name="password" 
                           required 
                           autocomplete="current-password" />
                    <div class="invalid-feedback" id="password-error">
                        Please provide your password.
                    </div>

                    <!-- Show/Hide Password Checkbox -->
                    <div class="show-password">
                        <input type="checkbox" id="togglePassword">
                        <label for="togglePassword">Show Password</label>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="form-check mb-3">
                    <input id="remember_me" 
                           type="checkbox" 
                           class="form-check-input" 
                           name="remember">
                    <label for="remember_me" class="form-check-label">Remember me</label>
                </div>

                <div class="d-flex justify-content-between">
                    <a class="text-muted" href="/password/request">Forgot your password?</a>
                    <button type="submit" class="btn btn-primary">Log in</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const emailError = document.getElementById('email-error');
        const passwordError = document.getElementById('password-error');
        const togglePassword = document.getElementById('togglePassword');
        const loginForm = document.getElementById('loginForm');

        // Toggle password visibility
        togglePassword.addEventListener('change', function () {
            if (this.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });

        // Form validation and error handling
        loginForm.addEventListener('submit', function (e) {
            let valid = true;

            // Check if email is valid
            if (!emailInput.value) {
                emailError.style.display = 'block';
                valid = false;
            } else {
                emailError.style.display = 'none';
            }

            // Check if password is provided
            if (!passwordInput.value) {
                passwordError.style.display = 'block';
                valid = false;
            } else {
                passwordError.style.display = 'none';
            }

            // Prevent form submission if validation fails
            if (!valid) {
                e.preventDefault();
            }
        });
    </script>
</body>
</html>
