<x-guest-layout>
    <div class="auth-header">
        <div class="auth-logo">
            <img src="{{ asset('images/logo.png') }}" alt="Bellford Academy Logo" style="width: 80px; height: 80px; object-fit: contain;">
        </div>
        <h1>Selamat Datang Kembali</h1>
        <p>Masuk ke akun admin untuk mengelola konten galeri</p>
    </div>

    <x-auth-session-status class="auth-status" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="auth-form">
        @csrf

        <div class="form-field">
            <label for="email" class="form-label">
                <i class="fas fa-envelope"></i>
                Email
            </label>
            <div class="input-wrapper">
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="admin@bellfordacademy.com">
            </div>
            <x-input-error :messages="$errors->get('email')" class="field-error" />
        </div>

        <div class="form-field">
            <label for="password" class="form-label">
                <i class="fas fa-lock"></i>
                Password
            </label>
            <div class="input-wrapper password-wrapper">
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="Masukkan password">
                <button type="button" class="password-toggle" id="passwordToggle" onclick="togglePassword()">
                    <i class="fas fa-eye" id="passwordIcon"></i>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="field-error" />
        </div>

        <div class="form-footer">
            <label class="remember-me">
                <input id="remember_me" type="checkbox" name="remember">
                <span>Ingat saya</span>
            </label>

            @if (Route::has('password.request'))
                <a class="forgot-link" href="{{ route('password.request') }}">
                    Lupa password?
                </a>
            @endif
        </div>

        <button type="submit" class="auth-submit">
            <span>Masuk</span>
            <i class="fas fa-arrow-right"></i>
        </button>
    </form>

    <style>
        .auth-header {
            margin-bottom: 28px;
            text-align: center;
        }

        .auth-logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 16px;
            background: white;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 6px 20px rgba(15, 76, 117, 0.2);
            padding: 8px;
        }

        .auth-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .auth-logo i {
            font-size: 24px;
            color: white;
        }

        .auth-header h1 {
            font-size: 28px;
            font-weight: 700;
            margin: 0 0 8px;
            color: var(--text-primary);
            letter-spacing: -0.6px;
        }

        .auth-header p {
            margin: 0;
            color: var(--text-secondary);
            font-size: 14px;
            font-weight: 400;
            line-height: 1.5;
        }

        .auth-status {
            margin-bottom: 20px;
        }

        .auth-form {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .form-field {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 2px;
        }

        .form-label i {
            font-size: 13px;
            color: var(--text-secondary);
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrapper input {
            width: 100%;
            padding: 14px 16px;
            border-radius: 10px;
            border: 2px solid var(--border);
            font-size: 15px;
            background: #f9fafb;
            color: var(--text-primary);
            transition: all 0.3s ease;
            outline: none;
            font-family: inherit;
        }

        .input-wrapper input::placeholder {
            color: #9ca3af;
        }

        .input-wrapper input:focus {
            border-color: #0f4c75;
            background: white;
            box-shadow: 0 0 0 4px rgba(15, 76, 117, 0.08);
        }

        .password-wrapper {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 14px;
            background: none;
            border: none;
            color: var(--text-secondary);
            cursor: pointer;
            padding: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            border-radius: 6px;
        }

        .password-toggle:hover {
            color: #0f4c75;
            background: rgba(15, 76, 117, 0.05);
        }

        .password-toggle i {
            font-size: 18px;
        }

        .field-error {
            color: #ef4444;
            font-size: 13px;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .field-error::before {
            content: '⚠';
            font-size: 14px;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            margin-top: 2px;
        }

        .remember-me {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: var(--text-secondary);
            cursor: pointer;
            user-select: none;
            transition: color 0.2s;
        }

        .remember-me:hover {
            color: var(--text-primary);
        }

        .remember-me input {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #0f4c75;
            border-radius: 4px;
        }

        .forgot-link {
            color: #0f4c75;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
        }

        .forgot-link:hover {
            color: #3282b8;
            text-decoration: underline;
        }

        .auth-submit {
            margin-top: 4px;
            width: 100%;
            border: none;
            border-radius: 10px;
            padding: 14px 18px;
            background: linear-gradient(135deg, #0f4c75 0%, #3282b8 100%);
            color: #ffffff;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: inherit;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 4px 12px rgba(15, 76, 117, 0.25);
        }

        .auth-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(15, 76, 117, 0.35);
        }

        .auth-submit:active {
            transform: translateY(0);
        }

        .auth-submit i {
            transition: transform 0.3s ease;
        }

        .auth-submit:hover i {
            transform: translateX(4px);
        }

        @media (max-width: 480px) {
            .auth-header h1 {
                font-size: 26px;
            }

            .auth-logo {
                width: 70px;
                height: 70px;
            }

            .auth-logo i {
                font-size: 24px;
            }

            .form-footer {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }
        }
    </style>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('passwordIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            }
        }
    </script>
</x-guest-layout>
