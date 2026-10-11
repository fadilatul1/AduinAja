<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Saya | AduinAja</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            color: #365b57;
            background:
                radial-gradient(circle at 5% 10%, #ffe1e980, transparent 25%),
                radial-gradient(circle at 95% 20%, #dcd6ff90, transparent 25%),
                #f4fcf8;
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 20px 7%;
            background: white;
            box-shadow: 0 4px 20px #365b570b;
        }

        .logo {
            color: #365b57;
            font-size: 24px;
            font-weight: 800;
            text-decoration: none;
        }

        .logo span { color: #55b99f; }

        .back {
            color: #557b74;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
        }

        .container {
            width: min(1100px, 92%);
            margin: 35px auto 60px;
        }

        .heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        .eyebrow {
            color: #399e85;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        h1 {
            margin: 8px 0;
            font-size: clamp(25px, 4vw, 34px);
            font-weight: 800;
        }

        .subtitle {
            color: #78938e;
            font-size: 13px;
            line-height: 1.8;
            margin: 0;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 13px;
            background: #55b99f;
            color: white;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            transition: .2s;
        }

        .btn:hover {
            background: #399e85;
            transform: translateY(-2px);
        }

        .success {
            padding: 14px 17px;
            margin-bottom: 22px;
            border-radius: 13px;
            background: #e2faf3;
            color: #287e69;
            font-size: 13px;
        }

        .summary {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 17px;
            margin-bottom: 27px;
        }

        .summary-card {
            padding: 21px;
            border: 1px solid #e6f3ee;
            border-radius: 20px;
            background: white;
            box-shadow: 0 8px 25px #365b5708;
        }

        .summary-card .emoji { font-size: 25px; }

        .summary-card strong {
            display: block;
            margin: 10px 0 3px;
            font-size: 27px;
        }

        .summary-card span:last-child {
            color: #78938e;
            font-size: 12px;
        }

        .section-title {
            margin: 0 0 15px;
            font-size: 19px;
            font-weight: 700;
        }

        .report-card {
            padding: 23px;
            margin-bottom: 15px;
            border: 1px solid #e6f3ee;
            border-radius: 21px;
            background: white;
            box-shadow: 0 8px 25px #365b5708;
        }

        .report-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
            flex-wrap: wrap;
        }

        .report-card h3 {
            margin: 0 0 7px;
            font-size: 17px;
        }

        .meta {
            color: #78938e;
            font-size: 12px;
            line-height: 1.9;
        }

        .description {
            margin: 17px 0;
            font-size: 13px;
            line-height: 1.8;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .badges {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .badge {
            display: inline-block;
            padding: 7px 11px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 700;
        }

        .status-diajukan { background: #fff0c7; color: #947024; }
        .status-diverifikasi { background: #dcd6ff; color: #6356a3; }
        .status-diproses { background: #dceeff; color: #3973a3; }
        .status-selesai { background: #e2faf3; color: #287e69; }
        .status-ditolak { background: #ffe1e9; color: #a34e68; }

        .priority-tinggi { background: #ffe1e9; color: #a34e68; }
        .priority-sedang { background: #fff0c7; color: #947024; }
        .priority-rendah { background: #e2faf3; color: #287e69; }

        .report-photo {
            display: block;
            width: 100%;
            max-width: 320px;
            max-height: 230px;
            margin-top: 15px;
            object-fit: cover;
            border-radius: 15px;
        }

        .rejection {
            padding: 12px 15px;
            margin-top: 13px;
            border-radius: 12px;
            background: #fff0f3;
            color: #a34e68;
            font-size: 12px;
        }

        .empty {
            padding: 45px 20px;
            text-align: center;
            border: 1px dashed #cce9df;
            border-radius: 23px;
            background: white;
        }

        .empty .emoji { font-size: 52px; }

        .empty h3 { margin: 12px 0 7px; }

        .empty p {
            color: #78938e;
            font-size: 13px;
            line-height: 1.8;
        }

        footer {
            padding: 22px;
            text-align: center;
            color: #78938e;
            font-size: 11px;
        }

        @media (max-width: 650px) {
            nav { padding: 17px 5%; }
            .logo { font-size: 20px; }
            .container { margin-top: 25px; }
            .summary { grid-template-columns: 1fr; }
            .summary-card { padding: 17px; }
            .report-card { padding: 18px; }
        }
    </style>
</head>

<body>
    <nav>
        <a href="{{ route('dashboard') }}" class="logo">
            🌷 Aduin<span>Aja!</span>
        </a>
        <a href="{{ route('dashboard') }}" class="back">← Dashboard</a>
    </nav>

    <main class="container">
        <header class="heading">
            <div>
                <span class="eyebrow">📋 RIWAYAT ADUAN</span>
                <h1>Laporan Saya 🌼</h1>
                <p class="subtitle">
                    Pantau laporanmu dan lihat perkembangan penanganannya.
                </p>
            </div>

            <a href="{{ route('reports.create') }}" class="btn">
                ＋ Buat Laporan
            </a>
        </header>

        @if (session('success'))
            <div class="success">
                💚 {{ session('success') }}
            </div>
        @endif

        <section class="summary">
            <article class="summary-card">
                <span class="emoji">📝</span>
                <strong>{{ $reports->count() }}</strong>
                <span>Total Laporan</span>
            </article>

            <article class="summary-card">
                <span class="emoji">⏳</span>
                <strong>{{ $reports->whereIn('status', ['Diajukan', 'Diverifikasi', 'Diproses'])->count() }}</strong>
                <span>Belum Selesai</span>
            </article>

            <article class="summary-card">
                <span class="emoji">✅</span>
                <strong>{{ $reports->where('status', 'Selesai')->count() }}</strong>
                <span>Laporan Selesai</span>
            </article>
        </section>

        <h2 class="section-title">Semua Laporan 💌</h2>

@forelse ($reports as $report)
    <article class="report-card">
        <div class="report-top">
            <div>
                <h3>{{ $report->title }}</h3>

                <div class="meta">
                    📍 {{ $report->location }}<br>
                    🏷️ {{ $report->category }}<br>
                    🗓️ {{ $report->created_at->format('d M Y, H:i') }}
                </div>
            </div>

            <div class="badges">
                <span class="badge status-{{ strtolower($report->status) }}">
                    {{ $report->status }}
                </span>

                <span class="badge priority-{{ strtolower($report->priority) }}">
                    Prioritas {{ $report->priority }}
                </span>
            </div>
        </div>

        <p class="description">{{ $report->description }}</p>

        @if ($report->photo)
            <img
                src="{{ asset('storage/' . $report->photo) }}"
                alt="Foto bukti {{ $report->title }}"
                class="report-photo"
            >
        @endif

        @if ($report->status === 'Ditolak' && $report->rejection_reason)
            <div class="rejection">
                <strong>Alasan penolakan:</strong>
                {{ $report->rejection_reason }}
            </div>
        @endif

        {{-- Tombol Edit dan Hapus --}}
        <div style="display:flex; gap:10px; flex-wrap:wrap; margin-top:18px;">
            <a href="{{ route('reports.edit', $report) }}"
               style="display:inline-block; padding:10px 17px; background:#dcd6ff; color:#51458b; border-radius:12px; text-decoration:none; font-weight:600; font-size:13px;">
                ✏️ Edit Laporan
            </a>

            <form action="{{ route('reports.destroy', $report) }}"
                  method="POST"
                  onsubmit="return confirm('Yakin ingin menghapus laporan ini? Tindakan ini tidak bisa dibatalkan.');">
                @csrf
                @method('DELETE')

                <button type="submit"
                        style="padding:10px 17px; background:#ffe1e9; color:#a83f5c; border:none; border-radius:12px; font-family:inherit; font-weight:600; font-size:13px; cursor:pointer;">
                    🗑️ Hapus Laporan
                </button>
            </form>
        </div>
    </article>
@empty
    <section class="empty">
        <div class="emoji">🌱</div>
        <h3>Belum ada laporan nih!</h3>
        <p>
            Laporan yang kamu kirim akan muncul di sini.<br>
            Yuk, bantu kampus menjadi lebih nyaman!
        </p>

        <a href="{{ route('reports.create') }}" class="btn">
            📩 Buat Laporan Pertama
        </a>
    </section>
@endforelse
            </main>

    <footer>🌷 AduinAja — Ada masalah? Aduin aja! 💚</footer>
</body>
</html>
