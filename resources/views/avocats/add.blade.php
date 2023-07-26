@extends('buania')

@section("contenu")

<div class="pagetitle">
    <h1>Avocats</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('avocat')}}">Home</a></li>
        <li class="breadcrumb-item active"><a  href="{{route('avocat')}}">Avocat</a></li>
        <li class="breadcrumb-item active">Nouvel équipier</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->

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
              <form  method="POST" action="{{route('avocat.save')}}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="nom" class="form-label">Nom</label>
                    <input class="form-control" type="text" id="nom" name="nom"  required  autofocus />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input class="form-control" type="text" required name="prenom" id="prenom"   />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input class="form-control" type="email" required id="email" name="email"    />
                  </div>

                  <div class="mb-3 col-md-3">
                    <label class="form-label" for="Téléphone">Téléphone</label>
                    <div class="input-group input-group-merge">
                      <input type="text" id="telephone" required name="telephone"
                      class="form-control" placeholder="+243 89 50 41 066" />
                    </div>
                  </div>
                  <div class="mb-3 col-md-3">
                    <label class="form-label" for="Téléphone">Sexe</label>
                    <div class="col-sm-10 d-flex">
                        <div class="form-check mx-2">
                          <input class="form-check-input" type="radio" name="sexe" id="sexe1" value="option1" checked>
                          <label class="form-check-label" for="sexe1">
                           Homme
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="sexe" id="sexe2" value="option2">
                          <label class="form-check-label" for="sexe2">
                            Femme
                          </label>
                        </div>
                      </div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="addresse" class="form-label">Adresse</label>
                    <input type="text"  class="form-control" id="adresse" name="adresse" placeholder="Addresse physique" />
                  </div>

                  <div class="mb-3 col-md-6">
                    <label for="date_naissance" class="form-label">Date de naissance</label>
                    <input type="date"  class="form-control" id="date_naissance" name="date_naissance" placeholder="12/25/1990" maxlength="6" />
                  </div>
                  <div class="mb-3 col-md-12">
                    <label class="form-label" for="fonction">Fonction</label>
                    <select id="fonction" required multiple aria-label="multiple select example"
                     name="fonction_id[]"  class="select2 form-select">

                      <option value="" >Selectionnez une ou plusieurs</option>
                      @foreach ($fonctions as $fonction )
                      <option value="{{$fonction->id}}">{{$fonction->nom_fr}}</option>
                      @endforeach


                    </select>
                  </div>
                  {{-- <div class="mb-3 col-md-6">
                    <label for="Niveau" class="form-label">Niveau</label>
                    <select name="niveau"  id="niveau" class="select2 form-select">
                      <option value=""> Niveau</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div> --}}
                  <div class="mb-3 col-md-6">
                      <label for="photo" class="form-label">Photo</label>
                      <input class="form-control" type="file" required id="photo" name="photo" accept="image/*" />
                   </div>

                   <div class="mb-3 col-md-6">
                    <label for="cv" class="form-label">CV</label>
                    <input class="form-control"  type="file" id="cv" name="cv" accept=".pdf" />
                 </div>
                  <div class="mb-3 col-md-6">
                    <label   class="form-label">Description en  Français (<strong>.html,.htm</strong>)</label>
                    <input  name="description_fr" type="file"  class="form-control" accept=".html,.htm"/>
                  </div>

                  <div class="mb-3 col-md-6">
                    <label  class="form-label">Description en Anglais (<strong>.html,.htm</strong>)</label>
                    <input name="description_en" type="file" class="form-control" accept=".html,.htm"/>
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

