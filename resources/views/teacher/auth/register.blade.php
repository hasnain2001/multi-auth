<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 100px;
            max-width: 400px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Employe Registration</h2>

        <form method="POST" action="{{route('teacher.register')}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input id="name" 
                       class="form-control" 
                       type="text" 
                       name="name" 
                       required 
                       autofocus 
                       autocomplete="name" />
                <div class="invalid-feedback" id="name-error" style="display: none;">
                    Please provide a valid name.
                </div>
            </div>

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" 
                       class="form-control" 
                       type="email" 
                       name="email" 
                       required 
                       autocomplete="username" />
                <div class="invalid-feedback" id="email-error" style="display: none;">
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
                       autocomplete="new-password" />
                <div class="invalid-feedback" id="password-error" style="display: none;">
                    Please provide a password.
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input id="password_confirmation" 
                       class="form-control" 
                       type="password" 
                       name="password_confirmation" 
                       required 
                       autocomplete="new-password" />
                <div class="invalid-feedback" id="password-confirmation-error" style="display: none;">
                    Please confirm your password.
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a class="text-muted" href="/login">Already registered?</a>
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>

    <script>
        // Example of displaying error messages dynamically
        const nameError = document.getElementById('name-error');
        const emailError = document.getElementById('email-error');
        const passwordError = document.getElementById('password-error');
        const passwordConfirmationError = document.getElementById('password-confirmation-error');

        // Add logic here to show errors if needed
        // For demonstration, you can set these to display:
        // nameError.style.display = 'block';
        // emailError.style.display = 'block';
        // passwordError.style.display = 'block';
        // passwordConfirmationError.style.display = 'block';
    </script>
</body>
</html>
