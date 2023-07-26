@extends("buania")

@section("contenu")
<div class="pagetitle">
    <h1>Publications</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('publication')}}">Home</a></li>
        <li class="breadcrumb-item active">Publication</li>
      </ol>

      <div class="d-flex justify-content-end align-items-end">
        <a href="{{url('add-domaine-pub')}}" class="btn text-dark btn-outline-danger">Nouveau domaine</a>
        <a href="{{url('add-publication')}}" class="btn text-dark btn-outline-danger">Nouvelle publication</a>
      </div>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Recent Sales -->
          <div class="col-8">
            <div class="card recent-sales overflow-auto">


              <div class="card-body">
                <h5 class="card-title">Publications  </h5>

                <div class="row">

                    @if ($publications)
                        @foreach ($publications as $publication )
                        <div class="col-md-6">
                            <div class="card">
                              <img src="{{url('assets/img/publications/'.$publication->photo)}}" class="card-img-top" alt="...">
                              <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center"  >
                                  <div>
                                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                                      <img width="48" src="{{url('assets/img/avocats/'.$publication->avocat->photo)}}" alt="Profile" class="rounded-circle">
                                      <div class="d-flex flex-column card-title justify-content-center align-items-center ">
                                        <h6>
                                          <span class="d-none d-md-block  fw-bold  ">{{$publication->avocat->nom}} {{$publication->avocat->prenom}}</span>
                                        </h6>
                                        <span href="{{url('detail-publication',$publication->id)}}" class="d-none d-md-block text-muted ps-2">{{$publication->created_at}}</span>
                                      </div>
                                    </a>
                                  </div>
                                  <a href="{{url('detail-publication',$publication->id)}}" class="btn navlink btn-warning">Détail</a>
                                </div>
                                <h5 class="card-title">{{$publication->titre_fr}}</h5>

                                <p class="card-text">{{$publication->sous_titre_fr}}</p>
                              </div>
                            </div>
                          </div>
                        @endforeach
                    @endif


                </div>

              </div>

            </div>
          </div>
          <div class="col-md-4">
            <div class="card recent-sales overflow-auto">


              <div class="card-body">
                <h5 class="card-title">Domaines de publication  </h5>

                <table class="table table-hover  ">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">
                        Nom
                      </th>
                    </tr>
                  </thead>

                  @if ($domaines)
                  <tbody>
                    @foreach ($domaines as $domaine )
                    <tr>
                        <th scope="row"><a href="#">{{$domaine->id}}</a></th>

                        <td><p class="text-dark">{{$domaine->nom_fr}}</p></td>
                    </tr>
                    @endforeach


              </tbody>
                  @endif

                </table>

              </div>

            </div>
          </div>

        </div>
      </div><!-- End Left side columns -->


    </div>
  </section>
@endsection
