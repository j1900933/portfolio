$('.comments').on('change',function(){
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url:"engineers/getData",
        type:"post",
        dataType:"json",
        data:{
            'id':$("#id").val(),
            'comment':$(".comment").val(),
        },
    })
    .done(function(data){
        console.log(data);
    })
    .fail(function(_data){
        alert("ajax Error");
    });
    return false;
});

