	jQuery(document).ready(function(){

		var fileFrame;
		jQuery('.upload_image_button').on('click', function(e){
			e.preventDefault();
			
			element = jQuery(this);
			id = jQuery(element).attr('data-id');
			
			if(fileFrame){
				fileFrame.open();
				return;
			}
			
			fileFrame = wp.media.frames.file_frame = wp.media({
				tile: jQuery(this).data('uploader_title'),
				button: {
					text: jQuery(this).data('uploader_button_text')
				},
				multiple: false,
				library: { type: 'image' }
			});
			
			fileFrame.on('select', function(){
				attachment = fileFrame.state().get('selection').first().toJSON();
				
				if(attachment.url){					
					jQuery('input[name="back_to_top_button_load' + id + '"]').val(attachment.url);
					jQuery('#load_img' + id).attr('src', attachment.url).fadeIn();
					jQuery(element).parent().find('.slider_remove_img').show();
				}
			});
			
			fileFrame.open();
		});
		
		jQuery('.slider_remove_img').click(function(e){
			e.preventDefault();
			
			element = jQuery(this);
			id = jQuery(element).attr('data-id');
			image = jQuery('#load_img' + id);
			
			jQuery('input[name="back_to_top_button_load' + id + '"]').val('');
			jQuery(image).fadeOut();
			jQuery(element).hide();
		});
	});