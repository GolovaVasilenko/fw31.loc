$(document).ready(function(){

    $('#formMenu').submit(function(e){
        e.preventDefault();
        var form = $(this).serialize();
        var title = $('#title').val();
        var visible = $('#visible:checked').val();
        if('undefined' === visible)
            visible = 0;

        $.ajax({
            type: 'POST',
            url: '/admin/menu/add',
            data: {'title' : title, 'visible': visible, 'add_menu': 1},
            success: function(data){
                window.location.href = "/admin/menu";
            }
        });
        return false;
    });


    $('.menu_delete').on('click', function(e){
        e.preventDefault();
        var menuSelected = parseInt($(this).data('id'));
        $.ajax({
            type: 'POST',
            url: '/admin/menu/delete',
            data: {'del_menu_id': menuSelected},
            success: function(data){
                if(data){
                    location.reload();
                }
            }
        });
        return false;
    });

    $("#sortable").sortable({
        'items': 'li',
        update: function( event, ui ) {
            var order = $(this).sortable('toArray');
            $.ajax({
                url: '/admin/position/update',
                data: {'sortable': order, timestamp: $.now(), 'cat_id': cat_id, 'type_id': type_id},
                type: 'post',
                success: function(data){
                    //console.log(data);
                }
            });
        }
    });
    $( "#sortable" ).disableSelection();

    $('#item_link_type').on('change', function(){
        var type_link = $(this).val();
        switch(type_link){
            case 'page':
                $('.materials').show();
                get_pages(type_link);
                break;
            case 'rubric':
                $('.materials').show();
                get_rubrics(type_link)
                break;
            case 'category':
                $('.materials').show();
                get_category(type_link)
                break;
        }
        return false;
    });

    $('#select_materials').on('change', function(){
        var url = $(this).val();
        $('#item_link').val(url);
        return false;
    });

    $('.add_item_menu').on('click', function(){
        var menuSelected = parseInt($('#menu_select').val());
        $('#item_menu_id').val(menuSelected);
        return false;
    });

    $('#saveItem').on('click', function(){
        var form = $('#create_menu_item').serializeArray();
        $.ajax({
            type: 'POST',
            url: '/admin/menu/create-item',
            data: {'cform': form, 'save_item': true},
            success: function(data){
                if(data)
                    location.reload();
            }
        });
        return false;
    });


});

function get_pages(ctrl){
    $.ajax({
        type: 'POST',
        url: '/admin/page/list',
        data: {'get_list_pages': true},
        dataType: 'json',
        success: function(data){
            var dataHtml = '';
            $.each(data, function(i, val){
                dataHtml += '<option value="/'+ctrl+'/'+val.url+'">'+val.h1+'</option>';
            });
            $('#select_materials').append(dataHtml);
        }
    });
    return false;
}
function get_rubrics(ctrl){

}
function get_category(ctrl){

}
