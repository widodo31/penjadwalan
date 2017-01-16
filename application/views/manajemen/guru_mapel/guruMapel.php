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
		if($guruMapel->num_rows() == 0)
		{ ?>
		<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">x</button>
		TIDAK ADA DATA DI DALAM TABEL
		</div>
		<?php
		}

		?>
		<div class="row-fluid">
			<a href="<?php echo base_url().'admin/guru_MapelAdd'; ?>"><button class="btn btn-primary pull-right"><i>Tambah</i></button></a>

			<form class="form-inline" method="post" action="<?php echo base_url().'admin/guru_mapelSearch' ?>">
				<input type="text" name="search" class="form-control" placeholder="search">
				<button type="submbit" class="btn">CARI</button>
			</form>

			<div>
				<ul class="pagination">
					<?php echo $paging; ?>
				</ul>
			</div>
			<!-- content table -->
			<div class="widget-content">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Guru</th>
							<th>Mapel</th>
							<th>Kelas</th>
							<th>Tahun Akademik</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
							<?php
						$i = intval($no)+1;
						foreach($guruMapel->result() as $guruMapels)
						{ ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $guruMapels->nama_guru; ?></td>
							<td><?php echo $guruMapels->nama_mapel; ?></td>
							<td><?php echo $guruMapels->nama_kelas; ?></td>
							<td><?php echo $guruMapels->tahun_akademik; ?></td>
							<td>
								<a href="<?php echo base_url().'admin/guru_mapelEdit/'.$guruMapels->id_gm; ?>" class="btn btn-small">Update</a>
								<a href="<?php echo base_url().'admin/guru_mapelDel/'.$guruMapels->id_gm; ?>" class="btn btn-small">Hapus</a>
							</td>
						</tr>
						<?php
						$i++;
						}
						?>
					</tbody>
				</table>
			</div>
			<!-- and content table -->
		</div>
	</div>
</div>