tinyMCE.init({
	// General options
	mode : "textareas",
	theme : "advanced",
	plugins : "safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,imagemanager,filemanager",

	// Theme options
	theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
	theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
	theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
	theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : true,
	
	
	//add_action('admin_head', 'load_tiny_mce');
	
	// Example content CSS (should be your site CSS)
	content_css : "css/example.css",
	
	// Drop lists for link/image/media/template dialogs
	template_external_list_url : "js/template_list.js",
	external_link_list_url : "js/link_list.js",
	external_image_list_url : "js/image_list.js",
	media_external_list_url : "js/media_list.js"
});
/*
function load_tiny_mce() {
     // Google Web Fonts
     $theme_advanced_fonts = 'Aclonica=Aclonica, sans-serif;';
     $theme_advanced_fonts .= 'Michroma=Michroma, sans-serif;';
     $theme_advanced_fonts .= 'Paytone One=Paytone One, sans-serif;';

     // Default fonts for TinyMCE
     $theme_advanced_fonts .= 'Andale Mono=Andale Mono, Times;';
     $theme_advanced_fonts .= 'Arial=Arial, Helvetica, sans-serif;';
    $theme_advanced_fonts .= 'Arial Black=Arial Black, Avant Garde;';
    $theme_advanced_fonts .= 'Book Antiqua=Book Antiqua, Palatino;';
    $theme_advanced_fonts .= 'Comic Sans MS=Comic Sans MS, sans-serif;';
    $theme_advanced_fonts .= 'Courier New=Courier New, Courier;';
    $theme_advanced_fonts .= 'Georgia=Georgia, Palatino;';
    $theme_advanced_fonts .= 'Helvetica=Helvetica;';
    $theme_advanced_fonts .= 'Impact=Impact, Chicago;';
    $theme_advanced_fonts .= 'Symbol=Symbol;';
    $theme_advanced_fonts .= 'Tahoma=Tahoma, Arial, Helvetica, sans-serif;';
    $theme_advanced_fonts .= 'Terminal=Terminal, Monaco;';
    $theme_advanced_fonts .= 'Times New Roman=Times New Roman, Times;';
    $theme_advanced_fonts .= 'Trebuchet MS=Trebuchet MS, Geneva;';
    $theme_advanced_fonts .= 'Verdana=Verdana, Geneva;';
    $theme_advanced_fonts .= 'Webdings=Webdings;';
    $theme_advanced_fonts .= 'Wingdings=Wingdings, Zapf Dingbats';

    // Styles for the Google Web Fonts
    $content_css = 'http://fonts.googleapis.com/css?family=Aclonica,';
    $content_css .= 'http://fonts.googleapis.com/css?family=Michroma,';
    $content_css .= 'http://fonts.googleapis.com/css?family=Paytone+One';

    // The 'mode' and 'editor_selector' options are for adding
    // TinyMCE to any textarea with class="tinymce-textarea"
    wp_tiny_mce(false, array(
        'mode' => 'specific_textareas',
        'editor_selector' => 'tinymce-textarea',
        'theme_advanced_fonts' => $theme_advanced_fonts,
        'content_css' => $content_css
    ));
 }
 */