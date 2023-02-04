<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<?php if ($this->base->text($title, 'title') !== '...'): ?>
		<?php $title = $this->base->text($title, 'title'); ?>
	<?php endif ?>
	<title><?= $title.' - '.$this->base->get_hostname() ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" type="image/png" href="<?= base_url()?>assets/img/fav.png">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/tabler.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/all.min.css">
	<style type="text/css">
		.alert p
		{
			margin: 0;
		}
	</style>
</head>
<body class="border-top-wide border-primary d-flex flex-column theme-<?= get_cookie('theme') ?? 'light' ?>">
<div class="page page-center">
		<div class="container-tight py-4">
			<div class="text-center mb-4">
				<a href="." class="navbar-brand navbar-brand-autodark"><img src="<?= base_url()?>assets/img/logo.png" height="36" alt=""></a>
			</div>

<?= form_open('u/forget', ['class' => 'card card-md']) ?>
	<div class="card-body">
		<h2 class="card-title text-center mb-3"><?= $this->base->text('forget_password', 'heading') ?></h2>
		<p class="text-muted mb-3"><?= $this->base->text('forget_password', 'paragraph') ?></p>
		<div class="mb-3">
			<label class="form-label"><?= $this->base->text('email_address', 'label') ?></label>
			<input type="email" name="email" class="form-control" placeholder="<?= $this->base->text('email_address', 'label') ?>" required>
		</div>
        <?php if($this->grc->is_active()):?>
			<div class="mb-2">
				<?php if($this->grc->get_type() == "google"):?>
				<!--	<div class="g-recaptcha" data-sitekey="<?= $this->grc->get_site_key();?>" data-callback="recaptcha_callback"></div>
					<script src='https://www.google.com/recaptcha/api.js' async defer ></script>-->
                    <div class="cf-turnstile" data-sitekey="<?= $this->grc->get_site_key();?>" data-callback="javascriptCallback" data-theme="light"></div>
				<?php elseif($this->grc->get_type() == "crypto"): ?>
					<script src='https://verifypow.com/lib/captcha.js' async></script>
	            	<div class='CRLT-captcha' data-hashes='256' data-key='<?= $this->grc->get_site_key();?>'>
	                    <em>Loading PoW Captcha...
	                    <br>
	                    If it doesn't load, please disable AdBlocker!</em>
	                </div>
				<?php elseif($this->grc->get_type() == "human"): ?>
					<div id='captcha' class='h-captcha' data-sitekey="<?= $this->grc->get_site_key();?>"></div>
					<script src='https://hcaptcha.com/1/api.js' async defer ></script>
				<?php endif ?>
			</div>
		<?php endif ?>
		<div class="form-footer mt-1">
			<input type="submit" class="btn btn-primary w-100" id="submit-button" name="forget" value="<?= $this->base->text('send_me_link', 'button') ?>" disabled>
		</div>
	</div>
</form>
<div class="text-center text-muted mt-3">
	<?= $this->base->text('forget_it', 'heading') ?>, <a href="<?= base_url();?>u/login" tabindex="-1"><?= $this->base->text('send_me_back', 'heading') ?></a> <?= $this->base->text('to_screen', 'heading') ?>
</div>
    <script type="text/javascript">
      function javascriptCallback() {
        const submitButton = document.getElementById("submit-button");
        submitButton.removeAttribute("disabled");
      }
    </script>
		</div>
	</div>

	<div class="hidden-area" style="position: fixed; bottom: 0; right: 0;">
		<?php  
		if(isset($_SESSION['msg'])){
			$msg = json_decode($_SESSION['msg'], true);
			if($msg[0] == 0)
			{
				$class = 'danger';
			}
			else
			{
				$class = 'success';
			}
			$message = $msg[1];
			echo '<div class="alert alert-'.$class.' alert-dismissible" role="alert">
				'.$message.'
				<a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
				</div>';
			unset($_SESSION['msg']);
		}
		?>
	</div>
	
	<script src="<?= base_url()?>assets/js/jquery.slim.js"></script>
	<script src="<?= base_url()?>assets/js/tabler.min.js"></script>
	<script type="text/javascript">
		var coll = document.getElementsByClassName("trigger");
		var i;
		for (i = 0; i < coll.length; i++) {
		  coll[i].addEventListener("click", function() {
		    var contenter = this.getAttribute("data-toggle");
			var content = document.getElementById(contenter);
		    if (content.type === "password") {
			    content.type = "text";
		    } else if(content.type === "text") {
			    content.type = "password";
		    }
		  });
		}
	</script>
</body>
</html>