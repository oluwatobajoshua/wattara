<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Client Profile
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo $this->Url->build(['controller' => 'Companies', 'action' => 'home']); ?>"><i
                    class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo $this->Url->build(['controller' => 'Clients', 'action' => 'index']); ?>">Clients</a>
        </li>
        <li class="active">Clients Profile</li>
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

                    <h3 class="profile-username text-center">
                        <?= $client->has('profile') ? $this->Html->link($client->profile->full_name, ['controller' => 'Profiles', 'action' => 'view', $client->profile->id]) : '' ?>
                    </h3>

                    <p class="text-muted text-center"><?= h($client->profile->phone) ?></p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Total Order</b> <span
                                class="pull-right">₦<?= $this->Number->format($orderTotal,['places'=> 2]) ?></span>
                        </li>
                        <li class="list-group-item">
                            <b>Total Returns</b> <span
                                class="pull-right">₦<?= $this->Number->format($returnTotal,['places'=> 2]) ?></span>
                        </li>
                        <li class="list-group-item">
                            <b>Payment Made</b> <span
                                class="pull-right">₦<?= $this->Number->format($receivedTotal,['places'=> 2]) ?></span>
                        </li>
                        <li class="list-group-item">
                            <b>Balance Due</b> <span
                                class="pull-right">₦<?= $this->Number->format($balance,['places'=> 2]) ?></span>
                        </li>
                        <li class="list-group-item">
                            <?= $this->Html->link(__('NEW ORDER'), ['controller'=>'Orders','action' => 'add', $client->id ], ['class' => 'btn btn-primary btn-block']) ?>
                        </li>

                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">About Me</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i> Address</strong>

                    <p class="text-muted">
                        <?= h($client->profile->addresses[0]->name) ?>
                    </p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Email</strong>

                    <p class="text-muted"><?= h($client->profile->email) ?></p>

                    <hr>
                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                    <p>Note </p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-10">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">Orders</a></li>
                    <li><a href="#timeline" data-toggle="tab">Invoices</a></li>
                    <li><a href="#settings" data-toggle="tab">Profile Update</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <!-- Post -->
                        <div class="post">
                            <div class="box-body">
                                <?php if (!empty($client->orders)): ?>
                                <table class="table table-hover">
                                    <tr>
                                        <th scope="col"><?= __('Id') ?></th>
                                        <th scope="col"><?= __('Payment Mode') ?></th>
                                        <th scope="col"><?= __('Total') ?></th>
                                        <th scope="col"><?= __('Received') ?></th>
                                        <th scope="col"><?= __('Balance Due') ?></th>
                                        <th scope="col"><?= __('Status Id') ?></th>
                                        <th scope="col"><?= __('Created') ?></th>
                                        <th scope="col"><?= __('Modified') ?></th>
                                        <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
                                    </tr>
                                    <?php foreach ($client->orders as $orders): 
                                        $invoiceId = null;
                                        if($orders->invoices){$invoiceId = $orders->invoices[0]->id;} ?>
                                    <tr>
                                        <td><?= h($orders->id) ?></td>
                                        <td><?= h($orders->payment_mode->name) ?></td>
                                        <td>₦<?= $this->Number->format($orders->total,['places'=> 2]) ?></td>
                                        <td>₦<?= $this->Number->format($orders->received,['places'=> 2]) ?></td>
                                        <td>₦<?= $this->Number->format($orders->balance_due,['places'=> 2]) ?></td>
                                        <td><?= h($orders->status->name) ?></td>
                                        <td><?= h($orders->created) ?></td>
                                        <td><?= h($orders->modified) ?></td>
                                        <td class="actions text-right">
                                            <?php if($orders->payment_mode_id != 3): ?>
                                            <?= $this->Html->link(__('Invoice'), ['controller'=>'Invoices','action' => 'view', $invoiceId, $orders->id], ['class'=>'btn btn-default btn-xs']) ?>
                                            <?= $this->Html->link(__('Return'), ['controller'=>'Orders','action' => 'returns', $orders->id], ['class'=>'btn btn-default btn-xs']) ?>
                                            <?php endif; ?>
                                            <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $orders->id], ['class'=>'btn btn-info btn-xs']) ?>
                                            <?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $orders->id], ['class'=>'btn btn-warning btn-xs']) ?>
                                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id), 'class'=>'btn btn-danger btn-xs']) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="timeline">
                        <!-- The timeline -->
                        invoices
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="settings">
                        <!-- Main content -->
                        <section class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- general form elements -->
                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <h3 class="box-title"><?php echo __('Form'); ?></h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <!-- form start -->
                                        <?php echo $this->Form->create($client->profile, ['role' => 'form']); ?>
                                        <div class="box-body">
                                            <?php
                                                echo $this->Form->control('last_name');
                                                echo $this->Form->control('first_name');
                                                echo $this->Form->control('date_of_birth', ['empty' => true]);
                                                echo $this->Form->control('email');
                                                echo $this->Form->control('phone');
                                            ?>
                                        </div>
                                        <!-- /.box-body -->

                                        <?php echo $this->Form->submit(__('Submit')); ?>

                                        <?php echo $this->Form->end(); ?>
                                    </div>
                                    <!-- /.box -->
                                </div>
                            </div>
                            <!-- /.row -->
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