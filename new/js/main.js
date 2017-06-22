var g_data='CHCP 65001\r\n';
$(document).ready(function() {
    $(".butn").click(function() {	
		$('#url').val('');
		$('#url2').val('');
		var id = $("#id").val();
		g_data='CHCP 65001\r\n';
        if (id != '') {
			$('.notice').html('正在加载...');
            $.getScript('../inc/getList.php?id=' + id,
            function() {
                try{
					t();
				}catch(err){
					$('.notice').html('获取列表出错');
				}
            });
        }
    });
	    $(".butn2").click(function() {		
		if(g_data!=''){
		var blob = new Blob([g_data], {type: "text/plain;charset=utf-8"});
		saveAs(blob, "aria2c.bat");
		}
		/*
		var url = $.ajax({
			type:"POST",
		    url:'../inc/getBat.php',
			data:{data:g_data},
			datatype:'text',
			success:function(data){
           console.log(data);
		   //window.open(data);          
            } 
		});*/
    })
}); 
function t() {
    var i=0;
    s0.chapters.forEach(function(value, index, array) {
        value.lessons.forEach(function(value, index, array) {
            value.units.forEach(function(value, index, array) {
                if (value.contentType === 1) i++;   
            });
        });
    });
	var ii=0;
    s0.chapters.forEach(function(value, index, array) {
        value.lessons.forEach(function(value, index, array) {
            value.units.forEach(function(value, index, array) {
                if (value.contentType === 1) {
                    var url = $.ajax({
                        url: '../inc/getUrl.php?cid=' + value.contentId + '&id=' + value.id,
                        dataType: "text",
                        success: function(data) {
                            //console.log(value.contentId, value.id, value.name, data);
                            ii++;   
							var url ='aria2c -s 5  -j 10  -x 16 -c -o "'+value.name+'.mp4" '+data;
                            g_data =g_data +url+'\r\n';							
							var str =$('#url').val() +data+'\n';
                            $('#url').val(str);                        
							if(ii==i){$('.notice').html('共'+i+'条视频，已全部获取完毕! 可以选择生成bat结合组件包下载，或下拉查看全部地址');$('.codrops-demos').show();}
                        }
                    });

                }
            });
        });
    });
    $('.notice').html(i+'条视频');
}
$(function(){
		$('.codrops-demos').hide();
});