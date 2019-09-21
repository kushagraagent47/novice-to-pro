$("#submit").click( function() {
    $.post( $("#like").attr("action"), $("#like :input").serializeArray(), function(info){ $("#result").html(info);});
});

$("#like") .submit( function() {
    return false;
});