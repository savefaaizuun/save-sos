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
	<h5>Filter Data Jadwal</h5>
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
{{-- <table id="filter-jadwal" class="table table-bordered table-hover"> --}}

	<form action="http://localhost/siakad/index.php/jadwal/cetak_jadwal" method="post" accept-charset="utf-8">
	<table class="table table-bordered">
		<tbody>
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
				<td>ROMBEL</td>
				<td>
					<select name="rombel" id="rombel" class="form-control">
						<option value="">-- Pilih Rombel --</option>                      
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2">
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
					<i class="fa fa-cogs" aria-hidden="true"></i> Generate Jadwal
				</button>
				<button type="submit" name="export_jadwal" class="btn btn-danger btn-sm"><i class="fa fa-print" aria-hidden="true"></i> Cetak PDF</button>
				</td>
			</tr>
		</tbody>
	</table>
    </form>

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
					<form role="form" action="{{ url('admin/kurikulum') }}" method="post">
					{{ csrf_field() }}
							<div class="form-group">
								<label>Nama Kurikulum</label> 
								<input type="text" class="form-control" id="nama_kurikulum" name="nama_kurikulum">
							</div>
							<div class="form-group">
								<label>Status</label> 
								<select class="form-control" id="is_aktif" name="is_aktif">
                                        <option>-- Status --</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
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
				<p><b>Nama Kurikulum : </b><span id="view_nama_kurikulum" class="text-success"></span></p>
				<p><b>Status : </b><span id="view_is_aktif" class="text-success"></span></p>
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
				<form action="{{ url('admin/kurikulum/update') }}" method="post">
					{{ csrf_field() }}
						<div class="form-group">
							<label for="nama_kurikulum">Nama Kurikulum:</label>
							<input type="text" class="form-control" id="edit_nama_kurikulum" name="edit_nama_kurikulum">
						</div>
						<div class="form-group">
							<label for="is_aktif">Status:</label>
							<select class="form-control" id="edit_is_aktif" name="edit_is_aktif">
                                <option>-- Status --</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
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

@endsection
<!-- Edit code ends -->
@section('script')

<script type="text/javascript">



$(document).ready(function(){ 
    $("#kelas").change(function(){ 
    	var kode_prodi = $("#kode_prodi").val();
		var kelas = $(this).val();
		console.log(kode_prodi);
		console.log(kelas);
		
      $.ajax({
	        url: "{{ url('admin/jadwal/get_rombel') }}",
	        type:"GET",
	        data: "kode_prodi="+kode_prodi+"&kelas="+kelas,
	        success: function(data){
	        $("#rombel").html(data);
        }
      });
    });
  });

					
				


                    function fun_view(id)
                    {
                    var view_url = $("#hidden_view").val();
                    $.ajax({
                    url: view_url,
                    type:"GET",
                    data: {"id":id},
                    success: function(result){
                    //console.log(result);
                    $("#view_nama_kurikulum").text(result.nama_kurikulum);
                    $("#view_is_aktif").text(result.is_aktif);
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
                    $("#edit_nama_kurikulum").val(result.nama_kurikulum);
                    $("#edit_is_aktif").val(result.is_aktif);
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