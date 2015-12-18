<script src="assets/majestic/js/jquery-1.11.3.min.js"></script>
<script src="assets/majestic/js/jquery-ui.js"></script>
<script src="assets/majestic/js/slick.min.js"></script>
<script src="assets/majestic/js/jquery.meanmenu.js"></script>
<script src="assets/majestic/js/jquery.selectric.min.js"></script>
<script src="assets/majestic/js/wow.js"></script>
<script src="assets/majestic/js/jquery.form.js"></script>
<script src="assets/majestic/js/jquery.validate.min.js"></script>
<script src="assets/majestic/js/jquery.swipebox.js"></script>
<script src="assets/majestic/js/flow.js/src/flow.js"></script>
<script src="assets/majestic/js/custom.js"></script>

{{-- 
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script> --}}

     <script>
    
$( document ).ready(function() {
    $(".file-preview").on('click', function(){
        $(this).siblings('input[type=file]').trigger('click');
    });

    $('input[type=file]').on('change' ,function(e) {
    if(typeof FileReader == "undefined") return true;

    var elem = $(this);
    var files = e.target.files;

    for (var i=0, file; file=files[i]; i++) {
        if (file.type.match('image.*')) {
            var reader = new FileReader();
            reader.onload = (function(theFile) {
                return function(e) {
                    var image = e.target.result;
                    var previewDiv = $('.file-preview', elem.parent());
                    var bgWidth = previewDiv.width() * 2;
                    previewDiv.css({
                        "background-size":bgWidth + "px, auto",
                        "background-position":"50%, 50%",
                        "background-image":"url("+image+")",
                    });
                };
            })(file);
            reader.readAsDataURL(file);
        }
    }   
});
});

        </script>