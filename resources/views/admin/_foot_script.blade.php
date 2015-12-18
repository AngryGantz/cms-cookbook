{{-- <script src="/assets/majestic/js/jquery-1.11.3.min.js"></script>
<script src="/assets/majestic/js/jquery-ui.js"></script>
<script src="/assets/majestic/js/slick.min.js"></script>
<script src="/assets/majestic/js/jquery.meanmenu.js"></script>
<script src="/assets/majestic/js/jquery.selectric.min.js"></script>

<script src="/assets/majestic/js/jquery.form.js"></script>
<script src="/assets/majestic/js/jquery.validate.min.js"></script>
<script src="/assets/majestic/js/jquery.swipebox.js"></script>
 --}}
<script src="/assets/majestic/js/wow.js"></script>
<script src="/assets/majestic/js/custom.js"></script>

<script>

    function bindMajesticItem(){

        /* Bind click event to remove detail icon button */

        $('.del-list').on("click",function(event){
            event.preventDefault();
            var $this = $( this );
            $this.closest( 'li' ).slideUp(function() { $(this).remove(); });
        });

            $(".file-preview").on('click', function(){
                $(this).siblings('input[type=file]').trigger('click');
            });

            $('input[type=file]').on('change', function(e) {
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

        
    }

$( document ).ready(function() {
    $(".file-preview").on('click', function(){
        $(this).siblings('input[type=file]').trigger('click');
        console.log('ssssssssssssss');
    });

    $('input[type=file]').on('change' ,function(e) {
        if(typeof FileReader == "undefined") {
            return true;
        }
       
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
                        previewDiv.html("");
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
    bindMajesticItem();
});
</script>