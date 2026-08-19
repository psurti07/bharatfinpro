<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("101").className += " active";
}
</script>

<div class="content-body">
    <div class="row">
        <div class="col-12">
            <?php
			if (!empty($ac_data)) {
			?>
            <div class="alert alert-<?php echo $ac_data['ac_class'] ?> fade show" role="alert">
                <h4><?php echo $ac_data['ac_title'] ?></h4>
                <p><?php echo $ac_data['ac_msg'] ?></p>
            </div>
            <?php
			}
			?>
            <h2 class="text-bold-600 text-center">Digital Today's Statistics - <?php echo date('d M, Y'); ?></h2>
            <hr />
        </div>
    </div>

    <div class="row">
        <!-- Digital Loan -->
        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a
                            href="<?php echo ($userrole != 2) ? site_url('users/digitalleads?dt_to=' . date('Y-m-d')) : '#'; ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700">
                                        <?php echo ($userrole != 2) ? number_format($statestics['digitalloans'], 0) : 0; ?>
                                    </h3>
                                    <h6 class="text-bold-700">Digital Loan Enquiry</h6>
                                </div>
                                <div><i class="la la-server primary font-large-2 float-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a
                            href="<?php echo ($userrole != 2) ? site_url('users/digitalleads/pl?dt_to=' . date('Y-m-d')) : '#'; ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700">
                                        <?php echo ($userrole != 2) ? number_format($statestics['digitalpersonal'], 0) : 0; ?>
                                    </h3>
                                    <h6 class="text-bold-700">Digital Personal Loan Enquiry</h6>
                                </div>
                                <div><i class="la la-server primary font-large-2 float-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a
                            href="<?php echo ($userrole != 2) ? site_url('users/digitalleads/bl?dt_to=' . date('Y-m-d')) : '#'; ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700">
                                        <?php echo ($userrole != 2) ? number_format($statestics['digitalbusiness'], 0) : 0; ?>
                                    </h3>
                                    <h6 class="text-bold-700">Digital Business Loan Enquiry</h6>
                                </div>
                                <div><i class="la la-server primary font-large-2 float-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Digital Loan -->
        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a
                            href="<?php echo ($userrole != 2) ? site_url('users/referral?dt_to=' . date('Y-m-d')) : '#'; ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700">
                                        <?php echo ($userrole != 2) ? number_format($statestics['refferalcustomerpayout'], 0) : 0; ?>
                                    </h3>
                                    <h6 class="text-bold-700">Pending Customer Payout</h6>
                                </div>
                                <div><i class="la la-sitemap primary font-large-2 float-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a
                            href="<?php echo ($userrole != 2) ? site_url('loan/application?dt_to=' . date('Y-m-d')) : '#'; ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700">
                                        <?php echo ($userrole != 2) ? number_format($statestics['userapplication'], 0) : 0; ?>
                                    </h3>
                                    <h6 class="text-bold-700">Loan Applications</h6>
                                </div>
                                <div><i class="la la-list primary font-large-2 float-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a
                            href="<?php echo ($userrole != 2) ? site_url('loan/reapplyhistory?dt_to=' . date('Y-m-d')) : '#'; ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700">
                                        <?php echo ($userrole != 2) ? number_format($statestics['reapplyapplication'], 0) : 0; ?>
                                    </h3>
                                    <h6 class="text-bold-700">Loan Reapply Applications</h6>
                                </div>
                                <div><i class="la la-list primary font-large-2 float-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a
                            href="<?php echo ($userrole != 2) ? site_url('sms/sentotps?dt_to=' . date('Y-m-d')) : '#'; ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700">
                                        <?php echo ($userrole != 2) ? number_format($statestics['otpmessage'], 0) : 0; ?>
                                    </h3>
                                    <h6 class="text-bold-700">Today OTP</h6>
                                </div>
                                <div><i class="la la-asterisk primary font-large-2 float-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--
    <div class="row">
        <div class="col-12">
            <h2 class="text-bold-600 text-center">Plan Today's Statistics - <?php echo date('d M, Y'); ?></h2>
            <hr />
        </div>
    </div>
    <div class="row">
        <!-- Plan Loan
        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a
                            href="<?php echo ($userrole != 2) ? site_url('plan/planleads?dt_to=' . date('Y-m-d')) : '#'; ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700">
                                        <?php echo ($userrole != 2) ? number_format($statestics['planloans'], 0) : 0; ?>
                                    </h3>
                                    <h6 class="text-bold-700">Plan Loan Enquiry</h6>
                                </div>
                                <div><i class="la la-server primary font-large-2 float-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a
                            href="<?php echo ($userrole != 2) ? site_url('plan/planleads/pl?dt_to=' . date('Y-m-d')) : '#'; ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700">
                                        <?php echo ($userrole != 2) ? number_format($statestics['planpersonal'], 0) : 0; ?>
                                    </h3>
                                    <h6 class="text-bold-700">Plan Personal Loan Enquiry</h6>
                                </div>
                                <div><i class="la la-server primary font-large-2 float-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a
                            href="<?php echo ($userrole != 2) ? site_url('plan/planleads/bl?dt_to=' . date('Y-m-d')) : '#'; ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700">
                                        <?php echo ($userrole != 2) ? number_format($statestics['planbusiness'], 0) : 0; ?>
                                    </h3>
                                    <h6 class="text-bold-700">Plan Business Loan Enquiry</h6>
                                </div>
                                <div><i class="la la-server primary font-large-2 float-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Plan Loan 
        <!-- Digital Loan 
        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a
                            href="<?php echo ($userrole != 2) ? site_url('plan/referral?dt_to=' . date('Y-m-d')) : '#'; ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700">
                                        <?php echo ($userrole != 2) ? number_format($statestics['planrefferalcustomerpayout'], 0) : 0; ?>
                                    </h3>
                                    <h6 class="text-bold-700">Plan Pending Customer Payout</h6>
                                </div>
                                <div><i class="la la-sitemap primary font-large-2 float-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a
                            href="<?php echo ($userrole != 2) ? site_url('planloan/application?dt_to=' . date('Y-m-d')) : '#'; ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700">
                                        <?php echo ($userrole != 2) ? number_format($statestics['planuserapplication'], 0) : 0; ?>
                                    </h3>
                                    <h6 class="text-bold-700">Plan Loan Applications</h6>
                                </div>
                                <div><i class="la la-list primary font-large-2 float-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a
                            href="<?php echo ($userrole != 2) ? site_url('planloan/reapplyhistory?dt_to=' . date('Y-m-d')) : '#'; ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700">
                                        <?php echo ($userrole != 2) ? number_format($statestics['reapplyapplicationplan'], 0) : 0; ?>
                                    </h3>
                                    <h6 class="text-bold-700">Plan Loan Reapply Applications</h6>
                                </div>
                                <div><i class="la la-list primary font-large-2 float-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
-->
    <div class="row">
        <div class="col-12">
            <h2 class="text-bold-600 text-center">Payment & Offers Statistics
            </h2>
            <hr />
        </div>
    </div>

    <div class="row">

        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a
                            href="<?php echo ($userrole != 2) ? site_url('users/membershiplist/11?dt_to=' . date('Y-m-d')) : '#'; ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700">
                                        <?php echo ($userrole != 2) ? number_format($statestics['goldcards'], 0) : 0; ?>
                                    </h3>
                                    <h6 class="text-bold-700">Gold Membership Cards - <?php echo PG_DIGITAL_PL; ?> </h6>
                                </div>
                                <div><i class="la la-credit-card primary font-large-2 float-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a
                            href="<?php echo ($userrole != 2) ? site_url('users/membershiplist/12?dt_to=' . date('Y-m-d')) : '#'; ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700">
                                        <?php echo ($userrole != 2) ? 	number_format($statestics['diamondcards'], 0) : 0; ?>
                                    </h3>
                                    <h6 class="text-bold-700">Diamond Membership Cards - <?php echo PG_DIGITAL_BL; ?>
                                    </h6>
                                </div>
                                <div><i class="la la-credit-card primary font-large-2 float-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

<!--
        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a
                            href="<?php echo ($userrole != 2) ? site_url('plan/planlist/21?dt_to=' . date('Y-m-d')) : '#'; ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700">
                                        <?php echo ($userrole != 2) ? number_format($statestics['planpersonalloan'], 0) : 0; ?>
                                    </h3>
                                    <h6 class="text-bold-700">Plan Personal Loan - <?php echo PG_PLAN_PL; ?> </h6>
                                </div>
                                <div><i class="la la-credit-card primary font-large-2 float-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a
                            href="<?php echo ($userrole != 2) ? site_url('plan/planlist/22?dt_to=' . date('Y-m-d')) : '#'; ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700">
                                        <?php echo ($userrole != 2) ? 	number_format($statestics['planbusinessloan'], 0) : 0; ?>
                                    </h3>
                                    <h6 class="text-bold-700">Plan Business Loan - <?php echo PG_PLAN_BL; ?>
                                    </h6>
                                </div>
                                <div><i class="la la-credit-card primary font-large-2 float-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
-->
        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a
                            href="<?php echo ($userrole != 2) ? site_url('enquiry/cardoffer?dt_to=' . date('Y-m-d')) : '#'; ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700">
                                        <?php echo ($userrole != 2) ? number_format($statestics['cardoffer'], 0) : 0; ?>
                                    </h3>
                                    <h6 class="text-bold-700">Card Offer Sales - <?php echo PG_CARD_OFFER; ?> </h6>
                                </div>
                                <div><i class="la la-hand-o-right primary font-large-2 float-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a
                            href="<?php echo ($userrole != 2) ? site_url('enquiry/specialoffer?dt_to=' . date('Y-m-d')) : '#'; ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700">
                                        <?php echo ($userrole != 2) ? number_format($statestics['specialoffer'], 0) : 0; ?>
                                    </h3>
                                    <h6 class="text-bold-700">Special Offer Sales - <?php echo PG_SPECIAL_OFFER; ?>
                                    </h6>
                                </div>
                                <div><i class="la la-hand-o-right primary font-large-2 float-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!--
        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a
                            href="<?php echo ($userrole != 2) ? site_url('enquiry/bumperoffer?dt_to=' . date('Y-m-d')) : '#'; ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700">
                                        <?php echo ($userrole != 2) ? number_format($statestics['bumperoffer'], 0) : 0; ?>
                                    </h3>
                                    <h6 class="text-bold-700">Bumper Offer Sales - <?php echo PG_BUMPER_OFFER; ?> </h6>
                                </div>
                                <div><i class="la la-hand-o-right primary font-large-2 float-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a
                            href="<?php echo ($userrole != 2) ? site_url('enquiry/staroffer?dt_to=' . date('Y-m-d')) : '#'; ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700">
                                        <?php echo ($userrole != 2) ? number_format($statestics['staroffer'], 0) : 0; ?>
                                    </h3>
                                    <h6 class="text-bold-700">Star Offer Sales - <?php echo PG_STAR_OFFER; ?> </h6>
                                </div>
                                <div><i class="la la-hand-o-right primary font-large-2 float-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a
                            href="<?php echo ($userrole != 2) ? site_url('enquiry/primeoffer?dt_to=' . date('Y-m-d')) : '#'; ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700">
                                        <?php echo ($userrole != 2) ? number_format($statestics['primeoffer'], 0) : 0; ?>
                                    </h3>
                                    <h6 class="text-bold-700">Prime Offer Sales - <?php echo PG_PRIME_OFFER; ?> </h6>
                                </div>
                                <div><i class="la la-hand-o-right primary font-large-2 float-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a
                            href="<?php echo ($userrole != 2) ? site_url('enquiry/megaoffer?dt_to=' . date('Y-m-d')) : '#'; ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700">
                                        <?php echo ($userrole != 2) ? number_format($statestics['megaoffer'], 0) : 0; ?>
                                    </h3>
                                    <h6 class="text-bold-700">Mega Offer Sales - <?php echo PG_MEGA_OFFER; ?> </h6>
                                </div>
                                <div><i class="la la-hand-o-right primary font-large-2 float-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a
                            href="<?php echo ($userrole != 2) ? site_url('enquiry/superoffer?dt_to=' . date('Y-m-d')) : '#'; ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700">
                                        <?php echo ($userrole != 2) ? number_format($statestics['superoffer'], 0) : 0; ?>
                                    </h3>
                                    <h6 class="text-bold-700">Super Offer Sales - <?php echo PG_SUPER_OFFER; ?> </h6>
                                </div>
                                <div><i class="la la-hand-o-right primary font-large-2 float-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a
                            href="<?php echo ($userrole != 2) ? site_url('enquiry/quickoffer?dt_to=' . date('Y-m-d')) : '#'; ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700">
                                        <?php echo ($userrole != 2) ? number_format($statestics['quickoffer'], 0) : 0; ?>
                                    </h3>
                                    <h6 class="text-bold-700">Quick Offer Sales - <?php echo PG_QUICK_OFFER; ?> </h6>
                                </div>
                                <div><i class="la la-hand-o-right primary font-large-2 float-right"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
-->
    </div>

</div>

<?php
include_once(APPPATH . 'views/includes/footer.php');
?>

<script type="text/javascript">
setTimeout(function() {
    location.reload();
}, 180000);
</script>