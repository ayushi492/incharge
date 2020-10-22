<?php
	session_destroy();
	unset($_SESSION['incharge_admin']);
	echo "<script>window.location.href = 'login.php',true</script>";
?>

