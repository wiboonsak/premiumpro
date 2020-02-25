<script>

         //---------------------- txtTitle catFiles 
    function Add() {
//        var Title = $('#Title').val();
//        var Name = $('#Name').val();
//        var Lastname = $('#Lastname').val();
//        var card_no = $('#card_no').val();
//        var birthday = $('#birthday').val();
//        var Age = $('#Age').val();
         var radioValue = $("input[name='gender']:checked").val();
            if(radioValue){
                alert("Your are a - " + radioValue);
            }

//        var currentID = $('#currentID').val();
//        if (topic_en == '') {
//            swal(
//                    {
//                        title: 'Please enter Topic English!',
//                        confirmButtonClass: 'btn btn-confirm mt-2',
//                        type: 'warning'
//                    }
//            ) 
//     }else if(topic_th == ''){ 
//			    swal(
//					{
//						title: ' Please enter Topic Thai!',
//						confirmButtonClass: 'btn btn-confirm mt-2',
//						type: 'warning'
//					}
//				)
//        } else {
//            //---------------------------------------------
//            var postData = new FormData($("#newsForm")[0]);
//            $.ajax({
//                type: 'POST',
//                url: '<?php echo base_url('Control/addnews') ?>',
//                processData: false,
//                contentType: false,
//                data: postData,
//                success: function (data, status) {
//                    console.log(data);
//                    $('#currentID').val(data);
//                    console.log('data->' + data + '  status->' + status);
//                    if (status == 'success') {
//                        swal({
//                            title: 'Successfully saved.',
//                            //text: 'You clicked the button!',
//                            type: 'success',
//                            confirmButtonClass: 'btn btn-confirm mt-2'
//                            });
//                     setTimeout(function(){ window.location.href = "<?php echo base_url('Control/news_add/')?>"+data; }, 2000);
//        } else {
//                        swal({
//                            title: 'can not be saved.!',
//                            //text: "You won't be able to revert this!",
//                            type: 'warning',
//                            confirmButtonClass: 'btn btn-confirm mt-2'
//                        });
//                    }
//    }
//            });
//       }

   }
     //--------------------------------------
    function Addimg() {
          var img2 = $('#imggallery').val();
        var currentID = $('#currentID2').val();
        
        if(img2 == ''){ 
			    swal(
					{
						title: ' Please Enter Images!',
						confirmButtonClass: 'btn btn-confirm mt-2',
						type: 'warning'
					}
				)
        } else {
            //---------------------------------------------
            var postData = new FormData($("#frm4")[0]);
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('Control/addimg') ?>',
                processData: false,
                contentType: false,
                data: postData,
                success: function (data, status) {
                    console.log(data);
                    $('#currentID').val(data);
                    console.log('data->' + data + '  status->' + status);
                    if (status == 'success') {
                        swal({
                            title: 'Successfully saved.',
                            //text: 'You clicked the button!',
                            type: 'success',
                            confirmButtonClass: 'btn btn-confirm mt-2'
                            });
                     loadimg(currentID);
        } else {
                        swal({
                            title: 'can not be saved.!',
                            //text: "You won't be able to revert this!",
                            type: 'warning',
                            confirmButtonClass: 'btn btn-confirm mt-2'
                        });
                    }
    }
            });
       }

    }
     //---------------------------------------------------------
	function  loadimg(ProID){
		$.post('<?php echo base_url('Control/loadimgnews')?>' , { ProID : ProID }, function(data){
			$('#showImage').empty();
			$('#showImage').html(data);

//$.post('<?php //echo base_url('Control/loadgallery')?>' , { ProID : ProID }, function(data){
//			$('#showImage').empty();
//			$('#showImage').html(data);
			
		})
		
	}
              //--------------------------------------------------
        function deletenewsimg(dataID,FileName,currentID){  
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
		   		$.post('<?php echo base_url('Control/deletenewsimg')?>', { dataID : dataID ,  FileName : FileName }, function(data){  
					console.log(data);
					   if(data=='1'){
						     swal({
								title: 'Deleted !',
								text: "Data has been deleted successfully.",
								type: 'success',
								confirmButtonClass: 'btn btn-confirm mt-2'   
							}) 
                                                       loadimg(currentID);
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
 

//-------------------------
	 $(document).ready(function () {
             loadimg('<?php echo $currentID ?>');
             
           tinymce.init({
            selector: "textarea.ex",
            theme: "modern",
            height: 300,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
            ]
        });

    });

	
</script>
