<?php

include("auth_session.php");
include_once('functions.php');
require_once("bankconnection.php");

if(isset($_POST['submit']))
{
    if(empty($_POST['websiteaddress']) || empty($_POST['websitename']) || empty($_POST['userlogin']) || empty($_POST['password']))
    {
        echo '<script type="text/javascript">alert("Please Fill in the Blanks")</script>';
    }
    else
    {
        $WebsiteAddress = $_POST['websiteaddress'];
        $WebsiteName = $_POST['websitename'];
        $UserLogin = $_POST['userlogin'];
        $Password = $_POST['password'];

        //ENCRYPTION PROCESS
        $WebsiteAddressencrypted=encryptthis($WebsiteAddress, $key);
        $WebsiteNameencrypted=encryptthis($WebsiteName, $key);
        $UserLoginencrypted=encryptthis($UserLogin, $key);
        $Passwordencrypted=encryptthis($Password, $key);




        $query = "insert into websitedetails (Web_Address, Web_Name, Web_Login, Web_Password) values('$WebsiteAddressencrypted','$WebsiteNameencrypted','$UserLoginencrypted','$Passwordencrypted')";
        $result = mysqli_query($con,$query);

        if($result)
        {
            header("location:Website card.php");
        }
        else
        {
            echo '<script type="text/javascript">alert("Please Check Your Query")</script>';
        }
    }

}
else
{
    header("location:Website card.php");
}
 

?>