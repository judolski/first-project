function validate(){
        if(document.myform.uname.value === ""){
         alert("Username must not be empty"); 
         document.myform.uname.style.border = "groove 2px maroon";
         document.myform.uname.focus();
          return false;
      }
      if(document.myform.pword.value === ""){
          alert("password must not be empty");
           document.myform.pword.style.border = 'solid 2px maroon';
          document.myform.pword.focus();
          return false;
      }
      return true;
    }
    
function valid(error_msg, field_array){
                for(i=0;i<field_array.length;i++){
            var b = document.getElementById(field_array[i]).value;
                if(b.replace(/\s/g,"") === ""){
                ErrorMessage('#'+error_msg+'','Please Fill all the required fields','#'+field_array[i]);
                return false;        
                } 
            }  
            spinning("#"+error_msg+"","fa-spinner","fa-4x");
}

    function ChangePassword(){
        var a = ['uname','pword','npword','cpword'];
            for(i=0;i<a.length;i++){
            var b = document.getElementById(a[i]).value;
                if(b.replace(/\s/g,"") === ""){
                ErrorMessage('#msg','Please Fill all the required fields','#'+a[i]);
                  return false;        
                } 
            }
            if(document.myform.npword.value.length < 6){
             ErrorMessage('#msg','New password must be more than 5 charaters','#npword'); 
             return false;
            }
            var d = document.getElementById('npword').value;
            if (d.indexOf(' ') > -1){ 
             ErrorMessage('#msg','New password must not contain empty spaces','#npword');
             return false;
            }
            if (document.myform.npword.value !== document.myform.cpword.value){ 
             ErrorMessage('#msg','New password does not match with the Confirm password','#npword,#cpword');
             return false;
            }
            spinning("#msg","fa-spinner","fa-4x");
    }
    
    function new_user(){
            var a = ['sname','fname','uname','pword'];
            for(i=0;i<a.length;i++){
            var b = document.getElementById(a[i]).value;
                if(b.replace(/\s/g,"") === ""){
                ErrorMessage('#msg','Please Fill all the required fields','#'+a[i]);
                  return false;        
                } 
            }
            if(document.myform.pword.value.length < 6){
               ErrorMessage('#msg','New password must be more than 5 charaters','#pword'); 
               return false;
            }
              var d = document.getElementById('pword').value;
            if (d.indexOf(' ') > -1){ 
               ErrorMessage('#msg','New password must not contain empty spaces','#pword');
               return false;
            } 
            spinning("#msg","fa-spinner","fa-4x");
            return true;
    }
    //spin animation
    function spinning(msg_id,type,size){
          $(msg_id).fadeIn('fast')
                  .html("<i class=\"fa "+type+" "+size+" fa-spin\"></i>")
                  .delay(3000)
                  .fadeOut('slow');
      }
      
      function animation(msg_id,type,size){
          $(msg_id).fadeIn('fast')
                  .html("<i class=\"glyphicon "+type+" "+size+"\"></i>")
                  .delay(3000)
                  .fadeOut('slow');
      }
      
    function ErrorMessage(msg_id, error_msg,id){
          $(msg_id).fadeIn('fast')
                  .html("<b class='Error alert alert-danger fa fa-warning fontmsg' style=' font-weight: bold;'> "+error_msg+"</b>")
                  .delay(6000)
                  .fadeOut('slow');
          $(id).focus();
          $(id).css('border','2px solid maroon');
        return;
      }
      
      function SucccesMessage(msg_id, success_msg,id){
          $(msg_id).fadeIn('fast')
                  .html("<b class='done alert alert-success fa fa-check-square fontmsg'style='font-weight: bold;' style=' font-weight: bold;'> "+success_msg+"</b>")
                  .delay(7000)
                  .fadeOut('slow');
          $(id).focus();
          $(id).css('border','2px solid maroon');
        return;
      }
      
      //messagebox
       function msg_close(ret){
                console.log("msg_close -> retour %s", ret);
        }     
        
        
        $( document ).ready(function() {

                var msg = $("body").messageBox({
                        modal:true,
                        cbClose : msg_close,
                        autoClose: 0,
                        locale:{
          NO : 'No',
          YES : 'Yes',
          CANCEL : 'Cancel',
          OK : 'Exit',
          textAutoClose: 'Auto close in %d seconds'
        }
                });
            
        $("#sb").click(function(){
	    msg.data('messageBox').info('<span style="margin-left:20px">Search Catogory</span> <button id="do" style="margin-left:30px; background:none; border:none; color:maroon">&timesbar;</button>', '<html>:<form action="view_bap_rec.php" method="post">\n\
            <span style="width: 180px;margin-left:55px;">SURNAME</span><br><div class=" input-group" style="margin-left:45px; width: 180px; height: 40px;"><span class=" input-group-addon"><i class=" fa fa-user fa-lg" ></i></span><input type="text" class="form-control tbox" name="sname" placeholder="Surname" style="width: 190px;height: 40px;"></div>\n\
           <br><span style="margin-left:55px; width="180px">BAPTISM NAME</span><br><div class=" input-group" style="margin-left:45px; width: 180px;height: 40px;"><span class=" input-group-addon"><i class=" fa fa-user fa-lg" ></i></span><input type="text" class="form-control tbox" name="bname" placeholder="Baptism name" style="width: 190px;height: 40px;"></div>\n\
            <br><button onclick="spinning(\'#msg\',\'fa-circle-o-notch\',\'fa-5x\')" class="btn btn-default" name="sbn" style="margin-left:110px;width: 100px;height: 30px;">search</button></form>');
	});
            
        $("#bb").click(function(){
        msg.data('messageBox').info('<span style="margin-left:20px">Search Catogory</span> <button id="do" style="margin-left:30px; background:none; border:none; color:maroon">&timesbar;</button>', '<html>:<form action="view_bap_rec.php" method="post">\n\
           <span style="width: 180px;margin-left:45px;">BAPTISM NAME</span><br><div class=" input-group" style="margin-left:45px;width: 180px;height: 40px;"><span class=" input-group-addon"><i class=" fa fa-user fa-lg" ></i></span><input type="text" class="form-control tbox" name="bname" placeholder="Baptism name" style="width: 190px;height: 40px;"></div>\n\
          <br><span style="margin-left:45px; width="180px">BIRTH DATE</span><br><div class=" input-group" style="margin-left:45px;width: 180px;height: 40px;"><span class=" input-group-addon"><i class=" fa fa-calendar fa-lg" ></i></span><input type="date" class="form-control tbox" name="dob" placeholder="yyyy-mm-dd" style="width: 190px;height: 40px;"></div>\n\
          <br><button onclick="spinning(\'#msg\',\'fa-circle-o-notch\',\'fa-5x\')" class="btn btn-default" name="bd" style="margin-left:110px;width: 100px;height: 30px;">search</button></form>');
       });
        $("#sbb").click(function(){
	    msg.data('messageBox').info('<span style="margin-left:20px">Search Catogory</span> <button id="do" style="margin-left:30px; background:none; border:none; color:maroon">&timesbar;</button>', '<html>:<form action="view_bap_rec.php" method="post">\n\
            <span style="width: 180px;margin-left:55px;">SURNAME</span><br><div class=" input-group" style="margin-left:45px;width: 180px;height: 40px;"><span class=" input-group-addon"><i class=" fa fa-user fa-lg" ></i></span><input type="text" class="form-control tbox" name="sname" placeholder="Surname" style="width: 190px;height: 40px;"></div>\n\
           <br><span style="margin-left:55px; width="180px">BAPTISM NAME</span><br><div class=" input-group" style="margin-left:45px;width: 180px;height: 40px;"><span class=" input-group-addon"><i class=" fa fa-user fa-lg" ></i></span><input type="text" class="form-control tbox" name="bname" placeholder="Baptism name" style="width: 190px;height: 40px;"></div>\n\
           <br><span style="margin-left:55px; width="180px">BIRTH DATE</span><br><div class=" input-group" style="margin-left:45px;width: 180px;height: 40px;"><span class=" input-group-addon"><i class=" fa fa-calendar fa-lg" ></i></span><input type="date" class="form-control tbox" name="dob" placeholder="yyyy-mm-dd" style="width: 190px;height: 40px;"></div>\n\
           <br><button onclick="spinning(\'#msg\',\'fa-circle-o-notch\',\'fa-5x\')" class="btn btn-default" name="sbb" style="margin-left:110px;width: 100px;height: 30px;">search</button></form>');
	});
          
        
            });   
      
      function msgbox_settings(){
        msg = $("body").messageBox({
                        modal:true,
                        cbClose : msg_close,
                        autoClose: 0,
                        locale:{
          NO : 'No',
          YES : 'Yes',
          CANCEL : 'Cancel',
          OK : 'Exit',
          textAutoClose: 'Auto close in %d seconds'
        }

                });
      }
      function loginForm(){
      $( document ).ready(function() {

                var msg = $("body").messageBox({
                        modal:true,
                        cbClose : msg_close,
                        autoClose: 0,
                        locale:{
          NO : 'No',
          YES : 'Yes',
          CANCEL : 'Cancel',
          OK : 'Exit',
          textAutoClose: 'Auto close in %d seconds'
        }

                });
               
            msg.data('messageBox').warning('<span style="margin-left:20px">USER LOGIN</span>', '<html>:<form action="" method="post">\n\
            <span style="width: 180px;margin-left:45px; font-size:14px">USERNAME</span><br><div class=" input-group" style="margin-left:45px; width: 180px; height: 40px;"><span class=" input-group-addon"><i class=" fa fa-user fa-lg" ></i></span><input type="text" class="form-control tbox" name="uname" id="uname" placeholder="username" style="width: 190px;height: 40px;"></div>\n\
           <br><span style="margin-left:45px; width="180px;font-size:14px">PASSWORD</span><br><div class=" input-group" style="margin-left:45px; width: 180px;height: 40px;"><span class=" input-group-addon"><i class=" fa fa-lock fa-lg" ></i></span><input type="password" class="form-control tbox" name="pword" id="pword" placeholder="password" style="width: 190px;height: 40px;"></div>\n\
           <br><button onclick="spinning(\'#msg\',\'fa-circle-o-notch\',\'fa-5x\')" class="btn btn-default" name="send" style="margin-left:110px;width: 100px;height: 30px; ">Login</button></form>');
	
      });
  }


function refreshpage(){
    spinning("#spin_m","fa-circle-o-notch","fa-2x");
    window.parent.location = window.parent.location.href;
}


     

      
     /*   
    $("#myform").on('addevent', function(e){
        while($("#uname").val() === "" || $("#pword").val() === ""){
            e.preventDefault();
            ErrorMessage("#erroruname", "Please enter a valid Username and Password");
            if ($("#uname").val() === ""){
            document.myform.uname.style.border = 'solid 2px maroon';
            $("#uname").focus();
            break
        }else if($("#pword").val() === ""){
          document.myform.pword.style.border = 'solid 2px maroon';
          document.myform.pword.focus(); 
          break
        }   
    }
    }); */