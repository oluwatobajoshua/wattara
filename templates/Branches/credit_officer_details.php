<?php

use Cake\I18n\Time;        
use Cake\I18n\Date;
use Cake\I18n\FrozenTime;
use Cake\I18n\FrozenDate;
            
        
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction $transaction
 */
?>

<section class="content-header">
    <h1>
        Credit Officer
        <small><?php echo __('Detail'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i>
                <?php echo __('Home'); ?></a></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-2">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <?php echo $this->Html->image('profile_picture.png', ['class' => 'profile-user-img img-responsive img-circle', 'alt' => 'User profile picture']); ?>
                    <h3 class="profile-username text-center"><?= h($account->username) ?></h3>

                    <p class="text-muted text-center">Branch: <span class=""><?= h($account->branch->name) ?>
                        </span></p>

                    <ul class="list-group list-group-unbordered">
                        <!--<li class="list-group-item">
                            <?= $this->Html->link(__('View Transaction'), ['controller'=>'Transactions','action' => 'tbacc', $account->id ], ['class' => 'btn btn-primary btn-block']) ?>
                        </li>
                        
                        <li class="list-group-item">
                            <b>Credit
                                Officer</b><?= $account->has('user') ? $this->Html->link($account->user->username, ['controller' => 'Users', 'action' => 'view', $account->user->id],['class' =>'pull-right']) : '' ?>
                        </li>
                        <li class="list-group-item">
                            <b>Branch</b>
                            <?= $account->has('branch') ? $this->Html->link($account->branch->name, ['controller' => 'Branches', 'action' => 'view', $account->branch->id],['class' =>'pull-right']) : '' ?>
                        </li>
                        <li class="list-group-item">
                            <b>Transactions</b> <span class="pull-right">
                                <?= $this->Number->format($account->transactions_count) ?></span>
                        </li>
                        -->

                        <li class="list-group-item">
                            <b>Credit </b> <span class="pull-right"><?= $this->Number->format($account->credit) ?>
                            </span>
                        </li>
                        <li class="list-group-item">
                            <b>Debit</b> <span class="pull-right"><?= $this->Number->format($account->debit) ?> </span>
                        </li>
                        <li class="list-group-item">
                            <b>Balance</b> <span class="pull-right"><?= $this->Number->format($account->balance) ?>
                            </span>
                        </li>
                        <li class="list-group-item">
                            <b>Ledger Balance</b> <span
                                class="pull-right"><?= $this->Number->format($account->balance) ?> </span>
                        </li>
                    </ul>

                </div>
                <!--// profile -->
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
        <!-- /.col -->
        <div class="col-md-10">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">Product & Services</a></li>
                    <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
                    <li><a href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <!-- Post -->
                        <div class="box-body">
                            <div class="box-group" id="accordion">
                                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                <div class="panel box box-primary">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                Shor Term
                                            </a>
                                        </h4>
                                        <div class="pull-right">
                                            Total Savings <span class="badge bg-green">
                                                <?php echo $shortsavingscount->count()?></span> |
                                            Total Loan <span class="badge bg-red">
                                                <?php echo $shortloanscount->count()?>
                                            </span>
                                            Total Investment <span class="badge bg-red">
                                                <?php echo $shortinvestmentscount->count()?>
                                            </span>
                                            | Short Total <span class="badge bg-blu">
                                                <?php echo $shortsavingscount->count() + $shortloanscount->count() + $shortinvestmentscount->count()?>
                                            </span>
                                        </div>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <!-- in -->
                                        <div class="nav-tabs-custom">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a class="badge" href="#savings"
                                                        data-toggle="tab">Savings
                                                        <span
                                                            class="badge bg-green"><?php echo $shortsavingscount->count() ?></span></a>
                                                </li>
                                                <li><a class="badge bg-redd" href="#loan" data-toggle="tab">Loans <span
                                                            class="badge bg-red"><?php echo $shortloanscount->count() ?></span></a>
                                                </li>
                                                <li><a class="badge bg-redd" href="#investment"
                                                        data-toggle="tab">Investment <span
                                                            class="badge bg-red"><?php echo $shortinvestmentscount->count() ?></span></a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="savings">
                                                    <!-- short savings packages -->
                                                    <?php if($shortsavings->count() > 0) 
                                                      echo $this->element(
                                                        'packages',
                                                        ['packages' => $shortsavings, 
                                                        'full' => false, 'header'=> 'co','model'=> 'ShortSavings','id'=> $account->id,'cat'=>1,'pro'=>1]                  
                                                      ); 
                                                    ?>

                                                    <?php if($shortsavings->count() == 0) 
                                                      echo 'No short savings applied for under this credit officer yet ' . $this->Html->link(__(' here'), ['controller'=>'Packages','action' => 'add', $account->id,1,1], ['class'=>'btn btn-success btn-xs']) . ' to apply';;
                                                    ?>
                                                </div>
                                                <!-- /.tab-pane -->
                                                <div class="tab-pane" id="loan">
                                                    <?php if($shortloans->count() > 0)                                                                                     
                                                      echo $this->element(
                                                        'packages',
                                                        ['packages' => $shortloans, 
                                                        'full' => false,'header'=> 'co', 'model'=> 'ShortLoans','id'=> $account->id,'cat'=>1,'pro'=>2]                  
                                                      );
                                                    ?>
                                                    <?php if($shortloans->count() == 0) 
                                                      echo 'No short loan yet ' . $this->Html->link(__(' here'), ['controller'=>'Packages','action' => 'add', $account->id,1,2], ['class'=>'btn btn-success btn-xs']) . ' to apply';;
                                                    ?>
                                                </div>
                                                <div class="tab-pane" id="investment">
                                                    <?php if($shortinvestments->count() > 0)                               
                                                      echo $this->element(
                                                        'packages',
                                                        ['packages' => $shortinvestments, 
                                                        'full' => false, 'header'=> 'co','model'=> 'ShortInvestments','id'=> $account->id,'cat'=>1,'pro'=>3]                   
                                                      );
                                                    ?>
                                                    <?php if($shortinvestments->count() == 0) 
                                                      echo 'No short investment yet '. $this->Html->link(__(' here'), ['controller'=>'Packages','action' => 'add', $account->id,1,3], ['class'=>'btn btn-success btn-xs']) . ' to apply';;
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of savings -->
                                <div class="panel box box-danger">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                Long Term
                                            </a>
                                        </h4>

                                        <div class="pull-right">
                                            Savings <span class="badge bg-green">
                                                <?php echo $longsavingscount->count()?> </span>
                                            Loan <span class="badge bg-red">
                                                <?php echo $longloanscount->count()?>
                                            </span>
                                            Investment <span class="badge bg-red">
                                                <?php echo $longinvestmentscount->count()?>
                                            </span>
                                            Total <span class="badge bg-blu">
                                                <?php echo $longsavingscount->count() + $longloanscount->count() + $longinvestmentscount->count()?>
                                            </span>

                                        </div>

                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse in">
                                        <div class="nav-tabs-custom">

                                            <ul class="nav nav-tabs">
                                                <li class="active"><a class="badge" href="#lsavings"
                                                        data-toggle="tab">Savings
                                                        <span
                                                            class="badge bg-green"><?php echo $longsavingscount->count() ?></span></a>
                                                </li>
                                                <li><a class="badge" href="#lloan" data-toggle="tab">Loan <span
                                                            class="badge bg-red"><?php echo $longloans->count() ?></span></a>
                                                </li>
                                                <li><a class="badge" href="#linvestment" data-toggle="tab">Investment
                                                        <span
                                                            class="badge bg-red"><?php echo $longinvestments->count() ?></span></a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="lsavings">
                                                    <?php if($longsavings->count() > 0)                               
                                                      echo $this->element(
                                                        'packages',
                                                        ['packages' => $longsavings, 
                                                        'full' => false,'header'=> 'co', 'model'=> 'LongSavings','id'=> $account->id,'cat'=>2,'pro'=>1]                   
                                                      );/* ----*/ 
                                                    ?>
                                                    <?php if($longsavings->count() == 0) 
                                                      echo 'No long savings applied for under this credit officer yet ' . $this->Html->link(__(' here'), ['controller'=>'Packages','action' => 'add', $account->id,2,1], ['class'=>'btn btn-success btn-xs']) . ' to apply';;
                                                    ?>
                                                </div>
                                                <div class="tab-pane" id="lloan">
                                                    <?php if($longloans->count() > 0)                               
                                                      echo $this->element(
                                                        'packages',
                                                        ['packages' => $longloans, 
                                                        'full' => false,'header'=> 'co', 'model'=> 'LongLoans','id'=> $account->id,'cat'=>2,'pro'=>2]                   
                                                      );
                                                    ?>
                                                    <?php if($longloans->count() == 0) 
                                                      echo 'No long loan yet ' . $this->Html->link(__(' here'), ['controller'=>'Packages','action' => 'add', $account->id,2,2], ['class'=>'btn btn-success btn-xs']) . ' to apply';;
                                                    ?>
                                                </div>
                                                <div class="tab-pane" id="linvestment">
                                                    <?php if($longinvestments->count() > 0)                               
                                                      echo $this->element(
                                                        'packages',
                                                        ['packages' => $longinvestments, 
                                                        'full' => false,'header'=> 'co', 'model'=> 'LongInvestments', 'id'=> $account->id,'cat'=>2,'pro'=>3]                   
                                                      ); 
                                                    ?>
                                                    <?php if($longinvestments->count() == 0) 
                                                      echo 'No investment yet ' . $this->Html->link(__(' here'), ['controller'=>'Packages','action' => 'add', $account->id,2,3], ['class'=>'btn btn-success btn-xs']) . ' to apply';;
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.post -->
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="timeline">
                        <!-- The timeline -->
                        <ul class="timeline timeline-inverse">
                            <!-- timeline time label -->
                            <li class="time-label">
                                <span class="bg-red">
                                    <?= h($account->created) ?>
                                </span>
                            </li>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <li>
                                <i class="fa fa-envelope bg-blue"></i>

                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                    <h3 class="timeline-header">Joined Sampresh</h3>

                                    <div class="timeline-body">
                                        Account was created by <?= h($account->user->username) ?> which automatically
                                        becomes your account manager
                                    </div>
                                    <div class="timeline-footer">
                                        <!-- <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a> -->
                                    </div>
                                </div>
                            </li>
                            <!-- END timeline item -->
                            <!-- timeline time label -->
                            <li>
                                <i class="fa fa-clock-o bg-gray"></i>
                            </li>
                        </ul>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="settings">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Name</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputName" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Name</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputExperience"
                                        placeholder="Experience"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->