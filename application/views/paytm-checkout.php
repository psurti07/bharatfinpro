<!DOCTYPE html>
<html>
<head>
  <title>PayTM - Payment Process</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body onload="document.frm1.submit()">
	<form action="<?php echo $url; ?>" name="frm1" method="post">
      <p>Please wait.......</p>
      <input type="hidden" name="MID" value='<?php echo $postData['MID']; ?>'/>
      <input type="hidden" name="ORDER_ID" value='<?php echo $postData['ORDER_ID']; ?>'/>
      <input type="hidden" name="CUST_ID" value='<?php echo $postData['CUST_ID']; ?>'/>
      <input type="hidden" name="EMAIL" value='<?php echo $postData['EMAIL']; ?>'/>
      <input type="hidden" name="INDUSTRY_TYPE_ID" value='<?php echo $postData['INDUSTRY_TYPE_ID']; ?>'/>
      <input type="hidden" name="CHANNEL_ID" value='<?php echo $postData['CHANNEL_ID']; ?>'/>
      <input type="hidden" name="TXN_AMOUNT" value='<?php echo $postData['TXN_AMOUNT']; ?>'/>
      <input type="hidden" name="WEBSITE" value='<?php echo $postData['WEBSITE']; ?>'/>
      <input type="hidden" name="CALLBACK_URL" value='<?php echo $postData['CALLBACK_URL']; ?>'/>
      <input type="hidden" name="CHECKSUMHASH" value="<?php echo $checksum ?>">
  </form>
</body>
</html>
