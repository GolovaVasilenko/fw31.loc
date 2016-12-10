<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php if(isset($meta_title)) echo $meta_title;?></title>
    <meta name="description" content="<?php if(isset($meta_desc)) echo $meta_desc;?>" />
    <meta name="keywords" content="<?php if(isset($meta_key)) echo $meta_key;?>" />

    <link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/css/media.css" rel="stylesheet">
    <link href="/public/css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper" class="wrapper">
    <header class="top-header">

        <div class="bg-top-info">
            <div class="main-nav">
                <div class="row-wrapp clearfix">
                    <?php //include "menu_top.php"; ?>
                </div>
            </div>
            <div class="row-wrapp clearfix">
                <div class="logo-site col-md-3 col-sm-3 col-xs-12">
                    <img src="/public/img/logo.png" alt="ДЦПТО логотип" />
                </div>
                <div class="name-site col-md-6 col-sm-6 col-xs-12">
                    <div class="slogan">Державний професійно-технічний заклад</div>
                    <div class="site-name">"Дніпропетровський центр професійно-технічної освіти"</div>
                </div>
                <div class="contact-site col-md-3 col-sm-3 col-xs-12">
                    <div class="phones"> +38 (056) 760-48-63 <br>
                        +38 (056) 760-48-62</div>
                </div>
                <div class="social-btn">
                    <a href="#"><img src="/public/img/vk-icon.png" alt="vk" /></a>
                    <a href="#"><img src="/public/img/yt-icon.png" alt="vk" /></a>
                </div>
            </div>
        </div>
    </header>
    <div class="wrapp-content">
        <div class="row-wrapp clearfix">
            <div class="col-md-2 col-sm-2 col-xs-12 left-col"></div>
            <div class="col-md-8 col-sm-8 col-xs-12 mid-col">
                <?= $content ?>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12 right-col"></div>
        </div>
    </div>

    <footer>
        <div class="row-wrapp clearfix">
            <div class="col-md-4 col-sm-4 col-xs-12">
                м. Дніпропетровськ<br>
                вул. Алтайська, 6-а
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                +38 (056) 760-48-63 <br>
                +38 (056) 760-48-62
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="social-btn-ft">
                    <a href="#"><img src="/public/img/vk-icon.png" alt="vk" /></a>
                    <a href="#"><img src="/public/img/yt-icon.png" alt="vk" /></a>
                </div>
            </div>
        </div>
    </footer>

</div><!--  END Wrapper  -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/public/js/bootstrap.min.js"></script>
<script src="/public/js/custom.js"></script>

</body>
</html>
