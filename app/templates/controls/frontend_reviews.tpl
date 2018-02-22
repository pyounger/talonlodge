{assign var="ta" value=$control_frontend_reviews_tripadvisor}
{assign var="fb" value=$control_frontend_reviews_facebook}
{assign var="tw" value=$control_frontend_reviews_twitter}
{if $ta|@count > 0 || $fb|@count > 0 || $tw|@count > 0}
    <div class="h-content-text-inner-sidebar-quote-wrapper">
		<div class="tripadvicer_wrap">
        <div class="b-content-text-inner-sidebar-quote-t">
			<div class="review-list tripadvisor">
				<div class="b-quote-header"></div>
				{foreach $ta as $r}
					<div class="b-quote-separator"></div>
					<div class="b-quote-text ">
						— {$r->content|strip_tags|truncate:100:'...'}
					</div>
				{/foreach}
				<div class="h-quote-link" class="tipadvisor">
					<a href="http://www.tripadvisor.com/ShowUserReviews-g60966-d1553334-r124208168-Talon_Lodge_Spa-Sitka_Alaska.html">> See All Reviews</a>
				</div>
			</div>
			<div class="review-list facebook" style="display:none;">
				<div class="b-quote-header"></div>
				{foreach $fb as $r}
					<div class="b-quote-separator"></div>
					<div class="b-quote-text ">
						— {$r->content|strip_tags|truncate:100:'...'}
					</div>
				{/foreach}
				<div class="h-quote-link" class="facebook">
					<a href="http://www.facebook.com/TalonLodge?ref=ts">> See All Reviews</a>
				</div>
			</div>
			<div class="review-list twitter" style="display:none;">
				<div class="b-quote-header"></div>
				{foreach $tw as $r}
					<div class="b-quote-separator"></div>
					<div class="b-quote-text ">
						— {$r->content|strip_tags|truncate:100:'...'}
					</div>
				{/foreach}
				<div class="h-quote-link" class="twitter">
					<a href="http://twitter.com/talonlodge">> See All Reviews</a>
				</div>
			</div>
        </div>
		<div class="b-content-text-inner-sidebar-quote-b">
			<ul class="b-reviews-menu">
				{if $ta|@count > 0}
				<li><a rel="tripadvisor" href="#" class="active">TripAdvisor</a></li>
				{/if}
				{if $fb|@count > 0}
				<li class="separator">/</li>
				<li><a rel="facebook" href="#">Facebook</a></li>
				{/if}
				{if $tw|@count > 0}
				<li class="separator">/</li>
				<li><a rel="twitter" href="#">Twitter</a></li>
				{/if}
			</ul>
		</div>
        </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function(){
            var active = 'tripadvisor';
            $('.b-reviews-menu a').click(function(){
                $('.b-reviews-menu a').removeClass('active');
                $(this).addClass('active');
                var rel = $(this).attr('rel');
                $('.review-list.'+active).fadeOut(300, function(){
                    $('.review-list.'+rel).fadeIn(300, function(){
                        active = rel;
                    });
                });
                return false;
            });
        });
	</script>
{/if}