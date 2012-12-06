
var Bacon = {

	Start: function() {
		window.location.hash = "";

		Bacon.Hooks();
	},

	Hooks: function() {
		/*
		$("#files").html5_upload({
			autostart: false,
			
		    url: "/api/upload",
		    fieldName: 'images[]',
		    sendBoundary: window.FormData || $.browser.mozilla,
		    onStart: function(event, total) {
		        return true;
		    },
		    onProgress: function(event, progress, name, number, total) {

		    },
		    setName: function(text) {
		    },
		    setStatus: function(text) {
		        $("#progress_report_status").text(text);
		    },
		    setProgress: function(val) {
		        $(".progress .bar").css('width', Math.ceil(val*100)+"%");
		    },
		    onFinishOne: function(event, response, name, number, total) {
		    	response = $.parseJSON(response);
		        $('#uploaded .nav').append('<li><a href="http://i.mgba.co/'+response.name+'" target="_blank">'+name+' <i class="icon-arrow-right"></i> '+response.name+'</a></li>');
		    },
		    onError: function(event, name, error) {
		        alert('error while uploading file ' + name);
		    }
		});
		*/

		$('.upload').on('click', function(event) {
			event.preventDefault();

			$('input[type=file]').click();
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

$('#upload').uploadifive({
	auto             : false,
	queueID          : 'queue',
	uploadScript     : '/api/upload/',
	buttonClass      : 'btn btn-success',
	itemTemplate     : '<li class="uploadifive-queue-item"><span class="filename"></span> | <span class="fileinfo"></span><div class="close"><i class="close icon-remove"></i></div></li>',

	onUploadComplete : function(file, data) { 
		console.log(file,data); 
	}
});