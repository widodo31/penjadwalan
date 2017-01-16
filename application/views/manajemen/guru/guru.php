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
		if($guru->num_rows() == 0)
		{ ?>
		<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">x</button>
		TIDAK ADA DATA DI DALAM TABEL
		</div>
		<?php
		}

		?>
		<div class="row-fluid">
			<a href="<?php echo base_url().'admin/guruAdd'; ?>"><button class="btn btn-primary pull-right"><i>Tambah</i></button></a>

			<form class="form-inline" method="post" action="<?php echo base_url().'admin/guruSearch' ?>">
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
							<th>NIP</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Telp</th>
							<th>Email</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
							<?php
						$i = intval($no)+1;
						foreach($guru->result() as $gurus)
						{ ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $gurus->nip; ?></td>
							<td><?php echo $gurus->nama_guru; ?></td>
							<td><?php echo $gurus->alamat; ?></td>
							<td><?php echo $gurus->telp; ?></td>
							<td><?php echo $gurus->email; ?></td>
							<td>
								<a href="<?php echo base_url().'admin/guruEdit/'.$gurus->id_guru; ?>" class="btn btn-small">Update</a>
								<a href="<?php echo base_url().'admin/guruDel/'.$gurus->id_guru; ?>" class="btn btn-small">Hapus</a>
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