<?php

include("auth_session.php");
include_once('functions.php');
require_once("bankconnection.php");
$BankID = $_GET['GetID'];
$query = " select * from bankdetails where Bank_ID='".$BankID."'";
$result = mysqli_query($con,$query);

while($row=mysqli_fetch_assoc($result))
{
    $BankID = $row['Bank_ID'];
    $BankName = $row['Bank_Name'];
    $BankCardNum = $row['Bank_CardNum'];
    $Date = $row['Bank_ValidThru'];
    $CardHolder = $row['Bank_CardHolder'];
    $Cvv = $row['Bank_Cvv'];
    $CardType = $row['Bank_CardType'];
    $Pin = $row['Bank_Pin'];

    //THE DECRYPTION PROCESS
    $BankNamedecrypted=decryptthis($BankName, $key);
    $BankCardNumdecrypted=decryptthis($BankCardNum, $key);
    $Datedecrypted=decryptthis($Date, $key);
    $CardHolderdecrypted=decryptthis($CardHolder, $key);
    $Cvvdecrypted=decryptthis($Cvv, $key);
    $CardTypedecrypted=decryptthis($CardType, $key);
    $Pindecrypted=decryptthis($Pin, $key);


}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Cards</title>
    <link rel="stylesheet" href="newform.css">
</head>
<body>

  <!-- Main NavBar  -->
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
          <i class="fas fa-bars"></i>
        </label>
        <label class="logo"><i>AllSafe</i></label>
        <ul>
          <li><a href="home.php">Home</a></li>
          <li ><a href="#" class="active">Vault</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </nav>
  <!-- Main NavBar Close  -->
  
  <!-- side nav bar-->
      <div class="sidebar">
        <h1>Brand</h1>
        <a href="allentries.php">All Entries</a>
        <a href="Website card.php">Websites</a>
        <a href="#" class="active">Bank Cards</a>
     
     </div>
<!-- side navbar close -->

<!-- Form Open -->
    <div class="container">
        <form action="bankupdate.php?ID=<?php echo $BankID ?>" method="POST">
          <div class="row">
            <div class="col-25">
              <label for="name">Bank Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="" name="bankname" value="<?php echo $BankNamedecrypted ?>" placeholder="Bank Name">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="name">Bank card number</label>
            </div>
            <div class="col-75">
              <input type="tel" id="" name="bankcardnum" value="" size="16" maxlength="16""<?php echo $BankCardNumdecrypted ?>" placeholder="Card number" pattern="[0-9]{16}" required>
            </div>
          </div>
        
          <div class="row">
            <div class="col-25">
              <label for="year">Valid Thru</label>
            </div>
            <div class="col-75">
                  <input type="month" id="" name="date" min="2020-01" value="<? echo $Datedecrypted ?>" placeholder="date">
                </div>

            <br><br><br>
            
            <div class="row">
                <div class="col-25">
                  <label for="name">Card Holder Name</label>
                </div>
                <div class="col-75">
                  <input type="text" id="" name="cardholder" value="<?php echo $CardHolderdecrypted ?>" placeholder="Card Holder">
                </div>
              </div>
            
              <div class="row">
                <div class="col-25">
                  <label for="CVV">CVV</label>
                </div>
                <div class="col-75">
                  <input type="password" name="cvv" value="" placeholder="CVV" size="3" maxlength="3" pattern="[0-9]{3}" required>
               
                </div>
              </div>
            
            <div class="row">
                <div class="col-25">
                  <label for="type">Card Type</label>
                </div>

            <div class="col-25">
                <select name="cardtype" value="<?php echo $CardTypedecrypted ?>" id="" placeholder="Card Type" required>
                    <option value="VISA">VISA</option>
                    <option value="Master card">MASTERCARD</option> 
                    <option value="RUPAY">RUPAY</option>
                </select>
            </div>

          </div>
        <br><br>

          <!-- Password field -->
          <label for="Passsword">PIN</label>
          <input type="password" name="pin" value="<?php echo $Pindecrypted ?>" id="myInput" size="6" maxlength="6" pattern="[0-9]{6}" required>
            <br><br>
            <!-- An element to toggle between passw0000ord visibility -->
            <input type="checkbox" onclick="myFunction()">Show Password
                
            <script>
            function myFunction() {
                var x = document.getElementById("myInput");
                if (x.type === "password") {
                  x.type = "text";
                } else {
                  x.type = "password";
                }
              }
            </script>

    

          <div class="row">
            <input type="submit" name="update" value="Update">
          </div>
        
      </form>

      

      </div>
  <!-- Form Close -->
    
</body>
</html>