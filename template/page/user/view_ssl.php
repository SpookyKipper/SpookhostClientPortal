
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              <?= $this->base->text($title, 'title') ?> - <?= $id ?>
            </h2>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" id="account_notice" >
         
   
                <div class="d-grid  row-auto">
              

<div class="grid grid-cols-4 gap-4">
  <div class="dark:text-white"><?= $this->base->text('domain', 'table') ?></div>
  <div><code style="color: #7e3af2;"><?= $data['domain'] ?></code></div>
    <div class="dark:text-white">  <?= $this->base->text('status', 'table') ?></div>
  <div>  
                      
                      <?php if ($data['status'] == 'processing'): ?>
								<span class="px-2 py-1 font-semibold leading-tight yellow-item text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
									<?= $this->base->text($data['status'], 'table') ?>
								</span>
							<?php elseif ($data['status'] == 'active'): ?>
								<span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
									<!--<?= $data['status'] ?>--><?= $this->base->text($data['status'], 'table') ?>
								</span>
							<?php elseif ($data['status'] == 'cancelled' OR $data['status'] == 'expired'): ?>
								<span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
								<!--	<?= $data['status'] ?>--><?= $this->base->text($data['status'], 'table') ?>
								</span>
							<?php endif ?>
                      
                 </div>
</div> 


<div class="grid grid-cols-4 gap-4">
  <div class="dark:text-white"><?= $this->base->text('start_date', 'table') ?></div>
  <div><code style="color: #7e3af2;"><?= $data['begin_date'] ?? '-- -- ----' ?></code></div>
    <div class="dark:text-white"> <?= $this->base->text('end_date', 'table') ?></div>
  <div> <code style="color: #7e3af2;"><?= $data['end_date'] ?? '-- -- ----' ?></code>
  </div>
</div> 






<div class="grid grid-cols-4 gap-4">
<div>&nbsp;</div><div>&nbsp;</div>
  <div class="dark:text-white"><?= $this->base->text('manage', 'button') ?></div>
  <div>


<?php if ($data['status'] == 'cancelled' OR $data['status'] == 'expired'): ?>
					<a style="color:white" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red" href="?delete=true"><?= $this->base->text('delete', 'button') ?> SSL</a>
				<?php elseif ($data['status'] !== 'cancelled' OR $data['status'] !== 'expired'): ?>
					<a style="color:white" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red" href="?cancel=true"><?= $this->base->text('cancel', 'button') ?> SSL</a>
				<?php endif ?></div>
  

</div> 





              </div>
              </div>
            

      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" id="account_notice" >
         
   
                <div class="d-grid mb-2">
              


<?php if ($data['status'] === 'processing'): ?>
			<?php $record = explode(' ', $data['approver_method']['dns']['record']) ?>
			<div class="card-header">
				<h2><div class="text-2xl  dark:text-white" ><?= $this->base->text('verify_ownership', 'heading') ?></div></h2>
			</div>
			<div class="">
				<!--<div class="mb-3">
					<label class="form-label"><?= $this->base->text('csr_code', 'label') ?></label>
					<textarea class="form-control rounded" style="min-height: 200px;" readonly="true"><?= $data['csr_code'] ?></textarea>
				</div>-->
				<div class="mb-3 ">
					<label class="form-label block dark:text-white"><?= $this->base->text('record_name', 'label') ?></label>
                    <div class="grid grid-cols-2">
                    <div>
					<input type="text" class=" w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?php echo str_replace('.' . $data['domain'] , "", trim($record[0]) );?>" readonly="true" id='recordvalue'>
                    </div>
                
                    <div>
                    <input type="text" class=" w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value=".<?php echo $data['domain'];?>" readonly="true" id='domainvalue'></div>
                  </div>
				</div>
				<div class="mb-3">
					<label class="form-label dark:text-white"><?= $this->base->text('record_content', 'label') ?></label>
					<input type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?= trim($record[2]) ?>" readonly="true">
				</div>
			</div>
		<?php else: ?>
			<div class="card-body">
            <!--
				<div class="mb-3">
					<label class="form-label"><?= $this->base->text('csr_code', 'label') ?></label>
					<textarea class="form-control rounded" style="min-height: 200px;" readonly="true"><?= $data['csr_code'] ?></textarea>
				</div>-->
                <div class="mb-3">
					<label class="form-label dark:text-white">Private Key</label>
					<textarea class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" style="min-height: 200px;" readonly="true">
<?php
			
                    if (strpos($privatekey, 'BEGIN EC PRIVATE KEY')) {
                        echo $privatekey;
                    } else {
                        $cipher = "aes-256-gcm";
                        if (in_array($cipher, openssl_get_cipher_methods()))
                    {
                        $encryptionkey = "lol";

                        $ivlen = "this value is uselss btw";
                        $iv = "why are you reading this?";
                        $encrypttag = base64_decode($encrypttag);
                        $decripted_priaetkey = openssl_decrypt(base64_decode($privatekey), $cipher, $encryptionkey, $options=0, $iv, $encrypttag);
                        echo $decripted_priaetkey;
                     
                     
                        //store $cipher, $iv, and $tag for decryption later
                        // $original_plaintext = openssl_decrypt($ciphertext, $cipher, $key, $options=0, $iv, $tag);
    
					}}
               
                    ?></textarea>
				</div>
                
				<div class="mb-3">
					<label class="form-label dark:text-white"><?= $this->base->text('crt_code', 'label') ?></label>
					<textarea class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" style="min-height: 200px;" readonly="true"><?= $data['crt_code'] ?></textarea>
				</div>
                <span class="dark:text-white">Advanced Details</span>
                <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" onclick="document.getElementById('advanceddetails').classList.toggle('hidden');" >
                  Show/Hide
                </button>
<div class="hidden" id="advanceddetails">
<div class="block p-6 rounded-lg shadow-lg bg-white dark:bg-gray-900">
				<div class="mb-3">
					<label class="form-label dark:text-white"><?= $this->base->text('ca_code', 'label') ?></label>
					<textarea class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" style="min-height: 200px;" readonly="true"><?= $data['ca_code'] ?></textarea>
				</div>
                <div class="mb-3">
					<label class="form-label dark:text-white"><?= $this->base->text('csr_code', 'label') ?></label>
					<textarea class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" style="min-height: 200px;" readonly="true"><?= $data['csr_code'] ?></textarea>
				</div></div></div>
    
		<?php endif ?>
              

              </div>
              </div></div>
            


    <script>
    document.querySelector('#titlebar').innerHTML = `<u><a href="https://app.spookhost.xyz/u/ssl/" onclick="changelink('https://app.spookhost.xyz/u/ssl/');return false;"  ><?= $this->base->text('ssl_certificates', 'title') ?></a></u> > <?= $this->base->text($title, 'title') ?>`
    </script>


    <!-- Modal backdrop. This what you want to place close to the closing body tag -->
    <div
      x-show="isModalOpen"
      x-transition:enter="transition ease-out duration-150"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition ease-in duration-150"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
      class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
    >
      <!-- Modal -->
      <div
        x-show="isModalOpen"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform translate-y-1/2"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0  transform translate-y-1/2"
        @click.away="closeModal"
        @keydown.escape="closeModal"
        class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
        role="dialog"
        id="modal"
        style="display: none;"
      >
         <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
     
        <!-- Modal body -->
        <div class="mt-4 mb-6">
          <!-- Modal title -->
          <p
            class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300"
          >
            Account Password
          </p>
          <!-- Modal description -->
          <p class="text-sm text-gray-700 dark:text-gray-400">
            Your Password is: <code style="color: #7e3af2;"><?php if ($data['account_status'] === 'active'): ?><?= $data['account_password'] ?><?php else: ?>Unavailable - Account inactive<?php endif ?></code>. Make sure to keep it safe.
          </p>
        </div>
        <footer
          class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mt-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800"
        >
       
          <button
          @click="closeModal"
            class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
          >
            Close
          </button>
        </footer>
      </div>
    </div>
    <!-- End of modal backdrop -->














        </main>
      </div>
    </div>
