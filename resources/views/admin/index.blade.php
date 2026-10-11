
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin AduinAja 🌷</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0; font-family: 'Poppins', sans-serif; color: #31564f;
            background: linear-gradient(135deg,#e2faf3,#f8fffc 55%,#f1edff);
        }
        .container { max-width: 1200px; margin: auto; padding: 28px 20px 50px; }
        .topbar {
            display: flex; justify-content: space-between; align-items: center;
            gap: 16px; flex-wrap: wrap; margin-bottom: 28px;
        }
        .brand { font-size: 25px; font-weight: 800; color: #248d79; }
        .brand span { color: #f19ab3; }
        .subtitle { color: #78938b; font-size: 13px; margin-top: 4px; }
        .pill {
            display: inline-block; padding: 9px 15px; border-radius: 30px;
            background: white; color: #248d79; font-size: 12px; font-weight: 700;
        }
        h1 { font-size: clamp(25px,4vw,35px); margin: 12px 0 5px; }
        .intro { color: #78938b; margin: 0 0 25px; font-size: 14px; }
        .stats {
            display: grid; grid-template-columns: repeat(4,minmax(0,1fr));
            gap: 16px; margin-bottom: 25px;
        }
        .stat,.panel {
            background: rgba(255,255,255,.9); border: 1px solid #e4f2ed;
            border-radius: 22px; padding: 22px;
            box-shadow: 0 8px 25px rgba(62,130,112,.07);
        }
        .stat .emoji { font-size: 26px; }
        .stat p { font-size: 12px; color: #78938b; margin: 10px 0 4px; }
        .stat strong { font-size: 28px; }
        .panel { margin-bottom: 20px; }
        .panel h2 { font-size: 19px; margin: 0 0 18px; }
        .alert {
            padding: 13px 16px; border-radius: 14px; margin-bottom: 20px;
            background: #d9f8e8; color: #197653; font-size: 13px;
        }
        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; min-width: 850px; }
        th { background: #effaf6; color: #63877c; font-size: 11px; text-align: left; }
        th,td { padding: 13px 11px; border-bottom: 1px solid #edf3f0; vertical-align: top; }
        td { font-size: 12px; }
        .badge {
            display: inline-block; border-radius: 20px; padding: 6px 9px;
            background: #fff0c7; color: #8b6917; font-size: 10px; font-weight: 700;
        }
        .priority-high { background: #ffe1e9; color: #b34366; }
        .priority-medium { background: #fff0c7; color: #8b6917; }
        .priority-low { background: #dff8eb; color: #27785b; }
        input,select,textarea {
            width: 100%; border: 1px solid #d9ebe4; background: #fbfffd;
            border-radius: 10px; padding: 9px; font: inherit; font-size: 11px;
            margin-bottom: 7px; color: #31564f;
        }
        textarea { min-height: 55px; resize: vertical; }
        button,.btn {
            border: 0; border-radius: 11px; background: #59cdb2; color: #164f43;
            font: inherit; font-size: 11px; font-weight: 700; padding: 10px 13px;
            cursor: pointer; text-decoration: none; display: inline-block;
        }
        button:hover,.btn:hover { background: #9be8d5; }
        .empty { text-align: center; padding: 35px; color: #78938b; }
        .logout { background: #ffe1e9; color: #9e4560; }
       .filter-form {
    display: grid;
    grid-template-columns: minmax(200px, 2fr) 1fr 1fr auto auto;
    gap: 10px;
    align-items: start;
    margin-bottom: 20px;
}

.filter-form input,
.filter-form select {
    margin-bottom: 0;
    min-height: 40px;
}

.filter-form button,
.filter-form .btn {
    min-height: 40px;
    white-space: nowrap;
}

@media (max-width: 800px) {
    .filter-form {
        grid-template-columns: 1fr 1fr;
    }

    .filter-form input {
        grid-column: 1 / -1;
    }
}

@media (max-width: 450px) {
    .filter-form {
        grid-template-columns: 1fr;
    }

    .filter-form input {
        grid-column: auto;
    }
}
        @media(max-width:800px) { .stats { grid-template-columns: repeat(2,minmax(0,1fr)); } }
        @media(max-width:450px) { .stats { grid-template-columns: 1fr 1fr; gap: 9px; } .stat,.panel { padding: 15px; } }
    </style>
</head>
<body>
<div class="container">
    <header class="topbar">
        <div>
            <div class="brand">🌷 Aduin<span>Aja</span></div>
            <div class="subtitle">Panel pengelolaan laporan fasilitas kampus</div>
        </div>
        <div>
            <span class="pill">🛡️ ADMIN</span>
            <a class="btn logout" href="{{ route('dashboard') }}">Dashboard Mahasiswa</a>
        </div>
    </header>

    <h1>Halo, Admin! 👋</h1>
    <p class="intro">Yuk, pantau dan bantu selesaikan laporan fasilitas kampus.</p>

    @if(session('success'))
        <div class="alert">🌼 {{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert" style="background:#ffe1e9;color:#9e4560">
            Periksa kembali data: {{ $errors->first() }}
        </div>
    @endif

    <section class="stats">
        <div class="stat"><div class="emoji">📋</div><p>Total Laporan</p><strong>{{ $totalReports }}</strong></div>
        <div class="stat"><div class="emoji">📨</div><p>Menunggu Tindakan</p><strong>{{ $pendingReports }}</strong></div>
        <div class="stat"><div class="emoji">🛠️</div><p>Sedang Ditangani</p><strong>{{ $processingReports }}</strong></div>
        <div class="stat"><div class="emoji">🌟</div><p>Selesai</p><strong>{{ $completedReports }}</strong></div>
    </section>

    <section class="panel">
    <h2>💌 Semua Laporan Mahasiswa</h2>

    <form method="GET" action="{{ route('admin.index') }}" class="filter-form">
        <input
            type="text"
            name="search"
            placeholder="🔎 Cari judul, kategori, lokasi, pelapor..."
            value="{{ request('search') }}"
        >

        <select name="status">
            <option value="">Semua Status</option>
            @foreach(['Diajukan','Diverifikasi','Diproses','Selesai','Ditolak'] as $status)
                <option value="{{ $status }}" {{ request('status') === $status ? 'selected' : '' }}>
                    {{ $status }}
                </option>
            @endforeach
        </select>

        <select name="priority">
            <option value="">Semua Prioritas</option>
            @foreach(['Rendah','Sedang','Tinggi'] as $priority)
                <option value="{{ $priority }}" {{ request('priority') === $priority ? 'selected' : '' }}>
                    {{ $priority }}
                </option>
            @endforeach
        </select>

        <button type="submit">🔍 Cari & Filter</button>
        <a href="{{ route('admin.index') }}" class="btn">Reset</a>
    </form>
        @if($reports->isEmpty())
            <div class="empty">🌱 Belum ada laporan masuk.</div>
        @else
        <div class="table-wrap">
            <table>
                <thead>
                <tr>
                    <th>Laporan</th>
                    <th>Pelapor</th>
                    <th>Prioritas</th>
                    <th>Status</th>
                    <th>Ubah Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reports as $report)
                <tr>
                    <td>
                        <strong>{{ $report->title }}</strong><br>
                        <span style="color:#78938b">{{ $report->category }}</span><br>
                        📍 {{ $report->location }}<br>
                        <p>{{ $report->description }}</p>
                        @if($report->photo)
                            <a href="{{ asset('storage/'.$report->photo) }}" target="_blank">📷 Lihat foto</a>
                        @endif
                        @if($report->status === 'Ditolak' && $report->rejection_reason)
                            <p style="color:#bd5272">Alasan: {{ $report->rejection_reason }}</p>
                        @endif
                    </td>
                    <td>
                        {{ $report->user?->name ?? 'Pengguna' }}<br>
                        <span style="color:#78938b">{{ $report->user?->email }}</span>
                    </td>
                    <td>
                        <span class="badge {{ $report->priority === 'Tinggi' ? 'priority-high' : ($report->priority === 'Rendah' ? 'priority-low' : 'priority-medium') }}">
                            {{ $report->priority }}
                        </span>
                    </td>
                    <td><span class="badge">{{ $report->status }}</span></td>
                    <td style="min-width:190px">
                        <form method="POST" action="{{ route('admin.reports.updateStatus',$report) }}">
                            @csrf
                            @method('PATCH')
                            <select name="priority" required>
    @foreach(['Rendah','Sedang','Tinggi'] as $priority)
        <option value="{{ $priority }}"
            {{ $report->priority === $priority ? 'selected' : '' }}>
            Prioritas {{ $priority }}
        </option>
    @endforeach
</select>
                            <select name="status" class="status-select" required>
                                @foreach(['Diajukan','Diverifikasi','Diproses','Selesai','Ditolak'] as $status)
                                    <option value="{{ $status }}" {{ $report->status === $status ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                            <textarea name="rejection_reason" class="reason-field" placeholder="Alasan penolakan (jika ditolak)">{{ $report->rejection_reason }}</textarea>
                            <button type="submit">💾 Simpan Status</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </section>

    <p class="subtitle" style="text-align:center">Dibuat dengan 💚 untuk kampus yang lebih nyaman · AduinAja</p>
</div>
<script>
document.querySelectorAll('form').forEach(function(form) {
    const status = form.querySelector('.status-select');
    const reason = form.querySelector('.reason-field');
    function toggleReason() {
        reason.style.display = status.value === 'Ditolak' ? 'block' : 'none';
    }
    status.addEventListener('change', toggleReason);
    toggleReason();
});
</script>
</body>
</html>