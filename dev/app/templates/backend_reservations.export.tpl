First Name, Last Name, Email Address
{foreach $cpf_entities as $item}{$item->first_name},{$item->last_name},{$item->email};
{/foreach}