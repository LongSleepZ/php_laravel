function padLeft(str, len) {
    str = '' + str;
    return str.length >= len ? str : new Array(len - str.length + 1).join("0") + str;
}

function notification(msg, status) {
    switch (status) {
        case 0  :
            css = 'alert alert-success alert-dismissible';
            title = '成功';
            break;
        case 1  :
            css = 'alert alert-warning alert-dismissible';
            title = '警告';
            break;
        case 99 :
            css = 'alert alert-danger  alert-dismissible';
            title = '錯誤';
            break;
        default :
            css = 'alert alert-success alert-dismissible';
            title = '訊息';
    }

    var msgDiv ='<div id="notification" class="'+css+'" role="alert"  style="display:none">';
        msgDiv +='<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        msgDiv +='<strong>'+title+' </strong>' ;
        msgDiv +=msg;
        msgDiv +='</div>';
        
    $('#commentDiv').before(msgDiv);    
    $('#notification').slideDown().fadeOut(1000,function(){$('#notification').remove();});
}

$(document).ready(function () {
    //新增留言
    $('#addComment').click(function (e) {
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        });

        e.preventDefault();

        var formData = {
            name: $('#name').val(),
            email: $('#email').val(),
            content: $('#content').val(),
            post_id: $('#post_id').val()
        };
        var type = "POST";
        var post_id = $('#post_id').val();
        var url = post_id+'/comment';

        console.log(formData);

        $.ajax({
            type: type,
            url: url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);

                var credate = new Date((data.created_at).replace(/-/g, '/'));

                var comment = '<div class="media">';
                comment += ' <div class="media-body">';
                comment += '   <h4 class="media-heading">' + data.name + '(' + data.email + ')';
                comment += '       <small>' + (credate.getYear() + 1900) + '-'
                        + padLeft(credate.getMonth(), 2) + '-'
                        + padLeft(credate.getDay(), 2)
                        + '</small>';
                comment += '   </h4>';
                comment += data.content;
                comment += ' </div>';
                comment += '</div>';
                $('#comment-list').append(comment);

                $('#name').val('');
                $('#email').val('');
                $('#content').val('');

                notification('回覆留言成功',0);
            },
            error: function (data) {
                console.log('Error:', data);
                notification('回覆留言失敗', 99);
            }
        });
    });
});