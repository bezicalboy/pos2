<?php
session_start();
if (!empty($_SESSION['admin'])) {
	require '../../config.php';
	if (!empty($_GET['kategori'])) {
		$nama = $_POST['kategori'];
		$tgl = date("j F Y, G:i");
		$data[] = $nama;
		$data[] = $tgl;
		$sql = 'INSERT INTO kategori (nama_kategori,tgl_input,nama_customer,jumlah_barang,sub_total,diskon,ongkir,total) VALUES(?,?,?,?,?,?,?,?)';
		$row = $config->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="../../index.php?page=kategori&&success=tambah-data"</script>';
	}
	if (!empty($_GET['barang'])) {
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$merk = $_POST['merk'];
		$beli = $_POST['beli'];
		$jual = $_POST['jual'];
		$diskon = $_POST['diskon'];
		$satuan = $_POST['satuan'];
		$stok = $_POST['stok'];
		$tgl = $_POST['tgl'];

		$data[] = $id;
		$data[] = $nama;
		$data[] = $merk;
		$data[] = $beli;
		$data[] = $jual;
		$data[] = $diskon;
		$data[] = $satuan;
		$data[] = $stok;
		$data[] = $tgl;
		$sql = 'INSERT INTO barang (id_barang,id_kategori,nama_barang,merk,harga_beli,harga_jual,harga_diskon,satuan_barang,stok,tgl_input) 
			    VALUES (?,5,?,?,?,?,?,?,?,?) ';
		$row = $config->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="../../index.php?page=barang&success=tambah-data"</script>';
	}
	if (!empty($_GET['jual'])) {
		$id = $_GET['id'];

		// get tabel barang id_barang 
		$sql = 'SELECT * FROM barang WHERE id_barang = ?';
		$row = $config->prepare($sql);
		$row->execute(array($id));
		$hsl = $row->fetch();
	}
}
