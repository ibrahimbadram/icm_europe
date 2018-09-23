CKEDITOR.editorConfig = function( config ) {
	config.removePlugins ='forms,iframe,maximize,newpage,resize,save';
	config.enterMode = CKEDITOR.ENTER_P;
	config.shiftEnterMode = CKEDITOR.ENTER_BR;
	config.width = '100%';
	config.baseHref = $('#base_url').val();
	config.allowedContent = true;
	config.extraAllowedContent= 'span;*(*);*{*}';
   	config.filebrowserBrowseUrl = 'assets/js/admin/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files';
   	config.filebrowserImageBrowseUrl = 'assets/js/admin/ckeditor/kcfinder/browse.php?opener=ckeditor&type=images';
   	config.filebrowserFlashBrowseUrl = 'assets/js/admin/ckeditor/kcfinder/browse.php?opener=ckeditor&type=flash';
   	config.filebrowserUploadUrl = 'assets/js/admin/ckeditor/kcfinder/upload.php?opener=ckeditor&type=files';
   	config.filebrowserImageUploadUrl = 'assets/js/admin/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images';
   	config.filebrowserFlashUploadUrl = 'assets/js/admin/ckeditor/kcfinder/upload.php?opener=ckeditor&type=flash';
};