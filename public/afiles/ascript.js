/**
 * Created by Muzaffar on 27.09.2020.
 */
$(document).ready(function(){

    $('#editIconForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let tablerow = button.parent().parent();
        let name = tablerow.find('#icon-name').html();
        let link = tablerow.find('#icon-link').html();
        let image = tablerow.find('#icon-image').find('img').attr('src');
        let form = modal.find('form');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
        modal.find("input[name='name']").val(name);
        modal.find("input[name='link']").val(link);
        modal.find("img").attr('src', image);

    });

    $('#deleteIconForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let tablerow = button.parent().parent();
        let name = tablerow.find('#icon-name').html();
        modal.find('.text-bold-700').html(name);
        let form = modal.find('form');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
    });

    $('#editSliderForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let card_content = button.parent().parent();
        let title = card_content.find('#slider-title').html();
        let title_en = card_content.find('#slider-title_en').html();
        let title_uz = card_content.find('#slider-title_uz').html();
        let text = card_content.find('#slider-text').html();
        let text_en = card_content.find('#slider-text_en').html();
        let text_uz = card_content.find('#slider-text_uz').html();
        let link = card_content.find('#slider-link').attr('href');
        let image = card_content.find('img').attr('src');
        let form = modal.find('form');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
        modal.find("input[name='title']").val(title);
        modal.find("input[name='title_en']").val(title_en);
        modal.find("input[name='title_uz']").val(title_uz);
        modal.find("input[name='link']").val(link);
        modal.find("img").attr('src', image);
        modal.find("textarea[name='text']").text(text);
        modal.find("textarea[name='text_en']").text(text_en);
        modal.find("textarea[name='text_uz']").text(text_uz);

    });

    $('#deleteSliderForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let card_content = button.parent().parent();
        let title = card_content.find('#slider-title').html();
        modal.find('.text-bold-700').html(title);
        let form = modal.find('form');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
    });

    $('#editAdvantageForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let card_content = button.parent().parent();
        let text = card_content.find('#advantage-text').html();
        let text_en = card_content.find('#advantage-text_en').html();
        let text_uz = card_content.find('#advantage-text_uz').html();
        let image = card_content.find('img').attr('src');
        let form = modal.find('form');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
        modal.find("img").attr('src', image);
        modal.find("textarea[name='text']").text(text);
        modal.find("textarea[name='text_en']").text(text_en);
        modal.find("textarea[name='text_uz']").text(text_uz);

    });

    $('#deleteAdvantageForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let card_content = button.parent().parent();
        let text = card_content.find('#advantage-text').html();
        modal.find('.text-bold-700').html(text);
        let form = modal.find('form');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
    });

    $('#editCertificateForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let card_content = button.parent().parent();
        let name = card_content.find('#certificate-name').html();
        let form = modal.find('form');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
        modal.find("input[name='name']").val(name);

    });

    $('#deleteCertificateForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let card_content = button.parent().parent();
        let name = card_content.find('#certificate-name').html();
        let form = modal.find('form');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
        modal.find(".text-bold-700").html(name);
    });

    $('#deletePartnerForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let card_content = button.parent().parent();
        let name = card_content.find('#partner-name').html();
        let form = modal.find('form');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
        modal.find(".text-bold-700").html(name);
    });

    $('#editCountryForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let tablerow = button.parent().parent();
        let name = tablerow.find('#country-name').html();
        let image = tablerow.find('#country-image').find('img').attr('src');
        let form = modal.find('form');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
        modal.find("input[name='name']").val(name);
        modal.find("img").attr('src', image);
    });

    $('#deleteCountryForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let tablerow = button.parent().parent();
        let name = tablerow.find('#country-name').html();
        modal.find('.text-bold-700').html(name);
        let form = modal.find('form');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
    });

    $('#editStepForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let card_content = button.parent().parent();
        let title = card_content.find('#step-title').html();
        let title_en = card_content.find('#step-title_en').html();
        let title_uz = card_content.find('#step-title_uz').html();
        let text = card_content.find('#step-text').html();
        let text_en = card_content.find('#step-text_en').html();
        let text_uz = card_content.find('#step-text_uz').html();
        let image = card_content.find('img').attr('src');
        let form = modal.find('form');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
        modal.find("img").attr('src', image);
        modal.find("input[name='title']").val(title);
        modal.find("input[name='title_en']").val(title_en);
        modal.find("input[name='title_uz']").val(title_uz);
        modal.find("textarea[name='text']").text(text);
        modal.find("textarea[name='text_en']").text(text_en);
        modal.find("textarea[name='text_uz']").text(text_uz);
    });

    $('#deleteNewForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let card_content = button.parent().parent();
        let title = card_content.find('#new-title').html();
        let form = modal.find('form');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
        modal.find(".text-bold-700").html(title);
    });

    $('#addFaqAnswerForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        modal.find("input[name='faq_id']").val(id);
    });

    $('#editRegionForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let card_content = button.parent().parent();
        let name = card_content.find('#region-name').html();
        let title = card_content.find('#region-title').html();
        let description = card_content.find('#region-description').html();
        let image = card_content.find('img').attr('src');

        let form = modal.find('form');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
        modal.find("img").attr('src', image);
        modal.find("input[name='name']").val(name);
        modal.find("input[name='title']").val(title);
        modal.find("textarea").text(description);
    });

    $('#deleteRegionForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let card_content = button.parent().parent();
        let name = card_content.find('#region-name').html();
        let form = modal.find('form');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
        modal.find(".text-bold-700").html(name);
    });

    $('#deletePlaceForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let card_content = button.parent().parent();
        let name = card_content.find('#place-name').html();
        let form = modal.find('form');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
        modal.find(".text-bold-700").html(name);
    });

    $('#editPlaceForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let card_content = button.parent().parent();
        let name = card_content.find('#place-name').html();
        let description = card_content.find('#region-description').html();
        let image1 = card_content.find('#place-image1').attr('src');
        let image2 = card_content.find('#place-image2').attr('src');

        let form = modal.find('form');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
        modal.find("#image1").attr('src', image1);
        modal.find("#image2").attr('src', image2);
        modal.find("input[name='name']").val(name);
        modal.find("textarea").text(description);
    });

    $('#changeBannerForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let card_content = button.parent().parent();
        let image = card_content.find('img').attr('src');
        let form = modal.find('form');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
        modal.find("img").attr('src', image);
    });

    $('#changeImageForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let card_content = button.parent().parent();
        let image = card_content.find('img').attr('src');
        let title = card_content.find('.image-title').html();
        let text = card_content.find('.image-text').html();
        let form = modal.find('form');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
        modal.find("img").attr('src', image);
        modal.find("#title").val(title);
        modal.find("#text").val(text);
    });


    $('#editBookForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let card_content = button.parent().parent();
        let name = card_content.find('#book-name').html();
        let author = card_content.find('#book-author').html();
        let house =card_content.find('#book-house').html();
        let description = card_content.find('#book-description').html();
        let description_en = card_content.find('#book-description_en').html();
        let description_uz = card_content.find('#book-description_uz').html();
        let image = card_content.find('img').attr('src');
        console.log(card_content);

        let form = modal.find('form');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
        modal.find("img").attr('src', image);
        modal.find("input[name='name']").val(name);
        modal.find("input[name='author']").val(author);
        modal.find("input[name='publishing_house']").val(house);
        modal.find("textarea[name='description']").text(description);
        modal.find("textarea[name='description_en']").text(description_en);
        modal.find("textarea[name='description_uz']").text(description_uz);
    });

    $('#deleteBookForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let card_content = button.parent().parent();
        let name = card_content.find('#book-name').html();
        let form = modal.find('form');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
        modal.find(".text-bold-700").html(name);
    });

    $('#callbacks-table tbody tr').click(function(){
        let arr = [];
        let td = $(this).find('td').each(function(){arr.push($(this).html());});
        let callbackId = $(this).data('id');
        let callback = $('#modal-callback');
        callback.find('#modalCallbackLabel').html(arr[0]);
        callback.find('#email').html(arr[1]);
        callback.find('#date').html(arr[5]);
        callback.find('#city').html(arr[2]);
        callback.find('#phone').html(arr[3]);
        callback.find('#message').html(arr[4]);

        let form = callback.find('form#callback-read');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + callbackId);
        let formDel = callback.find('form#callback-delete');

        let actionDel = formDel.attr('action');
        formDel.attr('action', actionDel.substring(0,actionDel.lastIndexOf('/')+1) + callbackId);

        callback.modal('show');
    });

    $('#deleteSubscribeForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let card_content = button.parent().parent();
        let email = card_content.find('#subscribe-email').html();
        let form = modal.find('form');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
        modal.find(".text-bold-700").html(email);
    });

    $('#subscribes-table tbody tr').click(function(){
        let alerts = $('#alerts-total').html();
        let row = $(this);
        let id = row.data('id');
        let url = $('#subscribe-read-link').attr('href');
        url = url.substring(0,url.lastIndexOf('/')+1) + id;

        $.ajax({
            url: url,
            method: 'get',
            dataType: 'html',
            success: function(data){
                alerts = alerts - 1;
                $('#alerts-total').html(alerts);
                $('#alerts-new').html(alerts);
                $('#alerts-new').html(alerts);
                $('#alerts-subscribe').html(
                    $('#alerts-subscribe').html() - 1
                );
                row.removeClass('h6');
            }
        });

    });

    $('#messages-table tbody tr').click(function () {
        let arr = [];
        let td = $(this).find('td').each(function () {
            arr.push($(this).html());
        });
        let callbackId = $(this).data('id');
        let callback = $('#modal-message');
        callback.find('#modalMessageLabel').html(arr[0]);
        callback.find('#email').html(arr[1]);
        callback.find('#phone').html(arr[2]);
        callback.find('#message').html(arr[3]);
        callback.find('#date').html(arr[4]);

        let form = callback.find('form#message-read');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + callbackId);

        let formDel = callback.find('form#message-delete');
        let actionDel = formDel.attr('action');
        formDel.attr('action', actionDel.substring(0,actionDel.lastIndexOf('/')+1) + callbackId);

        callback.modal('show');

    });

    $('#editFacultyForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let name = button.parent().parent().find('h6').html();
        let form = modal.find('form');
        form.find('input[name="name"]').val(name);
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
        let image = $('#faculty-image' + '-' + id).attr('src');
        $('#modal-faculty-image').attr('src', image);
        let icon = $('#faculty-icon' + '-' + id).attr('src');
        $('#modal-faculty-icon').attr('src', icon);
    });
//editTypeForm

    $('#editTypeForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let name = button.parent().parent().find('h6').html();
        let form = modal.find('form');
        form.find('input[name="name"]').val(name);
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
        let image = $('#type-image' + '-' + id).attr('src');
        $('#modal-type-image').attr('src', image);

    });

    $('#addProgramForm').on('show.bs.modal', function(event){
        let id = $("#university").find("option:selected").val();
        let url = $('#university').data('getfaculties');
        url = url.substring(0,url.lastIndexOf('/')+1) + id;
        $('#university').data('getfaculties',url);
        console.log(url);
        $.ajax({
            dataType: "json",
            url: url,
            success: function(data){
                $('#faculty').html("");
                $.each( data, function(key, val ) {
                    $('#faculty').append("<option value='" + val.id + "'>" + val.name + "</option>");
                });
            }
        });

    });

    $('#university').on('change',function(){
        let url = $(this).data('getfaculties');
        let id = $(this).find("option:selected").val();
        url = url.substring(0,url.lastIndexOf('/')+1) + id;
        $('#faculty').html("");
        $.ajax({
            dataType: "json",
            url: url,
            success: function(data){
                $('#faculty').html("");
                $.each( data, function(key, val ) {
                    $('#faculty').append("<option value='" + val.id + "'>" + val.name + "</option>");
                });
            }
        });
    });

    $('#deleteProgramForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let card_content = button.parent().parent();
        let name = card_content.find('#program-name' + id).html();
        let form = modal.find('form');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
        modal.find(".text-bold-700").html(name);
    });

    $('#editGalleryForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let card_content = button.parent().parent();
        let name = card_content.find('#gallery-name').html();
        let name_en = card_content.find('#gallery-name_en').html();
        let name_uz = card_content.find('#gallery-name_uz').html();
        let link = card_content.find('#gallery-link').attr('href');
        let text = card_content.find('#gallery-text').html();
        let text_en = card_content.find('#gallery-text_en').html();
        let text_uz = card_content.find('#gallery-text_uz').html();
        let image = card_content.find('img').attr('src');

        let form = modal.find('form');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
        modal.find("img").attr('src', image);
        modal.find("input[name='name']").val(name);
        modal.find("input[name='name_en']").val(name_en);
        modal.find("input[name='name_uz']").val(name_uz);
        modal.find("input[name='link']").val(link);
        modal.find("textarea[name='text']").text(text);
        modal.find("textarea[name='text_en']").text(text_en);
        modal.find("textarea[name='text_uz']").text(text_uz);
    });

    $('#deleteArticleForm').on('show.bs.modal', function (event) {
        var modal = $(this);
        let button = $(event.relatedTarget); // Кнопка, что спровоцировало модальное окно
        let id = button.data('id');
        let card_content = button.parent().parent();
        let title = card_content.find('#article-title').html();
        let form = modal.find('form');
        let action = form.attr('action');
        form.attr('action', action.substring(0,action.lastIndexOf('/')+1) + id);
        modal.find(".text-bold-700").html(title);
    });







});