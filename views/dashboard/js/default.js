$(function(){
   $('#randomInsert').submit(function(){

      var url = $(this).attr('action');
      var data = $(this).serialize();

       $.post(url, data, function(o){
         alert (1);
      });


       $.get('../dashboard/xhrGetListings', function (o) {

           for(var i = 0; i < o.length;i++){
               $('#listInserts').append(o[i].text);
           }
       },'json');


      return false;
   });
});




