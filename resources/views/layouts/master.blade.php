<!DOCTYPE html>
<html>
    <head>
        @include('layouts.includes.head')
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar-default navbar-static-side" role="navigation">
                 @include('layouts.includes.sidebar')
            </nav>
                        <div id="page-wrapper" class="gray-bg">
                            <div class="row border-bottom">
                                @include('layouts.includes.topbar')  
                            </div>
                            <div class="row wrapper border-bottom white-bg page-heading">
                                @yield('content-header')
                            </div>
                            <div class="wrapper wrapper-content animated fadeInRight">
                                <div class="row">
                                    <div class="col-lg-12">
                                        @if ($message = Session::get('success'))
                                          <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $message }}</strong>
                                          </div>
                                        @endif
                                        <div class="ibox float-e-margins">
                                            @yield('content-header-sub')
                                        
                                            <div class="ibox-content">
                                                @yield('content')
                                            </div>
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                </div>
                            </div>
                            
                            <div class="footer">
                                <div class="pull-right">
                                    10GB of <strong>250GB</strong> Free.
                                </div>
                                <div>
                                    <strong>Copyright</strong> Example Company &copy; 2014-2015
                                </div>
                            </div>
                        </div>
                    </div>
                    @yield('modals')
                    <!-- Mainly scripts -->
                    <script src="{{ asset('assets/js/jquery-2.1.1.js') }}"></script>
                    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
                    <script src="{{ asset('assets/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
                    <script src="{{ asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
                    <script src="{{ asset('assets/js/plugins/jeditable/jquery.jeditable.js') }}"></script>
                    <!-- Data Tables -->
                    <script src="{{ asset('assets/js/plugins/dataTables/jquery.dataTables.js') }}"></script>
                    <script src="{{ asset('assets/js/plugins/dataTables/dataTables.bootstrap.js') }}"></script>
                    <script src="{{ asset('assets/js/plugins/dataTables/dataTables.responsive.js') }}"></script>
                    <script src="{{ asset('assets/js/plugins/dataTables/dataTables.tableTools.min.js') }}"></script>
                    <!-- Custom and plugin javascript -->
                    <script src="{{ asset('assets/js/inspinia.js') }}"></script>
                    <script src="{{ asset('assets/js/plugins/pace/pace.min.js') }}"></script>
                    <!-- Page-Level Scripts -->
                    <script type="text/javascript">
                    $(function () {
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                    });
                    });
                    </script>
                    
                    <style>
                    body.DTTT_Print {
                    background: #fff;
                    }
                    .DTTT_Print #page-wrapper {
                    margin: 0;
                    background:#fff;
                    }
                    button.DTTT_button, div.DTTT_button, a.DTTT_button {
                    border: 1px solid #e7eaec;
                    background: #fff;
                    color: #676a6c;
                    box-shadow: none;
                    padding: 6px 8px;
                    }
                    button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
                    border: 1px solid #d2d2d2;
                    background: #fff;
                    color: #676a6c;
                    box-shadow: none;
                    padding: 6px 8px;
                    }
                    .dataTables_filter label {
                    margin-right: 5px;
                    }
                    </style>
                    
                </body>
            </html>