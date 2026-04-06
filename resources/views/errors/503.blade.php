<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pemeliharaan Sistem - Habify</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,600,800" rel="stylesheet" />

    <script>
        (function() {
            const appearance = localStorage.getItem('appearance') || 'system';
            if (appearance === 'dark' || (appearance === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    <style>
        :root {
            --primary: #38BDF8;
            --primary-focus: #0EA5E9;
            --base-100: #F1F5F9;
            --base-content: #0F172A;
        }

        .dark {
            --base-100: #0F172A;
            --base-content: #F1F5F9;
        }

        body {
            margin: 0;
            font-family: 'Instrument Sans', sans-serif;
            background-color: var(--base-100);
            color: var(--base-content);
            line-height: 1.5;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            overflow: hidden;
        }

        .bg-layer {
            position: absolute;
            inset: 0;
            z-index: 0;
            transition: opacity 0.5s ease-in-out;
            background-size: cover;
            background-position: center;
        }

        .bg-light {
            background-image: url('/image/bghero-light.jpg');
            opacity: 1;
        }

        .bg-dark {
            background-image: url('/image/bghero-dark.jpg');
            opacity: 0;
            filter: brightness(60%);
        }

        .dark .bg-light { opacity: 0; }
        .dark .bg-dark { opacity: 1; }

        .overlay {
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, 0.4);
            transition: background 0.5s ease-in-out;
        }

        .dark .overlay {
            background: rgba(15, 23, 42, 0.6);
        }

        .container {
            position: relative;
            z-index: 10;
            padding: 2rem;
            max-width: 500px;
            width: 90%;
            text-align: center;
        }

        .card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(56, 189, 248, 0.1);
            border-radius: 2rem;
            padding: 3rem 2rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            transition: background 0.5s ease-in-out;
        }

        .dark .card {
            background: rgba(30, 41, 59, 0.7);
            border-color: rgba(56, 189, 248, 0.2);
        }

        .logo {
            font-size: 2.5rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            margin-bottom: 0.5rem;
            color: var(--base-content);
            text-decoration: none;
        }

        .status-badge {
            display: inline-block;
            background: rgba(56, 189, 248, 0.1);
            color: var(--primary);
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 2rem;
            border: 1px solid rgba(56, 189, 248, 0.2);
        }

        h1 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 1rem;
            letter-spacing: -0.01em;
        }

        p {
            font-size: 1rem;
            opacity: 0.7;
            margin-bottom: 2rem;
        }

        .loader {
            display: inline-flex;
            gap: 6px;
            margin-bottom: 2rem;
        }

        .dot {
            width: 10px;
            height: 10px;
            background-color: var(--primary);
            border-radius: 50%;
            animation: bounce 1.4s infinite ease-in-out both;
        }

        .dot:nth-child(1) { animation-delay: -0.32s; }
        .dot:nth-child(2) { animation-delay: -0.16s; }

        @keyframes bounce {
            0%, 80%, 100% { transform: scale(0); }
            40% { transform: scale(1); }
        }

        .footer {
            margin-top: 2rem;
            font-size: 0.875rem;
            opacity: 0.5;
        }

        @media (max-width: 640px) {
            .card { padding: 2rem 1.5rem; }
            .logo { font-size: 2rem; }
            h1 { font-size: 1.5rem; }
        }
    </style>
</head>
<body>
    <!-- Background Layers -->
    <div class="bg-layer bg-light"></div>
    <div class="bg-layer bg-dark"></div>
    <div class="overlay"></div>

    <div class="container">
        <div class="card">
            <div class="logo">Habify</div>
            <div class="status-badge">Maintenance Mode</div>
            
            <h1>Sedang Dalam Pemeliharaan</h1>
            <p>Kami sedang melakukan pembaharuan rutin untuk meningkatkan kualitas layanan Habify. Kami akan segera kembali!</p>
            
            <div class="loader">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>

            <div class="footer">
                &copy; 2026 Habify by Kuukok. Semua hak dilindungi.
            </div>
        </div>
    </div>
</body>
</html>
