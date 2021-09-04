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
            <!-- Begin Mailchimp Signup Form -->
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; width:100%;}
	/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
<form action="https://nexuswildskincare.us6.list-manage.com/subscribe/post?u=b3605e000995434f3fdb778bf&amp;id=26ee665e74" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	<label for="mce-EMAIL">Subscribe</label>
	<input type="email" value="" name="EMAIL" class="email p-2" id="mce-EMAIL" placeholder="Enter Email Address" required>
    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_b3605e000995434f3fdb778bf_26ee665e74" tabindex="-1" value=""></div>
    <div class="clear mt-2"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button text-white"></div>
    </div>
</form>
</div>

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
