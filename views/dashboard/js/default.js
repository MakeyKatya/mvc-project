$(function(){

    $.get('../dashboard/xhrGetListings', function(o){

        for(var i = 0; i < o.length;i++){
            $('#listInserts').append('<li class="list-group-item">' + o[i].text + '<a class="del" rel="' + o[i].id + '" href="#">__x</a></li>');
        }

        $('#listInserts').on('click','.del', function(){
            delItem = $(this);
            var id = $(this).attr('rel');
            $.post('../dashboard/xhrDeleteListings', {'id': id}, function(o){
                delItem.parent().remove();
            },'json');
            return false;
        });

    },'json');

    $('#randomInsert').submit(function(){

        var url = $(this).attr('action');
        var data = $(this).serialize();

        $.post(url,data,function(o){
            $('#listInserts').append('<li class="list-group-item">' + o.text + '<a class="del" rel="' + o.id + '" href="#">__x</a></li>');
        }, 'json');

        return false;
    });

}());




