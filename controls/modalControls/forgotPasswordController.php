<?php

include '../../db.php';
include '../../header.php';
include '../../footer.php';

$name = $_POST['fieldModalName'];
$pass = md5($_POST['fieldModalPassword']);

$sql = " UPDATE usuarios SET senha = '$pass' WHERE nome = '$name' ";

if($connection->query($sql) == 1){
    mysqli_close($connection);
    echo "<script>location.href='../../index.php?msg=1';</script>";
}else{
    echo "<script>M.toast({html: 'ERRO'}); </script>";
}

