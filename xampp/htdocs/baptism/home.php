<?php
ob_start();
 include 'header.php';
 
if(!isset($_SESSION['username']) && !isset($_SESSION['uname'])){
echo "<script>loginForm();</script>";
}
?>

<html>
    <head>
       
    <style type="text/css">
       .body {
            background: url("IMG-20171016-WA0004.jpg") no-repeat center center fixed;
            background-size: cover
        }
      .htxt{text-shadow:1px 1px 2px black; color: brown;}
    </style>
        
        <title>automated_baptism_record_home</title>
    </head> 
    <script></script>
    <body class="container body " style=" background:lightyellow;" onload="">
        <br><br><br><br><br><br>
        
        <div>
            
            <a href="new_bap.php"><i onclick="spinning('#msg','fa-circle-o-notch','fa-5x')" class="fa fa-user-plus fa-5x " style=" color: black; font-size: 200px; margin-left: 40px"></i></a>

            <a href="view_bap_rec.php"><i class="fa fa-briefcase fa-5x " onclick="spinning('#msg','fa-circle-o-notch','fa-5x')" style=" color: black;font-size: 200px; margin-left: 130px"></i></a>   
            <span class="dropdown" style="margin-left: 140px;">
                <a href="" class=" dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search-plus fa-5x" style="color: black; font-size: 200px; "></i></a>
                <ul class="dropdown-menu" style=" background: white">
                    <li>
                        <a href="#">
                            <button id="sb" class="" style="font-size: 14px; font-weight: bold; background: none; border: none">By Surname and Baptism Name</button>
                        </a>
                    </li><hr style=" margin: auto">  
                    <li>
                        <a href="#">
                        <button id="bb" class="" style="font-size: 14px; font-weight: bold; background: none; border: none">By Baptism Name and Birth Date</button>
                        </a>
                    </li><hr style=" margin: auto">
                    <li>
                        <a href="#">
                        <button id="sbb" class="" style="font-size: 14px; font-weight: bold; background: none; border: none">By Surname, Baptism Name and Birth Date</button>
                        </a>
                    </li>
                </ul>
            </span>
            <span class="dropdown" style="margin-left: 130px">
                        <a href="" class=" dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-cogs fa-5x" style=" color: black; font-size: 200px; "></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="change_password.php" onclick="spinning('#msg','fa-circle-o-notch','fa-5x')" style="font-size: 14px; font-weight: bold;">Change Password</a></li><hr style=" margin: auto">
                            <li><a href="user_rec.php" onclick="spinning('#msg','fa-circle-o-notch','fa-5x')" style="font-size: 14px; font-weight: bold;">User Records</a></li><hr style=" margin: auto">
                            <li><a href="newuser.php" onclick="spinning('#msg','fa-circle-o-notch','fa-5x')" style="font-size: 14px; font-weight: bold;">Add New User</a></li><hr style=" margin: auto">
                        </ul>
            </span>
        </div>
        <div class="htxt">
            <b style="margin-left: 50px; font-size: 20px;">NEW RECORD</b>
            <b style="margin-left: 205px; font-size: 20px;">VIEW ALL RECORDS</b>
                 <b style="margin-left: 135px; font-size: 20px;">SEARCH FOR RECORD</b>
                 <b style="margin-left: 130px; font-size: 20px;">MANAGE ACCOUNT</b>
        </div>
        <br><br><br>
        <div style= " margin-left: 640px"  id="msg"></div>
        <br><br><div style= " text-align: center"  id="erroruname"></div>
        
    </body>
    <div style="margin-top: 55px">
    <?php include 'footer.php'; ?>
    </div>
</html>

<?php
my_login();


ob_end_flush();