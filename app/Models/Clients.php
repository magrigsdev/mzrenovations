<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    protected $table = 'Clients';
    protected $fillable = ['nom','email','sexe','tel','adresse'];

    public function devis()
    {
        return $this->hasMany(Devis::class);
    }

    public function travaux()
    {
        return $this->hasMany(Travaux::class);
    }
}
