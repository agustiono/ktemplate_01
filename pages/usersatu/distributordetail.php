<?php ob_start(); ?>
<?php
if(empty($_GET['id'])){	echo "<script>window.location='?cat=gudang&page=home'</script>"; } 
else {
	$query=mysql_query("SELECT * FROM vendor_data WHERE sha1(id)='".$_GET['id']."'");
	while ($result = mysql_fetch_array($query)){
		$result['id'];
		$result['nama_persh']; 
		$result['type_persh']; 
		$result['jns_brg']; 
		$result['npwp']; 
		$result['apit']; 
		$result['edi_nmbr']; 
		$result['srp_persh']; 
		$result['alamat_persh']; 
		$result['area_persh']; 
		$result['negara_persh']; 
		$result['provinsi_persh']; 
		$result['kode_pos']; 
		$result['web_persh']; 
		$result['phfax_persh']; 
		$result['cp_persh']; 
		$result['cp_eml']; 
		$result['cp_ph']; 
		$result['status_persh'];
?>



<table width="90%" border="0" cellspacing="0" cellpadding="0" class="responsive table table-striped table-bordered">
	<tr>
		<th colspan="6"><h3> 
			<?php
			$q1=mysql_query("SELECT * FROM vendor_type WHERE id='".$result['type_persh']."'")or die(mysql_error());
			while ($r1=mysql_fetch_array($q1)) {
				echo $r1['namatype'].". ".$result['nama_persh'];
			}
			?></h3>
		</th>
	</tr>
	<tr><td width="20%">Alamat </td><td colspan="5"><?php echo $result['alamat_persh'] ;?></td></tr>
	<tr><td></td><td colspan='5'><?php echo $result['area_persh'] ;?> : <?php echo $result['negara_persh'] ;?> : <?php echo $result['provinsi_persh'] ;?> : Kode Pos : <?php echo $result['kode_pos']; ?></td></tr>
	<tr><td>Phone & Fax</td><td colspan='5'><?php echo $result['phfax_persh']; ?></td></tr>
	<tr><td colspan='3'><h5>Contact Person</h5><?php echo $result['cp_persh']." : ".$result['cp_ph']; ?></td><td colspan='3'><h5>Site Address</h5><?php echo "website : <a href='http://".$result['web_persh']."'>".$result['web_persh']."</a> ,@email : ".$result['cp_eml']; ?></td></tr>
	<tr><td colspan='6'><h3>Legal Documentation</h3></td></tr>
	<tr><td>NPWP </td><td colspan="5"><?php echo $result['npwp'] ;?></td></tr>
	<tr><td>API/APIT </td><td colspan="5"><?php echo $result['apit'] ;?></td></tr>
	<tr><td>EDI Number </td><td colspan="5"><?php echo $result['edi_nmbr'] ;?></td></tr>
	<tr><td>Surat Registrasi Perusahaan</td><td colspan="5"><?php echo $result['srp_persh'] ;?></td></tr>
</table>
<?php
	}
}
?>