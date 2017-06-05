@extends('table')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Data Tables</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a>Tables</a>
            </li>
            <li class="active">
                <strong>Data Tables</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Editable Table in- combination with jEditable</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                    </li>
                </ul>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <div class="pull-right">
                <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addModal">Add</button>
            </div>
            <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Gender</th>
                        <th>Tanggal Lahir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                {{ csrf_field() }}
                <tbody>
                <?php $no=1; ?>
                @foreach($siswa as $data)
                    <tr>
                        <td>{{$data->nim}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->gender}}</td>
                        <td>{{$data->tgl_lahir}}</td>
                        <td>
                            <button class="edit-modal btn btn-warning" data-nim="{{$data->nim}}" data-nama="{{$data->nama}}" data-gender="{{$data->gender}}">  
                            <span class="glyphicon glyphicon-edit"></span> Edit </button></td>
                    </tr>
                </tbody>
                
                @endforeach
            </table>
            </div>
            </div>
    </div>
</div>
</div>
</div>

<!-- Add Modal start -->
    <div class="modal fade" id="addModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Record</h4>
          </div>
          <div class="modal-body">
            <form action="{{ url('admin/siswa/add') }}" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                <div class="form-group">
                  <label for="nim">NIM:</label>
                  <input type="text" class="form-control" id="nim" name="nim">
                </div>
                <div class="form-group">
                  <label for="nama">Nama:</label>
                  <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <label for="gender">Gender:</label>
                <input type="gender" class="form-control" id="gender" name="gender">
              </div>
              
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
    <!-- add code ends -->

@stop



