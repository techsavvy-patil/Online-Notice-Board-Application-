<?php 
include_once("dboperations.php");
$obj=new dboperations();
  ?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Form Component | Creative - Bootstrap 3 Responsive Admin Template</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/daterangepicker.css" rel="stylesheet" />
  <link href="css/bootstrap-datepicker.css" rel="stylesheet" />
  <link href="css/bootstrap-colorpicker.css" rel="stylesheet" />
  <!-- date picker -->

  <!-- color picker -->

  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->


    <script>
  function validate(){
    var password_textbox=document.getElementById("password");
    var email_textbox=document.getElementById("email");
    //console.log(email_textbox.value);
    var mailformat= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var user=  /^[0-9a-zA-Z]+$/;
    var name_textbox=document.getElementById("name");
    var phone_textbox= document.getElementById("phone");
    var username_textbox= document.getElementById("usertype");
    if(name_textbox.value.length<3){
      alert("Name lenght must be greater then 3");
      return false;
    }
    if(!email_textbox.value.match(mailformat)){
     alert("You have entered an invalid email address!");
     email_textbox.style.borderColor = "red";
     return false;
    }
    if(phone_textbox.value.length<9){
      alert("You have entered invalid phone number!");
      return false;
    }
    if(!username_textbox.value.match(user)){
      alert("Only Enter letters....!");
      return false;
    }
    if(password_textbox.value.length<8){
      alert("password length must be greater then 8");
      return false;
    }
    return true;
  }
</script>
</head>

<body>

  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.html" class="logo"><span class="lite">Admin</span></a>
      <!--logo end-->

      <div class="nav search-row" id="top_menu">

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_profile"></i>
                          <span>Users</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="staffdata.php">Staff</a></li>
              <li><a class="" href="studdata.php">Student</a></li>
              <li><a class="" href="staffreg.php">Staff Register</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_calendar"></i>
                          <span>Notice</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="notice.php">Create Notice</a></li>
              <li><a class="" href="view_notice">View Notice</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Department</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="">Manege</a></li>
              <li><a class="" href=""><span>CSE</span></a></li>
              <li><a class="" href=""><span>CE</span></a></li>
              <li><a class="" href="">E&E</a></li>
              <li><a class="" href="">ME</a></li>
            </ul>
          </li>
        </ul>
        
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3><div><?php
                if(isset($_SESSION["MSG"])){
                ?>
                <h2 style="color:green" font="BOLD" align="center">
               <?php echo $_SESSION["MSG"];?></h2>
                <?php unset($_SESSION["MSG"]);
                }
                ?>
                <?php
                if(isset($_SESSION["Fail"])){
                ?>
                <h2 style="color:red" font="BOLD" align="center">
               <?php echo $_SESSION["Fail"];?></h2>
                <?php unset($_SESSION["Fail"]);
                }
                ?>
                </div></h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="icon_document_alt"></i>User</li>
              <li><i class="fa fa-file-text-o"></i>Staff Register</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
              Staff Register
              </header>
              <div class="panel-body">
              <form method="post" action="stafwreg.php" onSubmit="return validate();">
                  <div class="form-group">
                    <label class="control-label col-lg-2" for="inputSuccess">SELECT DEPARTMENT</label>
                    <div class="col-lg-10">
                      <select class="form-control m-bot15" name="id_dept" >
                                       <option value="0">SELECT DEPARTMENT</option>
                                       <?php
               $dept_records=$obj->dept_opretions("select",null,null);
               foreach($dept_records as $record){
                 ?>
                 <option value="<?php echo $record["dept_id"];?>"><?php echo $record["dname"];?></option>
                 <?php
               }
                ?>
          </select>
               </div> 
                    <input class="form-control  m-bot15" type="hidden" name="operation" value="insert">

                    <label class="control-label col-lg-2" for="inputSuccess">NAME</label>
                    <div class="col-lg-10">
                    <input class="form-control  m-bot15" type="text" required name="name" id="name" placeholder="NAME">
                    </div>

                    <label class="control-label col-lg-2" for="inputSuccess">MOBAIL NO.</label>
                    <div class="col-lg-10">
                    <input class="form-control  m-bot15" type="text" required name="phone" id="phone" placeholder="MOBILE NO.">
                    </div>

                    <label class="control-label col-lg-2" for="inputSuccess">EMAIL</label>
                    <div class="col-lg-10">
                    <input class="form-control  m-bot15"type="text" required name="email" id="email" placeholder="EMAIL">
                    </div>

                    <label class="control-label col-lg-2" for="inputSuccess">USERNAME</label>
                    <div class="col-lg-10">
                    <input class="form-control  m-bot15" type="text" required name="username"  id="usertype" placeholder="USERNAME" title="Username and Name must not be same">
                    </div>

                    <label class="control-label col-lg-2" for="inputSuccess">PASSWORD</label>
                    <div class="col-lg-10">
                    <input class="form-control  m-bot15" type="password" required  name="password" id="password" placeholder="PASSWORD"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password Must contain at least one number,one uppercase letter,lowercase letter and minimun 8 characters">
                    </div>
                    
                    <div class="col-md-offset-4 col-md-6">
                    <input type="submit" value="Submit" class="btn btn-primary btn-lg btn-block">
                </div>
              </div>
            </div>
        </form>
     </div>
        <!-- Basic Forms & Horizontal Forms-->

        

    <!--main content end-->
  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

  <!-- jquery ui -->
  <script src="js/jquery-ui-1.9.2.custom.min.js"></script>

  <!--custom checkbox & radio-->
  <script type="text/javascript" src="js/ga.js"></script>
  <!--custom switch-->
  <script src="js/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="js/jquery.tagsinput.js"></script>

  <!-- colorpicker -->

  <!-- bootstrap-wysiwyg -->
  <script src="js/jquery.hotkeys.js"></script>
  <script src="js/bootstrap-wysiwyg.js"></script>
  <script src="js/bootstrap-wysiwyg-custom.js"></script>
  <script src="js/moment.js"></script>
  <script src="js/bootstrap-colorpicker.js"></script>
  <script src="js/daterangepicker.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <!-- ck editor -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="js/form-component.js"></script>
  <!-- custome script for all page -->
  <script src="js/scripts.js"></script>


</body>

</html>
