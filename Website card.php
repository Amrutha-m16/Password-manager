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
          <li><a href="home.html">Home</a></li>
          <li><a href="#" class="active">Vault</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </nav>
  
  <!-- side nav bar-->
  
      <div class="sidebar">
        <h1>VAULT</h1>
        <a href="allentries.php">All Entries</a>
        <a href="#" class="active">Websites</a>
        <a href="Bankcard.php">Bank Cards</a>
        
    
     </div>

    <!-- navbar -->

    <div class="container">
        <form action="webinsert.php" method="POST">
          <div class="row">
            <div class="col-25">
              <label for="fname">Website Address</label>
            </div>
            <div class="col-75">
              <input type="text" id="" name="websiteaddress" value="" placeholder="www.address.com">
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
                <input type="text" id="" name="userlogin" value="" placeholder="Login" required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="Password">Password</label>
            </div>
            <div class="col-75">
                <input type="password" name="password" id="" value="" placeholder="password" required>
            </div>
          </div>
          <div class="row">
            <input type="submit" name="submit" value="Submit">
          </div>
          <div class="row">
              <input type="reset" name='reset' value="reset">
          </div>
        </form>
        
       

      
      </div>
      
    
</body>
</html>