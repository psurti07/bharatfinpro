<?php
$this->load->view('includes/header.php');
?>

<section id="page-title">
    <div class="container">
        <div class="breadcrumb text-left">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Loan Calculator</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- EMI Calculator Widget START -->
                <script src="https://emicalculator.net/widget/2.0/js/emicalc-loader.min.js" type="text/javascript">
                </script>
                <div id="ecww-widgetwrapper" style="min-width:250px;width:100%;">
                    <div id="ecww-widget"
                        style="position:relative;padding-top:0;padding-bottom:280px;height:0;overflow:hidden;"></div>
                </div>
                <!-- EMI Calculator Widget END -->
            </div>
        </div>
    </div>
</section>

<section class="background-grey">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p class="lead">Instant personal loan EMI calculator makes it easy for you to figure out the monthly
                    instalments on your loan.</p>

                <p class="lead">When you take an <a href="<?php echo site_url('digital/personalLoan'); ?>"
                        target="_self">Instant personal loan</a>, the equated monthly instalment is a key factor in
                    deciding the loan amount and tenure. The <a href="<?php echo site_url('loan/calculator'); ?>"
                        target="_self">personal loan calculator</a> helps you instantly calculate your pay-outs and,
                    therefore, plan your personal loan and repayment better.</p>

                <p class="lead">To calculate your EMI, just enter the loan amount, rate of interest and loan tenure, and
                    your EMI is instantly displayed. You can enter loan amounts from 25,000/- to 40,00,000/- on term
                    from 1 to 5 years.</p>

                <p class="lead">The personal loan EMI calculator is designed to be easy-to-use and intuitive.You can use
                    the personal loan EMI calculator to calculate the EMI on personal loan from any bank or financial
                    institution. It is free to use.</p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="accordion">
                    <div class="ac-item">
                        <h5 class="ac-title">What is personal loan EMI?</h5>
                        <div class="ac-content">
                            <p>EMI, or Equated Monthly Instalment, is the fixed amount paid by a borrower every month to
                                clear off the loan taken from a bank. It is scheduled at a specific date of every
                                calendar month and includes both principal and interest components. Your personal loan
                                EMI depends on the loan principal, the rate of interest and the loan tenure.</p>
                        </div>
                    </div>

                    <div class="ac-item">
                        <h5 class="ac-title">How to calculate personal loan EMI?</h5>
                        <div class="ac-content">
                            <p>It is essential to calculate your EMI before applying for a personal loan. While you can
                                do so manually, using a Personal loan calculator can help you determine the more
                                accurate value. You can select the required loan amount, tenure and rate of interest to
                                get the exact payable EMI amount with an interactive chart.</p>
                        </div>
                    </div>

                    <div class="ac-item">
                        <h5 class="ac-title">How to reduce your personal loan EMI?</h5>
                        <div class="ac-content">
                            <p>EMI may affect your monthly expenses until you repay it. Some simple steps that can help
                                you reduce the personal loan EMI and manage outlays easily are:</p>
                            <ul>
                                <li>Option for a longer repayment tenor - It will help you spread the loan cost over a
                                    longer duration and help you pay in small installment </li>
                                <li>Negotiate with the loan consultancy for a lower rate of interest</li>
                                <li>Maintain a strong CIBIL score to enjoy lower interest rates and reduced EMI</li>
                                <li>Become a Bharatfinpro Member for the best deals as per your needs and repaying
                                    capacity</li>
                            </ul>
                        </div>
                    </div>

                    <div class="ac-item">
                        <h5 class="ac-title">What are the factors that affect personal loan EMI?</h5>
                        <div class="ac-content">
                            <p>Following factors affect personal loan EMI</p>
                            <ul>
                                <li>Loan amount - Monthly instalments payable are directly proportional to the loan
                                    amount opted for. The higher the loan amount the higher will be your EMI.</li>
                                <li>Applicable cornet Interest -Interest rate is a percentage at which lenders charge
                                    interest on the Loan amount. A higher interest rate increases the EMIs and vice
                                    versa.</li>
                                <li>Tenor - it is the repayment period for the personal loan availed and is inversely
                                    related to EMIs. A longer tenor reduces monthly instalments while a shorter tenor
                                    increases them.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="accordion">
                    <div class="ac-item">
                        <h5 class="ac-title">What is business loan EMI?</h5>
                        <div class="ac-content">
                            <p>EMI, or Equated Monthly Instalment, is the fixed amount paid by a borrower every month to
                                clear off the loan taken from a bank. It is scheduled at a specific date of every
                                calendar month and includes both principal and interest components. Your <a
                                    href="<?php echo site_url('digital/businessLoan'); ?>" target="_self">business loan
                                    EMI</a> depends on the loan principal, the rate of interest and the loan tenure.</p>
                        </div>
                    </div>

                    <div class="ac-item">
                        <h5 class="ac-title">How to calculate business loan EMI?</h5>
                        <div class="ac-content">
                            <p>It is essential to calculate your EMI before applying for a Business loan. While you can
                                do so manually, using a <a href="<?php echo site_url('loan/calculator'); ?>"
                                    target="_self">Business loan calculator</a> can help you determine the more accurate
                                value. You can select the required loan amount, tenure and rate of interest to get the
                                exact payable EMI amount with an interactive chart.</p>
                        </div>
                    </div>

                    <div class="ac-item">
                        <h5 class="ac-title">How to reduce your Business loan EMI?</h5>
                        <div class="ac-content">
                            <p>EMI may affect your monthly expenses until you repay it. Some simple steps that can help
                                you reduce the Business loan EMI and manage outlays easily are:</p>
                            <ul>
                                <li>Option for a longer repayment tenor - It will help you spread the loan cost over a
                                    longer duration and help you pay in small installment</li>
                                <li>Negotiate with the loan consultancy for a lower rate of interest</li>
                                <li>Maintain a strong CIBIL score to enjoy lower interest rates and reduced EMI</li>
                                <li>Become a Bharatfinpro Member for the best deals as per your needs and repaying
                                    capacity</li>
                            </ul>
                        </div>
                    </div>

                    <div class="ac-item">
                        <h5 class="ac-title">What are the factors that affect Business loan EMI?</h5>
                        <div class="ac-content">
                            <p>Following factors affect Business loan EMI:</p>
                            <ul>
                                <li>Loan amount - Monthly installments payable are directly proportional to the loan
                                    amount opted for. The higher the loan amount the higher will be your EMI.</li>
                                <li>Applicable cornet Interest - Interest rate is a percentage at which lenders charge
                                    interest on the Loan amount. A higher interest rate increases the EMIs and vice
                                    versa.</li>
                                <li>Tenor - it is the repayment period for the Business loan availed and is inversely
                                    related to EMIs. A longer tenor reduces monthly instalments while a shorter tenor
                                    increases them.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<?php
$this->load->view('includes/footer.php');
?>