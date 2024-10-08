<?php
$host="localhost";
$user="root";
$password="";
$db="data1";
$conn=mysqli_connect($host,$user,$password,$db);
if(!$conn)
{
    echo "connection failed";
}
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $contactno=$_POST['contactno'];
    $message=$_POST['message'];
    $sql="INSERT INTO `register`(`name`, `email`, `contanctnumber`, `message`) VALUES ('$name','$email','$contactno','$message')";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        echo "Message sent.";
    }
    else{
        echo "error occured";
    }
}
?>