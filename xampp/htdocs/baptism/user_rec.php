<?php
ob_start();

include 'header.php';

if (!isset($_SESSION['username'])){
    header('location:adminlogin.php');  
}
?>
<html>
    <head>
      <title>User_records</title>
    </head>
    <style>
        .modal-content{
               background: whitesmoke;
               padding: 20px;
               width: 100px;
               border-radius: inherit;
           }
           /* close button*/
           .close{
               color:black;
               margin-left: 10px;
               font-size: 28px;
               //font-weight: bold;    
           }
           .close:hover,
           .close:focus{
               color: black;
               text-decoration: none;
               cursor: pointer;
           }
    </style>
<html>
<body class="body container">
<h4 style="text-align: center; background: lightgray; color: darkslategray; font-weight: bold">USERS DETAILS</h4>
<table class=" container table-bordered table-responsive" style="width: 1335px">
    <tr style=" text-align: center; font-weight: bold; background: lightgrey">
        <td>USER ID</td>
        <td>SURNAME</td>
        <td>FIRST NAME</td>
        <td>USERNAME</td>
        <td>PASSWORD</td>
        <td>DATE OF REGISTRATION</td>
        <td>TIME OF REGISTRATION</td>
        <td>DELETE RECORD</td>
    </tr>
    <?php
            $tablename = "users";
            login($tablename,'','');
            while($show_rec = $get_rec->fetch()){
            ?>
    <tr style=" text-align: center; background: ">
        <td><?php echo $show_rec['user_id']; ?></td>
        <td><?php echo $show_rec['sname']; ?></td>
        <td><?php echo $show_rec['fname']; ?></td>
        <td><?php echo $show_rec['uname']; ?></td>
        <td><?php echo $show_rec['pword']; ?></td>
        <td><?php echo $show_rec['date']; ?></td>
        <td><?php echo $show_rec['time']; ?></td>
        
        <td>

            <button id="<?php echo $show_rec['user_id'];?>" name="dele"  onclick='return delete_ani( <?php echo $show_rec['user_id'];?> )' class="btn btn-danger">
                <i class="glyphicon glyphicon-trash"></i><b>&nbsp;DELETE</b></button>
         </td>
    </tr>
            <?php }?>
</table>

<!-- modal pop up-->    
        <div id="uModal" class="modal">
            <div class="" style= " background: #cc0000; width: 45%;  height: 40px; border-top-left-radius: 20px; margin-left: 350px; margin-top: 250px"> 
                <span class="close" style=" ">&timesbar;</span>
                <span><h4 style="font-weight: bold; color: white; padding-top: 15px"><i class=" glyphicon glyphicon-trash" style="color: maroon; margin-right:180px"></i>DELETE CONFIRMATION</h4>   
            </div>
            <div class="modal-content" style=" width: 45%; margin-left: 350px">
                <div class="modal-body" style=" text-align: center;">
                   <b >Are you sure you want to remove this user? The user will be denied access to this system.</b> 
                </div>
            </div>
            <div id="modal-footer" style=" width: 45%; height: 40px; border-bottom-right-radius: 20px;background: lightgrey; margin-left: 350px">
                <button  class="" id="yeso" onclick="" style=" margin-left: 130px; margin-top: 2px; border: none; background: none"></button>
                <button class="btn btn-danger" id="non" onclick="" style=" margin-left: 250px; font-weight: bold">NO</button> 
            </div>
        </div> 
<!--end of modal pop up---> 

<script>
    function delete_ani(del_id){
            confirm_delete("#yeso","btn btn-danger",del_id);
            
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
         deleting("#yeso");
         document.location.href="delete.php?del_id= "+id+"";
      }
                function confirm_delete(msg_id,type,id){
                pop_it("uModal","close","non");
                 $(msg_id).fadeIn('fast')
                .html("<form method=\"post\">\n\
                 <button onclick=\"delete_done("+id+")\" name=\"delete\" class=\""+type+"\"><i class=\"glyphicon glyphicon-trash fa-spin\"></i><b>YES</b></i></button></form>");
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
</html>
 <?php
ob_end_flush();   

