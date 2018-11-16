<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use common\models\Industries;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VacanciesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vacancies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="content">
				<div class="toolbar">
				<a href="<?= Url::to(['/jobs/vacancies/create'])?>" class="popup"><button class="btn btn-success btn-sm pull-right">Create New Vacancy</button></a><br><br>
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="fresh-datatables">
					<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
                    			<th>Title</th>
                    			<th>Reference</th>
                    			<th>Industry</th>
                    			<th>Location</th>
                    			<th>Posts</th>
                    			<th>Deadline</th>
                    			<th>Status</th>
								<th class="disabled-sorting text-right">Actions</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>No</th>
                    			<th>Title</th>
                    			<th>Reference</th>
                    			<th>Industry</th>
                    			<th>Location</th>
                    			<th>Posts</th>
                    			<th>Deadline</th>
                    			<th>Status</th>
								<th class="disabled-sorting text-right">Actions</th>
							</tr>
						</tfoot>
						<tbody>
                    	<?php
                        	$no = 0;
                            foreach ($model as $record){ $no++; 
                        ?>
							<tr>
								<td><?= $no ?></td>
                        		<td><?= $record['title'] ?></td>
                        		<td><?= $record['reference_number'] ?></td>
                        		<td><?= Industries::findOne($record['ind_id'])->title ?></td>
                        		<td><?= $record['location'] ?></td>
                        		<td><?= $record['vacancy_number'] ?></td>
                        		<td><?= $record['end_date'] ?></td>
								<td>
									<?php if($record['status'] == "Active"){ ?>
									<button type="button" class="btn btn-block btn-xs btn-success" title="This Job Is Active"> <span class="btn-label"></span>Active</button>
                                    <?php } ?>
									<?php if($record['status'] == "Closed"){ ?>
									<button type="button" class="btn btn-block btn-xs btn-danger" title="This Job Is Closed"> <span class="btn-label"></span>Closed</button>
                                    <?php } ?>
								</td>
								<td class="text-right">
    								<a href="<?= Url::to(['/jobs/vacancies/view', 'id'=>$record['vcn_id']]) ?>"><button type="button" class="btn btn-xs btn-info" title="View Job Vacancy Information"> <span class="btn-label"><i class="fa fa-eye"></i></span></button></a>
    								<a href="<?= Url::to(['/jobs/vacancies/applications', 'id'=>$record['vcn_id']]) ?>"><button type="button" class="btn btn-xs btn-success" title="View Job Vacancy Applicantion"> <span class="btn-label"><i class="fa fa-list"></i></span></button></a>
    								<a href="<?= Url::to(['/jobs/vacancies/update', 'id'=>$record['vcn_id']]) ?>"><button type="button" class="btn btn-xs btn-warning" title="Update Job Vacancy Information"> <span class="btn-label"><i class="fa fa-edit"></i></span></button></a>
    								<a href="<?= Url::to(['/jobs/vacancies/delete', 'id'=>$record['vcn_id']]) ?>" class="delete-button" data-method="post" data-confirm="Are you sure you want to delete this Job Vacancy record?"><button type="button" class="btn btn-xs btn-danger" title="Delete User Information"> <span class="btn-label"><i class="fa fa-remove"></i></span></button></a>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
		        </div>
            </div><!-- end content-->
        </div><!--  end card  -->
    </div> <!-- end col-md-12 -->
</div> <!-- end row -->
