<div class="line"></div>

<section id="section-about" class="p-t-10 p-b-20">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <h4 class="text-uppercase">About Company</h4>
                <p>Being a sheer customer-oriented company, Bharatfinpro is one of the pioneers in the field of
                    super-quick online loan service provisions that has empowered its customers’ lives and continues to
                    serve its ever-expanding customer base. With unique and new-age loan-easing products like the
                    Membership Cards – Bharatfinpro has emerged as the most convenient and go-to online portal to apply
                    for Instant Personal and Business Loans. One of the key aspects that make Bharatfinpro popular
                    amongst loan seekers is the unconventional and solution-centred online facilitations through its
                    Membership Cards. Within minutes, a person can apply for Personal and Business Loans in multiple
                    banks from this platform itself. Bharatfinpro is driven by the objective of bringing positive
                    changes in people’s lives because when the financial requirements are met, people tend to live
                    freely with their heads held high – and Bharatfinpro takes pride in the same.</p>
            </div>

            <div class="col-md-4 col-sm-12">
                <h4 class="text-uppercase">Contact Us</h4>
                <address>
                    <strong>Registered Office Address:</strong>
                    <?php
          echo "<br/>" . COMPANY_ADDRESS;
          echo "<br/><i class='fa fa-phone-square m-r-5'></i>" . COMPANY_MOBILE;
          echo "<br/><i class='fa fa-envelope m-r-5'></i>" . COMPANY_EMAIL;
          echo "<br/><i class='fa fa-clock m-r-5'></i>" . COMPANY_TIMING;
          ?>
                </address>

                <div class="social-icons social-icons-colored social-icons-rounded float-left">
                    <ul>
                        <?php if (SM_GOOGLE != "#") { ?><li class="social-google"><a href="<?php echo SM_GOOGLE; ?>"
                                target="_blank" rel="nofollow"><i class="fab fa-google-plus-g"></i></a></li><?php } ?>

                        <?php if (SM_FACEBOOK != "#") { ?><li class="social-facebook"><a
                                href="<?php echo SM_FACEBOOK; ?>" target="_blank" rel="nofollow"><i
                                    class="fab fa-facebook-f"></i></a></li><?php } ?>

                        <?php if (SM_INSTAGRAM != "#") { ?><li class="social-instagram"><a
                                href="<?php echo SM_INSTAGRAM; ?>" target="_blank" rel="nofollow"><i
                                    class="fab fa-instagram"></i></a></li><?php } ?>

                        <?php if (SM_TWITTER != "#") { ?><li class="social-twitter"><a href="<?php echo SM_TWITTER; ?>"
                                target="_blank" rel="nofollow"><i class="fab fa-twitter"></i></a></li><?php } ?>

                        <?php if (SM_LINKEDIN != "#") { ?><li class="social-linkedin"><a
                                href="<?php echo SM_LINKEDIN; ?>" target="_blank" rel="nofollow"><i
                                    class="fab fa-linkedin"></i></a></li><?php } ?>

                        <?php if (SM_PINTEREST != "#") { ?><li class="social-pinterest"><a
                                href="<?php echo SM_PINTEREST; ?>" target="_blank" rel="nofollow"><i
                                    class="fab fa-pinterest"></i></a></li><?php } ?>

                        <?php if (SM_YOUTUBE != "#") { ?><li class="social-youtube"><a href="<?php echo SM_YOUTUBE; ?>"
                                target="_blank" rel="nofollow"><i class="fab fa-youtube"></i></a></li><?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>