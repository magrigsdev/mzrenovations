<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travaux extends Model
{
    use HasFactory;
    protected $table = 'travaux';
    protected $fillable = ['date_debut',
    'date_fin','titre', 'description',
    'montants'];

    public function clients()
    {
        return $this->belongsTo(Clients::class);
    }

    
}
