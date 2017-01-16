<div class="content">
	<div class="header">
		<h1 class="page-title"><?php echo $title; ?></h1>
	</div>
	<ul class="breadcrumb">
		<li>MANAJEMEN <span class="divider"></span></li>
		<li><a href="<?php echo base_url().'admin/informasi'; ?>">INFORMASI</a><span class="divider"></span></li>
		<li>EDIT</li>
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
		foreach($informasi->result() as $informasis){};

		?>
			<form method="post" class="form-horizontal" enctype="multipart/form-data">

				<div class="form-group">
					<label for="judul" class="col-sm-2 control-label">Judul</label>
					<div class="col-sm-6">
						<input type="text" value="<?php echo $informasis->judul; ?>" name="judul" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
					<div class="col-sm-6">
						<input type="text" value="<?php echo $informasis->tanggal; ?>" name="tanggal" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<label for="content" class="col-sm-2 control-label">Konten</label>
					<div class="col-sm-6">
						<textarea class="form-control" rows="5" name="content"><?php echo $informasis->content; ?></textarea>
					</div>
				</div> 

				<div class="form-group">
					<label for="image" class="col-sm-2 control-label">Image</label>
					<div class="col-sm-6">
						<input type="file" name="image" class="form-control">
					</div>
				</div> 

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-6">
						<button class="btn btn-primary" type="submit">SAVE</button>&nbsp; | &nbsp;
						<a href="<?php echo base_url().'admin/informasi'; ?>"><button class="btn" type="button">BACK</button></a>
					</div>
					
				</div>		

			</form>
		</div>
	</div>
</div> 