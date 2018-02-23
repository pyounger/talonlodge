{*
	Validator using JQuery validate
	
	@param 	string 	$form 	Form JQuery selector
	@param 	string 	$rules 	Rules in JQuery validate format
*}
{function name='cpf_validator'}
    {if !$noscript}
	<script type="text/javascript">
	$().ready(function() {
    {/if}
		$({if !$form}'#cpf-page-form'{else}'{$form}'{/if}).validate(
		{
            highlight: function(element) {
                $(element).addClass('error');
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function(element) {
                $(element).removeClass('error');
                $(element).parents('.control-group').removeClass('error');
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('help-inline');
                error.appendTo( element.parent() );
            },
			{$rules}
		});
    {if !$noscript}
	});
	</script>
    {/if}
{/function}