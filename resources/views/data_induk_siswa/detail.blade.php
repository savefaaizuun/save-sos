@extends('layouts.master')
@section('title')
SISFO | {{$atribut['title']}}
@endsection
@section('content-header')
<style>
	.form-horizontal .control-label {
    padding-top: 7px;
    margin-bottom: 0;
    text-align: left;
}
</style>
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
		<button class="btn btn-outline btn-info  dim unlock" id="unlock" type="button"><span class="fa fa-unlock"></span> Unlock</button>
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
	<div class="panel blank-panel">

                        <div class="panel-heading">
                            <div class="panel-options">

                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">Data Siswa</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">Alamat</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false">Kesehatan</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-4" aria-expanded="false">Pendidikan</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">

                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                        <form id="detail-siswa" class="form-horizontal" action="{{ url('admin/data_induk_siswa/update_data_siswa') }}" method="post">
                                        {{ csrf_field() }}
                                        	<input type="hidden" name="id" id="id" value="{{$detail_siswa->id}}">
			                                <div class="form-group"><label class="col-lg-2 control-label" >NIS</label>
			                                    <div class="col-lg-10">
			                                    	<input type="text" placeholder="NIS" name="nis" value="{{$detail_siswa->nis}}" disabled="disabled" class="form-control"> 
			                                    </div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label">NISN</label>
			                                    <div class="col-lg-10">
			                                    	<input type="text" placeholder="NISN" name="nisn" value="{{$detail_siswa->nisn}}" disabled="disabled" class="form-control">
			                                    </div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label">Nama Lengkap</label>
			                                    <div class="col-lg-10">
			                                    	<input type="text" placeholder="Nama Lengkap" name="nama_lengkap" value="{{$detail_siswa->nama_lengkap}}" disabled="disabled" class="form-control">
			                                    </div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label">Nama Panggilan</label>
			                                    <div class="col-lg-10">
			                                    	<input type="text" placeholder="Nama Lengkap" name="nama_panggilan" value="{{$detail_siswa->nama_panggilan}}" disabled="disabled" class="form-control">
			                                    </div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label">Gender</label>
			                                    <div class="col-lg-10">
			                                    	<label><input type="radio" value="L" id="laki" name="gender" disabled="disabled"> Laki-laki</label>
													<label><input type="radio" value="P" id="perempuan" name="gender" disabled="disabled"> Perempuan</label>
			                                    </div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label" >Tempat, tanggal lahir</label>
			                                    <div class="col-lg-5">
													<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{$detail_siswa->tempat_lahir}}" disabled="disabled">
												</div>
												<div class="col-lg-5">
													<input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{$detail_siswa->tgl_lahir}}" disabled="disabled">
												</div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label">Agama</label>
												<div class="col-lg-10">
													<select name="agama" id="agama" class="form-control" disabled="disabled">
														<option value="">- Pilih Agama -</option>
														<option value="Islam">Islam</option>
														<option value="Kristen">Kristen</option>
														<option value="Katolik">Katolik</option>
														<option value="Hindu">Hindu</option>
														<option value="Budha">Budha</option>
													</select>
												</div>
											</div>
											<div class="form-group"><label class="col-lg-2 control-label" disabled="disabled">Warga Negara</label>
												<div class="col-lg-10">
													<label><input type="radio" value="WNI" id="wni" name="warga_negara" disabled="disabled"> WNI</label>
													<label><input type="radio" value="WNA" id="wna" name="warga_negara" disabled="disabled"> WNA</label>
												</div>
											</div>
											<div class="form-group"><label class="col-lg-2 control-label">Anak Ke</label>
												<div class="col-lg-10">
													<input type="text" class="form-control" id="anak_ke" name="anak_ke" disabled="disabled" value="{{$detail_siswa->anak_ke}}">
												</div>
											</div>
											<div class="form-group"><label class="col-lg-2 control-label">Jumlah Saudara</label>
												<div class="col-lg-3">
													<label>Kandung</label><input type="text" class="form-control" id="saudara_kandung" name="saudara_kandung" disabled="disabled" value="{{$detail_siswa->saudara_kandung}}">
												</div>
												<div class="col-lg-3">
													<label>Tiri</label><input type="text" class="form-control" id="saudara_tiri" name="saudara_tiri" disabled="disabled" value="{{$detail_siswa->saudara_tiri}}">
												</div>
												<div class="col-lg-3">
													<label>Angkat</label><input type="text" class="form-control" id="saudara_angkat" name="saudara_angkat" disabled="disabled" value="{{$detail_siswa->saudara_angkat}}">
												</div>
											</div>
											<div class="form-group"><label class="col-lg-2 control-label">Status Anak</label>
												<div class="col-lg-10">
													<label><input type="radio" value="AK" id="ak" name="status_anak" disabled="disabled"> Anak Kandung</label>
													<label><input type="radio" value="AT" id="at" name="status_anak" disabled="disabled"> Anak Tiri</label>
												</div>
											</div>
											<div class="form-group"><label class="col-lg-2 control-label">Bahasa Sehari-hari</label>
												<div class="col-lg-10">
													<input type="text" class="form-control" id="bahasa" name="bahasa" value="{{$detail_siswa->bahasa}}" disabled="disabled">
												</div>
											</div>
											<div class="form-group"><label class="col-lg-2 control-label">Status Aktif</label>
													<div class="col-lg-10">
													<select name="status_aktif" id="status_aktif" class="form-control" disabled="disabled">
														<option value="">- Pilih Status -</option>
														<option value="Aktif">Aktif</option>
														<option value="Keluar">Keluar</option>
														<option value="Pindah">Pindah</option>
														<option value="Lulus">Lulus</option>
													</select>
												</div>
											</div>
			                                
			                                <div id="submit-data">
			                                	<div class="form-group">
				                                    <div class="col-lg-offset-2 col-lg-10">
				                                        <button type="submit" class="btn btn-outline btn-primary  dim" type="button"><i class="fa fa-save"></i> Save</button>
				                                    </div>
				                                </div>	
			                                </div>
			                                
			                            </form>
			                    </div>

                                <div id="tab-2" class="tab-pane">
                                    <form id="detail-siswa" class="form-horizontal" action="{{ url('admin/data_induk_siswa/update_alamat') }}" method="post">
                                    	<div class="form-group"><label class="col-lg-2 control-label" >Alamat</label>
			                                    <div class="col-lg-10">
			                                    	<input type="text" placeholder="Alamat" name="alamat_lengkap" value="" disabled="disabled" class="form-control"> 
			                                    </div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label">Provinsi</label>
			                                    <div class="col-lg-10">
			                                    	<input type="text" placeholder="NISN" name="provinsi" value="" disabled="disabled" class="form-control">
			                                    </div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label">Kota/Kabupaten</label>
			                                    <div class="col-lg-10">
			                                    	<input type="text" placeholder="NISN" name="kota_kabupaten" value="" disabled="disabled" class="form-control">
			                                    </div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label">Kecamatan</label>
			                                    <div class="col-lg-10">
			                                    	<input type="text" placeholder="Nama Lengkap" name="kecamatan" value="" disabled="disabled" class="form-control">
			                                    </div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label">Kelurahan</label>
			                                    <div class="col-lg-10">
			                                    	<input type="text" placeholder="Nama Lengkap" name="kelurahan" value="" disabled="disabled" class="form-control">
			                                    </div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label">No. Telp</label>
			                                    <div class="col-lg-10">
			                                    	<input type="text" placeholder="Nama Lengkap" name="no_telp" value="" disabled="disabled" class="form-control">
			                                    </div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label">Tinggal Dengan</label>
			                                    <div class="col-lg-10">
			                                    	<input type="text" placeholder="Nama Lengkap" name="tgl_dgn" value="" disabled="disabled" class="form-control">
			                                    </div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label">Alamat Kos</label>
			                                    <div class="col-lg-10">
			                                    	<input type="text" placeholder="Nama Lengkap" name="alamat_kos" value="" disabled="disabled" class="form-control">
			                                    </div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label">Sarana Transportasi</label>
			                                    <div class="col-lg-10">
			                                    	<input type="text" placeholder="Nama Lengkap" name="sarana_transportasi" value="" disabled="disabled" class="form-control">
			                                    </div>
			                                </div>

			                                <div id="submit-alamat">
			                                	<div class="form-group">
				                                    <div class="col-lg-offset-2 col-lg-10">
				                                        <button class="btn btn-outline btn-primary  dim" id="unlock" type="button"><i class="fa fa-save"></i> Save</button>
				                                    </div>
				                                </div>	
			                                </div>
                                    </form>

                                </div>

                                <div id="tab-3" class="tab-pane">
                                    <strong>Kesehatan</strong>

                                    <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>

                                    <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>

                                </div>

                                <div id="tab-4" class="tab-pane">
                                    <strong>Pendidikan</strong>

                                    <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>

                                    <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>

                                </div>
                            </div>

                        </div>

                    </div>
</div>
<!-- /.box-body -->
<script type="text/javascript">
	$(document).ready(function (e) {
		//set radio gender
		gender = '<?php echo $detail_siswa->gender; ?>';
		//alert(gender);
		if (gender == 'L') {
			$("#laki").attr('checked', 'checked');	
		} else {
			$("#perempuan").attr('checked', 'checked');
		}

		//set option status siswa
		var agama = '<?php echo $detail_siswa->agama; ?>';
		//alert(agama);
		if (agama.length > 0) {
			$('#agama').val(agama);
		}

		//set radio warga negara
		warga_negara = '<?php echo $detail_siswa->warga_negara; ?>';
		//alert(warga_negara);
		if (warga_negara == 'WNI') {
			$("#wni").attr('checked', 'checked');	
		} else {
			$("#wna").attr('checked', 'checked');
		}

		//set radio status anak
		status_anak = '<?php echo $detail_siswa->status_anak; ?>';
		//alert(status_anak);
		if (status_anak == 'AK') {
			$("#ak").attr('checked', 'checked');	
		} else {
			$("#at").attr('checked', 'checked');
		}

		//set option status siswa
		var status_aktif = '<?php echo $detail_siswa->status_aktif; ?>';
		//alert(status_aktif);
		if (status_aktif.length > 0) {
			$('#status_aktif').val(status_aktif);
		}

		//unlock form detail siswa
		// $('#unlock').click(function(event) {
		// 	//alert('hallo');
		// 	/* Act on the event */
		// 	event.preventDefault();
		// 	$('.form-control').removeAttr('disabled');
		// 	$( "form input:radio" ).removeAttr('disabled');
		// });
		
		//hide submit data
		// $('#submit-data').hide();
		// $('#submit-alamat').hide();
		// $('#unlock').click(function(event) {
		// 	//alert('hallo');
		// 	/* Act on the event */
		// 	//event.preventDefault();
		// 	if ($('.form-control').is('[disabled=disabled]')) {
		// 		// $('.form-control').removeAttr('disabled');
		// 		// $( "form input:radio" ).removeAttr('disabled');
		// 		$("form :input").removeAttr('disabled');
		// 		//$("#unlock").text('Lock');
		// 		$("#unlock").find("span").removeClass('fa fa-unlock').addClass('fa fa-lock');
		// 		$("#unlock").html('Lock');
		// 		//removeClass('fa fa-unlock').addClass('fa fa-lock');
				
				
				// $('#submit-data').show();
				// $('#submit-alamat').show();
		// 	} else {
		// 		//$("#parent-selector :input").attr("disabled", true);
		// 		$("form :input").attr('disabled',true);
		// 		$("#unlock").text('Unlock');
				// $('#submit-data').hide();
				// $('#submit-alamat').hide();
		// 	}
		// });
		$('#submit-data').hide();
		$('#submit-alamat').hide();
		$('#unlock').on('click', function () {
			if ($('.form-control').is('[disabled=disabled]')) {
				var $el = $(this),
            	textNode = this.lastChild;
		        $el.find('span').toggleClass('fa fa-lock fa fa-unlock');
		        textNode.nodeValue = ($el.hasClass('unlock') ? ' Lock' : ' Unlock')
		        $el.toggleClass('unlock');
		        $("form :input").removeAttr('disabled');
		        $('#submit-data').show();
				$('#submit-alamat').show();
			} else {
				var $el = $(this),
            	textNode = this.lastChild;
		        $el.find('span').toggleClass('fa fa-lock fa fa-unlock');
		        textNode.nodeValue = ($el.hasClass('unlock') ? ' Lock' : ' Unlock')
		        $el.toggleClass('unlock');
		        $("form :input").attr('disabled',true);
		        $('#submit-data').hide();
				$('#submit-alamat').hide();
			}
        
    });

		
        
    });
</script>
@endsection

