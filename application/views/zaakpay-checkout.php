<!DOCTYPE html>
<html>
<head>
  <title>Zaakpay - Payment Process</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body onload="document.frm1.submit()">

	<form action="<?php echo $url; ?>" name="frm1" method="post">
      <p>Please wait.......</p>
      <input type="hidden" name="merchantIdentifier" value='<?php echo $postData['merchantIdentifier']; ?>'/>
      <input type="hidden" name="orderId" value='<?php echo $postData['orderId']; ?>'/>
      <input type="hidden" name="returnUrl" value='<?php echo $postData['returnUrl']; ?>'/>
      <input type="hidden" name="currency" value='<?php echo $postData['currency']; ?>'/>
      <input type="hidden" name="amount" value='<?php echo $postData['amount']; ?>'/>
      <input type="hidden" name="buyerEmail" value='<?php echo $postData['buyerEmail']; ?>'/>
      <input type="hidden" name="buyerPhoneNumber" value='<?php echo $postData['buyerPhoneNumber']; ?>'/>
      <input type="hidden" name="buyerFirstName" value='<?php echo $postData['buyerFirstName']; ?>'/>
      <input type="hidden" name="buyerLastName" value=''/>
      <input type="hidden" name="buyerAddress" value=''/>
      <input type="hidden" name="buyerCity" value=''/>
      <input type="hidden" name="buyerState" value=''/>
      <input type="hidden" name="buyerCountry" value='<?php echo $postData['buyerCountry']; ?>'/>
      <input type="hidden" name="buyerPincode" value=''/>
      <input type="hidden" name="productDescription" value='<?php echo $postData['productDescription']; ?>'/>
      <input type="hidden" name="checksum" value='<?php echo $checksum; ?>'/>
  </form>

</body>
</html>
