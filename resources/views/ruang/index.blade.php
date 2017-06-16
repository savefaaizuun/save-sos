@extends('layouts.master')
@section('title')
SISFO | {{$atribut['title']}}
@endsection
@section('content-header')
<div class="col-lg-10">
	<h2>{{$atribut['title']}}</h2>
	<ol class="breadcrumb">
		<li>
			<a href="index.html">Dashboard</a>
		</li>
		<li>
			<a>Table</a>
		</li>
		<li class="active">
			<strong>{{$atribut['title']}}</strong>
		</li>
	</ol>
</div>
<div class="col-lg-2">
	<div class="box-btn-add" style="margin-top: 30px;">
		<button class="btn btn-outline btn-info  dim" data-toggle="modal" data-target="#addModal" type="button"><i class="fa fa-plus"></i> Tambah</button>
	</div>
</div>
@endsection
@section('content-header-sub')
<div class="ibox-title">
	<h5>{{$atribut['title']}}</h5>
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
@endsection



@section('content')

<div class="box-body">
<table id="example1" class="table table-bordered table-hover">
<thead>
	<tr>
		<th>NO</th>
		<th>Kode Ruang</th>
		<th>Ruang</th>
		<th>Aksi</th>
	</tr>
</thead>
<tbody>
	<?php $no=1; ?>
	@foreach($data as $x)
	<tr>
		<td><?php echo $no++;?></td>
		<td>{{$x -> kode_ruang}}</td>
		<td>{{$x -> nama_ruang}}</td>
		<td>
			<button class="btn btn-info btn-sm dim" data-toggle="modal" data-target="#viewModal" onclick="fun_view('{{$x -> id}}')"><span class="glyphicon glyphicon-eye-open"> View</button>
				<button class="btn btn-warning btn-sm dim" data-toggle="modal" data-target="#editModal" onclick="fun_edit('{{$x -> id}}')"><span class="glyphicon glyphicon-edit dim"> Edit</button>
					<button class="btn btn-danger btn-sm dim" onclick="fun_delete('{{$x -> id}}')"><span class="glyphicon glyphicon-trash"></span> Delete</button>
				</td>
			</tr>
			@endforeach
		</tbody>
		<tfoot>
		<tr>
			<th>NO</th>
			<th>Kode Ruang</th>
			<th>Ruang</th>
			<th>Aksi</th>
		</tr>
		</tfoot>
	</table>
	<input type="hidden" name="hidden_view" id="hidden_view" value="{{url('admin/ruang/view')}}">
    <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('admin/ruang/delete')}}">
</div>
<!-- /.box-body -->
@endsection

@section('modals')
<!-- Add Modal start -->
<div class="modal fade" id="addModal" role="dialog">
	<div class="modal-dialog">
		
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Data {{$atribut['title']}}</h4>
			</div>
			<div class="modal-body">				
					<form role="form" action="{{ url('admin/ruang') }}" method="post">
					{{ csrf_field() }}
							<div class="form-group">
								<label>Kode Ruang</label> 
								<input type="text" class="form-control" id="kode_ruang" name="kode_ruang">
							</div>
							<div class="form-group">
								<label>Nama Ruang</label> 
								<input type="text" class="form-control" id="nama_ruang" name="nama_ruang">
							</div>
						
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button class="btn btn-info pull-right m-t-n-xs" type="submit"><i class="fa fa-save"></i><strong> Simpan</strong></button>
             </div>
             </form>
		</div>
		
	</div>
</div>
<!-- add code ends -->
<!-- View Modal start -->
<div class="modal fade" id="viewModal" role="dialog">
	<div class="modal-dialog">
		
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">View Data {{$atribut['title']}}</h4>
			</div>
			<div class="modal-body">
				<p><b>Kode Mapel : </b><span id="view_kode_ruang" class="text-success"></span></p>
				<p><b>Nama Mapel : </b><span id="view_nama_ruang" class="text-success"></span></p>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
		</div>
		
	</div>
</div>
<!-- view modal ends -->
<!-- Edit Modal start -->
<div class="modal fade" id="editModal" role="dialog">
	<div class="modal-dialog">
		
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit</h4>
			</div>
			<div class="modal-body">
				<form action="{{ url('admin/ruang/update') }}" method="post">
					{{ csrf_field() }}
						<div class="form-group">
							<label for="kode_ruang">Kode Ruang:</label>
							<input type="text" class="form-control" id="edit_kode_ruang" name="edit_kode_ruang">
						</div>
						<div class="form-group">
							<label for="nama_ruang">Nama Ruang:</label>
							<input type="text" class="form-control" id="edit_nama_ruang" name="edit_nama_ruang">
						</div>
						
					<input type="hidden" id="edit_id" name="edit_id">
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button class="btn btn-info pull-right m-t-n-xs" type="submit"><i class="fa fa-save"></i><strong> Update</strong></button>
             </div>
             </form>
			
		</div>
		
	</div>
</div>
<!-- Edit code ends -->
<script type="text/javascript">

                    function fun_view(id)
                    {
                    var view_url = $("#hidden_view").val();
                    $.ajax({
                    url: view_url,
                    type:"GET",
                    data: {"id":id},
                    success: function(result){
                    //console.log(result);
                    $("#view_kode_ruang").text(result.kode_ruang);
                    $("#view_nama_ruang").text(result.nama_ruang);
                    }
                    });
                    }
                    function fun_edit(id)
                    {
                    	console.log(id);
                    var view_url = $("#hidden_view").val();
                    //console.log(view_url);
                    $.ajax({
                    url: view_url,
                    type:"GET",
                    data: {"id":id},
                    success: function(result){
                    console.log(result);
                    $("#edit_id").val(result.id);
                    $("#edit_kode_ruang").val(result.kode_ruang);
                    $("#edit_nama_ruang").val(result.nama_ruang);
                    }
                    });
                    }
                    function fun_delete(id)
                    {
                    var conf = confirm("Are you sure want to delete??");
                    if(conf){
                    var delete_url = $("#hidden_delete").val();
                    $.ajax({
                    url: delete_url,
                    type:"POST",
                    data: {"id":id,_token: "{{ csrf_token() }}"},
                    success: function(response){
                    alert(response);
                    location.reload();
                    }
                    });
                    }
                    else{
                    return false;
                    }
                    }
                    </script>
@endsection