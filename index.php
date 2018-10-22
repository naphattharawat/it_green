<? session_start(); 
$admin = $_SESSION["admin"];
echo $admin; ?>
<? include('template/header.php') ?>
<? require_once "config/config.php";  ?>
<? if(isset($_GET['manualhci'])) { include('include/manualhci.php'); } ?>
<? if(isset($_GET['manual'])) { include('include/manual.php'); } ?>
<? if(isset($_GET['manualaruba'])) { include('include/manualaruba.php'); } ?>
<? if(isset($_GET['admin']) && $admin == 'admin') { include('include/admin.php'); } ?>
<? if(isset($_GET['admin']) && $admin != 'admin') { include('include/adminLogin.php'); } ?>
<? if(isset($_GET['addadmin'])) { include('include/addadmin.php'); } ?>
<? if(isset($_GET['addmanual'])) { include('include/addmanual.php'); } ?>
<? if(isset($_GET['logout'])) { include('include/logout.php'); } ?>
<? include('template/footer.php') ?>



