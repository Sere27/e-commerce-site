 <?php include 'header.php' ?>
 <!-- page content -->
 <div class="right_col" role="main">
  <div class="">
   <div class="clearfix"></div>
   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>İletişim Ayarları <small>İşlem Durumu</small>

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
      </h2>
      
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <br />

      <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefon Numarası <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="first-name" name="ayar_tel" required="required" value="<?php echo $ayarCek["ayar_tel"] ?>" class="form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefon Numarası(GSM) <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="first-name" name="ayar_gsm" required="required" value="<?php echo $ayarCek["ayar_gsm"] ?>" class="form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Faks Numarası <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="first-name" name="ayar_faks" required="required" value="<?php echo $ayarCek["ayar_faks"] ?>" class="form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="email" id="first-name" name="ayar_mail" required="required" value="<?php echo $ayarCek["ayar_mail"] ?>" class="form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İlçe <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="first-name" name="ayar_ilce" required="required" value="<?php echo $ayarCek["ayar_ilce"] ?>" class="form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İl <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="first-name" name="ayar_il" required="required" value="<?php echo $ayarCek["ayar_il"] ?>" class="form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Adres <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="first-name" name="ayar_adres" required="required" value="<?php echo $ayarCek["ayar_adres"] ?>" class="form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mesai <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="first-name" name="ayar_mesai" required="required" value="<?php echo $ayarCek["ayar_mesai"] ?>" class="form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="ln_solid"></div>
        <div class="form-group">
          <div align='right' class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
           <button type="submit" name="iletisimayarkaydet" class="btn btn-success">Güncelle</button>
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