<script>
	  //-------------------------------------------
        function imgDelete(DataID , FileName,currentID){
       swal({
                title: 'Delete ?',
                text: "Please confirm the delete of the data. !",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
                confirmButtonClass: 'btn btn-success mt-2',
                cancelButtonClass: 'btn btn-danger ml-2 mt-2',
                buttonsStyling: false
            }).then(function () {
		   		$.post('<?php echo base_url('Control/deleteimgslide')?>', { DataID : DataID ,  FileName : FileName }, function(data){  
					console.log(data);
					   if(data=='1'){
						     swal({
								title: 'Deleted !',
								text: "Data has been deleted successfully.",
								type: 'success',
								confirmButtonClass: 'btn btn-confirm mt-2'   
							}) 
 setTimeout(function(){ window.location.href = "<?php echo base_url('Control/slide_add/')?>"+currentID; }, 2000);
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
	
	//-----------------------------------
	function AddSlide(){  // news_title  news_detail
		var slide_title = $('#slide_title').val();
		var slide_titleth = $('#slide_titleth').val();
		var slide_detail = $('#slide_detail').val();
		var slide_detailth = $('#slide_detailth').val();
		var ImagesFiles = $('#ImagesFiles').val();
		var img_old = $('#img_old').val();
		var currentID = $('#currentID').val();
		if(slide_title==''){
			swal({
					title: 'Please enter a news Topic English !',
					text: "Warning !",
					type: 'warning',
					confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
			
		}else if(slide_titleth==''){
				swal({
					title: 'Please enter news Topic Thai !',
					text: "Warning !",
					type: 'warning',
					confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
		}else if(slide_detail==''){
				swal({
					title: 'Please enter news Text 1 English !',
					text: "Warning !",
					type: 'warning',
					confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
		}else if(slide_detailth==''){
				swal({
					title: 'Please enter news Text 1 Thai !',
					text: "Warning !",
					type: 'warning',
					confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
		}else if((ImagesFiles=='')&&(img_old=='')){
				swal({
					title: 'Please enter a picture Banner !',
					text: "Warning !",
					type: 'warning',
					confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
		}else{
					var postData = new FormData($("#slideForm")[0]);	
		$.ajax({
		 type:'POST',
		 url:'<?php echo base_url('control/addSlide')?>',
		 processData: false,
		 contentType: false,
		 data : postData,
		 success:function(data, status){
			console.log(data);
			$('#currentID').val(data);
		  // console.log("File Uploaded");
			console.log('data->'+data+'  status->'+status);
			
			if(status=='success'){
				 loadImages(data);
				 //loadFile(data);
				swal({
                        title: 'Data saved successfully',
                        //text: "Your file has been deleted",
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    });
                                 setTimeout(function () {
                            window.location.href = "<?php echo base_url('Control/slide_add/') ?>" + data;
                        }, 2000);
			}else{
					 swal({
                        title: 'Can not be saved!',
                        //text: "You won't be able to revert this!",
                        type: 'warning',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    });
			}

		 }
			});
			//----------------------------
		}
	}
	//---------------------------------
	//--------------------------- 
	function  loadImages(ProID){
		$.post('<?php echo base_url('control/loadSlideImages')?>' , { ProID : ProID }, function(data){
			$('#showImage').empty();
			$('#showImage').html(data);
			
		})
		
	}
	//--------------------------
	$(document).ready(function(){
		var currentID = $('#currentID').val();
		//if(currentID!=''){ 
			loadImages(currentID);
		//}	
	})
</script>


