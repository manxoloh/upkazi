<?php 

use yii\helpers\Url;

$this->title = 'Users';
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['/settings']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
    <a href="<?= Url::to(['/communication/default/newsletter']) ?>" class="popup"><button type="button" class="btn btn-sm btn-info btn-fill pull-right" title="This User Is Active"> <span class="btn-label"></span>Reminder Mail</button></a>
    </div>
</div>
<br>
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
								<th>Firstname</th>
								<th>Middlename</th>
								<th>Lastname</th>
								<th>Gender</th>
								<th>Phone Number</th>
								<th>DOB</th>
								<th>Membership</th>
								<th>Status</th>
								<th class="disabled-sorting text-right">Actions</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Firstname</th>
								<th>Middlename</th>
								<th>Lastname</th>
								<th>Gender</th>
								<th>Phone Number</th>
								<th>DOB</th>
								<th>Membership</th>
								<th>Status</th>
								<th class="disabled-sorting text-right">Actions</th>
							</tr>
						</tfoot>
						<tbody>
						<?php foreach($users as $user){ ?>
							<tr>
								<td><?= $user['firstname'] ?></td>
								<td><?= $user['middlename'] ?></td>
								<td><?= $user['lastname'] ?></td>
								<td><?= $user['gender'] ?></td>
								<td><?= $user['phone'] ?></td>
								<td><?= date('d M, Y', strtotime($user['date_of_birth'])) ?></td>
								<td><?= $user['usertype'] ?></td>
								<td>
									<?php if($user['status'] == 10){ ?>
									<button type="button" class="btn btn-block btn-xs btn-success" title="This User Is Active"> <span class="btn-label"></span>Active</button>
                                    <?php } ?>
									<?php if($user['status'] == 0){ ?>
									<button type="button" class="btn btn-block btn-xs btn-danger" title="This User Is Inactive"> <span class="btn-label"></span>Inactive</button>
                                    <?php } ?>
								</td>
								<td class="text-right">
    								<a href="<?= Url::to(['/settings/users/profile', 'id'=>$user['id']]) ?>"><button type="button" class="btn btn-xs btn-info" title="View User Information"> <span class="btn-label"><i class="fa fa-eye"></i></span></button></a>
    								<a href="<?= Url::to(['/settings/users/profile', 'id'=>$user['id']]) ?>"><button type="button" class="btn btn-xs btn-warning" title="Update User Information"> <span class="btn-label"><i class="fa fa-edit"></i></span></button></a>
    								<a href="<?= Url::to(['/settings/users/delete', 'id'=>$user['id']]) ?>" class="delete-button" data-method="post" data-confirm="Are you sure you want to delete this user record?"><button type="button" class="btn btn-xs btn-danger" title="Delete User Information"> <span class="btn-label"><i class="fa fa-remove"></i></span></button></a>
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
