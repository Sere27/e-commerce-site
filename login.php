<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div class="clearfix">

    <form action="../netting/islem.php" method="POST">

      <h2><span class="entypo-login"><i class="fa fa-sign-in"></i></span> Login</h2>      
      <button class="submit" name=""><span class="entypo-lock"><i class="fa fa-lock"></i></span></button>

      <!-- Username -->
      <span class="entypo-user inputUserIcon">
       <i class="fa fa-user"></i>
     </span>
     <input type="text" class="user" name="kullanici_mail" placeholder="Kullanıcı Mail"/>
     
     <!-- Password -->
     <span class="entypo-key inputPassIcon">
       <i class="fa fa-key"></i>
     </span>
     <input type="password" class="pass" name="kullanici_password" placeholder="Şifre"/>

   </form>
   <?php 

   if(isset($_GET['durum'])){
     if($_GET['durum']=="ok"){ ?>

      <b style="color:green;"> İşlem Başarılı! </b>

      <?php
    } elseif($_GET['durum']=="no"){ ?>

      <b style="color:red;"> İşlem Başarısız! </b>

    <?php } 
  }
  ?>

</div>


</body>
</html>