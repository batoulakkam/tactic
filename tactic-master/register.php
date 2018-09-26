<?php
$masg = "";
use PHPMailer\PHPMailer\PHPMailer;
  if (isset( $_POST['submit'])) {
    // conect to database 
    require_once('connectTosql.php');

     $name= $_POST['name'];
     $email=$_POST['email'];
     $password=$_POST['password'];
     $Password2=$_POST['Password2'];
     $gender=$_POST['gender'];
     $DOB=$_POST['Birthday'];

     //check  the content not impty 
      if($name=="" || $email=="" || $password!=$Password2)
           $masg = "please check your inputs!";
      else{
        $sql = $con-> query( "SELECT id FROM account WHERE emailOrg ='$email' ");
        if( $sql->num_rows > 0 ){
          $masg = "email already exists in the database";
        }else{
          $token = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890<>()!#%&/$*';
          $token= str_shuffle($token);
          $token= substr($token,0,10);

          $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

          //add input to database
          $con->query("INSERT INTO account(emailOrg,passwordOrg,isEmailconfirm,token)
           VALUES ('$email','$hashedPassword','0','$token')");

        $con->query("INSERT INTO  organizer(name-org,gender-org,DOB-org)VALUES ('$name','$gender','$DOB' ) ");
        
        
        include_once "PHPMailer/PHPMailer.php";

        $mail=new PHPMailer();
        // send email from 
        $mail->setFrom('batolakam@hotmail.com');
        // send email to the email have been intered 
        $mail->addAddress($email ,$name);
        // email subject 
        $mail->Subject =" verify email addres for tactick website  ";
        $mail->isHTML(true);
        // eamil body
        $mail->Body =" please click on the link below to verify your email addres <br><br> 
        <a href='http://tactic.com/login.php?email=$email&token=$token'>click her </a>
        ";// close email body

        if ($mail->send())
           $masg ="you have been registered ! please verify your email! ";
        else
        $masg ="حدث خطاء غير متوقع ! فضلا حاول مرة اخرى";
        }

      }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title> الإشتراك </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='http://fonts.googleapis.com/earlyaccess/notonastaliqurdudraft.css' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/earlyaccess/notokufiarabic.css' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="css/layouts/custom.css">
    
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-" crossorigin="anonymous">
    <!-- lobrary of icon  fa fa- --->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <!-- lobrary of style bootstrab 3  --->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <!-- lobrary of style bootstrab 4  --->

    
    <!-------------------------------------------------------------------------->

    <link rel="shortcut icon" href="image/logo.ico" type="image/x-icon" />

</head>
<body>
<div class ="headerNav">
               <nav class="navbar navbar-inverse"  data-offset-top="10">
                
                <div class="container-fluid">
       
                 
              
                      <ul class="topnav">
          <a class="navbar-brand titleNav" href="#" style ="color:cornflowerblue;float:right;"> &nbsp; &nbsp; تكتيك</a>
          
          <ul >
            
                   <li><a class="active" href="register.html">الإشتراك  </a></li>
                    <li><a href="LogIn.html">تسجيل الدخول</a></li>
                    <li><a href="#contact">تواصل معنا</a></li>
                    <li><a href="#about">حولنا</a></li>         
                          </ul>
						  

                </div>
              </nav>
    </div>

  <!-- Body of register Page -->
  <div class="mainContent">
    <div class="pageTitel">
       <h1> الإشتراك   </h1>
          </div>
    <div class ="container">
        <form action="LogIn.html" class="formDiv" autocomplete="on">
          <?php  if ($masg !="") each $masg ;"<br> <br>"?>
            
            <table class="tabelForm" action="register.php">
     
  <tr>
    <td class="rightTd">  <input type="text" id="name" name="Name" placeholder="أدخل اسمك" style=" width:400px"  title="هذا الحقل مطلوب" setCustomValidity('هذا الحقل مطلوب') required  ></td>
      <td class="leftTd">  <label for="name">: الاسم </label></td>
  </tr>
  
  <tr>
    <td>   <input type="email" id="email" name="Email" placeholder="أدخل بريدك الإلكتروني" autocomplete="off" style=" width:400px" required  ></td>
    <td><label for="email"> : البريد الإلكتروني </label></td>
  </tr>
  
  <tr>
    <td><input type="password" id="password" name="Password" placeholder="أدخل كلمة السر"  style=" width:400px" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange='check_pass();' required title="يجب أن تحتوي على الأقل على 8 أحرف و حروف صغيرة و كبيرة" ></td>
    <td>  <label for="password"> : كلمة السر </label></td>
  </tr>
  
  <tr>
    <td><input type="password" id="confirm_password" name="Password2" placeholder="تأكيد كلمة السر "  style=" width:400px"required onchange='check_pass();' ></td>
    <td>  <label for="confirm_password"> : تأكيد كلمة السر </label></td>
  </tr>
  
  <tr>
    <td><input type="date" name="Birthday"  style=" width:400px"></td>
    <td>  <label for="birthday"> : تاريخ الميلاد  </label></td>
  </tr>
 <tr>

    <td> <label class="radio-inline  "> أنثى &nbsp </label> <input type="radio" name="gender" value="female" > 
	<label class="radio-inline " > ذكر &nbsp </label> <input type="radio" name="gender" value="male" > 
  </td>
    <td> <label for="gender"> : الجنس</label></td>	
</tr>
 
<tr>
   <td> <input type="reset" value="الغاء" class="btn btn-danger">
   <input type="submit" value="تسجيل" class="btn btn-primary" center id="submit" >
     </td>
  </tr> 

  
  
  
  
  
  

</table>
        
  </form>

    </div>        
  </div>

  <!-- end of  register inputs -->

<script src="js/javaScriptfile.js"></script>
</body>
</html>