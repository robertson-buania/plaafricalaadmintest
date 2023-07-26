@extends("buania")

@section("contenu")
<div class="pagetitle">
    <h1>Bureaux</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('bureau')}}">Home</a></li>
        <li class="breadcrumb-item active"><a  href="{{route('bureau')}}">Bureau</a></li>
        <li class="breadcrumb-item active">Nouveau Bureau</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
          <div class="card-body">
              <form id="formAccountSettings" method="POST" action="{{route('bureau.save')}}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="nom" class="form-label">Nom</label>
                        <input class="form-control" type="text" id="nom" name="nom" required   />
                      </div>
                   <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input class="form-control" type="email" id="email" name="email"  required  />
                  </div>


                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="Téléphone">Téléphone</label>
                    <div class="input-group input-group-merge">
                      <input type="text" id="telephone" name="telephone" required class="form-control" placeholder="+243 89 85 20 202" />
                    </div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="address" class="form-label">Adresse en Français</label>
                    <input type="text" class="form-control" id="address" required name="adresse_physique_fr" placeholder="Adresse" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="address" class="form-label">Adresse en Anglais</label>
                    <input type="text" class="form-control" id="address" required name="adresse_physique_en" placeholder="Adresse" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="address" class="form-label">Pays  en Français</label>
                    <input type="text" class="form-control" id="address" required name="pays_fr"  />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="address" class="form-label">Pays en Anglais</label>
                    <input type="text" class="form-control" id="address" required name="pays_en"  />
                  </div>
                  <div class="mb-3 col-md-12">
                    <label for="photo" class="form-label">Photo</label>
                    <input class="form-control" type="file" id="photo" required name="photo" />
                 </div>

                <div class="mb-3 col-md-12">
                  <label for="Description en Francais" class="form-label">Description en  Français</label>
                  <textarea name="description_fr"  class="form-control" cols="30" rows="10"></textarea>
                </div>

                <div class="mb-3 col-md-12">
                  <label for="Descriptiobn en Anglais" class="form-label">Description en Anglais</label>
                  <textarea name="description_en"    class="form-control" cols="30" rows="10"></textarea>
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

