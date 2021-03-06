<!--footer-->
<div class="footer footer-variant-one footer-fluid">
    <div class="container">
        <div class="footer-inner">
            <div class="text-center">
                <a class="logo-footer wow animated zoomIn" href="index.html"><img src="/assets/majestic/images/logo4.png" alt="Logo"/></a>
                <p class="wow animated flipInX">
                    Mychefs.ru – Это книга для записи кулинарных рецептов. Кулинарные рецепты  Вы размещаете сами, делясь своим опытом и секретами с остальными гостями проекта. Способствовать приготовлению вашего шедевра будут удобные рецепты с пошаговым фото.
                    Приятного аппетита!
                </p>
            </div>

            <div class="subs-social-options">
                <div class="row custom-row-footer">
                    <div class="col-md-6 custom-col-options">
                        <div class="left-side">
                            <div class="widget widget-footer news-letter-signup wow animated flipInY">
                                <h2>Подписаться на новости</h2>
                                <form method="POST"  class="subs-form" id="frmsubscribe" action="javascript:void(null);" onsubmit="subscribe()">
                                    <div class="email-field">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="email" name="email" placeholder="Ваш Email"/>
                                        <button type="submit"><i class="fa fa-paper-plane-o"></i></button>
                                    </div>
                                </form>

                                <div id="thankssubscribe" style="color:white;"></div>

                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="right-side">
                            <div class="widget widget-footer social-icons">
                                <h2 class="wow animated fadeInRight">Мы в социальных сетях</h2>
                                <ul>
                                    <li class="wow animated bounceInRight"><a href="#"><i class="fa fa-vk"></i></a></li>
                                    <li class="wow animated bounceInRight animation-delay100ms" ><a href="#"><i class="fa fa-odnoklassniki"></i></a></li>
                                    <li class="wow animated bounceInRight  animation-delay200ms"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="wow animated bounceInRight animation-delay300ms"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="wow animated bounceInRight animation-delay400ms"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li class="wow animated bounceInRight animation-delay400ms" ><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright text-center">
                <p>&copy; Copyright 2015 All Rights Reserved by <a href="#">DP Studio</a></p>
            </div>

            <div class="corner-image wow animated fadeInRight">
                <img src="images/footer-corner-image.jpg" alt="image"/>
            </div>
        </div>
        @include('widgets.advert_aside1', [ 'pos' => 'foot_script'])
    </div>
</div>

<!--footer ends-->