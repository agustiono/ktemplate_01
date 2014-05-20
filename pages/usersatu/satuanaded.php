<?php
/* Tambah Data */
if(isset($_GET['act'])) {
	$query=mysql_query("insert into satuan_barang (id,nama_barang,jumlah_besar,sat_besar,harga_besar,jumlah_kecil,sat_kecil,harga_kecil,statusact) value ('','".$_REQUEST['nama_barang']."','".$_REQUEST['jumlah_besar']."','".$_REQUEST['sat_besar']."','".$_REQUEST['harga_besar']."','".$_REQUEST['jumlah_kecil']."','".$_REQUEST['sat_kecil']."','".$_REQUEST['harga_kecil']."','1')") or die(mysql_error());
	if($query) {	echo "<script>window.location='?cat=gudang&page=satuan'</script>";	}	
}


/* Edit Atatus active / InActive */
if(isset($_GET['sta'])) {
	$ids=$_GET['id'];
	if(empty($_GET['stact'])) {
		$ff=mysql_query("UPDATE satuan_barang SET statusact='1' Where sha1(id)='".$ids."'");
		echo "<script>window.location='?cat=gudang&page=satuan'</script>";
	} else {
		$ff=mysql_query("UPDATE satuan_barang SET statusact='0' Where sha1(id)='".$ids."'");
		echo "<script>window.location='?cat=gudang&page=satuan'</script>";	
	}	
}

/* Edit data satuan_barang */
if(isset($_GET['edt'])) {
	$ids=$_GET['id'];
	if(isset($_GET['stp_a'])) {
		$ff=mysql_query("SELECT * FROM satuan_barang WHERE sha1(id)='".$ids."'");
		while ($r=mysql_fetch_array($ff)) {
			echo "<script>window.location='?cat=gudang&page=satuanadd&id=".$r['id']."&nb=".$r['nama_barang']."&jb=".$r['jumlah_besar']."&sb=".$r['sat_besar']."&hb=".$r['harga_besar']."&jk=".$r['jumlah_kecil']."&sk=".$r['sat_kecil']."&hk=".$r['harga_kecil']."'</script>";
		}
	} 
	if(isset($_GET['stp_b'])) {
		$ff=mysql_query("UPDATE satuan_barang SET 
		nama_barang='".$_REQUEST['nama_barang']."',
		jumlah_besar='".$_REQUEST['jumlah_besar']."',
		sat_besar='".$_REQUEST['sat_besar']."',
		harga_besar='".$_REQUEST['harga_besar']."',
		jumlah_kecil='".$_REQUEST['jumlah_kecil']."',
		sat_kecil='".$_REQUEST['sat_kecil']."',
		harga_kecil='".$_REQUEST['harga_kecil']."'
		Where sha1(id)='".$ids."'");
		echo "<script>window.location='?cat=gudang&page=satuan'</script>";	
	}	
}



if(isset($_GET['del'])) {
	$ids=$_GET['id'];
	$ff=mysql_query("Delete from satuan_barang Where sha1(ids)='".$ids."'");
	if($ff)
	{
		echo "<script>window.location='?cat=gudang&page=satuan'</script>";
	}
}



?>