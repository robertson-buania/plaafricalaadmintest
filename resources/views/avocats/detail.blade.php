@extends("buania")

@section("contenu")
<div class="pagetitle">
    <h1>Avocat</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('avocat')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('avocat')}}">Avocats</a></li>
        <li class="breadcrumb-item active">Detail</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{url('assets/img/avocats/'.$avocat->photo)}}" alt="Profile" class="rounded-circle">
            <h2>{{$avocat->nom}}</h2>

            @foreach ($avocat->fonctions as $fonction )
            <h3 class="text-dark">{{$fonction->nom}}</h3>

            @endforeach
            <div class="social-links mt-2">
              <a href="{{$avocat->twitter}}" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="{{$avocat->linkedin}}" class="linkedin"><i class="bi bi-linkedin"></i></a>
              <a href="{{url('assets/img/avocats/'.$avocat->cv)}}" class="linkedin "><i class="bi text-danger bi-download"></i></a>
            </div>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Mes infos</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>


              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#publications">Publications</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#description">Description fr</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">


                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nom</div>
                  <div class="col-lg-9 col-md-8">{{$avocat->nom}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Prénom</div>
                  <div class="col-lg-9 col-md-8">{{$avocat->prenom}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Fonction</div>
                  <div class="col-lg-9 col-md-8">

                    @foreach ($avocat->fonctions as $fonction )
                        <p>{{$fonction->nom_fr}} </p>
                    @endforeach

                  </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Bureau</div>
                    <div class="col-lg-9 col-md-8">

                      @foreach ($avocat->bureaux as $bureau )
                          <p>{{$bureau->nom}} </p>
                      @endforeach

                    </div>
                  </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Date naissance</div>
                  <div class="col-lg-9 col-md-8">{{$avocat->date_naissance}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Addresse</div>
                  <div class="col-lg-9 col-md-8">{{$avocat->adresse}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Téléphone</div>
                  <div class="col-lg-9 col-md-8">{{$avocat->telephone}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{$avocat->email}}</div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form id="formAccountSettings"
                 method="POST" action="{{route('avocat.update',$avocat->id)}}" enctype="multipart/form-data" >


                    @csrf
                    @method('POST')
                    <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Photo</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="{{url('assets/img/avocats/'.$avocat->photo)}}" alt="Profile">
                      <div class="pt-2">
                        <input class="form-control" value="{{url('assets/img/avocats/'.$avocat->photo)}}"  type="file" id="photo" name="photo" />
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="nom" class="col-md-4 col-lg-3 col-form-label">Nom</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="nom" type="text" class="form-control" id="nom" value="{{$avocat->nom}}">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label   class="col-md-4 col-lg-3 col-form-label">Description en  Français (<strong>.html,.htm</strong>)</label>
                    <div class="col-md-8 col-lg-9">

                        <input  name="description_fr" type="file"  class="form-control" accept=".html,.htm"/>

                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label  class="col-md-4 col-lg-3 col-form-label">Description en Anglais (<strong>.html,.htm</strong>)</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="description_en" type="file" class="form-control" accept=".html,.htm"/>

                    </div>
                  </div>


                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Fonction </label>
                    <div class="col-sm-10">


                        @foreach ($avocat->fonctions as $fonction )
                        <h6  >{{$fonction->nom_fr}}</h6>
                        @endforeach

                        <option selected>Selectionnez une ou plusieurs</option>


                        <select multiple aria-label="multiple select example" id="fonction" name="fonction_id[]"  class="select2 form-select">
                        <option value="">Fonction</option>

                        @foreach ($fonctions as $fonction )
                        <option value="{{$fonction->id}}">{{$fonction->nom_fr}}</option>
                        @endforeach


                        </select>
                    </div>
                  </div>


                  {{-- <div class="row mb-3">
                    <label for="Niveau" class="form-label">Niveau</label>
                    <select id="Niveau" name="niveau" class="select2 form-select">
                      <option value=""> Niveau</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div> --}}
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Bureau d'attache</label>
                    <div class="col-sm-10">
                        @foreach ($avocat->bureaux as $bureau )
                          <h6>{{$bureau->nom}} </h6>
                      @endforeach
                      @if($bureaux)
                      <select name="bureaux[]" class="form-select" multiple aria-label="multiple select example">
                        <option >Selectionnez un ou plusieurs</option>
                        @foreach ($bureaux as $bureau )
                        <option value="{{$bureau->id}}">{{$bureau->nom}}</option>
                        @endforeach
                      </select>
                      @endif


                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="date_naissance" class="col-md-4 col-lg-3 col-form-label">Date de naissance</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="date_naissance" type="date"  class="form-control" id="date_naissance" value="{{$avocat->date_naissance}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Addresse" class="col-md-4 col-lg-3 col-form-label">Addresse</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="addresse" type="text" class="form-control" id="Addresse" value="{{$avocat->adresse}}">
                    </div>
                  </div>

                  <div class="row mb-3">

                    <div class="col-md-8 col-lg-9">
                        <label class="input-group-text">Tél:
                        <input type="text" id="telephone" name="telephone" class="form-control"value="{{$avocat->telephone}}" />
                    </label>
                 </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="Email" value="{{$avocat->email}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter </label>
                    <div class="col-md-8 col-lg-9">
                      <input name="twitter" type="text" class="form-control" id="Twitter" value="{{$avocat->twitter}}">
                    </div>
                  </div>



                  <div class="row mb-3">
                    <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin </label>
                    <div class="col-md-8 col-lg-9">
                      <input name="linkedin" type="text" class="form-control" id="Linkedin" value="{{$avocat->linkedin}}">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Valider</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>


              <div class="tab-pane fade pt-3" id="publications">

                <div class="row">
                    @if($avocat->publications)
                    <div class="card mb-3">
                        @foreach ($avocat->publications as $pub)
                        <div class="row g-0">
                            <div class="col-md-4">
                              <img src="{{url('assets/img/publications/'.$pub->photo)}}" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                              <div class="card-body">
                                <h5 class="card-title"><a href="{{route('publication.detail',$pub->id)}}">{{$pub->titre_fr}}</a></h5>
                                <p class="card-text">{{$pub->sous_titre_fr}} </p>
                              </div>
                            </div>
                          </div>
                        @endforeach

                      </div>
                    @endif

                </div>
              </div>
              <div class="tab-pane fade pt-3" id="description">
                <div class="content">
                    <div  style="height:400px" >
                        <iframe class="overflow-auto"  frameborder="0"     height= "100% " width="100%"
                        style=" top: 0;left: 0;width: 100%;height: 100%;" src="{{url('assets/img/avocats/'.$avocat->description_fr)}}"></iframe>
                    </div>
                </div>

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
@section("contenu-javascript")
<script>
    ClassicEditor
        .create( document.querySelector( '#description_fr_fr' ) )
        .catch( error => {
           // console.error( error );
        } );
</script>

<script>
    ClassicEditor
        .create( document.querySelector( '#description_en_en' ) )
        .catch( error => {
          //  console.error( error );
        } );
</script>


@endsection
