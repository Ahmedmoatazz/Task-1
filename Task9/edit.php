<?php
require 'dbConnection.php';
require 'student.php';


$id = $_GET['id'];

$sql = "select * from student where id = $id";
$op = mysqli_query($con, $sql);


if (mysqli_num_rows($op) == 1) {

    
    // code .....
    $Blog = mysqli_fetch_assoc($op);

      if(!(($_SESSION['User']['id'] == $Blog['added_by']))){
        header('Location: create.php');
        exit();

      }
} else {
    $_SESSION['Message'] = ['Message' => 'Invalid Id'];
    header('Location: create.php');
    exit();
}


$CatOp = mysqli_query($con, $sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>blog</h2>
        <form action="edit.php?id=<?php echo $Blog['id']; ?>" method="post" enctype="multipart/form-data">

        <form action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleInputName">Title</label>
                <input type="text" class="form-control"  id="exampleInputName" aria-describedby="" name="title" placeholder="Enter title">

                <?php echo $Blog['title']; ?>">
            </div>



            <div class="form-group">
                <label for="exampleInputEmail">content</label>
                <input type="text" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp" name="content" placeholder="Enter content">
               
                <?php echo $Blog['content']; ?>
            </div>


            <div class="form-group">
                <label for="exampleInputPassword">image</label>
                <input type="file" class="form-control"  id="exampleInputPassword1" name="image" placeholder="upload image">
               
                <img src="./uploads/<?php echo $Blog['image']; ?>" alt="" height="50px" width="50px"> <br>
            </div>



            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>


</body>

</html  
        
                


    
                