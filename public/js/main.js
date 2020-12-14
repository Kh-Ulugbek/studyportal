$(document).ready(function() {
    
    
    // if ($(window).width() > 992) {

        
    // }
    let lastScrollTop = 0, delta = 5;
    $(window).scroll(function(event){
        let st = $(this).scrollTop();

        if(st > 100){
            $('header').css('background', '#fff')
        } else{
            $('header').css('background', 'none')
        }

        if(Math.abs(lastScrollTop - st) <= delta)
            return;
        if (st > lastScrollTop){
            $("header").addClass('nav-up');
        } else {
            $("header").removeClass('nav-up');
        }
        lastScrollTop = st;

    });

	$('.payment_cards .card_item').click(function(){
		$('.payment_cards .card_item').removeClass('card_item_active');
		$(this).addClass('card_item_active');
	});

	$('.card_paypal').click(function(){
		$('#card_paypal').addClass('card_item_active');
	});

	$('.card_payme').click(function(){
		$('#card_payme').addClass('card_item_active');
	});

	$( function() {
	    $( "#datepicker" ).datepicker();
	});

	$('header .inner .links .search-btn').click(function(){
		$('.search-field').css({'opacity': '1', 'transform': 'translate(0)'});
		$('.search-field input').focus()
	});

	$('.search-field .close-search').click(function(){
		$('.search-field').css({'opacity': '0', 'transform': 'translateY(-140%)'});
	})

	$('.profile .btn-personalizate').click(function(){
		$('.profile .content .head .inner h6 .name').removeAttr('readonly').css('color', '#1A6CFB').focus();
		$('.profile .content .head .inner h6 .surname').removeAttr('readonly').css('color', '#1A6CFB');
	});

	$('.callback-m .close-c').click(function(){
		$('.callback-m').css('opacity', '0');
		setTimeout(function(){
			$('.callback-m').css('display', 'none')
		}, 350);
	});

	$('.pay_modal .close-c').click(function(){
		$('.pay_modal').css('opacity', '0');
		setTimeout(function(){
			$('.pay_modal').css('display', 'none')
		}, 350);
	});

	$('.pay_in_filter button').click(function(){
		$('.pay_modal').css('display', 'block')
		setTimeout(function(){
			$('.pay_modal').css('opacity', '1');
		}, 100);
	});

	$('header .btn-callback button').click(function(){
		$('.callback-m').css('display', 'block')
		setTimeout(function(){
			$('.callback-m').css('opacity', '1');
		}, 100);
	});

	$('.controllers-countries-slider .left').click();

	$('.menu-mob').click(function(){
		$('.links-mob').addClass('active-mob-m')
	});

	$('.links-mob .close-m').click(function(){
		$('.links-mob').removeClass('active-mob-m')
	});

	$( function() {
	    $( "#accordion-faq-c" ).accordion({
	      heightStyle: "content"
	    });
	});

	$( function() {
	    $( "#accordion-faq-c-2" ).accordion({
	      heightStyle: "content"
	    });
	});

	$( function() {
	    $( "#accordion-faq-c-3" ).accordion({
	      heightStyle: "content"
	    });
	});

	$( function() {
	    $( "#accordion-faq-c-4" ).accordion({
	      heightStyle: "content"
	    });
	});

	$( function() {
	    $( "#accordion-faq-c-5" ).accordion({
	      heightStyle: "content"
	    });
	});

	$( function() {
	    $( "#accordion-faq-c-6" ).accordion({
	      heightStyle: "content"
	    });
	});

	$( function() {
	    $( "#accordion-faq-c-7" ).accordion({
	      heightStyle: "content"
	    });
	});

	$( function() {
	    $( "#accordion-faq-c-8" ).accordion({
	      heightStyle: "content"
	    });
	});

	$( function() {
	    $( "#accordion-faq-c-9" ).accordion({
	      heightStyle: "content"
	    });
	});

	$( function() {
	  //  $( "#tabs-countries" ).tabs();
	});

	$( function() {
	    $( "#tabs-faq" ).tabs();
	});

	$( function() {
	    $( "#accordion-faq" ).accordion({
	    	heightStyle: "content"
	    });
	});

	$( function() {
	    $( "#accordion-faq-st" ).accordion({
	    	heightStyle: "content"
	    });
	});

	$( function() {
	    $( "#accordion-faq-s" ).accordion({
	    	heightStyle: "content"
	    });
	});

	$( function() {
	    $( "#accordion-faq-v" ).accordion({
	    	heightStyle: "content"
	    });
	});

	$( function() {
	    $( "#accordion-faq-k" ).accordion({
	    	heightStyle: "content"
	    });
	});

	$('.all-display').click(function(){
		$(this).css('display', 'none');
		$('.conference-room .close-conf').css('display', 'block');
		$('.conference-room .faces').addClass('faces-moreDisplay')
	});

	$('.conference-room .close-conf').click(function(){
		$(this).css('display', 'none');
		$(".all-display").css('display', 'block');
		$('.conference-room .faces').removeClass('faces-moreDisplay')
	});

	$('.filters .content-price-n-duration .price div').click(function(){
	    if($(this).hasClass('active-price')){
	        $(this).removeClass('active-price');
	    } else{
		    $(this).addClass('active-price');
	    }
	});

	$('.filters .content-price-n-duration .duration div').click(function(){
	    if($(this).hasClass('active-duration')){
	        $(this).removeClass('active-duration');
	    } else{
	        $(this).addClass('active-duration');
	    }
	});

	$('.filters .content-fac .item').click(function(){
	    if($(this).hasClass('active-fac')){
	        $(this).removeClass('active-fac');
	    } else{
		    $(this).addClass('active-fac');
	    }
	});

	$('.filters .content-programms div button').click(function(){
		$('.filters .content-programms div').removeClass('active-prog');
		$(this).parent('div').addClass('active-prog');
	})

	$('.filters .content-countries .item').click(function(){
		if ($(this).hasClass('check-mark')) {
			$(this).removeClass('check-mark');
		}
		else{
			$(this).addClass('check-mark');
		}
		
	});

	$('#selectAllC').click(function(){
		$('.filters .content-countries .item').addClass('check-mark');
	});

	$('.filters .controllers-reviews-b .left').click(function(){
		$('.filters .slick-prev').click()
	})

	$('.filters .controllers-reviews-b .right').click(function(){
		$('.filters .slick-next').click()
	})

	$('.forgot-p #email').on('input', function(){
		let $that = $(this);
		let pattern = /^([a-z0-9_\.-])+[@][a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
		let email = $(".forgot-p #email").val();
	 
		if(!(pattern.test(email)))
		{
			$that.parent('.inputs-form').addClass('error-message');
			$('.forgot-p .text-error').css('opacity', '1');
		}
		else{
			$that.parent('.inputs-form').removeClass('error-message');
			$('.forgot-p .text-error').css('opacity', '0');
		}
	});

	$('.slider-form').slick({
		fade: true
	});

	$('.authorization .controllers-reviews-b .left').click(function(){
		$('.slider-form .slick-prev').click()
	})

	$('.authorization .controllers-reviews-b .right').click(function(){
		$('.slider-form .slick-next').click()
	})

	$('.slider-gallery').slick({
		slidesToShow: 2,
        slidesToScroll: 1,
        responsive: [
		    {
		      breakpoint: 600,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    },
		    {
		      breakpoint: 400,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		]
	});

	$('.grid-gallery .controller-grid .arrow-right').click(function(){
		$('.slider-gallery .slick-next').click()
	});

	$('.grid-gallery .controller-grid .arrow-left').click(function(){
		$('.slider-gallery .slick-prev').click()
	});

	$('.profile .content .content-checklists table .checkbox-list div').click(function(){
		$(this).addClass('active-check');
		let url = $(this).data('route');
		$.get(url, function(data){
			console.log(data);
		});

	});

	$('.switch').click(function(){
		$(this).toggleClass("switchOn");
	});

	    
	$('#tabs-profile').tabs();


    $(".next-button").click(function () {
        $( "#tabs-profile" ).tabs( "option", "active", $("#tabs-profile").tabs('option', 'active')+1 );
    });
    $(".back-button").click(function () {
        $( "#tabs-profile" ).tabs( "option", "active", $("#tabs-profile").tabs('option', 'active')-1 );
    });

	$('.profile .tabs-countries').click(function(){
		$('.slider-countries-filters').slick({

		});
		$('.controllers-countries-slider .arrows .left').click(function(){
			$('.slider-countries-filters .slick-prev').click()
		});
		$('.controllers-countries-slider .arrows .right').click(function(){
			$('.slider-countries-filters .slick-next').click()
		});
	});

	$('.profile .btn-show-res').click(function(){
		$('.slider-result-filters').slick();
	});

	$('.slider-un-filters').slick({
		fade: true
	});

	$('.filters #show-res-filters').click(function(){
		$('.filters .hide-li-result a').click()
	})

	$('.filters .r-partners .partners .info .link').click(function(){
		$('.filters .hide-li-universe a[href="'+'#'+$(this).data('tabs')+'"]').click();
	});

	$('.inputs-form input').focus(function(){
		$(this).parent('.inputs-form').addClass('active-input');
	});

	$('.inputs-form input').blur(function(){
		if ($(this).val().length < 1) {
			$(this).parent('.inputs-form').removeClass('active-input');
		}
	});

	$('.slider-reviews').slick({
		slidesToShow: 2,
		arrows: false,
		dots: true,
		responsive: [
		    {
		      breakpoint: 600,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		]
	});
	
	$('.my-post-slider').slick({
		slidesToShow: 3,
		arrows: false,
		dots: true,
		responsive: [
			{
				breakpoint: 800,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});

	$('.slider-certificates').slick({
		slidesToShow: 4,
		slidesToScroll: 4,
		arrows: false,
		dots: true,
		responsive: [
		    {
		      breakpoint: 800,
		      settings: {
		        slidesToShow: 2,
		      }
		    },
		    {
		      breakpoint: 600,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		]
	});
	$('.main-news .news-content').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		arrows: false,
		dots: true,
		autoplay: true,
        autoplaySpeed: 2000,
		responsive: [
		    {
		      breakpoint: 800,
		      settings: {
		        slidesToShow: 2,
		      }
		    },
		    {
		      breakpoint: 600,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		]
	});
	
    $('.result-page .partners').slick({
    	slidesToShow: 2.2,
    	slidesToScroll: 1,
    	arrows: false,
    	dots: true,
    	responsive: [
    		{
    		breakpoint: 800,
    		settings: {
    			slidesToShow: 1,
    			}
    		},
    		{
    		breakpoint: 600,
    		settings: {
    			slidesToShow: 1,
    			slidesToScroll: 1
    			}
    		}
    	]
    });

	$('.slider-books-review').slick({
		fade: true
	});

	$('.controllers-reviews-b .left').click(function(){
		$('.best-selection .slick-prev').click()
	}); 

	$('.controllers-reviews-b .right').click(function(){
		$('.best-selection .slick-next').click()
	}); 

	$('.slider-regions').slick({
		fade: true
	})

	$('.content-region-info .controllers .arrows .left').click(function(){
		$('.content-region-info .slick-prev').click()
	});

	$('.content-region-info .controllers .arrows .right').click(function(){
		$('.content-region-info .slick-next').click()
	});

	$('.studentsReview .reviews .inf-n-video .play').click(function(){
		$(this).parent('.inf-n-video').find('.poster').css('visibility', 'hidden');
		$(this).parent('.inf-n-video').find('.info-student').css('display', 'none');
		$(this).css('display', 'none');
		$(this).parent('.inf-n-video').find('video').get(0).play();
	})

	$('.video-ambassador .inf-n-video .play').click(function(){
		$(this).parent('.inf-n-video').find('.poster').css('visibility', 'hidden');
		$(this).parent('.inf-n-video').find('.info-student').css('display', 'none');
		$(this).css('display', 'none');
		$(this).parent('.inf-n-video').find('video').get(0).play();
	})

	$('header .burger').click(function(){
		if ($(this).hasClass('active-burger')) {
			$(this).removeClass('active-burger');
			$('header .burger-menu').css({'opacity': '0', 'top': '0'});
			setTimeout(function(){
				$('header .burger-menu').css('display', 'none');
			}, 500);
		}
		else{
			$(this).addClass('active-burger');
			$('header .burger-menu').css('display', 'block');
			setTimeout(function(){
				$('header .burger-menu').css({'opacity': '1', 'top': '70%'});
			}, 100);
		}
	});

	$('.banner-main .slider-main').slick({
		fade: true,
		autoplay: true,
        autoplaySpeed: 2000,
	});

	let count = 0;
    let titles = [];
	$('.banner-main .slider-main .slick-slide').each(function(){
         titles.push($(this).find('h3').text());
         count += 1;
	});

    

	$('.banner-main .active-slide-numbers .total span').text(count);
    $('.banner-main .info .title').text(titles[0]);

	$('.banner-main .slider-main').on('afterChange', function(event, slick, currentSlide, nextSlide){
	    $('.banner-main .active-slide-numbers .current span').text(currentSlide+1);
        if (!(titles[slick.currentSlide+1]== undefined)){
        $('.banner-main .info .title').text(titles[slick.currentSlide]);}
            else {
                $('.banner-main .info .title').text(titles[1]);
            }
      });

	$('.banner-main .controller .grid .arrows .fa-chevron-left').click(function(){
		$('.banner-main .slider-main .slick-prev').click();
	});

	$('.banner-main .controller .grid .arrows .fa-chevron-right').click(function(){
		$('.banner-main .slider-main .slick-next').click();
	});



    $('.search-field input').keypress(function () {
        if($(this).val().length === 0){
            $('.search-field button').hide();
            $('.search-field .close-search').show()
        }
        if($(this).val().length >= 1){
            $('.search-field button').show();
            $('.search-field .close-search').hide()
        }
    });

    $('.search-field input').on('blur change', function () {
        if($(this).val().length == 0){
            $('.search-field').css({'opacity': '0', 'transform': 'translateY(-140%)'});
            $('.search-field button').hide();
            $('.search-field .close-search').show()
        }
        if($(this).val().length >= 1){
            $('.search-field button').show();
            $('.search-field .close-search').hide()
        }
    });
    
    $('.univer-change-form').hide()
    
    $('.univer-change-btn').on('click', function(){
        $('.univer-change-form').show()
    })
});
function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  }
}

$('.image-upload-wrap').bind('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
  });
  $('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
});


$(document).ready( function() {
	$(document).on('change', '.btn-file :file', function() {
	var inputImage = $(this),
		label = inputImage.val().replace(/\\/g, '/').replace(/.*\//, '');
	inputImage.trigger('fileselect', [label]);
	});

	$('.btn-file :file').on('fileselect', function(event, label) {
	    
	    var input = $(this).parents('.input-group').find(':text'),
	        log = label;
	    
	    if( input.length ) {
	        input.val(log);
	    } else {
	        if( log ) alert(log);
	    }
    
	});
	function readURL(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        
	        reader.onload = function (e) {
	            $('#img-upload').attr('src', e.target.result);
	        }
	        
	        reader.readAsDataURL(input.files[0]);
	    }
	}

	$("#imgInp").change(function(){
	    readURL(this);
	});
	
// 	$('.filters .content-countries .item:first-child').addClass('check-mark');
// 	$('.filters .content-programms .content-first div:first-child').addClass('active-prog');
// 	$('.filters .content-fac .item:first-child').addClass('active-fac');
// 	$('.filters .content-price-n-duration .price div:first-child').addClass('active-price');
// 	$('.filters .content-price-n-duration .duration div:first-child').addClass('active-duration');
	
// 	var countryName = $('.filters .content-countries .check-mark p').text(),
// 	        program = $('.filters .content-programms .content-first .active-prog button').text(),
// 	        faculty = $('.filters .content-fac .active-fac p').text(),
// 	        priceEdu = $('.filters .content-price-n-duration .price .active-price p').text(),
// 	        durationEdu = $('.filters .content-price-n-duration .duration .active-duration p').text();


    $('.filters .next-button').addClass('disable-click');

    var countries = [];
	var programs = [];
	var faculties = [];
	
	var arrFilter = [
	        {
	            "Countries": countries
	        },
	        {
	            "programms": programs
	        },
	        {
	            "faculties": faculties
	        }
	    ]
	
	$('.filters .countries .item p').each(function(index, key, item){
	    var parent = $(this).parent('.item');
	    var marked = ($(this).text())
	    parent.on('click', function(){
    	    if(parent.hasClass('check-mark')){
    	        countries.push(marked);
        	    $('.countries').find('.next-button').removeClass('disable-click')
        	}  else {
        	    countries.splice($.inArray(marked, countries),1);
        	}
    	})
	});
	
	$('#selectAllC').on('click', function(){
	    var marked = $('.filters .countries .item p').text();
	    countries.push(marked);
	    $('.countries').find('.next-button').removeClass('disable-click');
	})
	
	$('.filters .content-programms .content-first button').each(function(index, key, item){
	    var parent = $(this).parent('div');
	    var programEdu = $(this).text(); 
	    $(this).on('click', function(){
	        programs.splice(0,programs.length)
	        programs.push(programEdu);
    	    if(parent.hasClass('active-prog')){
        	    $('.content-programms').find('.next-button').removeClass('disable-click')
        	} 
    	})
	})

    $('.filters .content-programms .next-button').on('click', function(){
	    var chekedMark = $(this).parent('.btns-prev-next').parent('.content-programms').children('.content-first');
	    var programEdu = chekedMark.find('.active-prog button').text();
	    programs.splice(0,programs.length)
	    programs.push(programEdu);
	})
	
	$('.filters .content-faculty .back-button').on('click', function(){
	    programs.splice(0,programs.length)
	})
	
	$('.filters .content-fac .item p').each(function(index, key, item){
	    var parent = $(this).parent('.item');
	    var actFac = ($(this).text())
	    parent.on('click', function(){
    	    if(parent.hasClass('active-fac')){
    	        faculties.push(actFac);
    	        $('.content-faculty').find('.next-button').removeClass('disable-click')
        	} else {
        	    faculties.splice($.inArray(actFac, faculties),1);
        	}
    	})
	})
	
	
	
	
	
	
	$('.filters .content-faculty .next-button, .filters .show-result').on('click', function(){
		let url = $("#getResultsForm").attr('action');
		let formData = new FormData(getResultsForm);
		formData.append('countries', arrFilter[0].Countries);
		formData.append('programms', arrFilter[1].programms);
		formData.append('faculties', arrFilter[2].faculties);

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
				$("#tabs-6").html(data);
			}
		});
	});
	
// 	$('.filters .show-result').on('click', function(){
// 	    $('.filters form').submit()
// 	})
	
	$('.clear-filters').on('click', function(){
	    $('.filters .content-countries .check-mark').removeClass('check-mark')
	    $('.filters .content-programms .content-first div').removeClass('active-prog')
	    $('.filters .content-fac .item').removeClass('active-fac')
	    $('.filters .content-price-n-duration .price .active-price').removeClass('active-price')
	    $('.filters .content-price-n-duration .duration .active-duration').removeClass('active-duration')
	    countries.splice(0, countries.length)
	    programs.splice(0, programs.length)
	    faculties.splice(0, faculties.length)
	    $('#ui-id-1').click();
	})
	
});

function _(el) {
  return document.getElementById(el);
}

function uploadVideoFile() {
  var file = _("file1").files[0];
  // alert(file.name+" | "+file.size+" | "+file.type);
  var formdata = new FormData();
  formdata.append("file1", file);
  var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler, false);
  ajax.addEventListener("load", completeHandler, false);
  ajax.open("POST", "file_upload_parser.php"); // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
  //use file_upload_parser.php from above url
  ajax.send(formdata);
}

function progressHandler(event) {
  var percent = (event.loaded / event.total) * 100;
  _("progressBar").value = Math.round(percent);
}

function completeHandler(event) {
  _("progressBar").value = 0; //wil clear progress bar after successful upload
}

$('.my-blogs .custom-file-label').on('click', function(){
    $(this).parent('.custom-file').children('input').click()
})

// fetch('http://new.studyportal.uz/read-alert/11')
//   .then((response) => {
//     return response.json();
//   })
//   .then((data) => {
//     console.log(data);
//   });
//   fetch('http://new.studyportal.uz/read-alert/12')
//   .then((response) => {
//     return response.json();
//   })
//   .then((data) => {
//     console.log(data);
//   });


$(".studentsReview .contentCountry .allCountry, .studentsReview .contentCountry ul a").click(function(event){
	event.preventDefault();
	let url = $(this).attr('href');
	$.get(url, function (data) {
		$("#reviewItems").html(data);
	});
});



wow = new WOW(
    {
        offset: 100,
    }
);
wow.init();


    

