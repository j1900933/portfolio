$('.comment').on('change',function(){
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url:"engineers/indexUpdate",
        type:"post",
        dataType:"json",
        data:{
            'id':$(this).data('id'),
            'comment':$(this).val(), // `.comments` クラスを持っている要素に data-* 属性で id をもたせる
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
            'id':$(this).data('id'),
            'employment_status_id':$(this).val(),
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
            'id':$(this).data('id'),
            'in_house_status_id':$(this).val(),
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
            'id':$(this).data('id'),
            'engineer_skill_id':$(this).val(),
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
            'id':$(this).data('id'),
            'human_skill_id':$(this).val(),
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