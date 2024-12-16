<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }} | @yield('title')</title>
    <!-- <title>Kelola Surat</title> -->
    <link rel="shortcut icon" href="{{ asset('thema/assets/images/favicon.ico') }}" />


    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('thema/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('thema/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('thema/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('thema/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('thema/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('thema/assets/css/style.css') }}">
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('thema/assets/css/style-2.css') }}">
    <!-- End layout styles -->
</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="/surat">
                <img src="{{ asset('thema/assets/images/favicon.png') }}" alt="logo" style="width: 40px; height: auto; margin-left: 35px; background-color: #294B29;" />
            </a>
            <a class="navbar-brand brand-logo-mini text-center" href="surat">
                <img src="{{ asset('thema/assets/images/favicon.png') }}" alt="logo" style="width: 50px; height: auto;" />
            </a>

            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>

                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="nav-profile-img">
                                @empty(auth()->user()->file)
                                    <img src="{{ asset('thema/assets/images/faces/face1.jpg') }}" alt="image">
                                @else
                                    <img src="{{ url('/' . auth()->user()->file) }}" alt="image">
                                @endempty
                                <span class="availability-status online"></span>
                            </div>
                            @if (auth()->user()->level == 'superadmin')
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">{{ auth()->user()->level}}</p>
                            </div>
                            @else
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">{{ auth()->user()->bagianSurat->nama_bagian ?? 'Tidak Ada Bagian'}}</p>
                            </div>
                            @endif

                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="/logout">
                                <i class="mdi mdi-logout mr-2 white-icon"></i> logout </a>
                        </div>
                    </li>

                </ul>

                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="" class="nav-link readonly">
                            <div class="nav-profile-image">
                                @empty(auth()->user()->file)
                                    <img src="{{ asset('thema/assets/images/faces/face1.jpg') }}" alt="profile">
                                @else
                                    <img src="{{ url('/' . auth()->user()->file) }}" alt="profile">
                                @endempty
                                <span class="login-status online"></span>
                                <!--change to offline or busy as needed-->
                            </div>
                            @if (auth()->user()->level == 'superadmin')
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2">{{ auth()->user()->level }}</span>
                            </div>
                            @else
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2">{{ auth()->user()->bagianSurat->nama_bagian ?? 'Tidak Ada Bagian' }}</span>
                                <span class="text-secondary text-small">{{ auth()->user()->level }}</span>
                            </div>
                            @endif
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/surat">
                            <span class="menu-title">DASHBOARD</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                        <li class="nav-item">
                            @if(auth()->user()->level === 'superadmin')
                            <a class="nav-link" href="/view-user">
                                <span class="menu-title">DATA USER</span>
                                <i class="mdi mdi-account menu-icon"></i>
                            </a>
                            @endif
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <span class="menu-title">SURAT</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-email menu-icon"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu" >
                                <li class="nav-item"> <a class="nav-link" href="/view-sm">SURAT MASUK</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="/view-sk">SURAT KELUAR</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">

                @yield("content")

                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="container-fluid clearfix">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Agung Wicaksono 2024</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ asset('thema/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('thema/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('thema/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('thema/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('thema/assets/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('thema/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('thema/assets/js/todolist.js') }}"></script>
    <!-- End custom js for this page -->
    <!-- Custom js for this page -->
    <script src="{{ asset('thema/assets/js/file-upload.js') }}"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('thema/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('thema/assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": true,
                "buttons": ["excel", "csv"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

</body>

</html>
