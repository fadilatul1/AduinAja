<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('reports.index', compact('reports'));
    }

    public function create()
    {
        return view('reports.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'category' => 'required|string|max:100',
            'location' => 'required|string|max:255',
            'description' => 'required|string|max:3000',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')
                ->store('reports', 'public');
        }

        $validated['user_id'] = Auth::id();
        $validated['priority'] = $this->determinePriority(
            $validated['category'],
            $validated['description']
        );
        $validated['status'] = 'Diajukan';

        Report::create($validated);

        return redirect()
            ->route('reports.index')
            ->with('success', 'Laporan berhasil dikirim! Terima kasih sudah membantu kampus. 💚');
    }

private function determinePriority(string $category, string $description): string
{
    $text = strtolower($category . ' ' . $description);

    // Prioritas tinggi: kondisi darurat atau berisiko keselamatan
    $highKeywords = [
        'kebakaran',
        'korsleting',
        'kabel terbuka',
        'kabel terkelupas',
        'tersengat listrik',
        'banjir',
        'air meluap',
        'ambruk',
        'roboh',
        'bocor parah',
        'membahayakan',
        'darurat',
        'berbahaya',
        'asap',
    ];

    foreach ($highKeywords as $keyword) {
        if (str_contains($text, $keyword)) {
            return 'Tinggi';
        }
    }

    // Prioritas sedang: kerusakan yang mengganggu aktivitas
    $mediumKeywords = [
        'rusak',
        'patah',
        'bocor',
        'pecah',
        'macet',
        'tidak berfungsi',
        'mati',
        'gangguan',
        'bermasalah',
        'tidak menyala',
        'tidak bisa digunakan',
    ];

    foreach ($mediumKeywords as $keyword) {
        if (str_contains($text, $keyword)) {
            return 'Sedang';
        }
    }

    // Prioritas rendah: masalah ringan tanpa kata kunci di atas
    return 'Rendah';
}

public function edit(Report $report)
{
    abort_if($report->user_id !== auth()->id(), 403);

    return view('reports.edit', compact('report'));
}

public function update(Request $request, Report $report)
{
    abort_if($report->user_id !== auth()->id(), 403);

    $validated = $request->validate([
        'title' => 'required|string|max:150',
        'category' => 'required|string|max:100',
        'location' => 'required|string|max:255',
        'description' => 'required|string|max:3000',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    if ($request->hasFile('photo')) {
        if ($report->photo) {
            \Illuminate\Support\Facades\Storage::disk('public')
                ->delete($report->photo);
        }

        $validated['photo'] = $request->file('photo')
            ->store('reports', 'public');
    }

    $report->update($validated);

    return redirect()
        ->route('reports.index')
        ->with('success', 'Laporan berhasil diperbarui! 💚');
}

public function destroy(Report $report)
{
    abort_if($report->user_id !== auth()->id(), 403);

    if ($report->photo) {
        \Illuminate\Support\Facades\Storage::disk('public')
            ->delete($report->photo);
    }

    $report->delete();

    return redirect()
        ->route('reports.index')
        ->with('success', 'Laporan berhasil dihapus! 🌷');
}

}