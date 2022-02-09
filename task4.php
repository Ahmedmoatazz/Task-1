<?php


if(empty($name)){
    $errors['name'] = "Field Required"; 
    filter_var($name
        FILTER_SANTIZE_STRING);
echo htmlspecialchars($name) ;
}

if(empty($email)){
    $errors['email'] = "Field Required";
}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
   $errors['Email']   = "Invalid Email";

   filter_var($email
        FILTER_SANTIZE_STRING);
echo htmlspecialchars($email) ;
}
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

  if(empty($gender)){
    $errors['gender'] = "Field Required"; 
  }

  $url=  filter_var($url,FILTER_SANITIZE_URL);



  
  if (!empty($_FILES['image']['name'])) {

    $imgName  = $_FILES['image']['name'];
    $imgTemp  = $_FILES['image']['tmp_name'];
    $imgType  = $_FILES['image']['type'];   //size 

    $nameArray =  explode('.', $imgName);
    $imgExtension =  strtolower(end($nameArray));

    $imgFinalName = time() . rand() . '.' . $imgExtension;



    $allowedExt = ['png', 'jpg'];

    if (in_array($imgExtension, $allowedExt)) {
        //  code .....  

        $disPath = 'uploads/' . $imgFinalName;

        if (move_uploaded_file($imgTemp, $disPath)) {
            echo 'File Uploaded';
        } else {
            echo 'Error In Uploading Try Again';
        }
    } else {
        echo 'InValid Extension';
    }
} else {

    echo ' * Image Required';
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
                <input type="text" class="form-control" id="exampleInputadderss" aria-describedby="address" name="address" placeholder="Enter address">
            </div>

            <div class="form-group">
                <label for="exampleInputurl"> linkedin url</label>
                <input type="text" class="form-control" id="exampleInputadderss" aria-describedby="url" name="linkedin url" placeholder="Enter linkedin url">
            </div>

            <div class="form-group">
                <label for="exampleInputgender"> linkedin url</label>
                <input type="text" class="form-control" id="exampleInputgender" aria-describedby="gender" name="gender" placeholder="Enter gender">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <br>


    <div class="container">
        <h2>Upload File</h2>

        <form action="<?php echo   htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
   



</body>



</html>