<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Project;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'totalProjects' => Project::count(),
            'totalInquiries' => Inquiry::count(),
            'newInquiries' => Inquiry::where('status', 'new')->count(),
            'recentInquiries' => Inquiry::latest()->limit(8)->get(),
        ]);
    }
}
