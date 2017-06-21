$(document).ready(function() {
    $(".butn").click(function() {
        var id = $("#id").val();
        if (id != '') {
            $.getScript('/inc/getList.php?id=' + id,
            function() {
                t();
            });
        }
    })
}); 
function t() {
    var i=0;
    s0.chapters.forEach(function(value, index, array) {
        value.lessons.forEach(function(value, index, array) {
            value.units.forEach(function(value, index, array) {
                if (value.contentType === 1) {
                    var url = $.ajax({
                        url: '/inc/getUrl.php?cid=' + value.contentId + '&id=' + value.id,
                        dataType: "text",
                        success: function(data) {
                            console.log(value.contentId, value.id, value.name, data);
                            i++;   
                            var str = $('#url').val() +data+'\n';
                            $('#url').val(str);
                            $('p').html(i+'条视频，已获取完毕');
                        }
                    });

                }
            });
        });
    });
    
}