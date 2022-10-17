<?php

namespace App\Http\Controllers;
 
use App\Models\Client;
use App\Models\Materiel;
use App\Models\Lien;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AppController extends Controller
{

    public function show()
    {
        $clients =DB::table('clients')
            ->leftJoin('liens', 'liens.id_client', '=', 'clients.id_client')
            ->leftJoin('materiels', function($join){
                $join->on('materiels.id_materiel', '=', 'liens.id_materiel');       
            })
            ->groupby('clients.name')
            ->select('clients.name', DB::raw('SUM(materiels.prix) as total_sales'),DB::raw('COUNT(materiels.id_materiel) as sales'))
            ->having('sales', '>', 2)
            ->having('total_sales', '>', 5100)   
            ->get();

        return view('showtotal')->with('clients',$clients);
    }


    public function addmateriel()
    {
        $clients=Client::all();
        return view('addmateriel')->with('clients',$clients);
    }
 
    public function storemateriel(Request $request)
    {
        
            $materiel =new Materiel([
                "name" =>$request->fname,
                "prix" =>$request->fprix,
            ]);
            $materiel->save();
 
            $idMateriel = DB::table('materiels')
                                ->select('id_materiel')
                                ->orderBy('id_materiel', 'desc')
                                ->get()
                                ->first();
            $lien =new Lien([
                "id_client" =>$request->client,
                "id_materiel" =>$idMateriel->id_materiel,
            ]);
            $lien->save();
 
        
 
            return redirect("/showtotalvendu");
 
    }
 
 
 
 
    public function showtotalvendu()
    {
        $clients =DB::table('clients')
            ->leftJoin('liens', 'liens.id_client', '=', 'clients.id_client')
            ->leftJoin('materiels', function($join){
                $join->on('materiels.id_materiel', '=', 'liens.id_materiel');       
            })
            ->groupby('clients.name')
            ->select('clients.name', DB::raw('SUM(materiels.prix) as total_sales'))
            ->orderby('total_sales','desc')   
            ->get();
        
        return view('showtotalvendu')->with('clients',$clients);
    }

}
