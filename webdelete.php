<?php
    include("auth_session.php");
    require_once("bankconnection.php");

    if(isset($_GET['Del']))
    {
       $WebID = $_GET['Del'];
       $query = " delete from websitedetails where Web_ID = '".$WebID."'";
       $result = mysqli_query($con,$query);
       
        if($result)
        {
            header("location:webview.php");
        }
        else
        {
            echo ' Please Check Your Query';
        }
    }
    else
    {
        header("location:webview.php");
    }

?>