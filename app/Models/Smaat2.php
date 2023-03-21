<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Smaat2 extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $table = "smaatexports";

    //Export de la table "Smaats"
    public static function getSmaat2()
    {
        $records = DB::table('smaatexports')->select('Matricule','Prénom','Nom','Sexe','vide1','vide2','vide3','vide4','vide5','Date_de_Naissance',
            'vide6','vide7','vide8','vide9','vide10','vide11','Adresse','vide12','Ville','Province_État','Pays','Code_Postal','Téléphone_Résidence','Téléphone_Cellulaire','Courriel_Professionnel',
            'Description_Française','Description_Anglaise','vide13','vide14','vide15','vide16','Statut_Employé','vide17','vide18','vide19','vide20','vide21','Date_Embauche',
            'vide22','Compagnie','vide23','vide24', 'Compagnie2','vide25','vide26','Taux','vide27','vide28','vide29','vide30','vide31','vide32','vide33')->get()->toArray();
        return $records;
    }
}
