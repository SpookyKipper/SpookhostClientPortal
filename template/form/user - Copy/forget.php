<?= form_open('u/forget', ['class' => 'card card-md']) ?>
	<div class="card-body">
		<h2 class="card-title text-center mb-3"><?= $this->base->text('forget_password', 'heading') ?></h2>
		<p class="text-muted mb-3"><?= $this->base->text('forget_password', 'paragraph') ?></p>
		<div class="mb-3">
			<label class="form-label"><?= $this->base->text('email_address', 'label') ?></label>
			<input type="email" name="email" class="form-control" placeholder="<?= $this->base->text('email_address', 'label') ?>">
		</div>
        <?php if($this->grc->is_active()):?>
			<div class="mb-2">
				<?php if($this->grc->get_type() == "google"):?>
					<div class="g-recaptcha" data-sitekey="<?= $this->grc->get_site_key();?>" data-callback="recaptcha_callback"></div>
					<script src='https://www.google.com/recaptcha/api.js' async defer ></script>
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
      function recaptcha_callback() {
        const submitButton = document.getElementById("submit-button");
        submitButton.removeAttribute("disabled");
      }
    </script>