<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kopjonstore</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="dashboard.php">Kopjonstore</a></h1>
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="profil.php">Profil</a></li>
				<li><a href="data-kategori.php">Data Kategori</a></li>
				<li><a href="data-produk.php">Data Produk</a></li>
				<li><a href="keluar.php">Keluar</a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Tambah Data Produk</h3>
			<div class="box">
				<form action="" method="POST" enctype="multipart/form-data">
					<select class="input-control" name="kategori" required>
						<option value="">--Pilih--</option>
						<?php 
							$kategori = mysqli_query($conn, "SELECT * FROM data_category ORDER BY category_id DESC");
							while($r = mysqli_fetch_array($kategori)){
						?>
						<option value="<?php echo $r['category_id'] ?>"><?php echo $r['category_name'] ?></option>
						<?php } ?>
					</select>

					<input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
					<input type="text" name="harga" class="input-control" placeholder="Harga" required>
					<label>Gambar</label>
					<input type="file" name="gambar" class="input-control" required>
					<label>Marker</label>
					<input type="file" name="marker" class="input-control" required>
					<label>Pattern</label>
					<input type="file" name="pattern" class="input-control" required>
					<textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea><br>
					<select class="input-control" name="status">
						<option value="">--Pilih--</option>
						<option value="1">Aktif</option>
						<option value="0">Tidak Aktif</option>
					</select>
					<input type="submit" name="submit" value="Submit" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])){

						// print_r($_FILES['gambar']);
						// menampung inputan dari form
						$kategori 	= $_POST['kategori'];
						$nama 		= $_POST['nama'];
						$harga 		= $_POST['harga'];
						$deskripsi 	= $_POST['deskripsi'];
						$status 	= $_POST['status'];

						// menampung data file yang diupload gambar
						$filename_gambar = $_FILES['gambar']['name'];
						$tmp_name_gambar = $_FILES['gambar']['tmp_name'];

						$type1_gambar = explode('.', $filename_gambar);
						$type2_gambar = $type1_gambar[1];

						// menampung data file yang diupload marker
						$filename_marker = $_FILES['marker']['name'];
						$tmp_name_marker = $_FILES['marker']['tmp_name'];

						$type1_marker = explode('.', $filename_marker);
						$type2_marker = $type1_marker[1];

						// menampung data file yang diupload pattern
						$filename_pattern = $_FILES['pattern']['name'];
						$tmp_name_pattern = $_FILES['pattern']['tmp_name'];

						$type1_pattern = explode('.', $filename_pattern);
						$type2_pattern = $type1_pattern[1];

						
						

						$newname_produk = 'produk'.time().'.'.$type2_gambar;
						$newname_marker = 'marker'.time().'.'.$type2_marker;
						$newname_pattern = 'patt'.time().'.'.$type2_pattern;

						// menampung data format file yang diizinkan
						$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif','patt');

						// validasi format file
						if(!in_array($type2_gambar && $type2_marker && $type2_pattern, $tipe_diizinkan)){
							// jika format file tidak ada di dalam tipe diizinkan
							echo '<script>alert("Format file tidak diizinkan")</scrtip>';

						}else{
							// jika format file sesuai dengan yang ada di dalam array tipe diizinkan
							// proses upload file sekaligus insert ke database
							move_uploaded_file($tmp_name_gambar, './produk/'.$newname_produk);
							move_uploaded_file($tmp_name_marker, './marker/'.$newname_marker);
							move_uploaded_file($tmp_name_pattern, './patt/'.$newname_pattern);

							$insert = mysqli_query($conn, "INSERT INTO data_market VALUES (
										null,
										'".$kategori."',
										'".$nama."',
										'".$harga."',
										'".$deskripsi."',
										'".$newname_produk."',
										'".$newname_marker."',
										'".$newname_pattern."',
										'".$status."',
										null
											) ");

							if($insert){
								echo '<script>alert("Tambah data berhasil")</script>';
								echo '<script>window.location="data-produk.php"</script>';
							}else{
								echo 'gagal '.mysqli_error($conn);
							}

						}

						
						
					}
				?>
				
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2023 - Kopjonstore.</small>
		</div>
	</footer>
	<script>
        CKEDITOR.replace( 'deskripsi' );
    </script>
</body>
</html>