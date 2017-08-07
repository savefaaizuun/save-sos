<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
        <!-- Toastr style -->
        <link href="{{ asset('assets/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
        <!-- Gritter -->
        <link href="{{ asset('assets/js/plugins/gritter/jquery.gritter.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
        <!-- Datepicker -->


        <!-- Jquery -->
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

                    @yield('script')
                    
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