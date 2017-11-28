<?php
include 'header.php';

if (!isset($_SESSION['username']) && !isset($_SESSION['uname'])){
    header('location:home.php');  
}
?>
<html>
<head>
    <title>change password</title>
<h4 class="h3 tshadow hfontsize error" style="background: lightgray;">CHANGE PASSWORD</h4></head>
<style>
    .h3{text-align: center;}
    .tshadow{text-shadow: 1px 1px 2px  #999;}
    .hfontsize{font-size: 20px;}
    .upload{width: 175px; height: 28px ;box-shadow: 4px 4px 4px #999; }
</style>

<body class="body container">
     <br>
    <form action="" method="POST" style=" padding-left: 480px" name="myform" id="myform" enctype="multipart/form-data" onsubmit="return ChangePassword();" class=" container">    
    <table class=" tshadow row" style="font-size: 16px;">
        <tr>
            <td style="">
            <span style=" margin-right: 200px">USERNAME</span><br>
            <div class=" input-group tbox  col-md-1 ">
                    <span class=" input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                    </span>
                <input type="text" name="uname" id="uname" value="<?php if(isset($_POST['uname'])){ echo $_POST['uname']; } ?>" class=" form-control tbox" placeholder="USERNAME">
                 </div><br>
                 <span style=" margin-right: 200px">PASSWORD</span><br>
            <div class=" input-group tbox  col-md-1 ">
                    <span class=" input-group-addon">
                        <i class="fa fa-key fa-lg"></i>
                    </span>
                <input type="password" name="pword" id="pword" class=" form-control tbox" placeholder="PASSWORD">
                 </div><br>
           <span style=" margin-right: 200px">NEW PASSWORD</span><br>
           <div class=" input-group tbox">
                    <span class=" input-group-addon">
                        <i class="fa fa-key fa-lg"></i>
                    </span>
               <input type="password" name="npword" id="npword" class=" form-control tbox" placeholder="ENTER NEW PASSWORD" maxlength="12">
                 </div><br>
                 <span style=" margin-right: 170px">CONFIRM PASSWORD</span><br>
           <div class=" input-group tbox">
                    <span class=" input-group-addon">
                        <i class="fa fa-key fa-lg"></i>
                    </span>
               <input type="password" name="cpword" id="cpword" class=" form-control tbox" placeholder=" RE-TYPE NEW PASSWORD" maxlength="12">
           </div><br>
          
        <center><button type="submit" onclick='' value="Submit" name="submit" class="submitbutton btn btn-success" style="">
                 Change
               </button>
        </center><br>
    </table>
         
    </form>
        <div id="msg" style=" text-align: center"></div> 
               
    <div>
    <?php 
    if(isset($_POST['submit'])){
        $username = $_POST['uname'];
        $pword = $_POST['pword'];
        $password = ":pword";
        $cpassword = $_POST['cpword'];
        $value = ":npword";
        $npword = $_POST['npword'];
        $datavalue = ":username";
        
        if(isset($_SESSION['username'])){
        $data = "username";
        $tablename = "admin";
        $field = "password";
        }
        if(isset($_SESSION['uname'])){
        $data = "uname";
        $tablename = "users";
        $field = "pword";
        }
        if(empty($_POST['uname']) || empty($_POST['pword']) || empty($_POST['npword']) || empty($_POST['cpword'])){
       // die("<script>ErrorMessage('#msg','Please Fill all the required fields','');</script>");    
        }
        
             // if(strlen($npword) < 6 ){
               //     die("<script>ErrorMessage('#msg','New password must be more than 5 charaters','#npword');</script>");               
                    
             // }
             //   if(!preg_match('/^[a-z0-9@?&*%$#!^]+$/', $npword)){
            // die("<script>ErrorMessage('#msg','New password should not contain empty spaces','#npword');</script>");
             //   }
             //   if($npword != $cpassword){             
          //  die("<script>ErrorMessage('#msg','New Password does not match with with confirm password','#npword,#cpword');</script>");
       // }
        $binddata = array("$password"=>$pword, "$datavalue"=>$username);
        $where = "$field = $password and $data = $datavalue";
       $binddata1 = array("$value"=>$npword,"$datavalue"=>$username);
        $setcolums = "$field = $value";
        $where1 = "$data = $datavalue";
        change_password($tablename, $binddata1, $where1, $setcolums);
      
        
        
    }
    
    ?>
    </div>
        <div style="margin-top: 79px">
        <?php include 'footer.php'; ?>
        </div>
        </html>