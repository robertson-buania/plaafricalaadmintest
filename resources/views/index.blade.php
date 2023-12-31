@extends("buania")
@section("contenu")
<div class="pagetitle">
    <h1>Avocats</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('avocat')}}">Home</a></li>
        <li class="breadcrumb-item active">Avocat</li>
      </ol>
      <div class="d-flex justify-content-end align-items-end">
        <a href="{{route('avocat.add-fonction')}}" class="btn btn-outline-info mx-4">Nouvelle fonction</a>
        <a href="{{route('avocat.add')}}" class="btn btn-outline-info">Nouvel équipier</a>
      </div>

    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Recent Sales -->
          <div class="col-md-8">
            <div class="card recent-sales overflow-auto">


              <div class="card-body">
                <h5 class="card-title">Notre Equipe  </h5>

                <table class="table table-hover  datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">
                        Membre
                      </th>
                      <th scope="col">Fonction</th>
                    </tr>
                  </thead>
                  @if ($avocats)
                  <tbody>
                    @foreach ($avocats as $index=>$avocat )
                    <tr>
                        <th scope="row"><a >{{$index+1}}</a></th>
                        <td>
                          <div class="d-flex px-2 mb-2">
                            <div class="avatar">
                              <img src="{{ url('../assets/img/avocats/'.$avocat->photo)}}" class=" " alt="user1">
                            </div>
                            <div class="d-flex flex-column justify-content-center mx-3 pb-1">
                              <h6 class="mb-0 text-sm">{{$avocat->nom}}</h6>
                              <p class="text-xs text-secondary mb-0">{{$avocat->email}}</p>
                            </div>
                          </div>
                        </td>
                        <td>
                            @foreach ($avocat->fonctions as $fonction )
                            <p class="text-dark">{{$fonction->nom_fr}}</p>

                            @endforeach
                        </td>
                        <td>
                              <button class="btn btn-outline-warning"><a class="nav-link"
                              href="{{route('avocat.detail',$avocat->id)}}">Detail</a>
                              </button>
                      </td>




                    </tr>
                    @endforeach


                  </tbody>
                  @endif

                </table>

              </div>

            </div>
          </div>

          <div class="col-md-4">
            <div class="card recent-sales overflow-auto">


              <div class="card-body">
                <h5 class="card-title">Fonctions au sein du cabinet  </h5>

                <table class="table table-hover  ">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">
                        Nom
                      </th>
                      <th scope="col">

                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($fonctions as $index => $fonction )
                        <tr>
                            <th scope="row"><a href="#">{{$index+1}}</a></th>

                            <td><p class="text-dark">
                                 <span>{{$fonction->nom_fr}}</span>
                                  <span>{{$fonction->nom_en}}</span>
                                </p>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('avocat.edit-fonction',$fonction->id)}}" class="mx-2"  ><i class="text-warning bi bi-pencil-square"></i></a>

                                    <span  data-bs-toggle="modal" data-bs-target="#basicModal"> <i class="btn text-danger bi bi-trash3-fill"></i></span>
                                </div>
                                <div class="modal fade" id="basicModal" tabindex="-1">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title">Suppression de la fonction</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-center">Voulez-vous supprimer Cette fonction?</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                                          <form action="{{route('avocat.delete_fonction',$fonction->id)}}" method="post">
                                            @csrf
                                            @method('POST')
                                            <input type="submit" value="Oui"  class="btn btn-primary">
                                          </form>

                                        </div>
                                      </div>
                                    </div>
                                  </div>

                           </td>
                        </tr>
                    @endforeach


                  </tbody>
                </table>

              </div>

            </div>
          </div>


        </div>
      </div><!-- End Left side columns -->


    </div>
  </section>


  </div>
@endsection

