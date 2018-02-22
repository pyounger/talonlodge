{*
	Display of server side validation errors
*}
{if $cpf_errors}
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">&times;</a>
		{foreach $cpf_errors as $error}
			<p>{$error}</p>
		{/foreach}
	</div>
	<script type="text/javascript">
	/*<![CDATA[*/
	$(function(){
		$(".alert-message").alert()
	});
	/* ]]>*/
	</script>

{/if}
