<!-- Header Starts -->
<div class="navbar-wrapper">

    <div class="navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">


                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="http://yii2.local/" >Home</a></li>
                    <li><a href="/main/main/contact" >Contact US</a></li>
                    <?php
                    if (!Yii::$app->user->isGuest) {
                    ?>
                        <li class="alert-danger"><a href="/cabinet/profile"><?=Yii::$app->user->identity->username?> (profile)</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <!-- #Nav Ends -->

        </div>
    </div>

</div>
<!-- #Header Starts -->





<div class="container">

    <!-- Header Starts -->
    <div class="header">
        <div class="row">
            <div class="col-md-2">
        <a href="/" ><img src="/images/logo.png"  alt="Logo"></a>
            </div>
            <div class="col-md-10">
        <?php
        $guest = Yii::$app->user->isGuest;
        if ($guest){
            $menuItems[] = ['label' => 'login', 'url' => '#', 'linkOptions' => ['data-toggle' => 'modal','data-target' => '#loginpop']];
            $menuItems[] = ['label' => 'register', 'url' => '#', 'linkOptions' => ['data-toggle' => 'modal','data-target' => '#registerpop']];
        }else{
            $menuItems[] = ['label' => 'Adverts manager', 'url' => '/cabinet/advert'];
            $menuItems[] = ['label' => 'Logout', 'url' => '/main/main/logout'];
        }
        echo \yii\bootstrap\Nav::widget([
                'options' => ['class' => 'pull-right'],
                'items' => $menuItems
        ]);
        ?>
            </div>
        </div>
    </div>
    <!-- #Header Starts -->
</div>