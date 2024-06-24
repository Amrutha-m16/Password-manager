<?php 

include("auth_session.php");
include_once("functions.php");
require_once("bankconnection.php");

if(isset($_POST['update']))
{
    $WebsiteID = $_GET['ID']; 
    $WebsiteAddress = $_POST['websiteaddress'];
    $WebsiteName = $_POST['websitename'];
    $UserLogin = $_POST['userlogin'];
    $Password = $_POST['password'];

    //Encryption process
    $WebsiteAddressencrypted=encryptthis($WebsiteAddress, $key);
    $WebsiteNameencrypted=encryptthis($WebsiteName, $key);
    $UserLoginencrypted=encryptthis($UserLogin, $key);
    $Passwordencrypted=encryptthis($Password, $key);

    $query = " update websitedetails set Web_Address = '".$WebsiteAddressencrypted."', Web_Name = '".$WebsiteNameencrypted."', Web_Login = '".$UserLoginencrypted."', Web_Password = '".$Passwordencrypted."' where Web_ID='".$WebsiteID."'";
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