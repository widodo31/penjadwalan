<div class="content">
	<div class="header">
		<h1 class="page-title"><?php echo $title; ?></h1>
	</div>
	<ul class="breadcrumb">
		<li>MANAJEMEN <span class="divider"></span></li>
		<li><a href="<?php echo base_url().'admin/kelas'; ?>">HARI</a><span class="divider"></span></li>
		<li>EDIT</li>
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
		foreach($kelas->result() as $kelass){};

		?>
			<form method="post" class="form-horizontal" >

				<div class="form-group">
					<label for="nip" class="col-sm-2 control-label">Nama Kelas</label>
					<div class="col-sm-6">
						<input type="text" value="<?php echo $kelass->nama_kelas; ?>" name="nama" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-6">
						<button class="btn btn-primary" type="submit">SAVE</button>&nbsp; | &nbsp;
						<a href="<?php echo base_url().'admin/kelas'; ?>"><button class="btn" type="button">BACK</button></a>
					</div>					
				</div>		

			</form>
		</div>
	</div>
</div> 