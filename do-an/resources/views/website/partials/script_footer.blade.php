<script type="text/javascript" src="{{asset('website/dest/jsmain.min.js')}}"></script>
<script type="text/javascript" src="{{asset('website/js/main.js')}}"></script>

<script>
    // Initialize library
    $(window).on('ready', function(){
        lozad('.lozad', {
            load: function(el) {
                el.src = el.dataset.src;
                el.onload = function() {
                    el.classList.add('fade')
                }
            }
        }).observe();
    })
    window.CI360 = { notInitOnLoad: true };
       
</script>

<script type="text/javascript" src="{{asset('website/js/libs/360.js')}}"></script>