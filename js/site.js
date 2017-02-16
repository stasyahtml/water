//'use strict'

$(document).ready(function() {

    $('.owl-carousel').owlCarousel({
        loop:true,
        dots:true,
        slideBy: 1,
        margin:0,
        nav:true,
        center: false,
        responsive:{
            0:{
                items:1,
                dots:false,
                center: true
            },
            650:{
                items:2,
                dots:false
            },
            800:{
                items:3

            },
            1024:{
                items:4
            }
        }
    });

    var name='', phone='', bottle='';

    //$('input.tel').on('keyup', function(){
    //    $(this).val($(this).val().replace (/\D/, ''));
    //});

    $('input[placeholder]').blur(function(){
        var elem = $(this);
        if(elem.val() === ''){
            elem.addClass('error');
        } else {
            elem.removeClass('error');
        }
    });

    $(".question_form").submit(function(e){
        e.preventDefault();
        var error = false;
        $(this).find('input[placeholder]').each(function(){
            var elem = $(this);
            if(elem.val() === ''){
                error = true;
                elem.addClass('error');
            } else {
                elem.removeClass('error');
            }
        });
        if (error) return false;

        name = $(this).find('input[name=name]').val();
        phone = $(this).find('input[name=phone]').val();

        $("#feedback_form")[0].reset();
        $.fancybox({
            'href' : '#feedback',
            wrapCSS : 'feedback_window'
        });
    });

    $("#feedback_form").submit(function(e){
        e.preventDefault();

        var age = $('input[name=age]:checked', '#feedback_form').val();
        if (!age) {

            $('.feedback_window').animate({
                scrollTop: $("#feedback_form").offset().top
            }, 1000);
            return false;
        }

        var form_data = $(this).serializeArray();
        form_data.push({
            name: 'name',
            value: name
        });
        form_data.push({
            name: 'phone',
            value: phone
        });
        form_data.push({
            name: 'action',
            value: 'question'
        });
        
        $.ajax({
            type: "POST",
            url: "mail.php",
            data: form_data,
            dataType: 'json'
        }).done(function (res) {
            if (res.send) {
                $("#feedback_form")[0].reset();
                $("#feedback_result .result").html(res.responce);
                $.fancybox({
                    maxWidth: '80%',
                    closeEffect: 'elastic',
                    closeSpeed: 150,
                    href : '#feedback_result',
                    wrapCSS : 'feedback_result_window'
                });
                name='';
                phone='';
            } else {
                alert("Возникла ошибка при отправке формы!!!")
            }
        });
    });

    $('.order_form').submit(function(e){
        e.preventDefault();
        var error = false;
        $(this).find('input[placeholder]').each(function(){
            var elem = $(this);
            if(elem.val() === ''){
                error = true;
                elem.addClass('error');
            } else {
                elem.removeClass('error');
            }
        });
        if (error) return false;

        var form_data = $(this).serializeArray();
        form_data.push({
            name: 'action',
            value: 'order'
        });

        var form = this;
        $.ajax({
            type: "POST",
            url: "mail.php",
            data: form_data,
            dataType: 'json'
        }).done(function (res) {
            if (res.send) {
                $(form)[0].reset();
                $.fancybox({
                    'href' : '#feedback_thanks',
                    wrapCSS : 'feedback_thanks_window'
                });
            } else {
                alert("Возникла ошибка при отправке формы!!!")
            }
        });
    });

    $('.order_button').click(function(e){
        e.preventDefault();
        bottle = $(this).data('type');
        $.fancybox({
            'href' : '#order_form',
            wrapCSS : 'order_form_window'
        });
    });

    $("#order_form form").submit(function(e){
        e.preventDefault();
        var error = false;
        $(this).find('input[placeholder]').each(function(){
            var elem = $(this);
            if(elem.val() === ''){
                error = true;
                elem.addClass('error');
            } else {
                elem.removeClass('error');
            }
        });
        if (error) return false;

        var form_data = $(this).serializeArray();
        form_data.push({
            name: 'bottle',
            value: bottle
        });
        form_data.push({
            name: 'action',
            value: 'order_bottle'
        });

        var form = this;
        $.ajax({
            type: "POST",
            url: "mail.php",
            data: form_data,
            dataType: 'json'
        }).done(function (res) {
            if (res.send) {
                $(form)[0].reset();
                $.fancybox({
                    'href' : '#feedback_thanks',
                    wrapCSS : 'feedback_thanks_window'
                });
                bottle = '';
            } else {
                alert("Возникла ошибка при отправке формы!!!")
            }
        });
    });

    $(function($){
        $(".phone-mask").mask("+7 (999) 999-9999");
    });

});




