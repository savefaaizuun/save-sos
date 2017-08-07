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
                    <!-- <script src="{{ asset('assets/js/jquery-2.1.1.js') }}"></script> -->
                    
                    
                </body>
            </html>