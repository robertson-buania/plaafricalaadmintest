<?php

namespace App\Http\Controllers;

use App\Models\Bureau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
class BureauController extends Controller
{


    public function  all()
    {
        $bureaux=Bureau::all();

        return view("bureaux.bureau",["bureaux"=>$bureaux]);
        //return bureau::all();
    }

    public function save(Request $request)
    {

        $filename="";
        if($request->hasfile("photo")){
         $file=$request->file("photo");
         $extension=$file->getClientOriginalExtension();
         $filename=time().'.'.$extension;
         $file->move('assets/img/bureaux',$filename);
        }

        $bureauExistante = Bureau::where('nom', $request->nom)
        ->where('email', $request->email)
        ->exists();

        if ($bureauExistante) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['message' => 'Un bureau avec le même nom et email
                existe déjà.']);
        }

        /*dd([
            "nom"=>$request->nom,
            "telephone"=>$request->telephone,
            "email"=>$request->email,
            "description_fr"=>$request->description_fr,
            "description_en"=>$request->description_en,
            "adresse_physique"=>$request->adresse_physique,
            "photo "=>$filename
        ]);*/

     /*  DB::table('bureaus')->insert([
        [
            "nom"=>$request->nom,
            "telephone"=>$request->telephone,
            "email"=>$request->email,
            "description_fr"=>$request->description_fr,
            "description_en"=>$request->description_en,
            "adresse_physique"=>$request->adresse_physique,
            "photo"=>$filename
        ]]);*/

        Bureau::create([
            "nom"=>$request->nom,
            "telephone"=>$request->telephone,
            "email"=>$request->email,
            "pays_fr"=>$request->pays_fr,
            "pays_en"=>$request->pays_en,
            "description_fr"=>$request->description_fr,
            "description_en"=>$request->description_en,
            "adresse_physique_fr"=>$request->adresse_physique_fr,
            "adresse_physique_en"=>$request->adresse_physique_en,
            "photo"=>$filename
        ]);

        return redirect()->route("bureau");
        //return view("bureaux.bureau");
    }

    public function add()
    {
        return view('bureaux.add ');
    }


    public function edit($id)
    {
        $bureau=Bureau::find($id);
        //dd($bureau);
        return view('bureaux.edit ',["bureau"=>$bureau]);
    }


    public function show()
    {
        return view("bureaux.detail");
      //  return bureau::findOrFail($id);
    }


    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $bureau=Bureau::find($id);

        if($request->hasfile("photo")){
            $destination="assets/img/bureaux/".$bureau->photo;
                if(File::exists($destination)){
                    File::delete($destination);
                }
            $file=$request->file("photo");
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('assets/img/bureaux',$filename);
            $bureau->photo;
           }

           if($request->nom){
            $bureau->nom=$request->nom;
           }

           if($request->email){
            $bureau->email=$request->email;
           }
           if($request->telephone){
            $bureau->telephone=$request->telephone;
           }
           if($request->adresse_physique_fr){
            $bureau->adresse_physique_fr=$request->adresse_physique_fr;
           }
           if($request->adresse_physique_en){
            $bureau->adresse_physique_en=$request->adresse_physique_en;
           }
           if($request->pays_fr){
            $bureau->pays_fr=$request->pays_fr;
           }
           if($request->pays_en){
            $bureau->pays_en=$request->pays_en;
           }


           $bureau->update();
           return redirect()->back()->with('Succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bureau $bureau)
    {
        //
    }
}
