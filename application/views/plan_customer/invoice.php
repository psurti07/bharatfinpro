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
                  <td style="vertical-align:bottom;word-wrap:break-word;float:left;width:50%;text-align:left;">
                    <b>Prayosha Fincart</b>
                    <br>
                    <div>
                      <span style="white-
                      : pre-wrap;" id="tmp_org_address">3rd Floor, Plot 28, Sy. No. 123/1,<br/> Parvati Nagar Co-op. Housing Society 2,<br/> Katargam, Surat, Gujarat, India, 395004<br/><?php echo COMPANY_MOBILE; ?><br/>(E) <?php echo COMPANY_EMAIL;?><br/>CIN No.: <?php echo COMPANY_CIN; ?><br/>GST No.: <?php echo COMPANY_GST; ?></span>
                     </div>
                  </td>
                  <td style="vertical-align:bottom;word-wrap:break-word;float:right;text-align:right;width:50%;">
                      <span style="font-size: 28pt;color: #000000;">INVOICE</span>
                      <br>
                      <div style="clear:both;margin-top:20px;">
                          <span style="font-size:8pt;"><b>Invoice No</b></span>
                          <br>
                          <b><?php echo $invdetails['invoiceinfo']->inv_prefix.$invdetails['invoiceinfo']->inv_number; ?></b>
                          <br><br>
                          <span style="font-size:8pt;p"><b>Invoice Date</b></span>
                          <br>
                          <b><?php echo displayDate($invdetails['orderinfo']->rec_date); ?></b>
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
                          <label style="font-size: 10pt;color: #817d7d;" id="tmp_billing_address_label">Bill To</label>
                          <br><strong><?php echo $invdetails['userinfo']->fullname; ?></strong><br>
                          <span style="white-space: pre-wrap;" id="tmp_billing_address"><?php echo $invdetails['userinfo']->city."<br/>(M) ".$invdetails['userinfo']->mobile."<br/>(E) ".$invdetails['userinfo']->email; ?></span>
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
                        <span style="word-wrap: break-word;" id="tmp_item_name">Membership Card</span>
                        <br>
                        <span style="color: #727272;font-size: 9pt;white-space: pre-wrap;word-wrap: break-word;" id="tmp_item_description">Card Number - <?php echo $invdetails['orderinfo']->card_number; ?></span>
                        <br>
						<span style="color: #525252;white-space: pre-wrap;word-wrap: break-word;" id="tmp_item_description">Subscription Validity - <?php echo displayDate($invdetails['orderinfo']->registration_date)." to ".displayDate($invdetails['orderinfo']->expiry_date); ?></span>
                    </td>
                    <td style="font-size: 9pt;border-bottom: 1px solid #e3e3e3;background-color: #ffffff;color: #000000;padding: 10px 10px 5px 10px;text-align:right;word-wrap: break-word;" valign="top">
                        <span id="tmp_item_qty">1</span>
                        <br>
                    </td>
                    <td style="font-size: 9pt;border-bottom: 1px solid #e3e3e3;background-color: #ffffff;color: #000000;text-align:right;padding: 10px 10px 10px 5px;word-wrap: break-word;" valign="top"><?php echo formatePriceIndia($invdetails['orderinfo']->amount); ?>
                        <br>
                    </td>
                </tr>
            </tbody>
        </table>

        <table style="width:100%;margin-top:3px;table-layout:fixed;border-spacing: 0;border-collapse: collapse;">
            <tbody>
                <tr>
					<td style="font-size: 10pt;text-align:right;padding:5px 10px 5px 5px;word-wrap:break-word;width:70%;" align="right" valign="middle"><b>SUB TOTAL</b>
					</td>
					<td id="tmp_total" style="font-size: 10pt;text-align:right;padding:5px 10px 5px 5px;word-wrap:break-word;width:30%;" align="right" valign="middle"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> <?php echo formatePriceIndia($invdetails['invoiceinfo']->inv_price); ?>
						<br>
					</td>
				</tr>
                <?php
				if($invdetails['invoiceinfo']->inv_cgst > 0) {
					?>
					<tr>
						<td style="font-size: 10pt;text-align:right;padding:5px 10px 5px 5px;word-wrap:break-word;width:70%;" align="right" valign="middle"><b>+ 9% CGST</b>
						</td>
						<td id="tmp_total" style="font-size: 10pt;text-align:right;padding:5px 10px 5px 5px;word-wrap:break-word;width:30%;" align="right" valign="middle"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> <?php echo formatePriceIndia($invdetails['invoiceinfo']->inv_cgst); ?>
							<br>
						</td>
					</tr>
				<?php } ?>
                <?php
				if($invdetails['invoiceinfo']->inv_sgst > 0) {
					?>
					<tr>
						<td style="font-size: 10pt;text-align:right;padding:5px 10px 5px 5px;word-wrap:break-word;width:70%;" align="right" valign="middle"><b>+ 9% SGST</b>
						</td>
						<td id="tmp_total" style="font-size: 10pt;text-align:right;padding:5px 10px 5px 5px;word-wrap:break-word;width:30%;" align="right" valign="middle"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> <?php echo formatePriceIndia($invdetails['invoiceinfo']->inv_sgst); ?>
							<br>
						</td>
					</tr>
				<?php } ?>
                <?php
				if($invdetails['invoiceinfo']->inv_igst > 0) {
					?>
					<tr>
						<td style="font-size: 10pt;text-align:right;padding:5px 10px 5px 5px;word-wrap:break-word;width:70%;" align="right" valign="middle"><b>+ 18% IGST</b>
						</td>
						<td id="tmp_total" style="font-size: 10pt;text-align:right;padding:5px 10px 5px 5px;word-wrap:break-word;width:30%;" align="right" valign="middle"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> <?php echo formatePriceIndia($invdetails['invoiceinfo']->inv_igst); ?>
							<br>
						</td>
					</tr>
				<?php } ?>
                <tr>
					<td style="font-size: 10pt;border-top: 1px solid #e3e3e3;text-align:right;padding:5px 10px 5px 5px;word-wrap:break-word;width:70%;" align="right" valign="middle"><b>GRAND TOTAL</b>
					</td>
					<td id="tmp_total" style="font-size: 10pt;border-top: 1px solid #e3e3e3;text-align:right;padding:5px 10px 5px 5px;word-wrap:break-word;width:30%;font-size:12pt;" align="right" valign="middle"><b><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span> <?php echo formatePriceIndia($invdetails['invoiceinfo']->inv_grandtotal); ?></b>
						<br>
					</td>
				</tr>
            </tbody>
        </table>

        <table style="width:100%;margin-top:30px;table-layout:fixed;border-spacing: 0;border-collapse: collapse;">
            <tbody>
                <tr>
                  <td style="vertical-align:bottom;word-wrap:break-word;float:left;width:50%;text-align:left;">
                      <label style="font-size: 10pt;color: #817d7d;" id="tmp_notes_label">Payment Details</label>
                      <br/>
                      <p style="margin-top:7px;white-space: pre-wrap;word-wrap: break-word;font-size: 8pt;">Payment Method: Online Payment<br>Payment Id: <?php echo $invdetails['orderinfo']->paymentid; ?>
                      </p>

                      <br/>

                      <label style="font-size: 10pt;color: #817d7d;" id="tmp_terms_label">Note</label>
                      <br/>
                      <p style="margin-top:7px;white-space: pre-wrap;word-wrap: break-word;font-size: 8pt;">Payments are not refundable.</p>
                  </td>

                  <td style="vertical-align:bottom;word-wrap:break-word;float:right;width:50%;text-align:right;">
                      <p style="margin-top:7px;white-space: pre-wrap;word-wrap: break-word;font-size: 8pt;"><em>Authorized person</em><br/><span style="margin-top:20px;margin-bottom:7px;"><strong>Prayosha Fincart</strong></span></p>
                  </td>
                </tr>
            </tbody>
        </table>

        <table style="width:100%;margin-top:30px;table-layout:fixed;border-spacing: 0;border-collapse: collapse;">
            <tbody>
                <tr>
                  <td style="vertical-align:bottom;word-wrap:break-word;float:center;text-align:center;">
                      <p style="font-size:8pt;font-family:monospace;">This is Computer generated Invoice. Does not require any signature.</p>
                  </td>
                </tr>
            </tbody>
        </table>

    </div>
</div>

</body>
</html>