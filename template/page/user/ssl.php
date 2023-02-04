
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              <?= $this->base->text($title, 'title') ?>
            </h2>
        <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" href="/u/create_ssl" onclick="changelink('https://portal.spookhost.xyz/u/create_ssl');return false;">
                  Create SSL
                </a><br>
       <!--  CTA

            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
             
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3"><?= $this->base->text('domain', 'table') ?></th>
                      <th class="px-4 py-3"><?= $this->base->text('status', 'table') ?></th>
                      <th class="px-4 py-3"><?= $this->base->text('action', 'table') ?></th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                  <?php if (count($list) > 0): ?>
						<?php foreach ($list as $item): ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                         
                           
                          <!--  <div
                              class="absolute inset-0 rounded-full shadow-inner"
                              aria-hidden="true"
                            ></div>-->
                          </div>
                          <div>
                            <p class="font-semibold"><?= $item['domain'] ?></p>
                           
                          </div>
                        </div>
                      </td>
                     
                      <td class="px-4 py-3 text-xs">
                       
                        <?php if ($item['status'] == 'processing'): ?>
										
                                        		 <span
                          class="px-2 py-1 font-semibold leading-tight yellow-item text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100"
                        >
                          <?= $this->base->text($item['status'], 'table') ?>
                        </span>
									<?php elseif ($item['status'] == 'active'): ?>
										 <span
                          class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                        >
                          <?= $this->base->text($item['status'], 'table') ?>
                        </span>
									<?php elseif ($item['status'] == 'cancelled' OR $item['status'] == 'expired'): ?>
											 <span
                          class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100"
                        >
                          <?= $this->base->text($item['status'], 'table') ?>
                        </span>
									<?php endif ?>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        <a href="<?= base_url().'u/view_ssl/'.$item['key'] ?>" onclick="changelink('<?= base_url().'u/view_ssl/'.$item['key'] ?>');return false;" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"><i class="fa <?= $btn[0] ?> me-1"></i> <?= $this->base->text('manage', 'button') ?></a></td>
                      </td>
                    </tr>
               <?php $count += 1; ?>
						<?php endforeach; ?>
					<?php else: ?><tr>
							<td colspan="5" class="text-center"><?= $this->base->text('nothing_to_show', 'paragraph') ?></td>
						</tr><?php endif ?>
				
                  </tbody>
                </table>
              </div>
              <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
              >
                <span class="flex items-center col-span-3">
                  	<?= count($list) ?> <?= $this->base->text('ssl_certificates', 'heading') ?>
                </span>
                <span class="col-span-2"></span>
                </div>
            </div>

            </div>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
