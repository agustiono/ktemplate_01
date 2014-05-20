<style>
.pagin {
padding: 10px 0;
font:bold 11px/30px arial, serif;
}
.pagin * {
padding: 2px 6px;
color:#0A7EC5;
margin: 2px;
border-radius:3px;
}
.pagin a {
		border:solid 1px #8DC5E6;
		text-decoration:none;
		background:#F8FCFF;
		padding:6px 7px 5px;
}

.pagin span, a:hover, .pagin a:active,.pagin span.current {
		color:#FFFFFF;
		background:-moz-linear-gradient(top,#B4F6FF 1px,#63D0FE 1px,#58B0E7);
		    
}
.pagin span,.current{
	padding:8px 7px 7px;
}
.content{
	padding:10px;
	font:bold 12px/30px gegoria,arial,serif;
	border:1px dashed #0686A1;
	border-radius:5px;
	background:-moz-linear-gradient(top,#E2EEF0 1px,#CDE5EA 1px,#E2EEF0);
	margin-bottom:10px;
	text-align:left;
	line-height:20px;
}
.outer_div{
	margin:auto;
	width:600px;
}
#loader{
	position: absolute;
	text-align: center;
	top: 75px;
	width: 100%;
	display:none;
}

</style>
<h2>Data Barang</h2>
<?php 
	/* Koneksi database*/
	include 'pages/web/paging.php'; //include pagination file
		if (empty($_POST['q'])) {
		$querycount="SELECT COUNT(satuan_dasar.ids) AS numrows FROM satuan_dasar";
		$queryselect="SELECT * FROM satuan_dasar ORDER BY ids DESC LIMIT";
	}
	else {
		$querycount="SELECT COUNT(satuan_dasar.ids) AS numrows FROM satuan_dasar WHERE 
			satuan LIKE '%".$_POST['q']."%'";
		$queryselect="SELECT * FROM satuan_dasar WHERE 
			satuan LIKE '%".$_POST['q']."%' 
			ORDER BY ids DESC LIMIT";	
	}

	//pagination variables
	$hal = (isset($_REQUEST['hal']) && !empty($_REQUEST['hal']))?$_REQUEST['hal']:1;
	$per_hal = 5; //berapa banyak blok
	$adjacents  = 5;
	$offset = ($hal - 1) * $per_hal;
	$reload="?cat=gudang&page=satuandasarview";
	//Cari berapa banyak jumlah data*/
	
	$count_query   = mysql_query($querycount);
	if($count_query === FALSE) {    die(mysql_error());  }
	$row     = mysql_fetch_array($count_query);
	$numrows = $row['numrows']; //dapatkan jumlah data
	
	$total_hals = ceil($numrows/$per_hal);

	
	//jalankan query menampilkan data per blok $offset dan $per_hal
	$query = mysql_query($queryselect." $offset,$per_hal");

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="responsive table table-striped table-bordered">
<thead>
  <tr>
    <td colspan="3" align="right" class="no_sort">
		<form action="?cat=gudang&page=satuandasarview" method="POST"> 
			<center> <input type="text" name="q" id="q" value=""> <input type="submit" class="btn btn-primary" name="button" id="button" value="Search"></center>
		</form>
      </td>
    </tr>
  <tr>
    <td width="10%">No</td>
    <td>Satuan</td>  
    <td width="15%"><a href="?cat=gudang&page=satuandasartambah">Tambah Data</a></td>
    </tr>
  </thead>
<?php
$no = "0";
while($result = mysql_fetch_array($query)){
?>
<tr >
    <td><?php $no++; echo $no; ?></td>
    <td><?php echo $result['satuan']; ?></td> 
    
    <td><a href="?cat=gudang&page=satuandasaredit&id=<?php echo sha1($result['ids']); ?>">Edit</a> - <a href="?cat=gudang&page=satuandasartambah&del=1&id=<?php echo sha1($result['ids']); ?>">Hapus</a></td>   
  </tr>
<?php
}
?>
</table>
<?php
echo paginate($reload, $hal, $total_hals, $adjacents);
?>

