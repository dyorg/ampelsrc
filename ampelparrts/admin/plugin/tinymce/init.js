tinymce.init({
    force_br_newlines : true,
    force_p_newlines : false,
    forced_root_block : false,

	selector: "textarea", 
	theme: "modern", 
	//theme_advanced_font_sizes: "9px,10px,11px,12px,13px,14px,16px,18px,20px",
    fontsize_formats: "9px 10px 11px 12px 13px 14px 16px 18px 20px",
    font_formats: "AmpelParts Font=Roboto+Condensed",
	plugins: [ 
		"advlist autolink link image lists charmap print preview hr anchor pagebreak", 
		"searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking", 
		"table contextmenu directionality emoticons paste textcolor filemanager" 
	], 
	image_advtab: true, 
	toolbar: "undo redo | sizeselect | bold italic | fontselect |  fontsizeselect underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect forecolor backcolor | link unlink anchor | image | preview code"
});