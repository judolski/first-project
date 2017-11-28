<?php
ob_start();

include 'header.php';
if (!isset($_SESSION['username']) && !isset($_SESSION['uname'])){
    header('location: home.php');
}  

if(isset($_GET['id'])){ 
$data = htmlspecialchars($_GET["id"]);
 $tablename = "bap_records";
 $tablecolum = "id";
 $value = ":id"; 
 $binddata = array("$value" => $data);
 $where = "$tablecolum = $data";
$don = login($tablename, $binddata, $where);
if(!$don){
    echo ('<br><center><b class="error alert alert-danger fa fa-warning fontmsg" style=" font-weight: bold;"> Rocord has been deleted or does not exist</b></center>'); 
   ?>
   <center><a href="view_bap_rec.php">
                    <button name="back" id="msg" class="btn btn-primary" onclick='spinning("#msg","fa-spinner","fa-1x")' style=" font-size: 16px">
                    <i class="glyphicon glyphicon-backward"></i> Back to records <i class="glyphicon glyphicon-backward"></i></button>
    </a></center>
    <?php
}
while($show_rec =$get_rec->fetch()){

?>    
<body  class="container"  style="background: whitesmoke">
    <div>
        <div id="spin_m" style="margin-left: 620px;"></div>
        <div id="mssg" style="text-align: center"></div>
        <table class="" style=" ">
            <tr>
                <td>
                    <a href="view_bap_rec.php">
                        <button name="back" id="msg" class="btn btn-primary" onclick='spinning("#msg","fa-spinner","fa-2x")' style="margin-left: 320px; font-size: 16px">
                        <i class="glyphicon glyphicon-backward"></i><b>&nbsp;Back to records&nbsp;</b><i class="glyphicon glyphicon-backward"></i></button>
                    </a>
                </td>
                <td>
                    <button id="1<?php echo $show_rec['id'];?>" name="del"  onclick='return delete_ani( <?php echo $show_rec['id'];?> )' style="font-size: 16px; margin-left: 100px;" class="btn btn-danger">
                    <i class="glyphicon glyphicon-trash "></i><b>&nbsp;Delete</b>
                    </button>
                    <div id="2<?php echo $show_rec['id'];?>" style="margin-left: 100px;"></div>
                </td>
                <td>
                    <button name="update" id="ms" onclick='update_pop("closem","modal_scope","no");' class="btn btn-warning" style="margin-left: 100px; font-size: 16px">
                        <i class="glyphicon glyphicon-edit"></i><b>&nbsp;Modify record</b></button>
                </td>
                <td>
                    <?php
                    $show = $show_rec['updated_date'];
                    if(!empty($show)){
                        echo("<div style=\"margin-left:140px; background:skyblue; font-weight:bold\"> Last updated : $show</div>");
                    }
                    ?>
                </td>
            </tr>
        </table>
    </div>
   <div style=" text-align: center; background: lightgray; font-size: 20px; color: black">Baptism Record For <?php echo $show_rec['sname']." ".$show_rec['bname']." ".$show_rec['oname'];?></div>  

    <img style="width: 240px; height: 200px; border-radius: 100px; margin-left: 520px;"  src="<?php print $show_rec['image']; ?>" ><br>
<table style="width: 800px; height: 400px; margin-left: 230px;" class="table table-responsive table-bordered">
         
                <tr>
                    <td style="background: lightgrey">S/N</td>
                    <td style="background: lightgrey;color: blue; padding-left: 400px"> <?php echo $show_rec['id']; ?></a></td>
                </tr>
                <tr>
                    <td>SURNAME</td>
                    <td style=" color: blue; padding-left: 400px"> <?php echo $show_rec['sname']; ?></td>
                </tr>
                <tr style="background: lightgrey">
                   <td>BAPTISM NAME</td> 
                   <td style="background: lightgrey; color: blue; padding-left: 400px"><?php echo $show_rec['bname']; ?></td>
                </tr>
                <tr>
                  <td>OTHER NAMES</td>
                  <td style=" color: blue; padding-left: 400px"> <?php echo $show_rec['oname']; ?></td>
                </tr>
                <tr>
                   <td style="background: lightgrey">GENDER</td> 
                   <td style="background: lightgrey; color: blue; padding-left: 400px"><?php echo $show_rec['gender']; ?></td>
                </tr>
                <tr>
                   <td>DATE OF BIRTH</td> 
                   <td style=" color: blue; padding-left: 400px"><?php echo $show_rec['dob']; ?></td> 
                </tr>
                <tr>
                   <td style="background: lightgrey">DATE OF BAPTISM</td>
                   <td style="background: lightgrey; color: blue; padding-left: 400px"><?php echo $show_rec['dobp']; ?></td>
                </tr>
                <tr>
                    <td>FATHER</td>
                    <td style="color: blue; padding-left: 400px"><?php echo $show_rec['faname']; ?></td>
                </tr>
                <tr>
                    <td style="background: lightgrey">MOTHER</td>
                     <td style="background: lightgrey; color: blue; padding-left: 400px"><?php echo $show_rec['moname']; ?></td>
                </tr>
                 <tr>
                    <td>GODPARENT</td>
                    <td style="color: blue; padding-left: 400px"><?php echo $show_rec['gfmname']; ?></td>
                </tr>
                 <tr>
                     <td style="background: lightgrey">PRIEST</td>
                     <td style="background: lightgrey; color: blue; padding-left: 400px"><?php echo $show_rec['priname']; ?></td>
                </tr> 
                  <tr>
                     <td>DATE OF REGISTRATION</td>
                     <td style=" color: blue; padding-left: 400px"><?php echo $show_rec['date_of_reg']; ?></td>
                </tr>  
                <tr>
                     <td style="background: lightgrey;">TIME OF REGISTRATION</td>
                     <td style="background: lightgrey; color: blue; padding-left: 400px"><?php echo $show_rec['time_of_reg']; ?></td>
                </tr>     
                <tr>
                     <td>USER</td>
                      <td style=" color: blue; padding-left: 400px"><?php echo $show_rec['user'];?></td><?php ?>
                </tr>
                
    </table>        
</body>         
          
<script>
    function delete_ani(del_id){
       confirm_delete("#yes","btn btn-danger",del_id);
    return;
        }
    function delete_spinn(msg_id,type,size){
        $(msg_id).fadeIn('fast')
         .html("<i class=\"fa "+type+" "+size+" fa-spin\" style=\"color:white\"></i>")
         .delay(0)
         .fadeOut('fast');
    return;
    }
    function deleting(di){
        $(di).fadeIn('fast')
        .html("<i class=\"glyphicon glyphicon-trash fa-2x  fa-spin\"></i>")    
        .delay(9000)
        .fadeOut('slow');
    }    
    function delete_done(id){
       deleting("#yes");
       document.location.href="delete.php?delete_id= "+id+"";
    }
    function confirm_delete(msg_id,type,id){
        pop_it("myModal","close","no");
        $(msg_id).fadeIn('fast')
       .html("<form method=\"post\">\n\
        <button onclick=\"delete_done("+id+")\" name=\"delete\" class=\""+type+"\"><i class=\"glyphicon glyphicon-trash fa-spin\"></i><b>YES</b></button></form>");
   return;
      }
    //modal pop up
     function pop_up(modal_id){
       var modal = document.getElementById(modal_id);  
        modal.style.display="block";  
     }
     function hide_popup(button_class, modal_id,button_id ){
      var span = document.getElementsByClassName(button_class)[0];
      var no = document.getElementById(button_id);
      var modal = document.getElementById(modal_id);
      span.onclick = function(){
                modal.style.display = "none";
            };
      no.onclick = function(){
                modal.style.display = "none";
            };
      window.onclick = function(){
                if(event.target.span === modal | event.target.no === modal){
                    modal.style.display = "none";
                }
            };
     }
        function pop_it(modal,button,button1){
        pop_up(modal);
        hide_popup(button,modal,button1);
             }  
</script>

<br>
<?php 
}}  else {
   echo ('<br><center><b class="error alert alert-danger fa fa-warning fontmsg" style=" font-weight: bold;"> Rocord not found</b></center>');
   ?>
    <center><a href="view_bap_rec.php">
        <button name="back" id="msg" class="btn btn-primary" onclick='spinning("#msg","fa-spinner","fa-1x")' style=" font-size: 16px">
        <i class="glyphicon glyphicon-backward"></i> Back to records <i class="glyphicon glyphicon-backward"></i></button>
    </a></center>
    <?php
}
?>
<!--update modal pop up starts here--> 
<style>
         .modalm{
                display: none;
                position: fixed;
                z-index: 999;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                opacity: 0.95;
                background: whitesmoke;
                filter:alpha(opacity=50);
            }
           /* modal content box*/
           .modal-contentm{
               background: whitesmoke;
               padding: 20px;
               width: 100px;
               border-radius: inherit;
           }
           /* close button*/
           .closem{
               color:black;
               margin-left: 10px;
               font-size: 28px;
               //font-weight: bold;    
           }
     </style>
     
<div id="modal_scope" class="modalm"> 
    <?php 
if(isset($_GET['id'])){ 
$data = mysql_real_escape_string($_GET["id"]);
 $tablename = "bap_records";
 $tablecolum = "id";
 $value = ":id"; 
 $binddata = array("$value" => $data);
 $where = "$tablecolum = $data";
$don = login($tablename, $binddata, $where);
if(!$don){
    echo ('<br><center><b class="error alert alert-danger fa fa-warning fontmsg" style=" font-weight: bold;"> Rocord has been deleted or does not exist</b></center>'); 
   ?>
   <center><a href="view_bap_rec.php">
                    <button name="back" id="msg" class="btn btn-primary" onclick='spinning("#msg","fa-spinner","fa-1x")' style=" font-size: 16px">
                    <i class="glyphicon glyphicon-backward"></i> Back to records <i class="glyphicon glyphicon-backward"></i></button>
    </a></center>
    <?php
}
while($show_rec =$get_rec->fetch()){
?>  
<div class="modal-contentm" style=" width: 90%; margin-left: 180px; margin-top:0px ">
    <div id="mmsg" style=" margin-left: 340px"></div>
    <div class="modal-body" style="  ">
        <div class="" style= "background: #cc0000; width: 75%;  height: 40px; border-top-right-radius: 20px; border-top-left-radius: 20px;"> 
            <span style="margin-left:340px; color: whitesmoke; font-weight: bold; font-size: 18px"><i class="glyphicon glyphicon-edit"></i>&nbsp;UPDATE RECORD</span>
            <button class="closem" style="background: none; color: whitesmoke; border: none; margin-left: 300px">&timesbar;</button>
        </div>
       
        <form action="" name="myform" id="myform" onsubmit="return valid('mmsg',['sname','bname','oname','gender','dob', 'dobp','faname','moname','gfmname','priname','dor','tor','user']);" method="POST" enctype="multipart/form-data" class=" container-fluid">   
            <table class=" tshadow " style="font-size: 16px; margin-top: 6px">
              <tr>
                <td style="">
                <span style=" margin-right: 200px">SURNAME</span><br>
            <div class=" input-group tbox  col-md-1 ">
                    <span class=" input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                    </span>
                <input type="text" name="sname" value="<?php echo $show_rec['sname'] ?>"  class=" form-control tbox" id="sname"  placeholder="SURNAME">
            </div><br>
                 <span style=" margin-right: 200px">BAPTISM NAME</span><br>
            <div class=" input-group tbox  col-md-1 ">
                    <span class=" input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                    </span>
                <input type="text" name="bname" value="<?php echo $show_rec['bname'] ?>" class=" form-control tbox" id="bname" placeholder="BAPTISM NAME">
                 </div><br>
           <span style=" margin-right: 200px">LAST NAME</span><br>
           <div class=" input-group tbox">
                    <span class=" input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                    </span>
               <input type="text" name="oname" value="<?php echo $show_rec['oname'] ?>" class=" form-control tbox" id="oname" placeholder="LAST NAME">
                 </div><br>
                 <span style=" margin-right: 200px">GENDER</span><br>
           <div class="input-group">
               <select type="text" name="gender" value="" id="gender"  class="form-control tbox">
                    <option><?php echo $show_rec['gender'] ?></option>
                    <option>Male</option> 
                    <option>Female</option> 
                </select>
            </div>  
              
                </td>
                <td style="padding-left: 70px">
                  <span style=" margin-right: 170px">DATE OF BIRTH</span><br>
           <div class=" input-group tbox">
                    <span class=" input-group-addon">
                        <i class="fa fa-calendar fa-lg"></i>
                    </span>
               <input type="date" name="dob" id="dob" value="<?php echo $show_rec['dob'] ?>" class=" form-control tbox" placeholder="format:yyyy-mm-dd. (eg. 2001-03-30)">
           </div><br>
       
          <span style=" margin-right: 200px">DATE OF BAPTISM</span><br>
           <div class=" input-group tbox">
                    <span class=" input-group-addon">
                        <i class="fa fa-calendar fa-lg"></i>
                    </span>
               <input type="date" name="dobp" value="<?php echo $show_rec['dobp'] ?>" id="dobp" class="form-control tbox" placeholder="format:yyyy-mm-dd. (eg. 2001-03-30)">
                  </div><br>
                  <div class="" >
                      
                      <label class="camera" for="myfile">
                         <i class=" glyphicon glyphicon-user fa-5x " style="margin-left: 12px; margin-top: 0px"></i><br>
                         <i class=" glyphicon glyphicon-camera fa-lg " style="margin-left: 12px; margin-top: 0px"></i>
                      </label>
                      <div><b style="font-size:14px; ">upload picture</b></div>
                      <div><u style="color: firebrick; font-size: 13px">(image size should be 1mb or less)</u></div>
                      <input type="file" name="myfile" value="<?php echo $show_rec['image'] ?>" id="myfile" style="height: 0px; width: 0px; visibility: hidden" class=" form-control">
                  </div>
                </td>
        </tr>
    </table>
       
    <table class=" tshadow" style="font-size: 16px; margin-top:10px;"> 
            <tr>
                <td >
                <span style=" margin-right: 200px">FATHER'S NAME</span><br>
                   <div class=" input-group tbox">
                    <span class=" input-group-addon">
                        <i class="fa fa-user fa-lg"></i>
                    </span>
                       <input type="text" name="faname" value="<?php echo $show_rec['faname'] ?>" id="faname" class=" form-control tbox" placeholder="SURNAME FIRST">
                 </div><br>
                 <span style=" margin-right: 190px">MOTHER'S NAME</span><br>
                 <div class=" input-group tbox">
                    <span class=" input-group-addon">
                        <i class="fa fa-user fa-lg"></i>
                    </span>  
               <input type="text" name="moname" value="<?php echo $show_rec['moname'] ?>" id="moname" class=" form-control tbox" placeholder="SURNAME FIRST">
               </div><br>
               <span style=" margin-right: 200px">GODPARENT</span><br>
           <div class=" input-group tbox">
                    <span class=" input-group-addon">
                        <i class="fa fa-user fa-lg"></i>
                    </span>
               <input type="text" name="gfmname" value="<?php echo $show_rec['gfmname'] ?>" id="gfmname" class=" form-control tbox" placeholder="SURNAME FIRST">
                 </div><br>
            <span style=" margin-right: 200px">PRIEST IN CHARGE</span><br>
           <div class=" input-group tbox">
                    <span class=" input-group-addon">
                        <i class="fa fa-user fa-lg"></i>
                    </span>
               <input type="text" name="priname" value="<?php echo $show_rec['priname'] ?>" id="prisname" class="form-control tbox" placeholder="SURNAME FIRST">
            </div><br>
               </td>
               <td style="padding-left: 70px">
            <span style=" margin-right: 200px">DATE OF REGISTRATION</span><br>
            <div class=" input-group tbox">
                    <span class=" input-group-addon">
                        <i class="fa fa-user fa-lg"></i>
                    </span>
                <input type="text" name="dor" value="<?php echo $show_rec['date_of_reg'] ?>" id="dor"  disabled="disabled"class="form-control tbox" placeholder="">
            </div><br>
            <span style=" margin-right: 200px">TIME OF REGISTRATION</span><br>
            <div class=" input-group tbox">
                    <span class=" input-group-addon">
                        <i class="fa fa-user fa-lg"></i>
                    </span>
                <input type="text" name="tor" disabled="disabled" value="<?php echo $show_rec['time_of_reg'] ?>" id="tor" class="form-control tbox" placeholder="">
            </div><br>
            <span style=" margin-right: 200px">USER</span><br>
            <div class=" input-group tbox">
                    <span class=" input-group-addon ">
                        <i class="fa fa-user fa-lg"></i>
                    </span>
                <input type="text" name="user" disabled="disabled" value="<?php echo $show_rec['user'] ?>" id="user" class="form-control tbox" placeholder="">
            </div><br>
            <div id="spin_modal" style="margin-left: 20px;"></div>
            <button type="submit" name="update" id="update" onclick='spinning("#spin_modal","fa-spinner","fa-2x");'  class="btn btn-primary" style=" font-weight: bold; color: white; ">
                  UPDATE
                </button>
                 </td>
              </tr>
           </table>
            
        </form>
    </div>
</div> 
<?php 

   } 
}

?>
</div>
     
<?php if(isset($_POST['update'])){
      if(isset($_SESSION['username'])){
    $id = mysql_real_escape_string($_GET['id']);
$data = array(
    htmlspecialchars($_POST['sname']),
    htmlspecialchars($_POST['bname']),
    htmlspecialchars($_POST['oname']),
    htmlspecialchars($_POST['faname']),
    htmlspecialchars($_POST['moname']),
    htmlspecialchars($_POST['gfmname']),
    htmlspecialchars($_POST['priname']),
    htmlspecialchars($_POST['dob']),
    htmlspecialchars($_POST['dobp']),
    htmlspecialchars($_POST['gender'])
            );
        $image = $_FILES['myfile']['name'];
        $location = 'uploads/'.$image;
        $tmp_name = $_FILES['myfile']['tmp_name'];
        if(empty($image)){
        $query = $conn->prepare("update bap_records set sname=?, bname=?, oname=?, faname=?, moname=?, gfmname=?, priname=?, dob=?, dobp=?, gender=?, updated_date='$date' where id=$id");
       // uploadimage($image, $tmp_name, $location);
        $done = $query->execute($data);
         if($done){
           echo("<script>SucccesMessage('#mssg','Record updated successfully','');</script>");
           echo ("<script>refreshpage('#refresh','fa-2x')</script>");
         } 
        }  else {
          $query = $conn->prepare("update bap_records set sname=?, bname=?, oname=?, faname=?, moname=?, gfmname=?, priname=?, dob=?, dobp=?, gender=?, updated_date='$date', image='$location' where id=$id");
          uploadimage($image, $tmp_name, $location);
          $done = $query->execute($data);
         if($done){
           echo("<script>SucccesMessage('#mssg','Record updated successfully','');</script>");
           echo ("<script>refreshpage()</script>");
           
         }   
        }
      }  else {
          die("<script>ErrorMessage('#mssg','Access denied! Modifications can only be done by admin user','');</script>");  
      }
} ?>
     <!--end of modal pop up--->
     
     <!--modal pop up js--->
     <script>
        function pop_update(modal_id){
        var scope = document.getElementById(modal_id);  
        scope.style.display="block";  
     }
     function hide_popup(button_class, modal_id,button_id ){
      var span = document.getElementsByClassName(button_class)[0];
      var no = document.getElementById(button_id);
      var scope = document.getElementById(modal_id);
      span.onclick = function(){
                scope.style.display = "none";
            };
      no.onclick = function(){
                scope.style.display = "none";
            };
      window.onclick = function(){
                if(event.target.span === scope | event.target.no === scope){
                    scope.style.display = "none";
                }
            };
     }
        function update_pop(button_class,modal_id,button_id){
        pop_up(modal_id);
        hide_popup(button_class,modal_id,button_id);
             }  
     </script>
     <!--- ends here--->
     <div style="margin-top: 5px">
    <?php include 'footer.php'; ?>
    </div>
<?php
ob_end_flush();