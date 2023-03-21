<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Imports\DesjardinsImport;
use App\Imports\MagikpaiesImport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function ImportDesjardins(Request $request) //Fonction import fichier Desjardins
    {
        $path = 'public/fichiersUploadés/';
        $newname = Helper::renameFile($path, $request->file('desjardins_file')->getClientOriginalName());
        $upload = $request->desjardins_file->move(storage_path($path), $newname);

        if($upload)
        {
            $data = array(
                'name' => $newname,
                'dateUpload' => date(now())
            );

            $import = Excel::import(new DesjardinsImport, $upload);
            $msg_success = "FICHIER DESJARDINS BIEN IMPORTÉ !";
            $msg_danger = "Problème(s) lors de l'importation du fichier Desjardins...";
            if($import && DB::table('uploads')->insert($data))
            {
                return redirect('/import')->with('success', strtoupper($msg_success));
            }
            else
            {
                return redirect('/import')->with('danger', strtoupper($msg_danger));
            }
        }
        else
        {
            $msg = "Vous devez choisir un fichier viable s'il-vous-plaît.";
            return redirect('/import')->with('choose_file',strtoupper($msg));
        }
    } //Fin de la méthode "ImportDesjardins"

    public function ImportMagikpaie(Request $request)  //Fonction import fichier MagikPaie
    {
        $path = 'public/fichiersUploadés/';
        $newname = Helper::renameFile($path, $request->file('magikpaie_file')->getClientOriginalName());

        //
        $upload = $request->magikpaie_file->move(storage_path($path), $newname);
        if($upload)
        {
            $data = array(
                'name' => $newname,
                'dateUpload' => date(now())
            );

            $import = Excel::import(new MagikpaiesImport, $upload);
            $msg_success = "FICHIER MAGIKPAIE BIEN IMPORTÉ !";
            $msg_danger = "Problème(s) lors de l'importation du fichier Magikpaie...";
            if($import && DB::table('uploads')->insert($data))
            {
                return redirect('/import')->with('success', strtoupper($msg_success));
            }
            else
            {
                return redirect('/import')->with('danger', strtoupper($msg_danger));
            }
        }
        else
        {
            $msg = "Vous devez choisir un fichier viable s'il-vous-plaît.";
            return redirect('/import')->with('choose_file',strtoupper($msg));
        }
    } //Fin de la méthode "ImportMagikpaie"
}
