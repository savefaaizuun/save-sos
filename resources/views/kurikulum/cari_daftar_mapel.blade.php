<table class="table table-bordered" style="display:none">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Mapel</th>
			<th>Mata Pelajaran</th>
			<th>Kelas</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; ?>
	@foreach($mapel_kurikulum as $x)
	<tr>
		<td><?php echo $no++;?></td>
		<td>{{$x -> kode_mapel}}</td>
		<td>{{$x -> nama_mapel}}</td>
		<td>{{$x -> kelas}}</td>
	</tr>
			@endforeach
		</tbody>
	</tbody>
</table>