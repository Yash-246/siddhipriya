<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InquiryController extends Controller
{
    public function index(Request $request): View
    {
        $query = Inquiry::query()->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->string('status'));
        }

        return view('admin.inquiries.index', [
            'inquiries' => $query->paginate(30)->withQueryString(),
        ]);
    }

    public function show(Inquiry $inquiry): View
    {
        if ($inquiry->status === 'new') {
            $inquiry->update(['status' => 'seen']);
        }

        return view('admin.inquiries.show', compact('inquiry'));
    }

    public function updateStatus(Request $request, Inquiry $inquiry): RedirectResponse
    {
        $request->validate(['status' => ['required', 'in:new,seen,contacted,closed']]);
        $inquiry->update(['status' => $request->status]);

        return back()->with('success', 'Inquiry status updated.');
    }

    public function destroy(Inquiry $inquiry): RedirectResponse
    {
        $inquiry->delete();
        return redirect()->route('admin.inquiries.index')->with('success', 'Inquiry deleted.');
    }
}
