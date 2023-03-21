<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desjardins extends Model
{
    use HasFactory;
    protected $fillable = [
        'matricule',
        'prenom',
        'nom',
        'sexe',
        'date_naissance',
        'adresse',
        'ville',
        'province',
        'pays',
        'cp',
        'tel_res',
        'tel_cel',
        'courriel_pro',
        'desc_fr',
        'desc_an',
        'statut_employe',
        'date_embauche',
        'compagnie',
        'taux'
    ];

}
