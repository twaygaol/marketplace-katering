<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    // Tambahkan hubungan dengan Menu
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
