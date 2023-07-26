@extends("buania")

@section("contenu")
<div class="pagetitle">
    <h1>Bureaux</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('bureau')}}">Home</a></li>
        <li class="breadcrumb-item active">Bureau</li>
      </ol>
      <div class="d-flex justify-content-end align-items-end">
        <a href="{{route('bureau.add')}}" class="btn text-dark btn-outline-danger">Nouveau Bureau</a>
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
                <h5 class="card-title">Bureaux  </h5>

                <div class="row">
                    @if ($bureaux )
                        @foreach ($bureaux as $bureau )
                        <div class="col-md-4">
                            <div class="card">
                            <img src="{{url('assets/img/bureaux/'.$bureau->photo)}}" class="card-img-top" alt="...">
                            <div class="card-img-overlay">
                                <div class="d-flex justify-content-end align-items-end  ">
                                    <a href="{{route('bureau.edit',$bureau->id)}}" class="btn btn-warning">Editer</a>
                                </div>
                                <h5 class="text-center card-title"><a class="nav-link ">{{$bureau->nom}}</a></h5>
                                <p class="text-center  card-text">{{$bureau->description_fr}}.</p>
                            </div>
                            </div>
                        </div>
                        @endforeach
                    @endif

                </div>

              </div>

            </div>
          </div><!-- End Recent Sales -->


        </div>
      </div><!-- End Left side columns -->


    </div>
  </section>
@endsection

