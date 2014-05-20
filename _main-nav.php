<!--NAVIGASI MENU UTAMA-->
<div class="leftmenu">
  <ul class="nav nav-tabs nav-stacked">
    <li class="active"><a href="dashboard.php"><span class="icon-align-justify"></span> Dashboard</a></li>
    
    <!--MENU ADMIN-->
    <?php
     if($_SESSION['login_hash']=="administrator") {
      echo '
        <li class="dropdown"><a href="#"><span class="icon-pencil"></span> System</a>
          <ul>       
            <li><a href="?cat=administrator&page=user">User Management</a></li>         
          </ul>
        </li>
      ';
    
    /*  <!--MENU USERSATU-->  */    
     } elseif(($_SESSION["login_hash"])=="usersatu")  {
       echo '
        <li class="dropdown"><a href="#"><span class="icon-pencil"></span> data satu</a>
          <ul>
            <li><a href="?cat=gudang&page=monthreporting">sub data satu</a></li>       
          </ul>
        </li>

       ';

    /*  <!--MENU USERDUA-->  */
     } elseif ($_SESSION['login_hash']=="userdua") {
       echo '
        <li class="dropdown"><a href="#"><span class="icon-pencil"></span> Laporan</a>
          <ul>
            <li><a href="?cat=gudang&page=monthreporting">Laporan Masuk dan Keluar</a></li>       
          </ul>
        </li>
       ';
     }
    ?>
   </li> 
  </ul>
</div>
<!--leftmenu-->

</div>
<!--mainleft--> 
<!-- END OF LEFT PANEL -->