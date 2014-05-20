<?php ob_start(); ?>
<?php
if(empty($_GET['id'])) {
	$nama_barang = "";
	$jumlah_besar = "";
	$sat_besar = "";
	$harga_besar = "";
	$jumlah_kecil = "";
	$sat_kecil = "";
	$harga_kecil = "";
	$button = '<input type="submit" class="btn btn-primary" name="button" id="button" value="Tambah Data">';
	$url = '?cat=gudang&page=satuanaded&act=1';
}
else {
	$nama_barang = $_REQUEST['nb'];
	$jumlah_besar = $_REQUEST['jb'];
	$sat_besar = $_REQUEST['sb'];
	$harga_besar = $_REQUEST['hb'];
	$jumlah_kecil = $_REQUEST['jk'];
	$sat_kecil = $_REQUEST['sk'];
	$harga_kecil = $_REQUEST['hk'];
	$button = '<input type="submit" class="btn btn-primary" name="button" id="button" value="Update Data">';
	$url = '?cat=gudang&page=satuanaded&edt=1&stp_b=1&id='.sha1($_REQUEST['id']).'';
}
?>


<form action="<?php echo $url; ?>" method="POST">

<table width="90%">
<tr><td colspan="3"><h3>Nama Barang</h3> <input type="text" name="nama_barang" id="" value="<?php echo $nama_barang; ?>" ></td></tr>
<tr>
	<td><h4>Jumlah Besar</h4><input type="text" name="jumlah_besar" id="" width="20%" value="<?php echo $jumlah_besar; ?>" ></td>
	<td><h4>Satuan Besar</h4>
		<select name="sat_besar">
		<?php
				$query2=mysql_query("SELECT * FROM satuan_dasar");
				while ($result2=mysql_fetch_array($query2)) {
					if ($result2['ids'] === $sat_besar) {
						echo "<option value='".$result2['ids']."' selected>".$result2['satuan']."</option>";
					} else {
						echo "<option value='".$result2['ids']."'>".$result2['satuan']."</option>";
					}
				}
		?>
		</select>
	</td>
	<td><h4>Harga Satuan Besar</h4><input type="text" name="harga_besar" id="" width="20%" value="<?php echo $harga_besar; ?>"></td>
</tr>
<tr>
	<td><h4>Jumlah Kecil</h4><input type="text" name="jumlah_kecil" id="" width="20%" value="<?php echo $jumlah_kecil; ?>"></td>
	<td><h4>Satuan Kecil</h4>
		<select name="sat_kecil">
		<?php
				$query2=mysql_query("SELECT * FROM satuan_dasar");
				while ($result2=mysql_fetch_array($query2)) {
					if ($result2['ids'] === $sat_kecil) {
						echo "<option value='".$result2['ids']."' selected>".$result2['satuan']."</option>";
					} else {
						echo "<option value='".$result2['ids']."'>".$result2['satuan']."</option>";
					}
				}
		?>
		</select>
	</td>
	<td><h4>Harga Satuan kecil</h4><input type="text" name="harga_kecil" id="" width="20%" value="<?php echo $harga_kecil; ?>"></td>
</tr>
</table>

<br>
<?php echo $button; ?>&nbsp;
<input type="reset" class="btn btn-danger" name="reset" id="button" value="Reset Page">

</form>