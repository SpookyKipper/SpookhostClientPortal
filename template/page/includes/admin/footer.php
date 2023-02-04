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
    </script>
	<script src="https://challenges.cloudflare.com/turnstile/v0/api.js?compat=recaptcha&onload=onloadTurnstileCallback" async defer></script>

	<script src="<?= base_url()?>assets/js/jquery.slim.js"></script>
	<script src="<?= base_url()?>assets/js/tabler.min.js"></script><script type="text/javascript"> //<![CDATA[
  var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.trust-provider.com/" : "http://www.trustlogo.com/");
  document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
//]]></script>
<script language="JavaScript" type="text/javascript">
  TrustLogo("https://www.positivessl.com/images/seals/positivessl_trust_seal_sm_124x32.png", "POSDV", "none");
</script>
</body>
</html>