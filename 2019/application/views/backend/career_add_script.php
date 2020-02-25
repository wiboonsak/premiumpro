
<script>

           //---------------------- txtTitle catFiles 
    function Add() {
        var career_name = $('#career_name').val();
        var career_nameth = $('#career_nameth').val();
        var category_name = $('#category_name').val();
        var category_nameth = $('#category_nameth').val();
        var location = $('#location').val();
       var property = tinyMCE.editors[$('#property').attr('id')].getContent();
        var property_th = tinyMCE.editors[$('#property_th').attr('id')].getContent();
        var Job_duty = tinyMCE.editors[$('#Job_duty').attr('id')].getContent();
        var Job_duty_th = tinyMCE.editors[$('#Job_duty_th').attr('id')].getContent();
        $('#propertyen').val(property);
        $('#propertyth').val(property_th);
        $('#Jobduty').val(Job_duty);
        $('#Jobdutyth').val(Job_duty_th);
        var propertyen = $('#propertyen').val();
        var propertyth = $('#propertyth').val();
        var quantity = $('#quantity').val();
        var currentID = $('#currentID').val();
        if (career_name == '') {
            swal(
                    {
                        title: 'Please enter Career English!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            ) 
     }else if(career_nameth == ''){ 
			    swal(
					{
						title: ' Please enter Career Thai!',
						confirmButtonClass: 'btn btn-confirm mt-2',
						type: 'warning'
					}
				)
     }else if(category_name == ''){ 
			    swal(
					{
						title: ' Please enter Category English!',
						confirmButtonClass: 'btn btn-confirm mt-2',
						type: 'warning'
					}
				)
     }else if(category_nameth == ''){ 
			    swal(
					{
						title: ' Please enter Category Thai!',
						confirmButtonClass: 'btn btn-confirm mt-2',
						type: 'warning'
					}
				)
     }else if(location == ''){ 
			    swal(
					{
						title: ' Please enter Location!',
						confirmButtonClass: 'btn btn-confirm mt-2',
						type: 'warning'
					}
				)
     }else if(propertyen == ''){ 
			    swal(
					{
						title: ' Please enter Property English!',
						confirmButtonClass: 'btn btn-confirm mt-2',
						type: 'warning'
					}
				)
     }else if(propertyth == ''){ 
			    swal(
					{
						title: ' Please enter Property Thai!',
						confirmButtonClass: 'btn btn-confirm mt-2',
						type: 'warning'
					}
				)
     }else if(quantity == ''){ 
			    swal(
					{
						title: ' Please enter quantity!',
						confirmButtonClass: 'btn btn-confirm mt-2',
						type: 'warning'
					}
				)
        } else {
            //---------------------------------------------
            var postData = new FormData($("#careerForm")[0]);
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('Control/addcareer') ?>',
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
                     setTimeout(function(){ window.location.href = "<?php echo base_url('Control/career_add/')?>"+data; }, 2000);
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
		
    });
  
</script>
