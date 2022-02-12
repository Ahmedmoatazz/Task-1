<?php

$_SESSION['KEY'] = "VALUE";



   if(isset($_COOKIE['blogInfo']) && isset($_COOKIE['blogID'])){
    echo  $_COOKIE['blogInfo'];
  echo  $_COOKIE['blogID'];
}else{
   setcookie("blogInfo","Root Account",time()+86400,'/');  
  setcookie("blogID",20130299,time()+86400,'/'); 
  
 }


   $data =   implode('||',['title' => "content" , "image" => 20]);

         setcookie("blogID",'',time()-86400,'/'); 


        print_r(explode('||',$_COOKIE['blogID']));
     echo $_COOKIE['blogID'];







$file =   fopen('info.txt',"a")   or  die("Unable to open File");

     $text = "\n";
     fwrite($file,$text);


     $text = "\n";
     fwrite($file,$text);

    fclose($file);
   

    echo  fread($file,filesize('info.txt'));
    
      while(!feof($file)){
    
    echo fgets($file).'<br>';
     echo fgetc($file).'<br>';
     }
    fclose($file)

    title   [required|leng : 5 ch ]
    content [required|leng : 50 ch , 50ch  ]
    image   [required]



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>blog module</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<div class="modal" tabindex="-1">
  
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    
  </div>
</div>
<form action="upload.php" method="post" enctype="multipart/form-data">


</body>

</html>