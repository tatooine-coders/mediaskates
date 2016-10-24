/* Functions to handle Ajax uploads
 *
 * Based on this tutorial:
 * http://hayageek.com/drag-and-drop-file-upload-jquery/
 */

/**
 * Creates a status bar
 *
 * @param {Object} targetObj jQuery object where the thumbnail should be created
 */
function createThumbnail(config) {

	/*
	 listenTo: '#dropzone',
	 writeTo: '#dropzone .dropzone-thumbs',
	 sendTo: '{{ route('user.photo.ajax_upload') }}',
	 formSession: '{{ $formSession }}',
	 imageURL: '{{ asset() }}'
	 */

	// HTML definition
	this.thumbnail = $('<div class="dropzone-thumb"></div>');
	this.imgzone = $('<div class="img-zone"></div>').appendTo(this.thumbnail);
	this.fakeimg = $('<div class="fake-img"></div>').appendTo(this.imgzone);
	this.controls = $('<div class="controls"></div>').appendTo(this.fakeimg);
	this.progressBar = $('<div class="progress-bar"><div></div></div>').appendTo(this.controls);
	this.abort = $('<div class="btn danger block abort"><i class="fa fa-fw fa-times"></i></div>').appendTo(this.controls);
	this.statusbar = $('<div class="infos-zone"></div>').appendTo(this.thumbnail);
	this.filename = $('<div class="filename"></div>').appendTo(this.statusbar);
	this.size = $('<div class="filesize"></div>').appendTo(this.statusbar);
	$(config.writeTo).append(this.thumbnail);

	/**
	 * Sets the filename and size in thumbnail
	 * @param {string} name
	 * @param {string} size
	 * @returns {void}
	 */
	this.setFileNameSize = function (name, size) {
		console.log(name, size);
		var sizeStr = "";
		var sizeKB = size / 1024;
		if (parseInt(sizeKB) > 1024) {
			var sizeMB = sizeKB / 1024;
			sizeStr = sizeMB.toFixed(2) + " MB";
		} else {
			sizeStr = sizeKB.toFixed(2) + " KB";
		}

		this.filename.html(name);
		this.size.html(sizeStr);
	};

	/**
	 * Changes the progress status in progress bar
	 * @param {int} progress
	 * @returns {void}
	 */
	this.setProgress = function (progress)
	{
		var progressBarWidth = progress * this.progressBar.width() / 100;
		this.progressBar.find('div').animate({width: progressBarWidth}, 10).html(progress + "% ");
		if (parseInt(progress) >= 100)
		{
			this.abort.hide();
		}
	};

	/**
	 * Event for abort button
	 * @param {type} jqxhr jQuery XHR request
	 * @returns {void}
	 */
	this.setAbort = function (jqxhr)
	{
		var sb = this.statusbar;
		this.abort.click(function ()
		{
			jqxhr.abort();
			sb.hide();
		});
	}

	/**
	 * Replaces loading control by image
	 *
	 * @param {string} imageURL
	 * @returns {void}
	 */
	this.setImage = function (imageURL) {
		$('<img src="' + config.imageURL + '/' + imageURL + '" alt="" />').appendTo(this.imgzone);
		this.fakeimg.hide();
	};
}

/**
 * Sends the file to server and updates the progress bar
 *
 * @param {FormData} formData Data to send
 * @param {type} status
 * @param {string} uploadURL
 */
function sendFileToServer(formData, status, uploadURL) {
	var jqXHR = $.ajax({
		xhr: function () {
			var xhrObj = $.ajaxSettings.xhr();
			if (xhrObj.upload) {
				xhrObj.upload.addEventListener('progress', function (e) {
					var percent = 0;
					var position = e.loaded || e.position;
					var total = e.total;
					if (e.lenghtComputable) {
						percent = Math.ceil(position / total * 100);
					}
					// Set progress
					status.setProgress(percent);
				}, false);
			}
			return xhrObj;
		},
		url: uploadURL,
		type: 'POST',
		contentType: false,
		processData: false,
		cache: false,
		data: formData,
		success: function (data) {
			status.setProgress(100);
			status.setImage(data.filename);
			console.log(data);
		}
	});
	status.setAbort(jqXHR);
}

/**
 * Handles a list of dropped files and creates a status bar
 * @param {FileList} files List of files
 * @param {object} config Configuration values
 * @returns {undefined}
 */
function droppedFilesHandler(files, config) {

	var formSession = config.formSession;
	var targetURL = config.sendTo;

	for (let file of files) {
		var fd = new FormData();
		fd.append('file', file);
		fd.append('formSession', formSession);
		// Create a status bar in the drop zone
		var status = new createThumbnail(config);
		console.log(file);
		status.setFileNameSize(file.name, file.size);
		// Send file
		sendFileToServer(fd, status, targetURL);
	}
}

/***
 * Creates a drop listener to a given zone and defines the target URL;
 * @param {string} zoneToListen    Drop zone (class, id)
 * @param {string} zoneToSend      Thumbnail parent selector
 * @param {string} targetUrl       Url to send the files to
 * @param {string} formSession     Form session id for the Laravel controller
 * @returns {void}
 */
function setDropListener(config) {
	var zoneTL = $(config.listenTo);

	// Event : entering the zone
	zoneTL.on('dragenter', function (e) {
		// Prevent default behaviour
		e.stopPropagation();
		e.preventDefault();
		// Border-change
		$(this).css('border-style', 'solid');
	});

	// Event: leaving the zone
	zoneTL.on('dragover', function (e) {
		// Prevent default behaviour
		e.stopPropagation();
		e.preventDefault();
	});

	// Event: dropping the files
	zoneTL.on('drop', function (e) {
		// Reset borders
		$(this).css('border-style', 'dashed');
		// Dropped files list
		var files = e.originalEvent.dataTransfer.files;
		// Send to server
		droppedFilesHandler(files, config);
	});

	// Prevent unfortunate drag and drop in document
	$(document).on('dragenter', function (e) {
		e.stopPropagation();
		e.preventDefault();
	});
	$(document).on('dragover', function (e) {
		e.stopPropagation();
		e.preventDefault();
		// Reset zone style
		zoneTL.css('border-style', 'dashed');
	});
	$(document).on('drop', function (e) {
		e.stopPropagation();
		e.preventDefault();
	});
}
