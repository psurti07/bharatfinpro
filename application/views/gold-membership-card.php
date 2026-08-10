<?php
    $this->load->view('includes/header.php');
?>

<section id="page-title">
	<div class="container">
		<div class="breadcrumb text-left">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
					<li class="breadcrumb-item">Product</li>
					<li class="breadcrumb-item active" aria-current="page">Gold Membership Card</li>
				</ol>
			</nav>
		</div>
	</div>
</section>

<section  class="p-b-40" id="membershipcard">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-7 col-12">
				<div class="heading-text">
					<h3>Gold Membership Card – Unlocking The Best Personal Loans</h3>
					<p>Transforming the process with a digital push!</p>
				</div>

				<p>Our Gold Membership Card provides you with an Instant Personal Loan of up to ₹10 Lakhs plus several attractive benefits.</p>

				<?php
				if($productdata->offeramount != 0) {
					echo '<h3>Rs. <del class="text-danger">'.$productdata->amount.'</del> <span class="text-success">'.$productdata->offeramount.'</span> only</h3>';
				}
				else {
					echo '<h3>Rs. '.$productdata['amount'].' only</h3>';
				}
				?>

				<a href="<?php echo site_url('digital/personalLoan'); ?>" class="btn btn-primary"><span>Buy Now</span></a>
			</div>

			<div class="col-lg-5 col-md-5 col-12">
				<img src="<?php echo base_url('assets/images/slider/membership-card-gold.png'); ?>" alt="Gold membership card" class="img-fluid rounded">
			</div>
		</div>

		<div class="row m-t-40">
			<div class="col-12">
				<div class="heading-text text-center">
					<h3>Go Ahead For Your Convenient Personal Loan With Gold Membership Card</h3>
					<p>Make a smart choice and cherish it a long way!</p>
				</div>

				<p class="text-justify">Bharatfinpro's Gold Membership Card is an innovative and the most effective way of getting personal loan offers from multiple banks and private financial institutions – in just 48 hours! Yes, when you purchase the membership card, apart from getting instant loan offers, you get eligible to avail of certain other amazing services provided by Bharatfinpro.</p>

				<p class="text-justify">A personal loan is a very handy and convenient option when any urgent situation, demanding financial assistance, arises. Bharatfinpro understands it and this is the foundational thought behind the Gold Membership Card. An individual can come across certain situations like – wanting money for medical emergencies, wedding funds, unplanned vacations, home renovation, academic fees, buying your own vehicle, etc. In all such instances of urgent money need, you can easily get a personal loan of up to ₹10 Lakhs in just 48 hours through the membership card. This would assist you efficiently in meeting the urgent financial needs and then you can repay the loan amount through easy EMIs (Equated Monthly Instalments).</p>

				<p class="text-justify">Bharatfinpro's Gold Membership Card is a great offering for every loan seeker. Also, one of the great aspects of this membership card is that it does not require any eligibility check, this means that a loan seeker from any place, with any financial background, belonging to any profession, can apply for the membership card and avail of its highly acclaimed benefits. If you are facing any urgency of money, you can opt for a quick personal loan from Bharatfinpro through its Gold Membership Card. As Bharatfinpro is partnered with multiple banks and Non-Banking Financial Companies (NBFCs), the loan seeker can get personal loan offers from several banks. Also, even after multiple bank verification, there would not be any impact on the person's CIBIL or credit score.</p>
			</div>
		</div>
	</div>
</section>

<section class="background-grey">
	<div class="container">
		<div class="heading-text text-center">
			<h3>Awesome Aspects of Gold Membership Card</h3>
			<p>Heaps of benefits, all under one power-studded membership!</p>
		</div>

		<div class="row">
			<div class="col-lg-4 m-b-20">
				<h4>Personal Loan Offers From Multiple Banks</h4>
				<p>Once we gather your loan-related documents, we will quickly file your loan application in our partnered banks and financial institutions. Then, the NBFC banks will check your profile and match it to their respective loan eligibility criteria. After this, we will give you the loan offers from the banks in which your profile is matched.</p>
			</div>

			<div class="col-lg-4 m-b-20">
				<h4>Get Free Loan Expert Consultancy for 6 months</h4>
				<p>We believe in helping you with all our efforts! Serving the same purpose, purchasing a membership card enables you to get free expert consultancy through which you will be guided towards fetching suitable personal loan offers</p>
			</div>

			<div class="col-lg-4 m-b-20">
				<h4>Get 35% Referral Payout as Reward</h4>
				<p>Besides getting personal loan offers from our partnered banks, you can make a good income through easy refer and share, and you can earn up to 35% referral commission from us.</p>
			</div>

			<div class="col-lg-4 m-b-20">
				<h4>Quick Loan Approval</h4>
				<p>You can get a personal loan of up to Rs.10 lakhs in just 48 hours! Our quick services will aid you in getting your personal loan with the quick loan approval. Still, the final timeframe and loan details depend upon the concerned banks’ criteria and the customer profile.</p>
			</div>

			<div class="col-lg-4 m-b-20">
				<h4>Excellent On-Call Support</h4>
				<p>In order to clear your doubts and entertain your queries, we are more than happy to connect with you via our on-call support. Through this, you will be able to get appropriate answers to all your questions.</p>
			</div>

			<div class="col-lg-4 m-b-20">
				<h4>No Effect On CIBIL Score</h4>
				<p>One of the best features of buying the Gold Membership Card is that even after multiple bank verification, there will be no impact on the loan applicant's CIBIL Score.</p>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="heading-text text-center">
			<h3>How it Works?</h3>
			<p>Most Optimized Way Towards Personal Loan</p>
		</div>

		<div class="row" data-item="post-item">
			<div class="post-item border col-md-4 p-2">
				<div class="post-item-wrap">
					<div class="post-item-description background-grey">
						<h2>1. Easy Registration Process</h2><hr>
						<p>The first and foremost step is to fill in your bank registered name and mobile number – and complete the registration process. If you are already registered, then simply log in with your credentials.</p>
					</div>
				</div>
			</div>
			<div class="post-item border col-md-4 p-2">
				<div class="post-item-wrap">
					<div class="post-item-description background-grey">
						<h2>2. Check Eligibility</h2><hr>
						<p>Here, you will be filling in certain loan-related important details like loan purpose, income, monthly EMI (if any), etc. Depending upon your eligibility, you will get a system-generated pre-approved loan offer. The final eligibility and loan approval depends on the concerned bank(s) and your profile.</p>
					</div>
				</div>
			</div>
			<div class="post-item border col-md-4 p-2">
				<div class="post-item-wrap">
					<div class="post-item-description background-grey">
						<h2>3. Buy Gold Membership Card</h2><hr>
						<p>Now, you will be entering details like email id and phone number so that we can prepare your membership card. You will be given easy payment options for you to make the payment in a convenient manner.</p>
					</div>
				</div>
			</div>
			<div class="post-item border col-md-4 p-2">
				<div class="post-item-wrap">
					<div class="post-item-description background-grey">
						<h2>4. Upload Documents</h2><hr>
						<p>Once the payment is done, you will be getting a receipt and password in your email. You will get a call from our login department in 24-48 hours for verification. Then, you have to submit the documents to the company's Whatsapp number or customer portal. Customers have to submit their documents (asked by the login department) within 3 days of registration.</p>
					</div>
				</div>
			</div>
			<div class="post-item border col-md-4 p-2">
				<div class="post-item-wrap">
					<div class="post-item-description background-grey">
						<h2>5. Bank Verification</h2><hr>
						<p>We will prepare a loan file and submit it to our multiple banks and NBFCs for verification. Banks will match your profile with their loan parameters and eligibility criteria.</p>
					</div>
				</div>
			</div>
			<div class="post-item border col-md-4 p-2">
				<div class="post-item-wrap">
					<div class="post-item-description background-grey">
						<h2>6. Loan Sanction</h2><hr>
						<p>Once all the checks are done by the banks and if your profile is eligible for the loan, the banks will provide the sanction letter to you. Then, an agreement would be signed by you to give your consent over receiving the loan amount in your bank account. After this, the loan amount will be credited to your bank account.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
    $this->load->view('includes/footer.php');
?>
