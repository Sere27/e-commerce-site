 <?php 

 include 'header.php';


 $sliderSor=$db->prepare("SELECT * FROM slider where slider_id=:id");
 $sliderSor->execute(array(
  'id' => $_GET['slider_id']
));

 $sliderCek=$sliderSor->fetch(PDO::FETCH_ASSOC);

 ?>
 <!-- page content -->
 <div class="right_col" role="main">
  <div class="">
   <div class="clearfix"></div>
   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Slider Düzenle<small>İşlem Durumu</small>

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
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo">Slider Resim <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">

              <?php 
              if (strlen($sliderCek['slider_resimyol'])>0) { ?>

                <img width="150" src="../../<?php echo $sliderCek['slider_resimyol'] ?>">

              <?php }
              else{ ?>

                <img width="150" src="../../dimg/logo-yok.png">

              <?php  } ?>

            </div>
          </div>       

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Resim Seç <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input disabled=" " type="file" name="slider_resimyol" class="form-control col-md-6 col-xs-12">
            </div>
          </div> 

          <input type="hidden" name="eski_yol" value="<?php echo $sliderCek['slider_resimyol'] ?>">

          <div class="form-group">
           <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button disabled="" type="submit" name="sliderresimduzenle" class="btn btn-primary">Resim Güncelle</button></div>
          </div> 
        </form>

        <hr>


        <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Adı <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" name="slider_isim" required="required" value="<?php echo $sliderCek["slider_isim"] ?>" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Linki</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" name="slider_link"  value="<?php echo $sliderCek["slider_link"] ?>" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Sıra  <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" name="slider_sira" required="required" value="<?php echo $sliderCek["slider_sira"] ?>" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Durum <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
             <select id="heard" class="form-control" name="slider_durum" required>

               <option value="1" <?php echo $sliderCek['slider_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>


               <option value="0" <?php if ($sliderCek['slider_durum']==0) { echo 'selected=""'; } ?>>Pasif</option> 

             </select>
           </div>
         </div>

         <input type="hidden" name="slider_id" value="<?php echo $sliderCek['slider_id'] ?>">


         <div class="ln_solid"></div>
         <div class="form-group">
          <div align='right' class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
           <button type="submit" name="sliderduzenle" class="btn btn-success">Güncelle</button>
           <button type="submit" name="slideriptal" class="btn btn-danger">İptal</button>
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