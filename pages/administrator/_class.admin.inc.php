<?php
/*
-- library class admin --
created by aan.agustiono
*/


try {
    $db = new PDO($dbcon,$dbusr,$dbpas);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
	if (isset($_REQUEST['act'])) {
      if (empty($_REQUEST['userlogin']) OR empty($_REQUEST['userpass']) OR empty($_REQUEST['userhash']) OR empty($_REQUEST['userlevel']) OR empty($_REQUEST['userpage']) OR empty($_REQUEST['userlastlog']) OR empty($_REQUEST['status']) ) {
      		header('location: .');
      		exit();
      }
      
	}


	if (isset($_REQUEST['del'])) {
  	
		echo "<script>window.location='?cat=administrator&page=user'</script>";
  		exit();
	}
}
catch(PDOException $e) { echo $e->getMessage();}

?>