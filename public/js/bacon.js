
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
			itemTemplate     : '<li class="uploadifive-queue-item"><input type="checkbox" class="pull-left "><a href="#"><span class="filename"></span><i class="close icon-remove"></i><div class="progress"><div class="bar progress-bar"></div></div></a></li>',

			height			 : 'auto',
			width			 : '103',

			onUploadComplete : function(file, data) { 
				data = $.parseJSON(data);

				$("span:contains('"+file.name+"')").parent().parent().html("<a href='"+data.url+"' target='_blank'>"+data.name+"</a>");
			}
		});

		$('.upload').on('click', function(event) {
			event.preventDefault();

			Bacon.Upload(event);
		});
	}, 

	Upload: function(event) {
		//window.location.hash = 'uploading';

		$('#upload').uploadifive('upload');
	},

	Progress: function() {
		$.get('/api/upload', function(data) {
			console.log(data);
		});
	}
}


Bacon.Start();

