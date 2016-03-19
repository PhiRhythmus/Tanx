jQuery(function($) {
	"use strict";
	// Author Code Here
	var standard = $('#post-formats-select #post-format-0');
	var quote = $('#post-formats-select #post-format-quote');
	var video = $('#post-formats-select #post-format-video');
	var gallery = $('#post-formats-select #post-format-gallery');
	var image = $('#post-formats-select #post-format-image');
	$(window).load(function(){
		var ps = $('#page_settings, #post_settings');
		if(ps.length > 0) {
			var psh = ps.html();

			ps.remove();
			var appendString = "<div id='page_settings' style='margin-top:20px' class='postbox'>" + psh + "</div>";
			$('#titlediv').after(appendString);
			CheckMeta();
		}
		$("#flattr, #yummly").remove();
		$.ajax({url: "https://www.googleapis.com/webfonts/v1/webfonts?sort=alpha&key=AIzaSyB8G-4UtQr9fhDYTiNrDP40Y5GYQQKrNWI", success: function(result){
	        var fonts = result['items'];
	        var font_options = "";
	        $.each(fonts, function(i, item) {
				font_options += "<option value='" + fonts[i]['family'] + "'>" + fonts[i]['family'] + "</option>";
	        });
	        $("#setting_primary_font .format-setting-inner, #setting_secondary_font .format-setting-inner").append("<select class='font-select-box'>" + font_options + "</select>");
	    }});
	});

	$('body').on('change', '.font-select-box', function(){
		$(this).prev().val($(this).val());
	});

	$('#post-formats-select input').change(function(){
		CheckMeta();
	});

	function CheckMeta() {
		if(video.is(':checked')) {
			$('#video_settings').show();
		}
		else {
			$('#video_settings').hide();
		}
		if(quote.is(':checked')) {
			$('#post_settings, #page_settings, #post-status-info').hide();
			$('#title-prompt-text').html('Enter Quote Text Here');
			$('#quote_settings').show();
		}
		else {
			$('#post_settings, #page_settings, #wp-content-editor-tools, #wp-content-editor-container, #post-status-info').show();
			$('#title-prompt-text').html('Enter title here');
			$('#quote_settings').hide();
		}
	}

	$('#primary_font-0 option').each(function(){
		$(this).attr('data-font-value', $(this).attr('value'));
		$(this).attr('value', $(this).html());
	});


	$('#secondary_font-0 option').each(function(){
		$(this).attr('data-font-value', $(this).attr('value'));
		$(this).attr('value', $(this).html());
	});

	$('#primary_font-0').val($('.font-help-primary').html());
	$('#secondary_font-0').val($('.font-help-secondary').html());

});