<script>

           //---------------------- txtTitle catFiles 
    function Add() {
        var maincate = $('#maincate').val();
        var subcate = $('#subcate').val();
        var detail_en = tinyMCE.editors[$('#detail_encon').attr('id')].getContent();
        var detail_th = tinyMCE.editors[$('#detail_thcon').attr('id')].getContent();
        $('#commentencon').val(detail_en);
        $('#commentthcon').val(detail_th);
        var pack_img = $('#pack_img').val();
        var imgold = $('#imgold').val();
        var tool_map_url = $('#tool_map_url').val();
        var currentID = $('#currentID').val();
        if (maincate == '-1') {
            swal(
                    {
                        title: 'Please Select Main Category!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            ) 
     }else if(subcate == ''){ 
			    swal(
					{
						title: ' Please Select Sub Category!',
						confirmButtonClass: 'btn btn-confirm mt-2',
						type: 'warning'
					}
				)
     }else if((pack_img == '')&&(imgold == '')){ 
			    swal(
					{
						title: ' Please Enter Images!',
						confirmButtonClass: 'btn btn-confirm mt-2',
						type: 'warning'
					}
				)
     }else if(tool_map_url == ''){ 
			    swal(
					{
						title: ' Please Enter Location!',
						confirmButtonClass: 'btn btn-confirm mt-2',
						type: 'warning'
					}
				)
        } else {
        
            //---------------------------------------------
            var postData = new FormData($("#frm1")[0]);
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('Control/addproject') ?>',
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
                     setTimeout(function(){ window.location.href = "<?php echo base_url('Control/Project_add/')?>"+data; }, 2000);
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
          //==================================
        function changemain(changeValue) {
		//console.log('changeValue->'+changeValue)
		$('#subcate').focus();
        $.post('<?php echo base_url('Control/changemain') ?>', {changeValue: changeValue},
         function (data) {
 
         $('#subcate').empty();
		 
         $('#subcate').html(data);});
        }
        //-----------------------
	function  loadImagespack(ProID){
		$.post('<?php echo base_url('Control/loadImgpack')?>' , { ProID : ProID }, function(data){
			$('#showImagepack').empty();
			$('#showImagepack').html(data);
			
		})
		
	}
        //-------------------------------------------
        function imgDelete(DataID , FileName){
		var currentID = $('#currentID').val();
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
		   		$.post('<?php echo base_url('Control/deleteimg')?>', { DataID : DataID ,  FileName : FileName }, function(data){  
					console.log(data);
					   if(data=='1'){
						     swal({
								title: 'Deleted !',
								text: "Data has been deleted successfully.",
								type: 'success',
								confirmButtonClass: 'btn btn-confirm mt-2'   
							}) 
 setTimeout(function(){ window.location.href = "<?php echo base_url('Control/Project_add/')?>"+currentID; }, 2000);
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
        function add_map(n1,n2){
	var n1 = $('#get_lat').val();
	var n2 = $('#get_lng').val();
	var company = 'Hatyai Premium Property';
  PopupCenter('<?php echo base_url();?>Control/load_map?company='+company+'&lat_p='+n1+'&lng_p='+n2,'xtf','900','600'); 
}
function PopupCenter(url, title, w, h) {
    // Fixes dual-screen position                         Most browsers      Firefox
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : window.screenX;
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : window.screenY;

    var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    var systemZoom = width / window.screen.availWidth;
var left = (width - w) / 2 / systemZoom + dualScreenLeft
var top = (height - h) / 2 / systemZoom + dualScreenTop
    var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w / systemZoom + ', height=' + h / systemZoom + ', top=' + top + ', left=' + left);

    // Puts focus on the newWindow
    if (window.focus) newWindow.focus();
}
//-----------------------------------------------------------
  function ADDFacilities(){
             
        var num = $('.selectall').length;
        num = num + 1;
        $('#facilities_a').append('<br class="selectall"><select class="form-control selectall"  name="Facilities[]" id="Facilities'+num+'" ><option value="">---Select---</option><?php foreach ($Facilitiesstatus->result() as $Facilities) { ?> <option value="<?php echo $Facilities->id ?>"><?php echo $Facilities->topic_en ?> </option><?php } ?> </select>');
        
       
    
        }
        //--------------------------------------------------
        function deletefac(dataID,table,currentID){  
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
		   		$.post('<?php echo base_url('Control/delete')?>', { dataID : dataID , table : table }, function(data){  
					console.log(data);
					   if(data=='1'){
						     swal({
								title: 'Deleted !',
								text: "Data has been deleted successfully.",
								type: 'success',
								confirmButtonClass: 'btn btn-confirm mt-2'   
							}) 
                                                        loadFac(currentID);
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
        //--------------------------------------------------
        function deletefunction(dataID,table){  
          var currentID = $('#currentID').val();
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
		   		$.post('<?php echo base_url('Control/delete')?>', { dataID : dataID , table : table }, function(data){  
					console.log(data);
					   if(data=='1'){
						     swal({
								title: 'Deleted !',
								text: "Data has been deleted successfully.",
								type: 'success',
								confirmButtonClass: 'btn btn-confirm mt-2'   
							}) 
                                                        loadFunction(currentID);
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
        //-----------------------------------------------
        function AddFacdata() {
        var Facilities = $('#Facilities').val();
        var currentID = $('#currentIDFac').val();
        if (Facilities == '') {
            swal(
                    {
                        title: 'Please Select Facilities!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            ) 
        } else {
        
            //---------------------------------------------
            var postData = new FormData($("#frm2")[0]);
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('Control/AddFacdata') ?>',
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
                              $('.selecta').val('');
                    $('.selectall').remove();
                     loadFac(currentID);
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
	function  loadFac(ProID){
		$.post('<?php echo base_url('Control/loadFac')?>' , { ProID : ProID }, function(data){
			$('#showFacilitiesproject').empty();
			$('#showFacilitiesproject').html(data);
			
		})
		
	}
//---------------------------------------------------------
	function  loadFunction(ProID){
		$.post('<?php echo base_url('Control/loadFunction')?>' , { ProID : ProID }, function(data){
			$('#showFunction').empty();
			$('#showFunction').html(data);
			
		})
		
	}
        //-----------------------------------------------------------
  function ADDFunction(){
             
        var num = $('.functionl').length;
        num = num + 1;
        $('#facilities_a2').append('<br><select class="form-control functionl"  name="Function[]" id="Function'+num+'" ><option value="">---Select---</option><?php foreach ($Facilitiesstatus->result() as $Facilities) { ?> <option value="<?php echo $Facilities->id ?>"><?php echo $Facilities->topic_en ?> </option><?php } ?> </select>');
        
       
    
        }
           //--------------------------- 
    function  loadImages(ProID) {
        $.post('<?php echo base_url('Control/loadImg') ?>', {ProID: ProID}, function (data) {
            $('#showImage').empty();
            $('#showImage').html(data);
        });
    }
                  //==================================
    function updateOrder(dataID, FieldName, changeValue,currentID) {
        if ((changeValue == '')) {
            swal({
                title: 'Warning !',
                text: "Please enter a Order.",
                type: 'warning',
                confirmButtonClass: 'btn btn-confirm mt-2'
            }) 
        } else {
            $.post('<?php echo base_url('Control/updateorder') ?>', {dataID: dataID, FieldName: FieldName, changeValue: changeValue});
            loadImages(currentID);
        }
    }
                  //==================================
    function updateOrdergall(dataID, FieldName, changeValue,currentID) {
        if ((changeValue == '')) {
            swal({
                title: 'Warning !',
                text: "Please enter a Order.",
                type: 'warning',
                confirmButtonClass: 'btn btn-confirm mt-2'
            }) 
        } else {
            $.post('<?php echo base_url('Control/updateOrdergall') ?>', {dataID: dataID, FieldName: FieldName, changeValue: changeValue});
            loadgallery(currentID);
        }
    }
    //-------------------------------------------
        function comfirmDelete(DataID , FileName){
		var currentID = $('#currentID').val();
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
		   		$.post('<?php echo base_url('Control/deleteimghouse')?>', { DataID : DataID ,  FileName : FileName }, function(data){  
					console.log(data);
					   if(data=='1'){
						     swal({
								title: 'Deleted !',
								text: "Data has been deleted successfully.",
								type: 'success',
								confirmButtonClass: 'btn btn-confirm mt-2'   
							}) 
                                                       loadImages(currentID);
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
              //---------------------- txtTitle catFiles 
    function Addhouse() {
        var detail_en = tinyMCE.editors[$('#detail_en').attr('id')].getContent();
        var detail_th = tinyMCE.editors[$('#detail_th').attr('id')].getContent();
        $('#commenten2').val(detail_en);
        $('#commentth2').val(detail_th);
        var Function = $('#Function').val();
        var currentID = $('#currentID').val();
        
        if(detail_en == ''){ 
			    swal(
					{
						title: ' Please Enter Description English!',
						confirmButtonClass: 'btn btn-confirm mt-2',
						type: 'warning'
					}
				)
     }else if(detail_th == ''){ 
			    swal(
					{
						title: ' Please Enter Description Thai!',
						confirmButtonClass: 'btn btn-confirm mt-2',
						type: 'warning'
					}
				)
        } else {
        
            //---------------------------------------------
            var postData = new FormData($("#frm3")[0]);
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('Control/Addhouse') ?>',
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
                     setTimeout(function(){ window.location.href = "<?php echo base_url('Control/Project_add/')?>"+data; }, 2000);
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
            //----------------------------------
   function  loadnearby() {
   var currentID = $('#currentID').val();
        $.post('<?php echo base_url('control/loadnearby') ?>', {currentID:currentID}, function (data) {
            $('#shownearby').html(data);
        });
    }
    //---------------------------------------------
	  function addnearby(){
                 var dataid = '';
                 var currentID = $('#currentID').val();
		 var Minutes = $('#Minutes').val();
		 var Places_en = $('#Places_en').val();
		 var Places_th = $('#Places_th').val();
		 var distance = $('#distance').val();
                        if (Places_en == '') {
            swal(
                    {
                        title: 'Please enter Places English!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            );
    }else if(Places_th == ''){
        swal(
                    {
                        title: 'Please enter Places Thai!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            );
    }else if(Minutes == ''){
        swal(
                    {
                        title: 'Please Select Minutes!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            );
    }else if(distance == ''){
        swal(
                    {
                        title: 'Please enter Distance!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            );
        } else {
                 $.post('<?php echo base_url('control/addnearby')?>' , {Places_en:Places_en,Places_th:Places_th,Minutes:Minutes,distance:distance,currentID:currentID,dataid:dataid} , function(data){
                     
			$('#Places_en').val('');		
			$('#Places_th').val('');		
			$('#Minutes').val('');		
			$('#distance').val('');		
			loadnearby();
			});
	  }
          }
            //---------------------------------------------
	  function updatenearby(dataid){
                 var currentID = $('#currentID').val();
		 var Minutes = $('#Minutes'+dataid).val();
		 var Places_en = $('#Places_en'+dataid).val();
		 var Places_th = $('#Places_th'+dataid).val();
		 var distance = $('#distance'+dataid).val();
                        if (Places_en == '') {
            swal(
                    {
                        title: 'Please enter Places English!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            );
    }else if(Places_th == ''){
        swal(
                    {
                        title: 'Please enter Places Thai!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            );
    }else if(Minutes == ''){
        swal(
                    {
                        title: 'Please Select Minutes!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            );
    }else if(distance == ''){
        swal(
                    {
                        title: 'Please enter Distance!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            );
        } else {
                 $.post('<?php echo base_url('control/addnearby')?>' , {Places_en:Places_en,Places_th:Places_th,Minutes:Minutes,distance:distance,currentID:currentID,dataid:dataid} , function(data){
                     	
			loadnearby();
			});
	  }
          }
           //--------------------------------------------------
        function Deletenearby(dataID,table){  
          var currentID = $('#currentID').val();
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
		   		$.post('<?php echo base_url('Control/delete')?>', { dataID : dataID , table : table }, function(data){  
					console.log(data);
					   if(data=='1'){
						     swal({
								title: 'Deleted !',
								text: "Data has been deleted successfully.",
								type: 'success',
								confirmButtonClass: 'btn btn-confirm mt-2'   
							}) 
                                                        loadnearby(currentID);
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
         function ADDyoutubeinput(){
             
        var num = $('.youtube3').length;
        num = num + 1;
        $('#linkyoutube_a').append("<br class='youtube3'><input name='youtube[]' type='text' id='youtube"+num+"' class='form-control form-control-sm youtube3' value=''>");
        }
        //---------------------------------------------------------
	function  loadyoutube(ProID){
		$.post('<?php echo base_url('Control/loadyoutube')?>' , { ProID : ProID }, function(data){
			$('#showyoutube').empty();
			$('#showyoutube').html(data);
			
		})
		
	}
        //---------------------------------------------------------
	function  loadgallery(ProID){
		$.post('<?php echo base_url('Control/loadgallery')?>' , { ProID : ProID }, function(data){
			$('#showgallery').empty();
			$('#showgallery').html(data);
			
		})
		
	}
            //--------------------------------------------------
        function deleteyoutube(dataID,table,currentID){  
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
		   		$.post('<?php echo base_url('Control/delete')?>', { dataID : dataID , table : table }, function(data){  
					console.log(data);
					   if(data=='1'){
						     swal({
								title: 'Deleted !',
								text: "Data has been deleted successfully.",
								type: 'success',
								confirmButtonClass: 'btn btn-confirm mt-2'   
							}) 
                                                        loadyoutube(currentID);
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
            //--------------------------------------------------
        function deletegallrey(dataID,FileName){  
        	var currentID = $('#currentID').val();
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
		   		$.post('<?php echo base_url('Control/deletegallrey')?>', { dataID : dataID ,  FileName : FileName }, function(data){  
					console.log(data);
					   if(data=='1'){
						     swal({
								title: 'Deleted !',
								text: "Data has been deleted successfully.",
								type: 'success',
								confirmButtonClass: 'btn btn-confirm mt-2'   
							}) 
                                                       loadgallery(currentID);
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
                     //---------------------- txtTitle catFiles 
    function AddImages() {
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
                url: '<?php echo base_url('Control/AddImages') ?>',
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
                     loadgallery(currentID);
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
   //---------------------------------------------
	  function ADDyoutube(){
	 var youtube = $('#youtube').val();
        var currentID = $('#currentID3').val();
        if (youtube == '') {
            swal(
                    {
                        title: 'Please enter Link youtube!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            ) 
        } else {
        
            //---------------------------------------------
            var postData = new FormData($("#frm5")[0]);
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('Control/ADDyoutube') ?>',
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
                    $('.youtube').val('');
                    $('.youtube3').remove();
                    loadyoutube(currentID);
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
          

  
	 
            

//-------------------------
	 $(document).ready(function () {
             loadImagespack('<?php echo $currentID ?>');
             loadFac('<?php echo $currentID ?>');
             loadFunction('<?php echo $currentID ?>');
             loadImages('<?php echo $currentID ?>');
             loadnearby('<?php echo $currentID ?>');
             loadyoutube('<?php echo $currentID ?>');
             loadgallery('<?php echo $currentID ?>');
             
//             $("iframe").css({"width": "200px !important", "height": "150px !important"});
//             $("iframe").width(200);
//             $("iframe").height(150);
             
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
