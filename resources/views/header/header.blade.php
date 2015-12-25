<!--pre-loader-->

{{--<div class="preloader">--}}
    {{--<div class="loadr">--}}
        {{--<svg viewbox="0 0 74.6 81">--}}
            {{--<path d="M67.8,12.9C51.7,5.2,26.2,0.2,26.2,0.2c-10.9-1.8-9.3,11.4-9,20.2c0,0.7,0.1,1.4,0.1,2c7.8,1.5,19.7,4,29.2,7.4c11.4,4.1,9.6,8.3,9.2,16c-0.2,4.9-0.4,14,1.1,21.3c7.7,1.4,13.8,1.9,13.1-0.3c-6.3-7.2-0.1-29.6,1.8-34.2C73.3,28.7,79.3,18.4,67.8,12.9z"></path>--}}
            {{--<path d="M58.9,79.5c-6.5-5.6-6.2-23.6-5.8-31.3c0.4-7.7,2.1-11.9-9.2-16c-15.3-5.5-37.3-8.8-37.3-8.8c-9.1-1.1-6.6,8.4-5.5,15.1c1.7,10,5.4,22,7.9,27.8c2.8,6.5,8.9,7.3,8.9,7.3S65.4,85.1,58.9,79.5z"></path>--}}
        {{--</svg>--}}
    {{--</div>--}}
{{--</div>--}}

<!--pre-loader ends-->
<!--header-->
    <div class="fade-load-down header header-var2 ext-var4">
        <div class="container">
            <div class="wrapper-logo-banner">
                <div class="row">
                    <div class="col-md-4">
                        <div class="logo-wrapper">
                            <a href="/"><img src="/assets/majestic/images/logo.png" alt="logo"/></a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="banner-login-wrapper">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="wrapper-links">
                                        <ul class="header-social-icons">
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
	                                    <span class="sign-in-buttons">
	                                    	@if ( ! Sentinel::check())
		                                        <a class="login" href="{{ URL::to('login') }}">Вход</a>
		                                        <a class="register" href="{{ URL::to('register') }}">Регистрация</a>
											@else 	                                        
		                                        <a class="login" href="{{ URL::to('logout') }}">Выход</a>
		                                        <a class="register" href="/user/{{Sentinel::check()->id}}">Кабинет</a>
											@endif
	                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="banner-header">
                                @include('widgets.advert_top1', ['pos' => 'top1'])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- nav-->

        <div class="top-nav">
            <div class="container">
                <nav class="responsive-menu">
                    <ul>
                        @include('widgets.menu_group_markers_list', ['groupid' => 1])
                        @include('widgets.menu_group_markers_list', ['groupid' => 2])
                        @include('widgets.menu_group_markers_list', ['groupid' => 3])
                        <li><a href="blog.html">Blog</a>
                            <ul>
                                <li><a href="single.html">Single post</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                        <li class="submit-recipe"><a href="{{ URL::to('addpost') }}">Добавить рецепт</a></li>
                    </ul>
                </nav>

            </div>
        </div>
        <!-- nav ends-->
    </div>

<!--header ends-->

