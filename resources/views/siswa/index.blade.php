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
		<td>{{$x -> nama_lengkap}}</td>
		<td>{{($x -> gender == 'L' ? 'Laki-laki' : 'Perempuan')}}</td>
		<td>{{$x -> tempat_lahir . ', ' .$x -> tgl_lahir}}</td>
		<td>
			<a href="{{url('admin/siswa/detail')}}"><button class="btn btn-info btn-sm dim"><span class="glyphicon glyphicon-eye-open"> View</button></a>
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
	<input type="hidden" name="hidden_view" id="hidden_view" value="{{url('admin/siswa/view')}}">
    <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('admin/siswa/delete')}}">
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
				<h4 class="modal-title">Tambah {{$atribut['title']}}</h4>
			</div>
             <div class="modal-body">				
					
						<form class="form-horizontal" action="{{ url('admin/siswa') }}" method="post">
						{{ csrf_field() }}
							<div class="form-group"><label class="col-lg-2 control-label">NIS</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="nis" name="nis">
								</div>
							</div>
							<div class="form-group"><label class="col-lg-2 control-label">NISN</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="nisn" name="nisn">
								</div>
							</div>
							<div class="form-group"><label class="col-lg-2 control-label">Nama Lengkap</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
								</div>
							</div>
							<div class="form-group"><label class="col-lg-2 control-label">Nama Panggilan</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan">
								</div>
							</div>
							<div class="form-group"><label class="col-lg-2 control-label">Gender</label>
								<div class="col-lg-10">
									<label><input type="radio" value="L" id="gender" name="gender"> Laki-laki</label>
									<label><input type="radio" value="P" id="gender" name="gender"> Perempuan</label>
								</div>
							</div>
							<div class="form-group"><label class="col-lg-2 control-label">Tempat, tanggal lahir</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
								</div>
								<div class="col-lg-5">
									<input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir">
								</div>
							</div>
							<div class="form-group"><label class="col-lg-2 control-label">Agama</label>
								<div class="col-lg-10">
									<select name="agama" id="agama" class="form-control">
										<option value="">- Pilih Agama -</option>
										<option value="Islam">Islam</option>
										<option value="Kristen">Kristen</option>
										<option value="Katolik">Katolik</option>
										<option value="Hindu">Hindu</option>
										<option value="Budha">Budha</option>
									</select>
								</div>
							</div>
							<div class="form-group"><label class="col-lg-2 control-label">Warga Negara</label>
								<div class="col-lg-10">
									<label><input type="radio" value="WNI" id="warga_negara" name="warga_negara"> WNI</label>
									<label><input type="radio" value="WNA" id="warga_negara" name="warga_negara"> WNA</label>
								</div>
							</div>
							<div class="form-group"><label class="col-lg-2 control-label">Anak Ke</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="anak_ke" name="anak_ke">
								</div>
							</div>
							<div class="form-group"><label class="col-lg-2 control-label">Jumlah Saudara</label>
								<div class="col-lg-3">
									<label>Kandung</label><input type="text" class="form-control" id="saudara_kandung" name="saudara_kandung">
								</div>
								<div class="col-lg-3">
									<label>Tiri</label><input type="text" class="form-control" id="saudara_tiri" name="saudara_tiri">
								</div>
								<div class="col-lg-3">
									<label>Angkat</label><input type="text" class="form-control" id="saudara_angkat" name="saudara_angkat">
								</div>
							</div>
							<div class="form-group"><label class="col-lg-2 control-label">Status Anak</label>
								<div class="col-lg-10">
									<label><input type="radio" value="AK" id="status_anak" name="status_anak"> Anak Kandung</label>
									<label><input type="radio" value="AT" id="status_anak" name="status_anak"> Anak Tiri</label>
								</div>
							</div>
							<div class="form-group"><label class="col-lg-2 control-label">Bahasa Sehari-hari</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="bahasa" name="bahasa">
								</div>
							</div>
							<div class="form-group"><label class="col-lg-2 control-label">Status</label>
									<div class="col-lg-10">
									<select name="status_aktif" id="status_aktif" class="form-control">
										<option value="">- Pilih Status -</option>
										<option value="Aktif">Aktif</option>
										<option value="Keluar">Keluar</option>
										<option value="Pindah">Pindah</option>
										<option value="Lulus">Lulus</option>
									</select>
								</div>
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
				<h4 class="modal-title">View</h4>
			</div>
			<div class="modal-body">
				<p><b>NIS : </b><span id="view_nis" class="text-success"></span></p>
				<p><b>Nama_lengkap : </b><span id="view_nama_lengkap" class="text-success"></span></p>
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
				<form class="form-horizontal" action="{{ url('admin/siswa/update') }}" method="post">
					{{ csrf_field() }}
						<div class="form-group"><label class="col-lg-2 control-label">NIS</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="edit_nis" name="edit_nis">
								</div>
							</div>
							<div class="form-group"><label class="col-lg-2 control-label">NISN</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="edit_nisn" name="edit_nisn">
								</div>
							</div>
							<div class="form-group"><label class="col-lg-2 control-label">Nama Lengkap</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="edit_nama_lengkap" name="edit_nama_lengkap">
								</div>
							</div>
							<div class="form-group"><label class="col-lg-2 control-label">Nama Panggilan</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="edit_nama_panggilan" name="edit_nama_panggilan">
								</div>
							</div>
							<div class="form-group"><label class="col-lg-2 control-label">Gender</label>
								<div class="col-lg-10">
									<label><input type="radio" value="L" id="laki-laki" name="edit_gender"> Laki-laki</label>
									<label><input type="radio" value="P" id="perempuan" name="edit_gender"> Perempuan</label>
								</div>
							</div>
							<div class="form-group"><label class="col-lg-2 control-label">Tempat, tanggal lahir</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" id="edit_tempat_lahir" name="edit_tempat_lahir">
								</div>
								<div class="col-lg-5">
									<input type="text" class="form-control" id="edit_tgl_lahir" name="edit_tgl_lahir">
								</div>
							</div>
							<div class="form-group"><label class="col-lg-2 control-label">Agama</label>
								<div class="col-lg-10">
									<select name="edit_agama" id="edit_agama" class="form-control">
										<option value="">- Pilih Agama -</option>
										<option value="Islam">Islam</option>
										<option value="Kristen">Kristen</option>
										<option value="Katolik">Katolik</option>
										<option value="Hindu">Hindu</option>
										<option value="Budha">Budha</option>
									</select>
								</div>
							</div>
							<div class="form-group"><label class="col-lg-2 control-label">Warga Negara</label>
								<div class="col-lg-10">
									<label><input type="radio" value="WNI" id="wni" name="edit_warga_negara"> WNI</label>
									<label><input type="radio" value="WNA" id="wna" name="edit_warga_negara"> WNA</label>
								</div>
							</div>
							<div class="form-group"><label class="col-lg-2 control-label">Anak Ke</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="edit_anak_ke" name="edit_anak_ke">
								</div>
							</div>
							<div class="form-group"><label class="col-lg-2 control-label">Jumlah Saudara</label>
								<div class="col-lg-3">
									<label>Kandung</label><input type="text" class="form-control" id="edit_saudara_kandung" name="edit_saudara_kandung">
								</div>
								<div class="col-lg-3">
									<label>Tiri</label><input type="text" class="form-control" id="edit_saudara_tiri" name="edit_saudara_tiri">
								</div>
								<div class="col-lg-3">
									<label>Angkat</label><input type="text" class="form-control" id="edit_saudara_angkat" name="edit_saudara_angkat">
								</div>
							</div>
							<div class="form-group"><label class="col-lg-2 control-label">Bahasa Sehari-hari</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="edit_bahasa" name="edit_bahasa">
								</div>
							</div>
							<div class="form-group"><label class="col-lg-2 control-label">Status</label>
									<div class="col-lg-10">
									<select name="edit_status_aktif" id="edit_status_aktif" class="form-control">
										<option value="">- Pilih Status -</option>
										<option value="Aktif">Aktif</option>
										<option value="Keluar">Keluar</option>
										<option value="Pindah">Pindah</option>
										<option value="Lulus">Lulus</option>
									</select>
								</div>
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

$(function(){
	$("#tgl_lahir").datepicker({
	format:'dd-mm-yyyy'
	});
});

function fun_view(id){
	var view_url = $("#hidden_view").val();
	$.ajax({
	url: view_url,
	type:"GET",
	data: {"id":id},
	success: function(result){
	//console.log(result);
		$("#view_nis").text(result.nis);
		$("#view_nama").text(result.gender);
		$("#view_gender").text(result.gender);
		}
	});
}
function fun_edit(id){
	var view_url = $("#hidden_view").val();
	//console.log(view_url);
	$.ajax({
	url: view_url,
	type:"GET",
	data: {"id":id},
	success: function(result){
		console.log(result);
		$("#edit_id").val(result.id);
		$("#edit_nis").val(result.nis);
		$("#edit_nisn").val(result.nisn);
		$("#edit_nama_lengkap").val(result.nama_lengkap);
		$("#edit_nama_panggilan").val(result.nama_panggilan);
		console.log(result.gender);
		if (result.gender == 'L') {
			$("#laki-laki").attr('checked', 'checked');

		} else {
			$("#perempuan").attr('checked', 'checked');
		}
		//$("#edit_gender").val(result.gender);
		$("#edit_tempat_lahir").val(result.tempat_lahir);
		$("#edit_tgl_lahir").val(result.tgl_lahir);
		$("#edit_agama").val(result.agama);
		$("#edit_warga_negara").val(result.warga_negara);
		if (result.warga_negara == 'WNI') {
			$("#wni").attr('checked', 'checked');

		} else {
			$("#wna").attr('checked', 'checked');
		}
		$("#edit_anak_ke").val(result.anak_ke);
		$("#edit_saudara_kandung").val(result.saudara_kandung);
		$("#edit_saudara_tiri").val(result.saudara_tiri);
		$("#edit_saudara_angkat").val(result.saudara_angkat);
		$("#edit_status_anak").val(result.status_anak);
		$("#edit_bahasa").val(result.bahasa);
		$("#edit_status_aktif").val(result.status_aktif);
	}
});
}
function fun_delete(id){
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