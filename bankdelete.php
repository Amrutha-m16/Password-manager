<?php
    include("auth_session.php");
    require_once("bankconnection.php");

    if(isset($_GET['Del']))
    {
       $BankID = $_GET['Del'];
       $query = " delete from bankdetails where Bank_ID = '".$BankID."'";
       $result = mysqli_query($con,$query);
       
        if($result)
        {
            header("location:bankview.php");
        }
        else
        {
            echo ' Please Check Your Query';
        }
    }
    else
    {
        header("location:bankview.php");
    }

?>