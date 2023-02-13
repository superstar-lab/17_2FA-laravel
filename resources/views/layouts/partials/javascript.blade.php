<!-- BEGIN: Vendor JS-->
<script src="{{url('/')}}/vuexy/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{url('/')}}/vuexy/vendors/js/ui/jquery.sticky.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{url('/')}}/vuexy/js/core/app-menu.js"></script>
<script src="{{url('/')}}/vuexy/js/core/app.js"></script>
<script src="{{url('/')}}/vuexy/js/scripts/customizer.js"></script>
<script src="{{url('/')}}/js/qrcode.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<!-- END: Page JS-->

<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
