// function addtocart(e){
//     alert(e.attributes.uuid.value);
// }
$(document).ready(function(){
    var shoppingCart = (function() {
        // =============================
        // Private methods and propeties
        // =============================
        cart = [];
        
        // Constructor
        function Item(name, price, count, uuid ,image, discount,combo) {
          this.name = name;
          this.price = price;
          this.count = count;
          this.uuid = uuid;
          this.image = image;
          this.discount = discount;
          this.combo = combo;
        }
        
        // Save cart
        function saveCart() {
            localStorage.setItem('shoppingCart', JSON.stringify(cart));
        }
        
          // Load cart
        function loadCart() {
          cart = JSON.parse(localStorage.getItem('shoppingCart'));
        }
        if (localStorage.getItem("shoppingCart") != null) {
          loadCart();
        }
        
      
        // =============================
        // Public methods and propeties
        // =============================
        var obj = {};
        
        // Add to cart
        obj.addItemToCart = function(name, price, count, uuid ,image, discount,combo) {
          for(var item in cart) {
            if(cart[item].uuid === uuid) {
              cart[item].count ++;
              saveCart();
              return;
            }
          }
          var item = new Item(name, price, count, uuid ,image, discount, combo);
          cart.push(item);
          saveCart();
        }
        // Set count from item
        obj.setCountForItem = function(uuid, count) {
          for(var i in cart) {
            if (cart[i].uuid === uuid) {
              cart[i].count = count;
              break;
            }
          }
        };
        // Remove item from cart
        obj.removeItemFromCart = function(uuid) {
            for(var item in cart) {
              if(cart[item].uuid === uuid) {
                cart[item].count --;
                if(cart[item].count === 0) {
                  cart.splice(item, 1);
                }
                break;
              }
          }
          saveCart();
        }
      
        // Remove all items from cart
        obj.removeItemFromCartAll = function(uuid) {
          for(var item in cart) {
            if(cart[item].uuid === uuid) {
              cart.splice(item, 1);
              break;
            }
          }
          saveCart();
        }
      
        // Clear cart
        obj.clearCart = function() {
          cart = [];
          saveCart();
        }
      
        // Count cart 
        obj.totalCount = function() {
          var totalCount = 0;
          for(var item in cart) {
            totalCount += cart[item].count;
          }
          return totalCount;
        }
      
        // Total cart
        obj.totalCart = function() {
          // let behavior=$( "select[name='behavior']" ).val()
          var totalCart = 0;
          for(var item in cart) {
            if (cart[item].discount == "") {
              totalCart +=(cart[item].price * cart[item].count);
            } else {
              totalCart +=(cart[item].discount * cart[item].count);
            }
          }
          return Number(totalCart.toFixed(2));
        }
      
        // List cart
        obj.listCart = function() {
          var cartCopy = [];
          for(i in cart) {
            item = cart[i];
            itemCopy = {};
            for(p in item) {
              itemCopy[p] = item[p];
            }
            if (item.discount == "") {
              itemCopy.total += Number(item.price * item.count)  ;
            } else {
              itemCopy.total += Number(item.discount * item.count)  ;
            }
            
            cartCopy.push(itemCopy)
          }
          return cartCopy;
        }

        // Totaldiscount cart
        obj.totalDiscount = function(totalcart,discount) {
          total=totalcart*discount/100;
          return Number(total.toFixed(2));
        }
        
        // Total after discount
        obj.totalAfterDiscount = function(totalcart,totalDiscount) {
          total=totalcart- totalDiscount;
          return Number(total.toFixed(2));
        }

        // Total final
        obj.totalFinal = function(totalcart,totalDiscount, fee) {
          if ($('input[name=delivery]:checked').val() == 1) {
            total=totalcart- totalDiscount + fee;
          } else {
            total=totalcart- totalDiscount;
          }
          return Number(total.toFixed(2));
        }
        // cart : Array
        // Item : Object/Class
        // addItemToCart : Function
        // removeItemFromCart : Function
        // removeItemFromCartAll : Function
        // clearCart : Function
        // countCart : Function
        // totalCart : Function
        // listCart : Function
        // saveCart : Function
        // loadCart : Function
        return obj;
      })();
      
      var discountprice = 0;
      var fee = 0;
      
      // *****************************************
      // Triggers / Events
      // ***************************************** 
      // Add item
      $(document).on('click','.add-to-cart',function(event) {
            event.preventDefault();
            var name = $(this).data('name');
            var price = Number($(this).data('price'));
            var uuid = $(this).data('uuid');
            var image = $(this).data('image');
            var discount = $(this).data('discount');
            var combo = $(this).data('combo');
            shoppingCart.addItemToCart(name, price, 1, uuid ,image, discount, combo);
        displayCart();
        
        window.location = $('#linkcart').attr('href');
        });
      
      // Clear items
      $(document).on('click','.clear-cart',function() {
        shoppingCart.clearCart();
        displayCart();
      });
      
      
      function displayCart() {
        var cartArray = shoppingCart.listCart();
        var output = "";
        let url = $('#linkcart').data('href');
          $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: {pro: cartArray},
            success: function (result) {
                $('.show-cart').html(result.view);
                $('.show_cart2').html(result.view2);
            }
          });
        var myItem = localStorage.getItem('shoppingCart');
        setCookie('shoppingCart', myItem, 7);
        // $('.show-cart').html(output);
        let tong = shoppingCart.totalCart();
        let tongtienduocgiam = shoppingCart.totalDiscount(tong,discountprice);
        $('.total-cart').html(new Intl.NumberFormat().format(tong)+ ' đ');
        $('.total-count').html(shoppingCart.totalCount());
        if (discountprice >0) {
          $('#showtotaldiscount').css('display','flex');
          $('.total-discount').html(new Intl.NumberFormat().format('-'+tongtienduocgiam)+ ' đ');
        }else{
          $('#showtotaldiscount').css('display','none');
        }
        $('.total-after-discount').html(new Intl.NumberFormat().format(shoppingCart.totalAfterDiscount(tong,tongtienduocgiam))+ ' đ');
        $('.total-final').html(new Intl.NumberFormat().format(shoppingCart.totalFinal(tong,tongtienduocgiam,fee))+ ' đ');
        if (shoppingCart.totalCount()<=0) {
          $('.order-btn').prop('disabled', true);
        } else {
          $('.order-btn').prop('disabled', false);
        }
      }
      
      // Delete item button
      
      $('.show-cart').on("click", ".delete-item", function(event) {
        var uuid = $(this).data('uuid')
        shoppingCart.removeItemFromCartAll(uuid);
        displayCart();
      })
      
      
      // -1
      $('.show-cart').on("click", ".minus-item", function(event) {
        var uuid = $(this).data('uuid')
        shoppingCart.removeItemFromCart(uuid);
        displayCart();
      })
      // +1
      $('.show-cart').on("click", ".plus-item", function(event) {
        var uuid = $(this).data('uuid')
        shoppingCart.addItemToCart("", 0, 0, uuid, "" ,"", "");
        displayCart();
      })
      
      // Item count input
      $('.show-cart').on("change", ".item-count", function(event) {
         var uuid = $(this).data('uuid');
         var count = Number($(this).val());
        shoppingCart.setCountForItem(uuid, count);
        displayCart();
      });

    //   $('.cart').on("change", "select[name='behavior']", function(event) {
    //     let behavior=$( "select[name='behavior']" ).val()
    //     if(behavior=='CTV'){
    //       $('.ctv').attr("hidden",false);
    //       $('.dropship').attr("hidden",true);
    //       $("input[name='file']").val(null);
    //     }else{
    //       $('.ctv').attr("hidden",true);
    //       $('.dropship').attr("hidden",false);
    //       $("input[name='address']").val(null);
    //       $("input[name='phone']").val(null);
    //     }
    //     displayCart();
    //  });
      
      displayCart();

      function setCookie(name,value,days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
     }

     $('#checkVoucher').on('click', function (e) {
      let voucher = $('#voucher').val(),
          url = $(this).data('url');
      if (voucher.length === 0) {
          $('#voucherNull').css('display','block');
      } else {
          $('#voucherNull').css('display','none');
          $.ajax({
              url: url,
              type: 'POST',
              dataType: 'json',
              data: {voucher: voucher},
              success: function (result) {
                  if (result.status == "true") {
                      discountprice=result.price;
                      displayCart();
                      $('#voucherError').css('display','none');
                      $('#voucherSuccess').css('display','block');
                      $('input[name="voucher"]').val(voucher);

                  }else{
                      $('#voucherError').css('display','block');
                      $('#voucherSuccess').css('display','none');
                  }

              }
          });
      }
  });

  $('select[name="province_id"]').on('change', function (e) {
    let province_id = $(this).val(),
        $district = $("select[name='district_id']"),
        url = $district.data('url');
    if (province_id.length === 0) {
        $district.html('<option value="">' + lang.translate('please_choose_district') + '</option>');
    } else {
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: {province_id: province_id},
            success: function (result) {
              fee = result.fee;
              $district.html(result.xhtml);
              if(fee==0){
                $('.feeCart').html('Miễn phí');
              }else{
                $('.feeCart').html(new Intl.NumberFormat().format(fee)+ ' đ');
              }
              displayCart();
            }
        });
    }
    $("select[name='ward_id']").html('<option value="">' + lang.translate('please_choose_ward') + '</option>');
});

$('select[name="district_id"]').on('change', function (e) {
    let district_id = $(this).val(),
        $ward = $("select[name='ward_id']"),
        url = $ward.data('url');

    if (district_id.length === 0) {
        $ward.html('<option value="">' + lang.translate('please_choose_ward') + '</option>');
    } else {
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'html',
            data: {district_id: district_id},
            success: function (result) {
                $ward.html(result);
            }
        });
    }
});

$('input[name=delivery]').on('change', function (e) {
  displayCart();
})

    $(".formAjaxCart").submit(function (e) {
      e.preventDefault();
      let form = $(this),
          url = form.attr('action'),
          type = form.attr('method'),
          method = form.find('input[name="_method"]').val();

      if (typeof CKEDITOR !== 'undefined') {
          for (let instance in CKEDITOR.instances) {
              CKEDITOR.instances[instance].updateElement();
          }
      }

      let formData = new FormData(this)
      formData.append('_method', method);

      $.ajax({
          type: type,
          url: url,
          data: formData,
          dataType: 'JSON',
          contentType: false,
          cache: false,
          processData: false,
      }).done(function (data) {
          // let swalInit = swal.mixin({
          //     buttonsStyling: false,
          //     confirmButtonClass: 'btn btn-primary',
          //     cancelButtonClass: 'btn btn-light'
          // });

          if (data.status === "success") {
            window.location.href = data.redirect;
            shoppingCart.clearCart();
          } else {
              swalInit.fire(
                  lang.translate("error"),
                  data.message,
                  'warning'
              );
          }
      }).fail(function (jqXHR) {
          let data = jqXHR.responseJSON;

          switch (jqXHR.status) {
              case 401:
                  let warning_message = $(".print-warning-msg");

                  warning_message.css('display', 'block');
                  warning_message.find(".message-warning").html(data.message);
                  warning_message.delay(4000).slideUp(1000);

                  if ('redirect' in data) {
                      setTimeout(function () {
                          window.location.href = data.redirect
                      }, 2000);
                  }
                  break;
              case 422:
                  let error_message = $(".print-error-msg"),
                      error = '';

                  if ($.isEmptyObject(data.errors) === false) {
                      error_message.css('display', 'block');
                      $.each(data.errors, function (key, value) {
                          error += `<li>${value}</li>`;
                      });
                      error_message.find("ul").html(error);
                  }
                  error_message.delay(4000).slideUp(1000);
                  break;
              default:
                  new PNotify({
                      title: lang.translate("error"),
                      text: lang.translate("pages_error"),
                      icon: 'icon-blocked',
                      type: 'error'
                  });
                  break;
          }
      });
  });

  $(".formAjaxReview").submit(function (e) {
    e.preventDefault();
    let form = $(this),
        url = form.attr('action'),
        type = form.attr('method'),
        method = form.find('input[name="_method"]').val();
    let formData = new FormData(this)
        formData.append('_method', method);
      $.ajax({
        url: url,
        type: type,
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function (result) {
            new PNotify({
              title: 'Đánh giá thành công!',
              text: 'Cảm ơn bạn đã đánh giá!',
              icon: 'icon-checkmark3',
              delay: 2000,
              type: 'success'
          });
          setTimeout(function () {
            location.reload()
        }, 2000);
        }
      });
  });

  $(".formAjaxContact").submit(function (e) {
    e.preventDefault();
    let form = $(this),
        url = form.attr('action'),
        type = form.attr('method'),
        method = form.find('input[name="_method"]').val();
    let formData = new FormData(this)
        formData.append('_method', method);
      $.ajax({
        url: url,
        type: type,
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function (result) {
            new PNotify({
              title: 'Gửi thành công!',
              text: 'Cảm ơn bạn đã đặt câu hỏi!',
              icon: 'icon-checkmark3',
              delay: 2000,
              type: 'success'
          });
          setTimeout(function () {
            location.reload()
        }, 2000);
        }
      });
  });

  $('#review_order').change(function () {
      let order= $(this).val(),
      page= $('#pagireview .active').data('page'),
      url = $('#showreview').data('url');
      id = $('#showreview').data('id');
      console.log(url);
      getreview(order,page,id,url);
  })
  $('#pagireview li').click(function () {
      $("#pagireview li.active").removeClass("active"); 
      $(this).addClass("active"); 
      let order= $('#review_order').val(),
      page= $('#pagireview .active').data('page'),
      url = $('#showreview').data('url');
      id = $('#showreview').data('id');
      getreview(order,page,id,url);
  })

  $(document).on('click','.showmap',function () {
    let map = $(this).data('map');
    $('#showmap').html(map);
  })
});

function getreview(order,page,id,url) {
  if (page==null) {
    page =1;
  }
  $.ajax({
    url: url,
    type: 'get',
    dataType: 'html',
    data: {order,page,id},
    success: function (result) {
        $('#showreview').html(result);
    }
  });
}