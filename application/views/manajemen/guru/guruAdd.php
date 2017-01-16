<div class="content">
	<div class="header">
		<h1 class="page-title"><?php echo $title; ?></h1>
	</div>
	<ul class="breadcrumb">
		<li>MANAJEMEN <span class="divider"></span></li>
		<li><a href="<?php echo base_url().'admin/guru'; ?>">GURU</a><span class="divider"></span></li>
		<li>TAMBAH</li>
	</ul>

	<div class="container-fluid">
		<div class="row-fluid">
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
			<form method="post" class="form-horizontal">

				<div class="form-group">
					<label for="nip" class="col-sm-2 control-label">NIP</label>
					<div class="col-sm-6">
						<input type="text" name="nip" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<label for="nama" class="col-sm-2 control-label">Nama</label>
					<div class="col-sm-6">
						<input type="text" name="nama" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<label for="alamat" class="col-sm-2 control-label">Alamat</label>
					<div class="col-sm-6">
						<textarea class="form-control" rows="3" name="alamat"></textarea>
					</div>
				</div> 

				<div class="form-group">
					<label for="telp" class="col-sm-2 control-label">Telp</label>
					<div class="col-sm-6">
						<input type="text" name="telp" class="form-control">
					</div>
				</div> 

				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-6">
						<input type="text" name="email" class="form-control">
					</div>
				</div> 

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-6">
						<button class="btn btn-primary" type="submit">SAVE</button>&nbsp; | &nbsp;
						<a href="<?php echo base_url().'admin/guru'; ?>"><button class="btn" type="button">BACK</button></a>
					</div>
					
				</div>		

			</form>
		</div>
	</div>
</div> 