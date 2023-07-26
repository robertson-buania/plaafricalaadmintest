@extends("buania")

@section("contenu")

<div class="pagetitle">
    <h1>Publication</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('publication')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('publication')}}">Publications</a></li>
        <li class="breadcrumb-item active">Detail</li>
      </ol>
      <div class="d-flex align-tems-end justify-content-end">
        <form action="{{route('publication.delete',$publication->id)}}" method="post">
            @csrf
            @method("post")
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
      </div>

    </nav>

  </div>

  <section id="blog-details" class="blog-details">

  <div class="card">
      <div class="card-body">

      <!-- Bordered Tabs Justified -->
      <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
          <li class="nav-item flex-fill" role="presentation">
          <button class="nav-link w-100 active" id="home-tab"
          data-bs-toggle="tab" data-bs-target="#bordered-justified-home"
          type="button" role="tab" aria-controls="home" aria-selected="true">Français</button>
          </li>
          <li class="nav-item flex-fill" role="presentation">
          <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Anglais</button>
          </li>
      </ul>
      <div class="tab-content pt-2" id="borderedTabJustifiedContent">
          <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">

            <div class="container mt-5" data-aos="fade-up" data-aos-delay="100">

                <div class="row ">

                    <div class="col-lg-12">

                        <article class="article">

                        <div class="post-img">
                            <img src="{{url('assets/img/publications/'.$publication->photo)}}" alt="" class="img-fluid">
                        </div>

                        <blockquote>
                            <h2 class="title">{{$publication->titre_fr}}</h2>

                        </blockquote>


                        <div class="meta-top">
                            <ul>
                            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a >{{$publication->avocat->nom}}</a></li>
                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a ><time datetime="2020-01-01">{{$publication->created_at}}</time></a></li>
                            <li class="d-flex align-items-center"><i class="bi bi-download"></i> <a href="{{url('assets/img/publications/'.$publication->avocat->photo)}}" ><span class="btn badge bg-danger">PDF</span></a></li>
                            </ul>
                        </div><!-- End meta top -->

                        <div class="content">

                            <div   >
                                <iframe  frameborder="0" scrolling="no" onload="resizeIframe(this)"  height= "100%" width="100%"
                                style=" top: 0;left: 0;width: 100%;height: 100%;" src="{{url('assets/img/publications/'.$publication->contenu_fr)}}"></iframe>

                            </div>

                        </div><!-- End post content -->



                        </article><!-- End post article -->



                    </div>


                </div>

            </div>
          </div>
          <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="container mt-5" data-aos="fade-up" data-aos-delay="100">

                <div class="row ">

                <div class="col-lg-12">

                    <article class="article">

                    <div class="post-img">
                        <img src="{{url('assets/img/publications/'.$publication->photo)}}" alt="" class="img-fluid">
                    </div>

                    <blockquote>
                        <h2 class="title">{{$publication->titre_en}}</h2>

                    </blockquote>


                    <div class="meta-top">
                        <ul>
                            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a >{{$publication->avocat->nom}}</a></li>
                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a ><time datetime="2020-01-01">{{$publication->created_at}}</time></a></li>
                            <li class="d-flex align-items-center"><i class="bi bi-download"></i> <a href="{{url('assets/img/publications/'.$publication->avocat->pdf_en)}}" ><span class="btn badge bg-danger">PDF</span></a></li>
                            </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <hr>
                        <div class="content">
                            <div   >


                                <iframe class="overflow-auto"  frameborder="0" scrolling="no"  height= "100% " width="100%"
                                style=" top: 0;left: 0;width: 100%;height: 100%;" src="{{url('assets/img/publications/'.$publication->contenu_en)}}"></iframe>
                            </div>
                        </div>

                    </article>



                </div>


                </div>

            </div>
          </div>
      </div>
      <!-- End Bordered Tabs Justified -->

      </div>
  </div>



  </section>
@endsection
