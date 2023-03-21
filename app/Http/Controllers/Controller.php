<?php

namespace App\Http\Controllers;

use App\Models\Desjardins;
use App\Models\HistoriquesExport;
use App\Models\Magikpaies;
use App\Models\Smaat2;
use App\Models\User;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    public function Connexion() //Fonction redirection page connexion
    {
        return view('connexion');
    } //Fin de la méthode "Connexion"

    public function ConnexionTitulaire(Request $request) //Fonction de connexion
    {
        $check = $request->all();
        if (Auth::guard('web')->attempt(['email' => $check['email'], 'password' => $check['password'], 'admin' => 1] )) //Si données correctes et admin = 1 : administrateur
        {
            return redirect()->route('dashboard.admin')->with('error', 'Connexion à votre compte administrateur réussie !');
        }
        else if (Auth::guard('web')->attempt(['email' => $check['email'], 'password' => $check['password'], 'admin' => 0] )) //Si données correctes et admin = 0 : user
        {
            return redirect()->route('dashboard.user')->with('error', 'Connexion à votre compte utilisateur réussie !');
        }
        else //Si données incorrectes : erreur
        {
            return back()->with('error', 'Adresse mail ou mot de passe non valide. Vérifier si vous êtes éligible pour vous connecter ici.');
        }
    } //Fin de la méthode "ConnexionTitulaire"

    public function Enregistrement() //Fonction redirection page enregistrement
    {
        return view('enregistrement');
    } //Fin de la méthode "Enregistrement"

    public function EnregistrementCreate(Request $request) //Fonction enregistrement
    {
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'admin' => '0', //= user
            'password' => Hash::make($request->password), //Mot de passe crypté
            'created_at' => Carbon::now(), //Date et heure du moment
            'updated_at' => Carbon::now() //Date et heure du moment
        ]);
        return redirect()->route('connexion')->with('error','Création du compte utilisateur réussie !');
    } //Fin de la méthode "EnregistrementCreate"

    public function DashboardUser() //Fonction redirection page accueil user
    {
        //Si un utilisateur connecté n'est pas un utilisateur, il reviendra sur sa page précédente
        if (Gate::allows('access-admin')) {
            return back()->with('error', "Vous n'avez pas l'autorisation pour accéder à cette page car vous n'êtes pas utilisateur !");
        }
        return view('user/dashboard_user');
    } //Fin de la méthode "DashboardUser"

    public function DashboardAdmin() //Fonction redirection page accueil admin
    {
        //Si un utilisateur connecté n'est pas un administrateur, il reviendra sur sa page précédente
        if (!Gate::allows('access-admin')) {
            return back()->with('error', "Vous n'avez pas l'autorisation pour accéder à cette page car vous n'êtes pas administrateur !");
        }
        return view('admin/dashboard_admin');
    } //Fin de la méthode "DashboardAdmin"
    /* ----- FIN : fonctions -> Dashboards ----- */


    /* ----- DÉBUT : fonctions -> Imports/Exports ----- */
    public function Import() //Fonction redirection page import
    {
        $data = DB::table('users')->get();
        return view('import', compact('data'));
    } //Fin de la méthode "Import"

    public function Historique_Exports() //Fonction redirection page historique export
    {
        $data = DB::table('historiquesexports')->get();
        return view('crud/historiques_exports', compact('data'));
    } //Fin de la méthode "Historique_Exports"

    public function download($id) //Fonction download export (page historique exports)
    {
        $data = DB::table('historiquesexports')->where('id',$id)->first();
        $filepath = storage_path("public/fichiersExportés/{$data->name}");
        return \Response::download($filepath);
    }//Fin de la méthode "download"

    public function Historiques_Uploads() //Fonction redirection page historique upload
    {
        if (!Gate::allows('access-admin')) {
            return back()->with('error', "Vous n'avez pas l'autorisation pour accéder à cette page car vous n'êtes pas administrateur !");
        }
        $data = DB::table('uploads')->get();
        return view('crud/historiques_uploads', compact('data'));
    } //Fin de la méthode "Historiques_Uploads"

    public function downloadUpload($id) //Fonction download upload (page historique upload)
    {
        $data = DB::table('uploads')->where('id',$id)->first();
        $filepath = storage_path("public/fichiersUploadés/{$data->name}");
        return \Response::download($filepath);
    }//Fin de la méthode "downloadUpload"

    public function Desjardins() //Fonction redirection page historique données upload Desjardins
    {
        if (!Gate::allows('access-admin')) {
            return back()->with('error', "Vous n'avez pas l'autorisation pour accéder à cette page car vous n'êtes pas administrateur !");
        }
        $data = Desjardins::all();
        return view('/crud/desjardins',['desjardins'=>$data]);
    } //Fin de la méthode "Desjardins"

    public function Magikpaie() //Fonction redirection page historique données upload MagikPaie
    {
        if (!Gate::allows('access-admin')) {
            return back()->with('error', "Vous n'avez pas l'autorisation pour accéder à cette page car vous n'êtes pas administrateur !");
        }
        $data = Magikpaies::all();
        return view('/crud/magikpaie',['magikpaies'=>$data]);
    } //Fin de la méthode "Magikpaie"

    public function Smaat() //Fonction redirection page historique données upload Smaat
    {
        if (!Gate::allows('access-admin')) {
            return back()->with('error', "Vous n'avez pas l'autorisation pour accéder à cette page car vous n'êtes pas administrateur !");
        }
        $data = Smaat2::all();
        return view('/crud/smaat',['smaatexports'=>$data]);
    } //Fin de la méthode "Smaat"

    public function AdminLogout() //Fonction de déconnexion
    {
        Auth::guard('web')->logout();
        return redirect()->route('connexion')->with('error','Déconnexion du compte réussie !');
    } //Fin de la méthode "AdminLogout"
}
