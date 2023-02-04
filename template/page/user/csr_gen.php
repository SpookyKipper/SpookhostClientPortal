
<?php $plaintext = "message to be encrypted";
        $cipher = "aes-256-gcm";
        if (in_array($cipher, openssl_get_cipher_methods()))
        {
        $ivlen = "$1fdhlm*qX@S&wpD^!j0vJO2%8I2$eQJ2W52r@KWsg*m#0^SU4P^qOWPhOkzFxSs4T*suIxP!Mm*2cL0JI5q!exzo&tEj2hK90Ge5nyQQQi&RJzD2P4c72jGV$xJ!rNu";
        $iv = "lXI0iB!JVkf81HJYRwj@8S2dumqHsc8m!LrabDnB^0l%rl6jAO8A$KIc^%zE&^l8#3L3NuZjsxt3*3b44qE7bCKWpoCb&3P02q!$0TfrlQV^7eQt4&F8YEzXLS&1A%gh";
        $privatekey_encrpyted = openssl_encrypt($plaintext, $cipher, $key, $options=0, $iv);
        //store $cipher, $iv, and $tag for decryption later
       // $original_plaintext = openssl_decrypt($ciphertext, $cipher, $key, $options=0, $iv, $tag);
        }
        echo $privatekey_encrpyted;
        $original_plaintext = openssl_decrypt($privatekey_encrpyted, $cipher, $key, $options=0, $iv, $tag);
        echo $original_plaintext;
        echo "<br>" . $tag;
        echo base64_decode("OIAggQCGUbPgmPN6lFjQ8g==");

?>
<label for="dname">Domain:</label>
  <input type="textbox" id="dname" name="dname" placeholder="example.com"><br><br>
<input type="button" class="btn" onclick="getcsr(document.getElementById('dname').value);" value="Get CSR and Private Key" style="margin-left: 1.5%"></input>
<p id="csr"></p>
<p id="privatekey"></p>

<script>
function getcsr(domain) {
  const xhttp = new XMLHttpRequest();
 
  console.log("clieked.");
  xhttp.onload = function() {
   // document.getElementById("demo").innerHTML = this.responseText;
   //alert(this.responseText);
   let response = this.responseText;
  // let checksuccess = response.includes("<?php echo $Record['2'];?>");

//	const doc = parser.parseFromString(response, "text/html");
	//var key = doc.getElementById("key");
		const parser = new DOMParser();
	  	var responsetext = parser.parseFromString(response, "text/html");
	  	document.getElementById("privatekey").innerHTML = "Private key:<br><textarea style='min-height: 150px; min-width: 350px' readonly='true'>" + responsetext.querySelector("#key").innerHTML + "</textarea>";
	  	document.getElementById("csr").innerHTML = "CSR:<br><textarea style='min-height: 150px; min-width: 350px' readonly='true'>" + responsetext.querySelector("#csr").innerHTML + "</textarea>";
	  	//console.log(response);
	  	//console.log(responsetext);
	  	//console.log("e" +  responsetext.querySelector("#csr"));

  }
  var apidomain = "https://api.spookhost.eu.org/csrgen.php?domain=" + domain;
  //var apifulldomain = apidomain.join();
  xhttp.open("GET", apidomain);
  console.log(apidomain);
  // console.log(apifulldomain);
//   xhttp.setRequestHeader('text', domain);
  xhttp.send();
}


</script>