$(document).ready(function () {

    $('.carousel').flickity({
        // options
        cellAlign: 'left',
        contain: true,
        imagesLoaded: true,
        draggable: true,
        autoPlay: 3000,
        friction: 0.8,
        arrowShape: {
            x0: 20,
            x1: 60, y1: 50,
            x2: 65, y2: 45,
            x3: 30
        }
    });

    // Home banner carousel 

    $('.home__banner-carousel').flickity({
        pageDots: false,
        draggable: true,
        fullscreen: true,
        wrapAround: true,
        imagesLoaded: true,
        autoPlay: 3000,
        friction: 0.8,
    });
    // 2nd carousel, navigation
    $('.banner-carousel-nav').flickity({
        asNavFor: '.home__banner-carousel',
        contain: true,
        pageDots: false,
    });

    // Product detail carousel

    $('.carousel-main').flickity({
        pageDots: false,
        pageButton: false,
        draggable: true,
        fullscreen: true,
        wrapAround: true,
        imagesLoaded: true,
    });
    // 2nd carousel, navigation
    $('.carousel-nav').flickity({
        asNavFor: '.carousel-main',
        contain: true,
        pageDots: false,
    });

    // Product fancy box fullscreen
    $('[data-fancybox="category-detail-gallery"]').fancybox({
        loop: true,
        animationEffect: "zoom-in-out",
        animationDuration: 500,
        zoomOpacity: "auto",
        transitionEffect: "slide",
        transitionDuration: 366,
        clickContent: 'close',
        buttons: [
            'close'
        ],
        thumbs: {
            autoStart: true,
            axis: "x"
        },
        afterClose: function () {
            $('.product__buynow-popup').slideUp();
            $('.product__buynow-popup').removeClass('buynow-popup-active');
        }
    });
    $('[data-fancybox="product-detail-gallery"]').fancybox({
        loop: true,
        animationEffect: "zoom-in-out",
        animationDuration: 500,
        zoomOpacity: "auto",
        transitionEffect: "slide",
        transitionDuration: 366,
        clickContent: 'close',
        buttons: [
            'close'
        ],
        thumbs: {
            autoStart: true,
            axis: "x"
        },
        afterClose: function () {
            $('.product__buynow-popup').slideUp();
            $('.product__buynow-popup').removeClass('buynow-popup-active');
        }
    })
    $('[data-fancybox="box-detail-gallery"]').fancybox({
        loop: true,
        animationEffect: "zoom-in-out",
        animationDuration: 500,
        transitionEffect: "zoom-in-out",
        transitionDuration: 366,
        margin: [44, 0, 22, 0],
        clickContent: 'close',
        buttons: [
            'close'
        ],
        thumbs: {
            autoStart: true,
            axis: "x",
        },
        afterClose: function () {
            $('.product__buynow-popup').slideUp();
            $('.product__buynow-popup').removeClass('buynow-popup-active');
        }
    });

    $('[data-fancybox="360-gallery"]').fancybox({
        loop: true,
        animationEffect: "zoom-in-out",
        animationDuration: 500,
        transitionEffect: "zoom-in-out",
        transitionDuration: 366,
        margin: [44, 0, 22, 0],
        clickContent: false,
        afterClose: function () {
            $('.product__buynow-popup').slideUp();
            $('.product__buynow-popup').removeClass('buynow-popup-active');
            // window.CI360.destroy();
            window.CI360.init();
            // abc()
        }
    });
    $(document).on('click', '.360-btn', function () {
        $('.img360-popup').slideDown(300);
        $('.overlay').fadeIn(300);
        window.CI360.init();
        $.fancybox.getInstance().hideControls();
        function abc() {
        };
        abc();
    })
    $('.overlay').on('click', function(){
        $('.img360-popup').slideUp(300);
        $('.overlay').fadeOut(300);
        // window.CI360.init();
    })



    $('[data-fancybox="video-gallery"]').fancybox({
        loop: true,
        animationEffect: "zoom-in-out",
        animationDuration: 500,
        transitionEffect: "zoom-in-out",
        transitionDuration: 366,
        margin: [44, 0, 22, 0],
        clickContent: 'close',
        buttons: [
            'close'
        ],
        thumbs: {
            autoStart: true,
            axis: "x",
        },
        helpers: {
            media: true
        },
        youtube: {
            autoplay: 0
        },
        // beforeLoad:function(){
        //     window.CI360.init()
        // },
        afterClose: function () {
            $('.product__buynow-popup').slideUp();
            $('.product__buynow-popup').removeClass('buynow-popup-active');
        }
    });


    // Showroom tab
    $('.showroom__tab-item').on('click', function () {
        let currentShowroom = $('.showroom__list.showroom-active');
        let showroomID = $(this).data('showroom');


        if ($(this).hasClass('showroom-tab-active')) {
            $(this).toggleClass('showroom-tab-active');
            $('#showroomList' + showroomID).toggleClass('showroom-active');
            e.stopPropagation();
        } else {
            $('.showroom__tab-item.showroom-tab-active').removeClass('showroom-tab-active');
            $(this).addClass('showroom-tab-active');
            currentShowroom.removeClass('showroom-active');
            $('#showroomList' + showroomID).addClass('showroom-active');
        }
    })

    // Showroom map pop up
    $('.map-btn').on('click', function () {
        $('.map-popup').slideDown(500);
        $('.overlay').fadeIn(300);
    })
    $('.overlay').on('click', function () {
        $('.map-popup').slideUp(300);
        $('.overlay').fadeOut(300);
    })

    // Menu mobile
    let menuOpen = false;
    let menuBtn = $('.menu-hamburger');
    let menuMobile = $('.menu-mobile');
    menuBtn.on('click', function () {
        if (!menuOpen) {
            menuBtn.toggleClass('open');
            menuOpen = true;
            menuMobile.slideToggle(500);
        } else {
            menuBtn.toggleClass('open');
            menuOpen = false;
            menuMobile.slideToggle(500);
        }
    })

    // Product review see more button
    $('.product__review-see-more .see-more-btn').on('click', function () {
        $('.product__review').css('height', 'fit-content');
        $('.product__review-see-more').css('display', 'none');
    })

    //rating show
    $(function () {
        $('.product__rating-rating--btn a').click(function () {
            $(this).toggleClass('active');
            if ($(this).hasClass("active")) {
                $(this).html("Đóng");
            } else {
                $(this).html("Gửi đánh giá của bạn");
            }
            $('.product__rating-rating .form-review').toggleClass('active')
        });
    })

    // Product related carousel
    $('.product__related-carousel').flickity({
        // options
        cellAlign: 'left',
        contain: true,
        imagesLoaded: true,
        draggable: true,
        autoPlay: 3000,
    });


    // Product answer toggle
    $('.product__question-list--item .question').on('click', function () {
        let questionID = $(this).data('question');

        $('#question' + questionID + ' .question__icon').toggleClass('question-active');
        $('#question' + questionID + ' .answer').slideToggle(300);
    })

    // Product like comment button
    $('.like .like-btn').on('click', function () {
        $(this).toggleClass('liked');
    })
    // Product add answer button
    $('.product__ask-question .answer-btn').on('click', function () {
        let questionID = $(this).data('answer');

        $('#question' + questionID + ' .add-answer').slideToggle(300);
    })

    // Product detail buy now pop up 
    $('.gallery-btn').on('click', function () {
        $('.product__buynow-popup').slideDown(500);
        $('.product__buynow-popup').addClass('buynow-popup-active');
    });

    // Product detail pop up
    $('.product-detail-btn').on('click', function () {
        $('.product-detail-popup').slideDown(500);
        $('.overlay').fadeIn(300);
        $('.carousel-main').flickity('resize');
        $('.carousel-nav').flickity('resize');
    })
    $('.close, .overlay').on('click', function () {
        $('.product-detail-popup').slideUp(300);
        // $('.overlay').fadeOut(300);
    })

    // Cart product number modify
    $('.cart__main-product--right .number .minus').on('click', function () {
        let productNumber = $(this).siblings('input').val();
        productNumber = parseInt(productNumber);
        $('.cart__main-product--right .number a.number-active').removeClass('number-active');
        $(this).addClass('number-active');
        if (productNumber > 1) {
            productNumber = $(this).siblings('input').val(productNumber - 1);
        }
    })
    $('.cart__main-product--right .number .add').on('click', function () {
        let productNumber = $(this).siblings('input').val();
        productNumber = parseInt(productNumber);
        $('.cart__main-product--right .number a.number-active').removeClass('number-active');
        $(this).addClass('number-active');
        productNumber = $(this).siblings('input').val(productNumber + 1);
    })

    // Cart promotion toggle 
    $(document).on('click', '.cart__main-product--left .promotion-btn', function () {
        let parent = $(this).parents('.cart__main-product--left');
        parent.find('.promotion').toggleClass('promotion-active');
        if (parent.find('.promotion').hasClass('promotion-active')) {
            parent.find('.promotion-btn span').text("Thu gọn");
        } else {
            parent.find('.promotion-btn span').text("Các khuyến mãi");
        }
    })

    // Cart voucher button
    $('.voucher-btn').on('click', function () {
        $('.voucher-input').slideDown(300);
        $(this).hide();
    })

    // Cart time delivery select
    $('.time-delivery-btn').on('click', function () {
        $('.cart-confirm__time-delivery').slideToggle(300);
    })

    // Cart delivery tab
    $('.delivery-checkbox input').on('click', function () {
        let deliveryID = $(this).data('delivery');

        $('.delivery-tab').fadeOut(100);
        $('.delivery-tab.delivery-tab-active').removeClass('delivery-tab-active');
        $('#deliveryTab' + deliveryID).fadeIn(500);
        $('#deliveryTab' + deliveryID).addClass('delivery-tab-active');
    })

    // Cart delivery other option
    $('.delivery-tab__other input:checkbox').on('click', function () {
        let otherID = $(this).attr('id');

        $('.delivery-tab__other .form-' + otherID).slideToggle(300);
    })

    // Category brand toggle
    $('.category__brand .brand-more-btn').on('click', function () {
        $('.category__brand').toggleClass('category__brand-active');
    })

    // Category filter
    $('.filter__title').on('click', function (e) {
        let filterID = $(this).data('filter');
        console.log(filterID);
        if ($(window).width() > 800) {
            if ($('.filter' + filterID).parent().hasClass('filter-active')) {
                $('.filter' + filterID).parent().toggleClass('filter-active');
                e.stopPropagation();
            } else {
                $('.filter-active').removeClass('filter-active');
                $('.filter' + filterID).parent().addClass('filter-active');
            }
        }
        else {
            if ($(this).hasClass('filter-title-mobile-active')) {
                $(this).toggleClass('filter-title-mobile-active');
                $('.filter-container').toggleClass('filter-mobile-active');
                $('.filter' + filterID).parent().toggleClass('filter-active');
                e.stopPropagation();
                e.stopPropagation();
            } else {
                $('.filter-title-mobile-active').removeClass('filter-title-mobile-active');
                $(this).addClass('filter-title-mobile-active');
                $('.filter-container').addClass('filter-mobile-active');
                $('.filter-active').removeClass('filter-active');
                $('.filter' + filterID).parent().addClass('filter-active');
            }
        }
    })
    $('.filter__list-item a').removeClass('filter-item-active');
    $('.filter__list-item a').on('click', function () {
        $(this).toggleClass('filter-item-active');
    })

    $('.filter__list-btn .cancel').on('click', function (e) {
        $('.filter__list-item a').removeClass('filter-item-active');
        $('.filter-active').removeClass('filter-active');
        e.stopPropagation();
    })

    //sort filter price
    $('#sort_filter_price').on('change', function () {

        let result = $(this).val();
        let url = $(this).data('url');
        let idCate = $(this).data('cateid');
        // alert(url);

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'html',
            data: { sort: result, cateId: idCate },
            success: function (filter) {
                $('#show_filter_products').html(filter);
            }
        })
    })

    //button sort filter price
    $('.btn_sort_filter_price').on('click', function () {
        // alert($(this).data('value'));
        let result = $(this).data('value');
        let url = $(this).data('url');
        let idCate = $(this).data('cateid');

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'html',
            data: { sort: result, cateId: idCate },
            success: function (filter) {
                $('#show_filter_products').html(filter);
            }
        })
    })

})
// Filter resize
$(window).on('ready', function () {
    if ($(window).width() > 767) {
        $(function () {
            let arrowWidth = 30;

            $.fn.resizeselect = function (settings) {
                return this.each(function () {

                    $(this).change(function () {
                        let $this = $(this);

                        // get font-weight, font-size, and font-family
                        let style = window.getComputedStyle(this)
                        let { fontWeight, fontSize, fontFamily } = style

                        // create test element
                        let text = $this.find("option:selected").text();
                        let $test = $("<span>").html(text).css({
                            "font-size": fontSize,
                            "font-weight": fontWeight,
                            "font-family": fontFamily,
                            "visibility": "hidden" // prevents FOUC
                        });

                        // add to body, get width, and get out
                        $test.appendTo($this.parent());
                        let width = $test.width();
                        $test.remove();

                        // set select width
                        $this.width(width + arrowWidth);

                        // run on start
                    }).change();

                });
            };

            // run by default
            $("select.resizeselect").resizeselect();
        })
    } else {
        $(function () {
            let arrowWidth = 65;

            $.fn.resizeselect = function (settings) {
                return this.each(function () {

                    $(this).change(function () {
                        let $this = $(this);

                        // get font-weight, font-size, and font-family
                        let style = window.getComputedStyle(this)
                        let { fontWeight, fontSize, fontFamily } = style

                        // create test element
                        let text = $this.find("option:selected").text();
                        let $test = $("<span>").html(text).css({
                            "font-size": fontSize,
                            "font-weight": fontWeight,
                            "font-family": fontFamily,
                            "visibility": "hidden" // prevents FOUC
                        });

                        // add to body, get width, and get out
                        $test.appendTo($this.parent());
                        let width = $test.width();
                        $test.remove();

                        // set select width
                        $this.width(width + arrowWidth);

                        // run on start
                    }).change();

                });
            };

            // run by default
            $("select.resizeselect").resizeselect();
        })
    }
})


// Cart confirm order pop up
// $('.order-btn').on('click', function () {
//     $('.order-success-popup').slideDown(500);
//     $('.overlay').fadeIn(300);
// })
// $('.overlay,.close').on('click', function () {
//     $('.order-success-popup').slideUp(300);
//     $('.overlay').fadeOut(300);
// })

// ajax News
$('#load_more').on('click', function () {
    let url = $(this).data('url');
    let count = $(this).data('count');

    $.ajax({
        url: url,
        type: 'post',
        dataType: 'html',
        data: { ajaxNews: count },
        success: function (news) {
            $('#ajax_new_ul').html(news);
            $('#load_more').data('count', (count + 5));
        }
    })
});

$('select[name="deliveryDate1"],select[name="deliveryTime1"]').on('change', function (e) {
    let date = $('select[name="deliveryDate1"]').val()
    let time = $('select[name="deliveryTime1"]').val()
    $('#deliveryDateTime1').html('Giao ' + time + ' ' + date)
});

$('select[name="deliveryDate2"],select[name="deliveryTime2"]').on('change', function (e) {
    let date = $('select[name="deliveryDate2"]').val()
    let time = $('select[name="deliveryTime2"]').val()
    $('#deliveryDateTime2').html('Giao ' + time + ' ' + date)
});

$('.paymentmethod').on('click', function (e) {
    $('.paymentmethod').css('border', 'none');
    $(this).css('border', '2px solid red');
    $('input[name="payment_method"]').val($(this).data('paymentmethod'));
});

$('#province_delivery').on('change', function (e) {
    let province_id = $('#province_delivery').val(),
        $district = $("#district_delivery"),
        url = $(this).data('url');
    if (province_id.length === 0) {
        $district.html('<option value="">' + lang.translate('please_choose_district') + '</option>');
    } else {
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: { province_id: province_id },
            success: function (result) {
                $district.html(result.xhtml);
                $('.showroom-list').html(result.xhtml2);
            }
        });
    }
});

$('#district_delivery').on('change', function (e) {
    let district_id = $(this).val(),
        url = $(this).data('url');

    if (district_id.length === 0) {
        $ward.html('<option value="">' + lang.translate('please_choose_ward') + '</option>');
    } else {
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'html',
            data: { district_id: district_id },
            success: function (result) {
                $('.showroom-list').html(result);
            }
        });
    }
});

// // sort filter
// $('#sort_filter').on('change', function () {
//     let result = $(this).val();
//     let url = $(this).data('url');
//     let idCate = $(this).data('cateid');

//     $.ajax({
//         url: url,
//         type: 'post',
//         dataType: 'html',
//         data: { sort: result, cateId: idCate },
//         success: function (filter) {
//             $('#show_filter_products').html(filter);
//         }
//     })

// })

// load more category
$('#load_more_product').on('click', function () {
    let url = $('#pricePro').data('url');
    let price = $('#pricePro').val();
    let order = $('#sort_filter').val();
    let cat = $('#pricePro').data('idcat');
    let producer = $('#pricePro').data('idproducer');
    let count = 'all';
    let attr = [];
    $('.attribute_sort').each(function () {
        let arr = {
            "key": $(this).data('attr'),
            "value": $(this).val()
        }
        if ($(this).val() != "") {
            attr.push(arr);
        }
    })

    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: { price, order, attr, cat, producer, count },
        success: function (result) {
            $('#product_ul').html(result.view);
            if (result.count <= 0) {
                $('#load_more_product').css('display', 'none');
            } else {
                $('#load_more_product').css('display', 'block');
                $('#count_load_more_product').html(result.count);
            }
            console.log(result.count);

        }
    })
})

$('select[name="attribute_sort"]').on('change', function () {
    let url = $('#pricePro').data('url');
    let price = $('#pricePro').val();
    let order = $('#sort_filter').val();
    let cat = $('#pricePro').data('idcat');
    let producer = $('#pricePro').data('idproducer');
    let attr = [];
    $('.attribute_sort').each(function () {
        let arr = {
            "key": $(this).data('attr'),
            "value": $(this).val()
        }
        if ($(this).val() != "") {
            attr.push(arr);
        }
    })

    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: { price, order, attr, cat, producer },
        success: function (result) {
            $('#product_ul').html(result.view);
            if (result.count <= 0) {
                $('#load_more_product').css('display', 'none');
            } else {
                $('#load_more_product').css('display', 'block');
                $('#count_load_more_product').html(result.count);
            }
            console.log(result.count);

        }
    })

})