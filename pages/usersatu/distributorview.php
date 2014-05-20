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

.pagin span, .pagin a:hover, .pagin a:active,.pagin span.current {
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
<h2>Data Vendor</h2>
<?php 
	/* Koneksi database*/
	include 'pages/web/paging.php'; //include pagination file
	if (empty($_POST['q'])) {
		$querycount="SELECT COUNT(vendor_data.id) AS numrows FROM vendor_data";
		$queryselect="SELECT * FROM vendor_data ORDER BY ID DESC LIMIT";
	}
	else {
		$querycount="SELECT COUNT(vendor_data.id) AS numrows FROM vendor_data WHERE 
			nama_persh LIKE '%".$_POST['q']."%' OR  
			jns_brg LIKE '%".$_POST['q']."%' OR  
			alamat_persh LIKE '%".$_POST['q']."%' OR  
			cp_persh LIKE '%".$_POST['q']."%' OR  
			cp_ph LIKE '%".$_POST['q']."%'";
		$queryselect="SELECT * FROM vendor_data WHERE 
			nama_persh LIKE '%".$_POST['q']."%' OR  
			jns_brg LIKE '%".$_POST['q']."%' OR  
			alamat_persh LIKE '%".$_POST['q']."%' OR  
			cp_persh LIKE '%".$_POST['q']."%' OR  
			cp_ph LIKE '%".$_POST['q']."%' 
			ORDER BY id DESC LIMIT";	
	}
	//pagination variables
	$hal = (isset($_REQUEST['hal']) && !empty($_REQUEST['hal']))?$_REQUEST['hal']:1;
	$per_hal = 5; //berapa banyak blok
	$adjacents  = 5;
	$offset = ($hal - 1) * $per_hal;
	$reload="?cat=gudang&page=distributorview";
	//Cari berapa banyak jumlah data*/
	
	$count_query   = mysql_query($querycount);
	if($count_query === FALSE) { die(mysql_error()); }
	$row     = mysql_fetch_array($count_query);
	$numrows = $row['numrows']; //dapatkan jumlah data
	
	$total_hals = ceil($numrows/$per_hal);
	
	//jalankan query menampilkan data per blok $offset dan $per_hal
//	$query = mysql_query("SELECT * FROM vendor_data LIMIT $offset,$per_hal");
	$query = mysql_query($queryselect." $offset,$per_hal");

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="responsive table table-striped table-bordered">
<thead>
  <tr>
    <th colspan="7" align="center" class="no_sort">
		<form action="?cat=gudang&page=distributorview" method="POST"> 
			<center> <input type="text" name="q" id="q" value=""> <input type="submit" class="btn btn-primary" name="button" id="button" value="Search"></center>
		</form>
   </th>
    </tr>
  <tr>
    <th>Nama Vendor</th>
    <th><a href="?cat=gudang&page=distributortype">Tambah Data</a><br>Jenis Usaha</th>
    <th>Type</th>
    <th>Alamat</th> 
    <th>Contact</th>  
    <th>Phone</th>
    <th background="red"><a href="?cat=gudang&page=distributor">Tambah data</a></th>
    </tr>
  </thead>
<?php
while($result = mysql_fetch_array($query)){
?>
<tr >
    <td><a href="?cat=gudang&page=distributordetail&id=<?php echo sha1($result['id']); ?>"><?php echo $result['nama_persh']; ?></a></td>
    <td>
    	<?php 
    	$rdt=mysql_query("SELECT * FROM vendor_type WHERE id='".$result['type_persh']."'");
    	while ($dt2=mysql_fetch_array($rdt)) {
	    	echo $dt2['namatype'];     		
    	}
    	?>
    </td> 
    <td><?php echo $result['jns_brg']; ?></td> 
    <td><?php echo $result['alamat_persh']; ?></td> 
    <td><?php echo $result['cp_persh']; ?></td> 
    <td><?php echo $result['cp_ph']; ?></td> 
    
    <td><a href="?cat=gudang&page=distributoredit&id=<?php echo sha1($result['id']); ?>">Edit</a> - <a href="?cat=gudang&page=distributor&del=1&id=<?php echo sha1($result['id']); ?>">Hapus</a></td>   
  </tr>
<?php
}
?>
</table>
<?php
echo paginate($reload, $hal, $total_hals, $adjacents);
?>