<?php

namespace App\Exports;

use App\Models\Smaat2;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SmaatExport implements FromCollection, WithHeadings, WithCustomCsvSettings
{
    public function collection()
    {
        //return collect(Smaat2::getSmaat2());

        //5h et non pas 1h car Carbon récupère l'heure actuelle +4h donc 4h + 1h = 5h
        return Smaat2::where('Date_import', '>=', Carbon::now()->subHours(5))->get(array('Matricule','Prénom','Nom','Sexe','vide1','vide2','vide3','vide4','vide5','Date_de_Naissance',
            'vide6','vide7','vide8','vide9','vide10','vide11','Adresse','vide12','Ville','Province_État','Pays','Code_Postal','Téléphone_Résidence','Téléphone_Cellulaire','Courriel_Professionnel',
            'Description_Française','Description_Anglaise','vide13','vide14','vide15','vide16','Statut_Employé','vide17','vide18','vide19','vide20','vide21','Date_Embauche',
            'vide22','Compagnie','vide23','vide24', 'Compagnie2','vide25','vide26','Taux','vide27','vide28','vide29','vide30','vide31','vide32','vide33'));
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';',
            'output_encoding' => 'UTF-8'
        ];
    }

    public function headings():array
    {
        return[
            'Matricule',
            'Prénom',
            'Nom',
            'Sexe',
            '',
            '',
            '',
            '',
            '',
            'Date de Naissance',
            '',
            '',
            '',
            '',
            '',
            '',
            'Adresse',
            '',
            'Ville',
            'Province/État',
            'Pays',
            'Code Postal',
            'Téléphone Résidence',
            'Téléphone Cellulaire',
            'Courriel Professionnel',
            'Description Française',
            'Description Anglaise',
            '',
            '',
            '',
            '',
            'Statut Employé',
            '',
            '',
            '',
            '',
            '',
            'Date Embauche',
            '',
            'Compagnie',
            '',
            '',
            'Compagnie',
            '',
            '',
            'Taux',
            '',
            '',
            '',
            '',
            '',
            '',
            ''
        ];
    }
}
