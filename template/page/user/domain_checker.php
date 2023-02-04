
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              <?= $this->base->text($title, 'title') ?>
            </h2>
        


	
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" id="account_notice" >
         
					<!--
									<input type="text" name="domain" class="form-control rounded" placeholder="<?= $this->base->text('domain_name', 'label') ?>" id="domain" value="<?php if ($domain !== false): 
											echo($domain);
									 	endif ?>">
								
							
									<a href="#" id="search" class="btn btn-primary rounded" onclick="changelink('https://portal.spookhost.xyz/u/domain_checker/' + document.querySelector('#domain').value);return false;"><?= $this->base->text('search', 'button') ?></a>
			-->				
				<div class="relative text-gray-500 focus-within:text-purple-600">

                  <input type="text" id="domain" name="domain" placeholder="<?= $this->base->text('domain_name', 'label') ?>" class="block w-full pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" value="<?php if ($domain !== false): echo($domain);      endif ?>">

                  <button type="button" href="#" id="search" class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" onclick="changelink('https://portal.spookhost.xyz/u/domain_checker/' + document.querySelector('#domain').value);return false;">
                    <?= $this->base->text('search', 'button') ?>
                  </button>
                </div>

</div>

	<div class="min-w-0 p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 px-4 py-3 mb-8">
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                  <?= $this->base->text('search_result', 'heading') ?> <?php if ($domain !== ""): echo("- " . $domain); endif ?>
                </h4>
                <p class="text-gray-600 dark:text-gray-400">
                  <?php if($domain == false): ?>
						<div class="card-body dark:text-white">
							<?= $this->base->text('search_note', 'paragraph') ?>
						</div>
					<?php elseif ($data !== false): ?>
                    <div class="w-full overflow-hidden rounded-lg shadow-xs"><table class="w-full whitespace-no-wrap">
						<table class="w-full whitespace-no-wrap">
<thead>
<tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
<th class="px-4 py-3">Item</th>
<th class="px-4 py-3" >Value</th>
</tr>
 </thead>
<tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
<tr class="text-gray-700 dark:text-gray-400">
<td class="px-4 py-3">
<div class="flex items-center text-sm">

</div>
<div>
<p class="font-semibold"><?= $this->base->text('account', 'heading') ?></p>

</div>

</td>
<td class="px-4 py-3 text-xs">
<?php if ($data[3] != null): ?>
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
Assigned
                                <?php else: ?><span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:bg-orange-700 dark:text-orange">
Unassigned
                                <?php endif ?> </span>
</td>


</tr>
<tr class="text-gray-700 dark:text-gray-400">
<td class="px-4 py-3">
<div class="flex items-center text-sm">

</div>
<div>
<p class="font-semibold"><?= $this->base->text('status', 'heading') ?></p>


</div>

</td>
<td class="px-4 py-3 text-xs">

 <?php if ($data[0] == 'pending' OR $data[0] == 'DEACTIVATING' OR $data[0] == 'REACTIVATING'): ?>
										
                                        		 <span
                          class="px-2 py-1 font-semibold leading-tight yellow-item text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100"
                        >
                          <?= $data[0] ?>
                        </span>
									<?php elseif ($data[0] == 'ACTIVE'): ?>
										 <span
                          class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                        >
                          <?= $data[0] ?>
                        </span>
									<?php elseif ($data[0] == 'DEACTIVATED' OR $data[0] == 'SUSPENDED'): ?>
											 <span
                          class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100"
                        >
                          <?= $data[0] ?>
                        </span>
								
                                <?php else: ?>
                                <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:bg-orange-700 dark:text-orange">
Unavailable</span>
                                <?php endif ?> 
</td>


</tr>


<tr class="text-gray-700 dark:text-gray-400">
<td class="px-4 py-3">
<div class="flex items-center text-sm">

</div>
<div>
<p class="font-semibold"><?= $this->base->text('nameserver', 'heading') ?></p>

</div>

</td>

<td id="NS1" class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight yellow-item rounded-full ">Loading</span>
								
								</td>
</td>


</tr>



</tbody>
</table></div>
					<?php else: ?>
						<div class="card-body">
							<?= $this->base->text('search_error', 'paragraph') ?>
						</div>
					<?php endif ?>
                </p>
              </div>

            </div>
          </div>
        </main>
      </div>
    </div>
 <script>
 const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
   // document.getElementById("demo").innerHTML = this.responseText;
   //alert(this.responseText);
   let response = this.responseText;
   //let checksuccess = response.includes(".ns.cloudflare.com.");
   if (response.includes(".ns.cloudflare.com.")) {
       let ns1 = document.getElementById('NS1');
       let ns2 = document.getElementById('NS2');
       ns1.innerHTML = "<span class='px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 text-orange-700 bg-orange-100 rounded-full dark:bg-orange-700 dark:text-orange'>Cloudflare</span>";
   } else if ((response.includes("ns1.spookhost.eu.org") && response.includes("ns2.spookhost.eu.org")) || (response.includes("ns1.spookhost.xyz") && response.includes("ns2.spookhost.xyz"))) {
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
  
  </script>
