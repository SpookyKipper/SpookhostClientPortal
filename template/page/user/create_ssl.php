
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              <?= $this->base->text($title, 'title') ?>
            </h2>
        


	
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" id="account_notice" >
         
   
            
            <?= form_open('u/create_ssl') ?>
        <i class="dark:text-white"><?= $this->base->text('domain', 'table') ?>: Exclude http:// and https://</i></label>
  <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input mb-2" type="textbox" id="dname" name="dname" placeholder="example.com" required>
<!--
  <div class='cf-turnstile' data-sitekey='<?= $this->grc->get_site_key();?>' data-callback='javascriptCallback' data-theme="light" placeholder-text="Loading Cloudflare, Do not submit until Successful Challenge."></div>  -->
  
  <?php if($this->grc->get_type() == "google"):?>
								<!--	<div class="g-recaptcha" data-sitekey="<?= $this->grc->get_site_key();?>"></div>
									<script src='https://www.google.com/recaptcha/api.js' async defer ></script>-->
                                    <div class="cf-turnstile" data-sitekey="<?= $this->grc->get_site_key();?>" data-callback="javascriptCallback" data-theme="light"></div>
						
						<?php elseif($this->grc->get_type() == "human"): ?>
								
  <input name="geetest_lot_number" class="inp" id="geetest_lot_number" type="text" style="display: none;">
          <input name="geetest_captcha_output" class="inp" id="geetest_captcha_output" type="text" hidden>
            <input name="geetest_pass_token" class="inp" id="geetest_pass_token" type="text" hidden>
              <input name="geetest_gen_time" class="inp" id="geetest_gen_time" type="text" hidden>
               <input name="h-captcha-response" class="inp" id="h-captcha-response" type="text" hidden>
               <div id='captcha'></div>
								<?php endif ?>


               
               
               <br>


<input type='submit' name='create' value='<?= $this->base->text('request', 'button') ?>' id="submit" onclick="if (document.getElementById('dname').value.length != 0) {document.getElementById('submit').value = 'Requesting';Swal.fire({title: 'Please Wait',text: 'Requesting Certificate',showCloseButton: false,showConfirmButton: false,allowOutsideClick: false,didOpen: () => {Swal.showLoading()},})}" class='px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border cursor-pointer border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple'></input>


<!--
<input id="RequestBtnOne" type="button" class="btn btn-primary btn-pill rounded" onclick="document.querySelector('#main-wrapper > div > div > div.card.p-2.mb-3 > div > input.btn.btn-primary.btn-pill').value = 'Loading'; if (document.getElementById('dname').value.length !== 0) {getcsr(document.getElementById('dname').value)} else {document.querySelector('#main-wrapper > div > div > div.card.p-2.mb-3 > div > input.btn.btn-primary.btn-pill').value = '<?= $this->base->text('request', 'button') ?>';Swal.fire({  icon: 'error',  title: 'The Domain Field is Required',});};" value="<?= $this->base->text('request', 'button') ?>"></input>  --> <label class="dark:text-white">By continuing, you agree to the <a href="https://www.gogetssl.com/terms-and-conditions/" target="_blank" class="text-blue underline dark:text-white">GoGetSSL ToS</a>. </label>

</form>
         </div>


            </div>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
