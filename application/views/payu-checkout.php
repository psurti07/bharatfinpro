<!DOCTYPE html>
<html>
<head>
  <title>PayU - Payment Process</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body onload="document.frm1.submit()">
	<form action="<?php echo $postData['action']; ?>" name="frm1" method="post">
      <p>Please wait.......</p>
      <input type="hidden" name="key" value='<?php echo $postData['mkey']; ?>'/>
      <input type="hidden" name="hash" value='<?php echo $postData['hash']; ?>'/>
      <input type="hidden" name="txnid" value='<?php echo $postData['tid']; ?>'/>
      <input type="hidden" name="amount" value='<?php echo $postData['amount']; ?>'/>
      <input type="hidden" name="firstname" value='<?php echo $postData['name']; ?>'/>
      <input type="hidden" name="email" value='<?php echo $postData['mailid']; ?>'/>
      <input type="hidden" name="phone" value='<?php echo $postData['phoneno']; ?>'/>
      <input type="hidden" name="productinfo" value='<?php echo $postData['productinfo']; ?>'/>
      <input type="hidden" name="address1" value='<?php echo $postData['address']; ?>'/>
      <input type="hidden" name="surl" value='<?php echo $postData['returnUrl']; ?>'/>
      <input type="hidden" name="furl" value='<?php echo $postData['returnUrl']; ?>'/>
      <input type="hidden" name="curl" value='<?php echo $postData['returnUrl']; ?>'/>
      <input type="hidden" name="service_provider" value='64'/>
  </form>
</body>
</html>
