$(function(){
    $("#country").autocomplete({
        source: function(request,response){
            $.getJSON("ajaxCountry.php?keyword=" + request.term,function(data){
                if(data!=null){
                    response($.map(data, function(item){
                        return {
                            label: item.name,
                            value: item.name,
                            id: item.customer_id,
							tel: item.tel
                        };
                    }));
                }
            });
        },
        select: function(event,ui){
            $("span.result-data").html(ui.item.label);
			$('#name').val(ui.item.label);
			$('#tel').val(ui.item.tel);
        }
    });
});