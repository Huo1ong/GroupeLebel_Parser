<?php

namespace App\Http\Controllers;

use App\Exports\SmaatExport;

use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportIntoExcel()
    {
        //Commande SQL : insérer les données de la table "smaats" et les lieux des compagnies dans la table d'export "smaatexports"
        DB::insert("INSERT INTO smaatexports (Matricule, Prénom, Nom, Sexe, vide1, vide2, vide3, vide4, vide5, Date_de_Naissance, vide6, vide7, vide8, vide9, vide10,
                          vide11, Adresse, vide12, Ville, 	Province_État, Pays, Code_Postal, Téléphone_Résidence, Téléphone_Cellulaire, Courriel_Professionnel, Description_Française,
                          Description_Anglaise, vide13, vide14, vide15, vide16, Statut_Employé, vide17, vide18, vide19, vide20, vide21, Date_Embauche, vide22, Compagnie, vide23, vide24,
                          Compagnie2, vide25, vide26, Taux, vide27, vide28, vide29, vide30, vide31, vide32, Date_Import, Date_Modification)
                            SELECT sm.matricule, sm.prenom, sm.nom, sm.sexe, sm.vide1, sm.vide2, sm.vide3, sm.vide4, sm.vide5, sm.date_naissance, sm.vide6, sm.vide7, sm.vide8, sm.vide9,
                                   sm.vide10, sm.vide11, sm.adresse, sm.vide12, sm.ville, sm.province, sm.pays, sm.cp, sm.tel_res, sm.tel_cel, sm.courriel_pro, sm.desc_fr, sm.desc_an,
                                   sm.vide13, sm.vide14, sm.vide15, sm.vide16, sm.statut_employe, sm.vide17, sm.vide18, sm.vide19, sm.vide20, sm.vide21, sm.date_embauche, sm.vide22,
                                   nmc.lieu, sm.vide23, sm.vide24, nmc.lieu, sm.vide25, sm.vide26, sm.taux, sm.vide27, sm.vide28, sm.vide29, sm.vide30, sm.vide31, sm.vide32, NOW(), NOW()
                            FROM smaats sm, numcompagnie nmc
                            WHERE sm.compagnie = nmc.matricule AND sm.created_at BETWEEN CAST(NOW() - INTERVAL 4 HOUR AS datetime) AND CAST(NOW() + INTERVAL 4 HOUR AS datetime)
                            ORDER BY sm.statut_employe DESC");

        //Commande SQL : retirer les 0 inutiles au début des matricules
        DB::update("UPDATE smaatexports SET Matricule = TRIM(LEADING '0' FROM Matricule)");

        //Commande SQL : retirer les espaces inutiles à la fin de toutes les données
        DB::update("UPDATE desjardins SET matricule = RTRIM(matricule),
                            prenom = RTRIM(prenom),
                            nom = RTRIM(nom),
                            sexe = RTRIM(sexe),
                            date_naissance = RTRIM(date_naissance),
                            adresse = RTRIM(adresse),
                            ville = RTRIM(ville),
                            province = RTRIM(province),
                            pays = RTRIM(pays),
                            cp = RTRIM(cp),
                            tel_res = RTRIM(tel_res),
                            tel_cel = RTRIM(tel_cel),
                            courriel_pro = RTRIM(courriel_pro),
                            desc_fr = RTRIM(desc_fr),
                            desc_an = RTRIM(desc_an),
                            statut_employe = RTRIM(statut_employe),
                            date_embauche = RTRIM(date_embauche),
                            taux = RTRIM(taux)");

        DB::update("UPDATE magikpaies SET matricule = RTRIM(matricule),
                            nom = RTRIM(nom),
                            prenom = RTRIM(prenom),
                            adresse = RTRIM(adresse),
                            ville = RTRIM(ville),
                            province = RTRIM(province),
                            cp = RTRIM(cp),
                            tel_res = RTRIM(tel_res),
                            tel_cel = RTRIM(tel_cel),
                            date_naissance = RTRIM(date_naissance),
                            date_embauche = RTRIM(date_embauche),
                            taux = RTRIM(taux),
                            langue = RTRIM(langue),
                            courriel_pro = RTRIM(courriel_pro),
                            sexe = RTRIM(sexe),
                            statut_employe = RTRIM(statut_employe),
                            cellulaire = RTRIM(cellulaire)");

        DB::update("UPDATE smaatexports SET numeroEgale0 = RTRIM(numeroEgale0),
                            Matricule = RTRIM(Matricule),
                            Prénom = RTRIM(Prénom),
                            Nom = RTRIM(Nom),
                            Sexe = RTRIM(Sexe),
                            Date_de_Naissance = RTRIM(Date_de_Naissance),
                            Adresse = RTRIM(Adresse),
                            Ville = RTRIM(Ville),
                            Province_État = RTRIM(Province_État),
                            Pays = RTRIM(Pays),
                            Code_Postal = RTRIM(Code_Postal),
                            Téléphone_Résidence = RTRIM(Téléphone_Résidence),
                            Téléphone_Cellulaire = RTRIM(Téléphone_Cellulaire),
                            Courriel_Professionnel = RTRIM(Courriel_Professionnel),
                            Description_Française = RTRIM(Description_Française),
                            Description_Anglaise = RTRIM(Description_Anglaise),
                            Statut_Employé = RTRIM(Statut_Employé),
                            Date_Embauche = RTRIM(Date_Embauche),
                            Compagnie = RTRIM(Compagnie),
                            Compagnie2 = RTRIM(Compagnie2),
                            Taux = RTRIM(Taux)");

        //Commande SQL : update et remplacer pour le sexe dans la table "smaatexports" ("Masculin" par "M")
        DB::update("UPDATE smaatexports SET Sexe = replace(Sexe, 'Masculin', 'M') WHERE  Sexe = 'Masculin';");
        //Commande SQL : update et remplacer pour le sexe dans la table "smaatexports" ("Féminin" par "F")
        DB::update("UPDATE smaatexports SET Sexe = replace(Sexe, 'Féminin', 'F') WHERE  Sexe = 'Féminin';");

        //Commande SQL : update et remplacer pour le statut de l'employé dans la table "smaatexports" ("Actif" par "A")
        DB::update("UPDATE smaatexports SET Statut_Employé = replace(Statut_Employé, 'Actif', 'A') WHERE  Statut_Employé = 'Actif';");
        //Commande SQL : update et remplacer pour le statut de l'employé dans la table "smaatexports" ("Inactif" par "I")
        DB::update("UPDATE smaatexports SET Statut_Employé = replace(Statut_Employé, 'Inactif', 'I') WHERE  Statut_Employé = 'Inactif';");

        $nomFichier = date('Y-m-d').'-ImportSMAAT.xlsx';
        Excel::store(new SmaatExport, $nomFichier,'export');

        //Commande SQL : insérer les informations de l'export (nom et date) dans une nouvelle table "historiquesexports"
        DB::insert("INSERT INTO historiquesexports (name, date)
                            VALUES ('$nomFichier',DATE_FORMAT(NOW(), '%Y-%m-%d %T'))");

        return redirect()->route('import.admin')->with('error', 'Téléchargement du fichier ".xlsx" réussi !');
    } //Fin de la méthode "exportIntoExcel"

    public function exportIntoCSV()
    {
        //Commande SQL : insérer les données de la table "smaats" et les lieux des compagnies dans la table d'export "smaatexports"
        DB::insert("INSERT INTO smaatexports (Matricule, Prénom, Nom, Sexe, vide1, vide2, vide3, vide4, vide5, Date_de_Naissance, vide6, vide7, vide8, vide9, vide10,
                          vide11, Adresse, vide12, Ville, 	Province_État, Pays, Code_Postal, Téléphone_Résidence, Téléphone_Cellulaire, Courriel_Professionnel, Description_Française,
                          Description_Anglaise, vide13, vide14, vide15, vide16, Statut_Employé, vide17, vide18, vide19, vide20, vide21, Date_Embauche, vide22, Compagnie, vide23, vide24,
                          Compagnie2, vide25, vide26, Taux, vide27, vide28, vide29, vide30, vide31, vide32, Date_Import, Date_Modification)
                            SELECT sm.matricule, sm.prenom, sm.nom, sm.sexe, sm.vide1, sm.vide2, sm.vide3, sm.vide4, sm.vide5, sm.date_naissance, sm.vide6, sm.vide7, sm.vide8, sm.vide9,
                                   sm.vide10, sm.vide11, sm.adresse, sm.vide12, sm.ville, sm.province, sm.pays, sm.cp, sm.tel_res, sm.tel_cel, sm.courriel_pro, sm.desc_fr, sm.desc_an,
                                   sm.vide13, sm.vide14, sm.vide15, sm.vide16, sm.statut_employe, sm.vide17, sm.vide18, sm.vide19, sm.vide20, sm.vide21, sm.date_embauche, sm.vide22,
                                   nmc.lieu, sm.vide23, sm.vide24, nmc.lieu, sm.vide25, sm.vide26, sm.taux, sm.vide27, sm.vide28, sm.vide29, sm.vide30, sm.vide31, sm.vide32, NOW(), NOW()
                            FROM smaats sm, numcompagnie nmc
                            WHERE sm.compagnie = nmc.matricule AND sm.created_at BETWEEN CAST(NOW() - INTERVAL 4 HOUR AS datetime) AND CAST(NOW() + INTERVAL 4 HOUR AS datetime)
                            ORDER BY sm.statut_employe DESC");

        //Commande SQL : retirer les 0 inutiles au début des matricules
        DB::update("UPDATE smaatexports SET Matricule = TRIM(LEADING '0' FROM Matricule)");

        //Commande SQL : retirer les espaces inutiles à la fin de toutes les données
        DB::update("UPDATE desjardins SET matricule = RTRIM(matricule),
                            prenom = RTRIM(prenom),
                            nom = RTRIM(nom),
                            sexe = RTRIM(sexe),
                            date_naissance = RTRIM(date_naissance),
                            adresse = RTRIM(adresse),
                            ville = RTRIM(ville),
                            province = RTRIM(province),
                            pays = RTRIM(pays),
                            cp = RTRIM(cp),
                            tel_res = RTRIM(tel_res),
                            tel_cel = RTRIM(tel_cel),
                            courriel_pro = RTRIM(courriel_pro),
                            desc_fr = RTRIM(desc_fr),
                            desc_an = RTRIM(desc_an),
                            statut_employe = RTRIM(statut_employe),
                            date_embauche = RTRIM(date_embauche),
                            taux = RTRIM(taux)");

        DB::update("UPDATE magikpaies SET matricule = RTRIM(matricule),
                            nom = RTRIM(nom),
                            prenom = RTRIM(prenom),
                            adresse = RTRIM(adresse),
                            ville = RTRIM(ville),
                            province = RTRIM(province),
                            cp = RTRIM(cp),
                            tel_res = RTRIM(tel_res),
                            tel_cel = RTRIM(tel_cel),
                            date_naissance = RTRIM(date_naissance),
                            date_embauche = RTRIM(date_embauche),
                            taux = RTRIM(taux),
                            langue = RTRIM(langue),
                            courriel_pro = RTRIM(courriel_pro),
                            sexe = RTRIM(sexe),
                            statut_employe = RTRIM(statut_employe),
                            cellulaire = RTRIM(cellulaire)");

        DB::update("UPDATE smaatexports SET numeroEgale0 = RTRIM(numeroEgale0),
                            Matricule = RTRIM(Matricule),
                            Prénom = RTRIM(Prénom),
                            Nom = RTRIM(Nom),
                            Sexe = RTRIM(Sexe),
                            Date_de_Naissance = RTRIM(Date_de_Naissance),
                            Adresse = RTRIM(Adresse),
                            Ville = RTRIM(Ville),
                            Province_État = RTRIM(Province_État),
                            Pays = RTRIM(Pays),
                            Code_Postal = RTRIM(Code_Postal),
                            Téléphone_Résidence = RTRIM(Téléphone_Résidence),
                            Téléphone_Cellulaire = RTRIM(Téléphone_Cellulaire),
                            Courriel_Professionnel = RTRIM(Courriel_Professionnel),
                            Description_Française = RTRIM(Description_Française),
                            Description_Anglaise = RTRIM(Description_Anglaise),
                            Statut_Employé = RTRIM(Statut_Employé),
                            Date_Embauche = RTRIM(Date_Embauche),
                            Compagnie = RTRIM(Compagnie),
                            Compagnie2 = RTRIM(Compagnie2),
                            Taux = RTRIM(Taux)");

        //Commande SQL : update et remplacer pour le sexe dans la table "smaatexports" ("Masculin" par "M")
        DB::update("UPDATE smaatexports SET Sexe = replace(Sexe, 'Masculin', 'M') WHERE  Sexe = 'Masculin';");
        //Commande SQL : update et remplacer pour le sexe dans la table "smaatexports" ("Féminin" par "F")
        DB::update("UPDATE smaatexports SET Sexe = replace(Sexe, 'Féminin', 'F') WHERE  Sexe = 'Féminin';");

        //Commande SQL : update et remplacer pour le statut de l'employé dans la table "smaatexports" ("Actif" par "A")
        DB::update("UPDATE smaatexports SET Statut_Employé = replace(Statut_Employé, 'Actif', 'A') WHERE  Statut_Employé = 'Actif';");
        //Commande SQL : update et remplacer pour le statut de l'employé dans la table "smaatexports" ("Inactif" par "I")
        DB::update("UPDATE smaatexports SET Statut_Employé = replace(Statut_Employé, 'Inactif', 'I') WHERE  Statut_Employé = 'Inactif';");

        $nomFichier = date('Y-m-d').'-ImportSMAAT.csv';

        Excel::store(new SmaatExport, $nomFichier,'export');

        //Commande SQL : insérer les informations de l'export (nom et date) dans une nouvelle table "historiquesexports"
        DB::insert("INSERT INTO historiquesexports (name, date)
                            VALUES ('$nomFichier',DATE_FORMAT(NOW(), '%Y-%m-%d %T'))");

        return redirect()->route('import.admin')->with('error', 'Téléchargement du fichier ".csv" réussi !');
    } //Fin de la méthode "exportIntoCSV"
}
