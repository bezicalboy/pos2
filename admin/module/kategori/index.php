<section id="main-content">
	<section class="wrapper">

		<div class="row">
			<div class="col-lg-12 main-chart">
				<h3>Daftar Transaksi</h3>
				<br />
				<?php if (isset($_GET['success'])) { ?>
					<div class="alert alert-success">
						<p>Tambah Data Berhasil !</p>
					</div>
				<?php } ?>
				<?php if (isset($_GET['success-edit'])) { ?>
					<div class="alert alert-success">
						<p>Update Data Berhasil !</p>
					</div>
				<?php } ?>
				<?php if (isset($_GET['remove'])) { ?>
					<div class="alert alert-danger">
						<p>Hapus Data Berhasil !</p>
					</div>
				<?php } ?>
				<?php
				if (!empty($_GET['uid'])) {
					$sql = "SELECT * FROM kategori WHERE id_kategori = ?";
					$row = $config->prepare($sql);
					$row->execute(array($_GET['uid']));
					$edit = $row->fetch();
				?>
					<form method="POST" action="fungsi/edit/edit.php?kategori=edit">
						<table>
							<tr>
								<td style="width:15pc;"><input type="text" class="form-control" value="<?= $edit['nama_kategori']; ?>" required name="kategori" placeholder="Masukan Kategori Barang Baru">
									<input type="hidden" name="id" value="<?= $edit['id_kategori']; ?>">
								</td>
								<td style="padding-left:10px;"><button id="tombol-simpan" class="btn btn-primary"><i class="fa fa-edit"></i> Ubah Data</button></td>
							</tr>
						</table>
					</form>
				<?php } else { ?>

				<?php } ?>
				<br />
				<table class="table table-bordered" id="example1">
					<thead>
						<tr style="background:#DFF0D8;color:#333;">
							<th>No.</th>
							<th>No Transaksi</th>
							<th>Tanggal</th>
							<th>Nama Customer</th>
							<th>Jumlah Barang</th>
							<th>Sub Total</th>
							<th>Diskon</th>
							<th>Ongkir</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$hasil = $lihat->kategori();
						$no = 1;
						foreach ($hasil as $isi) {
						?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $isi['nama_kategori']; ?></td>
								<td><?php echo $isi['tgl_input']; ?></td>

								<td><?php echo $isi['nama_customer']; ?></td>
								<td><?php echo $isi['jumlah_barang']; ?></td>
								<td><?php echo $isi['sub_total']; ?></td>
								<td><?php echo $isi['diskon']; ?></td>
								<td><?php echo $isi['ongkir']; ?></td>
								<td><?php echo $isi['total']; ?></td>
							</tr>
						<?php $no++;
						} ?>
					</tbody>
				</table>
				<div class="clearfix" style="padding-top:16%;"></div>
			</div>
		</div>
	</section>
</section>