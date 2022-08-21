<section id="main-content">
	<section class="wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-9">
					<div class="row" style="margin-left:1pc;margin-right:1pc;">
						<h1>DASHBOARD</h1>
						<hr>

						<?php
						$sql = " select * from barang where stok <= 3";
						$row = $config->prepare($sql);
						$row->execute();
						$r = $row->rowCount();
						if ($r > 0) {
						?>
						<?php
							echo "
							<div class='alert alert-warning'>
								<span class='glyphicon glyphicon-info-sign'></span> Ada <span style='color:red'>$r</span> barang yang Stok tersisa sudah kurang dari 3 items. silahkan pesan lagi !!
								<span class='pull-right'><a href='index.php?page=barang&stok=yes'>Tabel Barang <i class='fa fa-angle-double-right'></i></a></span>
							</div>
							";
						}
						?>
						<?php $hasil_barang = $lihat->barang_row(); ?>
						<?php $hasil_kategori = $lihat->kategori_row(); ?>
						<?php $stok = $lihat->barang_stok_row(); ?>
						<?php $jual = $lihat->jual_row(); ?>


					</div>
				</div>
			</div>

		</div>



	</section>
</section>