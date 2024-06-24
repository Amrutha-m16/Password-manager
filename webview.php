<?php 

    include("auth_session.php");
    include_once('functions.php');
    require_once("bankconnection.php");
    $query = " select * from websitedetails ";
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
        <a class="nav-link dropdown-toggle" href="Allentries.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
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
                                <td> Website ID </td>
                                <td> Website Address </td>
                                <td> Website Name </td>
                                <td> Website Login</td>
                                <td> Website Password</td>
                                <td> Edit  </td>
                                <td> Delete </td>
                            </tr>

                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $WebsiteID = $row['Web_ID'];
                                        $WebsiteAddress = $row['Web_Address'];
                                        $WebsiteName = $row['Web_Name'];
                                        $UserLogin = $row['Web_Login'];
                                        $Password = $row['Web_Password'];

                                        $WebsiteAddressdecrypted=decryptthis($WebsiteAddress, $key);
                                        $WebsiteNamedecrypted=decryptthis($WebsiteName, $key);
                                        $UserLogindecrypted=decryptthis($UserLogin, $key);
                                        $Passworddecrypted=decryptthis($Password, $key);
                                    
                            ?>
                                    <tr>
                                        <td><?php echo $WebsiteID ?></td>
                                        <td><?php echo $WebsiteAddressdecrypted ?></td>
                                        <td><?php echo $WebsiteNamedecrypted ?></td>
                                        <td><?php echo $UserLogindecrypted ?></td>
                                        <td><?php echo $Passworddecrypted ?></td>
                                        <td><a href="webedit.php?GetID=<?php echo $WebsiteID ?>">Edit</a></td>
                                        <td><a href="webdelete.php?Del=<?php echo $WebsiteID ?>">Delete</a></td>
                                    </tr>        
                            <?php 
                                    }  
                            ?>                                                                    
                                   

                        </table>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>