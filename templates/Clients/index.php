<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Clients

        <div class="pull-right">
            <?php echo $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('List'); ?></h3>

                    <div class="box-tools">
                        <?php echo $this->Form->create(null, ['role' => 'form', 'id'=>'stock']); ?>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="input-group input-group-sm col-md-4">
                            <div class="input-group-btn">
                                <input type="text" name="first_name" class="form-control"
                                    placeholder="<?php echo __('First Name'); ?>">
                            </div>
                            <div class="input-group-btn">
                                <input type="text" name="last_name" class="form-control"
                                    placeholder="<?php echo __('Last Name'); ?>">
                            </div>
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('profile_id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Address') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Phone') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                                <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($clients as $client): //debug($client) ?>
                            <tr>
                                <td><?= $this->Number->format($client->id) ?></td>
                                <td><?= h($client->profile->full_name) ?></td>
                                <td><?= h($client->profile->addresses[0]->name) ?></td>
                                <td><?= h($client->profile->phone) ?></td>
                                <td><?= h($client->created) ?></td>
                                <td><?= h($client->modified) ?></td>
                                <td class="actions text-right">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $client->id], ['class'=>'btn btn-info btn-xs']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $client->id], ['class'=>'btn btn-warning btn-xs']) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id), 'class'=>'btn btn-danger btn-xs']) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>