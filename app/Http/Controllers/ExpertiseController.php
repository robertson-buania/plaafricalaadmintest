<?php

namespace App\Http\Controllers;

use App\Models\expertise;
use App\Http\Requests\StoreexpertiseRequest;
use App\Http\Requests\UpdateexpertiseRequest;
use Illuminate\Http\Request;

class ExpertiseController extends Controller
{
    public function  all()
    {
        $expertises=Expertise::all();

        return view("expertise.expertise",["expertises"=>$expertises]);
        //return Expertise::all();
    }

    public function add()
    {
        return view("expertise.add");
    }

    public function edit()
    {
        return view('expertise.add');
    }
    public function save(Request $request)

        {

        // Vérifier si une expertise avec le même titre existe déjà dans la base de données
        $ecpertiseExistante = Expertise::where('titre_fr', $request->titre_fr)
                                    ->where('titre_en', $request->titre_en)
                                    ->exists();

        if ($ecpertiseExistante) {
            return redirect()->back()
                            ->withInput()
                            ->withErrors(['message' => 'Une expertise avec le même titre en fr et anglais
                              existe déjà.']);
        }

        // Insérer la nouvelle expertise dans la base de données
        $expertise = new Expertise();
        $expertise->titre_fr = $request->titre_fr;
        $expertise->titre_en = $request->titre_en;
        $expertise->sous_titre_fr = $request->sous_titre_fr;
        $expertise->sous_titre_en = $request->sous_titre_en;

        $expertise->category = $request->category;

        if($request->hasfile("contenu_fr")){
            $file_fr=$request->file("contenu_fr");
            $extension_fr=$file_fr->getClientOriginalExtension();
            $filename_fr='contenu_fr'.time().'.'.$extension_fr;
            $file_fr->move('assets/img/expertises',$filename_fr);
            $expertise->contenu_fr = $filename_fr;
           }

        if($request->hasfile("contenu_en")){
                $file_en=$request->file("contenu_en");
                $extension_en=$file_en->getClientOriginalExtension();
                $filename_en='contenu_en'.time().'.'.$extension_en;
                $file_en->move('assets/img/expertises',$filename_en);
                $expertise->contenu_en = $filename_en;
            }

           if($request->hasfile("photo")){
                $file_photo=$request->file("photo");
                $extension_photo=$file_photo->getClientOriginalExtension();
                $filename_photo=time().'.'.$extension_photo;
                $file_photo->move('assets/img/expertises',$filename_photo);
                $expertise->photo = $filename_photo;
           }

           $expertise->save();
          // dd($expertise);

        //$expertiseInsert = Expertise::create($expertise);
        return redirect()->route('expertise')
                        ->with('success', 'L\'expertise a été enregistrée avec succès.');
        /**/
    }

    public function show($id)
    {
        if($id){
            $expertise=Expertise::find($id);
           // dd($expertise);
            return view("expertise.detail",['expertise'=>$expertise]);
        }else{
            return  redirect()->back()->with("Aucune expertise");
        }



      //  return Expertise::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $expertise = Expertise::findOrFail($id);
        $expertise->update($request->all());
        return response()->json($expertise, 200);
    }

    public function destroy($id)
    {
        Expertise::destroy($id);
        return  redirect('expertise');
    }
}
