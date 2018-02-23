{extends file='layouts/frontend.tpl'}



{block name='description'}{/block}

{block name='keywords'}{/block}

{block name='title'}{/block}



{block name='content'}

<style type="text/css">
    
    /*.........added for popup(Parvez)......*/
    .controller-frontend_contacts #fancy_div {
        padding: 20px 0 !important;
        text-align: center;
        position: relative;
        height: auto !important;
    }

</style>

<div class="h-contactus-wrapper l-center">

    <div class="b-contactus-l">

        <h1 class="baltica-plain">Contact Us</h1>

        <ul class="b-contactus-list">

            <li><span>Talon Lodge & Spa</span></li>

            <li><span>Toll Free:</span> 800 536 1864</li>

            <li><span>Email:</span> info@talonlodge.com</li>

            <li>P.O. Box 6506, Sitka, AK, 99835, US</li>

        </ul>

    </div>

    <div class="b-contactus-r">

        <form action="{link rule='frontend_contacts'}" method="post" id="cpf-page-form">

            <div class="b-contactus-form-l">

                <div class="b-brochure-input-r">

                    <div class="b-brochure-input-l">

                        <input type="text" id="first_name" name="first_name" maxlength="255" value="{$first_name}" />

                    </div>

                </div>

                <div class="b-brochure-input-r">

                    <div class="b-brochure-input-l">

                        <input type="text" id="last_name" name="last_name" maxlength="255" value="{$last_name}" />

                    </div>

                </div>

                <div class="b-brochure-input-r">

                    <div class="b-brochure-input-l">

                        <input type="text" id="email" name="email" maxlength="255" value="{$email}" />

                    </div>

                </div>

                <div class="b-captcha">

                    <div class="b-brochure-input-r">

                        <div class="b-brochure-input-l">

                            <input type="text" id="captcha" name="captcha" maxlength="255" />

                        </div>

                    </div>

                    <div class="b-captcha-img">

                        <img id="captcha-img" src="{link rule='frontend_captcha' rand=time()}" width="95" height="42" alt=""/>

                        <a id="captcha-reload" href="#">

                            <img src="static/images/frontend/contactus/refresh.png" width="16" height="17" alt=""/>

                        </a>

                    </div>

                </div>

            </div>

            <div class="b-contactus-form-r">

                <textarea id="message" name="message">{$message}</textarea>

                <button type="submit"></button>

            </div>

        </form>

    </div>

	

	<div id="thx" style="display: none">

        <p>Your message has been sent</p>

    </div>

	<a href="#thx" class="thx"></a>

	

</div>



<script type="text/javascript">

    $(document).ready(function($)

    {

        // feedback

        $('#first_name').compactform({ text: 'First Name: *'});

        $('#last_name').compactform({ text: 'Last Name: *'});

        $('#email').compactform({ text: 'Email: *'});

        $('#captcha').compactform({ text: 'Enter Anti-Spam Code:'});

        $('#message').compactform({ text: 'Question/Message:'});



        $('#captcha-reload').click(function(){

            $('#captcha-img').attr('src', '{link rule='frontend_captcha' rand=0}?' + new Date().getTime());

            return false;

        });

		

		$("a.thx").fancybox({

			"padding" : 0,

			"imageScale" : false,

			"zoomOpacity" : false,

			"zoomSpeedIn" : 1000,

			"zoomSpeedOut" : 1000,

			"zoomSpeedChange" : 1000,

			"frameWidth" : 400,

			"frameHeight" : 50,

			"overlayShow" : true,

			"overlayOpacity" : 0.8,

			"hideOnContentClick" :false,

			"centerOnScroll" : false

		});

		

		{if $success}

 			$('a.thx').trigger('click');

		{/if}

    });

</script>



{capture name='validation_rules'}

    rules:

    {

        first_name: { required: true },

        last_name: { required: true },

        email: {

            required: true,

            email: true

        },

        captcha: {

            required: true,

            digits: true

        },

        message: 'required'

    },

    messages:

    {

        first_name: '',

        last_name: '',

        email: {

            required: '',

            email: ''

        },

        captcha: {

            required: '',

            digits: ''

        },

        message: ''

    },

    highlight: function(element)

    {

        $(element).parents('.b-brochure-input-r').addClass('error');

        $(element).parents('.b-contactus-form-r').addClass('error');

    },

    unhighlight: function(element)

    {

        $(element).parents('.b-brochure-input-r').removeClass('error');

        $(element).parents('.b-contactus-form-r').removeClass('error');

    },

    focusInvalid: false,

    errorPlacement: function(error, element) {

        error.appendTo( );

    },

    invalidHandler: function()

    {

        $('#cpf-page-form input').each(function(){

            var cf = $(this).data('compactForm');

            if (cf)

            {

                cf.Refresh();

            }

        });

    },

    {/capture}

    {cpf_validator rules=$smarty.capture.validation_rules}

{/block}

