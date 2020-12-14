/**
 * Created by Muzaffar on 09.10.2020.
 */

function showSuccessModal(message){
    let msgbox = $('#SuccessModal');
    msgbox.find('h4').html(message);
    msgbox.modal('show').delay(2000).queue(function(){
        msgbox.modal('hide');
    });
}

function showAlertModal(message){
    let msgbox = $('#AlertModal');
    msgbox.find('h4').html(message);
    msgbox.modal('show').delay(2000).queue(function(){
        msgbox.modal('hide');
    });
}


$(document).ready(function(){
    // subscribe-form
    $('#subscribe-form').submit(function (event) {
        let action = $(this).attr('action');
        $.ajax({
            url: action,
            method: 'post',
            dataType: 'html',
            data: $(this).serialize(),
            success: function (data) {
                showSuccessModal(data);
            },
            error: function (err) {
                $('#error').html(err).removeClass('d-none').delay(2000).fadeOut();
            }
        });

        return false;
    });

    //callback-form

    $('#callback-form').submit(function (event) {
        let action = $(this).attr('action');
        $('.callback-m').hide();
        $.ajax({
            url: action,
            method: 'post',
            dataType: 'html',
            data: $(this).serialize(),
            success: function (data) {

                showSuccessModal(data);
            },
            error: function (err) {
                $('#error').html(err).removeClass('d-none').delay(2000).fadeOut();
            }
        });

        return false;
    });


    $('a#save').click(function(){
        $('#save_name').submit();
        return false;
    });

    $('#save_name').submit(function(event){
        event.preventDefault();
        let form = $(this);
        let action = form.attr('action');

        $.ajax({
            url: action,
            method: 'post',
            dataType: 'html',
            data: $(this).serialize(),
            success: function (data) {
                $('.profile .content .head .inner h6 .name').attr('readonly', true).css('color', '#000');
                $('.profile .content .head .inner h6 .surname').attr('readonly', true).css('color', '#000');
            },
            error: function (err) {
                console.log(err);
            }
        });

        return false;
    });

    $('#message-form').submit(function (event) {
        let action = $(this).attr('action');
        $.ajax({
            url: action,
            method: 'post',
            dataType: 'html',
            data: $(this).serialize(),
            success: function (data) {
                showSuccessModal(data);
            },
            error: function (err) {
                $('#error').html(err).removeClass('d-none').delay(2000).fadeOut();
            }
        });
        $(this).trigger("reset");
        return false;
    });

    $(".profile .content-profile .inner .list-profile .item .close").click(function(event){
       let url = $(this).data('route');
       let element = $(this).parent();
        $.ajax({
            url: url,
            type: "POST",
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data){
                if (!element.hasClass('readed')){
                    let cnt = $('#new-count').html();
                    cnt = cnt - 1;
                    $('#new-count').html(cnt);
                }
                element.remove();
                console.log(data);
            },
            error: function (msg){
                console.log(msg);
            }
        });

    });

    $(".pick-all").click(function () {
        let url = $(this).data('route');
        $.get(url, function(data){
            console.log(data);
        });
        $("#list-profile").children(".item").each(function () {
            if (!$(this).hasClass('readed')) $(this).addClass('readed');
        });
        $('#new-count').html(0);
    });

    $(".profile .content .content-bookmarks .r-partners .partners .item .fa-bookmark").click(function () {
        let url = $(this).data('route');
        $.get(url, function (data) {
            showSuccessModal(data);
        });

    });

    $(".addToFavorites .fa-bookmark").click(function () {
        let url = $(this).data('route');
        $.get(url, function (data) {
            showSuccessModal(data);
        });

    });

    $(".profile .content .content-bookmarks .r-partners .partners .item .fa-times").click(function () {
        let url = $(this).data('route');
        $.get(url, function (data) {
            showSuccessModal(data);
            $(this).parent().remove();
        });
        $(this).parent().remove();
    });


    $('#list-profile a').on('click', function (event) {
        event.preventDefault();
        let url = $(this).attr("href");
        let modal = $("#showAlert");
        $.get(url, function (data) {
            modal.find("#showAlertTitle").html(data.title);
            modal.find(".modal-body").html(data.text);
            modal.modal('show');
        });
        if (!$(this).parent().hasClass("readed")) {
            let count = $('#new-count').html();
            if (count > 0) count--;
            $('#new-count').html(count);
            $(this).parent().addClass("readed");
        }
    });

    $(".profile .content .content-files .files h3 button, .profile .content .stats .upload-files h5 button").click(function(){
       $("#loadFileForm").modal('show');
        //modalForm.find(".progress-bar").css("width", "0%");
    });

    $("#loadUserFile").on('submit', function(e){
        e.preventDefault();
        let formData = new FormData();
        let form = $(this);
        let url = form.attr('action');
        formData.append('userfile', form.find('input[name="userfile"]').prop("files")[0]);
        $.ajax({
            url: url,
            type: "POST",
            processData: false,
            contentType: false,
            cache:false,
            dataType : 'text',
            data: formData,
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
                $(this).trigger("reset");
                $("#loadFileForm").modal('hide');
                let obj = jQuery.parseJSON(data);
                if (obj.name != undefined){
                    let newfile = $('.loaded-file');
                    newfile.removeClass('d-none');
                    newfile.find('p').html(obj.name);
                    $('#recent-files').prepend(newfile);
                }
                else
                    showAlertModal(data);
            }
        });

    });

    $('#exampleFormControlSelectU').on('change',function(){
        let url = $(this).data('getfaculties');
        let id = $(this).find("option:selected").val();
        url = url.substring(0,url.lastIndexOf('/')+1) + id;
        $('#faculty').html("");
        $.ajax({
            dataType: "json",
            url: url,
            success: function(data){
                $('#inlineFormCustomSelectPrefF').html("");
                $.each( data, function(key, val ) {
                    $('#inlineFormCustomSelectPrefF').append("<option value='" + val.id + "'>" + val.name + "</option>");
                });
            }
        });
    });

    // deleteUserArticle
    $('.deleteUserArticleForm').submit(function (event) {
        event.preventDefault();
        let form = $(this);
        let action = form.attr('action');
        console.log(action);
        $.ajax({
            url: action,
            method: 'post',
            dataType: 'html',
            data: $(this).serialize(),
            success: function (data) {
                showSuccessModal(data);
                form.parent().parent().remove();
            },
            error: function (err) {
                showAlertModal(err);
            }
        });

        return false;
    });

    $(".profile .content .content-checklists .checklists .btns i").click(function () {
        let url = $(this).data('route');
        $.get(url, function (data) {
        });
        $(this).parent().parent().remove();

    });

    $('#videoUploadForm').submit(function(event){
        event.preventDefault();
        let formData = new FormData();
        let form = $(this);
        let progressBar = form.find('#progressBar');
        let url = form.attr('action');
        formData.append('video', form.find('input[name="video"]').prop("files")[0]);
        formData.append('photo1', form.find('input[name="photo1"]').prop("files")[0]);
        formData.append('photo2', form.find('input[name="photo2"]').prop("files")[0]);
        formData.append('videobg', form.find('input[name="videobg"]').prop("files")[0]);
        formData.append('title', form.find('input[name="title"]').val());
        formData.append('description', form.find('#videoBlogDes').val());

        $.ajax({
            url: url,
            type: "POST",
            processData: false,
            contentType: false,
            cache:false,
            dataType : 'text',
            data: formData,
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            xhr: function(){
                var xhr = $.ajaxSettings.xhr(); // получаем объект XMLHttpRequest
                xhr.upload.addEventListener('progress', function(evt){ // добавляем обработчик события progress (onprogress)
                    if(evt.lengthComputable) { // если известно количество байт
                        // высчитываем процент загруженного
                        var percentComplete = Math.ceil(evt.loaded / evt.total * 100);
                        // устанавливаем значение в атрибут value тега <progress>
                        // и это же значение альтернативным текстом для браузеров, не поддерживающих <progress>
                        progressBar.css('width', percentComplete + '%').text(percentComplete + '%');
                    }
                }, false);
                return xhr;
            },
            success: function(data){
                showSuccessModal(data);
            }
        });

    });




});

