<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'project_id' => ['nullable', 'integer', 'exists:projects,id'],
            'name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:20', 'regex:/^[0-9+\-\s()]{7,20}$/'],
            'email' => ['nullable', 'email:rfc', 'max:120'],
            'interest' => ['nullable', 'string', 'max:60'],
            'budget' => ['nullable', 'string', 'max:80'],
            'message' => ['nullable', 'string', 'max:1000'],
            'source' => ['nullable', 'string', 'max:80'],
            'website' => ['nullable', 'size:0'], // honeypot
        ]);

        unset($validated['website']);
        $validated['ip_address'] = $request->ip();
        $validated['user_agent'] = substr((string) $request->userAgent(), 0, 255);
        $validated['status'] = 'new';

        Inquiry::create($validated);

        return back()->with('success', 'Thank you. Your request has been received. Our team will contact you shortly.');
    }
}
