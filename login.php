<form id="loginform" action="index.php?login_attempt=1" method="post">
    <p class="animate4 bounceIn"><input type="text" id="username" name="username" placeholder="Username" /></p>
    <p class="animate5 bounceIn"><input type="password" id="password" name="password" placeholder="Password" /></p>
    <p class="animate6 bounceIn"><button class="btn btn-default btn-block">Masuk</button></p>
</form>
<?php
try {
$db = new PDO($dbcon, $dbusr, $dbpas);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

if(isset($_GET['login_attempt']))
	{
		if (empty($_POST['username'])) {
			header('location: .');
			echo "<h1>TEST NONGOL ATAU TIDAK</h1>";
			exit;
		} 
		$spf=sprintf("SELECT * FROM k_userlogin WHERE userlogin='%s' AND userpass='%s'",$_POST['username'],md5($_POST['password']));
		$result = $db->prepare($spf);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
			if($row['userlogin']==$_POST['username'] AND $row['userpass']==(md5 ($_POST['password'])))
				{
					$_SESSION['login_hash']=$row['userhash'];
					$_SESSION['login_user']=$row['userlogin'];
					echo "<script>window.location='dashboard.php'</script>";
				}
		}
	}
}
catch(PDOException $e) { echo $e->getMessage(); }
?>