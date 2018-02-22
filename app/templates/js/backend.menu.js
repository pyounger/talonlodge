/* 
	Menu
*/
$('ul.sf-menu').supersubs({ 
	minWidth:    12,   // minimum width of sub-menus in em units 
	maxWidth:    27,   // maximum width of sub-menus in em units 
	extraWidth:  1     // extra width can ensure lines dont sometimes turn over 
                               // due to slight rounding differences and font-family 
        }).superfish({
		delay:		100,                            
		animation:	{
			opacity:'show',
			height:'show'
		},  
      		speed:		100                          				
}).find('ul').bgIframe();

