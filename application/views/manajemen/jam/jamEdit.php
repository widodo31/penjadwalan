<div class="content">
	<div class="header">
		<h1 class="page-title"><?php echo $title; ?></h1>
	</div>
	<ul class="breadcrumb">
		<li>MANAJEMEN <span class="divider"></span></li>
		<li><a href="<?php echo base_url().'admin/jam'; ?>">GURU</a><span class="divider"></span></li>
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
		foreach($jam->result() as $jams){};

		?>
			<form method="post" class="form-horizontal" >

				<div class="form-group">
					<label for="nip" class="col-sm-2 control-label">Range Jam</label>
					<div class="col-sm-6">
						<input type="text" value="<?php echo $jams->range_jam; ?>" name="range_jam" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<label for="nama" class="col-sm-2 control-label">Keterangan</label>
					<div class="col-sm-6">
						<input type="text" value="<?php echo $jams->keterangan; ?>"  name="keterangan" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-6">
						<button class="btn btn-primary" type="submit">SAVE</button>&nbsp; | &nbsp;
						<a href="<?php echo base_url().'admin/jam'; ?>"><button class="btn" type="button">BACK</button></a>
					</div>
				</div>		

			</form>
		</div>
	</div>
</div> 