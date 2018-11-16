<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\AccountActivationForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\Categories;
use common\models\Projects;
use common\models\UserProfile;
use yii\data\Pagination;
use common\models\User;
use yii\helpers\Json;
use common\models\Rating;
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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest){
            $check = UserProfile::find()->where(['user_id'=>Yii::$app->user->identity->id])->all();
            foreach ($check as $user){
                $user_id = $user['id'];
            }
            if ($check == NULL){
                $this->redirect(['/user-profile/create']);
            }
            else {
                $model = new Projects();
                return $this->render('index', [
                    'model'=>$model,
                ]);
            }
        }
        else {
            $model = new Projects();
            return $this->render('index', [
                'model'=>$model,
            ]);
        }
    }
    public function actionUpdateRating() {
        if ( Yii::$app->request->post() && Yii::$app->request->post ('rating_by') != null) {
            $model = new Rating();
            $check = $model->find()->where(['user_id'=>Yii::$app->request->post ('being_rated')])->andWhere(['rating_by'=>Yii::$app->request->post ('rating_by')])->all();
            $response['success'] = false;
            if ($check == null){
                $model->user_id = Yii::$app->request->post ('being_rated');
                $model->rating = Yii::$app->request->post ('rating');
                $model->rating_by = Yii::$app->request->post ('rating_by');
                $model->save();
                $response['rating'] = Rating::find()->where(['user_id'=>Yii::$app->request->post ('being_rated')])->average('rating');
                $response['record'] = $model->id;
                $response['success'] = true;
            }
        }
        echo Json::encode ($response );
        Yii::$app->end ();
    }
    public function actionUpdateRatingComment($id,$comment) {
        if ($id!="undefined"){
            $model = Rating::findOne($id);
            $model->comment = $comment;
            $model->save(false);
        }
        $this->redirect(['/site/freelancers']);
        
    }
    
    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
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
    
    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        
        return $this->goHome();
    }
    
    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $contact = new ContactForm();
        
        $model = new Projects();
        
        $category = Categories::find()->all();
        
        if ($contact->load(Yii::$app->request->post()) && $contact->validate()) {
            if ($contact->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }
            return $this->refresh();
        } else {
            return $this->render('contact', [
                'category'=>$category,
                'model'=>$model,
                'contact'=>$contact,
            ]);
        }
    }
    
    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    /**
     * Displays jobs page.
     *
     * @return mixed
     */
    public function actionJobs()
    {
        $model = new Projects();
        
        $category = Categories::find()->all();
        
        $query = Projects::find()->where(['status'=>'ACTIVE'])->orderBy(['id'=>SORT_DESC]);
        $pagination = new Pagination(['defaultPageSize' => 10, 'totalCount' => $query->count()]);
        
        $jobs =  $query->offset($pagination->offset)->limit($pagination->limit) ->all();
        
        
        return $this->render('jobs', [
            'category'=>$category,
            'model'=>$model,
            'jobs'=>$jobs,
            'pagination'=>$pagination,
        ]);
    }
    public function actionSearch()
    {
        $model = new Projects();
        
        $category = Categories::find()->all();
        
        $query = Projects::find()->where(['status'=>'ACTIVE']);
        $pagination = new Pagination(['defaultPageSize' => 10, 'totalCount' => $query->count()]);
        
        $jobs =  $query->offset($pagination->offset)->limit($pagination->limit) ->all();
        
        
        return $this->render('jobs', [
            'category'=>$category,
            'model'=>$model,
            'jobs'=>$jobs,
            'pagination'=>$pagination,
        ]);
    }
    /**
     * Displays freelancers page.
     *
     * @return mixed
     */
    public function actionFreelancers()
    {
        $model = new Projects();
        
        $category = Categories::find()->all();
        
        $users = new UserProfile();
        $data = $users->getFreelancers();
        
        return $this->render('freelancers',[
            'category'=>$category,
            'model'=>$model,
            'data'=>$data,
        ]);
    }
    /**
     * Displays job categories page.
     *
     * @return mixed
     */
    public function actionJobCategory($id)
    {
        $model = new Projects();
        
        $category = Categories::find()->all();
        
        $query = Projects::find()->where(['cat_id'=>$id]);
        $pagination = new Pagination(['defaultPageSize' => 10, 'totalCount' => $query->count()]);
        
        $jobs =  $query->offset($pagination->offset)->limit($pagination->limit) ->all();
        
        
        return $this->render('jobs', [
            'category'=>$category,
            'model'=>$model,
            'jobs'=>$jobs,
            'pagination'=>$pagination,
        ]);
    }
    /**
     * Displays job categories page.
     *
     * @return mixed
     */
    public function actionJobBudget($min, $max)
    {
        $model = new Projects();
        
        $category = Categories::find()->all();
        
        $query = Projects::find()->where(['between', 'budget', $min, $max]);
        $pagination = new Pagination(['defaultPageSize' => 10, 'totalCount' => $query->count()]);
        
        $jobs =  $query->offset($pagination->offset)->limit($pagination->limit) ->all();
        
        
        return $this->render('jobs', [
            'category'=>$category,
            'model'=>$model,
            'jobs'=>$jobs,
            'pagination'=>$pagination,
        ]);
    }
    /**
     * Displays job categories page.
     *
     * @return mixed
     */
    public function actionJobLength($start, $end)
    {
        $model = new Projects();
        
        $category = Categories::find()->all();
        
        $query = Projects::find()->where(['between', 'budget', $min, $max]);
        $pagination = new Pagination(['defaultPageSize' => 10, 'totalCount' => $query->count()]);
        
        $jobs =  $query->offset($pagination->offset)->limit($pagination->limit) ->all();
        
        
        return $this->render('jobs', [
            'category'=>$category,
            'model'=>$model,
            'jobs'=>$jobs,
            'pagination'=>$pagination,
        ]);
    }
    
    /**
     * Displays how it works page.
     *
     * @return mixed
     */
    public function actionHow()
    {
        return $this->render('how-it-works');
    }
    /**
     * Displays how it works page.
     *
     * @return mixed
     */
    public function actionJobpost($id)
    {
        $jobs = Projects::find()->where(['id'=>$id])->all();
        
        return $this->render('jobpost', [
            'jobs'=>$jobs,
        ]);
    }
    
    /**
     * Displays sign up options page.
     *
     * @return mixed
     */
    public function actionRegister()
    {
        return $this->render('register');
    }
    
    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup($id)
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            $model->signup($id);
            Yii::$app->session->setFlash('success', 'Please check your mail box, Account Activation Link has been send to your Email. If you don\'t receive mail in your inbox please check your Junk Mail');
            return $this->redirect(['/site/response']);
        }
        
        return $this->render('signup', [
            'model' => $model,
        ]);
    }
    /**
     * Displays user profile page.
     *
     * @return mixed
     */
    public function actionProfile($id)
    {
        $model = new UserProfile();
        $data = $model->getUserProfile($id);
        $reviews = Rating::find()->where(['user_id'=>$id])->all();
        
        return $this->render('profile',[
            'data'=>$data,
            'reviews'=>$reviews,
        ]);
    }
    /**
     * Displays Terms of Use page.
     *
     * @return mixed
     */
    public function actionPrivacy()
    {
        return $this->render('privacy');
    }
    /**
     * Displays Privacy Policy page.
     *
     * @return mixed
     */
    public function actionTerms()
    {
        return $this->render('terms');
    }
    /**
     * Displays Frequently Asked Questions page.
     *
     * @return mixed
     */
    public function actionFaq()
    {
        return $this->render('faq');
    }
    /**
     * Displays request message page.
     *
     * @return mixed
     */
    public function actionResponse()
    {
        
        $model = new Projects();
        
        $category = Categories::find()->all();
        return $this->render('response',[
            'model'=>$model,
            'category'=>$category,
        ]);
    }
    
    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                
                return $this->redirect(['/site/response']);
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }
        
        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }
    
    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');
            
            return $this->redirect(['/site/response']);
        }
        
        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    
    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionActivateAccount($token)
    {
        try {
            $model = new AccountActivationForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        
        if ($model->activateAccount()) {
            Yii::$app->session->setFlash('success', 'Your Account has been Activated Successfully.');
            
            return $this->redirect(['/site/response']);
        }
    }
}
