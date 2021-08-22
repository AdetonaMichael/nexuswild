<div class="col-md-4">
    <div class="sidebar">
        <div class="sidebar-section">
              <form action="" method="GET">
                <div class="input-group">
                    <div class="form-outline">
                      <input type="search" id="form1" name="search" placeholder="search" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
             </form>
            <h5><span>Newsletter</span></h5>
            <!-- Go to your Mailchimp account/Lists/Sign Up Forms/Embedded forms and replace the code below with your own  -->
            <!-- Begin MailChimp Signup Form -->
            <link href="https://cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
            <div id="mc_embed_signup">
                <form action="https://wowthemes.us11.list-manage.com/subscribe/post?u=8aeb20a530e124561927d3bd8&amp;id=8c3d2d214b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <div id="mc_embed_signup_scroll">
                        <h2>Sign up to get our weekly free guide to selling digital downloads</h2>
                        <div class="mc-field-group">
                            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="E-mail Address">
                        </div>
                        <div id="mce-responses" class="clear">
                            <div class="response" id="mce-error-response" style="display:none">
                            </div>
                            <div class="response" id="mce-success-response" style="display:none">
                            </div>
                        </div>
                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;" aria-hidden="true">
                            <input type="text" name="b_8aeb20a530e124561927d3bd8_8c3d2d214b" tabindex="-1" value="">
                        </div>
                        <div class="clear">
                            <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                        </div>
                    </div>
                </form>
            </div>
            <script type='text/javascript' src='https://s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
            <script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[3]='MMERGE3';ftypes[3]='text';fnames[1]='MMERGE1';ftypes[1]='text';fnames[2]='MMERGE2';ftypes[2]='text';fnames[4]='MMERGE4';ftypes[4]='text';fnames[5]='MMERGE5';ftypes[5]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
            <!--End mc_embed_signup-->
        </div>
        <div class="sidebar-section">
            <h5><span>Categories</span></h5>
            <ul style="list-none;">
                @foreach ($categories as $category )
                <li><a target="_blank" href="{{ route('blog.category', $category->id) }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="sidebar-section">
            <h5><span>May Like</span></h5>
            <a href="https://www.whogohost.com/host/aff.php?aff=4244&page=hosting" target="_blank"><img src="https://www.whogohost.com/images/affiliates/unlimited-hosting-300-x-600.png" /></a>
        </div>
        <div class="sidebar-section">
            <h5><span>Tags</span></h5>
                @foreach ($tags as $tag )
                <a class="btn btn-dark p-2 m-2" target="_blank" href="{{ route('blog.tag',$tag->id) }}">{{ $tag->name }}</a>
                @endforeach
        </div>
        <div class="sidebar-section">
            <h5><span>Recommended</span></h5>
            <a href="https://easydigitaldownloads.com/?ref=2135" title="Sell digital downloads with WordPress, for free"><img src="https://easydigitaldownloads.com/wp-content/uploads/2015/02/300x250-2.png" alt="Sell digital downloads with WordPress, for free"/></a>
        </div>
    </div>
</div>