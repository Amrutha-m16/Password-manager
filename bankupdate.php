<?php 
include("auth_session.php");
include_once("functions.php");
require_once("bankconnection.php");

if(isset($_POST['update']))
{
    $BankID = $_GET['ID']; 
    $BankName = $_POST['bankname'];
    $BankCardNum = $_POST['bankcardnum'];
    $Date = $_POST['date'];
    $CardHolder = $_POST['cardholder'];
    $Cvv = $_POST['cvv'];
    $CardType = $_POST['cardtype'];
    $Pin = $_POST['pin'];

    //THE ENCRYPTION PROCESS
    $BankNameencrypted=encryptthis($BankName, $key);
    $BankCardNumencrypted=encryptthis($BankCardNum, $key);
    $Dateencrypted=encryptthis($Date, $key);
    $CardHolderencrypted=encryptthis($CardHolder, $key);
    $Cvvencrypted=encryptthis($Cvv, $key);
    $CardTypeencrypted=encryptthis($CardType, $key);
    $Pinencrypted=encryptthis($Pin, $key);

    $query = " update bankdetails set Bank_Name = '".$BankNameencrypted."', Bank_CardNum = '".$BankCardNumencrypted."', Bank_ValidThru = '".$Dateencrypted."', Bank_CardHolder = '".$CardHolderencrypted."', Bank_Cvv = '".$Cvvencrypted."', Bank_Pin = '".$Pinencrypted."' where Bank_ID='".$BankID."'";
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