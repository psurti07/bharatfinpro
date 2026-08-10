<?php
date_default_timezone_set('Asia/Kolkata');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
$this->load->helper('airpay');

$buyerEmail = trim($postData['buyerEmail']);
$buyerPhone = trim($postData['buyerPhone']);
$buyerFirstName = trim($postData['buyerFirstName']);
$buyerLastName = trim($postData['buyerLastName']);
$buyerAddress = trim($postData['buyerAddress']);
$amount = trim($postData['amount']);
$buyerCity = trim($postData['buyerCity']);
$buyerState = trim($postData['buyerState']);
$buyerPinCode = trim($postData['buyerPinCode']);
$buyerCountry = trim($postData['buyerCountry']);
$orderid = trim($postData['orderid']); //Your System Generated Order ID
// $hiddenmod = trim($_POST['directindexvar']);
$currency = trim($postData['currency']);
$isocurrency = trim($postData['isocurrency']);
$mercid = trim($postData['mercid']);

$username = trim($postData['username']);
$password = trim($postData['password']);
$secret = trim($postData['secret']);

//$this->load->view('airpay_validate', $postData);
$_POST = $postData;

$alldata = $buyerEmail . $buyerFirstName . $buyerLastName . $buyerAddress . $buyerCity . $buyerState . $buyerCountry . $amount . $orderid;
$privatekey = Checksum::encrypt($username . ":|:" . $password, $secret);
$keySha256 = Checksum::encryptSha256($username . "~:~" . $password);
$checksum = Checksum::calculateChecksumSha256($alldata . date('Y-m-d'), $keySha256);

$hiddenmod = "";
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3./org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Airpay</title>
    <script type="text/javascript">
    function submitForm() {
        var form = document.forms[0];
        form.submit();
    }
    </script>
</head>

<body onload="javascript:submitForm()">
    <center>
        <table width="500px;">
            <tr>
                <td align="center" valign="middle">Do Not Refresh or Press Back <br /> Redirecting to Airpay</td>
            </tr>
            <tr>
                <td align="center" valign="middle">
                    <form action="<?php echo $url; ?>" method="post">
                        <input type="hidden" name="privatekey" value="<?php echo $privatekey; ?>">
                        <input type="hidden" name="mercid" value="<?php echo $mercid; ?>">
                        <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
                        <input type="hidden" name="currency" value="<?php echo $currency; ?>">
                        <input type="hidden" name="isocurrency" value="<?php echo $isocurrency; ?>">
                        <!-- <input type="hidden" name="arpyVer" value="3"> -->
                        <input type="hidden" name="chmod" value="<?php echo $hiddenmod; ?>">
                        <?php
            Checksum::outputForm($checksum);
            ?>

                    </form>
                </td>

            </tr>

        </table>

    </center>
</body>

</html>