
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              <?= $this->base->text($title, 'title') ?>
            </h2>
        


	
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" id="account_notice" >
         
     
            
            <?= form_open('u/create_ticket') ?>
    <label class="dark:text-white">   <?= $this->base->text('subject', 'label') ?> </label>
  <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input mb-2" type="textbox" id="subject" name="subject" placeholder=" " required>
  <label class="dark:text-white">  <?= $this->base->text('content', 'label') ?> </label>
  <div  style="height: 150px;margin-bottom: 3rem;">
  <textarea class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input mb-2" type="textbox" id="editor" name="content" placeholder=" " ></textarea></div>

  <?php if($this->grc->get_type() == "google"):?>
  <!--	<div class="g-recaptcha" data-sitekey="<?= $this->grc->get_site_key();?>"></div>
									<script src='https://www.google.com/recaptcha/api.js' async defer ></script>-->
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


<input type='submit' name='create' value='<?= $this->base->text('create', 'button') ?>' id="submit" onclick="if (document.getElementById('subject').value.length != 0) {document.getElementById('submit').value = 'Creating';Swal.fire({title: 'Please Wait',text: 'Creating Ticket',showCloseButton: false,showConfirmButton: false,allowOutsideClick: false,didOpen: () => {Swal.showLoading()},})}" class='px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border cursor-pointer border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple'></input>




</form>
         </div>


            </div>
          </div><script type="text/javascript" src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
                <script>
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
        </script>
        </main>
      </div>
    </div>
    