<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color:transparent;
        }
        .container {
            margin-top: 100px;
            max-width: 400px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
        <h2 class="text-center">Employe Login</h2>
        
        <div class="mb-4" id="session-status">
            <!-- Session Status -->
            <!-- Add session status message here if needed -->
        </div>

        <form method="POST" action="/admin/login">
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
                       autocomplete="current-password" />
                <div class="invalid-feedback" id="password-error" style="display: none;">
                    Please provide your password.
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
