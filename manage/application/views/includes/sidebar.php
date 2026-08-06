<div class="main-menu menu-fixed menu-light menu-accordion" data-scroll-to-active="true">
	<div class="main-menu-content">
		<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
			<?php
			$role = $this->session->userdata['admintype'];
			if ($role == 0 || $role == 1) {
			?>

				<li id="101" class="nav-item">
					<a href="<?php echo site_url('dashboard'); ?>"><i class="la la-dashboard"></i><span
							class="menu-title">Dashboard</span></a>
				</li>
				
				<li id="141" class="nav-item">
					<a href="<?php echo site_url('dashboard/processstepdata'); ?>"><i class="la la-list-ol"></i><span
							class="menu-title">Process
							Steps</span></a>
				</li>
				<li id="142" class="nav-item">
					<a href="<?php echo site_url('dashboard/remarketingstatistics'); ?>"><i class="la la-list-ol"></i><span class="menu-title">Remarketing Users</span></a>
				</li>
				<li id="143"><a class="menu-item"
						href="<?php echo site_url('dashboard/applicationstatistics'); ?>"><i class="la la-list-ol"></i>Application</a></li>
				<li id="144" class="nav-item">
						<a href="<?php echo site_url('dashboard/webinarcustomerstatistics'); ?>"><i class="la la-list-ol"></i>Webinar Statistics</span></a>
					</li>
				<li id="999" class="nav-item">
					<a href="<?php echo site_url('site/search'); ?>"><i class="la la-search"></i><span
							class="menu-title">Search Data</span></a>
				</li>
				

				<li class=" navigation-header"><span>ALL LEADS</span></li>

				<li id="108" class=" nav-item"><a href="#"><i class="la la-server"></i><span class="menu-title">Digital Loan
							Enquiry</span></a>
					<ul class="menu-content">
						<li id="1081pl"><a class="menu-item"
								href="<?php echo site_url('users/digitalleads/pl'); ?>">Personal Loan</a></li>
						<li id="1081bl"><a class="menu-item"
								href="<?php echo site_url('users/digitalleads/bl'); ?>">Business Loan</a></li>
					</ul>
				</li>

				<li id="114" class=" nav-item"><a href="#"><i class="la la-star"></i><span class="menu-title">Premium
							Leads</span></a>
					<ul class="menu-content">
						<li id="1141pl"><a class="menu-item"
								href="<?php echo site_url('users/premiumleads/pl'); ?>">Personal Loan</a></li>
						<li id="1141bl"><a class="menu-item"
								href="<?php echo site_url('users/premiumleads/bl'); ?>">Business Loan</a></li>
					</ul>
				</li>

				<li id="115" class=" nav-item"><a href="#"><i class="la la-server"></i><span class="menu-title">Plan
							Leads</span></a>
					<ul class="menu-content">
						<li id="1151pl"><a class="menu-item"
								href="<?php echo site_url('plan/planleads/pl'); ?>">Personal Loan</a></li>
						<li id="1151bl"><a class="menu-item"
								href="<?php echo site_url('plan/planleads/bl'); ?>">Business Loan</a></li>
					</ul>
				</li>

				<li class=" navigation-header"><span>ACCOUNTS</span></li>

				<li id="107" class=" nav-item"><a href="#"><i class="la la-users"></i><span
							class="menu-title">Customers</span></a>
					<ul class="menu-content">
						<li id="1070"><a class="menu-item" href="<?php echo site_url('users'); ?>">Customer List</a></li>
						<li id="1071"><a class="menu-item" href="<?php echo site_url('users/addForm'); ?>">Create an
								Account</a></li>
					</ul>
				</li>

				<li id="111" class=" nav-item"><a href="#"><i class="la la-users"></i><span
							class="menu-title">Plan Customers</span></a>
					<ul class="menu-content">
						<li id="1111"><a class="menu-item" href="<?php echo site_url('plan'); ?>">Customer List</a></li>
						<li id="1112"><a class="menu-item" href="<?php echo site_url('plan/addForm'); ?>">Create an
								Account</a></li>
					</ul>
				</li>

				<!-- ================== NEW WEBINAR HEADER ================== -->
				<li class=" navigation-header"><span>WEBINAR DETAIL</span></li>
				<li id="1600" class="nav-item">
					<a href="<?php echo site_url('webinar'); ?>"><i class="la la-list-ol"></i><span class="menu-title">Webinar Customer</span></a>
				</li>
				<li id="1601" class="nav-item">
					<a href="<?php echo site_url('webinar/webinarleads'); ?>"><i class="la la-list-ol"></i><span class="menu-title">Webinar Lead</span></a>
				</li>
				<li id="1602" class="nav-item">
					<a href="<?php echo site_url('webinar/webinar_event_detail'); ?>"><i class="la la-list-ol"></i><span class="menu-title">Webinar Event</span></a>
				</li>
				<li id="1603" class="nav-item">
					<a href="<?php echo site_url('webinar/webinar_onboard_detail'); ?>"><i class="la la-list-ol"></i><span class="menu-title">Onboard List</span></a>
				</li>
				<li id="1604" class="nav-item">
					<a href="<?php echo site_url('webinar/schedule_slot_detail'); ?>"><i class="la la-list-ol"></i><span class="menu-title">Schedule Slot</span></a>
				</li>
				<li id="1605" class="nav-item">
					<a href="<?php echo site_url('webinar/webinar_attend_detail'); ?>"><i class="la la-list-ol"></i><span class="menu-title">Attend Webinar</span></a>
				</li>

				<!-- ================== NEW WEBINAR HEADER ================== -->
				<li class=" navigation-header"><span>OFFER PAGE DETAIL</span></li>

				<li id="119" class=" nav-item"><a href="#"><i class="la la-credit-card"></i><span class="menu-title">Fail Payment Pages</span></a>
					<ul class="menu-content">
						<li id="1191"><a class="menu-item" href="<?php echo site_url('enquiry/cardoffer'); ?>">Card Offer</a></li>
					</ul>
				</li>

				<li id="129" class=" nav-item"><a href="#"><i class="la la-credit-card"></i><span class="menu-title">IVR Payment Pages</span></a>
					<ul class="menu-content">
						<li id="1291"><a class="menu-item" href="<?php echo site_url('enquiry/specialoffer'); ?>">Special Offer</a></li>
					</ul>
				</li>

				<li id="132" class=" nav-item"><a href="#"><i class="la la-credit-card"></i><span class="menu-title">Extra Payment Pages</span></a>
					<ul class="menu-content">
						<li id="1321"><a class="menu-item" href="<?php echo site_url('enquiry/bumperoffer'); ?>">Bumper Offer</a></li>
						<li id="1322"><a class="menu-item" href="<?php echo site_url('enquiry/staroffer'); ?>">Star Offer</a></li>
						<li id="1323"><a class="menu-item" href="<?php echo site_url('enquiry/primeoffer'); ?>">Prime Offer</a></li>
						<li id="1324"><a class="menu-item" href="<?php echo site_url('enquiry/megaoffer'); ?>">Mega Offer</a></li>
						<li id="1325"><a class="menu-item" href="<?php echo site_url('enquiry/superoffer'); ?>">Super Offer</a></li>
						<li id="1326"><a class="menu-item" href="<?php echo site_url('enquiry/quickoffer'); ?>">Quick Offer</a></li>
					</ul>
				</li>

				<?php
				// $ac_flag = 0; // Change 1 to hide messages and change 0 to show messages

				// if ($ac_flag != 1) {
				?>
					<li class=" navigation-header"><span>REQUEST</span></li>

					<li id="110" class=" nav-item"><a href="#"><i class="la la-list"></i><span class="menu-title">Loan
								Application</span></a>
						<ul class="menu-content">
							<li id="1101"><a class="menu-item" href="<?php echo site_url('loan/application'); ?>">New
									Application</a></li>
							<li id="1102"><a class="menu-item" href="<?php echo site_url('loan/approvehistory'); ?>">Approve
									Application</a></li>
							<li id="1103"><a class="menu-item" href="<?php echo site_url('loan/rejecthistory'); ?>">Rejected
									Application</a></li>
							<li id="1104"><a class="menu-item" href="<?php echo site_url('loan/reapplyhistory'); ?>">Reapply
									Application</a></li>
							<li id="1105"><a class="menu-item" href="<?php echo site_url('loan/queryprocesshistory'); ?>">Query
									Process Application</a></li>
							
						</ul>
					</li>

					<li id="113" class=" nav-item"><a href="#"><i class="la la-list"></i><span class="menu-title">Plan Loan
								Application</span></a>
						<ul class="menu-content">
							<li id="1131"><a class="menu-item" href="<?php echo site_url('planloan/application'); ?>">New
									Application</a></li>
							<li id="1132"><a class="menu-item" href="<?php echo site_url('planloan/approvehistory'); ?>">Approve
									Application</a></li>
							<li id="1133"><a class="menu-item" href="<?php echo site_url('planloan/rejecthistory'); ?>">Rejected
									Application</a></li>
							<li id="1134"><a class="menu-item" href="<?php echo site_url('planloan/reapplyhistory'); ?>">Reapply
									Application</a></li>
							<li id="1135"><a class="menu-item" href="<?php echo site_url('planloan/queryprocesshistory'); ?>">Query
									Process Application</a></li>
							
						</ul>
					</li>

					<li class=" navigation-header"><span>ORDERS</span></li>

					<li id="109" class=" nav-item"><a href="#"><i class="la la-credit-card"></i><span
								class="menu-title">Membership Cards</span></a>
						<ul class="menu-content">
							<li id="10911"><a class="menu-item" href="<?php echo site_url('users/membershiplist/11'); ?>">Gold
									Membership Card</a></li>
							<li id="10912"><a class="menu-item"
									href="<?php echo site_url('users/membershiplist/12'); ?>">Diamond Membership Card</a></li>
						</ul>
					</li>

					<li id="118" class=" nav-item"><a href="#"><i class="la la-credit-card"></i><span
								class="menu-title">Plan Cards</span></a>
						<ul class="menu-content">
							<li id="11821"><a class="menu-item" href="<?php echo site_url('plan/planlist/21'); ?>">Plan Personal</a></li>
							<li id="11822"><a class="menu-item" href="<?php echo site_url('plan/planlist/22'); ?>">Plan Business</a></li>
						</ul>
					</li>
				<?php
				}
				if ($role == 0 || $role == 1 || $role == 2) {
				?>
					<li id="125" class="nav-item">
						<a href="<?php echo site_url('account/invoice'); ?>"><i class="la la-list-ol"></i><span
								class="menu-title">Invoice</span></a>
					</li>
				<?php
				}
				if ($role == 0 || $role == 1) {
				?>
					<li id="1121" class="nav-item">
						<a href="<?php echo site_url('users/referral'); ?>"><i class="la la-sitemap"></i><span
								class="menu-title">Referral Payout</span></a>
					</li>

					<li class=" navigation-header"><span>REPORTS</span></li>

					<li id="124" class=" nav-item"><a href="#"><i class="la la-bar-chart"></i><span class="menu-title">Digital
								Leads</span></a>
						<ul class="menu-content">
							<li id="12499"><a class="menu-item" href="<?php echo site_url('report/digitalleads'); ?>">All
									Leads</a></li>
							<li id="12411"><a class="menu-item"
									href="<?php echo site_url('report/digitalleads/pl'); ?>">Personal Loan</a></li>
							<li id="12412"><a class="menu-item"
									href="<?php echo site_url('report/digitalleads/bl'); ?>">Business Loan</a></li>
						</ul>
					</li>

					<li id="126" class=" nav-item"><a href="#"><i class="la la-bar-chart"></i><span class="menu-title">Plan
								Leads</span></a>
						<ul class="menu-content">
							<li id="12699"><a class="menu-item" href="<?php echo site_url('report/planleads'); ?>">All
									Leads</a></li>
							<li id="12621"><a class="menu-item"
									href="<?php echo site_url('report/planleads/pl'); ?>">Personal Loan</a></li>
							<li id="12622"><a class="menu-item"
									href="<?php echo site_url('report/planleads/bl'); ?>">Business Loan</a></li>
						</ul>
					</li>

					<li id="122" class="nav-item">
						<a href="<?php echo site_url('report/customers'); ?>"><i class="la la-bar-chart"></i><span
								class="menu-title">Customers Reg.</span></a>
					</li>
					<li id="127" class="nav-item">
						<a href="<?php echo site_url('report/plan_customers'); ?>"><i class="la la-bar-chart"></i><span
								class="menu-title">Plan Customers Reg.</span></a>
					</li>

					<li id="136" class=" nav-item"><a href="#"><i class="la la-bar-chart"></i><span class="menu-title">App Status Reports</span></a>
						<ul class="menu-content">
							<li id="1361"><a class="menu-item"
									href="<?php echo site_url('report/applications'); ?>">Digital Reports</a></li>
							<li id="1362"><a class="menu-item"
									href="<?php echo site_url('report/planapplications'); ?>">Plan Reports</a></li>
						</ul>
					</li>

				<?php
				}
				if ($role == 0 || $role == 1 || $role == 2) {
				?>
					<li id="128" class="nav-item">
						<a href="<?php echo site_url('report/gstdata'); ?>"><i class="la la-bar-chart"></i><span
								class="menu-title">GST Data</span></a>
					</li>

				<?php
				}
				if ($role == 0 || $role == 1) {
				?>
					<li class=" navigation-header"><span>Payment Gateways</span></li>

					<li id="151" class="nav-item">
						<a href="<?php echo site_url('report/cashfreelog'); ?>"><i class="la la-rupee"></i><span
								class="menu-title">Cashfree
								Log</span></a>
					</li>
					<!--<li id="152" class="nav-item">
				<a href="<?php echo site_url('report/paytmlog'); ?>"><i class="la la-rupee"></i><span
						class="menu-title">Paytm Log</span></a>
			</li> -->

					<li id="153" class="nav-item">
						<a href="<?php echo site_url('report/phonepelog'); ?>"><i class="la la-rupee"></i><span
								class="menu-title">Phonepe
								Log</span></a>
					</li>

					<li id="154" class="nav-item">
						<a href="<?php echo site_url('report/subpaisalog'); ?>"><i class="la la-rupee"></i><span
								class="menu-title">Subpaisa
								Log</span></a>
					</li>

					<li id="156" class="nav-item">
						<a href="<?php echo site_url('report/upilog'); ?>"><i class="la la-rupee"></i><span
								class="menu-title">UPI
								Log</span></a>
					</li>

					<li id="206" class="nav-item">
						<a href="<?php echo site_url('report/worldlinelog'); ?>"><i class="la la-rupee"></i><span
								class="menu-title">Worldline Log</span></a>
					</li>

					<li id="155" class="nav-item">
						<a href="<?php echo site_url('report/zaakpaylog'); ?>"><i class="la la-rupee"></i><span
								class="menu-title">Zaakpay
								Log</span></a>
					</li>

					<li id="157" class="nav-item">
						<a href="<?php echo site_url('report/razorpaylog'); ?>"><i class="la la-rupee"></i><span
								class="menu-title">Razorpay
								Log</span></a>
					</li>

					<li id="158" class="nav-item">
						<a href="<?php echo site_url('report/payulog'); ?>"><i class="la la-rupee"></i><span
								class="menu-title">Payu Log
							</span></a>
					</li>

					<li id="159" class="nav-item">
						<a href="<?php echo site_url('report/lyralog'); ?>"><i class="la la-rupee"></i><span
								class="menu-title">Lyra Log
							</span></a>
					</li>

					<li id="160" class="nav-item">
						<a href="<?php echo site_url('report/paygiclog'); ?>"><i class="la la-rupee"></i><span
								class="menu-title">Paygic Log</span></a>
					</li>

					<li class=" navigation-header"><span>SMS</span></li>

					<li id="127" class="nav-item">
						<a href="<?php echo site_url('sms/bulksms'); ?>"><i class="la la-paper-plane"></i><span
								class="menu-title">Bulk SMS
								List</span></a>
					</li>

					<li id="121" class="nav-item">
						<a href="<?php echo site_url('sms/sentotps'); ?>"><i class="la la-asterisk"></i><span
								class="menu-title">Sent
								OTPs</span></a>
					</li>

					<li id="123" class="nav-item">
						<a href="<?php echo site_url('sms/remarketinglog'); ?>"><i class="la la-bar-chart"></i><span
								class="menu-title">Remarketing
								Log</span></a>
					</li>

					<li id="150" class="nav-item">
						<a href="<?php echo site_url('sms/customsms'); ?>"><i class="la la-paper-plane"></i><span
								class="menu-title">Custom SMS</span></a>
					</li>

					<li id="131" class="nav-item">
						<a href="<?php echo site_url('sms/smsmessages'); ?>"><i class="la la-comment"></i><span
								class="menu-title">SMS
								Messages</span></a>
					</li>

					<li id="148" class="nav-item">
						<a href="<?php echo site_url('sms/dndlist'); ?>"><i class="la la-ban"></i><span class="menu-title">DND
								List</span></a>
					</li>
					<li id="149" class="nav-item">
						<a href="<?php echo site_url('sms/plandndlist'); ?>"><i class="la la-ban"></i><span class="menu-title">Plan DND
								List</span></a>
					</li>


					<li class=" navigation-header"><span>DATA LIST</span></li>

					<li id="102" class=" nav-item"><a href="#"><i class="la la-university"></i><span
								class="menu-title">Banks</span></a>
						<ul class="menu-content">
							<li id="1021"><a class="menu-item" href="<?php echo site_url('banks'); ?>">Banks</a></li>
							<li id="1022"><a class="menu-item" href="<?php echo site_url('banks/roipackages'); ?>">ROI Packages</a></li>
							<li id="1023"><a class="menu-item" href="<?php echo site_url('banks/applylinks'); ?>">Apply
									Links</a></li>
						</ul>
					</li>

					<li id="105" class=" nav-item"><a href="#"><i class="la la-graduation-cap"></i><span
								class="menu-title">Career</span></a>
						<ul class="menu-content">
							<li id="1051"><a class="menu-item" href="<?php echo site_url('career'); ?>">Career Opening</a></li>
							<li id="1052"><a class="menu-item" href="<?php echo site_url('enquiry/career'); ?>">Career
									Enquiry</a></li>
						</ul>
					</li>

					<li id="135" class="nav-item">
						<a href="<?php echo site_url('support/ticket'); ?>"><i class="la la-life-ring"></i><span
								class="menu-title">Support Request</span></a>
					</li>

					<li id="104" class="nav-item">
						<a href="<?php echo site_url('enquiry/contact'); ?>"><i class="la la-envelope"></i><span
								class="menu-title">Contact Enquiry</span></a>
					</li>

					<li id="116" class="nav-item">
						<a href="<?php echo site_url('site/newsletter'); ?>"><i class="la la-envelope"></i><span
								class="menu-title">Newsletter List</span></a>
					</li>

					<li class=" navigation-header"><span>OTHER OPTIONS</span></li>

					<li id="139" class="nav-item">
						<a href="<?php echo site_url('site/fileremarks'); ?>"><i class="la la-exclamation-circle"></i><span
								class="menu-title">File
								Remarks</span></a>
					</li>

					<li id="130" class="nav-item">
						<a href="<?php echo site_url('site/impupdate'); ?>"><i class="la la-university"></i><span
								class="menu-title">Important Update</span></a>
					</li>

					<li id="106" class=" nav-item"><a href="#"><i class="la la-cog"></i><span class="menu-title">Site
								Options</span></a>
						<ul class="menu-content">
							<li id="1060"><a class="menu-item" href="<?php echo site_url('site/sitesettings'); ?>">Facebook
									Settings</a></li>
							<li id="1066"><a class="menu-item" href="<?php echo site_url('site/accountmsg'); ?>">Account
									Message</a></li>
							<li id="1064"><a class="menu-item"
									href="<?php echo site_url('site/editPage/welcome-message'); ?>">Welcome Message</a></li>
						</ul>
					</li>

					<li id="117" class=" nav-item"><a href="#"><i class="la la-file"></i><span
								class="menu-title">Pages</span></a>
						<ul class="menu-content">
							<li id="1171"><a class="menu-item"
									href="<?php echo site_url('site/editPage/privacy-policy'); ?>">Privcay Policy</a></li>
							<li id="11711"><a class="menu-item"
									href="<?php echo site_url('site/editPage/refund-policy'); ?>">Refund Policy</a></li>
							<li id="1175"><a class="menu-item"
									href="<?php echo site_url('site/editPage/disclaimer'); ?>">Disclaimer</a></li>
							<li id="1172"><a class="menu-item"
									href="<?php echo site_url('site/editPage/terms-conditions'); ?>">Terms & Conditions</a></li>
							<li id="11712"><a class="menu-item"
									href="<?php echo site_url('site/editPage/customer-legal-agreement'); ?>">Customer - Legal
									Agreement</a></li>
						</ul>
					</li>

				<?php
				}
				if ($role == 0) {
				?>
					<li id="143" class="nav-item">
						<a href="<?php echo site_url('site/stafflist'); ?>"><i class="la la-users"></i><span
								class="menu-title">Staff List</span></a>
					</li>

			<?php }
			// }
			 ?>
		</ul>

		<div class="mb-5"></div>
	</div>
</div>