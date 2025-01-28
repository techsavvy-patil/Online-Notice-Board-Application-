<?php session_start();
 class dboperations{
    var $con;
    function __construct()
    {
        $host="localhost";
        $dbname="tb_login1";
        $username="root";
        $password="";
        try{
            $this->con=new PDO("mysql:host=$host;dbname=$dbname",$username,$password,array());
        }catch(Exception $e){
            echo "ERR ".$e->getMessage();
        }
    }

    function loginAuth($username,$password){
        $query="select name,usertype,id_dept from tb_login1 where username=:username and password=:password";
        $stmt=$this->con->prepare($query);
        $stmt->bindParam(":username",$username);
        $stmt->bindParam(":password",$password);
        $stmt->execute();
        if($stmt->rowCount()>0){
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION["ID"]=$row["id"];
            $_SESSION["USERTYPE"]=$row["usertype"];
            $_SESSION["ID_DEPT"]=$row["id_dept"];
            return true;
        }else{
            $_SESSION["MSG"]="Invalid username or password";
            return false;
        }
    }
    
    function isUserExit($username){
        $query="select * from tb_login1 where username=:username";
        $stmt=$this->con->prepare($query);
        $stmt->bindParam(":username",$username);
        $stmt->execute();
        if($stmt->rowCount()>0){
            return true;
        }else{
            return false;
        }
        
    }

    function getAllUser(){
        $usertype="student";
        $query="select id,name,phone,email,username from tb_login1 where usertype=:usertype";
        $stmt=$this->con->prepare($query);
        $stmt->bindParam(":usertype",$usertype);
        $stmt->execute();
        if($stmt->rowCount()>0){
            return $row=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }

    function staffoperations($operation,$id=null,$name=null,$phone=null,$email=null,$username=null,$password=null,$id_dept=null){
        switch($operation){
            case "insert":
                 $usertype="staff";
                 if($this->isUserExit($username)){
                     $_SESSION["MSG"]="Username Already Exit";
                     return false;
                 }
                 $query="insert into tb_login1 (name,phone,email,username,password,usertype,id_dept)
                 values(:name,:phone,:email,:username,:password,:usertype,:id_dept)";
                 echo $query;
                 $stmt=$this->con->prepare($query);
                 $stmt->bindParam(":name",$name);
                 $stmt->bindParam(":phone",$phone);
                 $stmt->bindParam(":email",$email);
                 $stmt->bindParam(":username",$username);
                 $stmt->bindParam(":password",$password);
                 $stmt->bindParam(":usertype",$usertype);
                 $stmt->bindParam(":id_dept",$id_dept);
                 if($stmt->execute()){
                     $_SESSION["MSG"]="insert Successfull";
                     return true;
                 }else{
                     $_SESSION["MSG"]="insertion Fail";
                     return false;
                 }
            break;

            case "update":
                 $usertype="staff";
                 $query="update tb_login1 set name=:name,phone=:phone,email=:email,username=:username,password=:password where id=:id";
                 $stmt=$this->con->prepare($query);
                 $stmt->bindParam(":name",$name);
                 $stmt->bindParam(":phone",$phone);
                 $stmt->bindParam(":email",$email);
                 $stmt->bindParam(":username",$username);
                 $stmt->bindParam(":password",$password);
                 $stmt->bindParam(":id",$id);
                 if($stmt->execute()){
                     $_SESSION["MSG"]="update Successfull";
                     return true;
                 }else{
                     $_SESSION["MSG"]=" Fail to update";
                     return false;
                 }
            break;

            case "delete":
             $query="delete from tb_login1 where id=:id";
             $stmt=$this->con->prepare($query);   
             $stmt->bindParam(":id",$id);
                 if($stmt->execute()){
                     $_SESSION["MSG"]="Delete Successfull";
                     return true;
                 }else{
                     $_SESSION["MSG"]=" Deletion Fail ";
                     return false;
                 }               
             break;

            case "select":
                 $usertype="staff";
                 $query="select id,name,phone,email,username from tb_login1 where usertype=:usertype";
                 $stmt=$this->con->prepare($query);
                 $stmt->bindParam(":usertype",$usertype);
                 $stmt->execute();
                  if($stmt->rowCount()>0){
                      return $row=$stmt->fetchall(PDO::FETCH_ASSOC);
                  }else{
                      return false;
                  }
            break;
         }
     }

     function studoperations($operation,$id=null,$name=null,$phone=null,$email=null,$username=null,$password=null,$id_dept){
        switch($operation){
            case "insert":
                 $usertype="student";
                 if($this->isUserExit($username)){
                     $_SESSION["MSG"]="Username Already Exit";
                     return false;
                 }
                 $query="insert into tb_login1(name,phone,email,username,password,usertype,id_dept)
                 values(:name,:phone,:email,:username,:password,:usertype,:id_dept)";
                 $stmt=$this->con->prepare($query);
                 $stmt->bindParam(":name",$name);
                 $stmt->bindParam(":phone",$phone);
                 $stmt->bindParam(":email",$email);
                 $stmt->bindParam(":username",$username);
                 $stmt->bindParam(":password",$password);
                 $stmt->bindParam(":usertype",$usertype);
                 $stmt->bindParam(":id_dept",$id_dept);
                 if($stmt->execute()){
                     $_SESSION["MSG"]="insert Successfull";
                     return true;
                 }else{
                     $_SESSION["MSG"]="insertion Fail";
                     return false;
                 }
            break;

            case "update":
                 $usertype="student";
                 $query="update tb_login1 set name=:name,phone=:phone,email=:email,username=:username,password=:password where id=:id";
                 $stmt=$this->con->prepare($query);
                 $stmt->bindParam(":name",$name);
                 $stmt->bindParam(":phone",$phone);
                 $stmt->bindParam(":email",$email);
                 $stmt->bindParam(":username",$username);
                 $stmt->bindParam(":password",$password);
                 $stmt->bindParam(":id",$id);
                 if($stmt->execute()){
                     $_SESSION["MSG"]="Update Successfull";
                     return true;
                 }else{
                     $_SESSION["MSG"]="Fail to update";
                     return false;
                 }
            break;

            case "delete":
             $query="delete from tb_login1 where id=:id";
             $stmt=$this->con->prepare($query);   
             $stmt->bindParam(":id",$id);
                 if($stmt->execute()){
                     $_SESSION["MSG"]="Delete Successfull";
                     return true;
                 }else{
                     $_SESSION["MSG"]=" Deletion Fail ";
                     return false;
                 }               
             break;

            case "select":
                 $usertype="student";
                 $query="select id,name,phone,email,username from tb_login1 where usertype=:usertype";
                 $stmt=$this->con->prepare($query);
                 $stmt->bindParam(":usertype",$usertype);
                 $stmt->execute();
                  if($stmt->rowCount()>0){
                      return $row=$stmt->fetchall(PDO::FETCH_ASSOC);
                  }else{
                      return false;
                  }
            break;
         }
     }


     function dept_opretions($operation,$dept_id=null,$dname=null){
        switch($operation){
            case "insert":
                 if($this->isUserExit($username)){
                     $_SESSION["MSG"]="Username Already Exit";
                     return false;
                 }
                 $query="insert into tb_dept(dname)values(:dname)";
                 $stmt=$this->con->prepare($query);
                 $stmt->bindParam(":dname",$dname);
                 if($stmt->execute()){
                     $_SESSION["MSG"]="insert Successfull";
                     return true;
                 }else{
                     $_SESSION["MSG"]="insertion Fail";
                     return false;
                 }
            break;

            case "update":
                 $query="update tb_dept set dname=:dname where dept_id=:dept_id";
                 $stmt=$this->con->prepare($query);
                 $stmt->bindParam(":dname",$dname);
                 $stmt->bindParam(":dept_id",$dept_id);
                 if($stmt->execute()){
                     $_SESSION["MSG"]="update Successfull";
                     return true;
                 }else{
                     $_SESSION["MSG"]=" Fail to update";
                     return false;
                 }
            break;

            case "delete":
             $query="delete from tb_dept where dept_id=:dept_id";
             $stmt=$this->con->prepare($query);   
             $stmt->bindParam(":dept_id",$dept_id);
                 if($stmt->execute()){
                     $_SESSION["MSG"]="Delete Successfull";
                     return true;
                 }else{
                     $_SESSION["MSG"]=" Deletion Fail ";
                     return false;
                 }               
             break;

            case "select":
                 $query="select dept_id,dname from tb_dept";
                 $stmt=$this->con->prepare($query);
                 $stmt->execute();
                  if($stmt->rowCount()>0){
                      return $row=$stmt->fetchall(PDO::FETCH_ASSOC);
                  }else{
                      return false;
                  }
            break;
         }
     }
     
     function noticeoperation($operation,$id=null,$staff_id=null,$title=null,$usertype=null,$date=null,$description=null,$id_dept=null){
        switch($operation){
            case "insert":
                 $query="insert into tb_notice(id,title,usertype,date,description,id_dept,staff_id)
                  values(:id,:staff_id,:title,:usertype,:date,:description,:id_dept)";
                 $stmt=$this->con->prepare($query);
                 $stmt->bindParam(":id",$id);
                 $stmt->bindParam(":staff_id",$staff_id);
                 $stmt->bindParam(":title",$title);
                 $stmt->bindParam(":usertype",$usertype);
                 $stmt->bindParam(":date",$date);
                 $stmt->bindParam(":description",$description);
                 $stmt->bindParam(":id_dept",$id_dept);
                 if($stmt->execute()){
                     $_SESSION["GGG"]="send Successfull";
                     return "true";
                 }else{
                     $_SESSION["RRR"]="send Fail";
                     return false;
                 }
            break;

            case "update":
                 $query="update tb_notice set title=:title date=:date description=:description where id=:id";
                 $stmt=$this->con->prepare($query);
                 $stmt->bindParam(":title",$title);
                 $stmt->bindParam(":date",$date);
                 $stmt->bindParam(":description",$description);
                 if($stmt->execute()){
                     $_SESSION["MSG"]="update Successfull";
                     return true;
                 }else{
                     $_SESSION["MSG"]=" Fail to update";
                     return false;
                 }
            break;

            case "delete":
             $query="delete from tb_notice where id=:id";
             $stmt=$this->con->prepare($query);   
             $stmt->bindParam(":id",$id);
                 if($stmt->execute()){
                     $_SESSION["GGG"]="Delete Successfull";
                     return true;
                 }else{
                     $_SESSION["RRR"]=" Deletion Fail ";
                     return false;
                 }               
             break;

            case "select":
                 $query="select id,title,date,description,id_dept from tb_notice";
                 $stmt=$this->con->prepare($query);
                 $stmt->execute();
                  if($stmt->rowCount()>0){
                      return $stmt->fetchall(PDO::FETCH_ASSOC);
                  }else{
                      return false;
                  }
            break;
         }
     }

     
      function getStaffNotice($department_id){
        $query="select id,title,description,id_dept from tb_notice where id_dept=:id_dept";
        $stmt=$this->con->prepare($query);
        $stmt->bindParam(":id_dept",$department_id);
        $stmt->execute();
         if($stmt->rowCount()>0){
             return $stmt->fetchall(PDO::FETCH_ASSOC);
         }else{
             return false;
         }
      }

      function getstudNotice($id_dept){
        $query="select id,title,description,id_dept from tb_notice where id_dept=:id_dept";
        $stmt=$this->con->prepare($query);
        $stmt->bindParam(":id_dept",$id_dept);
        $stmt->execute();
         if($stmt->rowCount()>0){
             return $stmt->fetchall(PDO::FETCH_ASSOC);
         }else{
             return false;
         }
      }
    }


//$obj=new dboperations();
//echo $obj->StudUser('prathu','98765432','pr@gmail.com','pj','9876');
////$obj=new dboperations();
//echo $obj->dept_opretions('prathu');

//$obj=new dbope1rations();
//echo $obj->noticeoperation('1','ndsad','dndfh','5');
?>