 <?php 

 include 'header.php';


 $kullaniciSor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
 $kullaniciSor->execute(array(
  'id' => $_GET['kullanici_id']
));

 $kullaniciCek=$kullaniciSor->fetch(PDO::FETCH_ASSOC);

 ?>
 <!-- page content -->
 <div class="right_col" role="main">
  <div class="">
   <div class="clearfix"></div>
   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Kullanıcı Düzenle<small>İşlem Durumu</small>

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

        </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up">&nbsp;&nbsp;&nbsp;</i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />

        <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

          <?php 
          $zaman = explode(" ",$kullaniciCek['kullanici_zaman']);
          ?>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Kayıt Tarihi  <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="date" id="first-name" name="kullanici_zaman" required="required" value="<?php echo $zaman["0"] ?>" class="form-control col-md-7 col-xs-12"  disabled="">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı TC  <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" name="kullanici_tc" required="required" value="<?php echo $kullaniciCek["kullanici_tc"] ?>" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Ad Soyad <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" name="kullanici_adsoyad" required="required" value="<?php echo $kullaniciCek["kullanici_adsoyad"] ?>" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Mail <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" name="kullanici_mail" required="required" value="<?php echo $kullaniciCek["kullanici_mail"] ?>" class="form-control col-md-7 col-xs-12" disabled="">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Durum <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
             <select id="heard" class="form-control" name="kullanici_durum" required>

               <option value="1" <?php echo $kullaniciCek['kullanici_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>


               <option value="0" <?php if ($kullaniciCek['kullanici_durum']==0) { echo 'selected=""'; } ?>>Pasif</option> 

             </select>
           </div>
         </div>

         <input type="hidden" name="kullanici_id" value="<?php echo $kullaniciCek['kullanici_id'] ?>">


         <div class="ln_solid"></div>
         <div class="form-group">
          <div align='right' class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
           <button type="submit" name="kullaniciduzenle" class="btn btn-success">Güncelle</button>
         </div>
       </div>
     </form>

   </div>
 </div>
</div>
</div>

</div>
</div>


<?php include 'footer.php' ?>