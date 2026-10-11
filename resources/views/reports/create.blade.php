<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Laporan | AduinAja</title>

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
            justify-content: space-between;
            align-items: center;
            padding: 20px 7%;
            background: white;
            box-shadow: 0 4px 20px #365b570b;
        }

        .logo {
            font-size: 24px;
            font-weight: 800;
            color: #365b57;
            text-decoration: none;
        }

        .logo span { color: #55b99f; }

        .back {
            color: #557b74;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .container {
            width: min(760px, 92%);
            margin: 38px auto 60px;
        }

        .heading { margin-bottom: 24px; }

        .heading .eyebrow {
            color: #399e85;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .heading h1 {
            font-size: clamp(25px, 5vw, 34px);
            margin: 8px 0;
            font-weight: 800;
        }

        .heading p {
            margin: 0;
            color: #78938e;
            font-size: 13px;
            line-height: 1.8;
        }

        .form-card {
            background: white;
            padding: 32px;
            border: 1px solid #e4f2ec;
            border-radius: 26px;
            box-shadow: 0 15px 45px #365b5710;
        }

        .form-group { margin-bottom: 22px; }

        label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .required { color: #e27894; }

        input, select, textarea {
            width: 100%;
            padding: 13px 15px;
            border: 1.5px solid #dcefe8;
            border-radius: 13px;
            background: #fbfffd;
            font-family: inherit;
            font-size: 13px;
            color: #365b57;
            outline: none;
            transition: .2s;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #79d7bf;
            box-shadow: 0 0 0 4px #b9f3e455;
        }

        textarea {
            min-height: 135px;
            resize: vertical;
        }

        .hint {
            display: block;
            margin-top: 7px;
            font-size: 11px;
            color: #78938e;
            line-height: 1.7;
        }

        .error {
            color: #d95d78;
            margin-top: 7px;
            font-size: 12px;
        }

        .alert {
            background: #fff0f3;
            color: #a34e68;
            padding: 14px 17px;
            border-radius: 13px;
            margin-bottom: 22px;
            font-size: 13px;
        }

        .tip {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            padding: 16px;
            margin-bottom: 24px;
            border-radius: 15px;
            background: #e2faf3;
            font-size: 12px;
            line-height: 1.8;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            border: none;
            border-radius: 13px;
            padding: 13px 20px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: .2s;
        }

        .btn-back { background: #f1f7f4; color: #557b74; }

        .btn-submit {
            background: #55b99f;
            color: white;
            box-shadow: 0 7px 18px #55b99f35;
        }

        .btn-submit:hover {
            background: #399e85;
            transform: translateY(-2px);
        }

        footer {
            text-align: center;
            padding: 22px;
            color: #78938e;
            font-size: 11px;
        }

        @media (max-width: 600px) {
            nav { padding: 17px 5%; }
            .logo { font-size: 20px; }
            .container { margin-top: 25px; }
            .form-card { padding: 22px 18px; }
            .actions { flex-direction: column-reverse; }
            .actions .btn { width: 100%; text-align: center; }
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
            <span class="eyebrow">💌 SUARAMU BERARTI</span>
            <h1>Ayo, Aduin aja! 🌼</h1>
            <p>
                Ceritakan fasilitas kampus yang bermasalah agar bisa
                segera ditindaklanjuti oleh pihak kampus.
            </p>
        </header>

        <form
            class="form-card"
            method="POST"
            action="{{ route('reports.store') }}"
            enctype="multipart/form-data"
        >
            @csrf

            @if ($errors->any())
                <div class="alert">
                    <strong>Ups, periksa kembali ya!</strong>
                    <ul style="padding-left:20px; margin-bottom:0;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="tip">
                <span style="font-size:22px;">💡</span>
                <div>
                    <strong>Tips laporan yang baik</strong><br>
                    Jelaskan masalah secara spesifik dan tuliskan lokasi
                    dengan jelas agar petugas mudah menemukannya.
                </div>
            </div>

            <div class="form-group">
                <label for="title">Judul Laporan <span class="required">*</span></label>
                <input
                    id="title"
                    name="title"
                    type="text"
                    maxlength="150"
                    value="{{ old('title') }}"
                    placeholder="Contoh: Lampu kelas mati"
                    required
                >
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="category">Kategori Masalah <span class="required">*</span></label>
                <select id="category" name="category" required>
                    <option value="">Pilih kategori masalah</option>
                    @foreach ([
                        'Listrik dan Penerangan',
                        'Air dan Sanitasi',
                        'Ruang Kelas',
                        'Toilet',
                        'Meja dan Kursi',
                        'Internet dan Jaringan',
                        'Kebersihan',
                        'Keamanan',
                        'Fasilitas Lainnya'
                    ] as $category)
                        <option value="{{ $category }}"
                            @selected(old('category') === $category)>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
                @error('category')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="location">Lokasi Fasilitas <span class="required">*</span></label>
                <input
                    id="location"
                    name="location"
                    type="text"
                    maxlength="255"
                    value="{{ old('location') }}"
                    placeholder="Contoh: Gedung A, lantai 2, ruang 204"
                    required
                >
                @error('location')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Deskripsi Masalah <span class="required">*</span></label>
                <textarea
                    id="description"
                    name="description"
                    maxlength="3000"
                    placeholder="Ceritakan kondisi fasilitas, sejak kapan terjadi, dan dampaknya..."
                    required
                >{{ old('description') }}</textarea>
                <span class="hint">Tuliskan detail yang membantu petugas memahami masalah.</span>
                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="photo">Foto Bukti <span style="color:#78938e;">(opsional)</span></label>
                <input
                    id="photo"
                    name="photo"
                    type="file"
                    accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                >
                <span class="hint">Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.</span>
                @error('photo')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="actions">
                <a href="{{ route('dashboard') }}" class="btn btn-back">
                    Batal
                </a>
                <button type="submit" class="btn btn-submit">
                    📩 Kirim Laporan
                </button>
            </div>
        </form>
    </main>

    <footer>🌷 AduinAja — Ada masalah? Aduin aja! 💚</footer>
</body>
</html>

