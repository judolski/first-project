<?php 
ob_start();

include 'header.php';
if (!isset($_SESSION['username']) && !isset($_SESSION['uname'])){
    header('location: home.php');
}
?>
<html>
    <head>
<style>
           
    .h3{text-align: center;}
    .tshadow{text-shadow: 1px 1px 2px  #999;}
    .hfontsize{font-size: 20px;}
    .submitbutton{ height: 37px; width: 170px; font-size: 16px}
    .upload{width: 175px; height: 28px ;box-shadow: 4px 4px 4px #999; }
</style>  
    </head>
    
<div class="" style="margin-left: 30px  ">
    <div id="mssg" style="margin-left: 510px; margin-top: 2px"></div>
        <div class="" style= "background: #cc0000; margin-top: 2px;  width: 71%;  height: 40px; border-top-right-radius: 20px; border-top-left-radius: 20px; margin-left: 190px"> 
            <span style="margin-left:370px; font-weight: bold; color: whitesmoke; font-size: 18px">NEW BAPTISM RECORD</span>
        </div> 
<form action="new_bap.php" name="myform" id="myform" onsubmit="return valid('msg', ['sname','bname','oname','dob', 'dobp','gender','fasname','fafname','mosname','mofname','gsmname','gfmname','prisname','prifname','myfile']);" method="POST" enctype="multipart/form-data" class=" container-fluid">    
           
            <table class=" tshadow " style="font-size: 16px; margin-top: 10px; margin-left: 180px;">
              <tr>
                <td >
                    <div>
                <span style=" margin-right: 200px">SURNAME</span><br>
            <div class=" input-group tbox  col-md-1 ">
                    <span class=" input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                    </span>
                <input type="text" name="sname"  class=" form-control tbox" id="sname"  placeholder="SURNAME">
            </div><br>
                 <span style=" margin-right: 200px">BAPTISM NAME</span><br>
            <div class=" input-group tbox  col-md-1 ">
                    <span class=" input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                    </span>
                <input type="text" name="bname" class=" form-control tbox" id="bname" placeholder="BAPTISM NAME">
                 </div><br>
           <span style=" margin-right: 200px">LAST NAME</span><br>
           <div class=" input-group tbox">
                    <span class=" input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                    </span>
               <input type="text" name="oname" class=" form-control tbox" id="oname" placeholder="LAST NAME">
                 </div>
                    </div>
                </td>
    <td style="padding-left: 140px">
                  <span style=" margin-right: 170px">DATE OF BIRTH</span><br>
           <div class=" input-group tbox">
                    <span class=" input-group-addon">
                        <i class="fa fa-calendar fa-lg"></i>
                    </span>
               <input type="date" name="dob" id="dob" class=" form-control tbox" placeholder="format:yyyy-mm-dd. (eg. 2001-03-30)">
           </div><br>
       
          <span style=" margin-right: 200px">DATE OF BAPTISM</span><br>
           <div class=" input-group tbox">
                    <span class=" input-group-addon">
                        <i class="fa fa-calendar fa-lg"></i>
                    </span>
               <input type="date" name="dobp" id="dobp" class="form-control tbox" placeholder="format:yyyy-mm-dd. (eg. 2001-03-30)">
                  </div><br>
                  <span style=" margin-right: 200px">GENDER</span><br>
           <div class="input-group">
               <select type="text" name="gender" id="gender"  class="form-control tbox">
                    <option></option>
                    <option>Male</option> 
                    <option>Female</option> 
                </select>
            </div>  
    </td>
              </tr>
              <tr>
                <td >
                <span style=" margin-right: 200px">FATHER'S NAME</span><br>
                   <div class=" input-group tbox">
                    <span class=" input-group-addon">
                        <i class="fa fa-user fa-lg"></i>
                    </span>
                       <input type="text" name="fasname" id="fasname" class=" form-control tbox" placeholder="SURNAME">
                       <input type="text" name="fafname" id="fafname" class=" form-control tbox" placeholder="FIRST NAME">
                 </div><br>
                 <span style=" margin-right: 190px">MOTHER'S NAME</span><br>
                 <div class=" input-group tbox">
                    <span class=" input-group-addon">
                        <i class="fa fa-user fa-lg"></i>
                    </span>
               <input type="text" name="mosname" id="mosname" class=" form-control tbox" placeholder="SURNAME">
               <input type="text" name="mofname" id="mofname" class=" form-control tbox" placeholder="FIRST NAME">
               </td>
               <td style="padding-left: 140px">
                 </div><br>
              <span style=" margin-right: 200px">GODPARENT</span><br>
           <div class=" input-group tbox">
                    <span class=" input-group-addon">
                        <i class="fa fa-user fa-lg"></i>
                    </span>
               <input type="text" name="gsmname" id="gsmname" class=" form-control tbox" placeholder="SURNAME">
               <input type="text" name="gfmname" id="gfmname" class=" form-control tbox" placeholder="FIRST NAME">
                 </div><br>   
            <span style=" margin-right: 200px">PRIEST IN CHARGE</span><br>
           <div class=" input-group tbox">
                    <span class=" input-group-addon">
                        <i class="fa fa-user fa-lg"></i>
                    </span>
               <input type="text" name="prisname" id="prisname" class="form-control tbox" placeholder="SURNAME">
               <input type="text" name="prifname" id="prifname" class="form-control tbox" placeholder="FIRST NAME">
                 </div><br>
        
                 </td>
              </tr>
            </table>
             <div class="" style="margin-left: 700px; "> 
                 <label class="camera" for="myfile" style=" border: 4px solid skyblue; border-radius: 10px; width: 100px; margin-left: 31px; height: 100px">
                    <i class=" glyphicon glyphicon-user fa-5x " style="margin-left: 12px; margin-top: 5px"></i>
                    <i class=" glyphicon glyphicon-camera fa-lg " style="margin-left: 13px; margin-top: 2px"></i>
                </label>
                 <div style="margin-left: 30px;"><b style="font-size:14px; ">upload picture</b></div>
                <div style="margin-left: 30px;"><u style="color: firebrick; font-size: 13px">(image size should be 1mb or less)</u></div>
                <input type="file" name="myfile" id="myfile" style="height: 0px; width: 0px; visibility: hidden" class="">
            </div>
            <button type="submit" name="submit"  class="btn btn-primary" style=" font-weight: bold; color: white; margin-top: 2px; margin-left: 730px;">
                  Register
            </button>
    <div id="msg" style="margin-left: 530px; margin-top: 2px"></div>
        </form >
        
    </div>    
    
    
 <?php
    if(isset($_POST['submit'])){
    $sname = htmlspecialchars($_POST['sname']);
        $bname = htmlspecialchars($_POST['bname']);
        $oname = htmlspecialchars($_POST['oname']);
        $fasname = htmlspecialchars($_POST['fasname'].' '.$_POST['fafname']);
        $fafname = htmlspecialchars($_POST['fafname']);
        $mosname = htmlspecialchars($_POST['mosname'].' '.$_POST['mofname']);
        $mofname = htmlspecialchars($_POST['mofname']);
        $gfmname = htmlspecialchars($_POST['gfmname']);
        $gsmname = htmlspecialchars($_POST['gsmname'].' '.$_POST['gfmname']);
        $prisname = "Rev. Fr. ".htmlspecialchars($_POST['prisname'].' '.$_POST['prifname']);
    $prifname = htmlspecialchars($_POST['prifname']);
        $dob = htmlspecialchars($_POST['dob']);
        $dobp = htmlspecialchars($_POST['dobp']);
        $gender = trim($_POST['gender']);
        if(isset($_SESSION['uname'])){
       $user = $_SESSION['uname'];}
       if(isset($_SESSION['username'])){
       $user = $_SESSION['username'];}
       if (empty($sname) || empty($bname) || empty($oname) || empty($fasname) || empty($fafname) || empty($mosname) || empty($mofname) || empty($gfmname) || empty($gsmname) || empty($prisname) || empty($prifname) || empty($dob) || empty($dobp) || empty($gender)){
         die("<script>ErrorMessage('#msg','Please Fill all the required fields','');</script>");  
       }
        else{
           $image = $_FILES['myfile']['name'];
           $location = 'uploads/'.$image;
           $tmp_name = $_FILES['myfile']['tmp_name'];
          
           //call function insert to insert into database
           $tablename = "bap_records";
           $tabledata =   array("sname","bname","oname","faname","moname","gfmname","priname","dob","dobp","gender","image", "date_of_reg","time_of_reg", "user");
           $tablevalues = array("$sname" ,"$bname", "$oname", "$fasname", "$mosname", "$gsmname","$prisname", "$dob", "$dobp", "$gender" ,"$location","$date", "$timenow", $user);
           uploadimage($image, $tmp_name, $location,'mssg');
           getdateandtime();
           $msg =  "<script>SucccesMessage('#mssg','New Baptism record was added seccessfully','');</script>";
           $don = insert($tablename, $tabledata, $tablevalues);       
       }
    } ?>
    </form></center>
<br>
</body>
    <div style="margin-top: 3px">
    <?php require 'footer.php'; ?>
    </div>
</html>


<?php 
ob_end_flush();