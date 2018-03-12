
<?php
use yii\web\Cookie;
use yii\base\Security;
?>
<pre>
    <?php
        // if(Yii::$app->request->cookies->has('basketId')){
        //     echo Yii::$app->request->cookies->get('basketId')->value;
        // }else{

        // }
        $basketId = (new Security)->generateRandomString(8);
        $basketIdCookie = new Cookie([
            'name' => 'basketId',
            'value' => $basketId,
            'expire' => time() + 60*60*24*30,
        ]);
        Yii::$app->response->cookies->add($basketIdCookie);
        echo Yii::$app->request->cookies->get('basketId')->value;
        var_dump(Yii::$app->request->cookies->get('basketId')->expire);
    ?>
</pre>