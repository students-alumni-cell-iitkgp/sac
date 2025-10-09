<?php
session_start();
session_destroy();
header("Location: login_aam.php");
exit;