<?php

session_start();

unset($_SESSION['login']);
unset($_SESSION['name']);
unset($_SESSION['id']);

header('location: ../index.php');