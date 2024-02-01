<?php
session_unset();
session_destroy();
echo header("location:index.php");
?>