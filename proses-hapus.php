<?php 
	
	include 'db.php';

	if(isset($_GET['idk'])){
		$delete = mysqli_query($conn, "DELETE FROM data_category WHERE category_id = '".$_GET['idk']."' ");
		echo '<script>window.location="data-kategori.php"</script>';
	}

	if(isset($_GET['idp'])){
		$produk = mysqli_query($conn, "SELECT product_image FROM data_market WHERE product_id = '".$_GET['idp']."' ");
		$p = mysqli_fetch_object($produk);
		$produk1 = mysqli_query($conn, "SELECT product_marker FROM data_market WHERE product_id = '".$_GET['idp']."' ");
		$p1 = mysqli_fetch_object($produk1);
		$produk2 = mysqli_query($conn, "SELECT product_pattern FROM data_market WHERE product_id = '".$_GET['idp']."' ");
		$p2 = mysqli_fetch_object($produk1);

		unlink('./produk/'.$p->product_image);
		unlink('./marker/'.$p1->product_marker);
		unlink('./patt/'.$p1->product_pattern);

		$delete = mysqli_query($conn, "DELETE FROM data_market WHERE product_id = '".$_GET['idp']."' ");
		echo '<script>window.location="data-produk.php"</script>';
	}

?>