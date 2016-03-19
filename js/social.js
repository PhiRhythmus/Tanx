jQuery(function($) {
	"use strict";
	// Author Code Here
	

	$('.social a.social-link').each(function(){
		var templateStart = "<i class='fa fa-";
		var templateEnd = "'></i>";

		var iconName = $(this).attr('data-name').toLowerCase();

		if(iconName == 'Google+') {
			iconName = 'google-plus';
		} else if (iconName == 'vk.com') {
			iconName = 'vk';
		}

		$(this).html(templateStart + iconName + templateEnd);
	});
})