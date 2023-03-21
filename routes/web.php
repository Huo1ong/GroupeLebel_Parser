<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ImportController; //Controller permettant l'import
use App\Http\Controllers\ExportController; //Controller permettant l'export

use Illuminate\Support\Facades\Route;

/* ---------- DÉBUT : Routes principales ---------- */
    Route::get('/', function () {
        return view('/connexion');
    });

/* --- Login --- Register --- */
    /* - Login - */
    Route::get('/connexion',[Controller::class, 'Connexion'])->name('connexion'); //Page de connexion
    Route::post('/connexion/titulaire',[Controller::class, 'ConnexionTitulaire'])->name('connexion.titulaire');

    /* - Register - */
    Route::get('/enregistrement',[Controller::class, 'Enregistrement'])->name('enregistrement'); //Page d'enregistrement
    Route::post('/enregistrement/create',[Controller::class, 'EnregistrementCreate'])->name('enregistrement.create');

/* --- Dashboards --- */
    Route::get('/dashboard_admin', [Controller::class, 'DashboardAdmin' ,function () //Page d'accueil admin
    {
        return view('/admin/dashboard_admin');
    }])->middleware(['auth', 'admin','verified'])->name('dashboard.admin');

    Route::get('/dashboard_user', [Controller::class, 'DashboardUser' ,function () //Page d'accueil user
    {
        return view('/user/dashboard_user');
    }])->name('dashboard.user')->middleware(['auth', 'admin','verified']);

/* --- Imports --- Exports --- */
    Route::get('/import', [Controller::class, 'Import' ,function () //Page pour les imports et les exports (côté admin)
    {
        return view('/import');
    }])->name('import.admin');

    /* - Imports - */
    Route::post('/desjardin',[ImportController::class,'ImportDesjardins'])->name('import.desjardins'); //Fonction d'import d'un fichier Desjardins

    Route::post('/magikpaie',[ImportController::class,'ImportMagikpaie'])->name('import.magikpaie'); //Fonction d'import d'un fichier MagikPaie

    /* - Exports - */
    Route::get('/export-excel',[ExportController::class, 'exportIntoExcel']); //Fonction d'export d'un fichier smaat sous "excel"

    Route::get('/export-csv',[ExportController::class, 'exportIntoCSV']); //Fonction d'export d'un fichier smaat sous "csv"

/* --- Historiques --- */
    /* Historiques d'uploads */
    Route::get('/historiques_uploads',[Controller::class, 'Historiques_Uploads'])->name('historiques_uploads'); //Page des historiques d'uploads

    Route::get('downloadUpload/{id}', [Controller::class, 'downloadUpload']); //Fonction de download de l'upload choisi

    /* - Historiques d'imports - */
    Route::get('/desjardins', [Controller::class, 'Desjardins' ,function () //Page des historiques d'imports Desjardins
    {
        return view('/crud/desjardins');
    }])->name('admin.desjardins');

    Route::get('/magikpaie', [Controller::class, 'Magikpaie' ,function () //Page des historiques d'imports MagikPaie
    {
        return view('/crud/magikpaie');
    }])->name('admin.magikpaie');

    Route::get('/smaat', [Controller::class, 'Smaat' ,function () //Page des historiques d'imports Smaat
    {
        return view('/crud/smaat');
    }])->name('admin.smaat');

    /* Historiques d'exports */
    Route::get('/historiques_exports', [Controller::class, 'Historique_Exports' ,function () //Page des historiques d'export Smaat
    {
        return view('/crud/historiques_exports');
    }])->name('historiques_exports');

    Route::get('download/{id}', [Controller::class, 'download']); //Fonction de download de l'export choisi

/* --- Logouts --- */
    Route::get('/logout',[Controller::class, 'AdminLogout'])->name('admin.logout')->middleware('admin'); //Fonction de déconnexion du compte (user ou admin)
/* ---------- FIN : Routes principales ---------- */

require __DIR__.'/auth.php';
