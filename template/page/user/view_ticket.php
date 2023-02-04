
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              <?= $this->base->text($title, 'title') ?> - <?= $ticket['ticket_subject'] ?>
            </h2>
        


	
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" >
         <div class="grid grid-cols-2">
				<div class="col-sm-6">
					<div class="row align-items-center">
						<span class="col dark:text-white"><?= $this->base->text('status', 'table') ?>:</span>
						<span class="col-auto ms-auto">
							<?php if ($ticket['ticket_status'] == 'open'): ?>
								<span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:bg-orange-700 dark:text-orange">
									<?= $this->base->text($ticket['ticket_status'], 'table') ?>
								</span>
							<?php elseif ($ticket['ticket_status'] == 'support' OR $ticket['ticket_status'] == 'customer'): ?>
								<span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
									<?= $this->base->text($ticket['ticket_status'], 'table') ?>
								</span>
							<?php elseif ($ticket['ticket_status'] == 'closed'): ?>
								<span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
									<?= $this->base->text($ticket['ticket_status'], 'table') ?>
								</span>
							<?php endif ?>
						</span>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="row align-items-center">
						<span class="col dark:text-white"><?= $this->base->text('open_by', 'table') ?>:</span>
                    	<span class="col-auto ms-auto" style="color: #7e3af2;"><?= $this->user->get_name() ?></span>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="row align-items-center">
						<span class="col dark:text-white"><?= $this->base->text('open_at', 'table') ?>:</span>
						<span class="col-auto ms-auto" style="color: #7e3af2;"><?= date('d-m-Y', $ticket['ticket_time']) ?></span>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="row align-items-center">
						<span class="col dark:text-white"><?= $this->base->text('last_reply', 'table') ?>:</span>
						<span class="col-auto ms-auto" style="color: #7e3af2;"><?php if(count($replies)>0): ?>
						<?= date('d-m-Y', $replies[count($replies)-1]['reply_time']); ?>
						<?php else: ?>
							NEVER
						<?php endif; ?>
						</span>
					</div>
				</div>
			</div>
   
         </div>



      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" >
          <h1 class=" font-semibold text-gray-700 dark:text-gray-200" style="font-size: 1.15rem;">Ticket Message</h1>
			<?php $ticket_creator = $this->user->get_name();
				$ico = $this->user->get_avatar(); ?>
           
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mt-2">
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">

         
                 <!--   	<span class="avatar avatar-xs me-2" style="background-image: url(<?= $ico ?>)"></span>-->
                    <div style="display: inline">  <img src="<?= $ico ?>" style="max-width: 34.5px;background-color: #e8e8e8;border-radius: 10px;    display: inline-block;">                   <?= $ticket_creator ?> </div>
				
						<div  style="float: right;"><span class="col-auto ms-auto"><?= date('d-m-Y', $ticket['ticket_time']) ?></span></div>
					
                </h4>
                <span class="text-gray-600 dark:text-white">
                 <?= $ticket['ticket_content'] ?>
                </span>
             </div>

         </div>


      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" >
          <h1 class=" font-semibold text-gray-700 dark:text-gray-200" style="font-size: 1.15rem;">Conversation</h1>
   <?php if (count($replies) > 0): ?>
		<?php foreach ($replies as $reply): ?>
			<?php if ($reply['reply_by'] == $this->user->get_key()): 
				$reply_name = $this->user->get_name();
				$ico = $this->user->get_avatar();
			 else:
			  	//$reply_name = $this->ticket->get_admin_name($reply['reply_by']);
                $reply_name = $this->ticket->get_admin_name($reply['reply_by']) . ' <span class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md">Staff</span>';
			  	$ico = base_url().'assets/img/fav.png';
			 endif ?>
           
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mt-2">
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">

         
                 <!--   	<span class="avatar avatar-xs me-2" style="background-image: url(<?= $ico ?>)"></span>-->
                    <div style="display: inline">  <img src="<?= $ico ?>" style="max-width: 34.5px;background-color: #e8e8e8;border-radius: 10px;    display: inline-block;">                   <?= $reply_name ?> </div>
				
						<div  style="float: right;"><span class="col-auto ms-auto"><?= date('d-m-Y', $reply['reply_time']) ?></span></div>
					
                </h4>
                <span class="text-gray-600 dark:text-white">
                  <?= $reply['reply_content'] ?>
                </span>
             </div>
		<?php endforeach ?>
	<?php else: ?>
		<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
			<p class="text-gray-600 dark:text-gray-400">
				<?= $this->base->text('no_reply_found', 'paragraph') ?>
			</p>
		</div>
	<?php endif ?>
         </div>





      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" >
      <?php if ($ticket['ticket_status'] == 'closed'): ?>
		<span class="dark:text-white">
				<?= $this->base->text('ticket_closed', 'paragraph') ?> <a href="<?= base_url().'u/view_ticket/'.$ticket['ticket_key'].'?open=true' ?>" style="color: #7e3af2;" class="underline"><?= $this->base->text('here', 'button') ?></a> <?= $this->base->text('to_reopen', 'paragraph') ?></span>
			
         <?php else: ?>
  <?= form_open('u/view_ticket/'.$ticket['ticket_key']) ?>
					<div  style="height: 150px;margin-bottom: 3rem;">
						<textarea id="editor" class="form-control" name="content" placeholder="Content"></textarea>
					</div>
					<?php if($this->grc->is_active()):?>
						<div class="mb-2" >
							
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
					

						</div>
					<?php endif ?>
					<div>
					
                        <input type='submit' name='reply' value="<?= $this->base->text('add_reply', 'button') ?>" id="submit" onclick="this.value = 'Replying';Swal.fire({title: 'Please Wait',text: 'Replying',showCloseButton: false,showConfirmButton: false,allowOutsideClick: false,didOpen: () => {Swal.showLoading()},})" class='px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border cursor-pointer border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple'></input>

						<a href="<?= base_url().'u/view_ticket/'.$ticket['ticket_key'].'?close=true' ?>" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"><?= $this->base->text('close_ticket', 'button') ?></a>
					</div>
				</form><?php endif ?>
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
  </body>
</html>
