<?php  

require 'dbConnection.php';

$sql = "select * from blogdb"; 

$data = mysqli_query($con,$sql);


?>



<!DOCTYPE html>
<html>

<head>
    <title> Blog CRUD </title>

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

   
    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

   
    <div class="container">


        <div class="page-header">
            <h1>Read Users </h1>
            <br>


          <?php 
          
            if(isset($_SESSION['Message'])){
                echo ' * '.$_SESSION['Message'];

                unset($_SESSION['Message']);
            }
          
          
          ?>



        </div>

        <a href="create.php">+ Account</a>

        <table class='table table-hover table-responsive table-bordered'>
            
            <tr>
                <th>ID</th>
                <th>title</th>
                <th>content</th>
                <th>data</th>
                <th>image</th>

                <th>action</th>
            </tr>

   <?php 
        while($result = mysqli_fetch_assoc($data)){


   ?>
            <tr>
                <td><?php  echo $result['title'];  ?></td>
                <td><?php  echo $result['content'];  ?></td>
                <td><?php  echo $result['data'];  ?></td>
                <td><?php  echo $result['image'];  ?></td>

                <td>
                    <a href='delete.php?id=<?php  echo $result['id'];  ?>' class='btn btn-danger m-r-1em'>Delete</a>
                    <a href='edit.php?id=<?php  echo $result['id'];  ?>' class='btn btn-primary m-r-1em'>Edit</a>
                </td>
            </tr>

<?php  } ?>
            
        </table>

    </div>
    

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    

</body>

</html>


<?php 
  
  mysqli_close($con);

?>