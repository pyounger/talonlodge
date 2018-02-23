/***********************
* Special addons for CPF
************************/

$.validator.addMethod(
        "regexp",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "Please check your input."
);


$.validator.addMethod(
        "fck_not_empty",
        function(value, element, frameId) {
			return (FCKeditorAPI.GetInstance(element.id).GetHTML() != '');
        },
        "Please check your input."
);

$.validator.addMethod(
        "ck_not_empty",
        function(value, element, frameId) {
			var el = $(element).attr('name');
			var text = CKEDITOR.instances[el].getData().replace( /<[^<|>]+?>/gi,'' );
			return (text != '' && text != '\n' );
        },
        "Please check your input."
);


$.validator.addMethod(
		"notEqual", 
		function(value, element, param) {
			return this.optional(element) || value != param;
		}, 
		"Please specify a different (non-default) value"
);

$.validator.addMethod(
		"exactlength", 
		function(value, element, param) {
			return this.optional(element) || value.length == param;
		}, 
		"Please specify an exact value length"
);