
<h1>Список страниц</h1>

<p><a href="/admin/page/add" class="btn btn-success" >Добавить страницу</a></p>

<table class="table table-striped">
    <tr>
        <th>Заголовок страницы</th>
        <th>url</th>
        <th>Редакция</th>
        <th>Удаление</th>
    </tr>
<?php if(!empty($pages)): ?>
    <?php foreach($pages as $page):?>
        <tr>
            <td><?php echo $page->h1;?></td>
            <td><?php echo $page->url;?></td>
            <td><a href="/admin/page/update?id=<?php echo $page->id;?>"><i class="glyphicon glyphicon-edit"></i></a></td>
            <td><a href="/admin/page/delete?id=<?php echo $page->id;?>"><i class="glyphicon glyphicon-remove"></i></a></td>
        </tr>
    <?php endforeach;?>
<?php endif;?>
</table>