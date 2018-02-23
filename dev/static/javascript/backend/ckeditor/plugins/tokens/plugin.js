CKEDITOR.plugins.add( 'tokens',
{   
   requires : ['richcombo'], //, 'styles' ],
   init : function( editor )
   {
      var config = editor.config,
         lang = editor.lang.format;

      // Gets the list of tags from the settings.
      var tags = []; //new Array();
      //this.add('value', 'drop_text', 'drop_label');
      tags[0]=["yellow", "Yellow", "Yellow"];
      tags[1]=["blue", "Blue", "Blue"];
      tags[2]=["green", "Green", "Green"];
      
      // Create style objects for all defined styles.

      editor.ui.addRichCombo( 'tokens',
         {
            label : "Table style",
            title :"Table style",
            voiceLabel : "Table style",
            className : 'cke_format',
            multiSelect : false,

            panel :
            {
               css : [ config.contentsCss, CKEDITOR.getUrl( editor.skinPath + 'editor.css' ) ],
               voiceLabel : lang.panelVoiceLabel
            },

            init : function()
            {
               this.startGroup( "Tokens" );
               //this.add('value', 'drop_text', 'drop_label');
               for (var this_tag in tags){
                  this.add(tags[this_tag][0], tags[this_tag][1], tags[this_tag][2]);
               }
            },

            onClick : function( value )
            {         
               editor.focus();
               editor.fire( 'saveSnapshot' );
               var n = editor.getSelection();
				if (CKEDITOR.env.ie) {
					mySelection.unlock(true);
					selectedText = mySelection.getNative().createRange().text;
				} else {
					selectedText = mySelection.getNative();
				}
				alert(selectedText);
               editor.fire( 'saveSnapshot' );
            }
         });
   }
});
