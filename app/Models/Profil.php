<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;
    protected $table = 'profil';
    protected $fillable = ['nom',
    'email','sexe', 'is_admin',
    'tel'];

    public function utilisateurs()
    {
        return $this->hasMany(Utilisateurs::class);
    }

    public function admin()
    {
        return $this->hasMany(Admin::class);
    }
}
