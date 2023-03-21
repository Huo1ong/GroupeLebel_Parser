<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Smaat extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $table = "smaats";

    //Export de la table "Smaats"
    public static function getSmaat()
    {
        $records = DB::table('smaats')->select('matricule','prenom','nom','sexe','vide1','vide2','vide3','vide4','vide5','date_naissance','vide6','vide7','vide8','vide9','vide10',
            'vide11','adresse','vide12','ville','province','pays','cp','tel_res','tel_cel','courriel_pro','desc_fr','desc_an','vide13','vide14','vide15','vide16','statut_employe','vide17','vide18',
            'vide19','vide20','vide21','date_embauche','vide22','compagnie','vide23','vide24', 'compagnie2','vide25','vide26','taux','vide27','vide28','vide29','vide30','vide31','vide32')->get()->toArray();;

        //$recordsComp = DB::table('numcompagnie')->select('lieu')->get()->toArray();;

        /*$records2 = DB::table('smaats')->select('vide23','vide24', 'compagnie2','vide25','vide26','taux','vide27','vide28','vide29','vide30','vide31','vide32')->get()->toArray();
*/
        return $records /*& $recordsComp & $records2*/;
    }
}
