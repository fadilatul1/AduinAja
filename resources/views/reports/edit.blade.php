<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Laporan | AduinAja</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 35px 18px;
            font-family: 'Poppins', sans-serif;
            color: #365b57;
            background: linear-gradient(135deg, #f8fffc, #e2faf3);
            min-height: 100vh;
        }

        .container {
            max-width: 760px;
            margin: auto;
        }

        .back {
            display: inline-block;
            color: #399e85;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .card {
            background: white;
            padding: 32px;
            border-radius: 26px;
            box-shadow: 0 18px 55px #365b5718;
        }

        h1 { margin-top: 0; font-size: 27px; }
        .subtitle { color: #78938e; line-height: 1.7; }

        label {
            display: block;
            font-weight: 600;
            font-size: 13px;
            margin: 20px 0 8px;
        }

        input, select, textarea {
            width: 100%;
            padding: 13px 15px;
            border: 1.5px solid #dcefe8;
            border-radius: 13px;
            font: inherit;
            color: #365b57;
            background: #fbfffd;
        }

        textarea { min-height: 130px; resize: vertical; }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #79d7bf;
            box-shadow: 0 0 0 4px #b9f3e455;
        }

        .current-photo {
            max-width: 180px;
            display: block;
            border-radius: 14px;
            margin: 10px 0;
        }

        .actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 25px;
        }

        .btn {
            display: inline-block;
            border: none;
            border-radius: 13px;
            padding: 12px 20px;
            font: inherit;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
        }

        .save { background: #55b99f; color: white; }
        .cancel { background: #e2faf3; color: #365b57; }

        .error { color: #d95d78; font-size: 13px; margin-top: 5px; }

        @media (max-width: 600px) {
            .card { padding: 23px; }
            h1 { font-size: 23px; }
        }
    </style>
</head>
<body>
<div class="container">
    <a href="{{ route('reports.index') }}" class="back">← Kembali ke Laporan</a>

    <div class="card">
        <h1>✏️ Edit Laporan</h1>
        <p class="subtitle">Perbarui informasi laporanmu agar pihak kampus mendapatkan informasi yang tepat. 💚</p>

        @if ($errors->any())
            <div class="error">
                <strong>Periksa kembali isianmu:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reports.update', $report) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="title">Judul Laporan</label>
            <input id="title" name="title" type="text" maxlength="150"
                   value="{{ old('title', $report->title) }}" required>

            <label for="category">Kategori</label>
            <select id="category" name="category" required>
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
                        @selected(old('category', $report->category) === $category)>
                        {{ $category }}
                    </option>
                @endforeach
            </select>

            <label for="location">Lokasi Fasilitas</label>
            <input id="location" name="location" type="text" maxlength="255"
                   value="{{ old('location', $report->location) }}" required>

            <label for="description">Deskripsi Masalah</label>
            <textarea id="description" name="description" maxlength="3000" required>{{ old('description', $report->description) }}</textarea>

            @if ($report->photo)
                <label>Foto Saat Ini</label>
                <img class="current-photo"
                     src="{{ asset('storage/' . $report->photo) }}"
                     alt="Foto laporan saat ini">
            @endif

            <label for="photo">Ganti Foto (opsional)</label>
            <input id="photo" name="photo" type="file" accept=".jpg,.jpeg,.png,.webp">
            <p class="subtitle" style="font-size:12px;">Format JPG, PNG, atau WEBP. Maksimal 2 MB.</p>

            <div class="actions">
                <button type="submit" class="btn save">💚 Simpan Perubahan</button>
                <a href="{{ route('reports.index') }}" class="btn cancel">Batal</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
