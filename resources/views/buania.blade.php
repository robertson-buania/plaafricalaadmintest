<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pla africa law - Administration web site</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ url('assets/img/PlaLogo.ico')}}" rel="icon">
  <link href="{{ url('assets/img/PlaLogo.ico')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ url('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ url('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ url('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ url('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ url('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ url('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ url('assets/css/style.css')}}" rel="stylesheet">
  <script>
    function resizeIframe(iframe) {
      var iframeContent = iframe.contentWindow.document.body.scrollHeight;
      iframe.style.height = iframeContent + 'px';
    }


  </script>
 {{--  <script>




</script> --}}

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top bg-white d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center me-5 pe-5">
        <img   src="{{ url('assets/img/PLA logo.png')}}" alt="">
      </a>
      <i class="mx-5 bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

         <!-- End Notification Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0"
          data-bs-toggle="dropdown">
            <img src="{{ url('assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><div>{{ Auth::user()->name }}</div></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->email }}</h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('profile.edit')}}">
                <i class="bi bi-person"></i>
                <span>Editer mon Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        Deconnexion
                    </x-dropdown-link>
                </form>
                <span></span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>


          </ul>
          <!-- End Profile Iamge Icon -->
<!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav  " id="sidebar-nav">

      <li class="nav-item mt-4 my-2 p-3">
        <a class="nav-link " href="{{route('avocat')}}">
          <i class="text-secondary bi bi-people-fill"></i>
          <span>Avocat</span>
        </a>
      </li>
      <li class="nav-item my-2 p-3">
        <a class="nav-link " href="{{route('publication')}}">
          <i class="text-warning bi bi-newspaper"></i>
          <span>Publication</span>
        </a>
      </li>

      <li class="nav-item my-2 p-3">
        <a class="nav-link " href="{{route('expertise')}}">
          <i class="bi bi-grid"></i>
          <span>Expertise</span>
        </a>
      </li>

      <li class="nav-item my-2 p-3 collapsed">
        <a class="nav-link " href="{{route('bureau')}}">
          <i class="text-danger bi bi-pc-display-horizontal"></i>
          <span>Bureau</span>
        </a>
      </li>
      <li class="nav-item my-2 collapsed">
        <a class="nav-link " href="{{route('newsletter')}}">
          <i class="bi bi-envelope-paper-fill"></i>
          <span>Newsletter</span>
        </a>
      </li>




    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    @yield("contenu")
  </main><!-- End  main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Buania</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
       Designed by <a href="https://buania.net/">Buania</a>
    </div>
  </footer><!-- End Footer -->

  <a href="{{route('publication')}}" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ url('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <script src="{{ url('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{ url('assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{ url('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{ url('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{ url('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ url('assets/js/main.js')}}"></script>
  <script src="{{url('assets/vendor/ckeditor/ckeditor.js')}}"></script>
@yield("contenu-javascript")
</body>

</html>
