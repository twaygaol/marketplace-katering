<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchantController extends Controller
{
    public function edit()
    {
        $merchant = Auth::user()->merchant;

        // Periksa jika merchant adalah null
        if (!$merchant) {
            return redirect()->route('dashboard')->withErrors('Merchant profile not found.');
        }

        return view('merchant.edit', compact('merchant'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'address' => 'required|string',
            'contact' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $merchant = Auth::user()->merchant;

        // Periksa jika merchant adalah null
        if (!$merchant) {
            return redirect()->route('dashboard')->withErrors('Merchant profile not found.');
        }

        $merchant->update($request->all());

        return redirect()->route('merchant.edit')->with('status', 'Profile updated!');
    }
}
