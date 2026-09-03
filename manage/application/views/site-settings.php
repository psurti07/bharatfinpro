<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("106").className += " active";
    document.getElementById("1060").className += " active";
}
</script>

<div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Site Settings</h1>
    </div>
</div>

<div class="content-body">
    <div class="row">
        <div class="col-md-6">
            <div class="card border">
                <div class="card-content collapse show">
                    <div class="card-body">
                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">SMS Sender id</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/updatesmssenderid', array('id' => 'filterForm3', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="smssenderid" type="text"
                                        class="input-sm form-control col-md-9" id="smssenderid"
                                        value="<?php echo $sitedetails['smssenderid']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>

                        <hr class="mb-2" />

                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Plan SMS Sender ID</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/updateplansmssenderid', array('id' => 'filterForm2', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="plansenderid" type="text"
                                        class="input-sm form-control col-md-9" id="plansenderid"
                                        value="<?php echo $sitedetails['plansmssenderid']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border">
                <div class="card-content collapse show">
                    <div class="card-body">
                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Facebook Domain Verification Id</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/updatefbdomain', array('id' => 'filterForm1', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="domainid" type="text"
                                        class="input-sm form-control col-md-9" id="domainid"
                                        value="<?php echo $sitedetails['fbdomainvalue']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>

                        <hr class="mb-2" />

                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Site Welcome Model</dt>
                            <dd class="col-md-9 col-12">
                                <span class="mr-2">
                                    <?php
									echo ($sitedetails['welcomemodel']->option_value == 1) ? "Show" : "Hide";
									?>
                                </span>
                                <a href="<?php echo site_url('site/modelstatus/' . $sitedetails['welcomemodel']->option_value); ?>"
                                    target="_self" class="btn btn-icon btn-outline-dark btn-sm"><i
                                        class="la la-rotate-left"></i></a>
                            </dd>
                        </dl>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border">
                <div class="card-content collapse show">
                    <div class="card-header">
                        <h3>Facebook - Digital</h3>
                    </div>
                    <div class="card-body">
                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Facebook Pixel Key</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/updatefbpixel', array('id' => 'filterForm2', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="pixelid" type="text"
                                        class="input-sm form-control col-md-9" id="pixelid"
                                        value="<?php echo $sitedetails['fbpixelvalue']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>

                        <hr class="mb-2" />

                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Facebook Access Token</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/updatefbaccesstoken', array('id' => 'filterForm2', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="fbaccesstoken" type="text"
                                        class="input-sm form-control col-md-9" id="fbaccesstoken"
                                        value="<?php echo $sitedetails['fbaccesstoken']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>

                        <hr class="mb-2" />

                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Facebook Event Name</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/updatefbeventname', array('id' => 'filterForm2', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="fbeventname" type="text"
                                        class="input-sm form-control col-md-9" id="fbeventname"
                                        value="<?php echo $sitedetails['fbeventname']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>

                        <hr class="mb-2" />

                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Facebook Event ID</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/updatefbeventid', array('id' => 'filterForm2', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="fbeventid" type="text"
                                        class="input-sm form-control col-md-9" id="fbeventid"
                                        value="<?php echo $sitedetails['fbeventid']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border">
                <div class="card-content collapse show">
                    <div class="card-header">
                        <h3>Facebook - Plan</h3>
                    </div>
                    <div class="card-body">
                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Facebook Pixel Key</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/updateplanfbpixel', array('id' => 'filterForm2', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="planpixelid" type="text"
                                        class="input-sm form-control col-md-9" id="planpixelid"
                                        value="<?php echo $sitedetails['planfbpixelvalue']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>

                        <hr class="mb-2" />

                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Facebook Access Token</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/updateplanfbaccesstoken', array('id' => 'filterForm2', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="planfbaccesstoken" type="text"
                                        class="input-sm form-control col-md-9" id="planfbaccesstoken"
                                        value="<?php echo $sitedetails['planfbaccesstoken']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>

                        <hr class="mb-2" />

                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Facebook Event Name</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/updateplanfbeventname', array('id' => 'filterForm2', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="planfbeventname" type="text"
                                        class="input-sm form-control col-md-9" id="planfbeventname"
                                        value="<?php echo $sitedetails['planfbeventname']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>

                        <hr class="mb-2" />

                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Facebook Event ID</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/updateplanfbeventid', array('id' => 'filterForm2', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="planfbeventid" type="text"
                                        class="input-sm form-control col-md-9" id="planfbeventid"
                                        value="<?php echo $sitedetails['planfbeventid']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border">
                <div class="card-content collapse show">
                    <div class="card-header">
                        <h3>Whatsapp - Digital</h3>
                    </div>
                    <div class="card-body">

                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Whatsapp Campaign - Remarketing</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/updatewpcampmain', array('id' => 'filterForm6', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="wpcampaignmain" type="text"
                                        class="input-sm form-control col-md-9" id="wpcampaignmain"
                                        value="<?php echo $sitedetails['wpcampaignmain']->option_value; ?>"
                                        aria-colspan="" style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>
                        <hr class="mb-2" />
                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Whatsapp Campaign - Get Offer</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/updatewpcampmainoffer', array('id' => 'filterForm7', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="wpcampaignoffer" type="text"
                                        class="input-sm form-control col-md-9" id="wpcampaignoffer"
                                        value="<?php echo $sitedetails['wpcampaignoffer']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>
                        <hr class="mb-2" />
                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Whatsapp Campaign - Payment Success</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/updatewpcampmainsuccess', array('id' => 'filterForm8', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="wpcampaignsuccess" type="text"
                                        class="input-sm form-control col-md-9" id="wpcampaignsuccess"
                                        value="<?php echo $sitedetails['wpcampaignsuccess']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border">
                <div class="card-content collapse show">
                    <div class="card-header">
                        <h3>Whatsapp - Plan</h3>
                    </div>
                    <div class="card-body">

                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Whatsapp Campaign - Remarketing</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/updatewpcampmainplan', array('id' => 'filterForm6', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="wpcampaignmainplan" type="text"
                                        class="input-sm form-control col-md-9" id="wpcampaignmainplan"
                                        value="<?php echo $sitedetails['wpcampaignmainplan']->option_value; ?>"
                                        aria-colspan="" style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>
                        <hr class="mb-2" />
                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Whatsapp Campaign - Get Offer</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/updatewpcampmainofferplan', array('id' => 'filterForm7', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="wpcampaignofferplan" type="text"
                                        class="input-sm form-control col-md-9" id="wpcampaignofferplan"
                                        value="<?php echo $sitedetails['wpcampaignofferplan']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>
                        <hr class="mb-2" />
                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Whatsapp Campaign - Payment Success</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/updatewpcampmainsuccessplan', array('id' => 'filterForm8', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="wpcampaignsuccessplan" type="text"
                                        class="input-sm form-control col-md-9" id="wpcampaignsuccessplan"
                                        value="<?php echo $sitedetails['wpcampaignsuccessplan']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border">
                <div class="card-content collapse show">
                    <div class="card-header">
                        <h3>Interekt - Digital</h3>
                    </div>
                    <div class="card-body">

                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Interekt Template - Get Offer</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/update_intkt_getoffer', array('id' => 'filterForm7', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="intkt_getoffer" type="text"
                                        class="input-sm form-control col-md-9" id="intkt_getoffer"
                                        value="<?php echo $sitedetails['intekt_get_offer_name']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>


                        <hr class="mb-2" />

                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Interekt Template - Remarketing</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/update_intktrm_offer', array('id' => 'filterForm6', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="intkt_rm_offer" type="text"
                                        class="input-sm form-control col-md-9" id="intkt_rm_offer"
                                        value="<?php echo $sitedetails['intekt_rm_offer_name']->option_value; ?>"
                                        aria-colspan="" style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>

                        <hr class="mb-2" />
                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Interekt Template - Username Password</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/update_intkt_usrpass', array('id' => 'filterForm8', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="intkt_user_password" type="text"
                                        class="input-sm form-control col-md-9" id="intkt_user_password"
                                        value="<?php echo $sitedetails['intkt_userwelcomename']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>

                        <hr class="mb-2" />
                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Interekt Template - Payment Success</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/update_intkt_payment_success', array('id' => 'filterForm8', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="intkt_payment_success" type="text"
                                        class="input-sm form-control col-md-9" id="intkt_payment_success"
                                        value="<?php echo $sitedetails['intkt_payment_success']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border">
                <div class="card-content collapse show">
                    <div class="card-header">
                        <h3>Interekt - Plan</h3>
                    </div>
                    <div class="card-body">

                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Interekt Template - Get Offer</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/update_intkt_getoffer_plan', array('id' => 'filterForm7', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="intkt_getoffer_plan" type="text"
                                        class="input-sm form-control col-md-9" id="intkt_getoffer_plan"
                                        value="<?php echo $sitedetails['intekt_get_offer_name_plan']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>


                        <hr class="mb-2" />

                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Interekt Template - Remarketing</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/update_intktrm_offer_plan', array('id' => 'filterForm6', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="intkt_rm_offer_plan" type="text"
                                        class="input-sm form-control col-md-9" id="intkt_rm_offer_plan"
                                        value="<?php echo $sitedetails['intekt_rm_offer_name_plan']->option_value; ?>"
                                        aria-colspan="" style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>

                        <hr class="mb-2" />
                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Interekt Template - Username Password</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/update_intkt_usrpass_plan', array('id' => 'filterForm8', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="intkt_user_password_plan" type="text"
                                        class="input-sm form-control col-md-9" id="intkt_user_password_plan"
                                        value="<?php echo $sitedetails['intkt_userwelcomename_plan']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>

                        <hr class="mb-2" />
                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Interekt Template - Payment Success</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/update_intkt_payment_success_plan', array('id' => 'filterForm8', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="intkt_payment_success_plan" type="text"
                                        class="input-sm form-control col-md-9" id="intkt_payment_success_plan"
                                        value="<?php echo $sitedetails['intkt_payment_success_plan']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <div class="card border-blue">
                <div class="card-content collapse show">
                    <div class="card-header">
                        <h3 class="mb-0 text-bold-600">Webinar - Facebook</h3>
                    </div>

                    <div class="card-body">

                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Facebook Pixel Key - Webinar</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/updatefbpixelwebinar', array('id' => 'filterForm2', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="pixelidwebinar" type="text"
                                        class="input-sm form-control col-md-9" id="pixelid"
                                        value="<?php echo $sitedetails['fbpixelvaluewebinar']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>
                        <hr class="mb-2" />
                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Facebook Access Token - Webinar</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/updatefbaccesstokenwebinar', array('id' => 'filterForm2', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="fbaccesstokenwebinar" type="text"
                                        class="input-sm form-control col-md-9" id="fbaccesstokenwebinar"
                                        value="<?php echo $sitedetails['fbaccesstokenwebinar']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>

                        <hr class="mb-2" />

                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Facebook Event Name - Webinar</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/updatefbeventnamewebinar', array('id' => 'filterForm2', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="fbeventnamewebinar" type="text"
                                        class="input-sm form-control col-md-9" id="fbeventnamewebinar"
                                        value="<?php echo $sitedetails['fbeventnamewebinar']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>

                        <hr class="mb-2" />

                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Facebook Event ID - Webinar</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/updatefbeventidwebinar', array('id' => 'filterForm2', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="fbeventidwebinar" type="text"
                                        class="input-sm form-control col-md-9" id="fbeventidwebinar"
                                        value="<?php echo $sitedetails['fbeventidwebinar']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-12">
            <div class="card border-blue">
                <div class="card-content collapse show">
                    <div class="card-header">
                        <h3 class="mb-0 text-bold-600">Webinar - Whatsapp</h3>
                    </div>

                    <div class="card-body">
                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Whatsapp - Remarketing - webinar</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/updatewpcampaignwebinar', array('id' => 'filterForm6', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="wpcampaignwebinar" type="text"
                                        class="input-sm form-control col-md-9" id="wpcampaignwebinar"
                                        value="<?php echo $sitedetails['wpcampaignwebinar']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>

                        <hr class="mb-2" />

                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Whatsapp - Get Offer - webinar</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/updatewpcampaignofferwebinar', array('id' => 'filterForm7', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="wpcampaignofferwebinar" type="text"
                                        class="input-sm form-control col-md-9" id="wpcampaignofferwebinar"
                                        value="<?php echo $sitedetails['wpcampaignofferwebinar']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>

                        <hr class="mb-2" />

                        <dl class="row mb-0">
                            <dt class="col-md-3 col-12">Whatsapp - Payment Success - webinar</dt>
                            <dd class="col-md-9 col-12">
                                <?php echo form_open('site/updatewpcampaignsuccesswebinar', array('id' => 'filterForm8', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                                <span class="mr-2"><input name="wpcampaignsuccesswebinar" type="text"
                                        class="input-sm form-control col-md-9" id="wpcampaignsuccesswebinar"
                                        value="<?php echo $sitedetails['wpcampaignsuccesswebinar']->option_value; ?>"
                                        style="display: inline;" /></span>
                                <button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
                                <?php echo form_close(); ?>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
include_once(APPPATH . 'views/includes/footer.php');
?>