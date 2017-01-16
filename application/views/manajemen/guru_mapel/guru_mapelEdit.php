<div class="content">
	<div class="header">
		<h1 class="page-title"><?php echo $title; ?></h1>
	</div>
	<ul class="breadcrumb">
		<li>MANAJEMEN <span class="divider"></span></li>
		<li><a href="<?php echo base_url().'admin/guru_mapel'; ?>">GURU</a><span class="divider"></span></li>
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
		foreach($mapelGuru->result() as $mapelGurus){}

		?>
			<form method="post" class="form-horizontal" >

				<div class="form-group">
					<label for="mapel" class="col-sm-2 control-label">Nama Mapel</label>
					<div class="col-sm-6">
						<select name="id_mapel" class="form-control">
							<?php
							foreach($mapel->result() as $mapels){
								if($mapelGurus->id_mapel == $mapels->id_mapel)
								{ ?>
									<option value="<?php echo $mapels->id_mapel; ?>" selected><?php echo $mapels->nama_mapel; ?></option>
								<?php } else { ?>
									<option value="<?php echo $mapels->id_mapel; ?>"><?php echo $mapels->nama_mapel; ?></option>
								<?php }
							}
							?>			
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="guru" class="col-sm-2 control-label">Nama Guru</label>
					<div class="col-sm-6">
						<select name="id_guru" class="form-control">
							<?php
							foreach($guru->result() as $gurus){
								if($mapelGurus->id_guru == $gurus->id_guru)
								{ ?>
									<option value="<?php echo $gurus->id_guru; ?>" selected><?php echo $gurus->nama_guru; ?></option>
								<?php }else{ ?>
									<option value="<?php echo $gurus->id_guru; ?>"><?php echo $gurus->nama_guru; ?></option>
								<?php }
							}

							?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="kelas" class="col-sm-2 control-label">Kelas</label>
					<div class="col-sm-6">
						<select name="id_kelas" class="form-control">
							<?php
							foreach($kelas->result() as $kelass)
							{ 
								if($mapelGurus->id_kelas == $kelass->id_kelas){ ?>
									<option value="<?php echo $kelass->id_kelas; ?>" selected> <?php echo $kelass->nama_kelas; ?></option>
									<?php }else { ?>
									<option value="<?php echo $kelass->id_kelas; ?>"> <?php echo $kelass->nama_kelas; ?></option>
										<?php } ?>

							<?php }

							?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="thn_akademik" class="col-sm-2 control-label">Tahun Akademik</label>
					<div class="col-sm-6">
						<input type="text" value="<?php echo $mapelGurus->tahun_akademik; ?>"  name="thn_akademik" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-6">
						<button class="btn btn-primary" type="submit">SAVE</button>&nbsp; | &nbsp;
						<a href="<?php echo base_url().'admin/guru_mapel'; ?>"><button class="btn" type="button">BACK</button></a>
					</div>
				</div>		

			</form>
		</div>
	</div>
</div> 