
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              <?= $this->base->text($title, 'title') ?>
            </h2>
            
      <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
              <?= $this->base->text('interface', 'heading') ?>
            </h4>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
         
              <label class="block text-sm">
                 <?= form_open('u/settings') ?>
                <span class="text-gray-700 dark:text-gray-400"><?= $this->base->text('language', 'label') ?></span>
                <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="language">
							<?php foreach (get_languages() as $lang): ?>
								<?php if ($lang['code'] == get_cookie('lang')): ?>
									<option value="<?= $lang['code'] ?>" selected="true"><?= $lang['name'] ?></option>
								<?php else: ?>
									<option value="<?= $lang['code'] ?>"><?= $lang['name'] ?></option>
								<?php endif ?>
							<?php endforeach ?>
						</select>
                        <input id="labelsubmit" type="submit" hidden name="update_theme" value="<?= $this->base->text('change', 'button') ?>" class="btn btn-primary btn-pill rounded">
 </form>
 <div class="mt-4"></div>
<span class="text-gray-700 dark:text-gray-400" ><?= $this->base->text('theme', 'label') ?></span>
<br>
<button class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" @click="toggleTheme" aria-label="Toggle color mode">
Toggle
</button><p>&nbsp;</p>
              <button type="button" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" onclick="document.getElementById('labelsubmit').click();">
              
                  <?= $this->base->text('change', 'button') ?></button>
               
            
              </div>
             
       









            </div>





        </main>
      </div>
    </div>
    <script>
    document.querySelector('#titlebar').innerHTML = `<u><a href="https://app.spookhost.eu.org/u/dashboard/" onclick="changelink('https://app.spookhost.eu.org/u/dashboard/');return false;"  ><?= $this->base->text('dashboard', 'title') ?></a></u>   > <?= $this->base->text($title, 'title') ?>`
    </script>

