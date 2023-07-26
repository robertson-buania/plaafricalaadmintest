@extends("buania")

@section("contenu")
<div class="pagetitle">
    <h1>Expertises</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('expertise')}}">Home</a></li>
        <li class="breadcrumb-item active"><a  href="{{route('expertise')}}">Expertise</a></li>
        <li class="breadcrumb-item active">Nouvelle Expertise</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
          <div class="card-body">
              <form id="personne-form"  method="POST" action="{{route('expertise.save')}}"
               enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">


                  <div class="mb-3 col-md-6">
                    <label for="Categorie" class="form-label">Categorie</label>
                    <select id="Categorie" required name="category" class="select2 form-select">
                      <option value=""> Categorie</option>
                      <option value="1">Secteur d'activité</option>
                      <option value="2">Domaine de compétence</option>
                    </select>
                  </div>
                  <div class="mb-3 col-md-6">
                      <label for="photo" class="form-label">Photo</label>
                      <input class="form-control" type="file" id="photo" required accept="image/*"  name="photo" placeholder="California" />
                   </div>

                   <div class="col-md-12">

                    <div class="row">
                      <div class="col-md-6">
                        <div class="row">
                          <div class="mb-3 col-md-12">
                            <label for="titre" class="form-label">Titre (Français) </label>
                            <input class="form-control" type="text" id="titre" name="titre_fr" required autofocus />
                          </div>
                          <div class="mb-3 col-md-12">
                            <label for="sous_titre" class="form-label">Sous titre (Français) </label>
                            <input class="form-control"  type="text" name="sous_titre_fr" id="sous_titre"  />
                          </div>
                        </div>

                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="mb-3 col-md-12">
                            <label for="titre" class="form-label">Titre (Anglais) </label>
                            <input class="form-control"  type="text" id="titre_en" name="titre_en" required autofocus />
                          </div>
                          <div class="mb-3 col-md-12">
                            <label for="sous_titre" class="form-label">Sous titre ((Anglais)) </label>
                            <input class="form-control" type="text" name="sous_titre_en"  id="sous_titre"  />
                          </div>
                        </div>
                      </div>
                    </div>
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
