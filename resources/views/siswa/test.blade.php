<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Dashboard</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
        <!-- Toastr style -->
        <link href="{{ asset('assets/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
        <!-- Gritter -->
        <link href="{{ asset('assets/js/plugins/gritter/jquery.gritter.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
        <!-- Datepicker -->
        <link href="{{ asset('assets/datepicker/css/datepicker.css') }}" rel="stylesheet">

</head>

<body>
    <div class="form-group"><label class="col-lg-2 control-label">Tempat, tanggal lahir</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                                </div>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control clsDatePicker" id="tgl_lahir" name="tgl_lahir" required />
                                </div>
                            </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('assets/js/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- Datepicker -->
    <script src="{{ asset('assets/datepicker/js/bootstrap-datepicker.js') }}"></script>


<script type="text/javascript">
    $(document).ready(function () {
                
                $('#tgl_lahir').datepicker({
                    format: "DD-MM-YYYY"
                });  
            
            });
</script>
</body>
</html>
