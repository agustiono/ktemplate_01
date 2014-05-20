<?php 
ob_start(); 
include "_class.admin.inc.php";
?>

<form name="form1" method="post" action="?cat=administrator&page=user&act=1">
  <label>Username</label>
      <input type="text" name="username" id="username">
      <label>Password</label>
      <input type="text" name="password" id="password">
      <label>Jenis Login</label>
     <select name="jenis" id="jenis">
        <option value="gudang">Bagian Gudang</option>
        <option value="sekretaris">Sekretaris</option>
        <option value="pimpinan">Pimpinan</option>
      </select>
      <p></p>
      <input type="submit" class="btn btn-primary" name="button" id="button" value="Daftar">&nbsp;&nbsp;<input type="reset" class="btn btn-danger" name="reset" id="reset" value="Reset">
</form>
<?php ob_end_flush(); ?>
<p></p>
<p></p>
<span class="span8">
<!-- <table width="90%" border="1" cellspacing="0" cellpadding="0" class="table table-striped"> -->
<table width="90%" border="1" cellspacing="0" cellpadding="0"> 
  <tr border="1">
    <td>Username</td>
    <td>Jenis Login</td>   
    <td>&nbsp;</td>
  </tr>
  <?php
  try {
    $db = new PDO($dbcon, $dbusr, $dbpas);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    echo "<tr>";
    $rw = sprintf("SELECT * FROM k_userlogin");
    $result = $db->prepare($rw);
    $result->execute();
    for($i=0; $row = $result->fetch(); $i++){
      echo "<td>".$row['userlogin']."</td>";
      echo "<td>".$row['userpass']."</td>";
      echo '<td><a href="?cat=administrator&page=useredit&id='.sha1($row['id']).'">Edit</a> - <a href="?cat=administrator&page=user&del=1&id='.sha1($row['id']).'">Hapus</a></td>';
    }
    echo "</tr>";
  }
  catch(PDOException $e) { echo $e->getMessage(); }
  ?>
</table>
</span>
<?php
if(isset($_GET['act']))
{
	try {
    $dbact = new PDO($dbcon, $dbusr, $dbpas);
    $dbact->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $qryact = "INSERT INTO k_userlogin ('userlogin','userpass','userhash','userlevel','userpage','userlastlog','status') VALUES (:userlogin,:userpass,:userhash,:userlevel,:userpage,:userlastlog,:status)";
    $rstact = $dbact->prepare($qryact);
    $rstact->bindParam(':userlogin',$userlogin);
    $rstact->bindParam(':userpass',md5($userpass));
    $rstact->bindParam(':userhash',$userhash);
    $rstact->bindParam(':userlevel',$userlevel);
    $rstact->bindParam(':userpage',$userpage);
    $rstact->bindParam(':userlastlog',$userlastlog);
    $rstact->bindParam(':status',$status);
      $userlogin = (empty($_REQUEST['userlogin']))?"-":$_REQUEST['userlogin'];
      $userpass = (empty($_REQUEST['userpass']))?"-":$_REQUEST['userpass'];
      $userhash = (empty($_REQUEST['userhash']))?"-":$_REQUEST['userhash'];
      $userlevel = (empty($_REQUEST['userlevel']))?"-":$_REQUEST['userlevel'];
      $userpage = (empty($_REQUEST['userpage']))?"-":$_REQUEST['userpage'];
      $userlastlog = (empty($_REQUEST['userlastlog']))?"-":$_REQUEST['userlastlog'];
      $status = (empty($_REQUEST['status']))?"-":$_REQUEST['status'];
    $rstact->execute();
  }
  catch(PDOException $e) { echo $e->getMessage(); }
  echo "<script>window.location='?cat=administrator&page=user'</script>";
  exit();
}

if(isset($_GET['del']))
{
  if (empty($_REQUEST['id'])) { header('location: .');  }
  try {
    $dbdel = new PDO($dbcon,$dbusr,$dbpas);
    $dbdel->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $qrydel = "DELETE FROM k_userlogin WHERE sha1(id)='".$_REQUEST['id']."'";
    $rstdel = $dbdel->prepare($qrydel);
    $rstdel->execute();
  }
  catch(PDOException $e) { echo $e->getMessage();}
  echo "<script>window.location='?cat=administrator&page=user'</script>";
  exit();  
} 
?>
