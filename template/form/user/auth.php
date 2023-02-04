<!DOCTYPE html>
<html :class="{ 'theme-dark': light }" x-data="data()" lang="en" style="overflow: hidden;">
  <head>
    <meta charset="UTF-8" />
    <title>Login - Spookhost</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://spookykipper.github.io/WoodmillDashAssets/assets/css/tailwind.output.css" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="https://spookykipper.github.io/WoodmillDashAssets/assets/js/init-alpine.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <style>
    #sso-notice {
       /* opacity: 0;
        visibility: hidden;*/
        transition:opacity 0.5s ease, visibility 0.4s;
        z-index: 99;
    }
    </style>
    <style>
    /*@keyframes smooth-appear {
      0% {
          opacity: 0;
          max-width: 0;
          max-height: 100px;
      }
      100% {
          opacity: 1;
          width: unset;
          max-width: 485px;
          max-height: unset;
          height: 100%;
      }
    }*/
    @keyframes scale-up {
	0% {
		transform: scale(0);
	}

	100% {
		transform: scale(1);
	}
}   
    .bottom-standby, .bottom-standby > * {
      animation: scale-up 1.25s ease 0s 1 normal forwards;
    }

    </style>
    <script>
    document.querySelector('#sso-notice').style.height = document.getElementById('form-container').clientHeight + 'px';document.querySelector('#sso-notice').style.width = document.getElementById('form-container').clientWidth + 'px';
    </script>
  </head>
  <body style="overflow: hidden;position: relative;">
  
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
      <div class="bottom-standby flex-1 h-full mx-auto  overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800" style="max-width: 485px;" id="form-container">
      	<div class="flex justify-center items-center absolute rounded-lg " style="height: 551px;background-color: white;width: 485px;flex-flow: column;opacity: 0; visibility: hidden;" id="sso-notice">
	  <div>
	    <div class="spinner-border animate-spin  w-8 h-8 border-4 rounded-full" role="status"></div>
	  </div>
	  <p class="mt-4" style="display: block;">Redirecting to SSO Provider</p>
	</div>
      
      <div style="text-align:center;width:100%;display:block;margin: 0 15%;margin-top: 20px"><img src="https://i.imgur.com/9nFLiyw.png" alt="" style="width: 65%"></div>
        <div class="flex flex-col overflow-y-auto md:flex-row">
          
          <div class="flex items-center justify-center p-6 sm:p-12" style="width: 100%;">
            <div class="w-full">
              <h1
                class=" text-xl font-semibold text-gray-700 dark:text-gray-200"
              >
                Authentication
              </h1>
              <span class="text-gray-700 dark:text-gray-400 " >Time to start or continue your journey.</span>
              <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400 "><?= $this->base->text('email_address', 'label') ?></span>
                <?= form_open('u/auth', ['class' => 'card card-md']) ?>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="you@example.com" id="email" type="email" name="email" required
                />
              </label>
         

              <!-- You should use a button here, as the anchor is only used for the example  -->
              <button
                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                type='button' onclick="if(document.getElementById('email').checkValidity()){this.innerHTML = `<i class='bi bi-envelope'></i> Please wait...`;this.disabled='true';gt.showBox();}else{Swal.fire('Error','Email is invalid.','error')}"
              >
                <i class="bi bi-envelope"></i> Continue with Email
              </button></form>

              <hr class="my-8" />

              <button
                class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray" onclick="this.innerHTML = `<svg class='w-4 h-4 mr-2' aria-hidden='true' viewBox='0 0 24 24' fill='currentColor'><path d='M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12'/></svg> Please wait...`;document.querySelector('#sso-notice').style.height = document.getElementById('form-container').clientHeight + 'px';document.querySelector('#sso-notice').style.width = document.getElementById('form-container').clientWidth + 'px';document.querySelector('#sso-notice').style.visibility = 'visible';document.querySelector('#sso-notice').style.opacity = '1';window.location.href='https://api.stytch.spookhost.xyz/v1/public/oauth/github/start?public_token=public-token-live-5209ce5a-4d3b-408d-a1d0-adf2a1e757b5'"
              >
                <svg
                  class="w-4 h-4 mr-2"
                  aria-hidden="true"
                  viewBox="0 0 24 24"
                  fill="currentColor"
                >
                  <path
                    d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"
                  />
                </svg>
                Continue with Github
              </button>
              <button
                class="flex items-center justify-center w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray" onclick="this.innerHTML = `<i class='bi bi-discord mr-2'></i> Please wait...`;document.querySelector('#sso-notice').style.height = document.getElementById('form-container').clientHeight + 'px';document.querySelector('#sso-notice').style.width = document.getElementById('form-container').clientWidth + 'px';document.querySelector('#sso-notice').style.visibility = 'visible';document.querySelector('#sso-notice').style.opacity = '1';window.location.href='https://api.stytch.spookhost.xyz/v1/public/oauth/discord/start?public_token=public-token-live-5209ce5a-4d3b-408d-a1d0-adf2a1e757b5'"
              >
                <i class="bi bi-discord mr-2"></i>
                Continue with Discord
              </button>
              <button
                class="flex items-center justify-center w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray" onclick="this.innerHTML = `<i class='bi bi-google mr-2'></i> Please wait...`;document.querySelector('#sso-notice').style.height = document.getElementById('form-container').clientHeight + 'px';document.querySelector('#sso-notice').style.width = document.getElementById('form-container').clientWidth + 'px';document.querySelector('#sso-notice').style.visibility = 'visible';document.querySelector('#sso-notice').style.opacity = '1';window.location.href='https://api.stytch.spookhost.xyz/v1/public/oauth/google/start?public_token=public-token-live-5209ce5a-4d3b-408d-a1d0-adf2a1e757b5'"
              >
              
                <i class="bi bi-google mr-2"></i>
                Continue with Google
              </button>
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
            if ($message !== 'Logged out Successfully') {

         
			echo '<div class="alert alert-'.$class.' alert-dismissible" role="alert">
				'.$message.'
				<a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
				</div>';
                   }
			unset($_SESSION['msg']);
            
		}
		?>
	</div>
            </div>
          </div>
        </div>
      </div>
    </div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const option = urlParams.get('emailsent');
    const failure = urlParams.get('failure')
    const logout = urlParams.get('logout')
    if (option == 'true') {
        
        Swal.fire({
                    title: 'You got mail!',
                    icon: 'info',
                    iconHtml: '<i class="bi bi-envelope"></i>',
                    html: 'A login link has been sent to your email inbox.<br>Please click the link inside to Authenticate.',
                    showCloseButton: true,
                    showConfirmButton: false,
                    showCancelButton: false,
                    allowOutsideClick: false,
                 });
    } else if (failure == 'true') {
        Swal.fire({
                    title: 'Failed',
                    icon: 'error',
                    text: 'Authentication failed. Please try again.',
                    showCloseButton: true,
                    showConfirmButton: true,
                    showCancelButton: false,
                    allowOutsideClick: true,
                 });
    } else if (logout == 'true') {
        const Toast = Swal.mixin({
                        toast: true,
                        position: 'bottom-end',
                        showCloseButton: true,
                        showConfirmButton: false,
                        width: 'fit-content',
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                        })

                        Toast.fire({
                          icon: 'success',
                          title: 'Logged out Successfully'
                        })
    };
    history.replaceState('', '', 'https://portal.spookhost.xyz/u/auth/');
    </script>
    <script>


    function sendmail() {
        if ((gt.getValidate() !== '') || (gt.getValidate() !== null)) {
    const xhttp = new XMLHttpRequest();
    var params = 'spookhost__csrf_token=' + document.querySelector('#csrf_token').value + '&email=' + document.querySelector('#email').value + '&geetest_lot_number=' + gt.getValidate().lot_number + '&geetest_captcha_output=' + gt.getValidate().captcha_output + '&geetest_pass_token=' + gt.getValidate().pass_token + '&geetest_gen_time=' + gt.getValidate().gen_time + "&h-captcha-response=true";
    console.log(params);
	xhttp.onreadystatechange = function() {//Call a function when the state changes.
     if(xhttp.readyState == 4 && xhttp.status == 200) {
        Swal.fire({
                    title: 'You got mail!',
                    icon: 'info',
                    iconHtml: '<i class="bi bi-envelope"></i>',
                    html: 'A login link has been sent to your email inbox.<br>Please click the link inside to Authenticate.',
                    showCloseButton: false,
                    showConfirmButton: false,
                    showCancelButton: false,
                    allowOutsideClick: false,
                 });
     } else if (xhttp.status == 403) {
             Swal.fire({
                    title: 'Error!',
                    icon: 'error',
                    text: 'Request blocked due to Security Policy, reloading.',
                    showCloseButton: true,
                    showConfirmButton: false,
                    showCancelButton: false,
                    allowOutsideClick: false,
                 });
             window.location.reload();
         } else if (xhttp.status == 418) {
             Swal.fire({
                    title: 'Error!',
                    icon: 'error',
                    text: 'Invalid Captcha Response.',
                    showCloseButton: true,
                    showConfirmButton: false,
                    showCancelButton: false,
                    allowOutsideClick: false,
                 });
             window.location.reload();
         }
         /* else if (xhttp.status !== 200){
             Swal.fire({
                    title: 'Error!',
                    icon: 'error',
                    text: 'An unexpected error occurred.',
                    showCloseButton: true,
                    showConfirmButton: false,
                    showCancelButton: false,
                    allowOutsideClick: false,
                 });
         }*/
     }
     if (document.querySelector('#email').value !== '') {
         xhttp.open("POST", 'https://portal.spookhost.xyz/u/auth');
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhttp.send(params);
     }
    
	}
    
    }

    </script>


			
    <script src="https://spookykipper.github.io/AssetsWebsite/Spookhost/geetest/gt4.js"></script>
    <script src="https://spookykipper.github.io/AssetsWebsite/Spookhost/geetest/jquery.js"></script>

<script>
    var captchaId = "4ac3d4827cd02131a99f76c00368e8c6"
    var product = "bind"
     

    initGeetest4({
        captchaId: captchaId,
        product: product,
        protocol: 'https://',
        outside: false,
    }, function (gt) {
        window.gt = gt
        gt
            .appendTo("#captcha")
            .onSuccess(function (e) {
                /*var result = gt.getValidate();
                if (document.querySelector('#geetest_lot_number').value !== '' || document.querySelector('#geetest_lot_number').value !== null) {
                  document.querySelector('#geetest_lot_number').value = gt.getValidate().lot_number;
                    document.querySelector('#geetest_captcha_output').value = gt.getValidate().captcha_output;
                   document.querySelector('#geetest_pass_token').value = gt.getValidate().pass_token;
                   document.querySelector('#geetest_gen_time').value = gt.getValidate().gen_time;
                   document.querySelector('#h-captcha-response').value = true;
                }*/
                sendmail();
                Swal.fire({
                    title: 'Please wait',
                    text: 'Processing request',
                    showCloseButton: false,
                    showConfirmButton: false,
                    showCancelButton: false,
                    allowOutsideClick: false,
                    didOpen: () => {
                       Swal.showLoading();
                       setTimeout(function() {window.location.href = domain;}, 1000);
                       
                    },
                 });
                $.ajax({
                    url: 'https://api.spookhost.xyz/portal/geetest/client-verification.php',
                    data: result,
                    dataType: 'json',
                    success: function (res) {
                        console.log(res.result);
                    
                    }
                })
            })

       /* $('#captcha_btn').click(function () {
            gt.showBox();
        })
        $('#reset_btn').click(function () {
            gt.reset();
        })*/
    });

</script>



  </body>
</html>
