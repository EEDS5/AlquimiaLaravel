<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuOfertado extends Model
{
    use HasFactory;

    protected $fillable = ['menu_id', 'plato_id'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function plato()
    {
        return $this->belongsTo(Plato::class);
    }

    public function gestionMenus()
    {
        return $this->hasMany(GestionMenu::class);
    }
}
