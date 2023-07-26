<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Publication;
use App\Models\Domaine;
use App\Models\Avocat;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function  all()
    {

        $domaines=Domaine::all();
        $publications=Publication::all();

        return view(
            "publications.publication",
            [
                "publications"=>$publications,
                "domaines"=>$domaines
            ]
    );
        //return publication::all();
    }

    public function add()
    {
        $domaines=Domaine::all();
        $avocats=Avocat::all();

        return view("publications.add",[
            'avocats'=>$avocats,
            "domaines"=>$domaines
        ]);
    }
    public function save_domaine(Request $request)  {

        $domaineExistante = Domaine::where('nom_fr', $request->nom_fr)
        ->exists();

        if ($domaineExistante) {
        return redirect()->back()
        ->withInput()
        ->withErrors(['message' => 'Un domaine avec le même nom existe déjà.']);
        }

       // dd($request);
       DB::table('domaines')->insert([
        ['nom_fr' => $request->nom_fr,
         'nom_en' => $request->nom_en,
         "created_at"=>\Carbon\Carbon::now(),
         "updated_at"=>\Carbon\Carbon::now()
         ]
    ]);
        return redirect()->route("publication");
     }
    public function save(Request $request)
    {
        $publicationExistante = Publication::where('titre_fr', $request->titre_fr)
                                    ->where('titre_en', $request->titre_en)
                                    ->exists();

        if ($publicationExistante) {
            return redirect()->back()
                            ->withInput()
                            ->withErrors(['message' => 'Une publication avec le même titre en fr et anglais
                              existe déjà.']);
        }

        // Insérer la nouvelle publication dans la base de données
        $publication = new Publication();
        $publication->titre_fr = $request->titre_fr;
        $publication->titre_en = $request->titre_en;
        $publication->sous_titre_fr = $request->sous_titre_fr;
        $publication->sous_titre_en = $request->sous_titre_en;


      //  $publication->category = $request->category;
      if($request->hasfile("contenu_fr")){
        $file_fr=$request->file("contenu_fr");
        $extension_fr=$file_fr->getClientOriginalExtension();
        $filename_fr='contenu_fr'.time().'.'.$extension_fr;
        $file_fr->move('assets/img/publications',$filename_fr);
        $publication->contenu_fr = $filename_fr;
       }

        if($request->hasfile("contenu_en")){
            $file_en=$request->file("contenu_en");
            $extension_en=$file_en->getClientOriginalExtension();
            $filename_en='contenu_en'.time().'.'.$extension_en;
            $file_en->move('assets/img/publications',$filename_en);
            $publication->contenu_en = $filename_en;
        }

        if($request->hasfile("pdf_fr")){
            $file_fr=$request->file("pdf_fr");
            $extension_fr=$file_fr->getClientOriginalExtension();
            $filename_fr=time().'.'.$extension_fr;
            $file_fr->move('assets/img/publications',$filename_fr);
            $publication->pdf_fr = $filename_fr;
           }

           if($request->hasfile("pdf_en")){
                $file_en=$request->file("pdf_en");
                $extension_en=$file_en->getClientOriginalExtension();
                $filename_en=time().'.'.$extension_en;
                $file_en->move('assets/img/publications',$filename_en);
                $publication->pdf_en = $filename_en;
            }

           if($request->hasfile("photo")){
                $file_photo=$request->file("photo");
                $extension_photo=$file_photo->getClientOriginalExtension();
                $filename_photo=time().'.'.$extension_photo;
                $file_photo->move('assets/img/publications',$filename_photo);
                $publication->photo = $filename_photo;
           }

           if($request->avocat_id){
            $avocat=Avocat::find($request->avocat_id);
            $publication->avocat_id=$avocat->id;

           }

           if($request->domaine_id){
            $domaine=Domaine::find($request->domaine_id);
            $publication->domaine_id=$domaine->id;

           }

           //dd($publication);

           $publication->save();
          //

        //$publicationInsert = publication::create($publication);
        return redirect()->route('publication')
                        ->with('success', 'La publication a été enregistré avec succès.');



      //  return view('publications.publication');
    }

    public function edit()
    {
        return view('publications.add');
    }

    public function add_domaine_pub()
    {
        return view('publications.add-domaine');
    }


    public function show($id)
    {
        $pub=Publication::find($id);

        return view("publications.detail",["publication"=>$pub]);
      //  return publication::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $publication = Publication::findOrFail($id);
        $publication->update($request->all());
        return response()->json($publication, 200);
    }

    public function destroy($id)
    {
        Publication::destroy($id);
        return  redirect('publication');
    }
}
