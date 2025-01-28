<?php include_once("dboperations.php");
$obj=new dboperations();
$username=$_POST["username"];
$password=$_POST["password"];
if($obj->loginAuth($username,$password)){
    if($_SESSION["USERTYPE"]=="staff"){
        header("Location: staffhome.php");
    }else
    if($_SESSION["USERTYPE"]=="admin"){
        header("Location: adminhome.php");
    }
}else {
    header("Location: login1.php");
}
?>