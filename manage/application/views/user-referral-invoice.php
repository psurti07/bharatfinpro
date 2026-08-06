<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
    <meta name="robots" content="noindex,nofollow" />
    <title><?php echo PROJECT_NAME; ?></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet" />

<style type="text/css">
#lineItem tr {
    page-break-inside: avoid;
    page-break-after:auto;
}
</style>
</head>
<body>
<div style="font-family: Sans-serif;font-size: 10pt;color: #333333;">
    <div style="padding: 0 0.40in 0 0.55in;">
        
        <table style="width:100%;margin-top:30px;table-layout:fixed;border-spacing: 0;border-collapse: collapse;">
            <tbody>
                <tr>
                  <td style="word-wrap:break-word;float:left;width:50%;text-align:left;">
                    <b>Prayosha Fincart</b>
                    <br>
                    <div>
                      <span style="white-
                      : pre-wrap;" id="tmp_org_address">3rd Floor, Plot 28, Sy. No. 123/1,<br/> Parvati Nagar Co-op. Housing Society 2,<br/> Katargam, Surat, Gujarat, India, 395004<br/><?php echo COMPANY_MOBILE; ?><br/>(E) <?php echo COMPANY_EMAIL;?><br/>CIN No.: <?php echo COMPANY_CIN; ?><br/>GST No.: <?php echo COMPANY_GST; ?></span>
                        
                     </div>
                  </td>
                  <td style="word-wrap:break-word;float:right;text-align:right;width:50%;">
                      <span style="font-size: 20pt;color: #000000;">REFERRAL<br/>INVOICE</span>
                      <br>
                      <div style="clear:both;margin-top:15px;">
                          <span style="font-size:8pt;"><b>Invoice No</b></span>
                          <br>
                          <b><?php echo $invdetails['payoutinfo']->id; ?></b>
                          <br><br>
                          <span style="font-size:8pt;p"><b>Invoice Date</b></span>
                          <br>
                          <b><?php echo displayDate($invdetails['payoutinfo']->payout_date); ?></b>
                          <br>
                      </div>
                  </td>
                </tr>
            </tbody>
        </table>

        <table style="width:100%;margin-top:30px;table-layout:fixed;border-spacing: 0;border-collapse: collapse;">
            <tbody>
                <tr>
                  <td style="vertical-align:bottom;word-wrap: break-word;">
                      <div>
                          <label style="font-size: 10pt;line-height: 20pt;color: #817d7d;" id="tmp_billing_address_label">Bill To</label>
                          <br><strong style="line-height: 15pt;"><?php echo $invdetails['refuserinfo']->fullname; ?></strong><br>
                          <span style="line-height: 15pt;white-space: pre-wrap;" id="tmp_billing_address"><?php echo $invdetails['refuserinfo']->city."<br/>(M) ".$invdetails['refuserinfo']->mobile."<br/>(E) ".$invdetails['refuserinfo']->email."<br/>Code : ".$invdetails['refuserinfo']->refcode; ?></span>
                      </div>
                  </td>
                </tr>
            </tbody>
        </table>

        <div style="margin-top:20px;width:100%;">
            <span></span>
        </div>

        <table style="width:100%;margin-top:20px;table-layout:fixed;border-spacing: 0;border-collapse: collapse;" class="pcs-itemtable" border="0" cellpadding="0" cellspacing="0">
            <thead>
                <tr style="height:32px;">
                    <td style="font-size: 10pt;color: #ffffff;background-color: #3c3d3a;padding:5px 10px 5px 10px;word-wrap: break-word;width: 60%;">
                        Item
                    </td>
                    <td style="font-size: 10pt;color: #ffffff;background-color: #3c3d3a;padding:5px 10px 5px 5px;word-wrap: break-word;width: 15%;" align="right">
                        Qty
                    </td>
                    <td style="font-size: 10pt;color: #ffffff;background-color: #3c3d3a;padding:5px 10px 5px 5px;word-wrap: break-word;width:25%;" align="right">
                        Amount (<span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>)
                    </td>
                </tr>
            </thead>
            <tbody id="lineitem">
                <tr>
                    <td style="font-size: 9pt;border-bottom: 1px solid #e3e3e3;background-color: #ffffff;color: #000000;padding: 10px 0px 10px 10px;" valign="top">
                        <span style="word-wrap: break-word;" id="tmp_item_name">Customer Membership Card</span>
                        <br>
                        <span style="color: #727272;font-size: 9pt;line-height: 15pt;white-space: pre-wrap;word-wrap: break-word;" id="tmp_item_description">Customer Name - <?php echo $invdetails['customerinfo']->fullname; ?></span>
                        <br>
                        <span style="color: #727272;font-size: 9pt;line-height: 15pt;white-space: pre-wrap;word-wrap: break-word;" id="tmp_item_description">Customer Mo. - <?php echo $invdetails['customerinfo']->mobile; ?></span>
                    </td>
                    <td style="font-size: 9pt;border-bottom: 1px solid #e3e3e3;background-color: #ffffff;color: #000000;padding: 10px 10px 5px 10px;text-align:right;word-wrap: break-word;" valign="top">
                        <span id="tmp_item_qty">1</span>
                        <br>
                    </td>
                    <td style="font-size: 9pt;border-bottom: 1px solid #e3e3e3;background-color: #ffffff;color: #000000;text-align:right;padding: 10px 10px 10px 5px;word-wrap: break-word;" valign="top"><?php echo formatePriceIndia($invdetails['cardinfo']->amount * 0.35); ?>
                        <br>
                    </td>
                </tr>
            </tbody>
        </table>

        <table style="width:100%;margin-top:3px;table-layout:fixed;border-spacing: 0;border-collapse: collapse;">
            <tbody>
                <tr>
                  <td style="float:right;text-align:right;padding:5px 10px 5px 5px;word-wrap:break-word;width:70%;" align="right" valign="middle"><b>Total</b>
                  </td>
                  <td id="tmp_total" style="float:right;text-align:right;padding:5px 10px 5px 5px;word-wrap:break-word;width:30%;" align="right" valign="middle"><b><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> <?php echo formatePriceIndia($invdetails['cardinfo']->amount * 0.35); ?></b>
                      <br>
                  </td>
                </tr>
            </tbody>
        </table>

        <table style="width:100%;margin-top:100px;table-layout:fixed;border-spacing: 0;border-collapse: collapse;">
            <tbody>
                <tr>
                  <td style="vertical-align:top;word-wrap:break-word;float:left;width:50%;text-align:left;">
                      <label style="font-size: 10pt;color: #817d7d;" id="tmp_terms_label">Note</label>
                      <br/>
                      <p style="margin-top:7px;white-space: pre-wrap;word-wrap: break-word;font-size: 8pt;">Payments are not refundable.</p>
                  </td>

                  <td style="vertical-align:top;word-wrap:break-word;float:right;width:50%;text-align:right;">
                      <br/><br/><br/><br/>
                      <p style="margin-top:7px;white-space: pre-wrap;word-wrap: break-word;font-size: 8pt;"><em>Authorized person</em><br/><span style="margin-top:20px;margin-bottom:7px;"><strong>Prayosha Fincart</strong></span></p>
                  </td>
                </tr>
            </tbody>
        </table>

        <table style="width:100%;margin-top:10px;table-layout:fixed;border-spacing: 0;border-collapse: collapse;">
            <tbody>
                <tr>
                  <td style="vertical-align:top;word-wrap:break-word;float:center;text-align:center;">
                      <p style="font-size:8pt;font-family:monospace;">This is Computer generated Invoice. Does not require any signature.</p>
                  </td>
                </tr>
            </tbody>
        </table>

    </div>
</div>

</body>
</html>