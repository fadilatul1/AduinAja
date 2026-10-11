<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\ReportNotification;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $reports = Report::where('user_id', $userId);

        $totalReports = (clone $reports)->count();

        $processingReports = (clone $reports)
            ->whereIn('status', [
                'Diajukan',
                'Diverifikasi',
                'Diproses',
            ])
            ->count();

        $completedReports = (clone $reports)
            ->where('status', 'Selesai')
            ->count();

        $latestReports = (clone $reports)
            ->latest()
            ->take(5)
            ->get();

        $notifications = ReportNotification::where('user_id', $userId)
            ->latest()
            ->take(5)
            ->get();

        $unreadNotifications = ReportNotification::where('user_id', $userId)
            ->whereNull('read_at')
            ->count();

        return view('dashboard', compact(
            'totalReports',
            'processingReports',
            'completedReports',
            'latestReports',
            'notifications',
            'unreadNotifications'
        ));
    }
    
public function markNotificationRead(\App\Models\ReportNotification $notification)
{
    abort_unless($notification->user_id === auth()->id(), 403);

    $notification->update([
        'read_at' => now(),
    ]);

    return redirect()
        ->route('dashboard')
        ->with('success', 'Notifikasi berhasil ditandai sudah dibaca! 🌷');
}
}