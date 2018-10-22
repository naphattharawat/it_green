$(function(){
    $("#inputAuto").autocomplete({
        source: function(request,response){
            $.getJSON("./script/autocomplete/json.php?keyword=" + request.term,function(data){
                if(data!=null){
                    response($.map(data, function(item){
                        return {
                        	label: item.name,
                            name: item.name,
							id: item.id,
							nameServer: item.nameServer,
							path: item.path,
							description:item.description,
							type:item.type,
                            is_delete:item.is_delete
                        };
                    }));
                }
            });
        },
        select: function(event,ui){
			$('#name').val(ui.item.name);
			$('#id').val(ui.item.id);
			$('#nameServer').val(ui.item.nameServer);
			$('#nameServer').val(ui.item.nameServer);
			$('#path').val(ui.item.path);
			$('#description').val(ui.item.description);
            $('#type').val(ui.item.type);      
            $('#is_delete').val(ui.item.is_delete);      
        }
    });
});
