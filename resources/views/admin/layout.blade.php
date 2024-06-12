<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="/assets/img/olbiz.jpg" rel="icon">

    <title>Olbizgo Dashboard</title>

    <link href="/assets/admin/plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/admin/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/assets/admin/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/admin/plugins/nprogress/nprogress.css" rel="stylesheet">
    <link href="/assets/admin/plugins/iCheck/skins/flat/green.css" rel="stylesheet">
	<link href="/assets/admin/plugins/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

    
    <link href="/assets/admin/custom.min.css" rel="stylesheet">
    @stack('styles')
  </head>

  <body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title d-flex justify-content-center" style="border: 0;">
                        <img src="/assets/img/logo_preview.png" alt="Olbizgofont" style="height: 100px;width:180px;">
                        <a href="index.html" class="site_title"><span><strong>Dashboard</strong></span></a>
                    </div>
                    <div class="clearfix"></div>
                    <br />
        
                    <!-- Side Menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" style="margin-top: 90px;">
                        <div class="menu_section">
                            <h3 style="margin-bottom: 15px;"><i class="fa fa-suitcase"></i>Géneral</h3>
                            <ul class="nav side-menu">
                                <li>
                                    <a><i class="fa fa-cubes"></i> Expeditions <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                      <li><a href="/dashboard/expeditions">Liste expedition</a></li>
                                      <li><a href="/dashboard/expeditions/detail">Details expedition</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="/dashboard/stats"><i class="fa fa-bar-chart"></i> Statistiques </a>
                                </li>
                                <li>
                                    <a href="/dashboard/accounts"><i class="fa fa-users"></i> Compte utilisateurs </a>
                                </li>
                                <li>
                                    <a href="/dashboard/messages"><i class="fa fa-envelope"></i> Messages </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Top Bar -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="/assets/img/admin.png" alt="">
                                    Admin Olbizgo
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/" target="_blank"><i class="fa fa-external-link pull-right" style="font-size: 13px;"></i>  Ouvir le site</a>
                                    <a class="dropdown-item" ><i class="fa fa-sign-out pull-right"></i>Deconnexion</a>
                                </div>
                            </li>
        
                            {{-- possible to use to display new reclamations or messages from guest contact --}}
                            {{-- <li role="presentation" class="nav-item dropdown open">
                                <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1"
                                    data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">6</span>
                                </a>
                            </li> --}}
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="right_col" role="main">
                @yield('content')
            </div>
        
            <footer>
                <div class="pull-right">
                    Olbizgo - Panneau d'administration</a>
                </div>
                <div class="clearfix"></div>
            </footer>
        </div>
    </div>

    <script src="/assets/admin/plugins/jquery/dist/jquery.min.js"></script>
    <script src="/assets/admin/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/admin/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/assets/admin/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/assets/admin/plugins/fastclick/lib/fastclick.js"></script>
    <script src="/assets/admin/plugins/nprogress/nprogress.js"></script>
    <script src="/assets/admin/plugins/Chart.js/dist/Chart.min.js"></script>
    <script src="/assets/admin/plugins/gauge.js/dist/gauge.min.js"></script>
    <script src="/assets/admin/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="/assets/admin/plugins/iCheck/icheck.min.js"></script>
    <script src="/assets/admin/plugins/skycons/skycons.js"></script>
    <script src="/assets/admin/plugins/Flot/jquery.flot.js"></script>
    <script src="/assets/admin/plugins/Flot/jquery.flot.pie.js"></script>
    <script src="/assets/admin/plugins/Flot/jquery.flot.time.js"></script>
    <script src="/assets/admin/plugins/Flot/jquery.flot.stack.js"></script>
    <script src="/assets/admin/plugins/Flot/jquery.flot.resize.js"></script>
    <script src="/assets/admin/plugins/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="/assets/admin/plugins/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="/assets/admin/plugins/flot.curvedlines/curvedLines.js"></script>
    <script src="/assets/admin/plugins/DateJS/build/date.js"></script>
    

    <script src="/assets/admin/plugins/moment/min/moment.min.js"></script>
    <script src="/assets/admin/custom.min.js"></script>
    @stack('scripts')
  </body>
</html>
