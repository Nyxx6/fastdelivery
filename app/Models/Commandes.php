<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commandes extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'prix'];
    public function produit()
    {
        return $this->belongsTo(Produits::class, 'id_produit');
    }

    public function livreur()
    {
        return $this->belongsTo(Livreurs::class, 'id_livreur');
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurants::class, 'id_restaurant');
    }

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'id_utilisateur');
    }
}
