<?php

namespace App\Imports;

use App\Models\Desjardins;
use App\Models\Smaat;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithValidation;

class DesjardinsImport implements ToModel, WithStartRow, WithValidation, WithCustomCsvSettings, WithUpserts
{
    use Importable;

    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'ISO-8859-1',
            //'input_encoding' => 'UTF-8',
            'delimiter' => ';'
            //'delimiter' => ','
        ];
    }

    public function uniqueBy()
    {
        return 'statut_employe';
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        Desjardins::create(
            [
                'matricule'=>$row[0],
                'prenom'=>$row[1],
                'nom'=>$row[2],
                'sexe'=>$row[3],
                'date_naissance'=>$row[4],
                'adresse'=>$row[5],
                'ville'=>$row[6],
                'province'=>$row[7],
                'pays'=>$row[8],
                'cp'=>$row[9],
                'tel_res'=>$row[10],
                'tel_cel'=>$row[11],
                'courriel_pro'=>$row[12],
                'desc_fr'=>$row[13],
                'desc_an'=>$row[14],
                'statut_employe'=>$row[15],
                'date_embauche'=>$row[16],
                'compagnie'=>$row[17],
                'taux'=>$row[18]
            ]
        );

        Smaat::create(
            [
                'matricule'=>$row[0],
                'prenom'=>$row[1],
                'nom'=>$row[2],
                'sexe'=>$row[3],
                'date_naissance'=>$row[4],
                'adresse'=>$row[5],
                'ville'=>$row[6],
                'province'=>$row[7],
                'pays'=>$row[8],
                'cp'=>$row[9],
                'tel_res'=>$row[10],
                'tel_cel'=>$row[11],
                'courriel_pro'=>$row[12],
                'desc_fr'=>$row[13],
                'desc_an'=>$row[14],
                'statut_employe'=>$row[15],
                'date_embauche'=>$row[16],
                'compagnie'=>$row[17],
                'compagnie2'=>$row[17],
                'taux'=>$row[18],
            ]
        );
    }

    //Pour COMMNENCER A LA LIGNE 2
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
            '0' => 'required',                      //matricule
            '1' => 'required',                      //prénom
            '2' => 'required',                      //nom
            '4' => 'required|dateformat:Y/m/d',     //date de naissance
            '16' => 'required|dateformat:Y/m/d',    //date d'embauche
            '17' => 'required'                      //compagnie
        ];
    }
}
