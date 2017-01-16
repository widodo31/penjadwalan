<div class="content">
	<div class="header">
		<h1 class="page-title"><?php echo $title; ?></h1>
	</div>
	<ul class="breadcrumb">
		<li>MANAJEMEN <span class="divider"></span></li>
		<li><a href="<?php echo base_url().'admin/mapel'; ?>">MAPEL</a><span class="divider"></span></li>
		<li>TAMBAH</a>
	</ul>

	<div class="container-fluid">
		<div class="row-fluid">
		<?php
		if(isset($msg))
		{ ?>

			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">x</button>
				<?php echo $msg; ?>
			</div>

		<?php
		}

		?>
			<form method="post" class="form-horizontal">

				<div class="form-group">
					<label for="kode_mapel" class="col-sm-2 control-label">Kode Mapel</label>
					<div class="col-sm-6">
						<input type="text" name="kode_mapel" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<label for="nip" class="col-sm-2 control-label">Nama Mapel</label>
					<div class="col-sm-6">
						<input type="text" name="nama" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<label for="jumlah_jam" class="col-sm-2 control-label">Jumlah jam</label>
					<div class="col-sm-6">
						<input type="text" name="jumlah_jam" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<label for="nip" class="col-sm-2 control-label">Jenis</label>
					<div class="col-sm-6">
						<select class="form-control" name="jenis">
							<option value="TEORI">TEORI</option>
							<option value="PRAKTIKUM">PRAKTIKUM</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-6">
						<button class="btn btn-primary" type="submit">SAVE</button>&nbsp; | &nbsp;
						<a href="<?php echo base_url().'admin/mapel'; ?>"><button class="btn" type="button">BACK</button></a>
					</div>					
				</div>		

			</form>
		</div>
	</div>
</div> 