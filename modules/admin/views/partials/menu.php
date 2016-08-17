<?php
use yii\helpers\Html;

?>
<div class="col-sm-3">
    <!-- Left column -->
    <a href="#"><strong><i class="glyphicon glyphicon-wrench"></i> Tools</strong></a>

    <hr>
    вхуярить сюда список броней на сегодня
    <ul class="nav nav-stacked">
        <li class="nav-header"><a href="#" data-toggle="collapse" data-target="#userMenu">Квесты <i
                    class="glyphicon glyphicon-chevron-right"></i></a>
            <ul class="nav nav-stacked collapse" id="userMenu">
                <li><?= Html::a('<i class="glyphicon glyphicon-list"></i> Список квестов', ['quest/'], ['class' => '']) ?></li>
                <li><?= Html::a('<i class="glyphicon glyphicon-plus"></i> Создать квест', ['quest/create'], ['class' => '']) ?></li>

            </ul>
        </li>

        <li class="nav-header"><a href="#" data-toggle="collapse" data-target="#menu2"> Reports <i
                    class="glyphicon glyphicon-chevron-right"></i></a>

            <ul class="nav nav-stacked collapse" id="menu2">
                <li><a href="#">Information &amp; Stats</a>
                </li>
                <li><a href="#">Views</a>
                </li>
                <li><a href="#">Requests</a>
                </li>
                <li><a href="#">Timetable</a>
                </li>
                <li><a href="#">Alerts</a>
                </li>
            </ul>
        </li>
        <li class="nav-header">
            <a href="#" data-toggle="collapse" data-target="#menu3"> Social Media <i
                    class="glyphicon glyphicon-chevron-right"></i></a>
            <ul class="nav nav-stacked collapse" id="menu3">
                <li><a href=""><i class="glyphicon glyphicon-circle"></i> Facebook</a></li>
                <li><a href=""><i class="glyphicon glyphicon-circle"></i> Twitter</a></li>
            </ul>
        </li>
    </ul>

    <hr>

    <a href="#"><strong><i class="glyphicon glyphicon-link"></i> Resources</strong></a>

    <hr>

    <ul class="nav nav-pills nav-stacked">
        <li class="nav-header"></li>
        <li><a href="#"><i class="glyphicon glyphicon-list"></i> Layouts &amp; Templates</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-briefcase"></i> Toolbox</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-link"></i> Widgets</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i> Reports</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-book"></i> Pages</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-star"></i> Social Media</a></li>
    </ul>

    <hr>
    <ul class="nav nav-stacked">
        <li class="active"><a href="http://bootply.com" title="The Bootstrap Playground"
                              target="ext">Playground</a></li>
        <li><a href="/tagged/bootstrap-3">Bootstrap 3</a></li>
        <li><a href="/61518" title="Bootstrap 3 Panel">Panels</a></li>
        <li><a href="/61521" title="Bootstrap 3 Icons">Glyphicons</a></li>
        <li><a href="/62603">Layout</a></li>
    </ul>

    <hr>

    <a href="#"><strong><i class="glyphicon glyphicon-list"></i> More Templates</strong></a>

    <hr>

    <ul class="nav nav-stacked">
        <li class="active"><a rel="nofollow" href="http://goo.gl/pQoXEh" target="ext">Premium Themes</a></li>
        <li><a rel="nofollow" href="https://wrapbootstrap.com/?ref=bootply">Wrap Bootstrap</a></li>
        <li><a rel="nofollow" href="http://bootstrapzero.com">BootstrapZero</a></li>
    </ul>
</div>