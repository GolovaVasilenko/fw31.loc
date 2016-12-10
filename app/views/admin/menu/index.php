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
                <label for="visible">Активность</label>
                <input id="visible" type="checkbox" name="visible" value="1" />
            </form>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="menu_select">Наименование Меню</label>
                <select id="menu_select"  class="form-control" name="list_menu">
                    <option value="0">Выбрать меню</option>
                    <?php if($listMenu):?>
                        <?php foreach($listMenu as $item):?>
                            <option value="<?php echo $item->id;?>"><?php echo $item->title;?></option>
                        <?php endforeach;?>
                    <?php endif;?>
                </select>
            </div>
            <p class="buttons_items_menu" style="display: none">
                <button class="menu_delete btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Удалить выбранное меню</button>
                <button class="add_item_menu btn btn-success" data-toggle="modal" data-target="#AddItemMenuModal"><i class="glyphicon glyphicon-plus"></i> Добавить пункт меню</button>
            </p>
        </div>

</div>

<div class="row">
    <div class="menu-items-wrapp">
        <ul id="sortable_menu" class="menu-items"></ul>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="AddItemMenuModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Добавить пункт меню</h4>
            </div>
            <form id="create_menu_item" class="form" method="post" action="">
            <div class="modal-body">
                <div class="form-group">
                    <label for="item_title">Заголовок</label>
                    <input id="item_title" class="form-control" type="text" value="" name="title">
                    <input id="item_menu_id" type="hidden" value="" name="menu_id">
                </div>
                <div class="form-group">
                    <label for="item_parent">Заголовок</label>
                    <select id="item_parent" class="form-control" name="parent_id">
                        <option value="0">Нет родителя</option>
                        <!-- TO DO    List ITEMS  Menu  -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="item_link">Ссылка</label>
                    <input id="item_link" class="form-control" type="text" value="" name="link">
                </div>
                <div class="form-group">
                    <label for="item_link_type">Тип Элемента</label>
                    <select id="item_link_type" class="form-control" name="type_link">
                        <?php foreach(\app\models\MenuItems::getSelectTypes() as $itemMenu):?>
                        <option value="<?php echo $itemMenu['name']?>"><?php echo $itemMenu['value']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group materials" style="display:none" >
                    <lable>Материалы</lable>
                    <select id="select_materials" class="form-control" >
                        <option value="#">Выбрать доступный материал</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button id="saveItem" type="button" class="btn btn-primary">Сохранить</button>
            </div>
            </form>
        </div>
    </div>
</div>