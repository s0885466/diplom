$(document).ready(function () {

    $('#alert_ok').hide();
    $('#alert_warning').hide();


    $(document ).on( "click", "#add_btn", function() {
        var params = {
            name: $('#add_name').val(),
            title: $('#add_title').val(),
            mass: $('#add_mass').val(),
            note: $('#add_note').val()
        };


        $.ajax({
                url: '/private/add_one',
                type: 'POST',
                cache: false,
                data: params,
                success: function(data) {
                    console.log(data);

                    if (data == 1) {
                        $('#alert_warning').hide();
                        $('#alert_ok').show(500);
                        setTimeout(function () {
                            $('#alert_ok').hide(1500)
                        },2000);
                        $('#table-bd').load(' #table-bd');

                    }
                    else {
                        var arr = JSON.parse(data);
                        var str='';
                        for(var el in arr) {
                            str += '<div class = " p-2 alert-danger">'+ arr[el] +'</div>'
                        };

                        $('#alert_warning').html(str);
                        $('#alert_warning').hide();
                        $('#alert_ok').hide();
                        $('#alert_warning').show(700);

                        if (arr.add_name){

                            setTimeout(function () {
                                $('#add_name').addClass('shake');
                            },100);

                            setTimeout(function () {
                                $('#add_name').removeClass('shake');
                            },1000);
                        }

                        if (arr.add_title){

                            setTimeout(function () {
                                $('#add_title').addClass('shake');
                            },100);

                            setTimeout(function () {
                                $('#add_title').removeClass('shake');
                            },1000);
                        }

                        if (arr.add_mass){

                            setTimeout(function () {
                                $('#add_mass').addClass('shake');
                            },100);

                            setTimeout(function () {
                                $('#add_mass').removeClass('shake');
                            },1000);
                        }

                        setTimeout(function () {
                            $('#add_btn').addClass('shake');
                        },100);

                        setTimeout(function () {
                            $('#add_btn').removeClass('shake');
                        },1000);



                    }
                }
            }
        );
    });

    $(document ).on( "click", ".remove_btn", function() {
        var params = {
            id: $(this).attr('data-remove')
        };

        console.log(params);

        $.ajax({
                url: '/private/remove_one',
                type: 'POST',
                cache: false,
                data: params,
                success: function(data) {
                    console.log(data);

                    if (data == 1) {

                        $('#table-bd').load(' #table-bd');

                    }
                    else {
                        var arr = JSON.parse(data);

                        console.log('Вообще то нехрен ломать мой сайт ' + str);


                    }
                }
            }
        );
    });


    $(document ).on( "click", ".change_btn", function(e) {
        var id = $(this).attr('data-change');

        var params = {
            id: id,
            name: $('.change_name[data-change =' + id +']').val(),
            weight: $('.change_weight[data-change =' + id +']').val()
        };

        console.log(params);

        $.ajax({
                url: '/private/change_one',
                type: 'POST',
                cache: false,
                data: params,
                success: function(data) {
                    if (data == 1) {
                        console.log('изменения прошли успешно')
                        setTimeout(function () {
                            $('.change_btn[data-change =' + id +']').val('✓готово');

                        },100);

                        setTimeout(function () {
                            $('.change_btn[data-change =' + id +']').val('изменить');

                        },1000);

                    }

                    else {
                        var arr = JSON.parse(data);
                        if(arr['name']){
                            setTimeout(function () {
                                $('.change_name[data-change =' + id +']').addClass('shake')
                            },100);
                            setTimeout(function () {
                                $('.change_name[data-change =' + id +']').removeClass('shake')
                            },1000);
                        }
                        if(arr['weight']){
                            setTimeout(function () {
                                $('.change_weight[data-change =' + id +']').addClass('shake')
                            },100);
                            setTimeout(function () {
                                $('.change_weight[data-change =' + id +']').removeClass('shake')
                            },1000)

                        }

                        console.log(id);
                        //console.log(data);

                    }
                }
            }
        );
    });


});