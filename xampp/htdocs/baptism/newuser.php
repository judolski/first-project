<?php
 ob_start();
include 'header.php';

if (!isset($_SESSION['username'])){
    header('location:adminlogin.php');  
}
?>
<html>

    
<style>
    .h3{text-align: center;}
    
    .tshadow{text-shadow: 1px 1px 2px  #999;}
    .hfontsize{font-size: 20px;}
</style>
<body class="body container">
    <title>New_user</title>
    <h3 class=" h3 tshadow hfontsize error" style="background: lightgray">ADD NEW USER</h3> <br>  
<center><form action="newuser.php" method="POST" name="form" id="myform" onsubmit="return new_user();" enctype="multipart/form-data" class=" container-fluid">    
    <table class=" tshadow row" style="font-size: 16px;">
        <tr>
            <td style="">
            <span style=" margin-right: 200px">SURNAME</span><br>
            <div class=" input-group tbox  col-md-1 ">
                    <span class=" input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                    </span>
                <input type="text" name="sname" id="sname" class=" form-control tbox" value="" placeholder="SURNAME">
                 </div><br>
                 <span style=" margin-right: 200px">FIRST NAME</span><br>
            <div class=" input-group tbox  col-md-1 ">
                    <span class=" input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                    </span>
                <input type="text" name="fname" id="fname" class=" form-control tbox" placeholder="FIRST NAME">
                 </div><br>
           <span style=" margin-right: 200px">USERNAME</span><br>
           <div class=" input-group tbox">
                    <span class=" input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                    </span>
               <input type="text" name="uname" id="uname" class=" form-control tbox" placeholder="USERNAME">
                 </div><br>
                 <span style=" margin-right: 0px">PASSWORD</span>&nbsp;<u style="font-size:12px">(This password can be changed by the user)</u><br>
           <div class=" input-group tbox">
                    <span class=" input-group-addon">
                        <i class="fa fa-key fa-lg"></i>
                    </span>
               <input type="password" name="pword" id="pword" class=" form-control tbox" placeholder="PASSWORD">
           </div><br>
          
        <center><button type="submit" value="Submit" name="submit" class="submitbutton btn btn-primary" style="">
                  Register
            </button></center><br>
                 </td>
        </tr>
        
    </table><br>
    <div id="msg"></div>
 <?php
    if(isset($_POST['submit'])){
        $sname = htmlspecialchars($_POST['sname']);
        $fname = htmlspecialchars($_POST['fname']);
        $uname = htmlspecialchars($_POST['uname']);
        $pword = htmlspecialchars($_POST['pword']);
        
   
       if (empty($sname) || empty($fname) || empty($uname) || empty($pword)){
         die('<b class="error alert alert-danger fa fa-warning fontmsg " style=" font-weight: bold;"> Please Fill all the required fields</b><br><br>');  
       }
       $tablename = "users";
       $value = htmlspecialchars($_POST['uname']);
       $tablecolum = "uname";
       $value = ":uname";
       $data = htmlspecialchars($_POST['uname']);
       $where = "$tablecolum = $value";
       $binddata = array("$value"=>$data);
       login($tablename, $binddata, $where);
          if($check_row > 0){
                  die("<script>ErrorMessage('#msg','Username already exists','');</script>");
              }
              /*
              if(strlen($pword) < 6 ){
                    die('<b class="error alert alert-danger fa fa-warning fontmsg" style=" font-weight: bold;"> Password must be more than 5 charaters </b>');
                }
              
                if(!preg_match('/^[a-z0-9@?&*%$#!^]+$/', $pword)){
             die('<b class="error alert alert-danger fa fa-warning fontmsg" style=" font-weight: bold;"> Password should not contain empty spaces </b>');
                }*/
           //call function insert to insert into database
           $tabledata =   array("sname","fname","uname","pword","date","time");
           $tablevalues = array("$sname" ,"$fname", "$uname", "$pword", "$date", "$timenow");
           $msg = "<script>SucccesMessage('#msg','New user was added seccessfully','');</script>";
           $don = insert($tablename, $tabledata, $tablevalues); 
       } ?>
    </form></center>
<br>
 
</body>
    <div style="margin-top: 25px">
    <?php include 'footer.php'; ?>
    </div>
</html>
<?php
ob_end_flush();

