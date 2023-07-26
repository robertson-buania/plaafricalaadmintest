@extends("buania")

@section("contenu")
<div class="pagetitle">
    <h1>Newsletters</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('newsletter')}}">Home</a></li>
        <li class="breadcrumb-item active">Newsletter</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Toutes les notifications</h5>

                  <!-- Table with stripped rows -->
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col"> Date</th>
                      </tr>
                    </thead>
                    @if ($newsletters)
                    <tbody>
                        @foreach ($newsletters as $letter )
                            <tr>
                                <td> {{$letter->id}} </td>
                                <td>{{$letter->name}}</td>
                                <td> {{$letter->email}}</td>
                                <td>{{$letter->objet}}</td>
                                <td> {{$letter->message}}</td>
                                <td>{{$letter->created_at}} </td>
                            </tr>
                        @endforeach

                    </tbody>
                    @endif


                  </table>


                </div>
              </div>
        </div>
    </div>
  </section>
@endsection

