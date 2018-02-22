<!-- {if $cpf_errors}
<div class="errors msg error cpf-errors">
	<ul>
	{foreach $cpf_errors as $error}
		<li>{$error}</li>
	{/foreach}
	</ul>
</div>
{/if} -->

<style type="text/css">
	
	.b-contacts-error {
	    padding: 38px 0 0 0 !important;
	    font-size: 1.8em !important;
	    color: red;
	}

</style>
{if $cpf_errors}

	{foreach $cpf_errors as $error}

		<p class="b-contacts-error">{$error}</p>

	{/foreach}

{/if}