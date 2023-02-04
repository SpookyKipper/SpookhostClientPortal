
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              <?= $this->base->text($title, 'title') ?>
            </h2>
            
      <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
              <?= $this->base->text('general', 'heading') ?>
            </h4>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
         
              <label class="block text-sm">
                 <?= form_open('u/account_settings/'.$id) ?>
                <span class="text-gray-700 dark:text-gray-400"><?= $this->base->text('account_label', 'label') ?></span>
                <input type="text" name="label" placeholder="<?= $this->base->text('account_label', 'label') ?>" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?= $data['account_label'] ?>" required>
				
<input type="submit" name="update_label" value="<?= $this->base->text('change', 'button') ?>" class="btn btn-primary btn-pill rounded" hidden id="labelsubmit">
              </label><p>&nbsp;</p>
              <button type="button" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" onclick="document.getElementById('labelsubmit').click();">
                  <?= $this->base->text('change', 'button') ?></button>
               
            
              </div>
              </form>
       

 <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
              <?= $this->base->text('security', 'heading') ?>
            </h4>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
         
              <label class="block text-sm">
                 <?= form_open('u/account_settings/'.$id) ?>
                <span class="text-gray-700 dark:text-gray-400" ><?= $this->base->text('new_password', 'label') ?></span>
               
                <input type="password" name="password"  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="<?= $this->base->text('new_password', 'label') ?>" required>
<p>&nbsp;</p>
 <span class="text-gray-700 dark:text-gray-400" ><?= $this->base->text('old_password', 'label') ?></span>
                <input type="password" name="old_password"  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="<?= $this->base->text('old_password', 'label') ?>" required>


				
<input type="submit" name="update_password" value="<?= $this->base->text('change', 'button') ?>" class="btn btn-primary btn-pill rounded" hidden id="passwdsubmit">
              </label><p>&nbsp;</p>
              <button type="button" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" onclick="document.getElementById('passwdsubmit').click();">
                  <?= $this->base->text('change', 'button') ?></button>
               
            
              </div>
              </form>
<!--
     
      <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
              <?= $this->base->text('deactivation', 'heading') ?>
            </h4>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
         
              <label class="block text-sm">
                 <?= form_open('u/account_settings/'.$id) ?>
                 <div class="flex items-center justify-between p-4 mb-4 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
							<?= $this->base->text('account_warning', 'paragraph') ?>
						</div>
                <span class="text-gray-700 dark:text-gray-400"><?= $this->base->text('reason', 'label') ?></span>
                <textarea  name="reason" placeholder="<?= $this->base->text('reason', 'label') ?>" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"  required></textarea>
				
<input type="submit" name="deactivate" value="<?= $this->base->text('change', 'button') ?>" class="btn btn-primary btn-pill rounded" hidden id="suspendsubmit">
              </label><p>&nbsp;</p>
              <button type="button" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" onclick="document.getElementById('suspendsubmit').click();">
                  <?= $this->base->text('deactivate', 'button') ?></button>
            
              </div>
              </form>
-->












            </div>





        </main>
      </div>
    </div>
    <script>
    document.querySelector('#titlebar').innerHTML = `<u><a href="https://portal.spookhost.xyz/u/accounts/" onclick="changelink('https://portal.spookhost.xyz/u/accounts/');return false;"  ><?= $this->base->text('accounts', 'title') ?></a></u> > <u><a href="https://portal.spookhost.xyz/u/view_account/<?php echo $id ?>" onclick="changelink('https://portal.spookhost.xyz/u/accounts/');return false;"  ><?= $this->base->text('view_account', 'title') ?></a></u> > <?= $this->base->text($title, 'title') ?>`
    </script>

