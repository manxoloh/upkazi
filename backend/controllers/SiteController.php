<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'lock-screen', 'icons', 'calendar'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        Yii::$app->getSession()->setFlash('success', 'Welcome to iRecruitment');
        return $this->render('index');
    }
    
    public function actionCalendar()
    {
        Yii::$app->getSession()->setFlash('success', 'iRecruitment Events Calendar');
        return $this->render('calendar');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
    public function actionLockScreen($previous)
    {
        $this->layout = 'login';
        if(isset(Yii::$app->user->identity->username)){
            // save current username
            $username = Yii::$app->user->identity->username;
            // force logout
            Yii::$app->user->logout();
            // render form lockscreen
            $model = new LoginForm();
            $model->username = $username;    //set default value
            return $this->render('lock-screen', [
                'username'=>$username,
                'model' => $model,
            ]);
        }
        else{
            $model = new LoginForm();
            if ($model->load(Yii::$app->request->post())) {
                if ($model->login()){
                    return $this->redirect($previous);
                }else {
                    return $this->render('lock-screen', [
                        'username'=>$model->username,
                        'model' => $model,
                    ]);
                }
            }
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionIcons()
    {        
        Yii::$app->getSession()->setFlash('success', 'Over 200 iRecruitment Icons Found');
        return $this->render('icons');
    }
    public function actionLogout()
    {
        Yii::$app->user->logout();
        
        return $this->goHome();
    }
}
