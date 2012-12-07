
var Bacon = {

	Start: function() {
		window.location.hash = "";

		Bacon.Hooks();
	},

	Hooks: function() {
		$('#upload').uploadifive({
			auto             : false,
			queueID          : 'queue',
			uploadScript     : '/api/upload/',
			buttonClass      : 'btn btn-primary',
			itemTemplate     : '<li class="uploadifive-queue-item"><a href="#"><span class="filename"></span><i class="close icon-remove"></i><div class="progress"><div class="progress-bar"></div></div></a></li>',

			height			 : 'auto',
			width			 : '103',

			onUploadComplete : function(file, data) { 
				data = $.parseJSON(data);

				$("span:contains('"+file.name+"')").parent().parent().html("<a href='"+data.url+"' target='_blank'>"+data.name+"</a>");

				console.log(data);
			}
		});

		$('.select').on('click', function(event) {
			event.preventDefault();

			$('#upload').click();
		});

		$('#upload').on('submit', function(event) {
			event.preventDefault();

			Bacon.Upload(event);
		});
	}, 

	Upload: function(event) {
		window.location.hash = 'uploading';

  		// $('#files').triggerHandler('html5_upload.start');
	},

	Progress: function() {
		$.get('/api/upload', function(data) {
			console.log(data);
		});
	}
}


Bacon.Start();

