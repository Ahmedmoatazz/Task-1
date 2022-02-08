<?php


if(empty($name)){
    $errors['name'] = "Field Required"; 
}

if(empty($email)){
    $errors['email'] = "Field Required";
}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
   $errors['Email']   = "Invalid Email";
}

   if(empty($password)){
    $errors['password'] = "Field Required";
}elseif(strlen($password) < 6){
    $errors['Password'] = "Length Must be >= 6 chars";
}


if(empty($address)){
    $errors['address'] = "Field Required";
}elseif(strlen($address) < 10){
    $errors['address'] = "Length Must be >= 10 chars";
}

if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

 <div class="container">
        <h2>Register</h2>
      
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"  >

     <div class="form-group">
      <label for="exampleInputName">Name</label>
        <input type="text" class="form-control" id="exampleInputName" aria-describedby=""   name="name" placeholder="Enter Name">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">New Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1"   name="password" placeholder="Password">
            </div>

            <div class="form-group">
                <label for="exampleInputadderss"> address</label>
                <input type="text" class="form-control" id="exampleInputadderss" aria-describedby="emailHelp" name="address" placeholder="Enter address">
            </div>

            <div class="form-group">
                <label for="exampleInputadderss"> linkedin url</label>
                <input type="text" class="form-control" id="exampleInputadderss" aria-describedby="emailHelp" name="linkedin url" placeholder="Enter linkedin url">
            </div>

            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <br>


   



</body>



</html>