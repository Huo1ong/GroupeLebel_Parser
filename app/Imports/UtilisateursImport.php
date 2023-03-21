<?php

namespace App\Imports;

use App\Models\Utilisateur;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UtilisateursImport implements ToModel, WithStartRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $data = [
            'nom'=>$row[0],
            'prenom'=>$row[1],
            'mail'=>$row[2],
            'age'=>$row[3]
        ];
        Utilisateur::create($data);
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
            '0' => 'required',
            '1' => 'required',
            '2' => 'required|unique:utilisateurs,mail',
            '3' => 'required'
        ];

    }

    public function customValidationMessages()
    {
        return [
            '2.unique' => 'Il existe déjà cette adresse mail dans les bases de données.',
        ];
    }
}
