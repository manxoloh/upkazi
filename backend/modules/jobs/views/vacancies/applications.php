<?php
use yii\helpers\Html;
use yii\grid\GridView;
use fedemotta\datatables\DataTables;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use common\models\User;
use common\models\ApplicationStatus;
use common\models\Status;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\VacancySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'All Job Applicants';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="content">
				<div class="toolbar">
				    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="fresh-datatables">
					<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
						<thead>
							<tr>
                    			<th>No</th>
                    			<th>Applicant</th>
                    			<th>ID No</th>
                    			<th>Email</th>
                    			<th>Salary</th>
                    			<th>Status</th>
								<th class="disabled-sorting text-right">Actions</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
                    			<th>No</th>
                    			<th>Applicant</th>
                    			<th>ID No</th>
                    			<th>Email</th>
                    			<th>Salary</th>
                    			<th>Status</th>
								<th class="disabled-sorting text-right">Actions</th>
							</tr>
						</tfoot>
						<tbody>
                    	<?php
                        	$no = 0;
                        	foreach ($model as $applicant){ $no++; 
                            $user = User::findOne($applicant['applicant_id']);   
                            $state = Status::getApplicationStatus($applicant['app_id']);
                            $status = $state->description;
                            $stt_id = $state->stt_id;
                        ?>
							<tr>
								<td><?= $no ?>
                    			<td><?= $user->firstname.' '.$user->lastname ?></td>
                    			<td><?= $user->id_number ?></td>
                    			<td><?= $user->email ?></td>
                    			<td><?= 'KSh. '. $applicant['salary'] ?></td>
                    			<?php 
                        			if ($status=="Applied"){
                        			    echo '<td>'.Html::a('<button  class="btn btn-warning btn-xs btn-block" title="Click to view more details">'.$status.'</button> ',['/settings/users/profile', 'id'=>$applicant['applicant_id']]).'</td>';
                        			}
                        			elseif ($status=="Qualified"){
                        			    echo '<td>'.Html::a('<button  class="btn btn-primary btn-xs btn-block" title="Click to view more details">'.$status.'</button> ',['/settings/users/profile', 'id'=>$applicant['applicant_id']]).'</td>';
                        			}
                        			elseif ($status=="Rejected"){
                        			    echo '<td>'.Html::a('<button  class="btn btn-danger btn-xs btn-block" title="Click to view more details">'.$status.'</button> ',['/settings/users/profile', 'id'=>$applicant['applicant_id']]).'</td>';
                        			}
                        			elseif ($status=="Appointed"){
                        			    echo '<td>'.Html::a('<button  class="btn btn-success btn-xs btn-block" title="Click to view more details">'.$status.'</button> ',['/settings/users/profile', 'id'=>$applicant['applicant_id']]).'</td>';
                        			}
                        			elseif ($status=="Invited"){
                        			    echo '<td>'.Html::a('<button  class="btn btn-success btn-xs btn-block" title="Click to view more details">'.$status.'</button> ',['/settings/users/profile', 'id'=>$applicant['applicant_id']]).'</td>';
                        			}
                        			if ($status=="Applied"){
                        			    echo '<td>'.Html::a('<button  class="btn btn-info btn-xs btn-block" title="Invite Candidate for Interview"> Invite </button> ',['/jobs/vacancies/invite', 'app_id'=>$applicant['app_id'], 'email'=>$user->email, 'name'=>$user->firstname.' '.$user->lastname],['class'=>'popup']).'</td>';
                        			}
                        			elseif ($status=="Qualified"){
                        			    echo '<td>'.Html::a('<button  class="btn btn-info btn-xs btn-block" title="Invite Candidate for Interview"> Invite </button> ',['/jobs/vacancies/invite', 'app_id'=>$applicant['app_id'], 'email'=>$user->email, 'name'=>$user->firstname.' '.$user->lastname],['class'=>'popup']).'</td>';
                        			}
                        			elseif ($status=="Rejected"){
                        			    echo '<td>'.Html::a('<button  class="btn btn-info btn-xs btn-block" title="Invite Candidate for Interview"> Consider </button> ',['/jobs/vacancies/invite', 'app_id'=>$applicant['app_id'], 'email'=>$user->email, 'name'=>$user->firstname.' '.$user->lastname],['class'=>'popup']).'</td>';
                        			}
                        			elseif ($status=="Invited"){
                        			    echo '<td>'. Html::a('<button  class="btn btn-info btn-xs btn-block" title="Interview Candidate">Interview</button > ',["/jobs/vacancies/interview",'app_id'=>$applicant['app_id']],['class'=>'popup']);'</td>';
                        			    
                        			}
                        			elseif ($status=="Appointed"){
                        			    echo '<td><button class="btn btn-info btn-xs btn-block" title="Click to view more details">View</button></td>';
                        			}
                    			?>
							</tr>
						<?php } ?>
						</tbody>
					</table>
		        </div>
            </div><!-- end content-->
        </div><!--  end card  -->
    </div> <!-- end col-md-12 -->
</div> <!-- end row -->