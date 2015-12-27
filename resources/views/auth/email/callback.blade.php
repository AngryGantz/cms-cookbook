<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 27.12.15
 * Time: 20:06
 */?>

<body>
<p>
На сайте My Chifs посетитель {{ $username }} (Email {{ $useremail }} )<br>
в форме обратной связи оставил следующее сообщение:
</p>
<p>
    {!! $note !!}
</p>
</body>