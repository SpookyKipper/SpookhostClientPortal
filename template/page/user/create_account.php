
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              <?= $this->base->text($title, 'title') ?>
            </h2>
        


	
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" id="account_notice" >
         
   
            <div class="d-grid mb-2">
      <ul class="nav nav-tabs flex flex-col md:flex-row flex-wrap list-none border-b-0 pl-0 " role="tablist">
        <li class="nav-item">
          <a class="nav-link  block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent" data-bs-toggle="tab" href="#checkdomain">
            <i class="fa fa-globe me-2"></i> <?= $this->base->text('check_domain', 'button') ?> </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent" data-bs-toggle="tab" <?php if(isset($_SESSION['domain'])): ?>href="#configure" <?php else: ?>href="#" disabled <?php endif; ?>>
            <i class="fa fa-cogs me-2"></i> <?= $this->base->text('configure', 'button') ?> </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent" data-bs-toggle="tab" <?php if(isset($_SESSION['done'])): ?>href="#done" <?php else: ?>href="#" disabled <?php endif; ?>>
            <i class="fa fa-check-circle me-2"></i> <?= $this->base->text('done', 'button') ?> </a>
        </li>
      </ul>
<div class="tab-content">








<div class="tab-pane active show" id="checkdomain">
          <ul class="nav nav-tabs mb-2">
            <li role="presentation" class="nav-item w-fit inline ">
              <a class="nav-link w-fit inline-block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent active" data-bs-toggle="tab" href="#subdomain"> <?= $this->base->text('subdomain', 'button') ?> </a>
            <li role="presentation" class="nav-item w-fit inline">
              <a class="nav-link w-fit  inline-block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent" data-bs-toggle="tab" href="#customdomain"> <?= $this->base->text('custom_domain', 'button') ?> </a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="subdomain"> <?= form_open('u/create_account') ?> <div class="">
                <div class="mb-2">
                  <input type="text" name="domain" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="<?= $this->base->text('domain_name', 'label') ?>" required>
                </div>
                <div class="mb-2">
                  <select name="ext" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"> <?php foreach ($this->mofh->list_exts() as $ext): ?> <option> <?= $ext['domain_name'] ?> </option> <?php endforeach ?> </select>
                </div>
                <div class="mb-2 d-grid">
                  <input type="submit" name="check_subdomain" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent cursor-pointer rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" value="<?= $this->base->text('check_availibilty', 'button') ?>">
                </div>
              </div>
              </form>
            </div>
            <div class="tab-pane" id="customdomain"> <?= form_open('u/create_account') ?> <div class="">
                <div class="mb-2">
                  <input type="text" name="domain" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="<?= $this->base->text('domain_name', 'label') ?>" required>
                </div>
                <div class="mb-2 d-grid ">
                  <input type="submit" name="check_domain" class="cursor-pointer px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" value="<?= $this->base->text('check_availibilty', 'button') ?>">
                </div>
                <div class="aflex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" role="alert"> To host your Domain with us, Please set your Nameservers to the followings. <br> If you need a domain, we recommend purchasing it from <a href="https://portal.spookhost.xyz/u/namecheap" target="_blank" class="underline">Namecheap</a>. <br>
                  <b>ns1.spookhost.xyz <br>ns2.spookhost.xyz </b>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>


<div class="tab-pane" id="configure">


<?= form_open('u/create_account') ?>
<div class="mb-2">
            <label class="form-label "> <?= $this->base->text('domain_name', 'label') ?> </label>
            <input type="text" name="domain" value="<?php if(isset($_SESSION['domain'])): echo($_SESSION['domain']); endif ?>" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" readonly="true">
          </div>

<div class="mb-2">
            <label class="form-label "> <?= $this->base->text('account_label', 'label') ?> </label>
            <input type="text" name="label" placeholder="<?= $this->base->text('account_label', 'label') ?>" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="Hosting Account for <?php if(isset($_SESSION['domain'])): echo($_SESSION['domain']); endif ?>">
          </div>


<!--<label><?= $this->base->text('username', 'label') ?></label>-->
          <input type="text" placeholder="Automatically Generated" class="form-control rounded" readonly="true" hidden>
<div class="mb-2">
            <label class="form-label " hidden> <?= $this->base->text('password', 'label') ?> </label>
            <input type="text" placeholder="<?= $this->base->text('password', 'label') ?>" class="form-control rounded" hidden>
          </div>




<?php if($this->grc->is_active()):?> 

<div class="mb-2"> 

<?php if($this->grc->get_type() == "google"):?>
            <!--	<div class="g-recaptcha" data-sitekey="
<?= $this->grc->get_site_key();?>"></div><script src='https://www.google.com/recaptcha/api.js' async defer ></script>-->
            <!--	<div class="g-recaptcha" data-sitekey="
<?= $this->grc->get_site_key();?>"></div><script src='https://www.google.com/recaptcha/api.js' async defer ></script>-->
            <div class="cf-turnstile" data-sitekey="<?= $this->grc->get_site_key();?>" data-callback="javascriptCallback" data-theme="light">
            </div> 

<?php elseif($this->grc->get_type() == "human"): ?> 
            <input name="geetest_lot_number" class="inp" id="geetest_lot_number" type="text" hidden>
            <input name="geetest_captcha_output" class="inp" id="geetest_captcha_output" type="text" hidden>
            <input name="geetest_pass_token" class="inp" id="geetest_pass_token" type="text" hidden>
            <input name="geetest_gen_time" class="inp" id="geetest_gen_time" type="text" hidden>
            <input name="h-captcha-response" class="inp" id="h-captcha-response" type="text" style="display: none;">
            <div id='captcha'></div> 
            <?php endif ?>
            
<?php endif ?>

 <div class="mb-2 mt-2">
              <input type="submit" name="create" value="<?= $this->base->text('create_account', 'button') ?>" class="cursor-pointer px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            </div>





            </form>








</div>








</div>

      
            </div>
          </div>
        </div>
