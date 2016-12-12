<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>GOODCMS 3.0 Dashboard</title>

    <!-- Bootstrap -->
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"-->
    <link rel="stylesheet" href="/public/js/jquery-ui/jquery-ui.min.css" >
    <link rel="stylesheet" href="/public/css/fileinput.min.css" >
    <link rel="stylesheet" href="/public/css/admin.css" >

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script>tinymce.init({
            selector:'textarea.editor',
            height : 200,
            resize: false,
            plugins: [
                'advlist autolink lists link image charmap preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools'
            ],
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons',
            image_advtab: true,
            imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
            file_browser_callback: function elFinderBrowser (field_name, url, type, win) {

                tinymce.activeEditor.windowManager.open({
                    file: '/js/elFinder/elfinder.php',/* use an absolute path!*/
                    title: 'elFinder 2.0',
                    width: 900,
                    height: 450,
                    resizable: 'yes'
                }, {
                    setUrl: function (url) {
                        win.document.getElementById(field_name).value = url;
                    }
                });
                return false;
            }
        });
    </script>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">GOODCMS 3.0</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/admin">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Записи <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/admin/rubric/list">Рубрики</a></li>
                        <li><a href="/admin/rubric/add">Добавить рубрику</a></li>
                        <li><a href="/admin/post/list">Все записи</a></li>
                        <li><a href="/admin/post/add">Добавить запись</a></li>
                    </ul>
                </li>
                <li><a href="/admin/page/list">Страницы</a></li>
                <li><a href="/admin/menu">Меню</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <?php if(empty($_SESSION['AdminAuth'])):?>
                        <a href="/login">Вход</a>
                    <?php else:?>
                        <a href="/logout">Выход</a>
                    <?php endif;?>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>
<div class="container">
    <?php echo $content;?>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Удаление Элемента</h4>
            </div>
            <div class="modal-body">
                <h3>Вы действительно готовы <br>удалить данный элемент.</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">НЕТ</button>
                <button type="button" class="btn btn-danger deleteElement" data-dismiss="modal">ДА</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="settingModal" tabindex="-1" role="dialog" aria-labelledby="settingModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="settingModalLabel">Добавление Настройки</h4>
            </div>
            <div class="modal-body">
                <div class="item-tab">
                    <form method="post" action="">
                        <label>Наименование</label><input class="form-control" type="text" name="label">
                        <label>Имя</label><input class="form-control" type="text" name="name">
                        <label>Значение</label><input class="form-control" type="text" name="value">
                </div>
            </div>
            <div class="modal-footer">
                <input  class="btn btn-primary" data-dismiss="modal" type="submit" name="addSettings" value="Сохранить">
            </div>
            </form>
        </div>
    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script-->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="/public/js/fileinput.min.js" type="text/javascript"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/public/js/jquery.liTranslit.js"></script>
<script src="/public/js/bootstrap.min.js"></script>
<!--scrip src="/public/js/jquery-ui/jquery-ui.min.js"></scrip-->
<!-- Latest compiled and minified JavaScript -->
<!--script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script-->
<script src="/public/js/fileinput_locale_ru.js"></script>
<script src="/public/js/menu.js"></script>
<script src="/public/js/admin.js"></script>
</body>
</html>
