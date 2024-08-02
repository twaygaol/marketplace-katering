<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $merchant = $user->merchant;

        // Periksa jika merchant adalah null
        if (!$merchant) {
            return redirect()->route('dashboard')->withErrors('Merchant profile not found.');
        }

        $menus = $merchant->menus;
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        // Periksa jika merchant adalah null
        if (!Auth::user()->merchant) {
            return redirect()->route('dashboard')->withErrors('Merchant profile not found.');
        }

        return view('menus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'photo' => 'nullable|image|max:2048',
        ]);

        $user = Auth::user();
        $merchant = $user->merchant;

        // Periksa jika merchant adalah null
        if (!$merchant) {
            return redirect()->route('dashboard')->withErrors('Merchant profile not found.');
        }

        $menu = new Menu();
        $menu->merchant_id = $merchant->id;
        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->price = $request->price;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('menu_photos', 'public');
            $menu->photo = $photoPath;
        }

        $menu->save();

        return redirect()->route('menus.index')->with('status', 'Menu created!');
    }

    public function edit(Menu $menu)
    {
        // Periksa jika merchant adalah null
        if (!Auth::user()->merchant) {
            return redirect()->route('dashboard')->withErrors('Merchant profile not found.');
        }

        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'photo' => 'nullable|image|max:2048',
        ]);

        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->price = $request->price;

        if ($request->hasFile('photo')) {
            if ($menu->photo) {
                Storage::disk('public')->delete($menu->photo);
            }
            $photoPath = $request->file('photo')->store('menu_photos', 'public');
            $menu->photo = $photoPath;
        }

        $menu->save();

        return redirect()->route('menus.index')->with('status', 'Menu updated!');
    }

    public function destroy(Menu $menu)
    {
        if ($menu->photo) {
            Storage::disk('public')->delete($menu->photo);
        }
        $menu->delete();
        return redirect()->route('menus.index')->with('status', 'Menu deleted!');
    }
}
