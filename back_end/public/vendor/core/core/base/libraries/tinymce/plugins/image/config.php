<?php

session_start();

/** Full path to the folder that images will be used as library and upload. Include trailing slash */
define('FOLDER_PATH', 'uploads/');

/** Full URL to the folder that images will be used as library and upload. Include trailing slash and protocol (i.e. http://)
 */
define('FOLDER_URL', 'http://example.com/tinymce/plugins/image/uploads/');

/** The extensions for to use in validation */
define('ALLOWED_IMG_EXTENSIONS', 'gif,jpg,jpeg,png,jpe,pdf');

/** Should the files be renamed to a random name when uploading */
define('RENAME_UPLOADED_FILES', true);

/** Number of folders/images to display per page */
define('ROWS_PER_PAGE', 12);


/** Should Images be resized on upload. You will then need to set at least one of the dimensions sizes below */
define('RESIZE_ON_UPLOAD', false);

/** If resizing, width */
define('RESIZE_WIDTH', 300);
/** If resizing, height */
define('RESIZE_HEIGHT', 300);


/** Should a thumbnail be created? */
define('THUMBNAIL_ON_UPLOAD', false);

/** If thumbnailing, thumbnail postfix */
define('THUMBNAIL_POSTFIX', '_thumb');
/** If thumbnailing, maximum width */
define('THUMBNAIL_WIDTH', 130);
/** If thumbnailing, maximum height */
define('THUMBNAIL_HEIGHT', 90);
/** Override dimensions set above to maintain ration */
define('THUMBNAIL_MAINTAIN_RATIO', false);
/** If thumbnailing, hide thumbnails in listings */
define('THUMBNAIL_HIDE', true);


/** The method that will be used to be display thumbnails in the image manager:
 *  timthumb: use the timthumb script to generate thumbnails
 *  generated: use the thumbnail generate when an image is uploaded
 *  none: simply resize the image to something small
 */
define('HOW_TO_DISPLAY_THUMBNAILS', 'timthumb');



/**  Use these 9 functions to check cookies and sessions for permission. 
Simply write your code and return true or false */


/** If you would like each user to have their own folder and only upload 
 * to that folder and get images from there, you can use this funtion to 
 * set the folder name base on user ids or usernames. NB: make sure it return 
 * a valid folder name. */
function CurrentUserFolder(){
	return '';
}


function CanAcessLibrary(){
	return true;
}

function CanAcessUploadForm(){
	return true;
}

function CanAcessAllRecent(){
	return true;
}

function CanCreateFolders(){
	return true;
}

function CanDeleteFiles(){
	return true;
}

function CanDeleteFolder(){
	return true;
}

function CanRenameFiles(){
	return true;
}

function CanRenameFolder(){
	return true;
}