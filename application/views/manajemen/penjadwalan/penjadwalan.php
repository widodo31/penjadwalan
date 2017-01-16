<div class="content">
	<div class="header">
		<h1 class="page-title"><?php echo $title; ?></h1>
	</div>
	<ul class="breadcrumb">
		<li>MANAJEMEN<span class="divider"></span></li>
		<li class="active"><?php echo $title ?></li>
	</ul>

	<div class="container-fluid">
		<?php
		if(isset($msg))
		{ ?>
			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert"></button>
				<?php echo $msg; ?>
			</div>
		<?php
		}
		?>
		<!-- form untuk Populasi, CrossOver, Mutasi Generasi, Tahun Akademik -->
		<div class="row-fluid">
			<form class="form-horizontal" method="post">
				<!-- Tahun Akademik dan Populasi -->
				<div class="form-group">
					<div class="col-md-4">
						<label>Tahun Akademik</label>
						<select name="thn_akademik" class="form-control">
							<option value="2015-2016">2015-2016</option>
							<option value="2016-2017">2016-2017</option>
							<option value="2017-2018">2017-2018</option>
							<option value="2018-2019">2018-2019</option>
						</select>
					</div>
					<div class="col-md-4 col-md-offset-1">
						<label>Jumlah Populasi</label>
						<input type="text" name="populasi" class="form-control" value="10">
					</div>
				</div>
				<!-- CrossOver dan Mutasi -->
				<div class="form-group">
					<div class="col-md-4">
						<label>Probabilitas CrossOver</label>
						<input type="text" name="crossOver" class="form-control" value="0.70">
					</div>
					<div class="col-md-4 col-md-offset-1">
						<label>Probabilitas Mutasi</label>
						<input type="text" name="mutasi" class="form-control" value="0.40">
					</div>
				</div>
				<!-- Jumlah Generasi -->
				<div class="form-group">
					<div class="col-md-4">
						<label>Jumlah Generasi</label>
						<input type="text" name="generasi" class="form-control" value="10000">
					</div>
				</div>
				<!-- Button -->
				<div class="form-group">
					<div class="col-md-4">
						<button class="btn btn-primary" onclick="showLoading();">PROSES</button>
					</div>
				</div>
			</form>	
		</div>
		
		<div class="row-fluid">
			<!-- Button -->
			<a href=""><button class="btn btn-primary pull-right"><i>Tambah</i></button></a>
			<!-- Paging -->
			<div>
				<ul class="pagination">
					<?php // echo $paging; ?>
				</ul>
			</div>
			<!-- content table -->
			<div class="widget-content">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Hari</th>
							<th>Sesi</th>
							<th>jam</th>
							<th>Mata Pelajaran</th>
							<th>Jumlah Jam</th>
							<th>Kelas</th>
							<th>Guru</th>
							<th>Ruang</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>	
					</tbody>
				</table>
			</div>
			<!-- and content table -->
		</div>
	</div>
</div>