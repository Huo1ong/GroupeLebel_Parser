<?php

namespace App\Imports;

use App\Models\Magikpaies;
use App\Models\Smaat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class MagikpaiesImport implements ToModel, WithStartRow, WithValidation, WithCustomCsvSettings
{
    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'ISO-8859-1',
            'delimiter' => ';'
        ];
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        Magikpaies::create(
            [
                'matricule'=>$row[0],
                'nom'=>$row[1],
                'prenom'=>$row[2],
                'adresse'=>$row[3],
                'ville'=>$row[4],
                'province'=>$row[5],
                'cp'=>$row[6],
                'tel_res'=>$row[7],
                'tel_cel'=>$row[8],
                'date_naissance'=>$row[9],
                'date_embauche'=>$row[10],
                'taux'=>$row[11],
                'langue'=>$row[12],
                'courriel_pro'=>$row[13],
                'sexe'=>$row[14],
                'statut_employe'=>$row[15],
                'cellulaire'=>$row[16]
            ]
        );

        Smaat::create(
            [
                'matricule'=>$row[0],
                'prenom'=>$row[2],
                'nom'=>$row[1],
                'sexe'=>$row[14],
                'date_naissance'=>$row[9],
                'adresse'=>$row[3],
                'ville'=>$row[4],
                'province'=>$row[5],
                'pays'=>value('CANADA'), //VALEUR PAR DÉFAUT INTÉGRÉE AUTOMATIQUEMENT
                'cp'=>$row[6],
                'tel_res'=>$row[7],
                'tel_cel'=>$row[8],
                'courriel_pro'=>$row[13],
                'desc_fr'=>value('.'), //VALEUR PAR DÉFAUT INTÉGRÉE AUTOMATIQUEMENT
                'desc_an'=>value('.'), //VALEUR PAR DÉFAUT INTÉGRÉE AUTOMATIQUEMENT
                'statut_employe'=>$row[15],
                'date_embauche'=>$row[10],
                'compagnie'=>value('000G1313'),
                'compagnie2'=>value('000G1313'),
                'taux'=>$row[11],
            ]
        );
    }

    //Pour COMMNENCER A LA LIGNE 2 (SANS PRENDRE EN-TÊTE)
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    public function rules(): array
    {
        return [
            '0' => 'required',
            '1' => 'required',
            '2' => 'required',
            '3' => 'required',
            '4' => 'required',
            '5' => 'required',
            '6' => 'required',
            '7' => '', //same
            '8' => '', //Car vide certaines fois donc pas de nécessité d'y avoir une obligation
            '9' => 'required',
            '10' => 'required',
            '11' => '', //same
            '12' => '', //same
            '13' => '', //same
            '14' => '', //same
            '15' => 'required',
            '16' => '', //same
        ];
    }
}
