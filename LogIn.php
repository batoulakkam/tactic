<!DOCTYPE html>
<html lang="ar">
<head>
<title> تسجيل الدخول </title>
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <!-------------------------------------------------------------------------->

    <link rel="shortcut icon" href="image/logo.ico" type="image/x-icon" />

</head>
<body>
<div class ="headerNav">
               <nav class="navbar navbar-inverse"  data-offset-top="10">
                
                <div class="container-fluid">
       
                 
              
                      <ul class="topnav">
					<a class="navbar-brand titleNav" href="#" style ="color:cornflowerblue;float:right;">تكتيك</a>
                    <li><a  href="register.html" >الإشتراك</a></li>
                    <li><a class="active" href="LogIn.html">تسجيل الدخول</a></li>
                    <li><a href="#contact">تواصل معنا</a></li>
                    <li><a href="#about">حولنا</a></li>         
                          </ul>
						  

                </div>
              </nav>
    </div>

  <!-- Body of register Page -->
  <div class="mainContent">
    <div class="pageTitel">
       <h1> تسجيل الدخول   </h1>
          </div>
    <div class ="container">
        <form action="php/singIn.php" method="post" class="formDiv" autocomplete="on">
            
            <table class="tabelForm">
     

  
  <tr>
    <td>   <input type="email" id="email" name="Email" placeholder="أدخل بريدك الإلكتروني" autocomplete="off" style=" width:400px" required  ></td>
    <td><label for="email"> : البريد الإلكتروني </label></td>
  </tr>
  
  <tr>
    <td><input type="password" id="password" name="Password" placeholder="أدخل كلمة السر"  style=" width:400px" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange='check_pass();' title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"required ></td>
    <td>  <label for="password"> : كلمة السر </label></td>
	
  </tr>
  
<td> <a href="resetPassWord.html">نسيت كلمة المرور؟</a></td>
 
<tr>
   <td> <input type="submit" value=" تسجيل الدخول" class="btn btn-primary" center id="submit" > </td>
  </tr> 
      <?php
    if($_GET['error']){
      echo "<div class='alert alert-danger ' role='alert'>
  تحقق من كلمة المرور أو البريد الالكتروني 
</div>";}
      ?>
</table>
        
  </form>
 </div>  

      
      
  </div>

  <!-- end of  register inputs -->

<script src="js/javaScriptfile.js"></script>
</body>
</html>