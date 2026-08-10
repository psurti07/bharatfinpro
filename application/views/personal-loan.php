<?php
$this->load->view('includes/header.php');
?>

<div id="slider" class="inspiro-slider" data-height-xs="360">
    <div class="slide" data-bg-image="<?php echo base_url('assets/images/slider/pl-page-banner.jpg'); ?>">
        <div class="container">
            <div class="slide-captions">
                <h2 class="text-uppercase text-medium text-dark m-b-20">Personal Loan</h2>
                <h3 class="text-dark m-b-20">Get Fully Digital Instant Personal Loan Easily</h3>
                <a href="<?php echo site_url('digital/personalLoan'); ?>" class="btn btn-dark btn-outline"><span>Apply
                        Now</span></a>
            </div>
        </div>
    </div>
</div>

<section class="p-b-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12 m-b-20 text-justify">
                <p>Following utmost transparency and an optimized approach in its functioning, Bharatfinpro strives to
                    provide you with the best ever personal loan experience in terms of services, assistance, and
                    support. Bharatfinpro offers you 100% Digital and Paperless Loan Processes for you to have the ease
                    and comfort of applying for personal loans from your home. Bharatfinpro is a dedicated platform for
                    providing the instant personal loan that is completely paperless – and as the company is partnered
                    with several Banks and NBFCs (other financial institutions), you can get multiple loan offers that
                    will enable you to choose the most convenient loan offer in terms of the loan amount, repayment
                    tenure, interest rate, processing fees, etc.</p>

                <p>With Bharatfinpro, you can easily get a personal loan of up to Rs.10 Lakhs at the most attractive
                    rates – so that you can fulfil your planned or urgent financial needs and pursuits. As instances of
                    sudden money requirements can arise anytime, getting a personal loan through Bharatfinpro can prove
                    to be very handy. The loan documentation process at Bharatfinpro is extremely easy that would just
                    take minutes for you to get the best loan offers. Whether you are a salaried person or a
                    self-employed individual, you will get your beneficial loan offers with absolutely no hidden
                    charges. For you to get a clearer picture, check your loan eligibility through our loan calculator.
                </p>
            </div>
        </div>
    </div>
</section>

<div class="line"></div>

<section class="p-t-20 p-b-0">
    <div class="container">
        <div class="heading-text heading-plain text-center m-b-0">
            <h4 class="m-b-0">Superlative Benefits & Features</h4>
        </div>

        <div class="row p-t-20">
            <div class="col-lg-4 col-sm-12">
                <div class="icon-box center process w-100 p-20">
                    <h3>100% Digital & Paperless Loan</h3>
                    <p class="m-b-0">You need not visit banks several times and get exhausted. With us, you will
                        experience hassle-free online loan processes.</p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="icon-box center process w-100 p-20">
                    <h3>Instant Disbursal</h3>
                    <p class="m-b-0">Once all the checks are done, you can receive the loan amount directly in your bank
                        within some minutes.</p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="icon-box center process w-100 p-20">
                    <h3>Range of Attractive Rates</h3>
                    <p class="m-b-0">Choose the best interest rates from multiple loan offers for flexible and
                        unobstructed repayment.</p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="icon-box center process w-100 p-20">
                    <h3>Personal Loans up to Rs.10 Lakhs</h3>
                    <p class="m-b-0">Get a personal loan quickly and meet your sudden monetary requirements or the
                        planned ones.</p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="icon-box center process w-100 p-20">
                    <h3>Free Expert Consultancy</h3>
                    <p class="m-b-0">You will be guided by our experts throughout the entire loan process, enabling you
                        to make better decisions.</p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="icon-box center process w-100 p-20">
                    <h3>Instant Loan From Multiple Banks</h3>
                    <p class="m-b-0">We're partnered with multiple banks and NBFCs to give you a wide range of best and
                        most convenient personal loan offers.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="line"></div>

<section class="p-t-20 p-b-0">
    <div class="container">
        <div class="heading-text heading-plain text-center">
            <h4 class="m-b-0">Why Bharatfinpro?</h4>
        </div>

        <div class="row">
            <div class="col-12 text-center">
                <p class="lead">When it comes to aiding people with fast-paced and professional online loan services,
                    Bharatfinpro is an ace! With a humongous customer base that is ever-growing, Bharatfinpro is racing
                    ahead with its innovative Membership Cards for Instant Personal & Business Loan experience.</p>
            </div>
        </div>
    </div>
</section>

<div class="line"></div>

<section class="p-t-20">
    <div class="container">
        <div class="heading-text heading-plain text-center">
            <h4>Our Customers Express Satisfaction</h4>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="carousel equalize testimonial testimonial-box" data-margin="20" data-arrows="false"
                    data-items="3" data-items-sm="2" data-items-xxs="1" data-equalize-item=".testimonial-item">
                    <?php foreach ($testimoniallist as $row) { ?>
                    <div class="testimonial-item">
                        <img src="<?php echo base_url('assets/images/customers/' . $row->photo); ?>" alt="customer img">
                        <div class="rateit" data-rateit-mode="font" data-rateit-ispreset="true"
                            data-rateit-readonly="true" data-rateit-value="<?php echo $row->ratings; ?>"></div>
                        <p><?php echo $row->reviews; ?></p>
                        <span class="p-b-20"><?php echo $row->fullname; ?></span>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="line"></div>

<section class="p-t-20 p-b-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12 m-b-20">
                <h3>Personal Loan Eligibility For The Salaried</h3>

                <ul class="list-icon list-icon-check list-icon-colored">
                    <li>Age Criteria: The loan applicant's age should be at least 21 years.</li>
                    <li>Salary Criteria: The loan applicant's salary should be at least Rs.15000 monthly (must reflect
                        in the bank account)</li>
                    <li>Job Stability: The loan applicant must have at least 1 Year of job stability.</li>
                </ul>
            </div>

            <div class="col-lg-6 col-md-6 col-12 m-b-20">
                <h3>Personal Loan Eligibility For The Self-Employed</h3>

                <ul class="list-icon list-icon-check list-icon-colored">
                    <li>Age Criteria: The loan applicant's age should be at least 21 years.</li>
                    <li>Business Stability: Minimum of 1 year of business stability is required.</li>
                    <li>IT Return: At least 1 Year of ITR is a must.</li>
                </ul>
            </div>

            <div class="col-lg-6 col-md-6 col-12 m-b-20">
                <h3>Quick Loan Application Process</h3>

                <ul class="list-icon list-icon-check list-icon-colored">
                    <li>Easy Registration</li>
                    <li>Check Eligibility</li>
                    <li>Buy Membership Card</li>
                    <li>Upload Documents</li>
                    <li>Bank Verification</li>
                    <li>Loan Sanction</li>
                </ul>
            </div>

            <div class="col-lg-6 col-md-6 col-12 m-b-20">
                <h3>Documents Required For Personal Loan</h3>

                <ul class="list-icon list-icon-check list-icon-colored">
                    <li>Address Proof</li>
                    <li>Age Proof</li>
                    <li>Identity Proof</li>
                    <li>Salary Slips – Last 6 months (for salaried)</li>
                    <li>Bank Statement – Last 6 months</li>
                    <li>ITR or Form 16</li>
                    <li>Financial Statements/Income Proof (for self-employed)</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="line"></div>

<section class="p-t-20">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Personal Loan for Various Purposes</h3>

                <ul class="list-icon list-icon-check list-icon-colored">
                    <li>Home Makeover : Give your home a new refreshing look with new furnishings and interiors.</li>
                    <li>Wedding Expenses : Experience the wedding of your dreams with its expenses sorted.</li>
                    <li>Educational Pursuits : Upscale your academics and future by pursuing education in your dream
                        institution.</li>
                    <li>Buying Vehicles : You can make your favourite vehicle yours through easy finances.</li>
                    <li>Medical Emergencies : Life is unpredictable! Get ready for medical expenses for timely
                        treatment.</li>
                    <li>Clearing Debts : Remove the burden of debts and live your life with a free mind.</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="call-to-action call-to-action-colored m-b-0">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3>Fulfill Your Financial Aspirations With Instant Personal Loan</h3>
            </div>

            <div class="col-md-3 text-center">
                <a class="btn btn-light" href="<?php echo site_url('digital/personalLoan'); ?>">Apply Now</a>
            </div>
        </div>
    </div>
</div>

<?php
$this->load->view('includes/footer.php');
?>