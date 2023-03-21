/* --------------- DÉBUT : Routes Admins -------------- */
Route::prefix('admin')->group(function (){

Route::get('/login',[AdminController::class, 'Index'])->name('login_from');

Route::post('/login/owner',[AdminController::class, 'Login'])->name('admin.login');

Route::get('/register',[AdminController::class, 'AdminRegister'])->name('admin.register');

Route::post('/register/create',[AdminController::class, 'AdminRegisterCreate'])->name('admin.register.create');

Route::get('/dashboard',[AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');

Route::get('/import',[AdminController::class, 'Import'])->name('admin.import');

/* ----- DÉBUT : Imports ----- */
//Desjardins
Route::get('/admin.import',[ImportController::class,'index']);
Route::post('/desjardin',[ImportController::class,'import']);

//Magikpaie
Route::get('/admin.import',[ImportController::class,'indexMagikpaie']);
Route::post('/magikpaie',[ImportController::class,'importMagikpaie']);
/* ----- FIN : Imports ----- */

/* ----- DÉBUT : Exports ----- */
//sous Excel
Route::get('/export-excel',[ExportController::class, 'exportIntoExcel']);

//sous CSV
Route::get('/export-csv',[ExportController::class, 'exportIntoCSV']);
/* ----- FIN : Exports ----- */

Route::get('/profil',[AdminController::class, 'AdminProfil'])->name('admin.profil');

Route::get('/logout',[AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');
});

Route::prefix('utilisateur')->group(function (){

Route::post('/utilisateur_login/owner',[AdminController::class, 'Login'])->name('admin.login');

Route::get('/utilisateur_dashboard',[AdminController::class, 'UtilisateurDashboard'])->name('utilisateur.utilisateur_dashboard')->middleware('admin');
});
/* --------------- FIN : Routes Admins et Utilisateurs -------------- */
