
        
<script>
	//----------------------
	function check_frmUser() {
		
			var name_sname = $('#name_sname').val();
			var user_name = $('#user_name').val();
			var password = $('#password').val();
			var hpass = $('#hpass').val();
			var email = $('#email').val();		
		    var curentID = $('#curentID').val();		   
		
			if(name_sname==''){
				 swal(
                    {
                        title: 'Please enter Name - Surname!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            ) 
			}else if(user_name==''){
				 swal(
                    {
                        title: 'Please enter Username!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            ) 
			}else if((password=='') && (hpass=='')){
				 swal(
                    {
                        title: 'Please enter Password!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            ) 
				
			}else if(email==''){
				 swal(
                    {
                        title: 'Please enter E-mail!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            ) 
			}else{  
                        //---------------------------------------------
            var postData = new FormData($("#frm1")[0]);
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('Control/add_userData') ?>',
                processData: false,
                contentType: false,
                data: postData,
                success: function (data, status) {
                    console.log('data->' + data + '  status->' + status);
                    if (status == 'success') {
                        swal({
                            title: 'Successfully saved.',
                            //text: 'You clicked the button!',
                            type: 'success',
                            confirmButtonClass: 'btn btn-confirm mt-2'
                            });
                     setTimeout(function(){ window.location.href = "<?php echo base_url('control/admin_add/')?>"+data; }, 2000);
        } else {
                        swal({
                            title: 'can not be saved.',
                            //text: "You won't be able to revert this!",
                            type: 'warning',
                            confirmButtonClass: 'btn btn-confirm mt-2'
                        });
                    }
    }
            });
       }

   }
   //----------------------  
	function setPermission(userID,menuId,chPermission,menu_url) {
		
		if(chPermission == '1'){
			var permission = '2';
		}
		if(chPermission == '2'){
			var permission = '1';
		}
		/*	alert('กรุณาใส่หมวดข่าวสารภาษาไทย');
			return false;
				
		}else if(name_en==''){
			alert('กรุณาใส่หมวดข่าวสารภาษาอังกฤษ');
			return false;
				
		}else{*/  console.log(menu_url);	
			$.post('<?php echo base_url('Control/do_setPermission')?>' , { userID : userID , menuId : menuId , permission : permission , menu_url : menu_url }, function(data){
				if(data==1){	
					$("#ch"+menuId).val(permission);
					console.log(data);							
				}
			})
		//}
	}
	



	
</script>
