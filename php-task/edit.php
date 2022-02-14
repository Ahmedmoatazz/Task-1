<?php

require 'dbConnection.php';
require 'helpers.php';


$id = $_GET['id'];

$sql = "select id,title,content,data from blogdb where id = $id";
$op  = mysqli_query($con,$sql);

$data= mysqli_fetch_assoc($op); 




if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $title   = Clean($_POST['title']);
    $content = Clean($_POST['content'], 1);
    $data  = Clean($_POST['data']);


   

    $errors = [];

   
    if (empty($title)) {
        $errors['title'] = "Field Required";
    }

    
    if (empty($content)) {
        $errors['content'] = "Field Required";
    }  elseif (strlen($content) < 50) {
        $errors['content'] = "Length Must be >= 50 chars";
    }

    if (empty($data)) {
        $errors['data'] = "Field Required";}

        if (empty($image)) {
            $errors['image'] = "Field Required";
        }

    if (count($errors) > 0) {
       
        foreach ($errors as $key => $value) {
           
            echo '* ' . $key . ' : ' . $value . '<br>';
        }
    } else {


 

        $sql = "update blogdb set title = '$title' , content= '$content' where  id = $id";

        $op  =  mysqli_query($con,$sql);


        if($op){

          $_SESSION['Message']  = 'Raw Updated'; 

          header("Location: index.php");
         


        }else{
            echo 'Error Try Again '.mysqli_error($con);
        }

        mysqli_close($con);

    }
}



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Edit Account</h2>

        <form action="edit.php?id=<?php echo $id;?>" method="post">

            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input type="text" class="form-control" required id="exampleInputName" aria-describedby="" name="name"  value= "<?php echo $data['name'];?>"  placeholder="Enter Name">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail">Email address</label>
                <input type="email" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value= "<?php echo $data['email'];?>" placeholder="Enter email">
            </div>

            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>


</body>

</html>