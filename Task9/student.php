<?php 
session_start();

require 'validator.php';
require 'dbConnection.php';


class student{


    private $title;
    private $content;
    private $image; 
    private $result = null;

    public function blog($data){

     # Create Validator Obj .... 
     $validator = new Validator;

     $this->title   = $validator->Clean($data['title']); 
     $this->content = $validator->Clean($data['content']);
     $this->image = $validator->Clean($data['image']);   

     # Validate Inputs .... 
     $errors = [];

     # Validate title ..... 
     if(!$validator->validate($this->title,1)){
        $errors['title'] = "Field Required";
     }elseif(!$validator->validate($this->title,1)){
        $errors['title'] = "Invalid String";
     }

     # Validate content ..... 
     if(!$validator->validate($this->content,1)){
        $errors['content'] = "Field Required";
     }elseif(!$validator->validate($this->content,3)){
        $errors['content'] = "Invalid lenght";
     }

     #valdite image
    if(!$validator->validate($this->image,1)){
    $errors['image'] = "Field Required";
   }elseif(!$validator->validate($this->image,5)){
      $errors['image'] = "try again";
   }
    



     #  Check Errors ... 
     if(count($errors) > 0 ){

        $this->result = $errors;
    }else{
       // db OP 
       $dbObj = new DB;

      

       $sql = "insert into student (title,content,image) values ('$this->title','$this->content','$this->image')";
      
       $op = $dbObj->doQuery($sql); 
        
       if($op){
           $this->result = ["Success" => "data Inserted"];
       }else{
        $this->result = ["Error" => "Error Try Again"];
       }
    }

        return $this->result;
}


    public function showData(){

      # Create Db Obj .... 
      $dbObj = new DB;

      $sql = "select * from student"; 

      $result = $dbObj->doQuerySelect($sql);

      return $result;

    }


    public function remove($id){

      # Create Db Obj .... 
      $dbObj = new DB;

      $sql = "delete from student where id = $id"; 

      $this->result = $dbObj->doQuery($sql); 
        
        return $this->result; 

    }

    public function edit(){

    }

}


?>