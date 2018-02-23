{*
	Validator using JQuery validate

	@param string $form Form JQuery selector
	@param string $rules Rules in JQuery validate format
*}
{function name='cpf_validator'}
		$({if !$form}'#cpf-page-form'{else}'{$form}'{/if}).validate(
		{
			wrapper: 'div',
			{$rules}
		});
{/function}