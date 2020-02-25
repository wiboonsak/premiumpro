<?php $checkURL02 = $this->uri->segment(3);
	  $classIcon = '';	

	  if(isset($checkURL02)){		
		  $curriculumDataX = $this->Project_model->list_Facilities($checkURL02);
		  foreach($curriculumDataX->result() as $curriculumDataY){	}		  
		  $classIcon = $curriculumDataY->icon_class;
	  }

?>
<script>

           //---------------------- txtTitle catFiles 
    function Add() {
        var topic_en = $('#topic_en').val();
        var topic_th = $('#topic_th').val();
        var icon_class = $('#icon_class').val();
        var detail_en = tinyMCE.editors[$('#detail_en').attr('id')].getContent();
        var detail_th = tinyMCE.editors[$('#detail_th').attr('id')].getContent();
        $('#commenten').val(detail_en);
        $('#commentth').val(detail_th);
        var currentID = $('#currentID').val();
        if (topic_en == '') {
            swal(
                    {
                        title: 'Please enter Topic English!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            ) 
     }else if(topic_th == ''){ 
			    swal(
					{
						title: ' Please enter Topic Thai!',
						confirmButtonClass: 'btn btn-confirm mt-2',
						type: 'warning'
					}
				)
     }else if(icon_class == ''){ 
			    swal(
					{
						title: ' Please Select Icon!',
						confirmButtonClass: 'btn btn-confirm mt-2',
						type: 'warning'
					}
				)
        } else {
            //---------------------------------------------
            var postData = new FormData($("#FacilitiesForm")[0]);
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('Control/addFacilities') ?>',
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
                     setTimeout(function(){ window.location.href = "<?php echo base_url('Control/Facilities_add/')?>"+data; }, 2000);
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
        /////////////////////////////////	
		
	var url3 = '<?php echo $checkURL02;?>';	
	var	classIcon = '<?php echo $classIcon;?>';
		
	if((url3 !='') && (classIcon !='')){
		
		var classIcon2 = classIcon.replace(' ', '.');
		
		$('.'+classIcon2+'.icon-click').removeClass("icon-click");
		$('.'+classIcon2).addClass('select-icon');			
	}		
    });
//----------------------------
    	$( ".icon-click" ).click(function() { 
		$(".select-icon").addClass("icon-click");
		$(".select-icon").removeClass("select-icon");
		$(this).removeClass("icon-click");
		var class2 = $(this).attr("class"); 
		$(this).addClass("select-icon");
		 console.log("class2...."+class2);
		
		//var class3 = 
		$("#icon_class").val(class2);
		$( "<style>.icon-click:before { font-size: 20px;cursor: pointer;padding: 0 7px 0 7px; }</style>" ).appendTo( "head" );								
	}); 
        function test(classname){
            //$(".icon-click").css("font-size", "20px");
             $( "<style>.icon-click:before { font-size: 20px;cursor: pointer;padding: 0 7px 0 7px; }</style>" ).appendTo( "head" );
            if($('.'+classname).hasClass('select-icon')){
            $('.'+classname).removeclass('select-icon');
            $('.'+classname).addclass('icon-click');
             $( "<style>."+classname+":before { font-size: 20px; }</style>" ).appendTo( "head" );
        }else{
           $( "<style>."+classname+":before { font-size: 50px; }</style>" ).appendTo( "head" );
        }
        }
	
</script>
