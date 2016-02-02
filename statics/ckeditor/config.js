/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	var baseurl = 'http://127.0.0.1:8080/sim_resi/';
		config.filebrowserBrowseUrl = baseurl+'assets/kcfinder/browse.php?type=files';
		config.filebrowserImageBrowseUrl = baseurl+'assets/kcfinder/browse.php?type=images';
		config.filebrowserFlashBrowseUrl = baseurl+'assets/kcfinder/browse.php?type=flash';
		config.filebrowserUploadUrl = baseurl+'assets/kcfinder/upload.php?type=files';
		config.filebrowserImageUploadUrl = baseurl+'assets/kcfinder/upload.php?type=images';
		config.filebrowserFlashUploadUrl = baseurl+'assets/kcfinder/upload.php?type=flash';

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];

	// Remove some buttons, provided by the standard plugins, which we don't
	// need to have in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Se the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Make dialogs simpler.
	config.removeDialogTabs = 'image:advanced;link:advanced';

    config.extraAllowedContent = 'pre[data-language](code)';

	//insert pre element.
	config.extraPlugins = 'wpmore,insertpre';

	config.insertpre_class = 'code';

};
