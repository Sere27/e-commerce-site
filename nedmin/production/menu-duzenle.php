 <?php 

 include 'header.php';


 $menuSor=$db->prepare("SELECT * FROM menu where menu_id=:id");
 $menuSor->execute(array(
  'id' => $_GET['menu_id']
));

 $menuCek=$menuSor->fetch(PDO::FETCH_ASSOC);

 ?>
 <!-- page content -->
 <div class="right_col" role="main">
  <div class="">
   <div class="clearfix"></div>
   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Menü Düzenle<small>İşlem Durumu</small>

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

        <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Ad  <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" name="menu_ad" required="required" value="<?php echo $menuCek["menu_ad"] ?>" class="form-control col-md-7 col-xs-12">
            </div>
          </div>


          <!-- CK Editor baslangic-->

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menu Detay <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">

              <textarea  class="ckeditor" id="editor1" name="menu_detay"><?php echo $menuCek['menu_detay'] ?></textarea>
            </div>
          </div>


          <script type="text/javascript">
            CKEDITOR.replace( 'editor1',

            {

              filebrowserBrowseUrl : 'ckfinder/ckfinder.html',

              filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',

              filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',

              filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

              filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

              filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

              forcePasteAsPlainText: true

            } 

            );

          </script>

          <!-- CK Editor bitis -->

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Url
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" name="menu_url"  value="<?php echo $menuCek["menu_url"] ?>" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Sıra  <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" name="menu_sira" required="required" value="<?php echo $menuCek["menu_sira"] ?>" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sayfa Linki
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" name="menu_url"  value="<?php echo $ayarCek['ayar_url'] ?>/sayfa-<?php echo seo($menuCek["menu_ad"]) ?>" required="required" disabled="" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Durum <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
             <select id="heard" class="form-control" name="menu_durum" required>

               <option value="1" <?php echo $menuCek['menu_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>


               <option value="0" <?php if ($menuCek['menu_durum']==0) { echo 'selected=""'; } ?>>Pasif</option> 

             </select>
           </div>
         </div>

         <input type="hidden" name="menu_id" value="<?php echo $menuCek['menu_id'] ?>">


         <div class="ln_solid"></div>
         <div class="form-group">
          <div align='right' class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
           <button type="submit" name="menuduzenle" class="btn btn-success">Güncelle</button>
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