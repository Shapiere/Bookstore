<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;

class ContactController extends Controller
{
    public function show()
    {
        return view('pages.contact');
    }

    public function store(StoreMessageRequest $request)
    {
        Message::create([
            ...$request->validated(),
            'user_id' => $request->user()?->id,
        ]);

        return back()->with('success', 'Pesan Anda berhasil dikirim. Admin akan membalas melalui email.');
    }
}
