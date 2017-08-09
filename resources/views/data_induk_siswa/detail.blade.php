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
                                        <form class="form-horizontal">
			                                <div class="form-group"><label class="col-lg-2 control-label" >NIS</label>
			                                    <div class="col-lg-10">
			                                    	<input type="text" placeholder="NIS" name="nis" value="{{$detail_siswa->nis}}" readonly="readonly" class="form-control"> 
			                                    </div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label">NISN</label>
			                                    <div class="col-lg-10">
			                                    	<input type="text" placeholder="NISN" name="nisn" value="{{$detail_siswa->nisn}}" readonly="readonly" class="form-control">
			                                    </div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label">Nama Lengkap</label>
			                                    <div class="col-lg-10">
			                                    	<input type="text" placeholder="Nama Lengkap" name="nama_lengkap" value="{{$detail_siswa->nama_lengkap}}" readonly="readonly" class="form-control">
			                                    </div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label">Nama Panggilan</label>
			                                    <div class="col-lg-10">
			                                    	<input type="text" placeholder="Nama Lengkap" name="nama_panggilan" value="{{$detail_siswa->nama_panggilan}}" readonly="readonly" class="form-control">
			                                    </div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label">Gender</label>
			                                    <div class="col-lg-10">
			                                    	<label><input type="radio" value="L" id="gender" name="gender"> Laki-laki</label>
													<label><input type="radio" value="P" id="gender" name="gender"> Perempuan</label>
			                                    </div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label" >Tempat, tanggal lahir</label>
			                                    <div class="col-lg-5">
													<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{$detail_siswa->tempat_lahir}}" readonly="readonly">
												</div>
												<div class="col-lg-5">
													<input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{$detail_siswa->tgl_lahir}}" readonly="readonly">
												</div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label">Agama</label>
												<div class="col-lg-10">
													<select name="agama" id="agama" class="form-control" readonly="readonly">
														<option value="">- Pilih Agama -</option>
														<option value="Islam">Islam</option>
														<option value="Kristen">Kristen</option>
														<option value="Katolik">Katolik</option>
														<option value="Hindu">Hindu</option>
														<option value="Budha">Budha</option>
													</select>
												</div>
											</div>
											<div class="form-group"><label class="col-lg-2 control-label" readonly="readonly">Warga Negara</label>
												<div class="col-lg-10">
													<label><input type="radio" value="WNI" id="warga_negara" name="warga_negara"> WNI</label>
													<label><input type="radio" value="WNA" id="warga_negara" name="warga_negara"> WNA</label>
												</div>
											</div>
											<div class="form-group"><label class="col-lg-2 control-label">Anak Ke</label>
												<div class="col-lg-10">
													<input type="text" class="form-control" id="anak_ke" name="anak_ke" readonly="readonly" value="{{$detail_siswa->anak_ke}}">
												</div>
											</div>
											<div class="form-group"><label class="col-lg-2 control-label">Jumlah Saudara</label>
												<div class="col-lg-3">
													<label>Kandung</label><input type="text" class="form-control" id="saudara_kandung" name="saudara_kandung" readonly="readonly" value="{{$detail_siswa->saudara_kandung}}">
												</div>
												<div class="col-lg-3">
													<label>Tiri</label><input type="text" class="form-control" id="saudara_tiri" name="saudara_tiri" readonly="readonly" value="{{$detail_siswa->saudara_tiri}}">
												</div>
												<div class="col-lg-3">
													<label>Angkat</label><input type="text" class="form-control" id="saudara_angkat" name="saudara_angkat" readonly="readonly" value="{{$detail_siswa->saudara_angkat}}">
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
													<input type="text" class="form-control" id="bahasa" name="bahasa" value="{{$detail_siswa->bahasa}}" readonly="readonly">
												</div>
											</div>
											<div class="form-group"><label class="col-lg-2 control-label">Status</label>
													<div class="col-lg-10">
													<select name="status_aktif" id="status_aktif" class="form-control" >
														<option value="">- Pilih Status -</option>
														<option value="Aktif">Aktif</option>
														<option value="Keluar">Keluar</option>
														<option value="Pindah">Pindah</option>
														<option value="Lulus">Lulus</option>
													</select>
												</div>
											</div>
			                                
			                                
			                                <div class="form-group">
			                                    <div class="col-lg-offset-2 col-lg-10">
			                                        <button class="btn btn-sm btn-white" type="submit">Sign in</button>
			                                    </div>
			                                </div>
			                            </form>
			                    </div>

                                <div id="tab-2" class="tab-pane">
                                    <form action="" class="form-horizontal">
                                    	<div class="form-group"><label class="col-lg-2 control-label" >Alamat</label>
			                                    <div class="col-lg-10">
			                                    	<input type="text" placeholder="Alamat" name="alamat_lengkap" value="" readonly="readonly" class="form-control"> 
			                                    </div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label">Provinsi</label>
			                                    <div class="col-lg-10">
			                                    	<input type="text" placeholder="NISN" name="provinsi" value="" readonly="readonly" class="form-control">
			                                    </div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label">Kota/Kabupaten</label>
			                                    <div class="col-lg-10">
			                                    	<input type="text" placeholder="NISN" name="kota_kabupaten" value="" readonly="readonly" class="form-control">
			                                    </div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label">Kecamatan</label>
			                                    <div class="col-lg-10">
			                                    	<input type="text" placeholder="Nama Lengkap" name="kecamatan" value="" readonly="readonly" class="form-control">
			                                    </div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label">Kelurahan</label>
			                                    <div class="col-lg-10">
			                                    	<input type="text" placeholder="Nama Lengkap" name="kelurahan" value="" readonly="readonly" class="form-control">
			                                    </div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label">No. Telp</label>
			                                    <div class="col-lg-10">
			                                    	<input type="text" placeholder="Nama Lengkap" name="no_telp" value="" readonly="readonly" class="form-control">
			                                    </div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label">Tinggal Dengan</label>
			                                    <div class="col-lg-10">
			                                    	<input type="text" placeholder="Nama Lengkap" name="tgl_dgn" value="" readonly="readonly" class="form-control">
			                                    </div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label">Alamat Kos</label>
			                                    <div class="col-lg-10">
			                                    	<input type="text" placeholder="Nama Lengkap" name="alamat_kos" value="" readonly="readonly" class="form-control">
			                                    </div>
			                                </div>
			                                <div class="form-group"><label class="col-lg-2 control-label">Sarana Transportasi</label>
			                                    <div class="col-lg-10">
			                                    	<input type="text" placeholder="Nama Lengkap" name="sarana_transportasi" value="" readonly="readonly" class="form-control">
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
@endsection

