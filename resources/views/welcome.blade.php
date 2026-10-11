
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AduinAja — Cute Campus Care</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --aqua: #b9f3e4;
            --mint: #e2faf3;
            --lilac: #dcd6ff;
            --pink: #ffe1e9;
            --yellow: #fff0c7;
            --dark: #365b57;
            --muted: #78938e;
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f8fffc;
            color: var(--dark);
            overflow-x: hidden;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .navbar {
            width: min(1120px, 90%);
            margin: auto;
            padding: 25px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            background: var(--aqua);
            border-radius: 15px;
            font-size: 23px;
            transform: rotate(-5deg);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 27px;
            font-size: 13px;
            font-weight: 600;
            color: var(--muted);
        }

        .nav-links a:hover {
            color: #329b85;
        }

        .nav-button {
            padding: 12px 22px;
            border-radius: 30px;
            background: var(--dark);
            color: white !important;
            transition: .25s;
        }

        .nav-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px #365b5730;
        }

        .hero {
            width: min(1120px, 90%);
            min-height: 570px;
            margin: 15px auto 55px;
            padding: 65px 7%;
            border-radius: 38px;
            background: linear-gradient(125deg, #e2faf3 0%, #e8f9f7 55%, #f1eaff 100%);
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            align-items: center;
            gap: 30px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            width: 300px;
            height: 300px;
            position: absolute;
            right: -100px;
            top: -120px;
            background: #ffffff60;
            border-radius: 50%;
        }

        .hero-content, .hero-art {
            position: relative;
            z-index: 1;
        }

        .eyebrow {
            display: inline-block;
            padding: 9px 16px;
            border-radius: 30px;
            background: white;
            color: #438f7e;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 24px;
        }

        h1 {
            font-size: clamp(38px, 5vw, 61px);
            line-height: 1.17;
            letter-spacing: -2.5px;
            margin-bottom: 22px;
        }

        h1 span {
            color: #36a68d;
        }

        .hero-content p {
            max-width: 470px;
            font-size: 14px;
            line-height: 2;
            color: #718e87;
            margin-bottom: 30px;
        }

        .hero-buttons {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 15px 23px;
            border-radius: 17px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 700;
            transition: .25s;
        }

        .button-primary {
            background: var(--dark);
            color: white;
            box-shadow: 0 8px 18px #365b5720;
        }

        .button-secondary {
            background: white;
            color: var(--dark);
        }

        .button:hover {
            transform: translateY(-4px);
        }

        .hero-art {
            min-height: 330px;
            display: grid;
            place-items: center;
        }

        .illustration-card {
            width: min(100%, 340px);
            min-height: 310px;
            padding: 28px;
            background: #ffffffb8;
            border: 2px solid #ffffff;
            border-radius: 35px;
            box-shadow: 0 20px 60px #639f8d20;
            text-align: center;
            transform: rotate(2deg);
            animation: float 4s ease-in-out infinite;
        }

        .illustration {
            font-size: 105px;
            line-height: 1.5;
            filter: drop-shadow(0 8px 8px #6aaf9820);
        }

        .illustration-card h3 {
            font-size: 18px;
            margin: 5px 0 8px;
        }

        .illustration-card p {
            font-size: 12px;
            color: var(--muted);
            line-height: 1.8;
        }

        .sticker {
            position: absolute;
            font-size: 34px;
            animation: float 3s ease-in-out infinite;
        }

        .sticker-one {
            top: 12px;
            right: 5px;
        }

        .sticker-two {
            bottom: 18px;
            left: 0;
            animation-delay: 1s;
        }

        .sticker-three {
            top: 40px;
            left: 5px;
            animation-delay: .5s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(2deg); }
            50% { transform: translateY(-10px) rotate(-1deg); }
        }

        .section {
            width: min(1120px, 90%);
            margin: 0 auto 75px;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 35px;
        }

        .section-heading .mini-label {
            color: #46a58e;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .section-heading h2 {
            font-size: clamp(25px, 3vw, 34px);
            margin: 10px 0;
            letter-spacing: -1px;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 13px;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .feature-card {
            padding: 30px;
            background: white;
            border: 1px solid #eaf4f0;
            border-radius: 25px;
            box-shadow: 0 10px 30px #3b77620a;
            transition: .25s;
        }

        .feature-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 15px 35px #3b776218;
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            display: grid;
            place-items: center;
            font-size: 29px;
            border-radius: 19px;
            margin-bottom: 20px;
        }

        .feature-card:nth-child(1) .feature-icon { background: var(--mint); }
        .feature-card:nth-child(2) .feature-icon { background: var(--pink); }
        .feature-card:nth-child(3) .feature-icon { background: var(--lilac); }

        .feature-card h3 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .feature-card p {
            color: var(--muted);
            font-size: 12px;
            line-height: 1.9;
        }

        .bottom-banner {
            width: min(1120px, 90%);
            margin: 0 auto 65px;
            padding: 38px;
            border-radius: 28px;
            background: var(--yellow);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .bottom-banner h2 {
            font-size: 23px;
            margin-bottom: 7px;
        }

        .bottom-banner p {
            font-size: 12px;
            color: #8e8263;
            line-height: 1.8;
        }

        footer {
            padding: 25px 5%;
            text-align: center;
            border-top: 1px solid #eaf4f0;
            color: var(--muted);
            font-size: 11px;
        }

        @media (max-width: 760px) {
            .navbar {
                padding: 18px 0;
            }

            .nav-links a:not(.nav-button) {
                display: none;
            }

            .hero {
                grid-template-columns: 1fr;
                padding: 42px 7%;
                gap: 20px;
                border-radius: 28px;
            }

            .hero-art {
                min-height: 320px;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

            .bottom-banner {
                flex-direction: column;
                align-items: flex-start;
                padding: 28px;
            }

            h1 {
                letter-spacing: -1.5px;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="/" class="brand">
            <span class="brand-icon">🌱</span>
            Aduin<span style="color:#36a68d">Aja!</span>
        </a>

        <div class="nav-links">
            <a href="#fitur">Fitur</a>
            <a href="#tentang">Tentang</a>
            <a href="{{ route('register') }}" class="nav-button">Mulai Sekarang ✨</a>
        </div>
    </nav>

    <main>
        <section class="hero" id="tentang">
            <div class="hero-content">
                <span class="eyebrow">🩵 Cute Campus Care · UNIMED</span>

                <h1>Kampus nyaman,<br>dimulai dari <span>laporanmu!</span></h1>

                <p>
                    Ada fasilitas kampus yang rusak atau bermasalah?
                    Jangan dipendam sendiri. Aduin aja! Bersama-sama,
                    kita wujudkan lingkungan kampus yang lebih nyaman,
                    aman, dan menyenangkan.
                </p>

                <div class="hero-buttons">
                    <a href="{{ route('login') }}" class="button button-primary">
    📝 Adukan Masalah
</a>
                    <a href="#fitur" class="button button-secondary">
                        Kenali Fitur →
                    </a>
                </div>
            </div>

            <div class="hero-art">
                <span class="sticker sticker-one">✨</span>
                <span class="sticker sticker-two">🌷</span>
                <span class="sticker sticker-three">☁️</span>

                <div class="illustration-card">
                    <div class="illustration">🧑🏻‍🎓📣</div>
                    <h3>Suaramu berarti! 💗</h3>
                    <p>
                        Satu laporan kecil darimu,<br>
                        bisa membawa perubahan besar.
                    </p>
                </div>
            </div>
        </section>

        <section class="section" id="fitur">
            <div class="section-heading">
                <span class="mini-label">✨ Fitur Andalan</span>
                <h2>Melapor jadi lebih mudah!</h2>
                <p>Semua kebutuhan laporan fasilitas kampus dalam satu tempat.</p>
            </div>

            <div class="feature-grid">
                <article class="feature-card">
                    <div class="feature-icon">📮</div>
                    <h3>Lapor dengan Mudah</h3>
                    <p>
                        Sampaikan masalah fasilitas kampus dengan kategori,
                        lokasi, deskripsi, dan foto pendukung.
                    </p>
                </article>

                <article class="feature-card">
                    <div class="feature-icon">🔎</div>
                    <h3>Pantau Progres</h3>
                    <p>
                        Pantau status laporanmu mulai dari diajukan,
                        diverifikasi, diproses, hingga selesai.
                    </p>
                </article>

                <article class="feature-card">
                    <div class="feature-icon">💡</div>
                    <h3>Smart Priority</h3>
                    <p>
                        Rekomendasi prioritas membantu petugas mengenali
                        laporan yang perlu ditangani lebih dahulu.
                    </p>
                </article>
            </div>
        </section>

        <section class="bottom-banner" id="mulai">
            <div>
                <h2>Yuk, rawat kampus kita bersama! 🌼</h2>
                <p>
                    Kepedulianmu adalah awal dari perubahan.<br>
                    Ada masalah? Aduin aja!
                </p>
            </div>

           <a href="{{ route('register') }}" class="button button-primary">
    Siap Berkontribusi 💚
</a>
        </section>
    </main>

    <footer>
        Made with 🩵 for a better campus · AduinAja © 2026
    </footer>

</body>
</html>
