<?php
ini_set("SMTP", "brahmininavya@gmail.com");
ini_set("smtp_port", "587");
 $name= $_POST['name'];
 $email= $_POST['email'];
 $phone= $_POST['phone'];
 $Website= $_POST['Website'];
 $message= $_POST['message'];
 if(!empty($email) && !empty($message)){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        $reciever = "brahmininavya@gmail.com";
        $subject = "From: $name <$email>";
        $body = "Name:  $name\n  $email \n $phone\n  $Website\n message:\n $message \n regards,\n$name ";
        $sender = "From: $email";
        if(mail($reciever,$subject, $body,$sender)){
            echo"your message has been sent";
        }
        else{
            echo"sorry the msg failes";
        }
    }
    else{
        echo"enter a validate email";
    }
 }
 else{
    echo"please fill the required fields";
 }
?>