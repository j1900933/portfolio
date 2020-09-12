var id_data = $('.comment').data('id');

var result = $('.comment').map(function(){
    return $(this).data();
}).toArray();
console.log(result);

$('.comments').on('change',function(){
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url:"engineers/indexUpdate",
        type:"post",
        dataType:"json",
        data:{
            'id':result,
            'comment':$(".comment").val(), // `.comments` クラスを持っている要素に data-* 属性で id をもたせる
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

$('.employment').on('change',function(){
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url:"engineers/indexUpdate",
        type:"post",
        dataType:"json",
        data:{
            'id':$(".id").val(),
            'employment_status_id':$(".employment").val(),
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

$('.inHouseStatus').on('change',function(){
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url:"engineers/indexUpdate",
        type:"post",
        dataType:"json",
        data:{
            'id':$(".id").val(),
            'in_house_status_id':$(".inHouseStatus").val(),
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

$('.engineerSkill').on('change',function(){
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url:"engineers/indexUpdate",
        type:"post",
        dataType:"json",
        data:{
            'id':$(".id").val(),
            'engineer_skill_id':$(".engineerSkill").val(),
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

$('.humanSkill').on('change',function(){
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url:"engineers/indexUpdate",
        type:"post",
        dataType:"json",
        data:{
            'id':$(".id").val(),
            'human_skill_id':$(".humanSkill").val(),
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