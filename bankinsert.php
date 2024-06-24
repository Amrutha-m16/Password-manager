<?php

include("auth_session.php");
include_once('functions.php');
require_once("bankconnection.php");

if(isset($_POST['submit']))
{
    if(empty($_POST['bankname']) || empty($_POST['bankcardnum']) || empty($_POST['date']) || empty($_POST['cardholder']) || empty($_POST['cvv']) || empty($_POST['cardtype']) || empty($_POST['pin']))
    {
        echo '<script type="text/javascript">alert("Please Fill in the Blanks")</script>';
    }
    else
    {
        //POST Variables
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


        $query = "insert into bankdetails (Bank_Name, Bank_CardNum, Bank_ValidThru, Bank_CardHolder, Bank_Cvv, Bank_CardType, Bank_Pin) values('$BankNameencrypted','$BankCardNumencrypted','$Dateencrypted','$CardHolderencrypted','$Cvvencrypted','$CardTypeencrypted','$Pinencrypted')";
        $result = mysqli_query($con,$query);

        if($result)
        {
            header("location:bankcard.php");
        }
        else
        {
            echo '<script type="text/javascript">alert("Please Check Your Query")</script>';
        }
    }

}
else
{
    header("location:bankcard.php");
}
 

?>