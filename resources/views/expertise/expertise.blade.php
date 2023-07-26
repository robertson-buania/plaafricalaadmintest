@extends("buania")

@section("contenu")
<div class="pagetitle">
    <h1>Expertises</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('expertise')}}">Home</a></li>
        <li class="breadcrumb-item active">Expertise</li>
      </ol>
      <div class="d-flex justify-content-end align-items-end">
        <a href="{{route('expertise.add')}}" class="btn text-dark btn-outline-danger">Nouvelle Expertise</a>
      </div>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Recent Sales -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">


              <div class="card-body">
                <h5 class="card-title">Expertises  </h5>

                <div class="row">

                    @foreach ($expertises as $expertise )
                    <div class="col-md-4">
                        <div class="card d-flex flex-column justify-content-center align-items-center">
                          <img src="{{url('assets/img/expertises/'.$expertise->photo)}}" class="card-img-top" alt="...">
                          <div class="card-img-overlay ">
                            <h5 class="card-title">
                                <a class="nav-link text-center" href="{{route('expertise.detail',$expertise->id)}}">
                                   {{$expertise->titre_fr}}
                                </a>
                                </h5>
                            <p class="card-text text-center">
                                {{$expertise->sous_titre_fr}}
                            </p>
                          </div>
                        </div>
                      </div>
                    @endforeach



                </div>

              </div>

            </div>
          </div><!-- End Recent Sales -->


        </div>
      </div><!-- End Left side columns -->


    </div>
  </section>
@endsection

