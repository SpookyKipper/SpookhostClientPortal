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
	  <p class="mt-4" style="display: block;">Authenticating</p>
	</div>
      



            </div>
          </div>
        </div>
      </div>
    </div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   
  </body>
</html>
