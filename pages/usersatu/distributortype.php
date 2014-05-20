<?php ob_start(); ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="responsive table table-striped table-bordered">
<tr><td colspan='3'>
	<form action="?cat=gudang&page=distributortype&act=1" method="POST"> 
			<center> 
				<input type="text" name="namatype" id="q"> 
				<select name="status">
					<option value="1">Active</option>
					<option value="0">InActive</option>
				</select> 
				<input type="submit" class="btn btn-primary" name="button" id="button" value="Simpan">&nbsp;
				<input type="reset" class="btn btn-danger" name="reset" id="button" value="Reset">
			</center>
	</form>
</td></tr>
<tr><th>No</th><th>Type Usaha</th><th>Action</th></tr>
<?php
	$no = "1";
	$q1 = mysql_query("SELECT * FROM vendor_type");
	while ($r1=mysql_fetch_array($q1)) {
		echo "<tr><td width='5%'>".$no."</td><td>".$r1['namatype']."</td><td width='20%'><a href=''>Edit</a> - <a href='?cat=gudang&page=distributortype&sts=1&id=".sha1($r1['id'])."";
		if ($r1['status'] == "1"){
			echo "&status=0'>Active";			
		} else {
			echo "&status=1'>InActive";
		}
		echo "</a></td></tr>";
		$no++;
	}
?>
</table>

<?php ob_end_flush(); ?>
<?php
if(isset($_GET['act']))
{
	$rs=mysql_query("INSERT INTO vendor_type (id,namatype,status) VALUES ('','".$_POST['namatype']."','".$_POST['status']."')") or die(mysql_error());
	if($rs)	{	echo "<script>window.location='?cat=gudang&page=distributortype'</script>";	}
}
?>

<?php
if(isset($_GET['sts']))
{
	$ids=$_GET['id'];
	$status=$_GET['status'];
	$ff=mysql_query("UPDATE vendor_type SET status=".$status." Where sha1(id)='".$ids."'");
	if($ff)	{	echo "<script>window.location='?cat=gudang&page=distributortype'</script>";	}
}
?>
