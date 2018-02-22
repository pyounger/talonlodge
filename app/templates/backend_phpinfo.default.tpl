{extends file='layouts/backend.tpl'} 

{block name='title'}
	{t}PHP information{/t}
{/block}

{block name='content_init'}
		{$cpf_breadcrumb=[
			[t('PHP information'), '']	
		]}
{/block}

{block name='content'}
	{$phpinfo}
{/block}
