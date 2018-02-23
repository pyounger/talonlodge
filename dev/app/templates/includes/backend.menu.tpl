{*

	Backend menu

    *}



    {if !$cpf_rights->is_guest()}

    <ul class="nav" style="float:right">

     <li><a href="{link rule='frontend_index'}">{t}Home{/t}</a></li>

     {*<li><a href="{link controller='backend_profile'}">{t}Profile{/t}</a></li>*}

     <li><a href="{link controller='backend_profile' action='logout'}" onclick="return confirm('{t}Are you sure that you want to logout?{/t}');">{t}Logout{/t}</a></li>

 </ul>				



 <ul class="nav">
    <li class="dropdown">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{t}Content{/t} <b class="caret"></b></a>

        <ul class="dropdown-menu">

            {if $cpf_rights->has_rights('backend_pages')}

            <li><a href="{link controller='backend_pages'}">{t}Pages{/t}</a></li>

            {/if}

            {if $cpf_rights->has_rights('backend_galleries')}

            <li><a href="{link controller='backend_galleries'}">{t}Galleries{/t}</a></li>

            {/if}

            {if $cpf_rights->has_rights('backend_gallerytypes')}

            <li><a href="{link controller='backend_gallerytypes'}">{t}Gallery Types{/t}</a></li>

            {/if}

            {if $cpf_rights->has_rights('backend_layouts')}

            <li><a href="{link controller='backend_layouts'}">{t}Layouts{/t}</a></li>

            {/if}

            {if $cpf_rights->has_rights('backend_templates')}

            <li><a href="{link controller='backend_templates'}">{t}Templates{/t}</a></li>

            {/if}

            {if $cpf_rights->has_rights('backend_emailtemplates')}

            <li><a href="{link controller='backend_emailtemplates'}">{t}Email Templates{/t}</a></li>

            {/if}

        </ul>

    </li>

    {if $cpf_rights->has_rights('backend_backend_navigation') || $cpf_rights->has_rights('backend_navigationelements')}

    <li{if $cpf_controller == 'backend_navigation' || $cpf_controller == 'backend_navigationelements'} class="active"{/if}><a href="{link controller='backend_navigation'}">Navigation</a></li>

    {/if}

    {if $cpf_rights->has_rights('backend_messages')}

    <li{if $cpf_controller == 'backend_messages'} class="active"{/if}><a href="{link controller='backend_messages'}">Messages</a></li>

    {/if}

    {if $cpf_rights->has_rights('backend_banners')}

    <li{if $cpf_controller == 'backend_banners'} class="active"{/if}><a href="{link controller='backend_banners'}">Banners</a></li>

    {/if}

    {if $cpf_rights->has_rights('backend_accomodation')}
    <li><a href="{link controller='backend_accomodation'}">Accomodations</a></li>
    {/if}
    {if $cpf_rights->has_rights('backend_demos')}
    <li><a href="{link controller='backend_demos'}">Demo</a></li>
    {/if}

    {if $cpf_rights->has_rights('backend_recipes')}

    <li{if $cpf_controller == 'backend_recipes' || $cpf_controller == 'backend_recipes'} class="active"{/if}><a href="{link controller='backend_recipes'}">Recipes</a></li>

    {/if}

     {if $cpf_rights->has_rights('backend_testings')}

    <li{if $cpf_controller == 'backend_testings' || $cpf_controller == 'backend_testings'} class="active"{/if}><a href="{link controller='backend_testings'}">Testings</a></li>

    {/if}



    {if $cpf_rights->has_rights('backend_reviews') || $cpf_rights->has_rights('backend_facebook') || $cpf_rights->has_rights('backend_twitter')}

    <li class="dropdown{if $cpf_controller == 'backend_reviews' || $cpf_controller == 'backend_facebook' || $cpf_controller == 'backend_twitter'} active{/if}">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{t}Reviews{/t} <b class="caret"></b></a>

        <ul class="dropdown-menu">

            {if $cpf_rights->has_rights('backend_reviews')}

            <li><a href="{link controller='backend_reviews'}">TripAdvisor</a></li>

            {/if}

            {if $cpf_rights->has_rights('backend_facebook')}

            <li><a href="{link controller='backend_facebook'}">Facebook</a></li>

            {/if}

            {if $cpf_rights->has_rights('backend_twitter')}

            <li><a href="{link controller='backend_twitter'}">Twitter</a></li>

            {/if}

        </ul>

    </li>

    {/if}



    {if $cpf_rights->has_rights('backend_users')}

    <li class="dropdown">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{t}Authorization{/t} <b class="caret"></b></a>

        <ul class="dropdown-menu">

            {if $cpf_rights->has_rights('backend_users')}

            <li{if $cpf_controller == 'backend_users'} class="active"{/if}><a href="{link controller='backend_users'}">Users</a></li>

            {/if}

            {if $cpf_rights->has_rights('backend_groups')}

            <li{if $cpf_controller == 'backend_groups'} class="active"{/if}><a href="{link controller='backend_groups'}">Groups</a></li>

            {/if}

            {if $cpf_rights->has_rights('backend_rights')}

            <li{if $cpf_controller == 'backend_rights'} class="active"{/if}><a href="{link controller='backend_rights'}">Rights</a></li>

            {/if}

        </ul>

    </li>

    {/if}



    {if $cpf_rights->has_rights('backend_cache', 'flush')}

    <li class="dropdown">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{t}Service{/t} <b class="caret"></b></a>

        <ul class="dropdown-menu">

            {if $cpf_rights->has_rights('backend_cache', 'flush')}

            <li><a href="{link controller='backend_cache' action='flush'}" onclick="return confirm('{t}Are you sure that you want flush cached data?{/t}');">{t}Flush cache{/t}</a></li>

            {/if}

            {if $cpf_rights->has_rights('backend_phpinfo')}

            <li><a href="{link controller='backend_phpinfo'}">{t}PHP information{/t}</a></li>

            {/if}

            <li><a href="/generator.php" target="_blank"><i class="icon-refresh"></i> Refresh</a></li>

        </ul>

    </li>

    {/if}

</ul>

{/if}

