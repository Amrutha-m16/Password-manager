<?php

include("auth_session.php");
include_once('functions.php');
require_once("bankconnection.php");
$WebsiteID = $_GET['GetID'];
$query = " select * from websitedetails where Web_ID='".$WebsiteID."'";
$result = mysqli_query($con,$query);

while($row=mysqli_fetch_assoc($result))
{
    $WebsiteID = $row['Web_ID'];
    $WebsiteAddress = $row['Web_Address'];
    $WebsiteName = $row['Web_Name'];
    $UserLogin = $row['Web_Login'];
    $Password = $row['Web_Password'];

    //DECRYPTION PROCESS
    $WebsiteAddressdecrypted=decryptthis($WebsiteAddress, $key);
    $WebsiteNamedecrypted=decryptthis($WebsiteName, $key);
    $UserLogindecrypted=decryptthis($UserLogin, $key);
    $Passworddecrypted=decryptthis($Password, $key);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="newform.css">
</head>
<body bgcolor="#a6a6a6">

    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
          <i class="fas fa-bars"></i>
        </label>
        <label class="logo"><i>AllSafe</i></label>
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="#" class="active">Vault</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </nav>
  
  <!-- side nav bar-->
  
      <div class="sidebar">
        <h1>Brand</h1>
        <a href="allentries.php">All Entries</a>
        <a href="#" class="active">Websites</a>
        <a href="Bankcard.html">Bank Cards</a>

     </div>

    <!-- navbar -->

    <div class="container">
        <form action="webupdate.php" method="POST">
          <div class="row">
            <div class="col-25">
              <label for="fname">Website Address</label>
            </div>
            <div class="col-75">
              <input type="text" id="" name="Websiteaddress" value="" placeholder="www.address.com">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="lname">Website Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="" name="websitename" value="" placeholder="my website name">
            </div>
          </div>
          <br>
          <hr>
          <br>
          <h2>LOGIN:</h2>
          <div class="row">
            <div class="col-25">
              <label for="Login">Username</label>
            </div>
            <div class="col-75">
                <input type="text" id="" name="userlogin" value="" placeholder="Login">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="Password">Password</label>
            </div>
            <div class="col-75">
                <input type="password" name="password" id="" value="" placeholder="password">
            </div>
          </div>
          <div class="row">
            <input type="submit" name="update" value="update">
          </div>
        </form>
        
       

      
      </div>
      
    
</body>
</html>