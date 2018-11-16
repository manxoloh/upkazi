<?php

namespace backend\modules\communication\controllers;

use yii\web\Controller;
use common\models\EventsCalendar;

/**
 * Event controller for the `communication` module
 */
class EventController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        foreach (EventsCalendar::find()->all() as $value){
            $events = array();
            //Testing
            $Event = new \yii2fullcalendar\models\Event();
            $Event->id = $value['id'];
            $Event->title = $value['title'];
            $Event->start = date('Y-m-d\TH:i:s\Z', strtotime($value['start_date']));
            $events[] = $Event;
        }
    
        return $this->render('index', ['events'=>$events]);
    }
}
