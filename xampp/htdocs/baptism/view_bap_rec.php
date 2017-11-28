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
            .search-link{text-decoration: none; color: black}
        </style>
        <title>baptism records</title>
    </head>
    <body class="container" style="background: whitesmoke" onload="">
        <?php if(!(isset($_POST['sbn']) || isset($_POST['bd']) || isset($_POST['sbb']))){
           echo '<h4 style="text-align: center; background: lightgray; color: darkslategray; font-weight: bold">BAPTISM RECORDS</h4>';}?>
       <?php if(isset($_POST['sbn']) && !empty($_POST['sname']) && !empty($_POST['bname'])){
           echo '<h4 style="text-align: center; background: lightgray; color: darkslategray;">Search Result(s) For  "'.$_POST['sname'].'" "'.$_POST['bname'].'"</h4>';}?>
        <?php if(isset($_POST['bd']) && !empty($_POST['bname']) && !empty($_POST['dob'])){
           echo '<h4 style="text-align: center; background: lightgray; color: darkslategray;">Search Result(s) For  "'.$_POST['bname'].'" With Birth Date "'.$_POST['dob'].'"</h4>';}?>
        <?php if(isset($_POST['sbb']) && !empty($_POST['sname']) && !empty($_POST['bname']) && !empty($_POST['dob'])){
           echo '<h4 style="text-align: center; background: lightgray; color: darkslategray;">Search Result(s) For "'.$_POST['sname'].'" "'.$_POST['bname'].'" With Birth Date "'.$_POST['dob'].'"</h4>';}?>
        <table class=" container table table-responsive table-bordered" border="3" style="width: 1320px;">
            <div style=" text-align: center" id="msg"></div>
            <tr style=" text-align: center; background: lightgrey; font-weight: bold">
                <td class="">S/N</td>
                 <td>SURNAME</td>
                  <td>BAPTISM NAME</td>
                   <td>OTHER NAMES</td>
                    <td>GENDER</td>
                     <td>DATE OF BIRTH</td>
                      <td>DATE OF BAPTISM</td>
                       <td>FATHER</td>
                       <td>MOTHER</td>
                       <td>FULL DETAILS</td>
                       <td>DELETE RECORD</td>
                       
            </tr>
            
            <?php 
            $tablename = "bap_records";
            if(!isset($_POST['sbn']) || !isset($_POST['bd']) || !isset($_POST['sbb'])){
                $where = "";
                $binddata="";
                login($tablename, $binddata, $where);
                
            }
            if(isset($_POST['sbn']) || isset($_POST['bd']) || isset($_POST['sbb'])){
                    $pword = $_POST['bname'];
                    $tablecolum2 = "bname";
                    $tablename = "bap_records";
                    $username = ":sname";
                    $password = ":bname";
                   
                  
                if(isset($_POST['sbn'])){
                    
                     $uname = $_POST['sname'];
                     $tablecolum1 = "sname";
                     $post =  empty($pword) || empty($uname);
                     $binddata = array("$username"=>$uname, "$password"=>$pword);
                     $where = "$tablecolum1 = $username and $tablecolum2 = $password";
                }
                if(isset($_POST['bd'])){
                    
                     $uname = $_POST['dob'];
                     $tablecolum1 = "dob";
                     $post =  empty($pword) || empty($uname);
                     $binddata = array("$username"=>$uname, "$password"=>$pword);
                     $where = "$tablecolum1 = $username and $tablecolum2 = $password";
                }
                 
                if(isset($_POST['sbb'])){
                    
                     $uname = $_POST['sname'];
                     $data = ":dob";
                     $tablecolum1 = "sname";
                     $dob = $_POST['dob'];
                     $tablecolum3 = "dob";
                     $post =  empty($pword) || empty($uname) || empty($dob);
                     $binddata = array("$username"=>$uname, "$password"=>$pword, "$data"=>$dob);
                     $where = "$tablecolum1 = $username and $tablecolum2 = $password and $tablecolum3 = $data";
            }
            login($tablename, $binddata, $where);
                }
            while($show_rec = $get_rec->fetch()){
            ?>
            <tr style="text-align: center; background: white ">
                <td>  <a onclick="spinning('#msg','fa-circle-o-notch','fa-2x')" href="full_search.php?id=<?php echo ($show_rec['id']); ?> "><?php echo $show_rec['id']; ?></a></td>
            <td><a class="search-link" onclick="spinning('#msg','fa-circle-o-notch','fa-2x')" href="full_search.php?id=<?php echo ($show_rec['id']); ?> "><?php echo $show_rec['sname']; ?></a></td>
            <td> <a class="search-link" onclick="spinning('#msg','fa-circle-o-notch','fa-2x')" href="full_search.php?id=<?php echo ($show_rec['id']); ?> "><?php echo $show_rec['bname']; ?></a></td>
            <td><a class="search-link" onclick="spinning('#msg','fa-circle-o-notch','fa-2x')" href="full_search.php?id=<?php echo ($show_rec['id']); ?> "> <?php echo $show_rec['oname']; ?></a></td>
                <td><?php echo $show_rec['gender']; ?></td>
                <td><?php echo $show_rec['dob']; ?></td>
                <td><?php echo $show_rec['dobp']; ?></td>
                <td><?php echo $show_rec['faname']; ?></td>
                <td><?php echo $show_rec['moname']; ?></td>
                <td> 
                    <button  id="<?php echo $show_rec['id'];?>" class="btn btn-info " onclick='folder_open( <?php echo $show_rec['id'];?> )'>
                        <i  class="fa fa-folder  fa-lg"><b>&nbsp;VIEW</b></i> 
                    </button>
                </td>
                <td>
                    
                    <button id="1<?php echo $show_rec['id'];?>" name="del"  onclick='return delete_ani( <?php echo $show_rec['id'];?> )' class="btn btn-danger">
                        <i class="glyphicon glyphicon-trash"></i><b>&nbsp;DELETE</b></button>
                 </td>
    
                   
            </tr >
            <?php } ?>
        </table>
      <?php 
      if(isset($_POST['sbn'])){
      if($post){
        die('<center><b class="Error alert alert-danger fa fa-warning fontmsg" style=" font-weight: bold;"> Please fill Required Fields</b></center>');
      }}
      if(isset($_POST['bd'])){
      if($post){
        die('<center><b class="Error alert alert-danger fa fa-warning fontmsg" style=" font-weight: bold;"> Please fill Required Fields</b></center>');
      }}
      if(isset($_POST['sbb'])){
      if($post){
        die('<center><b class="Error alert alert-danger fa fa-warning fontmsg" style=" font-weight: bold;"> Please fill Required Fields</b></center>');
      }}
    
      
      if($check_row <= 0){
        die('<center><b class="error alert alert-danger fa fa-warning fontmsg" style=" font-weight: bold;"> Record not found</b></center>');
        }

        ?>
    
 <script>
     //open and delete records functions
        function folder_open(id){
            animation("#"+id,"glyphicon-folder-open","fa-2x");
            spinn("#msg","fa-spinner","fa-2x");
            window.location.href='full_search.php?id='+id+'';
        return;
        }
         function delete_ani(del_id){
            confirm_delete("#yes","btn btn-danger",del_id);
            
        return;
        }

        function spinn(msg_id,type,size){
            $(msg_id).fadeIn('fast')
             .html("<i class=\"fa "+type+" "+size+" fa-spin\" style=\"color:skyblue\"></i>")
             .delay(6000)
             .fadeOut('fast');
        return;
        }
      function deleting(di){
          $(di).fadeIn('fast')
          .html("<i class=\"glyphicon glyphicon-trash fa-2x  fa-spin\" style=background:none></i>")    
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
                 <button onclick=\"delete_done("+id+")\" name=\"delete\" class=\""+type+"\"><i class=\"glyphicon glyphicon-trash fa-spin\"></i><b>YES</b></i></button></form>");
        return;
      }
      
  //deleting modal pop up functions called from header
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
                if(event.target.span === modal || event.target.no === modal){
                    modal.style.display = "none";
                }
            };
     }
        function pop_it(modal,button,button1){
        pop_up(modal);
        hide_popup(button,modal,button1);
             }
        </script> 
    </body>
</html>
    
    <?php 
      ob_end_flush();
