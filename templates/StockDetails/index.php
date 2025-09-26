<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Stock Details

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
                                <th scope="col"><?= $this->Paginator->sort('stock_id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('book_id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('cost_price') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('sales_price') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('quantity_out') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                                <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($stockDetails as $stockDetail): ?>
                            <tr>
                                <td><?= $this->Number->format($stockDetail->id) ?></td>
                                <td><?= $this->Number->format($stockDetail->stock_id) ?></td>
                                <td><?= h($stockDetail->book->title) ?></td>
                                <td><?= $this->Number->format($stockDetail->cost_price) ?></td>
                                <td><?= $this->Number->format($stockDetail->sales_price) ?></td>
                                <td><?= $this->Number->format($stockDetail->quantity) ?></td>
                                <td><?= $this->Number->format($stockDetail->quantity_out) ?></td>
                                <td><?= h($stockDetail->created) ?></td>
                                <td><?= h($stockDetail->modified) ?></td>
                                <td class="actions text-right">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $stockDetail->id], ['class'=>'btn btn-info btn-xs']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $stockDetail->id], ['class'=>'btn btn-warning btn-xs']) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $stockDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stockDetail->id), 'class'=>'btn btn-danger btn-xs']) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>