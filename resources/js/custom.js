import Echo from "laravel-echo";
window.Pusher = require('pusher-js');
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '48828a1881f413cb24ab',
    cluster: 'mt1'
});

function joinChannel(id) {
    window.Echo.private('conversation.'+id)
        .listen('MessageSent',(e)=>{
            let new_msg = createMessage(e);
            $('#single-thread .card-body').append(new_msg);
            $('.chat').animate({ scrollTop: document.getElementById('single-thread').scrollHeight}, 'slow');
        });
}
function leaveChannel(id) {
    window.Echo.leave('conversation.'+id);
}
function getUsers(name) {
    $.ajax({
        url: '/member/users/'+name,
        method: 'get',
        success: (resp)=>{
            $('#all-threads .card-body').html('');
            resp = JSON.parse(resp);
            if (resp.length >0){
                resp.forEach((member)=>{
                    let    new_member = "<a href=\"#\" class=\"user row text-decoration-none\" data-name=\""+member.userName+"\" data-id=\""+member.id+"\">\n" +
                        "                <div class=\"col-2\">\n" +
                        "                    <img src=\""+member.userImage+"\" alt=\"\" class=\"rounded-circle image\" height=\"50\" width=\"50\">\n" +
                        "                </div>\n" +
                        "                <div class=\"details col-10 row\">\n" +
                        "                    <div class=\"ml-2 name col-12 text-dark font-weight-bold\">"+member.userName+" <span class=\"time text-muted float-right\"><i class=\"fa fa-circle-notch text-danger\"></i></span></div>\n" +
                        "                    <div class=\"ml-2 content col-12\">\n" +
                        "                        Start a conversation with this member \n" +
                        "                    </div>\n" +
                        "                </div>\n" +
                        "            </a>\n" +
                        "            <hr class=\"border-danger\" />";
                    $('#all-threads .card-body').append(new_member);
                });
            }else{
                $('#all-threads .card-body').append("<h4 class='text-danger font-weight-bold'>No such Member found</h4>");
            }
        },
        error: (error)=>{
            console.log(error);
        }
        }
    );
}
function getConversations() {
    $('#all-threads .card-body').html('');
    $.ajax({
        url: '/member/conversations',
        method: 'get',
        success: (resp)=>{
            resp = JSON.parse(resp);
            if (resp.length >0){
                resp.forEach((conversation)=>{
                    let    new_thread = "<a href=\"#\" class=\"thread row text-decoration-none\" data-name=\""+conversation.receiver_name+"\" data-id=\""+conversation.id+"\">\n" +
                        "                <div class=\"col-2\">\n" +
                        "                    <img src=\""+conversation.receiver_image+"\" alt=\"\" class=\"rounded-circle image\" height=\"50\" width=\"50\">\n" +
                        "                </div>\n" +
                        "                <div class=\"details col-10 row\">\n" +
                        "                    <div class=\"ml-2 name col-12 text-dark font-weight-bold\">"+conversation.receiver_name+" <span class=\"time text-muted float-right\"><i class=\"fa fa-circle-notch text-danger\"></i>"+ conversation.messages[0].updated_at+"</span></div>\n" +
                        "                    <div class=\"ml-2 content col-12\">\n" +
                        "                        "+conversation.messages[0].message+"\n" +
                        "                    </div>\n" +
                        "                </div>\n" +
                        "            </a>\n" +
                        "            <hr class=\"border-danger\" />"

                    $('#all-threads .card-body').append(new_thread);
                });
            }else{
                $('#all-threads .card-body').append("<h4 class='text-danger font-weight-bold'>Search for a user to begin a conversation.</h4>");
            }
        },
        error: (error)=>{
            console.log('error',error)
        }
    })
}
function createMessage(message) {
    if(!message.isReceiver){
        var new_msg = "<p class=\"text-center text-muted mt-3\">"+message.updated_at+"</p>\n" +
            "                    <div class=\"message sender row text-decoration-none\">\n" +
            "                        <div class=\"details col-10 row\">\n" +
            "                            <div class=\"ml-2 content text-right col-12\">\n" +
            "                                "+message.message+"" +
            "                            </div>\n" +
            "                        </div>\n" +
            "                        <div class=\"col-2\">\n" +
            "                            <img src=\""+message.senderImage+"\" alt=\"\" class=\"rounded-circle image\" height=\"50\" width=\"50\">\n" +
            "                        </div>\n" +
            "                    </div>";
    }else{
        var new_msg = "<p class=\"text-center text-muted mt-3\">"+message.updated_at+"</p>\n" +
            "                    <div class=\"message receiver row text-decoration-none\">\n" +
            "                        <div class=\"col-2\">\n" +
            "                            <img src=\""+message.senderImage+"\" alt=\"\" class=\"rounded-circle image\" height=\"50\" width=\"50\">\n" +
            "                        </div>\n" +
            "                        <div class=\"details col-10 row\">\n" +
            "                            <div class=\"ml-2 text-left content col-12\">\n" +
            "                                "+message.message+"" +
            "                            </div>\n" +
            "                        </div>\n" +
            "                    </div>";
    }
    return new_msg;
}
function getMessages(conversation_id){
    $('#single-thread .card-body').html('');
    $.ajax({
        url: '/member/conversation/'+conversation_id+'/messages',
        method: 'get',
        success: (resp)=>{
            resp = JSON.parse(resp);
            $('#single-thread').data('id',conversation_id);
            resp.forEach((message)=>{
               let new_msg = createMessage(message);
                $('#single-thread .card-body').append(new_msg);
            });
        },
        error: (error)=>{
            console.log('error',error)
        }
    })
}
function sendMessage(msg, id){
    $.ajax({
        url: '/member/conversation/'+id+'/messages',
        method: 'post',
        data: {
            _token: $("meta[name=csrf-token]").attr('content'),
            id: id,
            message: msg
        },
        success: (resp)=>{
            resp = JSON.parse(resp)
            let new_msg = createMessage(resp);
            $('#single-thread .card-body').append(new_msg);
            $('.chat').animate({ scrollTop: document.getElementById('single-thread').scrollHeight}, 'slow');
            $('#msg').val('');
        },
        error: (error)=>{
            console.log(error);
        }
    });
}
function startConversation(id){
    $.ajax({
        url: '/member/user/'+id+'/conversation',
        method: 'get',
        success: (resp)=>{
            resp = JSON.parse(resp);
            joinChannel(resp.id);
            getMessages(resp.id);
        },
        error: (error)=>{
            console.log(error);
        }
    });
}

$(document).ready(()=>{
    /*Chat*/
    $('#single-thread').fadeToggle('fast');
    $('.chat').fadeToggle('fast');
    $('.chat .search').fadeToggle('fast');

    $(document).on('click','.chat-search',()=>{
        $('.card-header .default').slideToggle('slow',()=>{
            $('.card-header .search').slideToggle('slow')
        });
    });
    $(document).on('click','.chat-search-close',()=>{
        $('#all-threads .card-body').html('');
        getConversations()
        $('.chat .search').slideToggle('slow',()=>{
            $('.card-header .default').slideToggle('slow');
        });
    });
    $(document).on('click','.chat-toggle',()=>{
        getConversations();
        $('#single-thread').fadeOut('fast');
        $('#all-threads').fadeIn('slow');
        $('.chat').slideToggle('slow')
    });
    $(document).on('click','.chat-close',()=>{
        $('.chat').slideToggle('slow')
    });
    $(document).on('click','.thread',function(){
        joinChannel($(this).data('id'));
        $('#single-thread-name').html($(this).data('name'));
        getMessages($(this).data('id'));
        $('#all-threads').fadeToggle('slow',()=>{
            $('#single-thread').fadeToggle('slow');
            $('.chat').animate({ scrollTop: document.getElementById('single-thread').scrollHeight}, 'slow');
        })
    });
    $(document).on('click','.user',function(){
        startConversation($(this).data('id'));
        $('#single-thread-name').html($(this).data('name'));
        $('#all-threads').fadeToggle('slow',()=>{
            $('#single-thread').fadeToggle('slow');
            $('.chat').animate({ scrollTop: document.getElementById('single-thread').scrollHeight}, 'slow');
        });
    });
    $(document).on('click','.chat-back',()=>{
        getConversations();
        leaveChannel($("#single-thread").data('id'));
        $('#single-thread').fadeToggle('slow',()=>{
            $('#all-threads').fadeToggle('slow')
        })
    });
    $('#msg_submit').on('submit',(e)=>{
        e.preventDefault();
        let msg = $('#msg').val();
        sendMessage(msg, $('#single-thread').data('id'));
    });
    $('.chat .navbar-search').on('submit',(e)=>{
        e.preventDefault();
        let name = $('#search-bar').val();
        getUsers(name);
    });

    /*End Chat*/
    $(document).on('click','.revertUrl',function(){
        revertURL('#renderImage',"https://via.placeholder.com/500x250");
    });
    $(document).on('change','.readUrl',function(){
        readURL(this,'#renderImage');
    });
});

function readURL(input,img) {
    var fileTypes = ['jpg', 'jpeg', 'png'];  //acceptable file types
    if (input.files && input.files[0]) {
        var extension = input.files[0].name.split('.').pop().toLowerCase(); //file extension from input file
        if(fileTypes.indexOf(extension) > -1)
        {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(img)
                    .attr('src', e.target.result)
                // .width(350)
                // .height(200);
            };
            reader.readAsDataURL(input.files[0]);
        }else{
            alert("Invalid photo")
        }
    }
}
function revertURL(img,src) {
    $(img).attr('src', src)
}

