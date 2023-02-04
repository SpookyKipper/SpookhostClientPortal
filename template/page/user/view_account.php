
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              <?= $this->base->text($title, 'title') ?> - <?= $id." (".$data['account_label'].")" ?>
            </h2>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" id="account_notice" >
         
            <?php $time = $data['account_time'] + 3600; ?>
				<?php if($time > time()): ?>
					<div class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-lg dark:bg-green-700 dark:text-green-100">
						<?= $this->base->text('account_note', 'paragraph') ?>
					</div>
				<?php endif; ?>
				<?php if($data['account_status'] === 'pending'): ?>
                <p>&nbsp;</p>
					<div class="px-2 py-1 font-semibold leading-tight bg-blue-100 rounded-lg dark:bg-blue-700 dark:text-blue-100">
						<?= $this->base->text('account_pending', 'paragraph') ?>
					</div>
				<?php elseif($data['account_status'] === 'reactivating'): ?>
					<div class="yellow-item px-2 py-1 font-semibold leading-tight rounded-lg ">
						<?= $this->base->text('account_reactivating', 'paragraph') ?>
					</div>
				<?php elseif($data['account_status'] === 'deactivating'): ?>
					<div class="yellow-item px-2 py-1 font-semibold leading-tight rounded-lg ">
						<?= $this->base->text('account_deactivating', 'paragraph') ?>
					</div>
				<?php elseif($data['account_status'] === 'suspended'): ?>
					<div class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-lg dark:bg-red-700 dark:text-red-100">
						<?= $this->base->text('account_suspended', 'paragraph') ?>
					</div>
				<?php elseif($data['account_status'] === 'deactivated'): ?>
					<div class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-lg dark:bg-red-700 dark:text-red-100">
						<?= $this->base->text('account_deactivated', 'paragraph') ?>
					</div>
                <?php else: ?>
               <!--  <script>
                    document.getElementById('account_notice').style.display = "none";
                    </script>-->
				<?php endif; ?>

                <div class="d-grid mb-2">
                <?php if ($data['account_status'] != 'deactivated'): ?>
                     <a href="<?= base_url() ?>u/view_account/<?= $id ?>?login=true" target="_blank" class="flex items-center mt-2 justify-center p-2 text-sm font-semibold text-purple-100 bg-purple-600 dark:bg-purple-100 dark:text-purple-600 rounded-lg  focus:outline-none focus:shadow-outline-purple"><i class="bi bi-globe"></i> &nbsp;<?= $this->base->text('control_panel', 'button') ?></a>
                     <?php else: ?>

 <a href="#" target="_blank" class="flex items-center mt-2 justify-center p-2 text-sm font-semibold text-purple-100 bg-purple-600 dark:bg-purple-100 dark:text-purple-600 rounded-lg  focus:outline-none focus:shadow-outline-purple" onclick="return false;"><i class="bi bi-globe" ></i> &nbsp;<?= $this->base->text('control_panel', 'button') ?></a>
<?php endif ?>
						</div>
						<div class="d-grid mb-2" >
						<?php if ($data['account_status'] === 'active'): ?>	<a href="<?= $this->account->create_fm_link($data['account_username'], $data['account_password']) ?>" target="_blank" class="flex items-center justify-center p-2 text-sm font-semibold text-green-700 bg-green-100 dark:bg-green-700 dark:text-green-100 rounded-lg focus:outline-none focus:shadow-outline-green"> <i class="bi bi-folder"></i>&nbsp;<?= $this->base->text('file_manager', 'button') ?></a><?php endif ?>
						</div>
						<?php if ($data['account_status'] === 'active'): ?>
							<div class="d-grid mb-2  items-center">
								<a href="<?= base_url() ?>u/account_settings/<?= $id ?>" target="_blank" class="flex items-left justify-center p-2 text-sm font-semibold text-red-700 bg-red-100 dark:bg-red-700 dark:text-red-100 rounded-lg  focus:outline-none focus:shadow-outline-red">
                              
                                   <i class="bi bi-gear"></i>
&nbsp;<?= $this->base->text('settings', 'button') ?></a>
							</div>
						<?php elseif ($data['account_status'] === 'suspended'): ?>
							<div class="d-grid mb-2">
								<a href="<?= base_url() ?>u/create_ticket" class="flex items-left justify-center p-2 text-sm font-semibold text-red-700 bg-red-100 dark:bg-red-700 dark:text-red-100 rounded-lg  focus:outline-none focus:shadow-outline-red"><i class="bi bi-gear"></i> &nbsp;<?= $this->base->text('open_ticket', 'button') ?></a>
							</div>
						<?php elseif ($data['account_status'] === 'deactivated'): ?>
							<div class="d-grid mb-2">
								<a href="<?= base_url() ?>u/view_account/<?= $id ?>?reactivate=true" class="flex items-left justify-center p-2 text-sm font-semibold text-gray-700 bg-gray-100 dark:bg-gray-700 dark:text-gray-100 rounded-lg focus:outline-none focus:shadow-outline-gray"><i class="bi bi-gear"></i> &nbsp;<?= $this->base->text('reactivate', 'button') ?></a>
							</div>
						<?php //else: ?>
						<!--	<div class="d-grid mb-2">
								<a href="#" class="flex items-left justify-center p-2 text-sm font-semibold text-red-700 bg-red-100 dark:bg-red-700 dark:text-red-100 rounded-lg  focus:outline-none focus:shadow-outline-red"><i class="bi bi-gear"></i> &nbsp;<?= $this->base->text('settings', 'button') ?></a>
							</div>-->
						<?php endif ?>

              </div>
            
    <!-- New Table -->
    <h4 class="mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300"><?= $this->base->text('account_details', 'heading') ?></h4>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
             
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Item</th>
                      <th class="px-4 py-3" style="/*visibility: hidden*/">Value </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                         
                   <?= $this->base->text('username', 'table') ?>
                          </div>
                          <div>
                            <p class="font-semibold"><?= $item['account_username'] ?></p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                            </p>
                          </div>
                        </div>
                      </td>
                     
                      <td class="px-4 py-3 text-xs">
                      <code style="color: #7e3af2;font-size: larger;"><?= $data['account_username'] ?></code>
                 
									
                                        

                      </td>
                      <td class="px-4 py-3 text-sm">
                      
                      &nbsp;
                      
                      </td>
                
                    </tr>


                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                         
                    <?= $this->base->text('password', 'table') ?>
									
                          </div>
                          <div>
                            <p class="font-semibold"><?= $item['account_username'] ?></p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                            </p>
                          </div>
                        </div>
                      </td>
                     
                      <td class="px-4 py-3 text-xs">
              <button @click="openModal" id="passwordHide1"  class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" >Click to Show</button>
								
                                            <code id="passwordShow1" style="width: 150px;display: none" class="text-center px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" >
													<?= $data['account_password'] ?>
												
											</code>

                      </td>
                      <td class="px-4 py-3 text-sm">
                      
                      &nbsp;
                      
                      </td>
                
                    </tr>


                  
                 


                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                         
                 <?= $this->base->text('status', 'table') ?>
                          </div>
                          <div>
                            <p class="font-semibold"><?= $item['account_username'] ?></p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                            </p>
                          </div>
                        </div>
                      </td>
                     
                      <td class="px-4 py-3 text-xs">
                 <?php if ($data['account_status'] == 'pending' OR $data['account_status'] == 'deactivating' OR $data['account_status'] == 'reactivating'): ?>
												<span class="px-2 py-1 font-semibold leading-tight yellow-item rounded-full ">
                                                <?= $this->base->text($data['account_status'], 'table') ?>
												</span>
											<?php elseif ($data['account_status'] == 'active'): ?>
												<span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                <?= $this->base->text($data['account_status'], 'table') ?>
												</span>
											<?php elseif ($data['account_status'] == 'deactivated' OR $data['account_status'] == 'suspended'): ?>
												<span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                <?= $this->base->text($data['account_status'], 'table') ?>

												</span>
											<?php endif ?>
										<!--	<code id="passwordShow1" style="width: 150px" class="text-center d-none rounded">
												<?php if ($data['account_status'] === 'active'): ?>
													<?= $data['account_password'] ?>
												<?php else: ?>
													***************
												<?php endif ?>
											</code>-->
                                            <code id="passwordShow1" style="width: 150px;display: none" class="text-center px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" >
													<?= $data['account_password'] ?>
												
											</code>

                      </td>
                      <td class="px-4 py-3 text-sm">
                      
                      &nbsp;
                      
                      </td>
                
                    </tr>


                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                         
                   <?= $this->base->text('website_ip', 'table') ?>
                          </div>
                          <div>
                            <p class="font-semibold"><?= $item['account_username'] ?></p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                            </p>
                          </div>
                        </div>
                      </td>
                     
                      <td class="px-4 py-3 text-xs">
                <code style="color: #7e3af2;font-size: larger;"><?php if ($data['account_status'] === 'active'): ?><?= gethostbyname($data['account_main']) ?><?php else: ?>Unavailable<?php endif ?></code>
							

                      </td>
                      <td class="px-4 py-3 text-sm">
                      
                      &nbsp;
                      
                      </td>
                
                    </tr>



          
				
                  </tbody>
                </table>
              </div>
</div>
     












          
    <!-- New Table -->
    <h4 class="mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300"><?= $this->base->text('ftp_details', 'heading') ?></h4>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
             
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Item</th>
                      <th class="px-4 py-3" style="/*visibility: hidden*/">Value </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                         
                   <?= $this->base->text('username', 'table') ?>
                          </div>
                          <div>
                            <p class="font-semibold"><?= $item['account_username'] ?></p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                            </p>
                          </div>
                        </div>
                      </td>
                     
                      <td class="px-4 py-3 text-xs">
                                        <code style="color: #7e3af2;font-size: larger;"><?= $data['account_username'] ?></code>

                      </td>
                      <td class="px-4 py-3 text-sm">
                      
                      &nbsp;
                      
                      </td>
                
                    </tr>


                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                         
                    <?= $this->base->text('password', 'table') ?>
									
                          </div>
                          <div>
                            <p class="font-semibold"><?= $item['account_username'] ?></p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                            </p>
                          </div>
                        </div>
                      </td>
                     
                      <td class="px-4 py-3 text-xs">
              <button @click="openModal" id="passwordHide1"  class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" >Click to Show</button>
								
                                            <code id="passwordShow1" style="width: 150px;display: none" class="text-center px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" >
													<?= $data['account_password'] ?>
												
											</code>

                      </td>
                      <td class="px-4 py-3 text-sm">
                      
                      &nbsp;
                      
                      </td>
                
                    </tr>


                  
                 


                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                         
                 <?= $this->base->text('hostname', 'table') ?>
                          </div>
                          <div>
                            <p class="font-semibold"><?= $item['account_username'] ?></p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                            </p>
                          </div>
                        </div>
                      </td>
                     
                      <td class="px-4 py-3 text-xs">
                     
               <code style="color: #7e3af2;font-size: larger;"><?php if ($data['account_status'] === 'active'): ?>ftpupload.net<?php else: ?>Unavailable<?php endif ?></code>
									

                      </td>
                      <td class="px-4 py-3 text-sm">
                      
                      &nbsp;
                      
                      </td>
                
                    </tr>


                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                         
                   <?= $this->base->text('port', 'table') ?>
                          </div>
                          <div>
                            <p class="font-semibold"><?= $item['account_username'] ?></p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                            </p>
                          </div>
                        </div>
                      </td>
                     
                      <td class="px-4 py-3 text-xs">
                <code style="color: #7e3af2;font-size: larger;"><?php if ($data['account_status'] === 'active'): ?>21<?php else: ?>Unavailable<?php endif ?></code>
							

                      </td>
                      <td class="px-4 py-3 text-sm">
                      
                      &nbsp;
                      
                      </td>
                
                    </tr>



          
				
                  </tbody>
                </table>
              </div>
</div>
     





    <!-- New Table -->
    <h4 class="mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300"><?= $this->base->text('mysql_details', 'heading') ?></h4>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
             
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Item</th>
                      <th class="px-4 py-3" style="/*visibility: hidden*/">Value </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                         
                   <?= $this->base->text('username', 'table') ?>
                          </div>
                          <div>
                            <p class="font-semibold"><?= $item['account_username'] ?></p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                            </p>
                          </div>
                        </div>
                      </td>
                     
                      <td class="px-4 py-3 text-xs">
                                        <code style="color: #7e3af2;font-size: larger;"><?= $data['account_username'] ?></code>

                      </td>
                      <td class="px-4 py-3 text-sm">
                      
                      &nbsp;
                      
                      </td>
                
                    </tr>


                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                         
                    <?= $this->base->text('password', 'table') ?>
									
                          </div>
                          <div>
                            <p class="font-semibold"><?= $item['account_username'] ?></p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                            </p>
                          </div>
                        </div>
                      </td>
                     
                      <td class="px-4 py-3 text-xs">
              <button @click="openModal" id="passwordHide1"  class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" >Click to Show</button>
								
                                            <code id="passwordShow1" style="width: 150px;display: none" class="text-center px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" >
													<?= $data['account_password'] ?>
												
											</code>

                      </td>
                      <td class="px-4 py-3 text-sm">
                      
                      &nbsp;
                      
                      </td>
                
                    </tr>


                  
                 


                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                         
                 <?= $this->base->text('hostname', 'table') ?>
                          </div>
                          <div>
                            <p class="font-semibold"><?= $item['account_username'] ?></p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                            </p>
                          </div>
                        </div>
                      </td>
                     
                      <td class="px-4 py-3 text-xs">
                     
               <code style="color: #7e3af2;font-size: larger;"><?php if ($data['account_status'] === 'active'): ?><?= $data['account_sql'] ?>.spook.rr.nu<?php else: ?>Unavailable<?php endif ?></code>
									

                      </td>
                      <td class="px-4 py-3 text-sm">
                      
                      &nbsp;
                      
                      </td>
                
                    </tr>


                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                         
                   <?= $this->base->text('port', 'table') ?>
                          </div>
                          <div>
                            <p class="font-semibold"><?= $item['account_username'] ?></p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                            </p>
                          </div>
                        </div>
                      </td>
                     
                      <td class="px-4 py-3 text-xs">
                <code style="color: #7e3af2;font-size: larger;"><?php if ($data['account_status'] === 'active'): ?>3306<?php else: ?>Unavailable<?php endif ?></code>
							

                      </td>
                      <td class="px-4 py-3 text-sm">
                      
                      &nbsp;
                      
                      </td>
                
                    </tr>



          
				
                  </tbody>
                </table>
              </div>
</div>
     


    <!-- New Table -->
    <h4 class="mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300"><?= $this->base->text('account_domains', 'heading') ?></h4>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
             
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Domain</th>
                      <th class="px-4 py-3" style="/*visibility: hidden*/">Action </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
           <?php if ($data['account_status'] === 'active'): ?>
				<?php $domains = $this->account->get_domains($data['account_username'], $data['account_password'], $data['account_domain']) ?>
                                   
				<?php if (count($domains) > 0):?>
				
				<?php foreach ($domains as $domain): ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                         
                                        <?= $domain['domain'] ?>
                          </div>
                          <div>
                            <p class="font-semibold"></p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                            </p>
                          </div>
                        </div>
                      </td>
                     
                      <td class="px-4 py-3 text-xs">
<a id="passwordHide1" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" href="<?= $domain['file_manager'] ?>" target="_blank">File Manager</a>
<?php if ($this->sp->is_active()): ?>
														<a style="color:white;" href="<?= base_url().'u/view_account/'.$data['account_username'].'/?builder=true&domain='.$domain['domain'] ?>" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" target="_blank">Site Builder</a>
													<?php endif ?>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      
                      &nbsp;
                      
                      </td>
               
                    </tr>

          <?php endforeach ?>
          <?php elseif($domains === false): ?>
            <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                         
                                     Nothing to show
                          </div>
                         
               
                    </tr>
          <?php endif ?>
          <?php endif ?>
				
                  </tbody>
                </table>
              </div>
</div>
     


            </div>




    <script>
    document.querySelector('#titlebar').innerHTML = `<u><a href="https://portal.spookhost.xyz/u/accounts/" onclick="changelink('https://portal.spookhost.xyz/u/accounts/');return false;"  ><?= $this->base->text('accounts', 'title') ?></a></u> > <?= $this->base->text($title, 'title') ?>`
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
            Your Password is: <code style="color: #7e3af2;font-size: larger;"><?php if ($data['account_status'] === 'active'): ?><?= $data['account_password'] ?><?php else: ?>Unavailable - Account inactive<?php endif ?></code>. Make sure to keep it safe.
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