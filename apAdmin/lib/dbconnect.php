<?php
class dbconnect
{
    function connect()
    {
        $conn= mysqli_connect('localhost','root', '', 'Company_Main');

				return $conn;
    }
}
?>