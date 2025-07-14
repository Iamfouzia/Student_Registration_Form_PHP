<?php
session_start();

echo $_SESSION["username"];

echo $_SESSION["depart"];

session_unset();

?>
