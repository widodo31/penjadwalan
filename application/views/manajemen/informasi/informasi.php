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
		if($informasi->num_rows() == 0)
		{ ?>
		<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">x</button>
		TIDAK ADA DATA DI DALAM TABEL
		</div>
		<?php
		}

		?>
		<div class="row-fluid">
			<a href="<?php echo base_url().'admin/informasiAdd'; ?>"><button class="btn btn-primary pull-right"><i>Tambah</i></button></a>

			<form class="form-inline" method="post" action="<?php echo base_url().'admin/informasiSearch' ?>">
				<input type="text" name="search" class="form-control" placeholder="search">
				<button type="submit" class="btn">CARI</button>
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
							<th>Judul</th>
							<th>tanggal</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
							<?php
						$i = intval($no)+1;
						foreach($informasi->result() as $informasis)
						{ ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $informasis->judul; ?></td>
							<td><?php echo $informasis->tanggal; ?></td>
							<td>
								<a href="<?php echo base_url().'admin/informasiEdit/'.$informasis->id_info; ?>" class="btn btn-small">Edit</a> 
								<a href="<?php echo base_url().'admin/informasiDel/'.$informasis->id_info; ?>" class="btn btn-small">Hapus</a>
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