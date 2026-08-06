<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cashfree Checkout</title>
        <script src="https://sdk.cashfree.com/js/v3/cashfree.js"></script>
    </head>
    <body>
        <div class="row">
            <p>Processing...</p>
            <input type="hidden" name="paysessionid" id="paysessionid" value='<?php echo $pay_session_id; ?>'/>
            <input type="hidden" name="paymode" id="paymode" value='<?php echo $paymode; ?>'/>
        </div>

        
        <script>
            const cashfree = Cashfree({
                mode: "production", // production or sandbox
            });

            window.onload = function(){
                paymentProcess();
            }

            function paymentProcess(){
               var paysession = document.getElementById('paysessionid').value;

                let checkoutOptions = {
                    paymentSessionId: paysession,
                    redirectTarget: "_self",
                };
                cashfree.checkout(checkoutOptions);
            }
        </script>
    </body>
</html>