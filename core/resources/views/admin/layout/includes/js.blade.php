<!-- jquery -->
<script src="{{ URL::asset('assets/frontend') }}/js/jquery-3.6.0.min.js"></script>
<!-- bootstrap js -->
<script src="{{ URL::asset('assets/admin') }}/js/bootstrap.bundle.min.js"></script>
<!-- grid.bundle js -->
{{-- <script src="{{ URL::asset('assets/admin') }}/js/grid.bundle.min.js"></script> --}}
<!-- select2 js -->
<script src="{{ URL::asset('assets/admin') }}/js/select2.min.js"></script>
<!-- toggle js -->
<script src="{{ URL::asset('assets/admin') }}/js/toggle.js"></script>
<!-- nicEdit js -->
<script src="{{ URL::asset('assets/admin') }}/js/nicEdit.js"></script>
<!-- bootstrap-iconpicker js -->
<script src="{{ URL::asset('assets/admin') }}/js/bootstrap-iconpicker.bundle.min.js"></script>
<!-- main -->
<script src="{{ URL::asset('assets/admin') }}/js/main.js"></script>

<script>
    // fullscreen-btn

    /* Get the documentElement (<html>) to display the page in fullscreen */
    let elem = document.documentElement;

    /* View in fullscreen */
    function openFullscreen() {
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.mozRequestFullScreen) {
            /* Firefox */
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) {
            /* Chrome, Safari and Opera */
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) {
            /* IE/Edge */
            elem.msRequestFullscreen();
        }
    }

    /* Close fullscreen */
    function closeFullscreen() {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.mozCancelFullScreen) {
            /* Firefox */
            document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
            /* Chrome, Safari and Opera */
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) {
            /* IE/Edge */
            document.msExitFullscreen();
        }
    }

    $('.fullscreen-btn').on('click', function() {
        $(this).toggleClass('active');
    });
</script>
<script>
    "use strict";
    bkLib.onDomLoaded(function() {
        $(".nicEdit").each(function(index) {
            $(this).attr("id", "nicEditor" + index);
            new nicEditor({
                fullPanel: true
            }).panelInstance('nicEditor' + index, {
                hasPanel: true
            });
        });
    });
    (function($) {
        $(document).on('mouseover ', '.nicEdit-main,.nicEdit-panelContain', function() {
            $('.nicEdit-main').focus();
        });
    })(jQuery);
</script>
<script>
    setTimeout(function() {
        $(".flash_alert").fadeOut(1000);
    }, 5000)
</script>
<script type="text/javascript">
    $(function() {
        $("#graph_select").change(function() {
            if ($("#vehicles").is(":selected")) {
                $("#wheels").show();
            } else {
                $("#wheels").hide();
            }
        }).trigger('change');
    });
</script>
