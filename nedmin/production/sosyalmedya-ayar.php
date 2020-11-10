 <?php include 'header.php' ?>
 <!-- page content -->
 <div class="right_col" role="main">
  <div class="">
   <div class="clearfix"></div>
   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Genel Ayarlar <small>İşlem Durumu</small>

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

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Facebook <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" name="ayar_facebook" required="required" value="<?php echo $ayarCek["ayar_facebook"] ?>" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Twitter <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" name="ayar_twitter" required="required" value="<?php echo $ayarCek["ayar_twitter"] ?>" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Google <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" name="ayar_google" required="required" value="<?php echo $ayarCek["ayar_google"] ?>" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Youtube <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" name="ayar_youtube" required="required" value="<?php echo $ayarCek["ayar_youtube"] ?>" class="form-control col-md-7 col-xs-12">
            </div>
          </div>


          <div class="ln_solid"></div>
          <div class="form-group">
            <div align='right' class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
             <button type="submit" name="sosyalmedyaayarkaydet" class="btn btn-success">Güncelle</button>
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