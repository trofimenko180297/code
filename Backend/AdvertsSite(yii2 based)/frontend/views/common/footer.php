<?php
if (\Yii::$app->user->isGuest){
    echo frontend\widgets\Login::widget();
    echo frontend\widgets\Register::widget();
}
?>
<div class="footer">

    <div class="container">

        <div class="row">
            <div class="col-lg-3 col-sm-3">
                <h4>Information</h4>
                <ul class="row">

                </ul>
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Newsletter</h4>
                <p>Get notified about the latest properties in our marketplace.</p>
                <?php
                    echo frontend\widgets\SubscribeWidget::widget();
                ?>
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Follow us</h4>
                <a href="#"><img src="/images/facebook.png"  alt="facebook"></a>
                <a href="#"><img src="/images/twitter.png"  alt="twitter"></a>
                <a href="#"><img src="/images/linkedin.png"  alt="linkedin"></a>
                <a href="#"><img src="/images/instagram.png"  alt="instagram"></a>
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Contact us</h4>
                    <span class="glyphicon glyphicon-map-marker"></span>Ukraine, Kiev<br>
                    <span class="glyphicon glyphicon-envelope"></span> yii2.local@mail.com<br>
                    <span class="glyphicon glyphicon-earphone"></span> +38099999999</p>
            </div>
        </div>
        <p class="copyright">Copyright <?=date("Y")?>. All rights reserved.	</p>


    </div></div>
