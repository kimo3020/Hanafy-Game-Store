
<?php
session_start();
?>
<?php
    require_once('../mysqli_connect.php');


    //Checking Admin credentials
    $SignupErr="";
    $query ="SELECT * FROM `user` WHERE `mail` LIKE '".$_POST['email']."' AND `password` LIKE '".$_POST['pass']."'";
    $res=@mysqli_query($dbc,$query);
    if(isset($_POST['submit'])){
    if($res){

    $My_mail=trim($_POST['email']);
    $My_pass=trim($_POST['pass']);
    //Fetching Database credentials    
    $row = mysqli_fetch_array($res);
    //Checking Admin Credentials with the input
    if($row['mail']==$My_mail&&$row['password']==$My_pass&& $row['level']==2)
    {   
        //echo '<p>Email:'.$row['mail'].'<br></p>';
        $_SESSION['Fname']=$row['fname'];
        $_SESSION['Lname']=$row['lname'];
        header("location:main.php");
        exit;   
    }
    //Error Ouput
    else {
        
        $SignupErr="Incorrect Email or password";
        header("location:index.php?error=1");
    }
    }
    else 
    {
    echo '<p> Error</p>';
    }
    }
?>