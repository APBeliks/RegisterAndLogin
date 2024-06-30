<?php

require_once "SessionConfig.php";
echo "DUPA";
session_start();
session_unset();
session_destroy();

header("Location: ../index.php");
