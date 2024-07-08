<?php

require_once "SessionConfig.php";
session_start();
session_unset();
session_destroy();

header("Location: /");
