(function(){
 var a= {
  exec:function(editor){
   var format = {
    element : "h2"
   };
   var style = new CKEDITOR.style(format);
   style.apply(editor.document);
  }
 },

 b="button-h2";
 CKEDITOR.plugins.add(b,{
  init:function(editor){
   editor.addCommand(b,a);
   editor.ui.addButton("button-h2",{
    label:"H2",
    icon: this.path + "button-h2.png",
    command:b
   });
  }
 });
})();