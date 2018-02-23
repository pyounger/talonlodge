/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	config.uiColor = '#E2E2E2';
	config.toolbar = 'Kupon';
	config.toolbar_Kupon =
	[
		['Format','FontSize', 'TextColor', 'Bold','Italic','Underline'],
		['NumberedList','BulletedList'],
		['Link','Unlink','Anchor'],
		['Table', 'SpecialChar'],['RemoveFormat', 'Maximize', 'ShowBlocks','Source']
	];
	config.toolbar_Details =
	[
		['Format','FontSize','Bold','Strike','Italic','Underline', 'JustifyLeft','JustifyCenter','JustifyRight'],
		['button-h2','button-h3','button-p'],
		['NumberedList','BulletedList'],
		['Link','Unlink'],
		['Templates', 'Table', 'SpecialChar'],['PasteFromWord', 'RemoveFormat', 'Maximize', 'ShowBlocks', 'Source']
	];
	config.toolbar_Kupond =
	[
		['Format','FontSize','Bold','Strike','Italic','Underline', 'JustifyLeft','JustifyCenter','JustifyRight'],
		['button-h2','button-h3','button-p'],
		['NumberedList','BulletedList'],
		['Link','Unlink'],
		['Templates', 'Table', 'SpecialChar'],['PasteFromWord', 'RemoveFormat', 'Maximize', 'ShowBlocks', 'Source']
	];
	
	config.forcePasteAsPlainText = true;
	config.format_tags = 'h1;h2;h3;h4;p';
	config.extraPlugins = 'button-h2,button-p,button-h3';
};
