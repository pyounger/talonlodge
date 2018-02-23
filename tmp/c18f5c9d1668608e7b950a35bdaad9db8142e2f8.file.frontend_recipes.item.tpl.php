<?php /* Smarty version Smarty-3.0.8, created on 2017-11-01 12:05:36
         compiled from "/home2/talonlod/public_html/app/templates/frontend_recipes.item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20756298359fa291071f220-83875592%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c18f5c9d1668608e7b950a35bdaad9db8142e2f8' => 
    array (
      0 => '/home2/talonlod/public_html/app/templates/frontend_recipes.item.tpl',
      1 => 1508274585,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20756298359fa291071f220-83875592',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<style>
	.b-subgallery
	{
		background: linear-gradient(to bottom,rgba(255,255,255,0) 0%,rgba(255,255,255,0.3) 18%,rgba(255,255,255,.8) 67%,rgba(255,255,255,.9) 80%,rgba(255,255,255,1) 100%) !important;
}

	
</style>

<?php if ($_smarty_tpl->getVariable('for_pdf')->value){?>
	<div class="h-recipe-pdf">
		<img src="/<?php echo cpf_config('APP.RECIPES.URL');?>
<?php echo $_smarty_tpl->getVariable('recipe')->value->filename_thumb;?>
" width="100%" alt="<?php echo $_smarty_tpl->getVariable('recipe')->value->title;?>
" />
		<h1><?php echo $_smarty_tpl->getVariable('recipe')->value->title;?>
</h1>
		<table width="100%" class="xh">
			<tr>
				<td width="33%">
					<?php if ($_smarty_tpl->getVariable('recipe')->value->serves){?>
						<p>SERVES <span><?php echo $_smarty_tpl->getVariable('recipe')->value->serves;?>
</span></p>
					<?php }?>
				</td>
				<td width="33%">
					<?php if ($_smarty_tpl->getVariable('recipe')->value->prep_time!=''){?>
						<p>PREP TIME <span><?php echo $_smarty_tpl->getVariable('recipe')->value->prep_time;?>
</span></p>
					<?php }?>
				</td>
				<td width="33%">
					<?php if ($_smarty_tpl->getVariable('recipe')->value->cook_time!=''){?>
						<p>COOK TIME <span><?php echo $_smarty_tpl->getVariable('recipe')->value->cook_time;?>
</span></p>
					<?php }?>
				</td>
			</tr>
		</table>

		<table width="100%" class="yh">
			<tr>
				<td width="50%" valign="top">
					<?php if ($_smarty_tpl->getVariable('recipe')->value->ingredients){?>
						<h4>Ingredients</h4>
						<?php echo $_smarty_tpl->getVariable('recipe')->value->ingredients;?>

					<?php }?>
				</td>
				<td width="50%" valign="top">
					<?php if ($_smarty_tpl->getVariable('recipe')->value->directions){?>
						<h4>Directions</h4>
						<?php echo $_smarty_tpl->getVariable('recipe')->value->directions;?>

					<?php }?>
				</td>
			</tr>
			<?php if ($_smarty_tpl->getVariable('recipe')->value->nutritional){?>
			<tr>
				<td valign="top">
					<h4>Nutritional Information</h4>
					<?php echo $_smarty_tpl->getVariable('recipe')->value->nutritional;?>

				</td>
				<td></td>
			</tr>
			<?php }?>
		</table>
	</div>
<?php }else{ ?>
	<div class="h-recipe-view-wrapper h-faq-wrapper l-center">
		<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_recipes'),$_smarty_tpl);?>
" class="recipe-back">&larr;&nbsp;Back to recipe finder</a>
		<h1><?php echo $_smarty_tpl->getVariable('recipe')->value->title;?>
</h1>
		<div class="b-recipe__info">
			<?php if ($_smarty_tpl->getVariable('recipe')->value->serves){?>
			<div class="b-recipe__info-i">
				<p>SERVES <span><?php echo $_smarty_tpl->getVariable('recipe')->value->serves;?>
</span></p>
			</div>
			<?php }?>
			<?php if ($_smarty_tpl->getVariable('recipe')->value->prep_time!=''){?>
			<div class="b-recipe__info-i">
				<p>PREP TIME <span><?php echo $_smarty_tpl->getVariable('recipe')->value->prep_time;?>
</span></p>
			</div>
			<?php }?>
			<?php if ($_smarty_tpl->getVariable('recipe')->value->cook_time!=''){?>
			<div class="b-recipe__info-i">
				<p>COOK TIME <span><?php echo $_smarty_tpl->getVariable('recipe')->value->cook_time;?>
</span></p>
			</div>
			<?php }?>
		</div>

		<div class="h-faq-container">
			<div class="b-faq-l">
				<div class="b-recipe__l-i">
					<?php if ($_smarty_tpl->getVariable('recipe')->value->ingredients){?>
						<h4>Ingredients</h4>
						<?php echo $_smarty_tpl->getVariable('recipe')->value->ingredients;?>

					<?php }?>
				</div>

				 <div class="b-recipe__l-i">
					<?php if ($_smarty_tpl->getVariable('recipe')->value->nutritional){?>
						<h4>Nutritional Information</h4>
						<?php echo $_smarty_tpl->getVariable('recipe')->value->nutritional;?>

					<?php }?>
				</div>
			</div>
			<div class="b-faq-r">
				<div class="b-recipe__r-i">
					<?php if ($_smarty_tpl->getVariable('recipe')->value->directions){?>
						<h4>Directions</h4>
						<?php echo $_smarty_tpl->getVariable('recipe')->value->directions;?>

					<?php }?>
				</div>

				<div class="b-recipe__r-i last">
					<?php if ($_smarty_tpl->getVariable('another_recipe')->value){?>
					<h4>You'll also love</h4>
					<div class="b-recipe__i last">
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_recipes_view','id'=>$_smarty_tpl->getVariable('another_recipe')->value->id,'slug'=>$_smarty_tpl->getVariable('another_recipe')->value->slug),$_smarty_tpl);?>
">
							<table class="bordered-table">
								<tr>
									<td class="corners blt">&nbsp;</td>
									<td class="top-bottom bt">&nbsp;</td>
									<td class="corners brt">&nbsp;</td>
								</tr>
								<tr class="img">
									<td class="left-right bl">&nbsp;</td>
									<td class="bc"><img src="/<?php echo cpf_config('APP.RECIPES.URL');?>
<?php echo $_smarty_tpl->getVariable('another_recipe')->value->filename_thumb;?>
" width="300" height="168" alt="<?php echo $_smarty_tpl->getVariable('another_recipe')->value->title;?>
" /></td>
									<td class="left-right br">&nbsp;</td>
								</tr>
								<tr>
									<td class="corners blb">&nbsp;</td>
									<td class="top-bottom bb">&nbsp;</td>
									<td class="corners brb">&nbsp;</td>
								</tr>
							</table>
							<span><?php echo $_smarty_tpl->getVariable('another_recipe')->value->title;?>
</span>
						</a>
					</div>
					<?php }?>
				</div>
			</div>
			<div class="b-spiral"></div>
			<div class="b-ways-to-share">
				<h4>Ways to Share</h4>
				<div class="b-share-list">
					<div class="b-print">
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['link'][0][0]->link(array('rule'=>'frontend_recipes_view','id'=>$_smarty_tpl->getVariable('recipe')->value->id,'slug'=>$_smarty_tpl->getVariable('recipe')->value->slug),$_smarty_tpl);?>
?print">Print</a>
					</div>
					<div class="b-recipe-social">
						<ul>
							<li class="sm">Social Media</li>
							<li><a target="_blank" href="mailto:?subject=<?php echo $_smarty_tpl->getVariable('recipe')->value->title;?>
&amp;body=Check out this site <?php echo $_smarty_tpl->getVariable('cpf_root_url')->value;?>
<?php echo $_smarty_tpl->getVariable('cpf_url_current')->value;?>
" class="email"></a></li>
							<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $_smarty_tpl->getVariable('cpf_root_url')->value;?>
<?php echo $_smarty_tpl->getVariable('cpf_url_current')->value;?>
" class="fb"></a></li>
							<li><a target="_blank" href="https://twitter.com/home?status=<?php echo $_smarty_tpl->getVariable('recipe')->value->title;?>
 on <?php echo $_smarty_tpl->getVariable('cpf_root_url')->value;?>
<?php echo $_smarty_tpl->getVariable('cpf_url_current')->value;?>
" class="tw"></a></li>
							<li><a target="_blank" href="https://plus.google.com/share?url=<?php echo $_smarty_tpl->getVariable('cpf_root_url')->value;?>
<?php echo $_smarty_tpl->getVariable('cpf_url_current')->value;?>
" class="gp"></a></li>
							<li><a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo $_smarty_tpl->getVariable('cpf_root_url')->value;?>
<?php echo $_smarty_tpl->getVariable('cpf_url_current')->value;?>
&media=<?php echo $_smarty_tpl->getVariable('cpf_root_url')->value;?>
<?php echo cpf_config('APP.RECIPES.URL');?>
<?php echo $_smarty_tpl->getVariable('recipe')->value->filename_thumb;?>
&description=<?php echo $_smarty_tpl->getVariable('recipe')->value->title;?>
" class="p"></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".b-top__gradient").css('display', 'none');
			});
		</script>
<?php }?>