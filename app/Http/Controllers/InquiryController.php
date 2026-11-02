<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InquiryController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email:strict', 'max:254'],
            'service' => ['required', 'string', Rule::in(Inquiry::SERVICES)],
            'message' => ['required', 'string', 'max:500'],
        ]);

        Inquiry::create($data);

        return redirect()->to(route('contact').'#inquiry-form')
            ->with('inquiry_status', 'Your inquiry has been received.');
    }
}
