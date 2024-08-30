<?php
ini_set("display_errors", 1);
include "config/config.php";

$app = new SwitchboardController();
$app->route();
