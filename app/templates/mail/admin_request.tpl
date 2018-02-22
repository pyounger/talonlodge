{assign var="cpf_root_url" value=cpf_link('frontend_index', ['abs' => true])}
	<table style="width: 600px; margin: 0px auto; border-collapse: collapse; padding: 0; text-align: left; border: 0;" width="600" cellpadding="0" cellspacing="0" border="0">
	<!-- header -->
		<tr>
			<td style="width: 600px; margin: 0; padding: 0; line-height: 0;">
				<table style="border-collapse: collapse; padding: 0; border: 0;" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td style="padding: 0; margin: 0; height: 5px; line-height: 0;"><img src="{$cpf_root_url}static/images/mail/header-top.png" height="5" width="600" border="0" alt=""/></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td style="width: 600px; margin: 0; padding: 0; line-height: 0;">
				<table style="border-collapse: collapse; padding: 0; border: 0;" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td style="height: 69px; width: 460px; margin 0; padding: 0; line-height: 0;" width="460"><a href="http://talonlodge.com"><img src="{$cpf_root_url}static/images/mail/logo.png" width="460" height="69" border="0" alt=""/></a></td>
						<td align="center" style="height: 69px; width: 72px; margin 0; padding: 0; line-height: 0;" width="70"><a href="http://twitter.com/talonlodge"><img src="{$cpf_root_url}static/images/mail/twitter.png" width="72" height="69" border="0" alt=""/></a></td>
						<td style="height: 69px; width: 71px; margin 0; padding: 0; line-height: 0;" width="70"><a href="http://www.facebook.com/TalonLodge?ref=ts"><img src="{$cpf_root_url}static/images/mail/facebook.png" width="68" height="69" border="0" alt=""/></a></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td style="width: 600px; margin: 0; padding: 0; line-height: 0;">
				<table style="border-collapse: collapse; padding: 0; border: 0;" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td style="height: 5px; margin 0; padding: 0; line-height: 0;"><img src="{$cpf_root_url}static/images/mail/header-bottom.png" height="5" width="600" border="0" alt=""/></td>
					</tr>
				</table>
			</td>
		</tr>
	<!-- /header -->
	<!-- content -->
		<tr>
			<td style="width: 600px; margin: 0; padding: 0; line-height: 0;">
				<p style="line-height: 1.5em; font-family: Times New Roman; font-size: 18px;">Name: {$message->first_name} {$message->last_name}</p>
				<p style="line-height: 1.5em; font-family: Times New Roman; font-size: 18px;">Email: {$message->email}</p>
				{if $message->message}<p style="line-height: 1.5em; font-family: Times New Roman; font-size: 18px;">Message: {$message->message}</p>{/if}
			</td>
		</tr>
		<!-- /content -->
	</table>

</body>
</html>