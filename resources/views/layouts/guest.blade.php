<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                --bg: #fafbfc;
                --surface: #ffffff;
                --text-primary: #1a1a1a;
                --text-secondary: #6b7280;
                --accent: #000000;
                --accent-hover: #333333;
                --border: #e5e7eb;
            }

            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            body {
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
                margin: 0;
                min-height: 100vh;
                background: var(--bg);
                color: var(--text-primary);
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 24px;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }

            .auth-page {
                width: 100%;
                max-width: 400px;
            }

            .auth-nav {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 24px;
                font-size: 14px;
            }

            .auth-link {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                color: var(--text-secondary);
                text-decoration: none;
                font-weight: 500;
                font-size: 14px;
                padding: 10px 14px;
                border-radius: 8px;
                background: transparent;
                border: 1.5px solid transparent;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                position: relative;
                overflow: hidden;
            }

            .auth-link::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(135deg, rgba(15, 76, 117, 0.05) 0%, rgba(50, 130, 184, 0.05) 100%);
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .auth-link i {
                font-size: 13px;
                transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                position: relative;
                z-index: 1;
            }

            .auth-link span {
                position: relative;
                z-index: 1;
            }

            .auth-link:hover {
                color: #0f4c75;
                border-color: rgba(15, 76, 117, 0.2);
                transform: translateX(-3px);
            }

            .auth-link:hover::before {
                opacity: 1;
            }

            .auth-link:hover i {
                transform: translateX(-4px);
            }

            .auth-link:active {
                transform: translateX(-1px);
            }

            .auth-card {
                background: var(--surface);
                border-radius: 12px;
                padding: 36px 32px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
            }

            .auth-register {
                color: var(--text-secondary);
                display: inline-flex;
                gap: 6px;
                align-items: center;
                font-size: 14px;
            }

            .auth-register a {
                color: var(--accent);
                font-weight: 500;
                text-decoration: none;
                transition: opacity 0.2s;
            }

            .auth-register a:hover {
                opacity: 0.7;
            }

            @media (max-width: 480px) {
                body {
                    padding: 16px;
                }

                .auth-card {
                    padding: 28px 20px;
                }

                .auth-nav {
                    flex-direction: column;
                    gap: 12px;
                    align-items: flex-start;
                    margin-bottom: 20px;
                }
            }
        </style>
    </head>
    <body>
        <div class="auth-page">
            <div class="auth-nav">
                <a href="{{ url('/') }}" class="auth-link">
                    <i class="fas fa-arrow-left"></i>
                    <span>Beranda</span>
                </a>
            </div>
            <main class="auth-card">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
