<?php ob_start(); ?>
<form name="form1" method="post" action="?cat=gudang&page=satuandasartambah&act=1">
<table width="100%">
<tr><td>      
    <label>Masukan Satuan Dasar</label>
		<input type="text" name="satuan" id="satuan">
      <input type="submit" class="btn btn-primary" name="button" id="button" value="Tambah">&nbsp;&nbsp;<input type="reset" class="btn btn-danger" name="reset" id="reset" value="Reset">
</td></tr>
</table>
</form>
<?php
ob_end_flush();
?>
<p></p>
<p></p>
<span class="span4">
<?php
include("pages/gudang/satuandasarview.php");
?>
</span>
<?php
if(isset($_GET['act']))
{
	$rs=mysql_query("insert into satuan_dasar (ids,satuan) values ('','".$_POST['satuan']."')") or die(mysql_error());
	if($rs)
	{		
		echo "<script>window.location='?cat=gudang&page=satuandasarview'</script>";
	}
}
?>

<?php
if(isset($_GET['del']))
{
	$ids=$_GET['id'];
	$ff=mysql_query("Delete from satuan_dasar Where sha1(ids)='".$ids."'");
	if($ff)
	{
		echo "<script>window.location='?cat=gudang&page=satuandasarview'</script>";
	}
}
?>
