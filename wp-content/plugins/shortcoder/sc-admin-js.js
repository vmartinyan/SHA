$j = jQuery.noConflict();

$j(document).ready(function(){
	var sccontent;
	
	$j('#sc_list li').click(function(){
		$j('#sc_name_edit').val($j(this).text());
		$j('#sc_edit_form').submit();
	});
	
	$j('#sc_list li').draggable({
		start: function(){ $j('#sc_delete').addClass('sc_trashHover'); },
		stop: function(){ $j('#sc_delete').removeClass('sc_trashHover'); }
	});
	$j('#sc_delete').droppable({
		drop: function(e, ui){
			$j('#sc_list li').unbind('click');
			$j('#sc_name_edit').val(ui.draggable.text());
			$j('#sc_form_action').val('delete');
			$j('#sc_edit_form').submit();
		}
	});
	
	$j('#sc_name').bind('keyup focus change',function(){
		sc_triggerElements($j(this).val());
	});
	
	$j('.sc_back').click(function(){
		location.reload();
	});
	
	sc_triggerElements($j('#sc_name').val());
	

	// Video
	$j('.sc_open_video').click(function(e){
		e.preventDefault();
		newwindow2=window.open('','name','height=340,width=585');
		var tmp = newwindow2.document;
		tmp.write('<iframe width="560" height="315" src="http://www.youtube.com/embed/GrlRADfvjII" frameborder="0" allowfullscreen></iframe>');
		tmp.close();
	});
	
	// Share bar
	$j('.sc_share_wrap li').mouseenter(function(){
		$this = $j(this);
		$j('.sc_share_iframe').remove();
		$j('body').append('<iframe class="sc_share_iframe"></iframe>');
		$j('.sc_share_iframe').css({
			position: 'absolute',
			top: $this.offset()['top'],
			left: $this.offset()['left'] + 55,
			width: $this.attr('data-width'),
			height: $this.attr('data-height'),
		}).attr('src', $this.attr('data-url')).hide().fadeIn();
	});
	
	$j('.sc_share_iframe').live('mouseout', function(){
		$j(this).remove();
	});
	
	$j( '.sc_modal_close' ).click(function(){
		sc_modal( 'close' );
	});
	
	sc_modal( 'show' );
});

var sc_closeiframe = function(){
	$j('.sc_share_iframe').remove();
}

function sc_triggerElements(val){
	if(val != ''){
		
		// Not used
		if(sc_wsc(val)){
			code = '"' + val + '"';
		}else{
			code = val;
		}
		//
		
		$j('#sc_code').show();
		$j('#sc_code').html('Your shortcode is <b contenteditable="true" disabled="disabled">[sc name="' + val + '"]</b>');
		$j('#sc_submit').removeClass('sc_btdisabled').removeAttr('disabled');
	}else{
		$j('#sc_code').hide();
		$j('#sc_submit').addClass('sc_btdisabled').attr('disabled', 'disabled');
	}
}

function sc_modal( action ){
	
	if( typeof( localStorage ) !== "undefined" ){
		if( action == 'show' ){
			
			if ( localStorage[ 'sc_modal_' + sc_version ] == null ){
				
				$j.ajax({
					type: 'GET',
					dataType: 'html',
					crossDomain: true,
					url: 'https://raw.githubusercontent.com/vaakash/aakash-web/master/misc/release_notes/shortcoder_v341.html',
					success: function ( data ) {
						$j('.sc_modal > div').html( data );
						$j('.sc_modal').fadeIn();
					}
				});
				
			}
			
		} else if( action == 'close' ){
			
			localStorage[ 'sc_modal_' + sc_version ] = 'closed';
			$j('.sc_modal').hide();
			
		}
	}
	
}

function sc_wsc(s) {
  return s.indexOf(' ') >= 0;
}