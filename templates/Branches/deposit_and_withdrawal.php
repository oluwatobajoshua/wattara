<!-- Content Header (Page header) -->
<section class="content-header">
    <?php if (@$admin): ?>
    <h1> Deposit & Withdrawal : <?= h($branch->name) ?> Branch </h1><br>
    <?php echo $this->element('summary'); ?>
    <?php endif; ?>

    <?php if (!@$admin): ?>
    <h3>
        Deposit & Withdrawal : <?= h($branch->name) ?> Branch
    </h3>
    <div class="pull-right">
        Cashier:<?= h($branch->cashier->username) ?>
    </div>
    <br>
    <?php endif; ?>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">Deposits & Withdrawals</a></li>
                    <li><a href="#timeline" data-toggle="tab">Expenses</a></li>
                    <li><a href="#settings" data-toggle="tab">Others</a></li>
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
                                                Deposits |
                                                <?php if(@$cashier):?>
                                                <div class="pull-right">
                                                    <?php echo $this->Html->link(__('New '), ['controller'=>'Packages','action' => 'add','Branches','depositAndWithdrawal',$branch->id,5,4,'cashier'], ['class'=>'btn btn-success btn-xs']) ?>
                                                </div>
                                                <?php endif ?>
                                            </a>
                                        </h4>
                                        <div class="pull-right">
                                            Total Deposit <span class="badge bg-green">
                                                <?php echo $deposits->count()?>
                                        </div>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <!-- in -->
                                        <div class="nav-tabs-custom">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a class="badge" href="#savings"
                                                        data-toggle="tab">Deposits
                                                        <span
                                                            class="badge bg-green"><?php echo $deposits->count() ?></span></a>
                                                </li>

                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="savings">
                                                    <!-- short savings packages -->
                                                    <?php if($deposits->count() > 0) 
                                                      echo $this->element(
                                                        'packages',
                                                        ['packages' => $deposits, 
                                                        'full' => true, 'model'=> 'Deposits']                  
                                                      ); 
                                                    ?>

                                                    <?php if($deposits->count() == 0) 
                                                      echo 'No deposit made yet';
                                                    ?>
                                                </div>
                                                <!-- /.tab-pane -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of savings -->
                                <div class="panel box box-danger">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                Withdrawals |
                                                Total Withdrawal <span class="badge bg-green">
                                                    <?php echo $withdrawals->count()?> </span>

                                            </a>
                                        </h4>
                                        <?php if(@$cashier):?>
                                        <div class="pull-right">
                                            <?php echo $this->Html->link(__('New '), ['controller'=>'Packages','action' => 'add','Branches','depositAndWithdrawal',$branch->id,6,4,'cashier'], ['class'=>'btn btn-success btn-xs']) ?>
                                        </div>
                                        <?php endif;?>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse in">
                                        <div class="nav-tabs-custom">

                                            <ul class="nav nav-tabs">
                                                <li class="active"><a class="badge" href="#lsavings"
                                                        data-toggle="tab">Withdrawals
                                                        <span
                                                            class="badge bg-green"><?php echo $withdrawals->count() ?></span></a>
                                                </li>

                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="lsavings">
                                                    <?php if($withdrawals->count() > 0)                               
                                                      echo $this->element(
                                                        'packages',
                                                        ['packages' => $withdrawals, 
                                                        'full' => true, 'model'=> 'Withdrawals']                   
                                                      );/* ----*/ 
                                                    ?>
                                                    <?php if($withdrawals->count() == 0) 
                                                      echo 'No withdrawal made today';
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
                        <p>Petrol, Data & Other Branch Expenses</p>
                        <?php if($expenses->count() > 0)                               
                          echo $this->element(
                          'packages',
                          ['packages' => $expenses, 
                          'full' => true, 'model'=> 'Expenses']                   
                          );/* ----*/ 
                        ?>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="settings">

                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->

        </div>
    </div>
</section>