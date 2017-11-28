
<?php

function my_login(){
    global $check_row, $get_rec;
    if(isset($_POST['send'])){
    if(empty($_POST['uname'])){
        echo ("<script>ErrorMessage('#erroruname','Please enter a valid Username and Password','#uname');</script>");
        }
        else if(empty($_POST['pword'])){
        echo ("<script>ErrorMessage('#erroruname','Please enter a valid Username and Password','#pword');</script>");  
}  else{
    connect();
    $tablename = "users";
    $tablecolum1 = "uname";
    $tablecolum2 = "pword";
    $uname = mysql_real_escape_string($_POST['uname']);
    $pword = mysql_real_escape_string($_POST['pword']);
    $username = ":username";
    $password = ":password";
    $link = 'Location: home.php';
    $binddata = array("$username"=>$uname, "$password"=>$pword);
    $where = "$tablecolum1 = $username and $tablecolum2 = $password";
   login($tablename, $binddata, $where);
  if($check_row <= 0){
   echo ("<script>ErrorMessage(\"#erroruname\", \"Wrong Username or Password\",'');</script>");     
  }
  $session = $get_rec->fetch();
  $_SESSION['uname'] = $session['uname'];
  header($link);
    }

   }
}


function admin_login(){
    global $check_row,$get_rec;
    if(isset($_POST['send'])){
       if(empty($_POST['uname'])){
        echo ("<script>ErrorMessage('#erroruname','Please enter a valid Username and Password','#uname');</script>");
        }
        else if(empty($_POST['pword'])){
        echo ("<script>ErrorMessage('#erroruname','Please enter a valid Username and Password','#pword');</script>");  
    } 
else {
    $tablename = "admin";
    $tablecolum1 = "username";
    $tablecolum2 = "password";
    $uname = mysql_real_escape_string($_POST['uname']);
    $pword = mysql_real_escape_string($_POST['pword']);
    $username = ":username";
    $password = ":password"; 
    $link = 'Location: home.php';
    $binddata = array("$username"=>$uname, "$password"=>$pword);
    $where = "$tablecolum1 = $username and $tablecolum2 = $password";

  login($tablename, $binddata, $where);
  if($check_row <= 0){
     echo ("<script>ErrorMessage(\"#erroruname\", \"Wrong Username or Password\",'');</script>");       
           }  else {
             $session = $get_rec->fetch();
            $_SESSION['username'] = $session['username'];
            header($link);  
           }
}}       
}


function uploadimage($name, $tmp_name, $location,$msg){
    $size = $_FILES['myfile']['size'];
    if(empty ($name)){
    die("<script>ErrorMessage(\"#$msg\", \"Please choose an image\",'#uname,#pword');</script>");
    }
    $check = getimagesize($tmp_name);
    $extension = strtolower(substr($name, strpos($name,'.' )+1));
        $ext = array("jpeg", "jpg");
        if (!$check){
        die ("<script>ErrorMessage(\"#$msg\", \"Sorry, the file is not an image\",'#uname,#pword');</script>");
        } 
        if (in_array($extension, $ext)==FALSE && $size < 1045576){
            die("<script>ErrorMessage(\"#$msg\", \"Sorry, image must be jpg or jpeg\",'#uname,#pword');</script>");
        }elseif (in_array($extension, $ext)==TRUE && $size > 1045576) { 
            die("<script>ErrorMessage(\"#$msg\", \"Sorry, image size must be 1mb or less\",'#uname,#pword');</script>");
    }
move_uploaded_file($tmp_name, $location);   
}


function getdateandtime(){
    global $date, $timenow;
    $time = time();
    $date = date('d-m-20y');
    $timenow = date('h:i:s',$time-(60*60));
}

function insert($tablename, $data, $values){
    global $conn, $bname, $sname, $oname, $msg;
     connect();
    $tabledata = implode(",", $data);
    $tablevalues = implode("','", $values);
    $query = ("INSERT INTO $tablename(".$tabledata.") values('$tablevalues')");
    $do = $conn->prepare($query);
    $do -> execute();
    if($query){
        echo ($msg);
    }else {
        die("<script>ErrorMessage(\"#erroruname\", \"There was problem adding record\",'');</script>");
        
    }
        
    }
 
  function login($tablename, $binddata, $where){
      global $conn, $get_rec, $check_row;
      
      connect();
      
      if(empty($where) && empty($binddata)){
      $get_rec = $conn->prepare("select * from $tablename");
      $get_rec->execute();
      }elseif(!empty($where)){
      $get_rec = $conn->prepare("Select * from $tablename where $where");
      $get_rec->execute($binddata);
      }
      $check_row = $get_rec->rowCount();
      return $check_row;
  }
  
  
  function change_password($tablename, $binddata1, $where1, $setcolums){
      global $conn, $binddata, $where, $check_row;
      if(isset($_POST['submit'])){
      login($tablename, $binddata, $where);
      if ($check_row <= 0) {
           die ("<script>ErrorMessage(\"#msg\", \"Wrong Username or Password\",'#uname,#pword');</script>");
      }
      }
      $get_rec = $conn->prepare("update $tablename set $setcolums where $where1");
      $get_rec->execute($binddata1);
      if ($get_rec) {          
           die("<script>SucccesMessage('#msg','Password Successfully Changed','');</script>");
      }
  }

  function Delete($delete_id, $tablename, $field_name, $link){
        global $conn;
        connect();
        $delete = $delete_id;
        $data = array($delete);
        $query = $conn->prepare("DELETE FROM ". $tablename." WHERE $field_name=?");
        $deleted = $query->execute($data);
      if($deleted){
          header("$link");
      }
      else{
           echo "<font color=\"maroon\"><center>Error: There was a problem deleting this record.</font>";
      }
     }


function clear($tablename, $link){
  $clear = ($truncate_id);
  $con = connection();
  
  $data = array($clear);
 
 $query = $con->prepare("TRUNCATE $tablename");
 $cleared = $query->execute($data);
 
 if($cleared){
     header($link);
 }
 else{
     echo "<font color=\"maroon\"><center>Error: Their was a problem deleting all records.</font>";
 }
}

function backup(){
    global $conn, $backupfile, $tablename;
    connect();
    $result = query("SELECT * INTO OUTFILE '$backupfile' from $tablename");
    if($result){
        echo 'backup done succesfully';
    }
 else {
        echo 'there was a problem';
    }
   
}

  function connect(){
    global $conn;
    include 'config.php';
    try {    
  
            $conn = new PDO('mysql:host=localhost;'. 'dbname='. $config ['DB_NAME'], 
                $config['DB_USERNAME'],
                $config['DB_PASSWORD']);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
    }
    catch(PDOException $e)
    {
    echo  $e->getMessage();
    } 
  }
  