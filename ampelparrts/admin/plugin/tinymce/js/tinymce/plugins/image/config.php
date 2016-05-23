<?php
session_start();
require_once("../../../../../../../config.php");
/** Full path to the folder that images will be used as library and upload. Include trailing slash */
define('LIBRARY_FOLDER_PATH', PATH_ABSOLUTO.'images/tinymce/');

/** Full URL to the folder that images will be used as library and upload. Include trailing slash and protocol (i.e. http://) */
define('LIBRARY_FOLDER_URL', URL_SITE.'images/tinymce/');

/** The extensions for to use in validation */
define('ALLOWED_IMG_EXTENSIONS', 'gif,jpg,jpeg,png,jpe');

/**  Use these 3 functions to check cookies and sessions for permission. 
Simply write your code and return true or false */


function CanAcessLibrary(){
	if ($_SESSION["session_id"] != md5(CHAVE_SESSION) ) {
		return false;
	} else {
		return true;
	}
}

function CanAcessUploadForm(){
	if ($_SESSION["session_id"] != md5(CHAVE_SESSION) ) {
		return false;
	} else {
		return true;
	}
}

function CanAcessAllRecent(){
	if ($_SESSION["session_id"] != md5(CHAVE_SESSION) ) {
		return false;
	} else {
		return true;
	}
}

function CanCreateFolders(){
	if ($_SESSION["session_id"] != md5(CHAVE_SESSION) ) {
		return false;
	} else {
		return true;
	}
}

function CanDeleteFiles(){
	if ($_SESSION["session_id"] != md5(CHAVE_SESSION) ) {
		return false;
	} else {
		return true;
	}
}

function CanDeleteFolder(){
	if ($_SESSION["session_id"] != md5(CHAVE_SESSION) ) {
		return false;
	} else {
		return true;
	}
}

function CanRenameFiles(){
	if ($_SESSION["session_id"] != md5(CHAVE_SESSION) ) {
		return false;
	} else {
		return true;
	}
}

function CanRenameFolder(){
	if ($_SESSION["session_id"] != md5(CHAVE_SESSION) ) {
		return false;
	} else {
		return true;
	}
}
