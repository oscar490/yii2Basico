<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

class Prueba extends \yii\base\Component
{
    const EVENTO_HOLA = 'hola';

    private $_numero = 0;

    public function getNumero()
    {
        return $this->_numero;
    }

    public function setNumero($numero)
    {
        if ($numero >= 0) {
            $this->_numero = $numero;
        }
    }
}

$p = Yii::createObject([
    'class'=>'Prueba',
    'numero'=>88,
]);
$p->on(Prueba::EVENTO_HOLA, function ($event) {
    echo "Se ha disparado el evento";
});

$p->trigger(Prueba::EVENTO_HOLA);


//$config = require __DIR__ . '/../config/web.php';

//(new yii\web\Application($config))->run();
