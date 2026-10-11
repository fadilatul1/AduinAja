<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AduinAja') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <main class="min-h-screen flex flex-col items-center justify-center px-5 py-10">
        <a href="/" class="mb-6 text-2xl font-extrabold tracking-tight" style="color:#365b57">
            🌷 Aduin<span style="color:#55b99f">Aja!</span>
        </a>

        <div class="w-full sm:max-w-md">
            {{ $slot }}
        </div>

        <a href="/" class="mt-6 text-sm" style="color:#78938e">
            ← Kembali ke halaman utama
        </a>
    </main>
    
<style>
    .password-eye-wrap {
        position: relative;
        width: 100%;
    }

    .password-eye-wrap input {
        padding-right: 48px !important;
    }

    .password-eye-btn {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        border: none;
        background: transparent;
        cursor: pointer;
        font-size: 19px;
        padding: 5px;
        z-index: 5;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('input[type="password"]').forEach(function (input) {
        if (input.dataset.eyeReady) return;
        input.dataset.eyeReady = 'true';

        const wrapper = document.createElement('div');
        wrapper.className = 'password-eye-wrap';
        input.parentNode.insertBefore(wrapper, input);
        wrapper.appendChild(input);

        const button = document.createElement('button');
        button.type = 'button';
        button.className = 'password-eye-btn';
        button.textContent = '👁️';
        button.setAttribute('aria-label', 'Tampilkan password');

        button.addEventListener('click', function () {
            const showing = input.type === 'password';
            input.type = showing ? 'text' : 'password';
            button.textContent = showing ? '🙈' : '👁️';
            button.setAttribute(
                'aria-label',
                showing ? 'Sembunyikan password' : 'Tampilkan password'
            );
        });

        wrapper.appendChild(button);
    });
});
</script>
</body>
</html>
