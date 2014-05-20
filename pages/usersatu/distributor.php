<?php
ob_start();
?>
<form name="form1" method="post" action="?cat=gudang&page=distributor&act=1">
 
<table width="100%">
<tr><td>      
	<label>Nama Distributor/Vendor</label>
		<input type="text" name="nama_persh" id="nama_persh">
	<label>Type Distributor/Vendor</label>
		<select name="type_persh" id="type_persh" >
			<?php
				$q1 = mysql_query("SELECT * FROM vendor_type");
				while ($r1=mysql_fetch_array($q1)) {
					echo "<option value=".$r1['id'].">".$r1['namatype']."</option>";
				}
			?>
		</select>
    <label>Jenis Barang</label>
		<select name="jns_brg" id="jns_brg" >
			<option value="atk">ATK</option>
			<option value="it">IT</option>
			<option value="makanan">Makanan</option>
			<option value="pakan">Pakan</option>
		</select>
	<label>NPWP</label>
		<input type="text" name="npwp" id="npwp">
	<label>API/APIT</label>
		<input type="text" name="apit" id="apit">
	<label>EDI Number</label>
		<input type="text" name="edi_nmbr" id="edi_nmbr">
	<label>SRP/No Surat Registrasi Perusahaan</label>
		<input type="text" name="srp_persh" id="srp_persh">
</td>
<td>
    <label>Address</label>
		<input type="text" name="alamat_p" id="alamat_p">
    <label>Region/Area</label>
	<select onchange="set_country(this,country,city_state)" name="region" id="region">
		<option value="" selected="selected">-</option>
		<script type="text/javascript">
			setRegions(this);
		</script>
	</select>	
    <label>Country/Negara</label>
		<select name="country" disabled="disabled" onchange="set_city_state(this,city_state)"></select>    
    <label>Provincy/Profinsi</label>
		<select name="city_state" disabled="disabled" onchange="print_city_state(country,this)"></select>
	<label>Code/Kode Pos</label>
		<input type="text" name="kode_pos" id="kode_pos">
    <label>Web Address</label>
		<input type="text" name="web_persh" id="web_persh">
    <label>Phone & Fax</label>
		<input type="text" name="phfax_persh" id="phfax_persh">
</td>
<td>
    <label>Contact Person Name</label>
		<input type="text" name="cp_persh" id="cp_persh">
    <label>Contact Person Email</label>
		<input type="text" name="cp_eml" id="cp_eml">
    <label>Contact Person PH/HP</label>
		<input type="text" name="cp_ph" id="cp_ph">
</td></tr>
</table>
      <p></p>
      <input type="submit" class="btn btn-primary" name="button" id="button" value="Daftar">&nbsp;&nbsp;<input type="reset" class="btn btn-danger" name="reset" id="reset" value="Reset">
</form>

<?php
ob_end_flush();
?>
<p></p>
<p></p>
<span class="span4">
<?php
// include("pages/gudang/distributorview.php");
?>
</span>
<?php
if(isset($_GET['act']))
{
	$rs=mysql_query("insert into vendor_data (id,nama_persh,type_persh,jns_brg,npwp,apit, edi_nmbr,srp_persh,alamat_persh,area_persh,negara_persh,provinsi_persh, kode_pos,web_persh,phfax_persh,cp_persh,cp_eml,cp_ph,status_persh) values ('','".$_POST['nama_persh']."','".$_POST['type_persh']."','".$_POST['jns_brg']."','".$_POST['npwp']."','".$_POST['apit']."','".$_POST['edi_nmbr']."','".$_POST['srp_persh']."','".$_POST['alamat_p']."','".$_POST['region']."','".$_POST['country']."','".$_POST['city_state']."','".$_POST['kode_pos']."','".$_POST['web_persh']."','".$_POST['phfax_persh']."','".$_POST['cp_persh']."','".$_POST['cp_eml']."','".$_POST['cp_ph']."','1')") or die(mysql_error());
	if($rs)
	{		
		echo "<script>window.location='?cat=gudang&page=distributor'</script>";
	}
}
?>

<?php
if(isset($_GET['del']))
{
	$ids=$_GET['id'];
	$ff=mysql_query("Delete from vendor_data Where sha1(id)='".$ids."'");
	if($ff)
	{
		echo "<script>window.location='?cat=gudang&page=distributor'</script>";
	}
}
?>
