<div class="content">
	<div class="header">
		<h1 class="page-title"><?php echo $title; ?></h1>
	</div>
	<ul class="breadcrumb">
		<li>Manajemen<span class="divider"></span></li>
		<li class="active"><?php echo $title ?></li>
	</ul>

	<div class="container-fluid">

		<div class="row-fluid">
			<form class="form" method="POST">
          <div class="block span6">

          <?php if(isset($msg))
          		echo $msg;
           ?>
			  
			<label>Tahun Akademik</label>
			<select id="tahun_akademik" name="tahun_akademik" class="input-xlarge">
			  <option value="2011-2012" <?php echo isset($tahun_akademik) ? ($tahun_akademik === '2011-2012' ? 'selected':'') : '' ;?> /> 2011-2012
			  <option value="2012-2013" <?php echo isset($tahun_akademik) ? ($tahun_akademik === '2012-2013' ? 'selected':'') : '' ;?> /> 2012-2013
			  <option value="2013-2014" <?php echo isset($tahun_akademik) ? ($tahun_akademik === '2013-2014' ? 'selected':'') : '' ;?> /> 2013-2014
			  <option value="2014-2015" <?php echo isset($tahun_akademik) ? ($tahun_akademik === '2014-2015' ? 'selected':'') : '' ;?> /> 2014-2015
			  <option value="2015-2016" <?php echo isset($tahun_akademik) ? ($tahun_akademik === '2015-2016' ? 'selected':'') : '' ;?> /> 2015-2016
			  <option value="2016-2017" <?php echo isset($tahun_akademik) ? ($tahun_akademik === '2016-2017' ? 'selected':'') : '' ;?> /> 2016-2017
			  <option value="2017-2018" <?php echo isset($tahun_akademik) ? ($tahun_akademik === '2017-2018' ? 'selected':'') : '' ;?> /> 2017-2018
			  <option value="2018-2019" <?php echo isset($tahun_akademik) ? ($tahun_akademik === '2018-2019' ? 'selected':'') : '' ;?> /> 2018-2019
			  <option value="2019-2020" <?php echo isset($tahun_akademik) ? ($tahun_akademik === '2019-2020' ? 'selected':'') : '' ;?> /> 2019-2020
			  
			</select>
			  
			<label>Jumlah Populasi</label>  
			<input type="text" name="jumlah_populasi" value="<?php echo isset($jumlah_populasi) ? $jumlah_populasi : '50' ;?>">  
          </div>
          <div class="block span6">
            <label>Probabilitas CrossOver</label>  
            <input type="text" name="probabilitas_crossover" value="<?php echo isset($probabilitas_crossover) ? $probabilitas_crossover: '0.70' ;?>">
            
            <label>Probabilitas Mutasi</label>  
            <input type="text" name="probabilitas_mutasi" value="<?php echo isset($probabilitas_mutasi) ? $probabilitas_mutasi : '0.40' ;?>">
            
            <label>Jumlah Generasi</label>  
            <input type="text" name="jumlah_generasi" value="<?php echo isset($jumlah_generasi) ? $jumlah_generasi : '10000' ;?>">
          </div>
          <div class="form">
            <button type="submit" class="btn">Proses</button>
			
          </div>
        </form>

       
		
			 <a href="#"><button class="btn btn-primary pull-right"><i>Tambah</i></button></a>
			<!--content table -->
			<div class="widget-content">
				<table class="table table-striped table-border">
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
						<tr>
							<td>1</td>
							<td>111</td>
							<td>Widodo</td>
							<td>Semarang Barat</td>
							<td>0976</td>
							<td>widodo@gmail.com</td>
							<td>
								<a href="#" class="btn btn-small">Update</a>
								<a href="#" class="btn btn-small">Hapus</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- and content table -->
		</div>
	</div>
</div>