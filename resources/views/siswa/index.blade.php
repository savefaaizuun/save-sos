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
	<h5>Data Siswa</h5>
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
		<th>NIS</th>
		<th>Nama</th>
		<th>Gender</th>
		<th>Tempat, Tanggal Lahir</th>
		<th>Actions</th>
	</tr>
</thead>
<tbody>
	<?php $no=1; ?>
	@foreach($data as $x)
	<tr>
		<td><?php echo $no++;?></td>
		<td>{{$x -> nis}}</td>
		<td>{{$x -> nama}}</td>
		<td>{{($x -> gender == 'L' ? 'Laki-laki' : 'Perempuan')}}</td>
		<td>{{$x -> tempat_lahir . ', ' .$x -> tgl_lahir}}</td>
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
			<th>NIS</th>
			<th>Nama</th>
			<th>Gender</th>
			<th>Tempat, Tanggal Lahir</th>
			<th>Actions</th>
		</tr>
		</tfoot>
	</table>
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
				<h4 class="modal-title">Tambah Data Siswa</h4>
			</div>
			<div class="modal-body">
				<form action="{{ url('admin/siswa') }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<div class="form-group">
							<label for="nis">NIS:</label>
							<input type="text" class="form-control" id="nis" name="nis">
						</div>
						<div class="form-group">
							<label for="nama">Nama:</label>
							<input type="text" class="form-control" id="nama" name="nama">
						</div>
						<label for="gender">Gender:</label>
						<input type="text" class="form-control" id="gender" name="gender">
					</div>
				</form>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
              </div>
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
				<h4 class="modal-title">View</h4>
			</div>
			<div class="modal-body">
				<p><b>NIS : </b><span id="view_nis" class="text-success"></span></p>
				<p><b>Nama : </b><span id="view_nama" class="text-success"></span></p>
				<p><b>Gender : </b><span id="view_gender" class="text-success"></span></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"></button>
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
				<form action="{{ url('admin/siswa/update') }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<div class="form-group">
							<label for="edit_nis">NIS:</label>
							<input type="text" class="form-control" id="edit_nis" name="edit_nis">
						</div>
						<div class="form-group">
							<label for="edit_nama">Nama:</label>
							<input type="text" class="form-control" id="edit_nama" name="edit_nama">
						</div>
						<label for="edit_gender">Gender:</label>
						<input type="text" class="form-control" id="edit_gender" name="edit_gender">
					</div>
					
					<button type="submit" class="btn btn-default">Update</button>
					<input type="hidden" id="edit_id" name="edit_id">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			
		</div>
		
	</div>
</div>
<!-- Edit code ends -->
@endsection