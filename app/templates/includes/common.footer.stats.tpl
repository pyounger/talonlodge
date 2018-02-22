{*
	Common footer with stats
*}

<!-- 
	Page generated in {$cpf_stat_generated_in|string_format:'%.2f'} seconds ({$cpf_stat_db_query_count} queries in {$cpf_stat_db_exec_time|string_format:'%.3f'} seconds)

	Memory used: {$cpf_stat_memory_usage|fsize_format} (peak value: {$cpf_stat_memory_peak_usage|fsize_format})

	Number of translated strings: {$cpf_stat_translations_count}
	{if $cpf_stat_cache_storage_name}Cache storage: {$cpf_stat_cache_storage_name} (get: {$cpf_stat_cache_get_count}, set: {$cpf_stat_cache_set_count}){/if}

-->
