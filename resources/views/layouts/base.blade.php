<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name') }} | Accueil </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  @yield('styles')
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
  {{-- editmsg --}}
 
 
  @livewireStyles
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('logo/edunov.png')}}" alt="logo-edunov" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark"  style="background-color: #feb041">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
    document.getElementById('logout-form').submit();">
        @lang('Déconnexion')
  </a>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto"  style="background-color: #fef104">
      <!-- Navbar Search -->
      <li class="nav-item">
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
          @csrf                                
        </form>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
      <img src="{{ asset('logo/edunov.png')}}" alt="logo-edunov" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if(!empty($profil->images))
            <img src="{{ asset('assets/images/profiles')}}/{{ $profil->images }}" class="img-circle elevation-2" alt="User Image">
          @else
            <img src="{{ asset('default.png')}}" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-id-badge"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                  <p>
                    Compte utilisateur/Administrateur
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('liste.user') }}" class="nav-link">
                      <i class="fa-solid fa-id-badge"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                      <p>
                        Création de compte
                      </p>
                    </a>
                  </li>
                </ul>
              </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-id-badge"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                  <p>
                    Profil
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('user.profil') }}" class="nav-link">
                      <i class="fa-solid fa-id-badge"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                      <p>
                         Completer mon profil
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('edit.password') }}" class="nav-link">
                      <i class="fa-solid fa-gear"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                      <p>Changer mon mot de passe</p>
                    </a>
                  </li>
                </ul>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1 class="m-0">Tableau de bord de {{ Auth::user()->name }}</h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Accueil</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          @yield('content')
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer" style="background-color: #fff; color:black">
    <strong>Copyright &copy; {{ Date('Y') }} <a href="https://edunov.com">Edunov</a></strong>
   Tout droit réservé. | developped by <a href="https://parlons-digital.com">Parlons Digital</a>
  </footer>
</div>
<!-- ./wrapper -->
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>

@livewireScripts

@yield('scripts')

<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.js')}}"></script>

<script src="https://kit.fontawesome.com/299943a710.js" crossorigin="anonymous"></script>
<!-- Switch btn -->
<!-- / Switch btn -->
</body>
</html>
