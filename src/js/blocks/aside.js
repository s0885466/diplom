$(document).ready(function() {
    $('#alert_success').hide();
    $('#alert_foul').hide();
    $('#send_message').on('click', function () {
        var params = {
            send_name:  $('#send_name').val(),
            send_email:  $('#send_email').val(),
            text_message:  $('#text_message').val()
        };

        $.ajax({
                url: '/form/message',
                type: 'POST',
                cache: false,
                data: params,
                success: function(data) {
                    console.log(data);

                    if (data == 1) {
                        $('#alert_foul').hide();
                        $('#alert_success').show(500);
                        setTimeout(function () {
                            $('#alert_success').hide(1500)
                        },2000);


                    }
                    else {

                        var arr = JSON.parse(data);

                        var str='';
                        for(var el in arr) {
                            str += '<div class = " p-2 alert-danger">'+ arr[el] +'</div>'
                        };

                        $('#alert_foul').html(str);
                        $('#alert_foul').hide();
                        $('#alert_ok').hide();
                        $('#alert_foul').show(700);

                        if (arr.send_name){

                            setTimeout(function () {
                                $('#send_name').addClass('shake');
                            },100);

                            setTimeout(function () {
                                $('#send_name').removeClass('shake');
                            },1000);
                        }

                        if (arr.send_email){

                            setTimeout(function () {
                                $('#send_email').addClass('shake');
                            },100);

                            setTimeout(function () {
                                $('#send_email').removeClass('shake');
                            },1000);
                        }

                        if (arr.text_message){

                            setTimeout(function () {
                                $('#text_message').addClass('shake');
                            },100);

                            setTimeout(function () {
                                $('#text_message').removeClass('shake');
                            },1000);
                        }

                        setTimeout(function () {
                            $('#send_message').addClass('shake');
                        },100);

                        setTimeout(function () {
                            $('#send_message').removeClass('shake');
                        },1000);
                    }
                }
            }
        );
    });
});