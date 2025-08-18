<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }} - Login</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
            --bs-primary: #ED1C24;
            --bs-primary-hover: #A11219FF;
        }

        .btn:hover {
            background-color: var(--bs-primary-hover) !important;
            border-color: var(--bs-primary-hover) !important;
        }
        
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <!-- Added login form header -->
                        <div class="text-center mb-4">
                            <h2 class="fw-bold text-dark mb-2">Welcome Back</h2>
                            <p class="text-muted">Sign in to your account</p>
                        </div>

                        <form method="POST" action="{{ route('login.submit') }}">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="username" class="form-label fw-medium">Username</label>
                                <input type="username" 
                                       class="form-control form-control-lg @error('username') is-invalid @enderror" 
                                       id="username" 
                                       name="username" 
                                       value="{{ old('username') }}" 
                                       required 
                                       autocomplete="username" 
                                       autofocus
                                       placeholder="Enter your username">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label fw-medium">Password</label>
                                <input type="password" 
                                       class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                       id="password" 
                                       name="password" 
                                       required 
                                       autocomplete="current-password"
                                       placeholder="Enter your password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-muted" for="remember">
                                        Remember me
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="text-decoration-none" href="{{ route('password.request') }}" style="color: var(--bs-primary);">
                                        Forgot Password?
                                    </a>
                                @endif
                            </div>

                            <button type="submit" class="btn w-100 btn-lg fw-medium" style="background-color: var(--bs-primary); border-color: var(--bs-primary); color: white;">
                                Sign In
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
