@extends("buania")

@section("contenu")
<div class="pagetitle">
    <h1>Expertise</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('avocat')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('expertise')}}">Expertises</a></li>
        <li class="breadcrumb-item active">Detail</li>
      </ol>
      <div class="d-flex align-tems-end justify-content-end">
        <form action="{{route('expertise.delete',$expertise->id)}}" method="post">
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

                  <div class="row ">
                    <div class="col-md-6 d-flex align-items-center justify-content-center ">
                        <h2 class="title">{{$expertise->titre_fr}}</h2>

                    </div>
                    <div class="col-md-6">
                        <div class="post-img">
                            <img src="{{url('assets/img/expertises/'.$expertise->photo)}}" alt="" class="img-fluid">
                            <div class="meta-top">
                                <ul class="d-flex align-items-center justify-content-center ">

                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a ><time datetime="2020-01-01">{{$expertise->created_at}}</time></a></li>
                                    <li class="d-flex align-items-center"> <a href="{{url('assets/img/expertises/'.$expertise->pdf_fr)}}" ><i class="bi bi-download"></i><span class="btn badge bg-danger">PDF</span></a></li>
                                </ul>
                            </div>
                         </div>
                    </div>




                  </div>
                  <hr>
                  <div class="content">
                      <div   >
                        <iframe  frameborder="0" scrolling="no" onload="resizeIframe(this)"  height= "100%"; width="100%"
                        style=" top: 0;left: 0;width: 100%;height: 100%;" src="{{url('assets/img/expertises/'.$expertise->contenu_fr)}}"></iframe>

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

                    <div class="row ">
                        <div class="col-md-6 d-flex align-items-center justify-content-center ">
                            <h2 class="title">{{$expertise->titre_en}}</h2>

                        </div>
                        <div class="col-md-6">
                            <div class="post-img">
                                <img src="{{url('assets/img/expertises/'.$expertise->photo)}}" alt="" class="img-fluid">
                                <div class="meta-top">
                                    <ul class="d-flex align-items-center justify-content-center ">

                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a ><time datetime="2020-01-01">{{$expertise->created_at}}</time></a></li>
                                        <li class="d-flex align-items-center"> <a href="{{url('assets/img/expertises/'.$expertise->pdf_en)}}" ><i class="bi bi-download"></i><span class="btn badge bg-danger">PDF</span></a></li>
                                    </ul>
                                </div>
                             </div>
                        </div>

                      </div>
                  <hr>
                  <div class="content">
                    <div   >

                        <iframe  frameborder="0" scrolling="no" height= "100%"; width="100%"
                        style=" top: 0;left: 0;width: 100%;height: 100%;" src="{{url('assets/img/expertises/'.$expertise->contenu_en)}}"></iframe>

                      </div>
                  </div>

                  </article><!-- End post article -->



              </div>


              </div>

          </div>
          </div>
      </div><!-- End Bordered Tabs Justified -->

      </div>
  </div>



  </section>
@endsection
