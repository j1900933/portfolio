$('.squeeze').on('change',function(){
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url:"engineers/squeeze",
        type:"get",
        data:{
            'employment_status_id':$('.squeeze').val(),
        },
    })
    .done(function(data){
        console.log(data);
        $('.squeeze').html(data);
    })
    .fail(function(_data){
        alert("絞り込み検索失敗");
    });
    return false;
});