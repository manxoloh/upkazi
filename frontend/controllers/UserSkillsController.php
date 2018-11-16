<?php

namespace frontend\controllers;

use Yii;
use common\models\UserSkills;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserSkillsController implements the CRUD actions for UserSkills model.
 */
class UserSkillsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all UserSkills models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = UserSkills::find()->where(['user_id'=>Yii::$app->user->identity->id])->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single UserSkills model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UserSkills model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserSkills();

        if ($model->load(Yii::$app->request->post())) {
            
            foreach ($model->skill_id as $skill){
                $check = UserSkills::find()
                ->where(['user_id'=>Yii::$app->user->identity->id, 'skill_id'=> $skill])
                ->all();
                if ($check == null)
                {                    
                    $newSkill = new UserSkills();
                    $newSkill->user_id = Yii::$app->user->identity->id;
                    $newSkill->skill_id = $skill;
                    $newSkill->save();
                }else {
                    continue;
                }
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UserSkills model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UserSkills model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserSkills model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserSkills the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserSkills::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
