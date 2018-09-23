/**
 * File : js 
 * 
 * This file contain the validation of edit banner form
 * 
 * @author Kishor Mali
 */
$(document).ready(function(){
	

	var addForm = $("#addForm");
	
	var validator = addForm.validate({
		
		rules:{
			website :{ required : true }
		},
		messages:{
			website :{ required : "This field is required" }
		}
	});

	var editForm = $("#editForm");
	
	var validator = editForm.validate({
		
		rules:{
			title :{ required : true },
			description : {required : true }
		},
		messages:{
			title :{ required : "This field is required" },
			description : { required : "This field is required" }
		}
	});

	jQuery(document).on("click", ".deleterow", function(){
		var Id = $(this).data("id"),
			hitURL = siteURL + "admin/"+$("#table").val()+"/deleterow",
			currentRow = $(this);
		var confirmation = confirm("Are you sure to delete this row ?");
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { Id : Id } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) {
				alert("successfully deleted"); 
				}
				else if(data.status = false) { 
				alert("Deletion failed"); 
				}
				else { alert("Access denied..!"); 
				}
			});
		}
	});
	
	        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", siteURL + "admin/company_news/Listing/" + value);
            jQuery("#searchList").submit();
        });
	
});

function delete_image(id) {
			var id = id,
			hitURL = siteURL + "admin/"+$("#table").val()+"/deleteimage",
			currentRow = $(this);
		var confirmation = confirm("Are you sure to delete this image ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				if(data.status = true) {
				alert("Image successfully deleted"); 
				 location.reload();
				}
				else if(data.status = false) { 
				alert("Image deletion failed"); 
				}
				else { alert("Access denied..!"); 
				}
			});
		}
}