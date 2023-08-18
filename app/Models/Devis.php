<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    use HasFactory;
    protected $table = 'Devis';

    protected $fillable = ['date_debut',
    'date_fin','message', 'titre',
    'description','montants','valider'];

    public function clients()
    {
        return $this->belongsTo(Clients::class);
    }
    
}
