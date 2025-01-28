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

  <title>Basic Table | Creative - Bootstrap 3 Responsive Admin Template</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
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
        <!--  search form start -->
        <!--  search form end -->
      </div>

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- task notificatoin start -->
          <!-- alert notification end-->
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/.jpg">
                            </span>
                            <span class="username">Admin</span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="#"><i class="icon_profile"></i>My Profile</a>
              </li>
              <li>
                <a href="login.html"><i class="icon_key_alt"></i> Log Out</a>
              </li>
              </ul>
          </li>
          <!-- user login dropdown end -->
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
              <li><a class="" href="">View Notice</a></li>
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

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12"> 
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="icon_document_alt"></i>Users</li>
              <li><i class="fa fa-file-text-o"></i>Staff</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
                <form class="form-horizontal " method="get">
                  <div class="form-group">
                  </div>
        <!-- page start-->
            </section>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <table class="table table-striped table-advance table-hover">
                <thead class="thead-light">
                  <tr>  
                  <thead class="thead-light">
                    <th><i class="icon_document_alt"></i>Sr.</th>
                    <th><i class="icon_profile"></i> Name</th>
                    <th><i class="icon_phone"></i> phone</th>
                    <th><i class="icon_mail_alt"></i> Email</th>
                    <th><i class="icon_key_alt"></i> Username</th>
                    <th><i class="icon_cogs"></i> Action</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                  <tbody>
                    <?php
                    $users=$obj->staffOperations(
                      //$usertype="staff";
                      "select",
                      null,
                      null,
                      null,
                      null,
                      null,
                      null,
                      null
                    );
                    $i=1;
                    foreach($users as $user){
                      ?>
                      <tr>
                      <td><?php echo $i++?></td>
                      <td><?php echo $user["name"];?></td>
                      <td><?php echo $user["phone"];?></td>
                      <td><?php echo $user["email"];?></td>
                      <td><?php echo $user["username"];?></td>
                      <td><form method="POST" action="stud_edit.php">
                          <input type="hidden" name="operation" value="update"/>
                          <input type="hidden" name="id" value="<?php echo $user["id"];?>"/>
                          <input type="hidden" name="name" value="<?php echo $user["name"];?>"/>
                          <input type="hidden" name="phone" value="<?php echo $user["phone"];?>"/>
                          <input type="hidden" name="email" value="<?php echo $user["email"];?>"/>
                          <input type="hidden" name="username" value="<?php echo $user["username"];?>"/>
                          <input type="submit" value="Edit" class="btn btn-primary">
                        </form>
                        </td>
                        <td>
                        <form method="POST" action="stafwreg.php">
                          <input type="hidden" name="operation" value="delete"/>
                          <input type="hidden" name="id" value="<?php echo $user["id"];?>"/>
                          <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                    </tr>
                    <?php
                    }
                    ?>

           </tbody>
              </table>
            </section>
          </div>
        </div>
        <!-- page end-->
      </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nicescroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>


</body>

</html>
