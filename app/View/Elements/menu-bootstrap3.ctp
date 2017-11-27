<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?= $this->Html->link($title, '/', ['escape' => false, 'class' => 'navbar-brand']) ?>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul id="menu" class="nav navbar-nav">
                <?= $this->FrontEnd->getMenu() ?>
            </ul>
            <ul id="menu-admin" class="nav navbar-nav pull-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle"
                       data-toggle="dropdown"><?= $this->Session->read("Auth.User.name") ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?= $this->Html->link('<i class="fa fa-sign-out"></i> Sair', '/users/logout', ['escape' => false]) ?></li>
                        <li><?= $this->Html->link('<i class="fa fa-user"></i> Meus dados', '/users/manageAccount',['escape' => false]) ?></li>
                        <li class="divider"></li>
                        <li class="nav-header">Último Login</li>
                        <?php
                        $date = $this->Session->read("Auth.User.last_login");
                        if ($date) {
                            ?>
                            <li class="logtime"><i class="fa fa-calendar-o"></i> <?= $this->Time->format("d/m/Y", $date) ?>
                            </li>
                            <li class="logtime"><i class="fa fa-clock-o"></i> <?= $this->Time->format("H:i:s", $date) ?>
                            </li>

                        <?php } else { ?>

                            <li class="logtime">Nunca</li>

                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->

    </div>
</nav>