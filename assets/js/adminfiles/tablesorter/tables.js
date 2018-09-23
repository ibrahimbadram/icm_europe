
	  $(document).ready(function(){
	$( "#page_list" ).sortable({
		placeholder	: "ui-state-highlight",
		update		: function(event, ui)
		{
			var page_id_array = new Array();
			$('#page_list tr').each(function(){
				page_id_array.push($(this).attr("id"));
			});
			$.ajax({
				url: baseURL+'admin' + '/' + $("#table").val()+ '/updateRecordsOrder',
				method:"POST",
				data:{page_id_array:page_id_array},
				success:function(data)
				{
					//alert(data);
				}
			});
		}
	});

});