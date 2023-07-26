@extends('buania')

@section("contenu")

<div class="pagetitle">
    <h1>Avocats</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('avocat')}}">Home</a></li>
        <li class="breadcrumb-item active"><a  href="{{route('avocat')}}">Fonction</a></li>
        <li class="breadcrumb-item active">Modification fonction</li>
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

              <form  action="{{route('avocat.update_fonction',$fonction->id)}}" method="POST" >

                @csrf
                @method('POST')
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="nom" class="form-label">Nom (Francais)</label>
                    @if($fonction!=null)
                    <input required class="form-control" type="text" id="nom_fr" name="nom_fr"
                    value="{{$fonction->nom_fr}}" autofocus />

                    @endif

                  </div>

                  <div class="mb-3 col-md-6">
                    <label for="nom" class="form-label">Nom (Anglais)</label>
                    @if($fonction!=null)
                    <input required class="form-control" type="text" id="nom_en" name="nom_en"
                    value="{{$fonction->nom_en}}" autofocus />

                    @endif
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
