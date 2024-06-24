<?php 

    include("auth_session.php");
    include_once('functions.php');
    require_once("bankconnection.php");
    $query = " select * from bankdetails ";
    $result = mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="bootstrap.css"/>
    <title>View Records</title>
</head>
<body class="bg-dark">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">AllSafe</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="allentries.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          VAULT
        </a>
        <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="allentries.php">All Entries</a>
          <a class="dropdown-item" href="bankcard.php">Bank Card</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Website Card</a>
        </div>
      </li>
      
    </ul>
    
  </div>
</nav>

        <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                        <table class="table table-bordered">
                            <tr>
                                <td> Bank ID </td>
                                <td> Bank Name </td>
                                <td> Bank Card Number</td>
                                <td> Valid Thru</td>
                                <td> Card Holder Name</td>
                                <td> CVV</td>
                                <td> Card Type</td>
                                <td> PIN</td>
                                <td> Edit  </td>
                                <td> Delete </td>
                            </tr>

                            
                            <?php 
                                    
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
        
                                    
                            ?>
                                    <tr>
                                        <td><?php echo $BankID ?></td>
                                        <td><?php echo $BankNamedecrypted ?></td>
                                        <td><?php echo $BankCardNumdecrypted ?></td>
                                        <td><?php echo $Datedecrypted ?></td>
                                        <td><?php echo $CardHolderdecrypted ?></td>
                                        <td><?php echo $Cvvdecrypted ?></td>
                                        <td><?php echo $CardTypedecrypted ?></td>
                                        <td><?php echo $Pindecrypted ?></td>
                                        <td><a href="bankedit.php?GetID=<?php echo $BankID ?>">Edit</a></td>
                                        <td><a href="bankdelete.php?Del=<?php echo $BankID ?>">Delete</a></td>
                                    </tr>        
                            <?php 
                                    }  
                            ?>                                                                    
                                   

                        </table>

                        
                    </div>
                </div>
            </div>
        </div>
        <center><a href="allentries.php"><button type="button" class="btn btn-primary"><i class="fas fa-arrow-left"></i>ALL ENTRIES</button></center>

    
</body>
</html>