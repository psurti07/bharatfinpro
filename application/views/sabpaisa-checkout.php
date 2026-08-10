<!DOCTYPE html>
<html>

<head>
    <title>SabPaisa - Payment Process</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body onload="document.frm1.submit()">
    <form action="<?php echo $postData['action']; ?>" name="frm1" method="post">
        <p>Please wait.......</p>
        <input type="hidden" name="encData" value='<?php echo $postData['encryptData']; ?>' />
        <input type="hidden" name="clientCode" value='<?php echo $postData['clientCode']; ?>' />
    </form>
</body>

</html>