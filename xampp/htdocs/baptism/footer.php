<div style="height: 100px; background: black;">
    <table>
        <tr>
            <td style="padding-left:20px">
                <div style="font-size: 14px; text-align: left; margin-top: 5px">
                    <i class="fa fa-user-circle-o" style="color: whitesmoke"></i>&nbsp;Developed by Chidi J. Owo
                </div>
                <div style=" font-size: 14px; text-align: left; margin-top: 10px">
                    <u style="">Contacts</u>
                    <div style=" font-size: 14px">        
                        <i class="fa fa-phone-square" style="color: whitesmoke"></i>&nbsp;07039431836&nbsp;
                        <i style=" color: maroon">|</i>&nbsp;
                        <i  class="fa fa-google" style="color: red; background: white"></i>&nbsp;judolski@gmail.com
                    </div>
                    <div style=" font-size: 14px; margin-top: 4px">
                        <i style="color:blue;"  class="fa fa-facebook-square"></i>&nbsp;Chidi J. Owo&nbsp;
                        <i style=" color: maroon">|</i>&nbsp;
                        <i  class="fa fa-twitter-square " style="color:skyblue"></i>&nbsp;@jUdOLSki
                    </div>
                </div>
            </td>
            <td style="padding-left: 240px; ">
                <div style="text-align: center">
                    <div style="font-size: 13px">Denoted to</div>
                    <div style="margin-top:3px">ST. MARY'S PRO-CATHEDRAL UDI</div>
                    <div style="margin-top:3px; font-size: 13px">By Chidi .J Owo</div>
                </div>
            </td>
            <td style="padding-left: 170px; ">
                <?php if(isset($_SESSION['username'])){
                    $name = $_SESSION['username'];
                    echo '<div class="fa  fa-user">&nbsp;logged in as admin &nbsp;<b style="color:gray;">'.$name.'</b> </div>';
                    echo '<div style="margin-top:4px"><a href="logout.php" class="fa  fa-power-off">&nbsp;Logout</a></div>';
                } ?>
                <?php if(isset($_SESSION['uname'])){
                    $name = $_SESSION['uname'];
                    echo '<div  class="fa  fa-user">&nbsp;logged in as&nbsp;<b style="color:gray;">'.$name.'</b> </div>';
                    echo '<div style="margin-top:4px"><a href="logout.php" class="fa  fa-power-off">&nbsp;Logout</a></div>';
                } ?>
                
            </td>
        </tr>
    </table>
</div>

