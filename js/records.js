$('.del').click(function (a) {
	//  Удаление Рекорда. 

 var rec_id = 	$(a.target).parent().find('.hide').text();

 	  $.ajax({
            type: "POST",
            url: 'del_record',
            data: {"record_id": parseInt( rec_id)},
            success: function(response){
 
                
                 location.assign('/records')
           }
       });

});