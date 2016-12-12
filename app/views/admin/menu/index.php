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
<h1>Список меню</h1>

<div class="wrapp-form-menu row">
    <?php if(!empty($error)):?>
        <div class="alert alert-danger" role="alert"><?php echo $error;?></div>
    <?php endif;?>
    <?php if(!empty($success)):?>
        <div class="alert alert-success" role="alert"><?php echo $success;?></div>
    <?php endif;?>
        <div class="col-md-6">
            <form id="formMenu" method="post" >

                <div class="form-group">
                    <label for="title">Наименование Меню</label>
                    <input id="title" type="text" class="form-control" name="title" />
                </div>
                <input type="submit" value="Содать Меню" class="btn btn-primary" name="add_menu" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </form>
        </div>
        <div class="col-md-6">
            <?php if($listMenu):?>
                <ul class="list-menu">
                    <?php foreach($listMenu as $item):?>
                        <li><?php echo $item->title;?>
                            <a class="add_item_menu btn btn-success btn-xs" href="/admin/menu-items/add/<?php echo $item->id;?> ><i class="glyphicon glyphicon-plus"></i> Добавить пункт меню</a>
                            <button class="menu_delete btn btn-danger btn-xs" data-id="<?php echo $item->id;?>"><i class="glyphicon glyphicon-remove"></i> Удалить </button>
                        </li>
                    <?php endforeach;?>
                </ul>
            <?php endif;?>
            <p class="buttons_items_menu" style="display: none">


            </p>
        </div>

</div>


