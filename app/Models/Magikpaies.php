<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magikpaies extends Model
{
    use HasFactory;
    protected $fillable = [
        'matricule', //OK
        'nom', //OK
        'prenom', //OK
        'adresse', //OK
        'ville', //OK
        'province', //OK
        //MANQUE PAYS
        'cp', //OK
        'tel_res', //OK
        'tel_cel', //OK
        'date_naissance', //OK
        'date_embauche', //OK
        'taux', //OK
        'langue',
        'courriel_pro', //OK
        'sexe', //OK
        'statut_employe', //OK
        'cellulaire'
    ];

    //DATES
    /*protected $dates = [
        'expired_at',
    ];

    //Changement du format de la date de naissance
    public function setDateFormat($value)
    {
        $this->attributes['date_de_naissance'] = Carbon::createFromFormat('Y/m/d', $value)->format('Y-m-d');

        //$date = str_replace('/', '-', $request->stockupdate);
        //$newDate = date("Y-m-d", strtotime($date));
    }*/
}
