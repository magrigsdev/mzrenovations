<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateurs extends Model
{
    use HasFactory;
    protected $table = 'utilisateurs';
    protected $fillable = ['nom',
    'email','motpasse'];

    public function profil()
    {
        return $this->belongsTo(Profil::class);
    }

    
}
