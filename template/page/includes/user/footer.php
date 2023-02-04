<script>
      const fsWidgetConfig = {
        id: "33a5b87c-aab2-4105-b69b-a89bb45b947c",
      };
</script>
<script type="module" src="https://cdn.freshstatus.io/widget/index.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<div class="hidden-area" style="position: fixed; bottom: 0; right: 0;">
		<?php  
		if(isset($_SESSION['msg'])){
			$msg = json_decode($_SESSION['msg'], true);
            $message = $msg[1];
            $message = str_replace("\n", "", $message);
            $message = str_replace("<p>", "", $message);
            $message = str_replace("</p>", "", $message);
			if($msg[0] == 0)
			{//Danger
				/*echo '<div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3" role="alert">
				'.$message.'
				<a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
				</div>';*/
                echo "<script>const Toast = Swal.mixin({
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
                          icon: 'error',
                          title: '$message'
                        })</script>";
			}
			else
			{//Success
				/*echo '<div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base text-green-700 mb-3" role="alert">
				'.$message.'
				<a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
				</div>';*/
                echo "<script>const Toast = Swal.mixin({
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
                          title: '$message'
                        })</script>";
			}
			
			
			unset($_SESSION['msg']);
		}
		?>
	</div>
	<!--
<style>

div:empty:before {
  content:attr(placeholder-text);
}

/*the container must be positioned relative:*/
select {
  position: relative;
  font-family: Arial;
}

select {
  display: none; /*hide original SELECT element:*/
}

.select-selected {
  background-color: DodgerBlue;
}

/*style the arrow inside the select element:*/
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 100px solid transparent;
  border-color: #fff transparent transparent transparent;
}

/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}

/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
  user-select: none;
}

/*style items (options):*/
.select-items {
  position: absolute;
  background-color: DodgerBlue;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}

/*hide the items when the select box is closed:*/
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}
</style>-->

<!--
<script>
var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByTagName('select');
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = document.getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>-->
	<script src="<?= base_url()?>assets/js/jquery.slim.js"></script>
	<script src="<?= base_url()?>assets/js/tabler.min.js"></script>
    <script src="https://vpassets.spookhost.eu.org/nanobar.min.js"  ></script>
<!--
<script src="https://www.google.com/recaptcha/api.js" async defer></script>-->

  <?php if($this->grc->get_type() == "google"):?>
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js?compat=recaptcha&onload=onloadTurnstileCallback&render=explicit" async defer></script>

						<?php elseif($this->grc->get_type() == "human"): ?>
								
    <script src="https://spookykipper.github.io/AssetsWebsite/Spookhost/geetest/gt4.js"></script>
    <script src="https://spookykipper.github.io/AssetsWebsite/Spookhost/geetest/jquery.js"></script>

<script>
    var captchaId = "4ac3d4827cd02131a99f76c00368e8c6"
    var product = "float"
        if (product !== 'bind') {
        $('#btn').remove();
    }

    initGeetest4({
        captchaId: captchaId,
        product: product,
        protocol: 'https://',
    }, function (gt) {
        window.gt = gt
        gt
            .appendTo("#captcha")
            .onSuccess(function (e) {
                var result = gt.getValidate();
                if (document.querySelector('#geetest_lot_number').value !== '' || document.querySelector('#geetest_lot_number').value !== null) {
                  document.querySelector('#geetest_lot_number').value = gt.getValidate().lot_number;
                    document.querySelector('#geetest_captcha_output').value = gt.getValidate().captcha_output;
                   document.querySelector('#geetest_pass_token').value = gt.getValidate().pass_token;
                   document.querySelector('#geetest_gen_time').value = gt.getValidate().gen_time;
                   document.querySelector('#h-captcha-response').value = true;
                }
                
                $.ajax({
                    url: 'https://api.spookhost.xyz/portal/geetest/client-verification.php',
                    data: result,
                    dataType: 'json',
                    success: function (res) {
                        console.log(res.result);
                    }
                })
            })

        $('#btn').click(function () {
            gt.showBox();
        })
        $('#reset_btn').click(function () {
            gt.reset();
        })
    });

</script>
								<?php endif ?>
					







<style type="text/css" id="nanobarcss">.nanobar{width:100%;height:6px;z-index:9999;top:0}.bar{width:0;height:100%;transition:height .3s;background:#5A4FCF}</style>
<script>
var options = {
	classname: 'nanobar',
    id: 'nanobar'
};
var nanobar = new Nanobar( options );

//nanobar.go(100);


</script>
<script>
function mobilebutton() {
    document.querySelector("#main-wrapper").classList.toggle("show-sidebar");
}
</script>	<script>
	function navbarmenu() {	
		var navbar = getElementById("UserNavbar");
		navbar.classList.toggle("show");
	}
	</script>
    <script>
function checknameserver() {


  //button = document.getElementById('dnschecker');
//  button.value = "Loading"
 
 const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
   // document.getElementById("demo").innerHTML = this.responseText;
   //alert(this.responseText);
   let response = this.responseText;
   //let checksuccess = response.includes(".ns.cloudflare.com.");
   if (response.includes(".ns.cloudflare.com.")) {
       let ns1 = document.getElementById('NS1');
       let ns2 = document.getElementById('NS2');
       ns1.innerHTML = "<span class='px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:bg-orange-700 dark:text-orange'>Cloudflare</span>";
   } else if (response.includes("ns1.spookhost.eu.org") && response.includes("ns2.spookhost.eu.org")) {
       let ns1 = document.getElementById('NS1');
       let ns2 = document.getElementById('NS2');
       ns1.innerHTML = "<span class='px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100'>Valid</span>";
   } else if (response.includes("byet.org")) {
       let ns1 = document.getElementById('NS1');
       let ns2 = document.getElementById('NS2');
       ns1.innerHTML = "<span class='px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100'>Valid</span>";
   }
   else {
       let ns1 = document.getElementById('NS1');
       let ns2 = document.getElementById('NS2');
       ns1.innerHTML = "<span class='px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100'>Invalid</span>";
   }
 
   //document.getElementById("demo").innerHTML = result;
  }
  if (window.location.href.length > 46) {
        xhttp.open("GET", "https://dns.google/resolve?name=" + document.getElementById("domain").value + "&type=NS");
        xhttp.send();
  }
  }

  

</script>
<script>
var anchors = document.querySelectorAll('[href="#"]');
for (a of anchors) {
  a.addEventListener('click', function(e) {
    //removeCartItem(e.target.getAttribute('data-value'));
    console.log(a)
    if ((!(a.href.includes('#'))) && (a.href !== '')) {
        document.querySelector('#backdrop-loading').style.visibility = 'visible';
        document.querySelector('#backdrop-loading').style.opacity = '1';
    }
  });
}
</script>
<script>
function setInnerHTML(elm, html) {
  elm.innerHTML = html;
  
  Array.from(elm.querySelectorAll("script"))
    .forEach( oldScriptEl => {
      const newScriptEl = document.createElement("script");
      
      Array.from(oldScriptEl.attributes).forEach( attr => {
        newScriptEl.setAttribute(attr.name, attr.value) 
      });
      
      const scriptText = document.createTextNode(oldScriptEl.innerHTML);
      newScriptEl.appendChild(scriptText);
      
      oldScriptEl.parentNode.replaceChild(newScriptEl, oldScriptEl);
  });
}
</script>
<script>
function changelink(domain, addtohistory = true) {
	const xhttp = new XMLHttpRequest();
          
 var currentpagespan = document.getElementsByClassName('currentpage-span');
        for (let i = 0; i < currentpagespan.length; i++) {
         //   currentpagespan.item(i).parentNode.removeChild(currentpagespan.item(i));
            currentpagespan.item(i).style.opacity = '0';
        }

if (domain.includes('account')) {
    document.getElementById('currentpage-span-acc').style.opacity = '1';
    document.getElementById('currentpage-span-acc-mobile').style.opacity = '1';
} else if (domain.includes('ssl')) {
    document.getElementById('currentpage-span-ssl').style.opacity = '1';
    document.getElementById('currentpage-span-ssl-mobile').style.opacity = '1';
} else if (domain.includes('ticket')) {
    document.getElementById('currentpage-span-ticket').style.opacity = '1';
    document.getElementById('currentpage-span-ticket-mobile').style.opacity = '1';
} else if (domain.includes('domain_checker')) {
    document.getElementById('currentpage-span-checker').style.opacity = '1';
    document.getElementById('currentpage-span-checker-mobile').style.opacity = '1';
}


    document.querySelector('#backdrop-loading').style.visibility = 'visible';
    document.querySelector('#backdrop-loading').style.opacity = '1';
	console.log("Clicked.");

    xhttp.onreadystatechange = function() {
        xhttpReadyState = this.readyState;
        if (this.readyState == 0) {
            //nanobar.go(20);
        } else if (this.readyState == 1) {
            //nanobar.go(40);
        } else if (this.readyState == 2) {
            //nanobar.go(60);
        } else if (this.readyState == 3) {
            //nanobar.go(80);
        } else if (this.readyState == 4) {
            //nanobar.go(99);
        }
    }


	xhttp.onload = function() {
        var readyState = this.readyState;
        var statusCode = this.status;
        if (this.readyState == 4 && this.status == 200) {

       
		let response = this.responseText;


		const parser = new DOMParser();
		var responsetext = parser.parseFromString(response, "text/html");

		// document.body.innerHTML = "";
		//   console.log("cleared");
		// function updatepage() {
		//   document.body = responsetext.body;
        var s = document.querySelector("#sidebarnav > li.nav-item.dropdown");

        
        setInnerHTML(document.querySelector("#main-container"), responsetext.querySelector("#main-container").innerHTML);
	//	document.querySelector("#main-wrapper > div").innerHTML = responsetext.querySelector("#main-wrapper > div").innerHTML;
		//document.querySelector("body > div > div.preloader").parentNode.removeChild(document.querySelector("body > div > div.preloader"));
       // document.querySelector('#titlebar').innerHTML = document.querySelector('#main-container > div > h2').innerHTML;
        document.querySelector('#titlebar').innerHTML = responsetext.title.replace(' - Spookhost', '');
	//	document.querySelector("#main-wrapper").classList.remove("show-sidebar");, 
        Swal.close();
		console.log("Restored");
        realdomain = domain.replace('eu.org', 'xyz');
        if (addtohistory) {
            history.pushState('', '', realdomain);
        }
		document.title = responsetext.title;

        var domainChecker = domain.includes("/u/domain_checker/") && domain.length > 46;
        var tickets = domain.includes("/u/view_ticket/") || domain.includes("/u/create_ticket");
       // console.log(domainChecker);
        if (domainChecker) {
            
            checknameserver();
            console.log("NameServers Checked");
        } else if (tickets) {
            ckEditorCreateTickets();
            console.log("ticket");
        }
        
     /*
        if (width < 767) {
         var t = document.querySelector("#sidebarnav");
         t.appendChild(s);
        }*/


     //   document.querySelector('body > div.hidden-area').innerHTML = null;
        //nanobar.go(100);//95

  



         console.log('removing screen');
        document.querySelector('#backdrop-loading').style.visibility = 'hidden';
        document.querySelector('#backdrop-loading').style.opacity = '0';
        document.getElementById('backdrop-long-loading').style.display = "none";
        console.log('removed screen');





        console.log('loading captcha');
        gt.reset();
        var captchaId = "4ac3d4827cd02131a99f76c00368e8c6"
    var product = "float"
       

    initGeetest4({
        captchaId: captchaId,
        product: product,
        protocol: 'https://',
    }, function (gt) {
        window.gt = gt
        gt
            .appendTo("#captcha")
            .onSuccess(function (e) {
                var result = gt.getValidate();
                if (document.querySelector('#geetest_lot_number').value !== '' || document.querySelector('#geetest_lot_number').value !== null) {
                  document.querySelector('#geetest_lot_number').value = gt.getValidate().lot_number;
                    document.querySelector('#geetest_captcha_output').value = gt.getValidate().captcha_output;
                   document.querySelector('#geetest_pass_token').value = gt.getValidate().pass_token;
                   document.querySelector('#geetest_gen_time').value = gt.getValidate().gen_time;
                   document.querySelector('#h-captcha-response').value = true;
                }
                
                $.ajax({
                    url: 'https://api.spookhost.xyz/portal/geetest/client-verification.php',
                    data: result,
                    dataType: 'json',
                    success: function (res) {
                        console.log(res.result);
                    }
                })
            })
/*
        $('#btn').click(function () {
            gt.showBox();
        })
        $('#reset_btn').click(function () {
            gt.reset();
        })*/
    });
       /* turnstile.render('.cf-turnstile', {
        sitekey: '<?= $this->grc->get_site_key();?>',
        theme: 'light',
    //    callback: 'javascriptCallback',
        callback: function(token) {
            console.log(`Challenge Success`);
            setTimeout(function() {turnstile.reset();}, 300000);
        },
       
        });*/


		/* var options = {
	             classname: 'nanobar',
                 id: 'nanobar'
	        };
	        var nanobar = new Nanobar( options );*/

		//nanobar.go(100);


		//  }

		// setTimeout(updatepage, 10);
     
        } else {

           // function statuscodealert() {
            if (statusCode == 503) {
                xhttpalerted = true;
                console.log(xhttpalerted);
                Swal.close();
                Swal.fire({
                    title: 'Status 503',
                    text: 'Cloudflare Verification Required, Reloading.',
                    showCloseButton: false,
                    showConfirmButton: false,
                    showCancelButton: false,
                    allowOutsideClick: false,
                    didOpen: () => {
                       Swal.showLoading();
                       setTimeout(function() {window.location.href = domain;}, 1000);
                       
                    },
                 });
                 
                //nanobar.go(0);
            } else if (statusCode != 200) {
                xhttpalerted = true;
                console.log(xhttpalerted);
                Swal.close();
                Swal.fire({
                    title: 'Error',
                    text: 'An Error Occurred with Status Code ' + statusCode + ".",
                    showCloseButton: false,
                    showConfirmButton: false,
                    showCancelButton: true,
                    cancelButtonText: 'Close',
                    allowOutsideClick: true,
                    icon: 'error'
                 });
                 console.log('removing screen');
        document.querySelector('#backdrop-loading').style.visibility = 'hidden';
        document.querySelector('#backdrop-loading').style.opacity = '0';
        document.getElementById('backdrop-long-loading').style.display = "none";
        console.log('removed screen');
                 
                //nanobar.go(0);
            } /*else if (readyState != 4) {
             Swal.fire({
                title: 'Loading',
                text: 'It looks like that it is taking longer then usual.',
                showCloseButton: false,
                showConfirmButton: false,
                allowOutsideClick: true,
                didOpen: () => {
                Swal.showLoading()
            },
            })
            }}*/
         //    setTimeout(statuscodealert, 2001)
      //  }

    
        
	};}

//	//nanobar.go(20);
    xhttpalerted = false;
    realdomain = domain.replace('eu.org', 'xyz');
	xhttp.open("GET", realdomain);
	xhttp.send();


    function timeout() {
        console.log(xhttpalerted);
        if (xhttpReadyState != 4 && xhttpalerted != true) {
            /*Swal.fire({
                title: 'Loading',
                text: 'It seems that it is taking longer than usual.',
                showCloseButton: false,
                showConfirmButton: false,
                allowOutsideClick: true,
                didOpen: () => {
                Swal.showLoading()
            },})*/
            document.getElementById('backdrop-long-loading').style.display = "block";
    
        }
    };
    setTimeout(timeout, 1500);

   

}
</script>
<script>
window.addEventListener('popstate', listener);
function listener() {
//  history.pushState({}, '', windows.location.href);
  changelink(window.location.href, false);
}/*
const pushUrl = (href) => {
  history.pushState({}, '', href);
  changelink(href);
};*/
</script>
<!--
<script>
function getcsr(domain) {
    const xhttp = new XMLHttpRequest();

	console.log("clieked.");
	xhttp.onload = function() {
		// document.getElementById("demo").innerHTML = this.responseText;
		//alert(this.responseText);
		let response = this.responseText;
		// let checksuccess = response.includes("<?php echo $Record['2'];?>");

		//	const doc = parser.parseFromString(response, "text/html");
		//var key = doc.getElementById("key");
		const parser = new DOMParser();
		var responsetext = parser.parseFromString(response, "text/html");
        document.querySelector('#main-wrapper > div > div > div.card.p-2.mb-3 > div > input.btn.btn-primary.btn-pill').value = '<?= $this->base->text('request', 'button') ?>';
		Swal.fire({
			title: '<strong>SSL Requisition</strong>',
			icon: 'warning',
            iconHtml: '<i class="mdi mdi-certificate" style="font-size: 85%"></i>',
            html: "Requesting SSL Certificate for <b>" + domain + "</b><p></p><!--Please make sure you have <u><b>saved</b></u> the Private key.<br>You <b>will</b> need it later. <u>This <b>will not</b> be shown again.</u><br>--> <!--<?= form_opene('u/create_ssl') ?> <textarea id='privatekeytextarea' name='privatekey' hidden></textarea>  <textarea class='form-control' name='csr' id='csrtextarea' hidden></textarea> <div class='cf-turnstile' data-sitekey='<?= $this->grc->get_site_key();?>' data-callback='javascriptCallback'></div> <div class='recaptcha'> </div>  <input type='submit' name='create' value='<?= $this->base->text('request', 'button') ?>' class='btn btn-primary btn-pill' hidden></form>",
			showCloseButton: true,
			showCancelButton: false,
			focusConfirm: false,
           // didOpen: () => {
             //   grecaptcha.render('recaptcha', {
             //     'sitekey': '<?= $this->grc->get_site_key();?>'
              //  })
           // },
			confirmButtonText: 'Continue',
			confirmButtonAriaLabel: 'Thumbs up, great!',
		}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    document.querySelector("#swal2-html-container > form > input.btn.btn-primary.btn-pill").click();
  //  Swal.fire('Please Wait', 'Requesting Certificate', '').;
    Swal.fire({
      title: 'Please Wait',
      text: 'Requesting Certificate',
      showCloseButton: false,
      showConfirmButton: false,
      allowOutsideClick: false,
      didOpen: () => {
        Swal.showLoading()
      },
    })
  }
});

		document.getElementById("csrtextarea").value = responsetext.querySelector("#csr").innerHTML;
		//document.getElementById("privatekeytextarea").innerHTML = "Private key:<br><textarea class='swal2-input' style='min-height: 150px; min-width: 80%' readonly='true'>" + responsetext.querySelector("#key").innerHTML + "</textarea>";
        document.getElementById("privatekeytextarea").innerHTML = responsetext.querySelector("#key").innerHTML;
		//console.log(response);
		//console.log(responsetext);
		console.log("e" +  responsetext.querySelector("#csr"));

	};
	var apidomain = "https://api.spookhost.eu.org/csrgen.php?domain=" + domain;
	//var apifulldomain = apidomain.join();
	xhttp.open("GET", apidomain);
	console.log(apidomain);
	// console.log(apifulldomain);
	//   xhttp.setRequestHeader('text', domain);
	xhttp.send();
}

</script>-->
<style>
/* width */
::-webkit-scrollbar {
  width: 7px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 3px #7e3af2; 
  border-radius: 5px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #7e3af2; 
  border-radius: 5px;
}
.ck.ck-editor {
    margin-bottom: 0.5rem;
}
/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #6c2bd9; 
}
</style>
<script>
		function navbarmenu() {	
			var navbar = getElementById("UserNavbar");
			navbar.classList.toggle("show");
		}
		function passwordhide1() {
			var hide1 = document.getElementById("passwordHide1");
			hide1.classList.toggle("d-none");
			var show1 = document.getElementById("passwordShow1");
			show1.classList.toggle("d-none");
		}
		function passwordhide2() {
			var hide2 = document.getElementById("passwordHide2");
			hide2.classList.toggle("d-none");
			var show2 = document.getElementById("passwordShow2");
			show2.classList.toggle("d-none");
		}
        function passwordhide3() {
			var hide3 = document.getElementById("passwordHide3");
			hide3.classList.toggle("d-none");
			var show3 = document.getElementById("passwordShow3");
			show3.classList.toggle("d-none");
		}
		</script>
        <script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
        
        <script type="text/javascript">
        function ckEditorCreateTickets() {
            ClassicEditor
		.create( document.querySelector( '#editor' ), {
			 toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'save' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
        }
	
</script>
<script>
var width = screen.width;
console.log(width);

if (width < 767) {
  var s = document.querySelector("#navbarSupportedContent > ul.navbar-nav.float-end > li");
  var t = document.querySelector("#sidebarnav");
  t.appendChild(s);
}
</script>
<script>
/*function javascriptCallback() {
    setTimeout(function() {turnstile.reset();}, 300000);
}*/
window.onloadTurnstileCallback = function () {
    turnstile.render('.cf-turnstile', {
        sitekey: '<?= $this->grc->get_site_key();?>',
        theme: 'light',
    //    callback: 'javascriptCallback',
        callback: function(token) {
            console.log(`Challenge Success`);
            setTimeout(function() {turnstile.reset();}, 300000);
        },
       
        });
};

</script>



<script>

    setInterval(function() {console.clear();var css="text-shadow: -1px -1px hsl(0,100%,50%), 1px 1px hsl(5.4, 100%, 50%), 3px 2px hsl(10.8, 100%, 50%), 5px 3px hsl(16.2, 100%, 50%), 7px 4px hsl(21.6, 100%, 50%), 9px 5px hsl(27, 100%, 50%), 11px 6px hsl(32.4, 100%, 50%), 13px 7px hsl(37.8, 100%, 50%), 14px 8px hsl(43.2, 100%, 50%), 16px 9px hsl(48.6, 100%, 50%), 18px 10px hsl(54, 100%, 50%), 20px 11px hsl(59.4, 100%, 50%), 22px 12px hsl(64.8, 100%, 50%), 23px 13px hsl(70.2, 100%, 50%), 25px 14px hsl(75.6, 100%, 50%), 27px 15px hsl(81, 100%, 50%), 28px 16px hsl(86.4, 100%, 50%), 30px 17px hsl(91.8, 100%, 50%), 32px 18px hsl(97.2, 100%, 50%), 33px 19px hsl(102.6, 100%, 50%), 35px 20px hsl(108, 100%, 50%), 36px 21px hsl(113.4, 100%, 50%), 38px 22px hsl(118.8, 100%, 50%), 39px 23px hsl(124.2, 100%, 50%), 41px 24px hsl(129.6, 100%, 50%), 42px 25px hsl(135, 100%, 50%), 43px 26px hsl(140.4, 100%, 50%), 45px 27px hsl(145.8, 100%, 50%), 46px 28px hsl(151.2, 100%, 50%), 47px 29px hsl(156.6, 100%, 50%), 48px 30px hsl(162, 100%, 50%), 49px 31px hsl(167.4, 100%, 50%), 50px 32px hsl(172.8, 100%, 50%), 51px 33px hsl(178.2, 100%, 50%), 52px 34px hsl(183.6, 100%, 50%), 53px 35px hsl(189, 100%, 50%), 54px 36px hsl(194.4, 100%, 50%), 55px 37px hsl(199.8, 100%, 50%), 55px 38px hsl(205.2, 100%, 50%), 56px 39px hsl(210.6, 100%, 50%), 57px 40px hsl(216, 100%, 50%), 57px 41px hsl(221.4, 100%, 50%), 58px 42px hsl(226.8, 100%, 50%), 58px 43px hsl(232.2, 100%, 50%), 58px 44px hsl(237.6, 100%, 50%), 59px 45px hsl(243, 100%, 50%), 59px 46px hsl(248.4, 100%, 50%), 59px 47px hsl(253.8, 100%, 50%), 59px 48px hsl(259.2, 100%, 50%), 59px 49px hsl(264.6, 100%, 50%), 60px 50px hsl(270, 100%, 50%), 59px 51px hsl(275.4, 100%, 50%), 59px 52px hsl(280.8, 100%, 50%), 59px 53px hsl(286.2, 100%, 50%), 59px 54px hsl(291.6, 100%, 50%), 59px 55px hsl(297, 100%, 50%), 58px 56px hsl(302.4, 100%, 50%), 58px 57px hsl(307.8, 100%, 50%), 58px 58px hsl(313.2, 100%, 50%), 57px 59px hsl(318.6, 100%, 50%), 57px 60px hsl(324, 100%, 50%), 56px 61px hsl(329.4, 100%, 50%), 55px 62px hsl(334.8, 100%, 50%), 55px 63px hsl(340.2, 100%, 50%), 54px 64px hsl(345.6, 100%, 50%), 53px 65px hsl(351, 100%, 50%), 52px 66px hsl(356.4, 100%, 50%), 51px 67px hsl(361.8, 100%, 50%), 50px 68px hsl(367.2, 100%, 50%), 49px 69px hsl(372.6, 100%, 50%), 48px 70px hsl(378, 100%, 50%), 47px 71px hsl(383.4, 100%, 50%), 46px 72px hsl(388.8, 100%, 50%), 45px 73px hsl(394.2, 100%, 50%), 43px 74px hsl(399.6, 100%, 50%), 42px 75px hsl(405, 100%, 50%), 41px 76px hsl(410.4, 100%, 50%), 39px 77px hsl(415.8, 100%, 50%), 38px 78px hsl(421.2, 100%, 50%), 36px 79px hsl(426.6, 100%, 50%), 35px 80px hsl(432, 100%, 50%), 33px 81px hsl(437.4, 100%, 50%), 32px 82px hsl(442.8, 100%, 50%), 30px 83px hsl(448.2, 100%, 50%), 28px 84px hsl(453.6, 100%, 50%), 27px 85px hsl(459, 100%, 50%), 25px 86px hsl(464.4, 100%, 50%), 23px 87px hsl(469.8, 100%, 50%), 22px 88px hsl(475.2, 100%, 50%), 20px 89px hsl(480.6, 100%, 50%), 18px 90px hsl(486, 100%, 50%), 16px 91px hsl(491.4, 100%, 50%), 14px 92px hsl(496.8, 100%, 50%), 13px 93px hsl(502.2, 100%, 50%), 11px 94px hsl(507.6, 100%, 50%), 9px 95px hsl(513, 100%, 50%), 7px 96px hsl(518.4, 100%, 50%), 5px 97px hsl(523.8, 100%, 50%), 3px 98px hsl(529.2, 100%, 50%), 1px 99px hsl(534.6, 100%, 50%), 7px 100px hsl(540, 100%, 50%), -1px 101px hsl(545.4, 100%, 50%), -3px 102px hsl(550.8, 100%, 50%), -5px 103px hsl(556.2, 100%, 50%), -7px 104px hsl(561.6, 100%, 50%), -9px 105px hsl(567, 100%, 50%), -11px 106px hsl(572.4, 100%, 50%), -13px 107px hsl(577.8, 100%, 50%), -14px 108px hsl(583.2, 100%, 50%), -16px 109px hsl(588.6, 100%, 50%), -18px 110px hsl(594, 100%, 50%), -20px 111px hsl(599.4, 100%, 50%), -22px 112px hsl(604.8, 100%, 50%), -23px 113px hsl(610.2, 100%, 50%), -25px 114px hsl(615.6, 100%, 50%), -27px 115px hsl(621, 100%, 50%), -28px 116px hsl(626.4, 100%, 50%), -30px 117px hsl(631.8, 100%, 50%), -32px 118px hsl(637.2, 100%, 50%), -33px 119px hsl(642.6, 100%, 50%), -35px 120px hsl(648, 100%, 50%), -36px 121px hsl(653.4, 100%, 50%), -38px 122px hsl(658.8, 100%, 50%), -39px 123px hsl(664.2, 100%, 50%), -41px 124px hsl(669.6, 100%, 50%), -42px 125px hsl(675, 100%, 50%), -43px 126px hsl(680.4, 100%, 50%), -45px 127px hsl(685.8, 100%, 50%), -46px 128px hsl(691.2, 100%, 50%), -47px 129px hsl(696.6, 100%, 50%), -48px 130px hsl(702, 100%, 50%), -49px 131px hsl(707.4, 100%, 50%), -50px 132px hsl(712.8, 100%, 50%), -51px 133px hsl(718.2, 100%, 50%), -52px 134px hsl(723.6, 100%, 50%), -53px 135px hsl(729, 100%, 50%), -54px 136px hsl(734.4, 100%, 50%), -55px 137px hsl(739.8, 100%, 50%), -55px 138px hsl(745.2, 100%, 50%), -56px 139px hsl(750.6, 100%, 50%), -57px 140px hsl(756, 100%, 50%), -57px 141px hsl(761.4, 100%, 50%), -58px 142px hsl(766.8, 100%, 50%), -58px 143px hsl(772.2, 100%, 50%), -58px 144px hsl(777.6, 100%, 50%), -59px 145px hsl(783, 100%, 50%), -59px 146px hsl(788.4, 100%, 50%), -59px 147px hsl(793.8, 100%, 50%), -59px 148px hsl(799.2, 100%, 50%), -59px 149px hsl(804.6, 100%, 50%), -60px 150px hsl(810, 100%, 50%), -59px 151px hsl(815.4, 100%, 50%), -59px 152px hsl(820.8, 100%, 50%), -59px 153px hsl(826.2, 100%, 50%), -59px 154px hsl(831.6, 100%, 50%), -59px 155px hsl(837, 100%, 50%), -58px 156px hsl(842.4, 100%, 50%), -58px 157px hsl(847.8, 100%, 50%), -58px 158px hsl(853.2, 100%, 50%), -57px 159px hsl(858.6, 100%, 50%), -57px 160px hsl(864, 100%, 50%), -56px 161px hsl(869.4, 100%, 50%), -55px 162px hsl(874.8, 100%, 50%), -55px 163px hsl(880.2, 100%, 50%), -54px 164px hsl(885.6, 100%, 50%), -53px 165px hsl(891, 100%, 50%), -52px 166px hsl(896.4, 100%, 50%), -51px 167px hsl(901.8, 100%, 50%), -50px 168px hsl(907.2, 100%, 50%), -49px 169px hsl(912.6, 100%, 50%), -48px 170px hsl(918, 100%, 50%), -47px 171px hsl(923.4, 100%, 50%), -46px 172px hsl(928.8, 100%, 50%), -45px 173px hsl(934.2, 100%, 50%), -43px 174px hsl(939.6, 100%, 50%), -42px 175px hsl(945, 100%, 50%), -41px 176px hsl(950.4, 100%, 50%), -39px 177px hsl(955.8, 100%, 50%), -38px 178px hsl(961.2, 100%, 50%), -36px 179px hsl(966.6, 100%, 50%), -35px 180px hsl(972, 100%, 50%), -33px 181px hsl(977.4, 100%, 50%), -32px 182px hsl(982.8, 100%, 50%), -30px 183px hsl(988.2, 100%, 50%), -28px 184px hsl(993.6, 100%, 50%), -27px 185px hsl(999, 100%, 50%), -25px 186px hsl(1004.4, 100%, 50%), -23px 187px hsl(1009.8, 100%, 50%), -22px 188px hsl(1015.2, 100%, 50%), -20px 189px hsl(1020.6, 100%, 50%), -18px 190px hsl(1026, 100%, 50%), -16px 191px hsl(1031.4, 100%, 50%), -14px 192px hsl(1036.8, 100%, 50%), -13px 193px hsl(1042.2, 100%, 50%), -11px 194px hsl(1047.6, 100%, 50%), -9px 195px hsl(1053, 100%, 50%), -7px 196px hsl(1058.4, 100%, 50%), -5px 197px hsl(1063.8, 100%, 50%), -3px 198px hsl(1069.2, 100%, 50%), -1px 199px hsl(1074.6, 100%, 50%), -1px 200px hsl(1080, 100%, 50%), 1px 201px hsl(1085.4, 100%, 50%), 3px 202px hsl(1090.8, 100%, 50%), 5px 203px hsl(1096.2, 100%, 50%), 7px 204px hsl(1101.6, 100%, 50%), 9px 205px hsl(1107, 100%, 50%), 11px 206px hsl(1112.4, 100%, 50%), 13px 207px hsl(1117.8, 100%, 50%), 14px 208px hsl(1123.2, 100%, 50%), 16px 209px hsl(1128.6, 100%, 50%), 18px 210px hsl(1134, 100%, 50%), 20px 211px hsl(1139.4, 100%, 50%), 22px 212px hsl(1144.8, 100%, 50%), 23px 213px hsl(1150.2, 100%, 50%), 25px 214px hsl(1155.6, 100%, 50%), 27px 215px hsl(1161, 100%, 50%), 28px 216px hsl(1166.4, 100%, 50%), 30px 217px hsl(1171.8, 100%, 50%), 32px 218px hsl(1177.2, 100%, 50%), 33px 219px hsl(1182.6, 100%, 50%), 35px 220px hsl(1188, 100%, 50%), 36px 221px hsl(1193.4, 100%, 50%), 38px 222px hsl(1198.8, 100%, 50%), 39px 223px hsl(1204.2, 100%, 50%), 41px 224px hsl(1209.6, 100%, 50%), 42px 225px hsl(1215, 100%, 50%), 43px 226px hsl(1220.4, 100%, 50%), 45px 227px hsl(1225.8, 100%, 50%), 46px 228px hsl(1231.2, 100%, 50%), 47px 229px hsl(1236.6, 100%, 50%), 48px 230px hsl(1242, 100%, 50%), 49px 231px hsl(1247.4, 100%, 50%), 50px 232px hsl(1252.8, 100%, 50%), 51px 233px hsl(1258.2, 100%, 50%), 52px 234px hsl(1263.6, 100%, 50%), 53px 235px hsl(1269, 100%, 50%), 54px 236px hsl(1274.4, 100%, 50%), 55px 237px hsl(1279.8, 100%, 50%), 55px 238px hsl(1285.2, 100%, 50%), 56px 239px hsl(1290.6, 100%, 50%), 57px 240px hsl(1296, 100%, 50%), 57px 241px hsl(1301.4, 100%, 50%), 58px 242px hsl(1306.8, 100%, 50%), 58px 243px hsl(1312.2, 100%, 50%), 58px 244px hsl(1317.6, 100%, 50%), 59px 245px hsl(1323, 100%, 50%), 59px 246px hsl(1328.4, 100%, 50%), 59px 247px hsl(1333.8, 100%, 50%), 59px 248px hsl(1339.2, 100%, 50%), 59px 249px hsl(1344.6, 100%, 50%), 60px 250px hsl(1350, 100%, 50%), 59px 251px hsl(1355.4, 100%, 50%), 59px 252px hsl(1360.8, 100%, 50%), 59px 253px hsl(1366.2, 100%, 50%), 59px 254px hsl(1371.6, 100%, 50%), 59px 255px hsl(1377, 100%, 50%), 58px 256px hsl(1382.4, 100%, 50%), 58px 257px hsl(1387.8, 100%, 50%), 58px 258px hsl(1393.2, 100%, 50%), 57px 259px hsl(1398.6, 100%, 50%), 57px 260px hsl(1404, 100%, 50%), 56px 261px hsl(1409.4, 100%, 50%), 55px 262px hsl(1414.8, 100%, 50%), 55px 263px hsl(1420.2, 100%, 50%), 54px 264px hsl(1425.6, 100%, 50%), 53px 265px hsl(1431, 100%, 50%), 52px 266px hsl(1436.4, 100%, 50%), 51px 267px hsl(1441.8, 100%, 50%), 50px 268px hsl(1447.2, 100%, 50%), 49px 269px hsl(1452.6, 100%, 50%), 48px 270px hsl(1458, 100%, 50%), 47px 271px hsl(1463.4, 100%, 50%), 46px 272px hsl(1468.8, 100%, 50%), 45px 273px hsl(1474.2, 100%, 50%), 43px 274px hsl(1479.6, 100%, 50%), 42px 275px hsl(1485, 100%, 50%), 41px 276px hsl(1490.4, 100%, 50%), 39px 277px hsl(1495.8, 100%, 50%), 38px 278px hsl(1501.2, 100%, 50%), 36px 279px hsl(1506.6, 100%, 50%), 35px 280px hsl(1512, 100%, 50%), 33px 281px hsl(1517.4, 100%, 50%), 32px 282px hsl(1522.8, 100%, 50%), 30px 283px hsl(1528.2, 100%, 50%), 28px 284px hsl(1533.6, 100%, 50%), 27px 285px hsl(1539, 100%, 50%), 25px 286px hsl(1544.4, 100%, 50%), 23px 287px hsl(1549.8, 100%, 50%), 22px 288px hsl(1555.2, 100%, 50%), 20px 289px hsl(1560.6, 100%, 50%), 18px 290px hsl(1566, 100%, 50%), 16px 291px hsl(1571.4, 100%, 50%), 14px 292px hsl(1576.8, 100%, 50%), 13px 293px hsl(1582.2, 100%, 50%), 11px 294px hsl(1587.6, 100%, 50%), 9px 295px hsl(1593, 100%, 50%), 7px 296px hsl(1598.4, 100%, 50%), 5px 297px hsl(1603.8, 100%, 50%), 3px 298px hsl(1609.2, 100%, 50%), 1px 299px hsl(1614.6, 100%, 50%), 2px 300px hsl(1620, 100%, 50%), -1px 301px hsl(1625.4, 100%, 50%), -3px 302px hsl(1630.8, 100%, 50%), -5px 303px hsl(1636.2, 100%, 50%), -7px 304px hsl(1641.6, 100%, 50%), -9px 305px hsl(1647, 100%, 50%), -11px 306px hsl(1652.4, 100%, 50%), -13px 307px hsl(1657.8, 100%, 50%), -14px 308px hsl(1663.2, 100%, 50%), -16px 309px hsl(1668.6, 100%, 50%), -18px 310px hsl(1674, 100%, 50%), -20px 311px hsl(1679.4, 100%, 50%), -22px 312px hsl(1684.8, 100%, 50%), -23px 313px hsl(1690.2, 100%, 50%), -25px 314px hsl(1695.6, 100%, 50%), -27px 315px hsl(1701, 100%, 50%), -28px 316px hsl(1706.4, 100%, 50%), -30px 317px hsl(1711.8, 100%, 50%), -32px 318px hsl(1717.2, 100%, 50%), -33px 319px hsl(1722.6, 100%, 50%), -35px 320px hsl(1728, 100%, 50%), -36px 321px hsl(1733.4, 100%, 50%), -38px 322px hsl(1738.8, 100%, 50%), -39px 323px hsl(1744.2, 100%, 50%), -41px 324px hsl(1749.6, 100%, 50%), -42px 325px hsl(1755, 100%, 50%), -43px 326px hsl(1760.4, 100%, 50%), -45px 327px hsl(1765.8, 100%, 50%), -46px 328px hsl(1771.2, 100%, 50%), -47px 329px hsl(1776.6, 100%, 50%), -48px 330px hsl(1782, 100%, 50%), -49px 331px hsl(1787.4, 100%, 50%), -50px 332px hsl(1792.8, 100%, 50%), -51px 333px hsl(1798.2, 100%, 50%), -52px 334px hsl(1803.6, 100%, 50%), -53px 335px hsl(1809, 100%, 50%), -54px 336px hsl(1814.4, 100%, 50%), -55px 337px hsl(1819.8, 100%, 50%), -55px 338px hsl(1825.2, 100%, 50%), -56px 339px hsl(1830.6, 100%, 50%), -57px 340px hsl(1836, 100%, 50%), -57px 341px hsl(1841.4, 100%, 50%), -58px 342px hsl(1846.8, 100%, 50%), -58px 343px hsl(1852.2, 100%, 50%), -58px 344px hsl(1857.6, 100%, 50%), -59px 345px hsl(1863, 100%, 50%), -59px 346px hsl(1868.4, 100%, 50%), -59px 347px hsl(1873.8, 100%, 50%), -59px 348px hsl(1879.2, 100%, 50%), -59px 349px hsl(1884.6, 100%, 50%), -60px 350px hsl(1890, 100%, 50%), -59px 351px hsl(1895.4, 100%, 50%), -59px 352px hsl(1900.8, 100%, 50%), -59px 353px hsl(1906.2, 100%, 50%), -59px 354px hsl(1911.6, 100%, 50%), -59px 355px hsl(1917, 100%, 50%), -58px 356px hsl(1922.4, 100%, 50%), -58px 357px hsl(1927.8, 100%, 50%), -58px 358px hsl(1933.2, 100%, 50%), -57px 359px hsl(1938.6, 100%, 50%), -57px 360px hsl(1944, 100%, 50%), -56px 361px hsl(1949.4, 100%, 50%), -55px 362px hsl(1954.8, 100%, 50%), -55px 363px hsl(1960.2, 100%, 50%), -54px 364px hsl(1965.6, 100%, 50%), -53px 365px hsl(1971, 100%, 50%), -52px 366px hsl(1976.4, 100%, 50%), -51px 367px hsl(1981.8, 100%, 50%), -50px 368px hsl(1987.2, 100%, 50%), -49px 369px hsl(1992.6, 100%, 50%), -48px 370px hsl(1998, 100%, 50%), -47px 371px hsl(2003.4, 100%, 50%), -46px 372px hsl(2008.8, 100%, 50%), -45px 373px hsl(2014.2, 100%, 50%), -43px 374px hsl(2019.6, 100%, 50%), -42px 375px hsl(2025, 100%, 50%), -41px 376px hsl(2030.4, 100%, 50%), -39px 377px hsl(2035.8, 100%, 50%), -38px 378px hsl(2041.2, 100%, 50%), -36px 379px hsl(2046.6, 100%, 50%), -35px 380px hsl(2052, 100%, 50%), -33px 381px hsl(2057.4, 100%, 50%), -32px 382px hsl(2062.8, 100%, 50%), -30px 383px hsl(2068.2, 100%, 50%), -28px 384px hsl(2073.6, 100%, 50%), -27px 385px hsl(2079, 100%, 50%), -25px 386px hsl(2084.4, 100%, 50%), -23px 387px hsl(2089.8, 100%, 50%), -22px 388px hsl(2095.2, 100%, 50%), -20px 389px hsl(2100.6, 100%, 50%), -18px 390px hsl(2106, 100%, 50%), -16px 391px hsl(2111.4, 100%, 50%), -14px 392px hsl(2116.8, 100%, 50%), -13px 393px hsl(2122.2, 100%, 50%), -11px 394px hsl(2127.6, 100%, 50%), -9px 395px hsl(2133, 100%, 50%), -7px 396px hsl(2138.4, 100%, 50%), -5px 397px hsl(2143.8, 100%, 50%), -3px 398px hsl(2149.2, 100%, 50%), -1px 399px hsl(2154.6, 100%, 50%); font-size: 40px;";console.log("%cSTOP %s",css,"\nDO NOT ENTER ANYTHING");}, 15)
</script>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
<!--<link rel="stylesheet" href="https://app.spookhost.eu.org/assets/css/tabler.min.css">-->
<style>
.ck-rounded-corners .ck.ck-editor__main>.ck-editor__editable, .ck.ck-editor__main>.ck-editor__editable.ck-rounded-corners {
    height: 100%;
}
.ck.ck-reset.ck-editor.ck-rounded-corners {
    height: 100%;
}
.ck.ck-editor__main {
    height: inherit;
}
</style>
<script>
document.querySelector('#backdrop-loading').style.visibility = 'hidden';
document.querySelector('#backdrop-loading').style.opacity = '0';
</script>
<script>
if ((window.location.href.includes('account')) || (window.location.href.includes('dashboard'))) {
    document.getElementById('currentpage-span-acc').style.opacity = '1';
    document.getElementById('currentpage-span-acc-mobile').style.opacity = '1';
} else if (window.location.href.includes('ssl')) {
    document.getElementById('currentpage-span-ssl').style.opacity = '1';
    document.getElementById('currentpage-span-ssl-mobile').style.opacity = '1';
} else if (window.location.href.includes('ticket')) {
    document.getElementById('currentpage-span-ticket').style.opacity = '1';
    document.getElementById('currentpage-span-ticket-mobile').style.opacity = '1';
} else if (window.location.href.includes('domain_checker')) {
    document.getElementById('currentpage-span-checker').style.opacity = '1';
    document.getElementById('currentpage-span-checker-mobile').style.opacity = '1';
}
</script>

</body>
</html>