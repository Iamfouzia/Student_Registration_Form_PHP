<?php
session_start();

$_SESSION["username"]="Fozia";
$_SESSION["depart"]="CS";

echo $_SESSION["username"];
echo $_SESSION["depart"];

session_unset();
?>
