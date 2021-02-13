<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
           <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->name?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Навигация', 'options' => ['class' => 'header']],
                    ['label' => 'Главная', 'icon' => 'dashboard', 'url' => ['/admin']],
                    ['label' => 'Регионы', 'icon' => 'dashboard', 'url' => ['/admin/region']],
                    ['label' => 'Категории', 'icon' => 'dashboard', 'url' => ['/admin/category']],
                    ['label' => 'Пользователи', 'icon' => 'dashboard', 'url' => ['/admin/users']],
                    ['label' => 'Статьи', 'icon' => 'dashboard', 'url' => ['/admin/articles']],

                ],
            ]
        ) ?>

    </section>

</aside>
