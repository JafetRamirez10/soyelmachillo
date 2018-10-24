<?php 
 session_start();
session_destroy();
echo '<script> location.href="admin.php?cerrar=true"</script>';

 ?>