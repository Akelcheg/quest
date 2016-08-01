<?php

use yii\helpers\Url;

?>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" ng-controller="userController">
    <ul class="nav navbar-nav navbar-right">
        <li><a href="/quest/web/">ГЛАВНАЯ <p class="nav-icons"><i class="fa fa-key" aria-hidden="true"></i></p></a></li>
        <li><a href="/quest/web/hi">КВЕСТЫ <p class="nav-icons"><i class="fa fa-key" aria-hidden="true"></i></p></a>
        </li>
        <li><a href="#">КОНТАКТЫ <p class="nav-icons"><i class="fa fa-key" aria-hidden="true"></i></p></a></li>
        <li><a href="#">О НАС <p class="nav-icons"><i class="fa fa-key" aria-hidden="true"></i></p></a></li>
        <li><a href="#">ФРАНШИЗА <p class="nav-icons"><i class="fa fa-key" aria-hidden="true"></i></p></a></li>
        <li><a href="#">ПОДАРОК <p class="nav-icons"><i class="fa fa-gift" aria-hidden="true"></i></p></a></li>
        <li ng-show="loggedIn()" ng-click="logout()" class="ng-hide">
            <a href="javascript:void(0)">
            ВЫЙТИ
            <p class="nav-icons"><i class="fa fa-lock" aria-hidden="true"></i></p></a>
        </li>
        <li data-match-route="/login" ng-hide="loggedIn()" class="ng-hide">
            <a href="<?= Url::to('login') ?>">
                ВОЙТИ
            <p class="nav-icons"><i class="fa fa-lock" aria-hidden="true"></i></p></a>
        </li>
    </ul>
</div>