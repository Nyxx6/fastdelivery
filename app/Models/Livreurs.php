<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livreurs extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom','tel','email','ville','date_embauche'];
}
