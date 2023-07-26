<?php

namespace App\Http\Controllers;

use App\Models\Avocat;
use App\Models\Fonction;
use App\Models\Bureau;
use App\Models\Publication;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use stdClass;
class AvocatController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function delete_fonction($id)  {

        Fonction::destroy($id);

        return redirect()->route("avocat");

     }
     public function update_fonction(Request $request,$id)  {
       // dd($id);
        $fonctionExistante = Fonction::where('nom_fr', $request->nom_fr)
        ->exists();

       // dd($request);

       if($fonctionExistante){

       }
       $fonction=Fonction::find($id);

       $fonction->nom_fr=$request->nom_fr;
       $fonction->nom_en=$request->nom_en;

       $fonction->save();
       DB::update('UPDATE fonctions SET nom_fr = ?, nom_en = ? WHERE id = ?', [$fonction->nom_fr, $fonction->nom_en, $fonction->id]);


      /* DB::table('fonctions')->insert([
        ['nom_fr' => $request->nom_fr,
         'nom_en' => $request->nom_en,
         "created_at"=>\Carbon\Carbon::now(),
         "updated_at"=>\Carbon\Carbon::now()
         ]
    ]);*/
        return redirect()->route("avocat");
     }
     public function save_fonction(Request $request)  {

        $fonctionExistante = Fonction::where('nom_fr', $request->nom_fr)
        ->exists();

        if ($fonctionExistante) {

        return redirect()->back()
        ->withInput()
        ->withErrors(['message' => 'Une fonction avec le même nom existe déjà.']);
        }

       // dd($request);
       DB::table('fonctions')->insert([
        ['nom_fr' => $request->nom_fr,
         'nom_en' => $request->nom_en,
         "created_at"=>\Carbon\Carbon::now(),
         "updated_at"=>\Carbon\Carbon::now()
         ]
    ]);
        return redirect()->route("avocat");
     }


    public function  avocats()
    {
        $fonctions=Fonction::all();
        $avocats=Avocat::all();
        if($avocats==null && $fonctions){
            $avocats=[];
            $fonctions=[];
        }
       // dd($avocats);
        return view("index",["avocats"=> $avocats,"fonctions"=>$fonctions]);
        //return publication::all();
    }

    public function add()
    {
        $fonctions=Fonction::all();
        //dd($fonctions);
        return view("avocats.add",["fonctions"=>$fonctions]);
    }



    public function edit_fonction($id)
    {
        $fonction=Fonction::find($id);

        return view("avocats.edit-fonction",["fonction"=>$fonction]);
    }

    public function add_fonction()
    {
        $fonct  = new stdClass();
        $fonct->nom_fr = '';
        $fonct->nom_en = '';
        $fonct->id = 0;

        return view("avocats.add-fonction",["fonction"=>$fonct]);
    }

    public function edit()
    {
        return view('avocats.edit');
    }

    public function show( $id)
    {

        $avocat=Avocat::find($id);
        $fonctions=Fonction::all();
        $bureaux=Bureau::all();
        /*$publications=DB::table('publications')
                             ->where('id', $id)*/

                            // dd($avocat);
        $publications=null;
        return view(
            "avocats.detail",
            [
                "avocat"=>$avocat,
                "fonctions"=>$fonctions,
                "publications"=>$publications,
                "bureaux"=>$bureaux
            ]);

      //  return publication::findOrFail($id);
    }
    /**
     * Les étapes de modifications
     */

    public function save(Request $request )  {

       // dd($request);

        $avocatExistante = Avocat::where('nom', $request->nom)
                                    ->where('email', $request->email)
                                    ->exists();

        if ($avocatExistante) {
            return redirect()->back()
                            ->withInput()
                            ->withErrors(['message' => 'Un équipier avec le même nom et ou email
                              existe déjà.']);
        }
     //  dd($request->description_fr);

       $description_fr="";
       if($request->hasfile("description_fr")){
        $file_fr=$request->file("description_fr");
        $extension_fr=$file_fr->getClientOriginalExtension();
        $description_fr='description_fr'.time().'.'.$extension_fr;
        $file_fr->move('assets/img/avocats',$description_fr);

       }
       $description_en="";
        if($request->hasfile("description_en")){
            $file_en=$request->file("description_en");
            $extension_en=$file_en->getClientOriginalExtension();
            $description_en='description_en'.time().'.'.$extension_en;
            $file_en->move('assets/img/avocats',$description_en);

        }
       $filename="";
       if($request->hasfile("photo")){
        $file=$request->file("photo");
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move('assets/img/avocats',$filename);
       }

       $filename_cv="";
       if($request->hasfile("cv")){
        $file_cv=$request->file("cv");
        $extension_cv=$file_cv->getClientOriginalExtension();
        $filename_cv=time().'.'.$extension_cv;
        $file_cv->move('assets/img/avocats',$filename_cv);
       }

        $avocat=[
            "nom"=> $request->nom,
            "prenom"=>$request->prenom,
            "email"=>$request->email,
            "telephone"=>$request->telephone,
            "adresse"=>$request->adresse,
            "sexe"=>$request->sexe,
            "date_naissance"=>$request->date_naissance,
            "niveau"=>$request->niveau,
            "photo"=>$filename,
            "description_en"=>$description_en,
            "description_fr"=>$description_fr,
            "cv"=>$filename_cv
        ];

        //dd($avocat);


        $avocatinserted=Avocat::create($avocat);

        for ($i=0; $i <count($request->fonction_id) ; $i++) {
            $datainsert=[
                ['avocat_id' => $avocatinserted->id,
                 'fonction_id' => $request->fonction_id[$i]
                ],
            ];

            DB::table('avocat_fonction')->insert($datainsert);
        }

        return redirect()->route("avocat");

     }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $avocat=Avocat::find($id);
       // dd($avocat);
        if($avocat!=null){

            if($request->hasfile("description_fr")){
                $destination="assets/img/avocats/".$avocat->description_fr;
                if(File::exists($destination)){
                    File::delete($destination);
                }
             $file_fr=$request->file("description_fr");
             $extension_fr=$file_fr->getClientOriginalExtension();
             $description_fr='description_fr'.time().'.'.$extension_fr;
             $file_fr->move('assets/img/avocats',$description_fr);
             $avocat->description_fr=$description_fr;
            }

             if($request->hasfile("description_en")){
                $destination="assets/img/avocats/".$avocat->description_en;
                if(File::exists($destination)){
                    File::delete($destination);
                }
                 $file_en=$request->file("description_en");
                 $extension_en=$file_en->getClientOriginalExtension();
                 $description_en='description_en'.time().'.'.$extension_en;
                 $file_en->move('assets/img/avocats',$description_en);
                 $avocat->description_en=$description_en;
             }
            if($request->hasfile("photo")){
                $destination="assets/img/avocats/".$avocat->photo;
                if(File::exists($destination)){
                    File::delete($destination);
                }
                $file=$request->file("photo");
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('assets/img/avocats',$filename);

                $avocat->photo=$filename;
             }

             if($request->hasfile("cv")){
                $destination="assets/img/avocats/".$avocat->cv;
                if(File::exists($destination)){
                    File::delete($destination);
                }
                $file=$request->file("cv");
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('assets/img/avocats',$filename);

                $avocat->cv=$filename;
             }

             if($request->nom){
                $avocat->nom=$request->nom;
             }

             if($request->prenom){
                $avocat->prenom=$request->prenom;
             }
             if($request->email){
                $avocat->email=$request->email;
             }
             if($request->telephone){
                $avocat->telephone=$request->telephone;
             }
             if($request->date_naissance){
                $avocat->date_naissance=$request->date_naissance;
             }
             if($request->adresse){
                $avocat->adresse=$request->adresse;
             }

             if($request->linkedin){
                $avocat->linkedin=$request->linkedin;
             }

             if($request->twitter){
                $avocat->twitter=$request->twitter;
             }

             if($request->fonction_id){
                for ($i=0; $i <count($request->fonction_id) ; $i++) {
                    $resultat = DB::table('avocat_fonction')
                    ->where('avocat_id', '=', $avocat->id)
                    ->where('fonction_id', '=', $request->fonction_id[$i])
                    ->first();
                    if(! $resultat){
                        $datainsert=[
                            ['avocat_id' => $avocat->id,
                             'fonction_id' => $request->fonction_id[$i]
                            ],
                        ];
                        DB::table('avocat_fonction')->insert($datainsert);
                    }

                }
             }

             if($request->bureaux){
                for ($i=0; $i <count($request->bureaux) ; $i++) {
                    $resultat = DB::table('avocat_bureau')
                    ->where('avocat_id', '=', $avocat->id)
                    ->where('bureau_id', '=', $request->bureaux[$i])
                    ->first();
                    if(! $resultat){
                        $datainsert=[
                            ['avocat_id' => $avocat->id,
                             'bureau_id' => $request->bureaux[$i]
                            ],
                        ];
                        DB::table('avocat_bureau')->insert($datainsert);
                    }

                }
             }





        }


        $avocat->update();
        return redirect()->back()->with('Succès !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Avocat $avocat)
    {
        //
    }
}
