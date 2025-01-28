<?php
class DbOperations{
    var $con;
    function __construct()
    {
        $host="localhost";
        $dbname="qrcode";
        $username="root";
        $password="";
        try{
            $this->con=new PDO("mysql:host=$host;dbname=$dbname",$username,$password,array());
        }catch(Exception $e){
            echo "ERR ".$e->getMessage();
        }
    }
    function loginAuth($username,$password){
     $query="select id,name,usertype from tbl_login where username=:username and password=:password";
         $stmt=$this->con->prepare($query);
         $stmt->bindParam(":username",$username);
         $stmt->bindParam(":password",$password);
         $stmt->execute();
         if($stmt->rowCount()>0){
             return json_encode(array("status"=>true,"records"=>$stmt->fetch(PDO::FETCH_ASSOC)));
         }else{
             return json_encode(array("status"=>false,"msg"=>"Invalid Username Or Password"));
         }
     }




     function registerUser($name,$phone,$email,$username,$password){
        $usertype="student";
        $query="insert into tbl_login (name,phone,email,username,password,usertype)
        values(:name,:phone,:email,:username,:password,:usertype)";
        $stmt=$this->con->prepare($query);
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":phone",$phone);
        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":username",$username);
        $stmt->bindParam(":password",$password);
        $stmt->bindParam(":usertype",$usertype);
        $stmt->execute();
        if($stmt->rowCount()>0){
            return json_encode(array("status"=>true,"msg"=>"Register successful"));
        }else{
            return json_encode(array("status"=>false,"msg"=>"Register fail"));

        }

    }
     
}

       
//$obj=new DbOperations();
//print_r($obj->registerUser("admin","456","@gamil.COM","VAIBHAV","123456"));
//echo $obj->isUserExit('patil');
?>