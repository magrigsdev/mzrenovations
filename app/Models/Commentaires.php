<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaires extends Model
{
    use HasFactory;
    protected $table = 'Commentaires';
    protected $fillable = ['nom','email','message'];
}
