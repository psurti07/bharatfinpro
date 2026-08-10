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
                    <li class="breadcrumb-item active" aria-current="page">Diamond Membership Card</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="p-b-40" id="membershipcard">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-12">
                <div class="heading-text">
                    <h3>Boost Your Business To A Super-Growth Phase With Diamond Membership Card</h3>
                    <p>Here’s the right choice for you, make it now to experience extraordinariness!</p>
                </div>

                <p>Our Diamond Membership Card provides you with an Instant Business Loan of up to ₹1 Crore plus several
                    attractive benefits.</p>

                <?php
				if ($productdata->offeramount != 0) {
					echo '<h3>Rs. <del class="text-danger">' . $productdata->amount . '</del> <span class="text-success">' . $productdata->offeramount . '</span> only</h3>';
				} else {
					echo '<h3>Rs. ' . $productdata['amount'] . ' only</h3>';
				}
				?>

                <a href="<?php echo site_url('digital/businessLoan'); ?>" class="btn btn-primary"><span>Buy
                        Now</span></a>
            </div>

            <div class="col-lg-5 col-md-5 col-12">
                <img src="<?php echo base_url('assets/images/slider/membership-card-diamond.png'); ?>"
                    alt="Diamond membership card" class="img-fluid rounded">
            </div>
        </div>

        <div class="row m-t-40">
            <div class="col-12">
                <div class="heading-text text-center">
                    <h3>Diamond Membership Card – Enabling Quickest & Convenient Business Loan</h3>
                    <p>Our professional services will make sure you embark on the journey of growth!</p>
                </div>

                <p class="text-justify">To enable businesspersons in getting extremely fast and reliable business loan
                    services, Bharatfinpro's Diamond Membership Cards come with a set of fabulous benefits that will not
                    only ease the entire loan taking process but will also make your entire loan process advantageous
                    and exciting. Through the Diamond Membership Card, a business-owning individual can get an instant
                    and 100% digital business loan of up to ₹1 Crore in just 40 hours and with the received loan amount,
                    they can invest in their business and upscale it to new heights of growth and success.</p>

                <p class="text-justify">Business is something that involves risk at every stage of its functioning and
                    financial assistance can be sought anytime. The best way to deal with this is by taking a quick
                    business loan through the Diamond Membership Card and making the necessary payments to ensure a
                    smooth flow of your business without any sort of hindrance. A business loan can be sought by a
                    businessperson for purposes like maintaining and ensuring a good-enough cash flow, giving on-time
                    payments to the suppliers/manufacturers/service providers, expanding your business by making a smart
                    investment, surging your business prospects by exploring new opportunities that may require extra
                    finance, bring in new young and talented resources to upscale your business graph with fresh ideas,
                    set up an office and arrange the required infrastructure, etc. This loan can be repaid with easy
                    EMIs within the decided loan tenure.</p>

                <p class="text-justify">The Diamond Membership can be availed by anyone and absolutely no eligibility
                    check is required for its purchasing. As Bharatfinpro is in solid collaborations with several
                    leading banks and NBFCs (Non-Banking Financial Companies), you can get business loan offers from
                    multiple banks and select the one that suits your requirements in terms of the loan amount, loan
                    tenure, processing fees, rate of interest, loan insurance, etc. Also, there would be no influence on
                    your CIBIL score even after several bank verifications.</p>
            </div>
        </div>
    </div>
</section>

<section class="background-grey">
    <div class="container">
        <div class="heading-text text-center">
            <h3>Awesome Aspects of Diamond Membership Card</h3>
            <p>Heaps of benefits, all under one power-studded membership!</p>
        </div>

        <div class="row">
            <div class="col-lg-4 m-b-20">
                <h4>Business Loan Offers From Multiple Banks</h4>
                <p>Once we gather your loan-related documents, we will quickly file your loan application in our
                    partnered banks and financial institutions. Then, the NBFC banks will check your profile and match
                    it to their respective loan eligibility criteria. After this, we will give you the loan offers from
                    the banks in which your profile is matched.</p>
            </div>

            <div class="col-lg-4 m-b-20">
                <h4>Get Free Loan Expert Consultancy for 1 years</h4>
                <p>We believe in helping you with all our efforts! Serving the same purpose, purchasing a membership
                    card enables you to get free expert consultancy through which you will be guided towards fetching
                    suitable business loan offers.</p>
            </div>

            <div class="col-lg-4 m-b-20">
                <h4>Get 35% Referral Payout as Reward</h4>
                <p>Besides getting business loan offers from our partnered banks, you can make a good income through
                    easy refer and share, and you can earn up to 35% referral commission from us.</p>
            </div>

            <div class="col-lg-4 m-b-20">
                <h4>Quick Loan Approval</h4>
                <p>You can get a business loan of up to Rs.1 crore in just 40 hours! Our quick services will aid you in
                    getting your business loan with the quick loan approval. Still, the final timeframe and loan details
                    depend upon the concerned banks’ criteria and the customer profile.</p>
            </div>

            <div class="col-lg-4 m-b-20">
                <h4>Excellent On-Call Support</h4>
                <p>In order to clear your doubts and entertain your queries, we are more than happy to connect with you
                    via our on-call support. Through this, you will be able to get appropriate answers to all your
                    questions.</p>
            </div>

            <div class="col-lg-4 m-b-20">
                <h4>No Effect On CIBIL Score</h4>
                <p>One of the best features of buying the Diamond Membership Card is that even after multiple bank
                    verification, there will be no impact on the loan applicant’s CIBIL score.</p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="heading-text text-center">
            <h3>How it Works?</h3>
            <p>Most Optimized Way Towards Business Loan</p>
        </div>

        <div class="row" data-item="post-item" data-stagger="10">
            <div class="post-item border col-md-4 p-2">
                <div class="post-item-wrap">
                    <div class="post-item-description background-grey">
                        <h2>1. Easy Registration Process</h2>
                        <hr>
                        <p>The first and foremost step is to fill in your bank registered name and mobile number – and
                            complete the registration process. If you are already registered, then simply log in with
                            your credentials.</p>
                    </div>
                </div>
            </div>
            <div class="post-item border col-md-4 p-2">
                <div class="post-item-wrap">
                    <div class="post-item-description background-grey">
                        <h2>2. Check Eligibility</h2>
                        <hr>
                        <p>Here, you will be filling in certain loan-related important details like loan purpose,
                            income, monthly EMI (if any), etc. Depending upon your eligibility, you will get a
                            system-generated pre-approved loan offer. The final eligibility and loan approval depends on
                            the concerned bank(s) and your profile.</p>
                    </div>
                </div>
            </div>
            <div class="post-item border col-md-4 p-2">
                <div class="post-item-wrap">
                    <div class="post-item-description background-grey">
                        <h2>3. Buy Diamond Membership Card</h2>
                        <hr>
                        <p>Now, you will be entering details like email id and phone number so that we can prepare your
                            membership card. You will be given easy payment options for you to make the payment in a
                            convenient manner.</p>
                    </div>
                </div>
            </div>
            <div class="post-item border col-md-4 p-2">
                <div class="post-item-wrap">
                    <div class="post-item-description background-grey">
                        <h2>4. Upload Documents</h2>
                        <hr>
                        <p>Once the payment is done, you will be getting a receipt and password in your email. You will
                            get a call from our login department in 24-48 hours for verification. Then, you have to
                            submit the documents to the company’s Whatsapp number or customer portal. Customers have to
                            submit their documents (asked by the login department) within 3 days of registration.</p>
                    </div>
                </div>
            </div>
            <div class="post-item border col-md-4 p-2">
                <div class="post-item-wrap">
                    <div class="post-item-description background-grey">
                        <h2>5. Bank Verification</h2>
                        <hr>
                        <p>We will prepare a loan file and submit it to our multiple banks and NBFCs for verification.
                            Banks will match your profile with their loan parameters and eligibility criteria.</p>
                    </div>
                </div>
            </div>
            <div class="post-item border col-md-4 p-2">
                <div class="post-item-wrap">
                    <div class="post-item-description background-grey">
                        <h2>6. Loan Sanction</h2>
                        <hr>
                        <p>Once all the checks are done by the banks and if your profile is eligible for the loan, the
                            banks will provide the sanction letter to you. Then, an agreement would be signed by you to
                            give your consent over receiving the loan amount in your bank account. After this, the loan
                            amount will be credited to your bank account.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$this->load->view('includes/footer.php');
?>