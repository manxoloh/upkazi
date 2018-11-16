<?php 

use yii\helpers\Url;
use common\models\User;

$this->title = 'Communication';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row mt">
            <div class="col-sm-3">
            <div class="card">
                <div class="header">                            
                    <a href="<a href="<?= Url::to(['/communication/compose'])?>" class="btn btn-success btn-block btn-fill">
                        <i class="fa fa-envelope-o"></i>  Compose Mail
                    </a>
                </div>
                <div class="content">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <ul class="nav nav-pills nav-stacked mail-nav">
                            <li class="active"><a href="<?= Url::to(['/communication/inbox'])?>"> <i class="fa fa-inbox"></i> Inbox  <span class="label label-theme pull-right inbox-notification">3</span></a></li>
                            <li><a href="#"> <i class="fa fa-envelope-o"></i> Send Mail</a></li>
                            <li><a href="#"> <i class="fa fa-exclamation-circle"></i> Important</a></li>
                            <li><a href="#"> <i class="fa fa-file-text-o"></i> Drafts <span class="label label-info pull-right inbox-notification">8</span></a></li>
                            <li><a href="#"> <i class="fa fa-trash-o"></i> Trash</a></li>
                        </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </div>
            <div class="col-sm-9">
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
								<th>ID Number</th>
								<th>DOB</th>
								<th>Status</th>
								<th class="disabled-sorting text-right">Actions</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
		        </div>
            </div><!-- end content-->
        </div><!--  end card  -->
            </div>
        </div>