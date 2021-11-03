<?php
include("database.php");
 
    if(!empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['pass']))
    { 
        $email=$_POST['email'];
        $name=$_POST['name'];
        $pass=$_POST['pass'];
        if(mysqli_query($conn,"insert into register1(email,name,password) values('$email','$name','$pass')"))
         {
            echo "1";
         }
         else
         echo "0";
    }
  
    
    //Login
    if(!empty($_POST['email1']) && !empty($_POST['pass1']))
    { 
        $email=$_POST['email1'];
        $pass=$_POST['pass1'];
        $sel=mysqli_query($conn,"select * from register1 where email='$email'");
        if($sel)
        {
            $arr=mysqli_fetch_assoc($sel);
            if($pass==$arr['password'])
            echo "1";
            else
            echo "2";
        }
        else
        echo "0";
    }

?>