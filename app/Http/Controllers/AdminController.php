<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\ReportNotification;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        abort_unless(auth()->user()?->role === 'admin', 403);

        $totalReports = Report::count();
        $pendingReports = Report::where('status', 'Diajukan')->count();

        $processingReports = Report::whereIn('status', [
            'Diverifikasi',
            'Diproses',
        ])->count();

        $completedReports = Report::where('status', 'Selesai')->count();

        $search = request('search');
$statusFilter = request('status');
$priorityFilter = request('priority');

$reports = Report::with('user')
    ->when($search, function ($query, $search) {
        $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('category', 'like', "%{$search}%")
              ->orWhere('location', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%")
              ->orWhereHas('user', function ($userQuery) use ($search) {
                  $userQuery->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
              });
        });
    })
    ->when($statusFilter, fn ($query) => $query->where('status', $statusFilter))
    ->when($priorityFilter, fn ($query) => $query->where('priority', $priorityFilter))
    ->latest()
    ->get();

        return view('admin.index', compact(
            'totalReports',
            'pendingReports',
            'processingReports',
            'completedReports',
            'reports'
        ));
    }

    public function updateStatus(Request $request, Report $report)
    {
        abort_unless(auth()->user()?->role === 'admin', 403);

        $validated = $request->validate([
    'status' => 'required|in:Diajukan,Diverifikasi,Diproses,Selesai,Ditolak',
    'priority' => 'required|in:Rendah,Sedang,Tinggi',
    'rejection_reason' => 'nullable|required_if:status,Ditolak|string|max:1000',
]);
        $oldStatus = $report->status;
        $newStatus = $validated['status'];

        if ($oldStatus !== $newStatus) {
            $report->update([
                'status' => $newStatus,
                'priority' => $validated['priority'],
                'rejection_reason' => $newStatus === 'Ditolak'
                    ? ($validated['rejection_reason'] ?? null)
                    : null,
            ]);

            ReportNotification::create([
                'report_id' => $report->id,
                'user_id' => $report->user_id,
                'message' => 'Status laporan "' . $report->title .
                    '" berubah dari ' . $oldStatus . ' menjadi ' . $newStatus . '.',
                'old_status' => $oldStatus,
                'new_status' => $newStatus,
            ]);
        } else {
            $report->update([
                'rejection_reason' => $newStatus === 'Ditolak'
                    ? ($validated['rejection_reason'] ?? null)
                    : null,
            ]);
        }

        return redirect()
            ->route('admin.index')
            ->with('success', 'Status laporan berhasil diperbarui! 🌷');
    }
}