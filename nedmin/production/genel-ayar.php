 <?php include 'header.php' ?>
 <!-- page content -->
 <div class="right_col" role="main">
  <div class="">
   <div class="clearfix"></div>
   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Site Ayarları <small>İşlem Durumu</small>

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
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />


        <form action="../netting/islem.php" method="POST" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo">Logo <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">

              <?php 
              if (strlen($ayarCek['ayar_logo'])>0) { ?>

                <img width="150" src="../../<?php echo $ayarCek['ayar_logo']; ?>">
              <?php }
              else{ ?>

                <img width="150" src="../../dimg/logo-yok.png">

              <?php  } ?>

            </div>
          </div>       

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Logo Seç <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="file" name="ayar_logo" class="form-control col-md-7 col-xs-12">
            </div>
          </div> 

          <input type="hidden" name="eski_yol" value="<?php echo $ayarCek['ayar_logo'] ?>">


          <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" name="logoduzenle" class="btn btn-primary">Güncelle</button>            
          </div>

        </form>

        <hr>


        <form action="../netting/islem.php" method="POST"  data-parsley-validate class="form-horizontal form-label-left">

         <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Başlığı <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="first-name" name="ayar_title" required="required" value="<?php echo $ayarCek["ayar_title"] ?>" class="form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Açıklaması <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="first-name" name="ayar_description" required="required" value="<?php echo $ayarCek["ayar_description"] ?>" class="form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Anahtar Kelime <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="first-name" name="ayar_keywords" required="required" value="<?php echo $ayarCek["ayar_keywords"] ?>" class="form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Yazar <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="first-name" name="ayar_author" required="required" value="<?php echo $ayarCek["ayar_author"] ?>" class="form-control col-md-7 col-xs-12">
          </div>
        </div>


        <div class="ln_solid"></div>
        <div class="form-group">
          <div align='right' class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
           <button type="submit" name="genelayarkaydet" class="btn btn-success">Güncelle</button>
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