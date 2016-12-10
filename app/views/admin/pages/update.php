<h1>Редактирование страницы</h1>
<?php
if(vendor\core\Session::getValue('error')){
    $error = vendor\core\Session::getValue('error');
    vendor\core\Session::sessionRemove('error');
}

if(vendor\core\Session::getValue('success')){
    $success = vendor\core\Session::getValue('success');
    vendor\core\Session::sessionRemove('success');
}
?>
<p><a href="/admin/page/list" class="btn btn-success">Все страницы</a></p>
<form class="form_add_page" method="post" action="/admin/page/store">
    <?php if(!empty($error)):?>
        <div class="alert alert-danger" role="alert"><?php echo $error;?></div>
    <?php endif;?>
    <?php if(!empty($success)):?>
        <div class="alert alert-success" role="alert"><?php echo $success;?></div>
    <?php endif;?>
    <div class="form-group">
        <label for="h1">Заголовок H1</label>
        <input id="h1" type="text" class="cyr1 form-control" name="h1" value="<?php echo $page->h1;?>" />
        <input type="hidden" name="id" value="<?php echo $page->id; ?>" />
    </div>
    <div class="form-group">
        <label for="url">URL</label>
        <input id="url" type="text" class="lat1 form-control" name="url"  value="<?php echo $page->url;?>" />
    </div>
    <div class="form-group">
        <label for="body">Содержимое страницы</label>
        <textarea id="body" class="editor form-control" name="body"><?php echo $page->body;?></textarea>
    </div>
    <div class="form-group">
        <label for="title">META title</label>
        <input id="title" type="text" class="form-control" name="title" value="<?php echo $page->title;?>" />
    </div>
    <div class="form-group">
        <label for="keywords">META keywords</label>
        <input id="keywords" type="text" class="form-control" name="keywords" value="<?php echo $page->keywords;?>" />
    </div>
    <div class="form-group">
        <label for="description">META description</label>
        <input id="description" type="text" class="form-control" name="description" value="<?php echo $page->description;?>" />
    </div>
    <input type="submit" value="Сохранить" class="btn btn-primary" name="update_page" />
</form>
