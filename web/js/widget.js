$(document).ready(function() {
	/**
	 * Use event scroll handler, when windows scrolling, then get ajax
	 * Ajax GET artikel
	 */
	$(window).scroll(function(){
		var lastID = $('.load-more-artikel').attr('lastID');
		if ($(window).scrollTop() == $(document).height() - $(window).height()) {
			$.ajax({
				type: 'GET',
				cache: false,
				url: 'http://localhost/yii2-basic/web/api/rest/load-artikel?id='+lastID,
				beforeSend: function(data){
					$('.load-more-artikel').show('slow');
				},
				success: function(data){
					$('.load-more-artikel').remove();
					$('#postList').append(data);
				}
			});
		}
	});
});