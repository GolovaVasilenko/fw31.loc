<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php if(isset($meta_title)) echo $meta_title;?></title>
    <meta name="description" content="<?php  if(isset($meta_desc)) echo $meta_desc;?>" />
    <meta name="keywords" content="<?php  if(isset($meta_key)) echo $meta_key;?>" />

    <link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <!--link href="/public/css/reset.css" rel="stylesheet"-->
    <link href="/public/css/style-mega-menu.css" rel="stylesheet">
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/css/fonts.css" rel="stylesheet">
    <link href="/public/css/forma.css" rel="stylesheet">
    <link href="/public/css/slider.css" rel="stylesheet">
    <link href="/public/css/custom.css" rel="stylesheet">
    <link href="/public/css/media.css" rel="stylesheet">

    <script src="/public/js/modernizr.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="auth-wrapp">
        <!-- Вывод популярных товаров -->
        <?php echo $content;?>
        <!-- END Вывод популярных товаров -->
    </div>
</div>
</body>
</html>
