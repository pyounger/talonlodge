(function(){
 var a= {
  exec:function(editor){
   var format = {
    element : "h3"
   };
   var style = new CKEDITOR.style(format);
   style.apply(editor.document);
  }
 },

 b="button-h3";
 CKEDITOR.plugins.add(b,{
  init:function(editor){
   editor.addCommand(b,a);
   editor.ui.addButton("button-h3",{
    label:"H3",
    icon: this.path + "button-h3.png",
    command:b
   });
  }
 });
})();