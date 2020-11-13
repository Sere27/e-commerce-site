<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$slidersor=$db->prepare("SELECT * FROM slider");
$slidersor->execute();

?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">
   <div class="clearfix"></div>
   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Slider Listeleme <small>İşlem Durumu</small>

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
        <div class="clearfix">
          <div align="right">
            <a href="slider-ekle.php"><button class="btn btn-info btn-xs"> Yeni Slider Ekle</button></a>
          </div>
        </div>
      </div>
      <div class="x_content">

        <!-- Div içerik başlangıç -->

        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100 %" >
          <thead>
            <tr>
             <th>S.No</th>
             <th>Slider Resim</th>
             <th>Slider Adı</th>
             <th>Slider Link</th>
             <th>Slider Sıra</th>  
             <th>Slider Durum</th>
             <th></th>
             <th></th>
           </tr>
         </thead>

         <tbody>

           <?php 

           $say=0;

           while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) { $say++?>

            <tr>
              <td><?php echo $say ?></td>
              <td><img width="150" src="../../<?php  echo $slidercek['slider_resimyol'] ?>" alt=""></td>
              <td><?php echo $slidercek['slider_ad'] ?></td>
              <td><?php echo $slidercek['slider_link'] ?></td>     
              <td><?php echo $slidercek['slider_sira'] ?></td>


              <td>

                <?php
                
                if($slidercek['slider_durum']==1) { ?>

                  <button class="btn btn-success btn-xs">Aktif</button>

                <?php } else {?>

                  <button class="btn btn-danger btn-xs">Pasif</button>

                <?php } ?>

              </td>

              <td><center><a href="slider-duzenle.php?slider_id=<?php echo $slidercek['slider_id'] ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>

              <td><center><a href="../netting/islem.php?slider_id=<?php echo $slidercek['slider_id'] ?> & sliderSil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
            </tr>

          <?php  }
          ?>


        </tbody>
      </table>

      <!-- Div içerik bitiş -->

    </div>
  </div>
</div>
</div>

</div>
</div>


<?php include 'footer.php' ?> 