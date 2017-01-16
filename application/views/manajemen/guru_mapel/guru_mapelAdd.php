<div class="content">
	<div class="header">
		<h1 class="page-title"><?php echo $title; ?></h1>
	</div>
	<ul class="breadcrumb">
		<li>MANAJEMEN <span class="divider"></span></li>
		<li><a href="<?php echo base_url().'admin/guru_mapel'; ?>">GURU MAPEL</a><span class="divider"></span></li>
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
					<label for="mapel" class="col-sm-2 control-label">Nama Mapel</label>
					<div class="col-sm-6">
						<select name="id_mapel" class="form-control">
							<option value="">--Nama Mapel--</option>
							<?php
							foreach($mapel->result() as $mapels)
							{ ?>
								<option value="<?php echo $mapels->id_mapel; ?>"><?php echo $mapels->nama_mapel; ?></option>
							<?php }

							?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="guru" class="col-sm-2 control-label">Nama Guru</label>
					<div class="col-sm-6">
						<select name="id_guru" class="form-control">
							<option value="">--Nama Guru--</option>
							<?php
							foreach($guru->result() as $gurus)
							{ ?>
								<option value="<?php echo $gurus->id_guru; ?>"><?php echo $gurus->nama_guru; ?></option>
							<?php }

							?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="kelas" class="col-sm-2 control-label">Kelas</label>
					<div class="col-sm-6">
						<select name="id_kelas" class="form-control">
							<option value="">--Nama Kelas--</option>
							<?php
							foreach($kelas->result() as $kelass)
							{ ?>
								<option value="<?php echo $kelass->id_kelas; ?>"><?php echo $kelass->nama_kelas; ?></option>
							<?php }

							?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="tahun_akademik" class="col-sm-2 control-label">Tahun Akademik</label>
					<div class="col-sm-6">
						<select class="form-control" name="thn_akademik">
							<option value="">--Tahun Akademik--</option>
							<option value="2014-2015">2014-2015</option>
							<option value="2015-2016">2015-2016</option>
							<option value="2016-2017">2016-2017</option>
							<option value="2017-2018">2017-2018</option>
							<option value="2018-2019">2018-2019</option>
							<option value="2019-2020">2019-2020</option>
							<option value="2020-2021">2020-2021</option>
						</select>
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