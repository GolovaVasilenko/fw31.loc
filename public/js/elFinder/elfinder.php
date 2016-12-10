<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>elFinder 2.1.x source version with PHP connector</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2" />

		<!-- Section CSS -->
		<!-- jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/themes/smoothness/jquery-ui.css">

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" href="css/theme.css">

		<!-- Section JavaScript -->
		<!-- jQuery and jQuery UI (REQUIRED) -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>

		<!-- elFinder JS (REQUIRED) -->
		<script src="js/elfinder.min.js"></script>

		<!-- GoogleDocs Quicklook plugin for GoogleDrive Volume (OPTIONAL) -->
		<!--<script src="js/extras/quicklook.googledocs.js"></script>-->

		<!-- elFinder translation (OPTIONAL) -->
		<!--<script src="js/i18n/elfinder.ru.js"></script>-->

		<!-- elFinder initialization (REQUIRED) -->
        <!-- Include jQuery, jQuery UI, elFinder (REQUIRED) -->

        <script type="text/javascript">
            var FileBrowserDialogue = {
                init: function() {
                    // Here goes your code for setting your custom things onLoad.
                },
                mySubmit: function (URL) {
                   // alert(URL.url);
                    // pass selected file path to TinyMCE
                    parent.tinymce.activeEditor.windowManager.getParams().setUrl(URL.url);
                    // force the TinyMCE dialog to refresh and fill in the image dimensions
                    var t = parent.tinymce.activeEditor.windowManager.windows[0];

                    t.find('#src').fire('change');

                    // close popup window
                    parent.tinymce.activeEditor.windowManager.close();
                }
            }

            $().ready(function() {
                var elf = $('#elfinder').elfinder({
                    // set your elFinder options here
                    url: 'php/connector.php',  // connector URL
                    lang: 'ru',
                    getFileCallback: function(file) { // editor callback
                        // file.url - commandsOptions.getfile.onlyURL = false (default)
                        // file     - commandsOptions.getfile.onlyURL = true
                        FileBrowserDialogue.mySubmit(file); // pass selected file path to TinyMCE
                    }
                }).elfinder('instance');
            });
        </script>
	</head>
	<body>
    <?php if(isset($_SESSION['AdminAuth'])): ?>
		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>
    <?php else:?>
        <h1>Доступ Запрещен!!!</h1>
    <?php endif;?>
	</body>
</html>
