$('.comments').on('change',function(){
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url:"engineers/getData",
        type:"post",
        dataType:"json",
        data:{
            'id':$(".id").val(),
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

$('.employment').on('change',function(){
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url:"engineers/getData",
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
        url:"engineers/getData",
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
        url:"engineers/getData",
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
        url:"engineers/getData",
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