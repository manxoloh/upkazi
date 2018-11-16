<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

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
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="fresh-datatables">
					<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
                    			<th>Title</th>
                    			<th>Industry</th>
                    			<th>Reference</th>
                    			<th>Posts</th>
                    			<th>Status</th>
								<th class="disabled-sorting text-right">Actions</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>No</th>
                    			<th>Title</th>
                    			<th>Industry</th>
                    			<th>Reference</th>
                    			<th>Posts</th>
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
                        		<td><?= $record['ind_id'] ?></td>
                        		<td><?= $record['reference_number'] ?></td>
                        		<td><?= $record['vacancy_number'] ?></td>
								<td>
									<?php if($record['status'] == "Active"){ ?>
									<button type="button" class="btn btn-block btn-xs btn-success" title="This Job Is Active"> <span class="btn-label"></span>Active</button>
                                    <?php } ?>
									<?php if($record['status'] == "Closed"){ ?>
									<button type="button" class="btn btn-block btn-xs btn-danger" title="This Job Is Closed"> <span class="btn-label"></span>Closed</button>
                                    <?php } ?>
								</td>
								<td class="text-right">
    								<a href="<?= Url::to(['/jobs/vacancies/profile', 'id'=>$record['vcn_id']]) ?>"><button type="button" class="btn btn-xs btn-info" title="View User Information"> <span class="btn-label"><i class="fa fa-eye"></i></span></button></a>
    								<a href="<?= Url::to(['/jobs/vacancies/profile', 'id'=>$record['vcn_id']]) ?>"><button type="button" class="btn btn-xs btn-warning" title="Update User Information"> <span class="btn-label"><i class="fa fa-edit"></i></span></button></a>
    								<a href="<?= Url::to(['/jobs/vacancies/delete', 'id'=>$record['vcn_id']]) ?>" class="delete-button" data-method="post" data-confirm="Are you sure you want to delete this user record?"><button type="button" class="btn btn-xs btn-danger" title="Delete User Information"> <span class="btn-label"><i class="fa fa-remove"></i></span></button></a>
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
