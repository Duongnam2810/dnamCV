// nhung' trinh soan. thao vao textarea form create post
CKEDITOR.replace( 'sapoPost',{
	height:120
});
CKEDITOR.replace( 'contentPost',{
	height:500
});

// select multiple tags
$(function(){
	$('#tags').multipleSelect({
		isOpen: false
	});
});