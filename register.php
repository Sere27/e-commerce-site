<?php include 'header.php'; ?>

<div class="container">
	<ul class="small-menu"><!--small-nav -->
		<li><a href="" class="myacc">My Account</a></li>
		<li><a href="" class="myshop">Shopping Chart</a></li>
		<li><a href="" class="mycheck">Checkout</a></li>
	</ul><!--small-nav -->
	<div class="clearfix"></div>
	<div class="lines"></div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							<div class="bigtitle">Kullanıcı Kayıt</div>
							<div class="bread">Kayıt işlemini aşağıda ki form ile gerçekleştirebilirsiniz.</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<form class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Personal Details</div>
				</div>
				<div class="form-group dob">
					<div class="col-sm-12">
						<input type="text" class="form-control" id="name" placeholder="Adınız Soyadınız...">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="text" class="form-control" id="email" placeholder="Mail Adresiniz...">
					</div>
				</div>
				<div class="form-group dob">
					<div class="col-sm-6">
						<input type="password" class="form-control" id="phone" placeholder="Şifreniz...">
					</div>
					
					<div class="col-sm-6">
						<input type="password" class="form-control" name="kullanici_passwordtwo"   placeholder="Şifrenizi Tekrar Giriniz...">
					</div>
				</div>


				<button class="btn btn-default btn-red">Kayıt Ol</button>
				<br>
				<br>
				<br>
				<br>
				<br>
			</div>

		</div>
	</form>
</div>




<?php include 'footer.php' ?>