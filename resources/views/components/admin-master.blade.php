<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href={{asset("css/admin-styles.css")}} rel="stylesheet" />

</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{route('admin.index')}}">Admin Panel</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('profil')}}">Profil</a></li>
                <li><a class="dropdown-item" href="{{route('home')}}">Početna stranica</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                    <form method="POST" action="{{route('logout')}}">
                        @csrf
                        <button type="submit" class="dropdown-item">Odjavi se</button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading"></div>
                    <a class="nav-link" href="{{route('admin.index')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Izvještajni panel
                    </a>
                    <div class="sb-sidenav-menu-heading"></div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        Korisnici
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseUsers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{route('all.users')}}">Kupci</a>
                            <a class="nav-link" href="{{route('all.admins')}}">Admini</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">
                        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                        Kategorije
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseCategory" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{route('category.index')}}">Lista svih kategorija</a>
                            <a class="nav-link" href="{{route('category.create')}}">Dodaj novu kategoriju</a>
                            <a class="nav-link" href="{{route('category.equipment.index')}}">Lista svih kategorija za opremu</a>
                            <a class="nav-link" href="{{route('category.equipment.create')}}">Dodaj novu kategoriju za opremu</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseArticles" aria-expanded="false" aria-controls="collapseArticles">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Artikli
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseArticles" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{route('phone.create')}}">Dodaj novi telefon</a>
                            <a class="nav-link" href="{{route('tablet.create')}}">Dodaj novi tablet</a>
                            <a class="nav-link" href="{{route('equipment.create')}}">Dodaj opremu za telefone/tablete</a>
                            <a class="nav-link" href="{{route('phone.index')}}">Telefoni</a>
                            <a class="nav-link" href="{{route('tablet.index')}}">Tableti</a>
                            <a class="nav-link" href="{{route('equipment.index')}}">Oprema za telefone/tablete</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOrders" aria-expanded="false" aria-controls="collapseOrders">
                        <div class="sb-nav-link-icon"><i class="fas fa-dolly-flatbed"></i></div>
                        Narudzbe
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseOrders" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{route('all.orders')}}">Lista narudzbi</a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Prijavljen kao:</div>
                {{auth()->user()->first_name}}
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Izvještajni panel</h1>
                @if(session('tablet-created-message'))
                    <div class="alert alert-success">
                        {{session('tablet-created-message')}}
                    </div>
                    @elseif(session('phone-created-message'))
                    <div class="alert alert-success">
                        {{session('phone-created-message')}}
                    </div>
                    @elseif(session('categroy-created-message'))
                    <div class="alert alert-success">
                        {{session('categroy-created-message')}}
                    </div>
                    @elseif(session('categroy-equipment-created-message'))
                        <div class="alert alert-success">
                            {{session('categroy-equipment-created-message')}}
                        </div>
                    @elseif(session('equipment-created-message'))
                        <div class="alert alert-success">
                            {{session('equipment-created-message')}}
                        </div>
                    @elseif(session('phone-deleted'))
                        <div class="alert alert-danger">
                            {{session('phone-deleted')}}
                        </div>
                    @elseif(session('tablet-deleted'))
                        <div class="alert alert-danger">
                            {{session('tablet-deleted')}}
                        </div>
                    @elseif(session('tablet-updated-message'))
                        <div class="alert alert-success">
                            {{session('tablet-updated-message')}}
                        </div>
                    @elseif(session('phone-updated-message'))
                        <div class="alert alert-success">
                            {{session('phone-updated-message')}}
                        </div>
                    @elseif(session('category-updated-message'))
                        <div class="alert alert-success">
                            {{session('category-updated-message')}}
                        </div>
                    @elseif(session('category-deleted'))
                        <div class="alert alert-danger">
                            {{session('category-deleted')}}
                        </div>
                    @elseif(session('category-equipment-updated-message'))
                        <div class="alert alert-success">
                            {{session('category-equipment-updated-message')}}
                        </div>
                    @elseif(session('category-equipment-deleted'))
                        <div class="alert alert-danger">
                            {{session('category-equipment-deleted')}}
                        </div>
                    @elseif(session('equipment-updated-message'))
                        <div class="alert alert-success">
                            {{session('equipment-updated-message')}}
                        </div>
                    @elseif(session('equipment-deleted'))
                        <div class="alert alert-danger">
                            {{session('equipment-deleted')}}
                        </div>
                @endif
                @yield('content')
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Mobile Shop 2022</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src={{asset("js/admin-scripts.js")}}></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src={{asset("js/datatables-simple-demo.js")}}></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</body>
</html>
