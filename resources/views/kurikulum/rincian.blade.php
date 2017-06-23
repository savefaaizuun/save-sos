@extends('layouts.master-rincian-kurikulum')
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

@endsection
@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Filter</h5>
				<div class="ibox-tools">
					<a class="collapse-link binded">
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
			<a class="close-link binded">
				<i class="fa fa-times"></i>
			</a>
		</div>
	</div>
	<div class="ibox-content">
		<div class="row">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td>KELAS</td>
							<td>
								<select name="kelas" id="kelas" class="form-control">
									<option value="">-- Pilih Kelas --</option>
									<option value="1">Kelas 1</option>
									<option value="2">Kelas 2</option>
									<option value="3">Kelas 3</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Prodi</td>
							<td>
								<select name="kode_prodi" class="form-control" id="kode_prodi">
									<option>-- Pilih Prodi --</option>
									@foreach($list_prodi as $prodi)
									<option value="{{$prodi->kode_prodi}}">{{$prodi->nama_prodi}}</option>
									@endforeach 
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<button class="btn btn-sm btn-primary pull-right m-t-n-xs" id="tambahModal" type="button"><i class="fa fa-plus"></i> Tambah</button>
							</td>
						</tr>
					</tbody>
				</table>
			
		</div>
	</div>
</div>
</div>
<div class="col-lg-6">
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>Daftar Pelajaran</h5>
		<div class="ibox-tools">
			<a class="collapse-link binded">
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
	<a class="close-link binded">
		<i class="fa fa-times"></i>
	</a>
</div>
</div>
<div class="ibox-content">
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Mapel</th>
			<th>Mata Pelajaran</th>
			<th>Kelas</th>
		</tr>
	</thead>
	<div id="daftar-mapel"></div>
</table>
</div>
</div>
</div>
</div>
@endsection
@section('modals')
<!-- Add Modal start -->
<div class="modal fade" id="tambahMapel" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Tambah {{$atribut['title']}}</h4>
</div>
<div class="modal-body">
<form role="form" action="{{ url('admin/kurikulum/rincian') }}" method="post">
	{{ csrf_field() }}
	<div class="form-group">
		<label>Kurikulum</label>
		<select class="form-control" id="kurikulum" name="id_kurikulum">
			<option>-- Pilih Kurikulum --</option>
			@foreach($list_kurikulum as $kur)
			<option value="{{$kur->id}}">{{$kur->nama_kurikulum}}</option>
			@endforeach 
		</select>
	</div>
	<div class="form-group">
		<label>Mata Pelajaran</label>
		<select class="form-control" id="mapel" name="mapel">
			<option>-- Pilih Mapel --</option>
			@foreach($list_mapel as $kur)
			<option value="{{$kur->kode_mapel}}">{{$kur->nama_mapel}}</option>
			@endforeach 
		</select>
	</div>
	<div class="form-group">
		<label>Program Studi</label>
		<select class="form-control" id="prodi_modal" name="prodi" disabled="disabled">
			<option>-- Pilih Prodi --</option>
			@foreach($list_prodi as $prodi)
			<option value="{{$prodi->kode_prodi}}">{{$prodi->nama_prodi}}</option>
			@endforeach 
		</select>
	</div>
	<div class="form-group">
		<label>Kelas</label>
		<select class="form-control" id="kelas_modal" name="kelas" disabled="disabled">
			<option value="">-- Pilih Kelas --</option>
			<option value="1">Kelas 1</option>
			<option value="2">Kelas 2</option>
			<option value="3">Kelas 3</option>
		</select>
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
@endsection
<!-- add code ends -->


@section('script')
<script type="text/javascript">

$(document).ready(function(){ 
    $("#tambahModal").click(function(){
    	var kelas = $("#kelas").val();
    	var prodi = $("#kode_prodi").val();

    	$("#kelas_modal").val(kelas);
        $("#prodi_modal").val(prodi);

        //$('#tambahMapel').show();
        $('#tambahMapel').modal('show');
    });

    $("#kelas").change(function(){ 
    	
		var kelas = $(this).val();
		
		
      $.ajax({
	        url: "{{ url('admin/kurikulum/get_daftar_mapel') }}",
	        type:"GET",
	        data: "kelas="+kelas,
	        success: function(data){
	        $("#daftar-mapel").html(data);
        }
      });
    });

  });




</script>
@endsection