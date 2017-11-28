<?php
 ob_start();
 ?>

<html>
 <?php
include 'header.php';
?>
    <head>
        <style type="text/css">
            .body {
                background: url("IMG-20171016-WA0004.jpg") no-repeat center center fixed;
                background-size: cover
            }
        </style>
    </head>  
<body class=" container body" style=""> 
          <br><br><br><h2 class="tshadowlogin hfontsize container" style="color: darkred;background: black; width: 217px">USER LOGIN</h2><br>
<center> <form action="" id="form1" name="form1" method="POST" enctype="multipart/form-data" class="">    
                 <div class="glyphicon glyphicon-lock fa-5x" style=""></div><br><br>  

                 <div style="">
                   
                         <div class=" input-group tbox">
                             <span class=" input-group-addon">
                                 <i class=" fa fa-user fa-lg"></i>
                             </span>
                             <input class="form-control tbox" id="uname" type="text" name="uname" value="<?php if(isset($_POST['uname'])){ echo $_POST['uname']; } ?>" placeholder="Username">
                         </div><br>
                  <div> 
                      
                          <div class=" input-group tbox">
                            <span class=" input-group-addon">
                                <i class="fa fa-key fa-lg"></i>
                            </span>
                              <input type="password" name="pword" id="pword" class=" form-control tbox" placeholder="Password">
                         </div>
                  </div><br>
                  <div>
                          <button class="btn btn-default submitbutton" onclick="spinning('#erroruname','fa-spinner','fa-4x')" name="send" type="submit">
                            Login
                          </button>
                  </div><br>
                  <div id="erroruname"></div>
                  </div>

   <?php 
 my_login();
?> 
            </form>
        </center>    
    </body>
    <div style="margin-top: 96px">
    <?php require 'footer.php'; ?>
    </div>
</html>

<?php
ob_end_flush();
