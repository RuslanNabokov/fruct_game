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

$('select[@name=vibor] option:selected').val();

$('.form-control').change(function(ar) {
	 var role = $(this).val(); 
	 var user_idd = $(this).parent('td').parent('tr').find('.hide').text();

	  	  $.ajax({
            type: "POST",
            url: 'res_role',
            data: {"role": role, "user_id": user_idd ,"user_id_owner": parseInt(user_id) } ,
            success: function(response){
 			    
  					console.log(response)

			 //		setTimeout(function(){location.assign('/records')}, 1000);
           }
       });

})