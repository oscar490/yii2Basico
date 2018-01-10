<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

class Prueba extends \yii\base\Component
{
    const EVENTO_HOLA = 'hola';

    private $_numero;

    public function __construct($numero = 0 , $config = [])
    {
        $this->setNumero($numero);

        parent::__construct($config);
    }

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

    //public function behaviors()
    //{
        // lista de comportamientos
    //    return [
    //        [
    //            'class' => Comportamiento::className(),
    //            'propiedad' => 20,
    //        ],
    //    ];
    //}
}

$p = Yii::createObject([
    'class'=>'Prueba',
    'numero'=>88,
]);

$q = Yii::createObject([
    'class' => 'Prueba',
]);

\yii\base\Event::on(Prueba::className(), Prueba::EVENTO_HOLA, function ($event) {
    echo "Se dispara el evento <br>";
});

class Comportamiento extends \yii\base\Behavior
{
    public $miembro;
    private $_propiedad;

    public function getPropiedad()
    {
        return $this->_propiedad;
    }

    public function setPropiedad($propiedad)
    {
        $this->_propiedad = $propiedad;
    }

    public function metodo()
    {
        echo 'hola <br>';
    }


}

$p = Yii::createObject([
    'class'=>Prueba::className(),
    'as comportamento' => [
        'class' => Comportamiento::className(),
        'propiedad' => 95,
    ]
]);


echo $p->propiedad;
//$p->trigger(Prueba::EVENTO_HOLA);
//$q->trigger(Prueba::EVENTO_HOLA);

//$config = require __DIR__ . '/../config/web.php';

//(new yii\web\Application($config))->run();
