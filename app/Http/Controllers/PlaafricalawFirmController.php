<?php

namespace App\Http\Controllers;
use App\Models\Avocat;
use App\Models\Fonction;
use App\Models\Bureau;
use App\Models\Publication;
use App\Models\Newsletter;
use App\Models\Expertise;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PlaafricalawFirmController extends Controller
{


    public function contact(Request $request){

        if($request['email']){
            $news=[
                "message"=>$request->message,
                "email"=>$request->email,
                "name"=>$request->name,
                "objet"=>$request->objet,
            ];
            Newsletter::create($news);
            return ["message"=>"Succès !"];
        }else{

            return ["message"=>"Votre message manque d'adresse mail !"];
        }


    }
    public function  home()
    {
        $avocats=new Collection();
        $bureaux=Bureau::all();
        $publications=new Collection();

        foreach (Avocat::all() as $avocat ) {
            $newAvocat=[
                "id"=> $avocat->id,
                "nom"=> $avocat->nom,
                "prenom"=>$avocat->prenom,
                //"email"=>$avocat->email,
               // "telephone"=>$avocat->telephone,
               // "adresse"=>$avocat->adresse,
               // "sexe"=>$avocat->sexe,
               // "date_naissance"=>$avocat->date_naissance,
               // "niveau"=>$avocat->niveau,
                "photo"=>$avocat->photo,
               // "description_en"=>$avocat->description_en,
               // "description_fr"=>$avocat->description_fr,
                //"cv"=>$filename_cv,
               // "c"


            ];
            $avocats->push($newAvocat);
        }

        foreach (Publication::orderBy('id', 'desc')->take(12)->get() as $key=>$publication ) {

            $avocatPub=[
                "nom"=>$publication->avocat->nom,
                "prenom"=>$publication->avocat->prenom,
                "photo"=>$publication->avocat->photo,
            ];
            $newPublication=[
                "id"=> $publication->id,
                "titre_fr"=> $publication->titre_fr,
                "titre_en"=> $publication->titre_en,
                "sous_titre_fr"=>$publication->sous_titre_fr,
                "sous_titre_en"=>$publication->sous_titre_en,
                "photo"=>$publication->photo,
                "domaine"=>$publication->domaine,
                "created_at"=>$publication->created_at,
                "avocat"=>$avocatPub
            ];

            $publications->push($newPublication);
        }


        return  ["avocats"=>$avocats,"publications"=>$publications,"bureaux"=>$bureaux];
        //return publication::all();
    }

    public function  avocats()
    {
        $avocats=new Collection();

        foreach (Avocat::all() as $avocat ) {
            $newAvocat=[
                "nom"=> $avocat->nom,
                "prenom"=>$avocat->prenom,
                "id"=>$avocat->id,
                 //"email"=>$avocat->email,
               // "telephone"=>$avocat->telephone,
               // "adresse"=>$avocat->adresse,
               // "sexe"=>$avocat->sexe,
               // "date_naissance"=>$avocat->date_naissance,
               // "niveau"=>$avocat->niveau,
                "photo"=>$avocat->photo,
               // "description_en"=>$avocat->description_en,
               // "description_fr"=>$avocat->description_fr,
                "cv"=>$avocat->cv,
                "fonctions"=>$avocat->fonctions,
               // "c"


            ];
            $avocats->push($newAvocat);
        }

        return  ["avocats"=>$avocats];
        //return publication::all();
    }

    public function avocat_detail($id)  {
        $avocats=new Collection();
        $team=Avocat::find($id);
        $avoc;
        foreach (Avocat::all() as $avocat ) {
            if($team->id==$avocat->id){
                $publications=new Collection();
                foreach ($avocat->publications as $publication) {

                    $pub=[
                        "id"=> $publication->id,
                        "titre_fr"=> $publication->titre_fr,
                        "titre_en"=> $publication->titre_en,
                        "sous_titre_fr"=>$publication->sous_titre_fr,
                        "sous_titre_en"=>$publication->sous_titre_en,
                        "photo"=>$publication->photo,
                        "domaine"=>$publication->domaine,
                        "created_at"=>$publication->created_at,

                    ];
                    $publications->push($pub);
                }

                $avoc=[
                    "id"=> $avocat->id,
                    "nom"=> $avocat->nom,
                    "prenom"=>$avocat->prenom,
                    "email"=>$avocat->email,
                    "bureaux"=>$avocat->bureaux,
                    "publications"=>$publications,
                   // "sexe"=>$avocat->sexe,
                   // "date_naissance"=>$avocat->date_naissance,
                   // "niveau"=>$avocat->niveau,
                    "photo"=>$avocat->photo,
                    "description_en"=>$avocat->description_en,
                    "description_fr"=>$avocat->description_fr,
                   "cv"=>$avocat->cv,
                   "fonctions"=>$avocat->fonctions,
                ];
            }

            $newAvocat=[
                "id"=> $avocat->id,
                "nom"=> $avocat->nom,
                "prenom"=>$avocat->prenom,
                "email"=>$avocat->email,
               // "telephone"=>$avocat->telephone,
               // "adresse"=>$avocat->adresse,
               // "sexe"=>$avocat->sexe,
               // "date_naissance"=>$avocat->date_naissance,
               // "niveau"=>$avocat->niveau,
                "photo"=>$avocat->photo,
               // "description_en"=>$avocat->description_en,
               // "description_fr"=>$avocat->description_fr,
               "cv"=>$avocat->cv,
               "fonctions"=>$avocat->fonctions,
               // "c"


            ];
            $avocats->push($newAvocat);
        }



        return ["avocat"=>$avoc,"avocats"=>$avocats];
    }

    public function presence()  {
        $bureaux=new Collection();

        foreach (Bureau::all() as $bureau ) {
            $newBureau=[
                "id"=>$bureau->id,
                "nom"=> $bureau->nom,
                "pays_fr"=>$bureau->pays_fr,
                "pays_en"=>$bureau->pays_en,
                "photo"=>$bureau->photo,
                "adresse_physique_fr"=>$bureau->adresse_physique_fr,
                "adresse_physique_en"=>$bureau->adresse_physique_en,
                "email"=>$bureau->email,
                "telephone"=>$bureau->telephone,
                "description_fr"=>$bureau->description_fr,
                "description_en"=>$bureau->description_en


            ];
            $bureaux->push($newBureau);
        }

        //dd($bureau);
        return ["bureaux"=>$bureaux];

    }

    public function presence_detail($id)  {

        $bureaux=new Collection();

        foreach (Bureau::all() as $bureau ) {
            $newBureau=[
                "id"=>$bureau->id,
                "nom"=> $bureau->nom,
                "pays_fr"=>$bureau->pays_fr,
                "pays_en"=>$bureau->pays_en,


            ];
            $bureaux->push($newBureau);
        }
        $bureau=Bureau::find($id);
        //dd($bureau);
        return ["bureau"=>$bureau,"bureaux"=>$bureaux];
    }
    public function expertise()  {

         $expertisesSecteuractivite=new Collection();

         $expertisesDomainecompetence=new Collection();

        foreach (Expertise::all() as $expertise ) {

            if($expertise->category=="2"){
                $newexpertiseDomainecompetence=[
                    "id"=>$expertise->id,
                    "titre_fr"=>$expertise->titre_fr,
                    "titre_en"=>$expertise->titre_en,
                    "photo"=>$expertise->photo
                ];
                $expertisesDomainecompetence->push($newexpertiseDomainecompetence);
            }else if($expertise->category=="1"){
                $newexpertiseSecteuractivite=[
                    "id"=>$expertise->id,
                    "titre_fr"=>$expertise->titre_fr,
                    "titre_en"=>$expertise->titre_en,
                    "photo"=>$expertise->photo
                ];
                $expertisesSecteuractivite->push($newexpertiseSecteuractivite);
            }

        }

        return ["expertisesSecteuractivite"=>$expertisesSecteuractivite,"expertisesDomainecompetence"=>$expertisesDomainecompetence];

    }

    public function expertise_detail($id)  {

        $expertise=Expertise::find($id);
        $cat=$expertise->category;

        $expertises=new Collection();

        foreach (Expertise::all() as $expert ) {

            if($expert->category==$cat){
                $newexpert=[
                    "id"=>$expert->id,
                    "titre_fr"=>$expert->titre_fr,
                    "titre_en"=>$expert->titre_en,


                ];
                $expertises->push($newexpert);
            }

        }

        //dd($expertise);
        return ["expertise"=>$expertise,"expertises"=>$expertises];

    }


    public function publication()  {

        $publications=new Collection();

        foreach (Publication::all() as $publication ) {
            $avocatPub=[
                "id"=>$publication->avocat->id,
                "nom"=>$publication->avocat->nom,
                "prenom"=>$publication->avocat->prenom,
                "photo"=>$publication->avocat->photo,
            ];
            $domaine=[
                "nom_fr"=>$publication->nom_fr,
                "nom_en"=>$publication->nom_en,
            ];
            $newpublication=[
                "id"=>$publication->id,
                "titre_fr"=>$publication->titre_fr,
                "titre_en"=>$publication->titre_en,
                "sous_titre_fr"=>$publication->sous_titre_fr,
                "sous_titre_en"=>$publication->sous_titre_en,
                "photo"=>$publication->photo,
                "domaine"=>$domaine,
               "avocat"=>$avocatPub,
                "updated_at"=>$publication->updated_at,
                "created_at"=>$publication->created_at

            ];
            $publications->push($newpublication);
        }
        //dd($publication);
        return ["publications"=>$publications];

    }

    public function publication_detail($id)  {
        $publications=new Collection();
        $pub;

       foreach (Publication::all() as $publication ) {
           $newpublication=[
               "id"=>$publication->id,
               "titre_fr"=>$publication->titre_fr,
               "titre_en"=>$publication->titre_en,

               "updated_at"=>$publication->updated_at

           ];

           if($publication->id==$id){
            $avocatPub=[
                "id"=>$publication->avocat->id,
                "nom"=>$publication->avocat->nom,
                "prenom"=>$publication->avocat->prenom,
                "photo"=>$publication->avocat->photo,
            ];
            $domaine=[
                "nom_fr"=>$publication->nom_fr,
                "nom_en"=>$publication->nom_en,
            ];
            $newPublication=[
                "id"=> $publication->id,
                "titre_fr"=> $publication->titre_fr,
                "titre_en"=> $publication->titre_en,
                "sous_titre_fr"=>$publication->sous_titre_fr,
                "sous_titre_en"=>$publication->sous_titre_en,
                "photo"=>$publication->photo,
                "pdf_fr"=>$publication->pdf_fr,
                "pdf_en"=>$publication->pdf_en,
                "contenu_fr"=>$publication->contenu_fr,
                "contenu_en"=>$publication->contenu_en,
                "domaine"=>$domaine,
                "created_at"=>$publication->created_at,
                "avocat"=>$avocatPub,
                "updated_at"=>$publication->updated_at
            ];
            $pub=$newPublication;
           }
           $publications->push($newpublication);
       }

       //dd($publication);
       return ["publication"=>$pub,"publications"=>$publications];
   }

}
