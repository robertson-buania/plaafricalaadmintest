@extends('buania')

@section("contenu")
<div class="pagetitle">
    <h1>Publications</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('publication')}}">Home</a></li>
        <li class="breadcrumb-item active"><a  href="{{route('publication')}}">Publication</a></li>
        <li class="breadcrumb-item active">Nouvelle publication</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
          <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">

                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>
            @endif
              <form method="POST" action="{{route('publication.save')}}"
              enctype="multipart/form-data">
               @csrf
               @method('POST')
                <div class="row">


                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="Avocat">Avocat</label>
                    <select id="Avocat" name="avocat_id" class="select2 form-select">
                      <option value="">Avocat</option>
                      @if ($avocats)
                        @foreach ($avocats as $avocat )
                        <option value="{{$avocat->id}}">{{$avocat->nom}} {{$avocat->prenom}}</option>
                        @endforeach

                      @endif

                    </select>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="Categorie" class="form-label">Domaine</label>
                    <select required id="Categorie" name="domaine_id" class="select2 form-select">
                      <option value=""> Domaine</option>
                      @if ($domaines)
                        @foreach ($domaines as $domaine )
                        <option value="{{$domaine->id}}">{{$domaine->nom_fr}}</option>
                        @endforeach

                      @endif

                    </select>
                  </div>
                  <div class="mb-3 col-md-12">
                      <label for="photo" class="form-label">Photo</label>
                      <input class="form-control" type="file" id="photo" accept="image/*" required name="photo" />
                   </div>

                   <div class="col-md-12">

                    <div class="row">
                      <div class="col-md-6">
                        <div class="row">
                          <div class="mb-3 col-md-12">
                            <label for="titre_fr" class="form-label">Titre (Français) </label>
                            <input required class="form-control" type="text" id="titre_fr" name="titre_fr" autofocus />
                          </div>
                          <div class="mb-3 col-md-12">
                            <label for="sous_titre_fr" class="form-label">Sous titre ((Français)) </label>
                            <input required class="form-control" type="text" name="sous_titre_fr"   />
                          </div>
                        </div>

                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="mb-3 col-md-12">
                            <label for="titre" class="form-label">Titre (Anglais) </label>
                            <input class="form-control" required type="text" id="titre_en" name="titre_en" autofocus />
                          </div>
                          <div class="mb-3 col-md-12">
                            <label for="sous_titre_en" class="form-label">Sous titre ((Anglais)) </label>
                            <input class="form-control" required type="text" name="sous_titre_en" />
                          </div>
                        </div>
                      </div>
                    </div>
                   </div>
                   <div class="mb-3 col-md-6">
                    <label for="cv" class="form-label">PDF (Français)</label>
                    <input class="form-control" type="file" required  name="pdf_fr" accept=".pdf" />
                 </div>
                 <div class="mb-3 col-md-6">
                    <label for="cv" class="form-label">PDF (Anglais)</label>
                    <input class="form-control" type="file" required id="pdf_en" name="pdf_en" accept=".pdf" />
                 </div>
                 <div class="mb-3 col-md-12">
                    <label for="Descriptiobn en Francais" class="form-label">Contenu en  Français (<strong>.html,.htm</strong>)</label>

                    <input class="form-control" required type="file" name="contenu_fr" accept=".html,.htm" id="contenu_fr"  />
                  </div>

                  <div class="mb-3 col-md-12">
                    <label for="Description en Anglais" class="form-label">Contenu en Anglais (<strong>.html,.htm</strong>)</label>
                    <input class="form-control" required type="file" name="contenu_en" id="contenu_en"  accept=".html,.htm" id="contenu_fr"  />
                  </div>
                <div class="mt-2 d-flex justify-content-center align-items-center">
                  <button type="submit" class="btn btn-primary me-2">Valider</button>
                  <button type="reset" class="btn btn-outline-secondary mx-3">Annuler</button>
                </div>
              </form>
            </div>
      </div><!-- End Left side columns -->


    </div>
  </section>
@endsection

