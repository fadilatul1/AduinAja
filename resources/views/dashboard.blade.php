
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | AduinAja</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f4fcf8;
            color: #365b57;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            padding: 20px 7%;
            background: white;
            box-shadow: 0 4px 20px #365b570b;
        }

        .logo {
            font-size: 24px;
            font-weight: 800;
            text-decoration: none;
            color: #365b57;
        }

        .logo span {
            color: #55b99f;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .nav-right a {
            color: #365b57;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .logout {
            border: none;
            border-radius: 12px;
            padding: 10px 16px;
            background: #ffe1e9;
            color: #a34e68;
            font-family: inherit;
            font-weight: 600;
            cursor: pointer;
        }

        .container {
            max-width: 1150px;
            margin: auto;
            padding: 35px 24px 55px;
        }

        .welcome {
            position: relative;
            overflow: hidden;
            padding: 35px;
            border-radius: 28px;
            background: linear-gradient(120deg, #b9f3e4, #e2faf3 65%, #dcd6ff);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .welcome h1 {
            font-size: clamp(25px, 4vw, 36px);
            line-height: 1.3;
            margin: 0 0 12px;
            font-weight: 800;
        }

        .welcome p {
            margin: 0;
            color: #557b74;
            line-height: 1.8;
            font-size: 14px;
        }

        .mascot {
            font-size: clamp(65px, 10vw, 105px);
            flex-shrink: 0;
        }

        .section-title {
            margin: 32px 0 18px;
            font-size: 20px;
            font-weight: 700;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .stat-card {
            background: white;
            border: 1px solid #e6f3ee;
            border-radius: 22px;
            padding: 23px;
            box-shadow: 0 8px 25px #365b5708;
        }

        .stat-icon {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 48px;
            height: 48px;
            border-radius: 16px;
            font-size: 23px;
        }

        .stat-card h2 {
            font-size: 30px;
            margin: 17px 0 3px;
        }

        .stat-card p {
            margin: 0;
            font-size: 13px;
            color: #78938e;
        }

        .quick-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-top: 28px;
            padding: 25px;
            background: white;
            border: 1px solid #e6f3ee;
            border-radius: 22px;
        }

        .quick-card h3 {
            margin: 0 0 7px;
            font-size: 17px;
        }

        .quick-card p {
            margin: 0;
            color: #78938e;
            font-size: 13px;
            line-height: 1.7;
        }

        .primary-btn {
            display: inline-block;
            flex-shrink: 0;
            padding: 13px 20px;
            border-radius: 14px;
            background: #55b99f;
            color: white;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            box-shadow: 0 7px 18px #55b99f35;
            transition: .2s;
        }

        .primary-btn:hover {
            background: #399e85;
            transform: translateY(-2px);
        }

        .empty-state {
            text-align: center;
            padding: 35px 15px;
            margin-top: 18px;
            background: white;
            border: 1px dashed #cce9df;
            border-radius: 22px;
        }

        .empty-state div {
            font-size: 45px;
        }

        .empty-state h3 {
            margin: 12px 0 7px;
        }

        .empty-state p {
            margin: 0;
            color: #78938e;
            font-size: 13px;
        }

        footer {
            text-align: center;
            padding: 25px;
            color: #78938e;
            font-size: 12px;
        }

        @media (max-width: 650px) {
            .navbar {
                padding: 17px 5%;
            }

            .logo {
                font-size: 20px;
            }

            .nav-right {
                gap: 10px;
            }

            .nav-right a {
                font-size: 12px;
            }

            .container {
                padding: 24px 16px 40px;
            }

            .welcome {
                padding: 25px 20px;
            }

            .mascot {
                font-size: 55px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .stat-card {
                padding: 19px;
            }

            .quick-card {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <a href="/" class="logo">🌷 Aduin<span>Aja!</span></a>

        <div class="nav-right">
            <a href="/">Halaman Utama</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout">Keluar ↗</button>
            </form>
        </div>
    </nav>

    <main class="container">
        <section class="welcome">
            <div>
                <h1>Hai, {{ Auth::user()->name }}! 🌼</h1>
                <p>
                    Selamat datang di ruang AduinAja.<br>
                    Ada masalah fasilitas kampus? Yuk, laporkan aja!
                </p>
            </div>

            <div class="mascot">🧑🏻‍🎓📣</div>
        </section>

        <h2 class="section-title">Ringkasan Laporan 📊</h2>

        <section class="stats">
            <article class="stat-card">
                <span class="stat-icon" style="background:#e2faf3">📝</span>
                <h2>{{ $totalReports }}</h2>
                <p>Total Laporan Saya</p>
            </article>

            <article class="stat-card">
                <span class="stat-icon" style="background:#fff0c7">⏳</span>
                <h2>{{ $processingReports }}</h2>
                <p>Laporan Diproses</p>
            </article>

            <article class="stat-card">
                <span class="stat-icon" style="background:#dcd6ff">✅</span>
                <h2>{{ $completedReports }}</h2>
                <p>Laporan Selesai</p>
            </article>
        </section>

        <section class="quick-card">
            <div>
                <h3>💌 Yuk, bantu kampus jadi lebih nyaman!</h3>
                <p>
                    Temukan fasilitas yang bermasalah dan laporkan kepada
                    pihak kampus agar bisa segera ditangani.
                </p>
            </div>

            <a href="{{ route('reports.create') }}" class="primary-btn">
    ＋ Buat Laporan
</a>
        </section>
        
<section style="background:#fff;border:1px solid #dff3eb;border-radius:22px;padding:22px;margin-bottom:24px;box-shadow:0 8px 25px rgba(62,130,112,.06)">
    <h2 style="color:#248d79;font-size:20px;font-weight:700;margin:0 0 6px">
        🔔 Notifikasi Kamu
        @if($unreadNotifications > 0)
            <span style="background:#ffe1e9;color:#b34366;padding:4px 10px;border-radius:20px;font-size:12px">
                {{ $unreadNotifications }} baru
            </span>
        @endif
    </h2>

    <p style="color:#78938b;font-size:13px;margin-bottom:18px">
        Pantau perkembangan laporan fasilitas kampusmu 🌷
    </p>

    @forelse($notifications as $notification)
        <div style="padding:14px;margin-bottom:10px;border-radius:14px;background:{{ $notification->read_at ? '#f7fbf9' : '#eafaf4' }};border:1px solid #e0f1e9">
            <div style="font-size:13px;color:#365b57">
                {{ $notification->message }}
            </div>
            <div style="font-size:11px;color:#78938b;margin-top:6px">
                {{ $notification->created_at->format('d/m/Y H:i') }}
                
@if(!$notification->read_at)
    · <strong>Belum dibaca</strong>

    <form action="{{ route('notifications.read', $notification) }}"
          method="POST"
          style="margin-top:10px;">
        @csrf
        @method('PATCH')

        <button type="submit"
                style="border:0;background:#b9f3e4;color:#248d79;padding:8px 14px;border-radius:12px;font-weight:600;cursor:pointer;">
            ✓ Tandai sudah dibaca
        </button>
    </form>
@else
    · <strong>Sudah dibaca ✓</strong>
@endif
            </div>
        </div>
    @empty
        <div style="text-align:center;padding:20px;color:#78938b;background:#f5fcf9;border-radius:14px">
            🌱 Belum ada notifikasi. Notifikasi akan muncul ketika admin mengubah status laporanmu.
        </div>
    @endforelse
</section>
<h2 class="section-title">Laporan Terbaru 📋</h2>

@if ($latestReports->isEmpty())
    <section class="empty-state">
        <div>🌱</div>
        <h3>Belum ada laporan nih!</h3>
        <p>Laporan yang kamu buat nantinya akan tampil di sini.</p>

        <a href="{{ route('reports.create') }}" class="primary-btn"
           style="display:inline-block; margin-top:16px;">
            ＋ Buat Laporan Pertama
        </a>
    </section>
@else
    <section class="stats" style="grid-template-columns: 1fr;">
        @foreach ($latestReports as $report)
            <article class="stat-card" style="text-align:left; padding:24px;">
                <h3 style="font-size:18px; font-weight:700; margin-bottom:8px;">
                    {{ $report->title }}
                </h3>

                <p style="font-size:13px; margin-bottom:6px;">
                    📍 {{ $report->location }}
                </p>

                <p style="font-size:13px; margin-bottom:10px;">
                    🏷️ {{ $report->category }}
                </p>

                <p style="font-size:13px; margin-bottom:10px;">
                    Status: <strong>{{ $report->status }}</strong>
                </p>

                <p style="font-size:13px; margin-bottom:10px;">
                    Prioritas: <strong>{{ $report->priority }}</strong>
                </p>

                <p style="font-size:13px; line-height:1.7;">
                    {{ \Illuminate\Support\Str::limit($report->description, 120) }}
                </p>

                <p style="font-size:12px; margin-top:10px; color:#78938e;">
                    {{ $report->created_at->format('d/m/Y') }}
                </p>
            </article>
        @endforeach
    </section>

    <a href="{{ route('reports.index') }}" class="primary-btn"
       style="display:inline-block; margin-top:16px;">
        📋 Lihat Semua Laporan
    </a>
@endif
    </main>

    <footer>
        🌷 AduinAja — Ada masalah? Aduin aja! 💚
    </footer>
</body>
</html>