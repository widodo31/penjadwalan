<div class="content">
	<div class="header">
		<h1 class="page-title"><?php echo $title; ?></h1>
	</div>
	<ul class="breadcrumb">
		<li>MANAJEMEN <span class="divider"></span></li>
		<li><a href="<?php echo base_url().'admin/member'; ?>">MEMBER</a><span class="divider"></span></li>
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
			<form method="post" class="form-horizontal" enctype="multipart/form-data">

				<div class="form-group">
					<label for="nama" class="col-sm-2 control-label">Nama</label>
					<div class="col-sm-6">
						<input type="text" name="nama" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<label for="password" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-6">
						<input type="password" name="password" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-6">
						<input type="text" name="email" class="form-control">
					</div>
				</div> 

				<div class="form-group">
					<label for="level" class="col-sm-2 control-label">Level</label>
					<div class="col-sm-6">
						<select name="level" class="form-control">
							<option value="">--LEVEL--</option>
							<option value="GURU">GURU</option>
							<option value="SISWA">SISWA</option>
						</select>
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
						<a href="<?php echo base_url().'admin/member'; ?>"><button class="btn" type="button">BACK</button></a>
					</div>
					
				</div>		

			</form>
		</div>
	</div>
</div> 