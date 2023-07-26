@extends('buania')

@section("contenu")
<div class="pagetitle">
    <h1>Publications</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('publication')}}">Home</a></li>
        <li class="breadcrumb-item active"><a  href="{{route('publication')}}">Domaine</a></li>
        <li class="breadcrumb-item active">Nouveau domaine</li>
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
            <form action="{{route('publication.save_domaine')}}" method="POST" >

                @csrf
                @method('POST')

                <div class="row">
                    <div class="mb-3 col-md-6">
                      <label for="nom" class="form-label">Nom (Francais)</label>
                      <input required class="form-control" type="text" id="nom_fr" name="nom_fr"
                       value="Santé  et sécurité au travail" autofocus />
                    </div>

                    <div class="mb-3 col-md-6">
                      <label for="nom" class="form-label">Nom (Anglais)</label>
                      <input class="form-control" type="text" id="nom_en" name="nom_en" required
                      value="Health and Safety at Work"  />
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
