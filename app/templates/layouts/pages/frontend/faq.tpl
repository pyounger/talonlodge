<div class="h-faq-wrapper l-center">
    {$page->content['heading']}
	<div class="h-faq-container">
		<div class="b-faq-l">
            {$page->content['content']}
		</div>
		<div class="b-faq-r">
			<div class="b-round-button">
				<a href="{link rule='frontend_reservation'}">
					<em>Click Here to Make Reservation</em>
				</a>
			</div>
			
			<div class="b-faq-button-r">
				<a href="{link rule='frontend_reservation'}" class="b-faq-button-l">
					More Information
				</a>
			</div>
			<div class="b-social-buttons">
				{include file='includes/snippet-social.tpl'}
			</div>
		</div>
	</div>
</div>