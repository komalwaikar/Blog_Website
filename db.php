<?php

global $connection;

$connection= mysqli_connect("localhost","root","","myblog");

if($connection)
{
    // echo 'success';
}
else
{
    echo 'error';
}

?>