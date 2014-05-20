<?php
ob_start();
if(isset($_GET['id']))
{
	$rs=mysql_query("Select * from vendor_data where sha1(id)='".$_GET['id']."'");
	$row=mysql_fetch_array($rs);
?>
<form name="form1" method="post" action="?cat=gudang&page=distributoredit&id=<?php echo $_GET['id']; ?>&edit=1">
  
 <table width="100%">
<tr><td>      
	<label>Nama Distributor/Vendor</label>
      <input type="text" name="nama_persh" id="nama_persh" value="<?php echo $row['nama_persh']; ?>">
	<label>Jenis Usaha</label>
	<select name="type_persh">
		<?php
			$rs1=mysql_query("SELECT * FROM vendor_type")or die(mysql_error());
			while($dt1=mysql_fetch_array($rs1)){
				if ($row['type_persh'] == $dt1['id']) {
					echo "<option value='".$dt1['id']."' selected>".$dt1['namatype']."</option>";
				} else {
					echo "<option value='".$dt1['id']."'>".$dt1['namatype']."</option>";
				}
			}
		?>
	</select>
    <label>Jenis Barang</label>
		<select name="jns_brg" id="jns_brg" >
			<option value="<?php echo $row['jns_brg']; ?>" selected><?php echo $row['jns_brg']; ?></option>
			<option value="atk">ATK</option>
			<option value="it">IT</option>
			<option value="makanan">Makanan</option>
			<option value="pakan">Pakan</option>
		</select>
	<label>NPWP</label>
		<input type="text" name="npwp" id="npwp" value="<?php echo $row['npwp']; ?>">
	<label>API/APIT</label>
		<input type="text" name="apit" id="apit" value="<?php echo $row['apit']; ?>">
	<label>EDI Number</label>
		<input type="text" name="edi_nmbr" id="edi_nmbr" value="<?php echo $row['edi_nmbr']; ?>">
	<label>SRP/No Surat Registrasi Perusahaan</label>
		<input type="text" name="srp_persh" id="srp_persh" value="<?php echo $row['srp_persh']; ?>">
</td>
<td>
    <label>Address</label>
		<input type="text" name="alamat_persh" id="alamat_persh" value="<?php echo $row['alamat_persh']; ?>">
    <label>Region/Area</label>
	<select onchange="set_country(this,country,city_state)" name="region" id="region">
		<option value="<?php echo $row['area_persh']; ?>" selected="selected"><?php echo $row['area_persh']; ?></option>
		<script type="text/javascript">
			setRegions(this);
		</script>
	</select>	
    <label>Country/Negara</label>
		<select name="country"  onchange="set_city_state(this,city_state)">
			<option value="<?php echo $row['negara_persh']; ?>"><?php echo $row['negara_persh']; ?></option>
		</select>    
    <label>Provincy/Profinsi</label>
		<select name="city_state" onchange="print_city_state(country,this)">
			<option value="<?php echo $row['provinsi_persh']; ?>"><?php echo $row['provinsi_persh']; ?></option>
		</select>
	<label>Code/Kode Pos</label>
		<input type="text" name="kode_pos" id="kode_pos" value="<?php echo $row['kode_pos']; ?>">
    <label>Web Address</label>
		<input type="text" name="web_persh" id="web_persh" value="<?php echo $row['web_persh']; ?>">
    <label>Phone & Fax</label>
		<input type="text" name="phfax_persh" id="phfax_persh" value="<?php echo $row['phfax_persh']; ?>">
</td>
<td>
    <label>Contact Person Name</label>
		<input type="text" name="cp_persh" id="cp_persh" value="<?php echo $row['cp_persh']; ?>">
    <label>Contact Person Email</label>
		<input type="text" name="cp_eml" id="cp_eml" value="<?php echo $row['cp_persh']; ?>">
    <label>Contact Person PH/HP</label>
		<input type="text" name="cp_ph" id="cp_ph" value="<?php echo $row['cp_persh']; ?>">
    <label>Status</label>
		<input type="text" name="status_persh" id="status_persh" value="<?php echo $row['status_persh']; ?>">
</td></tr>
</table>
 
 
 
      <p></p>
      <input type="submit" class="btn btn-primary" name="button" id="button" value="Ubah">&nbsp;&nbsp;<input type="reset" class="btn btn-danger" name="reset" id="reset" value="Batal" onclick="window.location='?cat=gudang&page=ditributor'">
</form>
<?php
ob_end_flush();
}else{
	echo "<script>window.location='?cat=gudang&page=distributor'</script>";
}
?>
<?php
if(isset($_GET['edit']))
{
	$rs=mysql_query("update vendor_data SET 
	nama_persh='".$_POST['nama_persh']."',
	type_persh='".$_POST['type_persh']."',
	jns_brg='".$_POST['jns_brg']."',
	npwp='".$_POST['npwp']."',
	apit='".$_POST['apit']."',
	edi_nmbr='".$_POST['edi_nmbr']."',
	srp_persh='".$_POST['srp_persh']."',
	alamat_persh='".$_POST['alamat_persh']."',
	area_persh='".$_POST['region']."',
	negara_persh='".$_POST['country']."',
	provinsi_persh='".$_POST['city_state']."',
	kode_pos='".$_POST['kode_pos']."',
	web_persh='".$_POST['web_persh']."',
	phfax_persh='".$_POST['phfax_persh']."',
	cp_persh='".$_POST['cp_persh']."',
	cp_eml='".$_POST['cp_eml']."',
	cp_ph='".$_POST['cp_ph']."' ,
	status_persh='".$_POST['status_persh']."' 
	Where sha1(id)='".$_GET['id']."'");
	if($rs)
	{
		echo "<script>window.location='?cat=gudang&page=distributorview'</script>";
	}
}
?>
