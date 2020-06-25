$('.del').click(function (a) {
	//  Удаление Рекорда. 

 var rec_id = 	$(a.target).parent().find('.hide').text();

 	  $.ajax({
            type: "POST",
            url: 'del_record',
            data: {"record_id": parseInt( rec_id), "user_id": parseInt(user_id) } ,
            success: function(response){
 				console.log(response)
               
  

					setTimeout(function(){location.assign('/records')}, 1000);
           }
       });

});