<?php

namespace backend\modules\jobs\controllers;

use Yii;
use yii\web\Controller;
use common\models\User;
use common\models\Vacancies;

/**
 * Default controller for the `jobs` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model = Vacancies::find()->all();
        
        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
