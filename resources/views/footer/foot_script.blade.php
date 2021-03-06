<script src="/assets/majestic/js/jquery-1.11.3.min.js"></script>
<script src="/assets/majestic/js/jquery-ui.js"></script>
<script src="/assets/majestic/js/slick.min.js"></script>
<script src="/assets/majestic/js/jquery.meanmenu.js"></script>
<script src="/assets/majestic/js/jquery.selectric.min.js"></script>
<script src="/assets/majestic/js/wow.js"></script>
<script src="/assets/majestic/js/jquery.form.js"></script>
<script src="/assets/majestic/js/jquery.validate.min.js"></script>
<script src="/assets/majestic/js/jquery.swipebox.js"></script>
<script src="/assets/majestic/js/bootstrap.min.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
{{--<script src="/assets/majestic/js/flow.js/src/flow.js"></script>--}}
<script src="/assets/majestic/js/custom.js"></script>
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

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    function fncaa(idlink){
        $('#'+idlink).trigger('click');
    }

    $( document ).ready(function() {
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
    });
</script>
<script>
    function setrate( rate, postid) {
        jQuery.get("/setratingpost/"+rate+"/"+postid, function (data) {
            $("#setrateanswer").html("<div>"+data.response+"</div>");
        });
    }

    function addcomment(postid) {
         var msg   = $('#formx').serialize();
         $.ajax({
             type: 'POST',
             url: '/addcomment/'+postid,
             data: msg,
             success: function(data) {
                 if (data.guest == '1') {
                     $("#thanksforcomment").html("<div>"+data.thanx+"</div>");
                 } else {
                     var newCommentsDiv = '<li>' +
                             '<div class="avatar">' +
                             '<a href="/user/'+ data.userid +'"><img src="imgpref/'+ data.useravatar +'/83/10000" alt="avatar"/></a>' +
                             '</div>' +
                             '<div class="comment">' +
                             '<h5><a href="/user/'+ data.userid +'">'+data.username+'</a></h5>' +
                             '<span class="time">('+ data.datetime +')</span>' +
                             '<p>' +
                             data.newcomment +
                             '</p>' +
//                             '<a href="#" class="reply-button">Reply</a>' +
                             '</div>' +
                             '</li>';
                             $("#thanksforcomment").html("<div>"+data.thanx+"</div>");
                             $('#comments-list').append(newCommentsDiv);
                             $('#comments-list').children("li").slideDown();
                 }
             },
             error:  function(xhr, str){
                 alert('Возникла ошибка: ' + xhr.responseCode);
             }
         });
     }
     function addcommentblog(blogpostid) {
             var msg   = $('#formxblog').serialize();
             $.ajax({
                 type: 'POST',
                 url: '/blog/addcomment/'+blogpostid,
                 data: msg,
                 success: function(data) {
                     if (data.guest == '1') {
                         $("#thanksforcomment").html("<div>"+data.thanx+"</div>");
                     } else {
                         var newCommentsDiv = '<li>' +
                                 '<div class="avatar">' +
                                 '<a href="/user/'+ data.userid +'"><img src="imgpref/'+ data.useravatar +'/83/10000" alt="avatar"/></a>' +
                                 '</div>' +
                                 '<div class="comment">' +
                                 '<h5><a href="/user/'+ data.userid +'">'+data.username+'</a></h5>' +
                                 '<span class="time">('+ data.datetime +')</span>' +
                                 '<p>' +
                                 data.newcomment +
                                 '</p>' +
//                             '<a href="#" class="reply-button">Reply</a>' +
                                 '</div>' +
                                 '</li>';
                         $("#thanksforcomment").html("<div>"+data.thanx+"</div>");
                         $('#comments-list').append(newCommentsDiv);
                         $('#comments-list').children("li").slideDown();
                     }
                 },
                 error:  function(xhr, str){
                     alert('Возникла ошибка: ' + xhr.responseCode);
                 }
             });
         }
     function subscribe() {
             var msg   = $('#frmsubscribe').serialize();
             $.ajax({
                 type: 'post',
                 url: 'subsnews',
                 data: msg,
                 success: function( data ) {
                         $("#thankssubscribe").html("<div>"+data.response+"</div>");
                 },
                 error:  function(xhr, str){
                     alert('Возникла ошибка: ' + xhr.responseCode);
                 }
             });
         }
        jQuery(document).ready(function ($) {

            $('#tabs').tab();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

       });
      $('textarea').ckeditor();
    </script>