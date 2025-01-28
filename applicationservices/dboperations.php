<?php
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
     $query="select id,name,usertype,id_dept,email,password,phone from tb_login1  where username=:username and password=:password";
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




     function registerUser($name,$phone,$email,$username,$password,$id_dept){
        $usertype="student";
        if($this->isUserExit($username)){
            return json_encode(array("status"=>false,"msg"=>"username already exist"));
        }
        $query="insert into tb_login1 (name,phone,email,username,password,usertype,id_dept)
        values(:name,:phone,:email,:username,:password,:usertype,:id_dept)";
        $stmt=$this->con->prepare($query);
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":phone",$phone);
        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":username",$username);
        $stmt->bindParam(":password",$password);
        $stmt->bindParam(":usertype",$usertype);
        $stmt->bindParam(":id_dept",$id_dept);
        $stmt->execute();
        if($stmt->rowCount()>0){
            return json_encode(array("status"=>true,"msg"=>"Register successful"));
        }else{
            return json_encode(array("status"=>false,"msg"=>"Register fail"));

        }
    }

        function getdepartment(){
        $query="select * from tb_dept";
        $stmt=$this->con->prepare($query);
        $stmt->execute();
         if($stmt->rowCount()>0){
             return json_encode(array("status"=>true,"records"=>$stmt->fetchAll(PDO::FETCH_ASSOC)));
         }else{
             return json_encode(array("status"=>false,"msg"=>"ERROR"));
    }
  }

  function get_Notice($id_dept,$usertype,$type_id){
    $query="select title,date,description,id_dept,usertype from tb_notice where
     type_id=:type_id and 
     (id_dept=:id_dept or 
     id_dept='0') and
     (usertype=:usertype or
     usertype='all')
     order by date desc";
    $stmt=$this->con->prepare($query);
    $stmt->bindParam(":id_dept",$id_dept);
    $stmt->bindParam(":usertype",$usertype);
    $stmt->bindParam(":type_id",$type_id);
    $stmt->execute();
     if($stmt->rowCount()>0){
         return json_encode(array("status"=>true,"records"=>$stmt->fetchAll(PDO::FETCH_ASSOC)));
     }else{
         return json_encode(array("status"=>false,"msg"=>"ERROR"));
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
        
        function forgot_pass($username,$password){
            $query="update tb_login1 set password=:password where username=:username";
                 $stmt=$this->con->prepare($query);
                 $stmt->bindParam(":username",$username);
                 $stmt->bindParam(":password",$password);
                 $stmt->execute();
            if($stmt->rowCount()>0){
                return json_encode(array("status"=>true,"msg"=>"Password Changed Successful"));
            }else{
            return json_encode(array("status"=>false,"msg"=>"Password Changed Unsuccessful"));
        }
     }

     function noticeoperation($staff_id,$title,$type_id,$usertype,$date,$description,$id_dept){
                 $query="insert into tb_notice(title,type_id,usertype,date,description,id_dept,staff_id)
                  values(:staff_id,:title,:type_id,:usertype,:date,:description,:id_dept)";
                    $stmt=$this->con->prepare($query);
                    $stmt->bindParam(":staff_id",$staff_id);
                    $stmt->bindParam(":title",$title);
                    $stmt->bindParam(":type_id",$type_id);
                    $stmt->bindParam(":usertype",$usertype);
                    $stmt->bindParam(":date",$date);
                    $stmt->bindParam(":description",$description);
                    $stmt->bindParam(":id_dept",$id_dept);
                    $stmt->execute();
                    if($stmt->rowCount()>0){
                        return json_encode(array("status"=>true,"msg"=>"Notice Send Successful"));
                    }else{
                    return json_encode(array("status"=>false,"msg"=>" Notice Send Failed"));
                }    
            }
     
            function profile_update($name,$email,$phone,$password,$id){
                $query="update tb_login1 set name=:name,phone=:phone,email=:email,password=:password where id=:id";
                     $stmt=$this->con->prepare($query);
                     $stmt->bindParam(":id",$id);
                     $stmt->bindParam(":name",$name);
                     $stmt->bindParam(":email",$email);
                     $stmt->bindParam(":phone",$phone);
                     $stmt->bindParam(":password",$password);
                     $stmt->execute();
                    if($stmt->rowCount()>0){
                    return json_encode(array("status"=>true,"msg"=>"Profile Changed Successful"));
                    }else{
                    return json_encode(array("status"=>false,"msg"=>"Profile Changed Unsuccessful"));
            }
         }
    }

       
//obj=new dboperations();
//print_r($obj->get_Notice('9','student'));
//echo $obj->get_Notice('0');