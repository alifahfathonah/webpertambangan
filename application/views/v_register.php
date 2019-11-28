<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Sistem Informasi Penyewaan Alat Pertambangan</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="<?= base_url();?>assets/register/css/style.css">
	</head>

	<body>
	<?php if($this->session->flashdata('message')){ ?>
		<p id="alert"></p>
		<p style="display:none;" id="icon"><?= $this->session->flashdata('icon');  ?></p>
		<p style="display:none;" id="title"><?= $this->session->flashdata('title');  ?></p>
		<p style="display:none;" id="message"><?= $this->session->flashdata('message');  ?></p>
	<?php } ?>
	
	<div class="wrapper" style="background:#f5f5f5;">
			<div class="inner">
				<div class="image-holder">
					<img src="https://dev.nabors.com/sites/default/files/rigs-offshore-platform-bigfoot_0.jpg" width="405px" height="530px" alt="">
				</div>
				<form action="<?= base_url();?>register/prosesregister" method="POST">
					<h3>Form Pendaftaran</h3>
					<div class="form-wrapper">
						<input name="username"  type="text" placeholder="Username" class="form-control" style="border-bottom:1px solid #f8a978;">
						<i class="zmdi zmdi-username"></i>
					</div>
					<div class="form-group">
						<input name="lname" type="text" placeholder="Nama Depan" class="form-control" style="border-bottom:1px solid #f8a978;">
						<input name="fname"  type="text" placeholder="Nama Belakang" class="form-control" style="border-bottom:1px solid #f8a978;">
					</div>
					<div class="form-wrapper">
						<input name="email"  type="text" placeholder="Email" class="form-control" style="border-bottom:1px solid #f8a978;">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<input name="phone" type="text" placeholder="No Telp" class="form-control"style="border-bottom:1px solid #f8a978;">
						<i class="zmdi zmdi-phone"></i>
					</div>
					<div class="form-wrapper">
						<input name="password" type="password" placeholder="Password" class="form-control"style="border-bottom:1px solid #f8a978;">
						<i class="zmdi zmdi-lock" ></i>
					</div>
					<div class="form-wrapper">
						<input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control"style="border-bottom:1px solid #f8a978;">
						<i class="zmdi zmdi-lock" style="color:#f8a978" ></i>
					</div>
					<a href="<?= base_url(); ?>home"><p style="margin-top:10px;text-align:right;color:#f8a978">sudah punya akun?</p></a>
					<button type="submit" style="background:#f8a978;height=40px" name="register">Daftar</button>
				</form>
			</div>
		</div>	
		<script src="<?= base_url(); ?>assets/swal.js"></script>
		<script>
			var alert = document.getElementById("alert");
			if (alert != null) {
				var message = document.getElementById("message").innerHTML;
				var icon = document.getElementById("icon").innerHTML;
				var title = document.getElementById("title").innerHTML;
				swal({
					title: title,
					text: message,
					icon: icon,
				});
			}
		</script>
	</body>
</html>