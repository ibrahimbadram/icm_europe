/**
* File : js 
* 
* This file contain the validation of edit groups form
* 
* @author Kishor Mali
*/
$(document).ready(function(){
checkinputs();
$('.checkinputs').change(function(e) {
checkinputs();

});

var addForm = $("#addForm");

var validator = addForm.validate({

rules:{
title :{ required : true },
all_languages :{ required : true },
type :{ required : true },
active : {required : true }
},
messages:{
title :{ required : "This field is required" },
all_languages :{ required : "This field is required" },
type :{ required : "This field is required" },
active : { required : "This field is required" }
}
});

var editForm = $("#editForm");

var validator = editForm.validate({

rules:{
title :{ required : true },
active : {required : true }
},
messages:{
title :{ required : "This field is required" },
active : { required : "This field is required" }
}
});

jQuery(document).on("click", ".deleterow", function(){
var id = $(this).data("id"),
hitURL = baseURL + "admin/"+$("#table").val()+"/deleterow",
currentRow = $(this);
var confirmation = confirm("Are you sure to delete this row ?");

if(confirmation)
{
jQuery.ajax({
type : "POST",
dataType : "json",
url : hitURL,
data : { id : id } 
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
jQuery("#searchList").attr("action", baseURL + "groups/Listing/" + value);
jQuery("#searchList").submit();
});


});

function delete_image(id) {

var hitURL = baseURL + "admin/"+$("#table").val()+"/deleteimage";
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
location.reload(true);
}
else if(data.status = false) { 
alert("Image deletion failed"); 
}
else { alert("Access denied..!"); 
}
});
}
}

function checkall(name) {
if($('#'+name+'_all').prop('checked') == true){
$('.'+name+'_input').prop('checked', true);
} else {
$('.'+name+'_input').removeAttr('checked');
} 
checkinputs();
checkboxvalidation();
}

function slidelanguages(name) {
if( name == 1 || name == ''){
$('.languages').slideUp('fast');
$('#languages').removeClass('required');
} else {
$('.languages').slideDown('fast');
$('#languages').addClass('required');
} 
}

function slidetable(name) {
if( name == 1 || name == ''){
//$('input[type=checkbox]').prop('checked', true);
$('input[type=checkbox]').removeAttr('checked');
$('.pages_table').slideUp('fast');
$('#checkboxesval').removeClass('required');
} else {
//$('input[type=checkbox]').removeAttr('checked');
$('.pages_table').slideDown('fast');
$('#checkboxesval').addClass('required');
} 
}

function checkallrow(name) {
if($('#'+name+'_label').prop('checked') == true){
$('.'+name+'_input').prop('checked', true);
} else {
$('.'+name+'_input').removeAttr('checked');
} 
checkinputs();
checkboxvalidation();
}

function checkinputs(){
$('.checkinputs').each(function(){
var name = $(this).val();
var id = $(this).attr('id');
var columnid = id.split('_');
var column = columnid[0];
if ( $('.'+column+'_input:checked').length < $('.'+column+'_input').length) {
$('#'+column+'_all').removeAttr('checked');
} else {
$('#'+column+'_all').prop('checked', true);
} 
if ( $('.'+name+'_input:checked').length == 0) {
$('#'+name+'_label').removeAttr('checked');
} else {
$('#'+name+'_label').prop('checked', true);
} 
})
checkboxvalidation();
}

function checkboxvalidation(){
if ( $('.checkinputs:checked').length == 0) {
$('#checkboxesval').val('');
} else {
$('#checkboxesval').val(1);
}
}