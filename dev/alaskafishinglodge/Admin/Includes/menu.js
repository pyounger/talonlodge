// JavaScript Document
var myMenu = "";
function GetString(strMenuString)
{
    //alert("hi");
    myMenu = strMenuString;
	cmDraw ('myMenuID', myMenu, 'hbr', cmThemeOffice, 'ThemeOffice');
}
//		[
//			[null,'Home','desktop.aspx',null,'Control Panel'],
//			_cmSplit,
//			[null,'Site',null,null,'Site Management',
//				['<img src="images/ThemeOffice/preview.png" alt="" />', 'Preview', null, null, 'Preview',
//					['<img src="images/ThemeOffice/preview.png" alt="" />','In New Window','../../../index.html','_blank','Website Homepage'],
//					['<img src="images/ThemeOffice/preview.png" alt="" />','Inline','inlineview.aspx',null,'Inline View of Website Homepage'],
//				],
//			],

//			_cmSplit,
//			[null,'Manage',null,null,'Module Management',
//				['<img src="images/ThemeOffice/users_add.png" alt="" />', 'Manage Users', null, null, 'Manage Users',
//					['<img src="images/ThemeOffice/add_section.png" alt="" />','Add New','addedituser.aspx',null,'Add/Edit Users'],
//					['<img src="images/ThemeOffice/content.png" alt="" />','View Listing','listusers.aspx',null,'Manage Users']
//				],
//				['<img src="images/ThemeOffice/messaging_config.png" alt="" />', 'Manage Cities', null, null, 'Manage Cities',
//				['<img src="images/ThemeOffice/add_section.png" alt="" />','Add Cities','addeditcity.aspx',null,'Add Cities'],										
//					['<img src="images/ThemeOffice/content.png" alt="" />','List Cities','listcities.aspx',null,'List Cities']					
//				],				
//				['<img src="images/ThemeOffice/messaging_config.png" alt="" />', 'Manage Events', null, null, 'Manage Events',
//				['<img src="images/ThemeOffice/add_section.png" alt="" />','Add Events','addeditevents.aspx',null,'Add Events'],										
//					['<img src="images/ThemeOffice/content.png" alt="" />','List Events','listevents.aspx',null,'List Events']					
//				],
////				['<img src="images/ThemeOffice/messaging_config.png" alt="" />', 'Manage Event Guest', null, null, 'Manage Event Guest',										
////					['<img src="images/ThemeOffice/content.png" alt="" />','List Event Guest','listeventguest.aspx',null,'List Event Guest']					
////				],
//				['<img src="images/ThemeOffice/messaging_config.png" alt="" />', 'Manage Parameters', null, null, 'Manage Parameters',
//				['<img src="images/ThemeOffice/add_section.png" alt="" />','Add Parameters','addeditparameter.aspx',null,'Add Parameters'],										
//					['<img src="images/ThemeOffice/content.png" alt="" />','List Parameters','listparameter.aspx',null,'List Parameters']					
//				],
//				['<img src="images/ThemeOffice/messaging_config.png" alt="" />', 'Manage Venues', null, null, 'Manage Venues',
//				['<img src="images/ThemeOffice/add_section.png" alt="" />','Add New','addeditvenue.aspx',null,'Add Venue'],
//					['<img src="images/ThemeOffice/content.png" alt="" />','List Venues','listvenue.aspx',null,'List Venues']					
//				],				
////				['<img src="images/ThemeOffice/messaging_config.png" alt="" />', 'Manage Late Night Activities', null, null, 'Manage Late Night Activities',
////				['<img src="images/ThemeOffice/add_section.png" alt="" />','Add Late Night Activities','addeditactivities.aspx',null,'Add Late Night Activities'],										
////					['<img src="images/ThemeOffice/content.png" alt="" />','List Late Night Activities','listactivities.aspx',null,'List Late Night Activities']					
////				],
//				['<img src="images/ThemeOffice/users_add.png" alt="" />', 'Manage Members', null, null, 'Manage Members',
//					['<img src="images/ThemeOffice/add_section.png" alt="" />','Add New','addeditmembers.aspx',null,'Add Members'],
//					['<img src="images/ThemeOffice/content.png" alt="" />','View Listing','listmembers.aspx',null,'View Listing']
//				],
//				['<img src="images/ThemeOffice/messaging_config.png" alt="" />', 'Manage Plooser Rating', null, null, 'Manage Plooser Rating',										
//					['<img src="images/ThemeOffice/content.png" alt="" />','List Plooser Rating','listrating.aspx?mode=m',null,'List Plooser Rating']					
//				],
//				['<img src="images/ThemeOffice/messaging_config.png" alt="" />', 'Manage Affiliate Advertiser', null, null, 'Manage Affiliate Advertiser',
//				['<img src="images/ThemeOffice/add_section.png" alt="" />','Add Affiliate Advertiser','addupdateaffilate.aspx',null,'Add Affiliate Advertiser'],										
//					['<img src="images/ThemeOffice/content.png" alt="" />','List Affiliate Advertiser','listaffilate.aspx',null,'List Affiliate Advertiser']					
//				],
//				['<img src="images/ThemeOffice/messaging_config.png" alt="" />', 'Manage Static Pages', null, null, 'Manage Static Pages',										
//					['<img src="images/ThemeOffice/content.png" alt="" />','List Static Pages','listdynamicpages.aspx',null,'List Static Pages']					
//				],
//				['<img src="images/ThemeOffice/messaging_config.png" alt="" />', 'Manage Uploaded Music', null, null, 'Manage Uploaded Music',										
//					['<img src="images/ThemeOffice/content.png" alt="" />','List Uploaded Music','listuploadedmusic.aspx',null,'List Uploaded Music']					
//				],
//				['<img src="images/ThemeOffice/messaging_config.png" alt="" />', 'Manage Forums', null, null, 'Manage Forums',
//				    ['<img src="images/ThemeOffice/content.png" alt="" />','List Categories','listforumcategory.aspx',null,'List categories'],
//					['<img src="images/ThemeOffice/add_section.png" alt="" />','Add Forums','addeditforum.aspx',null,'Add/Edit Forums'],
//					['<img src="images/ThemeOffice/content.png" alt="" />','List Forums','listforum.aspx',null,'List Forums']
//				],
//				['<img src="images/ThemeOffice/messaging_config.png" alt="" />', 'Manage Threads', null, null, 'Manage Threads',										
//					['<img src="images/ThemeOffice/content.png" alt="" />','List Threads','listthreads.aspx',null,'List Threads']					
//				],
//				['<img src="images/ThemeOffice/messaging_config.png" alt="" />', 'Manage Posts', null, null, 'Manage Posts',										
//					['<img src="images/ThemeOffice/content.png" alt="" />','List Posts','listposts.aspx',null,'List Posts']					
//				],
//				['<img src="images/ThemeOffice/messaging_config.png" alt="" />', 'Manage Contact Us', null, null, 'Manage Contact Us',										
//					['<img src="images/ThemeOffice/content.png" alt="" />','Contact Us listing','contactuslisting.aspx',null,'Contact Us listing']					
//				],
//				['<img src="images/ThemeOffice/messaging_config.png" alt="" />', 'Manage Uploaded Photos', null, null, 'Manage Uploaded Photos',										
//					['<img src="images/ThemeOffice/content.png" alt="" />','List Uploaded Photos','listvenuephotos.aspx',null,'List Uploaded Photos']					
//				],
//				['<img src="images/ThemeOffice/messaging_config.png" alt="" />', 'Manage Page Access Rights', null, null, 'Manage Page Access Rights',										
//					['<img src="images/ThemeOffice/content.png" alt="" />','Manage Access Rights','addupdaterights.aspx',null,'Manage Access Rights']					
//				],
//				['<img src="images/ThemeOffice/messaging_config.png" alt="" />', 'Manage News', null, null, 'Manage News',
//				['<img src="images/ThemeOffice/add_section.png" alt="" />','Add News','addeditnews.aspx',null,'Add News'],										
//					['<img src="images/ThemeOffice/content.png" alt="" />','List News','listnews.aspx',null,'List News']					
//				],	
//				['<img src="images/ThemeOffice/messaging_config.png" alt="" />', 'Manage Drink Recipe', null, null, 'Manage Drink Recipe',
//				['<img src="images/ThemeOffice/add_section.png" alt="" />','Add Story','addeditstories.aspx',null,'Add Story'],										
//					['<img src="images/ThemeOffice/content.png" alt="" />','List Drink Recipe','liststories.aspx',null,'List Drink Recipe']	,
//					['<img src="images/ThemeOffice/content.png" alt="" />','View Drink Recipe Comments','liststrorycomments.aspx',null,'View Drink Recipe Comments']					
//				],				
//			],
////			_cmSplit,
////			[null,'Help','emptypage.aspx',null,null]
//		];
