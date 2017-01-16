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
		if($mapel->num_rows() == 0)
		{ ?>
		<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">x</button>
		TIDAK ADA DATA DI DALAM TABEL
		</div>
		<?php
		}

		?>
		<div class="row-fluid">
			<a href="<?php echo base_url().'admin/mapelAdd'; ?>"><button class="btn btn-primary pull-right"><i>Tambah</i></button></a>

			<form class="form-inline" method="post" action="<?php echo base_url().'admin/mapelSearch' ?>">
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
							<th>Kode Mapel</th>
							<th>Nama</th>
							<th>Jumlah Jam</th>
							<th>Jenis</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
							<?php
						$i = intval($no)+1;
						foreach($mapel->result() as $mapels)
						{ ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $mapels->kode_mapel; ?></td>
							<td><?php echo $mapels->nama_mapel; ?></td>
							<td><?php echo $mapels->jumlah_jam; ?></td>
							<td><?php echo $mapels->jenis; ?></td>
							<td>
								<a href="<?php echo base_url().'admin/mapelEdit/'.$mapels->id_mapel; ?>" class="btn btn-small">Update</a>
								<a href="<?php echo base_url().'admin/mapelDel/'.$mapels->id_mapel; ?>" class="btn btn-small">Hapus</a>
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