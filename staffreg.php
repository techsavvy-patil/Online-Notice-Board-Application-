<?php
include_once("dboperations.php");
$obj=new dboperations();
if((isset($_SESSION["ID"])) && (isset($_SESSION["USERTYPE"])) && $_SESSION["USERTYPE"]=="admin"){
  ?> 
<!DOCTYPE html>
<html>

<head>
  <!-- BASICS -->
  <meta charset="utf-8">
  <title>Online Notice Board</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="js/rs-plugin/css/settings.css" media="screen">
  <link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen">
  <link rel="stylesheet" href="css/flexslider.css" type="text/css">
  <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700">

  <link rel="stylesheet" href="css/style.css">
  <!-- skin -->
  <link rel="stylesheet" href="skin/default.css">
  <!-- =======================================================
  ======================================================= -->

</head>

<body>
  <section id="header" class="appear"></section>
  <div class="navbar navbar-fixed-top" role="navigation" data-0="line-height:100px; height:100px; background-color:rgba(0,0,0,0.3);" data-300="line-height:60px; height:60px; background-color:rgba(5, 42, 62, 1);">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      	  <span class="fa fa-bars color-white"></span>
        </button>
        <div class="navbar-logo">
          <!--<a href="index.php"><img data-0="width:155px;" data-300=" width:120px;" src="img/logo.png" alt=""></a>-->
          <h2>Online Notice Board</h2>
        </div>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav" data-0="margin-top:20px;" data-300="margin-top:5px;">
          <li class="active"><a href="adminhome.php">Home</a></li>
          <li><a href="wlogout.php">logout</a></li>
        </ul>
      </div>
      <!--/.navbar-collapse -->
    </div>
  </div>

  <section id="intro">
    <div class="intro-content">
      <h2>Online Notice Board</h2>
    </div>
  </section>
  <!-- Staff registrations -->
  <section id="section-works" class="section appear clearfix">
    <div class="container">

      <div class="row mar-bot40">
        <div class="col-md-offset-3 col-md-6">
          <div class="section-header">
            <h2 class="section-heading animated" data-animation="bounceInUp">STAFF REGISTER</h2>
            <div class="field your-name form-group">
                <div class="field your-name form-group">                  
                <form method="post" action="stafwreg.php">
                <?php
                if(isset($_SESSION["MSG"])){
                ?>
                <h2 style="color:red" font="BOLD">
               <?php echo $_SESSION["MSG"];?></h2>
                <?php unset($_SESSION["MSG"]);
                }
                ?>
                 <div class="field your-email form-group">
                 <select class="browser-default custom-select" name="id_dept">
                  <option value="0" >select department</option>
                <?php
               $dept_records=$obj->dept_opretions("select",null,null);
               foreach($dept_records as $record){
                 ?>
                 <option value="<?php echo $record["dept_id"];?>"><?php echo $record["dname"];?></option>
                 <?php
               }
                ?>
                </select>
                 <div class="field your-email form-group">
                  <input type="hidden" name="operation" value="insert" class="cform-text" size="60">
                  <div class="validation"></div>
                  </div>
                     <div class="field your-email form-group">
                      <input type="text" required name="name" placeholder="NAME" class="cform-text" size="40" >
                      <div class="validation"></div>
                    </div>
                  <div class="field your-email form-group">
                      <input type="text" required name="phone" placeholder="PHONE" class="cform-text" size="40">
                      <div class="validation"></div>
                    </div>
                    <div class="field your-email form-group">
                      <input type="text" required name="email" placeholder="EMAIL" class="cform-text" size="40" >
                      <div class="validation"></div>
                    </div>
                    <div class="field your-email form-group">
                      <input type="text" required name="username" placeholder="USERNAME" class="cform-text" size="40">
                      <div class="validation"></div>
                    </div>
                  <div class="field your-email form-group">
                      <input type="password" required  name="password" placeholder="PASSWORD" class="cform-text" size="40">
                      <div class="validation"></div>
                    </div>
                    <div class="send-btn">
                        <input type="submit" value="Register" class="btn btn-theme">
                      </div>
          </div>
        </div>
      </div>
      </form> 
      </section>
      <!--/. Staff registrations -->
      <!-- table -->    
  <table class="table table-bordered">
  <thead>
  <th>SR.NO</th>
  <th>NAME</th>
  <th>PHONE</th>
  <th>EMAIL</th>
  <th>USERNAME</th>
  <th>EDIT</h6></th>
  <th>DELETE</th>
  </thead>
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
    <td><form method="POST" action="stafregedit.php">
        <input type="hidden" name="operation" value="update"/>
        <input type="hidden" name="id" value="<?php echo $user["id"];?>"/>
        <input type="hidden" name="name" value="<?php echo $user["name"];?>"/>
        <input type="hidden" name="phone" value="<?php echo $user["phone"];?>"/>
        <input type="hidden" name="email" value="<?php echo $user["email"];?>"/>
        <input type="hidden" name="username" value="<?php echo $user["username"];?>"/>
        <input type="submit" value="Edit"  class="btn btn-theme">
      </form>
      </td>
    <td>
      <form method="POST" action="stafwreg.php">
        <input type="hidden" name="operation" value="delete"/>
        <input type="hidden" name="id" value="<?php echo $user["id"];?>"/>
        <input type="submit" value="Delete" class="btn btn-theme">
      </form>
    </td>
  </tr>
  <?php
  }
  ?>
  </tbody>
  </table> 
  </section>
   <!--/. table -->         
  <a href="#header" class="scrollup"><i class="fa fa-chevron-up"></i></a>

  <!-- Javascript Library Files -->
  <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.isotope.min.js"></script>
  <script src="js/jquery.nicescroll.min.js"></script>
  <script src="js/fancybox/jquery.fancybox.pack.js"></script>
  <script src="js/skrollr.min.js"></script>
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.localScroll.min.js"></script>
  <script src="js/stellar.js"></script>
  <script src="js/jquery.appear.js"></script>
  <script src="js/jquery.flexslider-min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>
  <div class="row align-center copyright">
      <div class="col-sm-12">
        <p>Copyright &copy; All rights reserved</p>
      </div>
    </div>
    <div class="credits">
        <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Vlava
            -->
            Designed by <a href="https://bootstrapmade.com/">OnlineNotice.com</a>
          </div>
        </div>    
      </section>
        </form>
    </body>
</html>
          <?php
          }else{
            $_SESSION["MSG"]="INVALID ACCESS";
            header("Location: login1.php");
          }
          ?>
