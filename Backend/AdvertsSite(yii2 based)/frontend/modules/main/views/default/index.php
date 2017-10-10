<div class="">


    <div id="slider" class="sl-slider-wrapper">

        <?php
            foreach ($advert_general as $advert) :
        ?>
        <div class="sl-slider">
            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="<?=rand(-25,25)?>" data-slice2-rotation="<?=rand(-25,25)?>" data-slice1-scale="<?=rand(1,2)?>" data-slice2-scale="<?=rand(1,2)?>">
                <div class="sl-slide-inner">
                    <div class="bg-img bg-img-5" style="background-image: url('/<?=\frontend\components\Common::getImageAdvert($advert)[0]?>')"></div>
                    <h2><a href="/main/main/view-advert?id=<?=$advert['idadvert']?>"><?=frontend\components\Common::getTittle($advert)?></a></h2>
                    <blockquote>
                        <p class="location"><span class="glyphicon glyphicon-map-marker"></span><?=$advert['address']?></p>
                        <p><?=\frontend\components\Common::getShortDescription($advert['description'])?></p>
                        <cite><?=$advert['price']?>$</cite>
                    </blockquote>
                </div>
            </div>
        </div>
        <?php
            endforeach;
        ?>

        <nav id="nav-dots" class="nav-dots">
        <?php if ($general_count >= 1): ?>
            <span class="nav-dot-current"></span>
            <?php if ($general_count > 1): ?>
                <?php foreach (range(2,$general_count) as $item): ?>
                    <span></span>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>
        </nav>

    </div><!-- /slider-wrapper -->
</div>
<div class="banner-search">
    <div class="container">
        <!-- banner -->
        <h3>Buy, Sale & Rent</h3>
        <div class="searchbar">
            <div class="row">
                <?=\yii\helpers\Html::beginForm(\yii\helpers\Url::to('main/main/find/'),'get') ?>
                <div class="col-lg-6 col-sm-6">
                    <?=\yii\helpers\Html::textInput('property', '', ['class' => 'form-control', 'placeholder' => 'Search']) ?>
                    <div class="row">
                        <div class="col-lg-3 col-sm-4">
                            <?=\yii\helpers\Html::dropDownList('price', '',[
                                '150000-200000' => '$150,000 - $200,000',
                                '200000-250000' => '$200,000 - $250,000',
                                '250000-300000' => '$250,000 - $300,000',
                                '300000' =>'$300,000 - above',
                            ],['class' => 'form-control', 'prompt' => 'Price']) ?>
                        </div>
                        <div class="col-lg-3 col-sm-4">

                            <?=\yii\helpers\Html::dropDownList('apartment', '',[
                                'Apartment',
                                'Building',
                                'Office Space',
                            ],['class' => 'form-control', 'prompt' => 'Property']) ?>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                            <?=\yii\helpers\Html::submitButton('Find Now', ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                    <?=\yii\helpers\Html::endForm() ?>


                </div>
                <?php if (\Yii::$app->user->isGuest){ ?>
                <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
                    <p>Join now and get updated with all the properties deals.</p>
                    <?php
                        echo \yii\helpers\Html::button('Login',['class' => 'btn btn-info','data-toggle' => 'modal','data-target' => '#loginpop']);
                        echo ' ';
                        echo \yii\helpers\Html::button('Register',['class' => 'btn btn-info','data-toggle' => 'modal','data-target' => '#registerpop'])
                    ?>
                </div>
                <?php }else{ ?>
                <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
                    <?php
                    echo \yii\helpers\Html::a('Add advert +','/cabinet/advert/create',['class' => 'btn btn-info'])
                    ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


<!-- banner -->
<div class="container">
    <div class="properties-listing spacer"> <a href="/main/main/find"  class="pull-right viewall">View All Listing</a>
        <h2>Featured Properties</h2>
        <div id="owl-example" class="owl-carousel">
            <?php
            foreach ($advert_featured as $advert):
            ?>
            <div class="properties">
                <div class="image-holder"><img src="<?=\frontend\components\Common::getImageAdvert($advert)[0]?>"  class="img-responsive" alt="properties"/>
                    <div class="status <?=$advert['sold'] ? 'sold':'new'?>"><?=($advert['sold']) ? 'Sold':'New'?></div>
                </div>
                <h4><a href="/main/main/view-advert?id=<?=$advert['idadvert']?>" ><?=$advert['address'] ?></a></h4>
                <p class="price">Price: <b>$</b><?=$advert['price']?></p>
                <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room"><?=$advert['bedroom']?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room"><?=$advert['livingroom']?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking"><?=$advert['parking']?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen"><?=$advert['kitchen']?></span> </div>
                <a class="btn btn-primary" href="/main/main/view-advert?id=<?=$advert['idadvert']?>">View Details</a>
            </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>
    <div class="spacer">
        <div class="row">
            <div class="col-lg-6 col-sm-9 recent-view">
                <h3>About Us</h3>
                <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<br><a href="about.html" >Learn More</a></p>

            </div>
            <div class="col-lg-5 col-lg-offset-1 col-sm-3 recommended">
                <h3>Recommended Properties</h3>
                <div id="myCarousel" class="carousel slide">
                    <ol class="carousel-indicators">
                        <?php
                            foreach (range(1,$recommend_count) as $item):
                        ?>
                            <li data-target="#myCarousel" data-slide-to="<?=$item?>"></li>
                        <?php
                        endforeach;
                        ?>
                    </ol>
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <?php
                        $i = 0;
                        foreach ($advert_recommend as $advert):
                        ?>
                        <div class="item <?=($i == 0) ? 'active':''?>">
                            <div class="row">
                                <div class="col-lg-4"><img src="/<?=\frontend\components\Common::getImageAdvert($advert)[0]?>"  class="img-responsive" alt="properties"/></div>
                                <div class="col-lg-8">
                                    <h5><?=$advert['address']?></h5>
                                    <p class="price"><b>$</b><?=$advert['price']?></p>
                                    <a href="/main/main/view-advert?id=<?=$advert['idadvert']?>" class="more">More Detail</a> </div>
                            </div>
                        </div>
                        <?php
                        $i++;
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>