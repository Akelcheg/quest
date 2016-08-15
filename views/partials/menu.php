<?php

use yii\helpers\Url;

?>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" ng-controller="userController">
    <ul class="nav navbar-nav navbar-right" style="padding-top: 8px;">
        <li><a href="/">ГЛАВНАЯ <p class="nav-icons"><i class="fa fa-key" aria-hidden="true"></i></p></a></li>
        <li><a href="/quests">КВЕСТЫ <p class="nav-icons"><i class="fa fa-key" aria-hidden="true"></i></p></a>
        </li>
        <li><a href="/contact">КОНТАКТЫ <p class="nav-icons"><i class="fa fa-key" aria-hidden="true"></i></p></a></li>
        <li><a href="/about">О НАС <p class="nav-icons"><i class="fa fa-key" aria-hidden="true"></i></p></a></li>
        <li><a href="/franchize">ФРАНШИЗА <p class="nav-icons"><i class="fa fa-key" aria-hidden="true"></i></p></a></li>
        <li><a href="/gift">ПОДАРОК <p class="nav-icons"><i class="fa fa-gift" aria-hidden="true"></i></p></a></li>
        <li ng-show="loggedIn()" ng-click="private()" class="ng-hide">
            <a href="#">КАБИНЕТ<p class="nav-icons"><i class="fa fa-gift" aria-hidden="true"></i></p></a>
        </li>
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