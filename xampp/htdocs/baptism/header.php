<?php
session_start();
 include 'function.php';
 ?>
<html> 
    <head>
        <script type='text/javascript' src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <script type='text/javascript' src="messagebox.js/js/jquery.messagebox.js"></script>
        <script rel="stylesheet" href="messagebox.js/js/jquery.messagebox.min.js"></script>
        <script type="text/javascript" src="functions.js"></script>
        <link rel="stylesheet" href="messagebox.js/css/messageBox.min.css">
        <link rel="stylesheet" href="messagebox.js/css/messageBox.css">
        <script type='text/javascript' src="bootstrap/js/bootstrap.min.js"></script>
         <link href="bootstrap/css/bootstrap.css" rel="stylesheet"/>
         <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
        <link rel="stylesheet" href="css/font-awesome.min.css">
    </head>   
        <style>
          /* modal background*/
          
            .camera:hover,
           .camera:focus{
               cursor: pointer;
               zoom:129%;
               position: relative
           } 
            .modal{
                display: none;
                position: fixed;
                z-index: 999;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                opacity: 0.94;
                background: whitesmoke;
                filter:alpha(opacity:50);
            }
           /* modal content box*/
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
          
        .tbox{width: 390px; height: 38px; box-shadow: 4px 4px 4px grey; border-radius: 7px; }
        .tshadowlogin{text-shadow: 1px 1px 2px  #999; text-align: center}
        .submitbutton{background: lightblue; width: 370px; height: 38px; font-size: 19px; font-weight: bold;}
        .error{color: maroon}
        input:valid{border:1px solid skyblue;}
        .fontmsg{font-size: 16px; height: 40px;}
        .date{margin-left: 250px; color: whitesmoke;}
        .body{background: whitesmoke}
        .head1{text-shadow:1px 1px 2px darkred; font-style: italic; color: skyblue;  font-size: 20px;}
        .link{ text-decoration: none; }
        .header{ background: black;  height: 55px}
        .fa-bars{margin-right:  25px; margin-top: 15px; color: whitesmoke}
        .fa-user-circle{margin-right: 25px; margin-top: 15px; color: whitesmoke}
        .fa-home{margin-right: 25px; margin-top: 15px;color: whitesmoke;}
        .container{width: auto}
        .done{color: seagreen}
    </style>
    <body class="container body">
	
<script>


</script>
        <div class=" head1 container" style="">
            <span style=" font-size: 30px; margin-left: 400px; color: skyblue">ST. MARY'S PRO-CATHEDRAL UDI</span> 
            <spam class="fa fa-car fa-lg"></spam>
        </div>
          
        
        </table>
    <div class="header container">  
        <b href="home.php" style=" color: white; font-size: 13px; text-decoration: none">Home</b>
        <a href="home.php" style=" text-decoration: none"><i class="fa fa-home fa-2x" style=" text-decoration: none"></i></a>
        <?php if(isset($_SESSION['username']) || isset($_SESSION['uname'])){?>
                 <span class="dropdown" style="">
                     <b style=" color: white; font-size: 13px; text-decoration: none">Menu</b>
                     <a href="" class="dropdown-toggle " data-toggle="dropdown" style=""><i class="fa fa-bars fa-2x "><b class="caret" ></b></i></a>
                        <ul class="dropdown-menu " style=" min-width: 50px;">
                            <li><a onclick="spinning('#msg','fa-circle-o-notch','fa-5x')" href="new_bap.php">New Baptism record</a></li><hr style=" margin: auto">
                            <li><a onclick="spinning('#msg','fa-circle-o-notch','fa-5x')" href="view_bap_rec.php">View baptism records</a></li>  
                      </ul>
                 </span>
        
        <?php } ?>
                  <span class="dropdown" >
                      <b  id="" style=" color: white; font-size: 13px; text-decoration: none">User</b>
                        <a href="#" class="dropdown-toggle " data-toggle="dropdown"><i class="fa fa-user-circle fa-2x"><b class="caret"></b></i></a>
                        
                        <ul class="dropdown-menu" style=" min-width: 50px">
                          <li><a href="userlogin.php">Regular user</a></li><hr style=" margin: auto">
                          <li><a href="adminlogin.php">Administrator</a></li> <hr style=" margin: auto">
                          <?php if(isset($_SESSION['username']) || isset($_SESSION['uname'])){?>
                            <li><a href="logout.php">Logout</a></li> 
                             <?php
                             
                          }?>
                        </ul>
                  </span>
        <?php if (isset($_SESSION['username']) || isset($_SESSION['uname'])){ ?>
        <span style="">Logged in</span>
        <b class="" style="color: skyblue; padding-left: 165px; font-size: 18px; text-shadow:1px 1px 2px darkred;">AUTOMATED BAPTISM RECORD</b>
        <?php } else { ?>
        <b class="" style="color: skyblue; padding-left: 320px; font-size: 18px; text-shadow:1px 1px 2px darkred;">AUTOMATED BAPTISM RECORD</b> 
      <?php  }
        getdateandtime(); ?>
                        <span class="date ">
                            <b class="control-label">Date : <?php echo $date;?></b>
                        | <b>Time : <?php echo $timenow;?></b>
                        </span>
      </div>
     
        <!--delete modal pop up--> 
        <div id="myModal" class="modal">
            <div class="" style= " background: #cc0000; width: 45%;  height: 40px; border-top-left-radius: 20px; margin-left: 350px; margin-top: 250px"> 
                <span class="close" style=" ">&timesbar;</span>
                <span><h4 style="font-weight: bold; color: white; padding-top: 15px"><i class=" glyphicon glyphicon-trash" style="color: maroon; margin-right:180px"></i>DELETE CONFIRMATION</h4>   
            </div>
            <div class="modal-content" style=" width: 45%; margin-left: 350px">
                <div class="modal-body" style=" text-align: center; ">
                   <b >Deleting this record will permanently remove it from your computer! Are you sure you want to delete this record? </b> 
                </div>
            </div>
            <div id="modal-footer" style=" width: 45%; height: 40px; border-bottom-right-radius: 20px;background: lightgrey; margin-left: 350px">
                <button  class="" id="yes" onclick="" style=" margin-left: 130px; margin-top: 2px; border: none; background: none"></button>
                <button class="btn btn-danger" id="no" onclick="" style=" margin-left: 250px; font-weight: bold">NO</button> 
            </div>
        </div>
     <!--end of modal pop up--->
    </body>
</html>