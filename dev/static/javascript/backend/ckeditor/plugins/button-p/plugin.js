(function(){
 var a= {
  exec:function(editor){
   var format = {
    element : "p"
   };
   var style = new CKEDITOR.style(format);
   style.apply(editor.document);
  }
 },

 b="button-p";
 CKEDITOR.plugins.add(b,{
  init:function(editor){
   editor.addCommand(b,a);
   editor.ui.addButton("button-p",{
    label:"P",
    icon: this.path + "button-p.png",
    command:b
   });
  }
 });
})();