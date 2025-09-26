<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Users
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
                        <form action="<?php echo $this->Url->build(); ?>" method="POST">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right"
                                    placeholder="<?php echo __('Search'); ?>">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('role_id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('branch_id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('accounts_count') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('currency') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                                <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= $this->Number->format($user->id) ?></td>
                                <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?>
                                </td>
                                <td><?= $user->has('branch') ? $this->Html->link($user->branch->name, ['controller' => 'Branches', 'action' => 'view', $user->branch->id]) : '' ?>
                                </td>
                                <td><?= $this->Number->format($user->accounts_count) ?></td>
                                <td><?= h($user->username) ?></td>
                                <td><?= h($user->currency) ?></td>
                                <td><?= h($user->created) ?></td>
                                <td><?= h($user->modified) ?></td>
                                <td class="actions text-right">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id], ['class'=>'btn btn-info btn-xs']) ?>
                                    <?php if(@$admin) :?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class'=>'btn btn-warning btn-xs']) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class'=>'btn btn-danger btn-xs']) ?>
                                    <?php endif ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <ul class="pagination" style="padding-left: 20px">
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                </ul>
                <p style="padding-left: 20px"> <?= $this->Paginator->counter(
            'Page {{page}} of {{pages}} showing {{current}} records out of {{count}} total, starting on record {{start}}, ending on {{end}}'
            ) ?>
                </p>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>