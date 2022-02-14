<?php


require 'dbConnection.php';
require 'helpers.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $title   = Clean($_POST['title']);
    $content = Clean($_POST['content']);
    $data  = Clean($_POST['data']);
    $image  = Clean($_POST['image']);


   

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

      

        $sql = "insert into blogdb (title,content,data) values ('$title','$content','$data')";

        $op  =  mysqli_query($con,$sql);

        mysqli_close($con);

        if($op){
            echo 'Raw Inserted';
        }else{
            echo 'Error Try Again '.mysqli_error($con);
        }


    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blog </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Blog</h2>

        <form action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

            <div class="form-group">
                <label for="exampleInputName">Title</label>
                <input type="text" class="form-control" required id="exampleInputName" aria-describedby="" name="title" placeholder="Enter title">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail">content</label>
                <input type="text" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp" name="content" placeholder="Enter content">
            </div>

          

            <div class="form-group">
                <label for="data">data</label>
                <input type="data" class="form-control"  required id="data"  name="data" placeholder="enter data">

                <input type="date" name="set date"> <input type="submit" value="Send data">

            </div>

           

            

            <label for="img">Select image:</label>
                <input type="file" id="img" name="img" >
  



            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>


</body>

</html>