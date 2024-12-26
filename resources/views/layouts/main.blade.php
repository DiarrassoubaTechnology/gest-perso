<!DOCTYPE html>
<html dir="ltr" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/assets/images/favicon.png')}}">

    <title>{{ "IR GROUP - ". $title }}</title>

    <!-- Custom CSS -->
    <link href="{{asset('assets/assets/extra-libs/c3/c3.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />

    
    @if (isset($load_liste_file_employee) && $load_liste_file_employee == true)
        <!-- This page plugin CSS -->
        <link href="{{asset('assets/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    @endif
    
    <!-- Custom CSS -->
    <link href="{{asset('assets/dist/css/style.min.css')}}" rel="stylesheet">
    
</head>

    <body>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
            data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

            @yield('menu')

            @yield('contain')

            <!-- Danger Header Modal -->
            <div id="danger-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-danger">
                            <h4 class="modal-title" id="danger-header-modalLabel">Confirmation de déconnexion</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>Êtes-vous sûr de vouloir vous déconnecter ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">NON</button>
                            <a href="{{ route('login.out') }}" class="btn btn-danger">OUI</a>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            
        </div>

        <script src="{{asset('assets/assets/libs/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{asset('assets/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
        <script src="{{asset('assets/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <!-- apps -->
        <!-- apps -->
        <script src="{{asset('assets/dist/js/app-style-switcher.js')}}"></script>
        <script src="{{asset('assets/dist/js/feather.min.js')}}"></script>
        <script src="{{asset('assets/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
        <script src="{{asset('assets/dist/js/sidebarmenu.js')}}"></script>
        <!--Custom JavaScript -->
        <script src="{{asset('assets/dist/js/custom.min.js')}}"></script>
        <!--This page JavaScript -->
        <script src="{{asset('assets/assets/extra-libs/c3/d3.min.js')}}"></script>
        <script src="{{asset('assets/assets/extra-libs/c3/c3.min.js')}}"></script>
        <script src="{{asset('assets/assets/libs/chartist/dist/chartist.min.js')}}"></script>
        <script src="{{asset('assets/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
        <script src="{{asset('assets/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js')}}"></script>
        <script src="{{asset('assets/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js')}}"></script>
        <script src="{{asset('assets/dist/js/pages/dashboards/dashboard1.min.js')}}"></script>

        @if (isset($load_liste_file_employee) && $load_liste_file_employee == true)
            <script src="{{asset('assets/assets/extra-libs/sparkline/sparkline.js')}}"></script>
            <!--This page plugins -->
            <script src="{{asset('assets/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('assets/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
        @endif

    </body>
</html>