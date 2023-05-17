        <nav class="topnav sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white"> -->
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Brand-->
            <div>

                <a class="navbar-brand ps-3" href="<?= base_url() ?>"><img src="<?= base_url('/assets/img/logo-compensar-blanco.svg') ?>" alt="logo_compensar">salud -
                    Dashboard</a>
            </div>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <!-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                        aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                            class="fas fa-search"></i></button>
                </div> -->
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <h6 class="dropdown-header d-flex align-items-center">
                            <i class="fas fa-user fa-2x mr-3"></i>
                            <div class="dropdown-user-details">
                                <div class="dropdown-user-details-name">
                                    &nbsp;&nbsp;<?= auth()->user()->name; ?>
                                </div>
                                <div class="dropdown-user-details-email">
                                    &nbsp;&nbsp;<?= auth()->user()->getIdentities()[0]->secret; ?>
                                </div>
                            </div>
                        </h6>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sidenav sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <?php if (auth()->user()->inGroup('admin')) : ?>
                                <div class="sb-sidenav-menu-heading">Admin</div>
                                <a class="nav-link" href="<?= base_url('/createUser') ?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                                    Crear Usuario
                                </a>
                                <a class="nav-link" href="<?= base_url('/viewUsers') ?>">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa-solid fa-users"></i>
                                    </div>
                                    Ver Usuarios
                                </a>
                                <a class="nav-link" href="<?= base_url('/uploadExcel') ?>">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa-solid fa-file-arrow-up"></i>
                                    </div>
                                    Subir Excel
                                </a>
                            <?php endif; ?>
                            <div class="sb-sidenav-menu-heading">Reportes</div>
                            <a class="nav-link" href="<?= base_url('report/1') ?>">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-list-check"></i></div>
                                Citas ejecutadas
                            </a>
                            <a class="nav-link" href="<?= base_url('report/2') ?>">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-clipboard"></i></div>
                                Oferta
                            </a>
                            <a class="nav-link" href="<?= base_url('report/3') ?>">
                                <div class="sb-nav-link-icon"><i class="fa-regular fa-calendar-days"></i></div>
                                Novedades
                            </a>
                            <a class="nav-link" href="<?= base_url('report/4') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-hospital"></i></div>
                                Capacidad
                            </a>
                            <a class="nav-link" href="<?= base_url('report/5') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-handshake"></i></div>
                                Contratación
                            </a>
                            <a class="nav-link" href="<?= base_url('report/6') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-md"></i></div>
                                Productividad
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Hola:</div>
                        <?= auth()->user()->name ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">