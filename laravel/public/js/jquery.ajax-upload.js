/* Functions to handle Ajax uploads
 *
 * Based on this tutorial:
 * http://hayageek.com/drag-and-drop-file-upload-jquery/
 *
 * @author Manuel Tancoigne <m.tancoigne@gmail.com>
 */

/**
 * Creates a status bar
 *
 * @param {Object} config Configuration object, passed from caller
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
	this.delete = $('<a class="danger"><i class="fa fa-fw fa-times"></i> Supprimer</a>'); // Is appended in setDeleteLink
	this.realimg = $('<img src="" alt="" />'); // Defined in setRealImage();
	this.filename = $('<div class="filename"></div>').appendTo(this.statusbar);
	this.size = $('<div class="filesize"></div>').appendTo(this.statusbar);
	// Creates the thumb
	$(config.writeTo).append(this.thumbnail);

	// Other vars
	// File name on server
	this.serverFileName = null;
	// URL to remove an img
	this.abortURL = config.abortURL;
	// Form session id
	this.formSession = config.formSession;
	// Server base url to temp image
	this.imageTmpURL = config.imageURL;

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
//		if (parseInt(progress) >= 100) {
//			this.abort.hide();
//			this.delete.show();
//		}
	};

	this.abortOnServer = function () {
		var sb = this.thumbnail;
		var thumb=this;
		this.realimg.hide();
		this.controls.html('<i class="fa fa-spinner fa-pulse fa-fw fa-3x" style="color:#CCC"></i>');
		this.fakeimg.show();

		fd = new FormData();
		fd.append('formSession', this.formSession);
		fd.append('imageName', this.serverFileName);

		$.ajax({
			url: this.abortURL,
			type: 'POST',
			contentType: false,
			processData: false,
			cache: false,
			data: fd,
			success: function (data) {
				console.log('DELETE :', data);
				sb.hide();
			},
			error: function(data){
				thumb.setError(data)
			}
		});
		console.log('Deleting image from server....');
	};

	/**
	 * Event for abort button
	 * @param {type} jqxhr jQuery XHR request
	 * @returns {void}
	 */
	this.setAbortButton = function (jqxhr) {
		this.abort.click(function ()
		{
			jqxhr.abort();
		});
	};

	/**
	 * Displays the delete link and attach click listener
	 * @param {createThumbnail} thumb
	 * @returns {void}
	 */
	this.setDeleteLink = function (thumb) {
		this.delete.prependTo(this.statusbar);
		this.delete.click(function (e) {
			thumb.abortOnServer();
//			thumb.thumbnail.hide();
		});
	};

	this.setError = function (data) {
		this.controls.html('<div class="grave">ERREUR</div>');
		console.log(data);
	};

	/**
	 * Replaces loading control by image
	 *
	 * @param {Object} data
	 * @returns {void}
	 */
	this.setRealImageData = function (data) {
		this.serverFileName = data.filename;
		this.realimg.attr('src', this.imageTmpURL + '/' + data.filename);
		this.realimg.appendTo(this.imgzone);
		this.setDeleteLink(this);
		this.fakeimg.hide();
	};
}

/**
 * Sends the file to server and updates the progress bar
 *
 * @param {FormData} formData Data to send
 * @param {type} thumbnail
 * @param {string} uploadURL
 */
function sendFileToServer(formData, thumbnail, uploadURL) {
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
					thumbnail.setProgress(percent);
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
			console.log(data);
			if (data.hasOwnProperty('filename')) {
				thumbnail.setProgress(100);
				thumbnail.setRealImageData(data);
			} else {
				thumbnail.setError(data);
			}
		}
	});
	thumbnail.setAbortButton(jqXHR);
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
		let ext = file.name.split('.').pop();
		if (['jpg', 'jpeg', 'png', 'gif'].indexOf(ext) !== -1) {
			var fd = new FormData();
			fd.append('file', file);
			fd.append('formSession', formSession);

			// Create a status bar in the drop zone
			var status = new createThumbnail(config);
			status.setFileNameSize(file.name, file.size);
			// Send file
			sendFileToServer(fd, status, targetURL);
		} else {
			console.log(file.name + 'is not of an acceptable format.');
		}
	}
}

/***
 * Creates a drop listener to a given zone and defines the target URL;
 * @param {Object} config    Configuration object, passed from callers to callers
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
