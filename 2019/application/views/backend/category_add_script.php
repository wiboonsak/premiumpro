<script>
	function comfirmDelete(dataID,table,product_name){  
            	
       swal({
                title: 'Delete '+product_name + '?',
                text: "Please confirm the delete of the data. !",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
                confirmButtonClass: 'btn btn-success mt-2',
                cancelButtonClass: 'btn btn-danger ml-2 mt-2',
                buttonsStyling: false
            }).then(function () {
		   		$.post('<?php echo base_url('Control/delete')?>', { dataID : dataID , table : table }, function(data){  
					console.log(data);
					   if(data=='1'){
						     swal({
								title: 'Deleted !',
								text: "Data has been deleted successfully.",
								type: 'success',
								confirmButtonClass: 'btn btn-confirm mt-2'   
							}) 
                                                        setTimeout(function(){ window.location.href = "<?php echo base_url('Control/category')?>"; }, 2000);
						   //------ images RowImg   file RowFile
					   }else{
						   swal({
							title: 'Error',
							text: "Cannot delete data",
							type: 'error',
							confirmButtonClass: 'btn btn-confirm mt-2'
                    		})
					   }
				});
               
            }, function (dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                    swal({
                        title: 'Cancelled',
                        text: "You have canceled the data deletion.",
                        type: 'error',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    })
                }
            })

	}
         //----------------------
	function setShow_onWeb(dataID , val2 , table){  
		var changeCheckbox = document.querySelector('.js-check-change');		
  		var x = changeCheckbox.checked; 		
		if(val2 == '0'){
		   var check = '1';
		}
		if(val2 == '1'){
		   var check = '0';
		}
		$.post('<?php echo base_url('control/set_ShowOnWeb')?>' , { dataID : dataID , check : check , table : table }  , function(data){
			if(data==1){
				$('#ch'+dataID).val(check);
				swal({
					title: 'edited data.',
					//text: 'You clicked the button!',
					type: 'success',
					confirmButtonClass: 'btn btn-confirm mt-2'
				}) ; 
			}else{
				swal({
					title: 'Cannot edit data!',
					//text: "You won't be able to revert this!",
					type: 'warning',
					confirmButtonClass: 'btn btn-confirm mt-2'
				}) ;
			}
		});
	}
          //----------------------------------
   function  loadcate() {
        $.post('<?php echo base_url('control/loadcate') ?>', {}, function (data) {
            $('#showData').html(data);
        });
    }
    //---------------------------------------------
	  function addcate(cate_lv, main_cate_id,dataid){
		 var main_cate_id = $('#main_cate_id option:selected').val();
		 var cate_name_en = $('#cate_name_en').val();
		 var cate_name_th = $('#cate_name_th').val();
                        if (cate_name_en == '') {
            swal(
                    {
                        title: 'Please enter Category English!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            );
    }else if(cate_name_th == ''){
        swal(
                    {
                        title: 'Please enter Category Thai!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            );
        } else {
                 $.post('<?php echo base_url('control/addcate')?>' , {cate_name_en:cate_name_en,cate_name_th:cate_name_th,cate_lv:cate_lv,main_cate_id:main_cate_id,dataid:dataid} , function(data){
                     
			$('#main_cate_id').val('');		
			$('#cate_name_en').val('');		
			$('#cate_name_th').val('');		
			loadcate();
			});
	  }
          }
            //---------------------------------------------
	  function updatecate(cate_lv, main_cate_id,dataid){
		 var cate_name_en = $('#name_en'+dataid).val();
		 var cate_name_th = $('#name_th'+dataid).val();
                        if (cate_name_en == '') {
            swal(
                    {
                        title: 'Please enter Category English!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            );
    }else if(cate_name_th == ''){
        swal(
                    {
                        title: 'Please enter Category Thai!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            );
        } else {
                 $.post('<?php echo base_url('control/addcate')?>' , {cate_name_en:cate_name_en,cate_name_th:cate_name_th,cate_lv:cate_lv,main_cate_id:main_cate_id,dataid:dataid} , function(data){
                    		
			loadcate();
			});
	  }
          } 

	//--------------------------------
	$('#datatable').DataTable();
	$(document).ready(function(){
		loadcate();
	})
</script>