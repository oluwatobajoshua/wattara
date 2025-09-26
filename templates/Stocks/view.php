<section class="content-header">
    <h1>
        Stock
        <small><?php echo __('View'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i>
                <?php echo __('Home'); ?></a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-info"></i>
                    <h3 class="box-title"><?php echo __('Information'); ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <dl class="dl-horizontal">
                        <dt scope="row"><?= __('Id') ?></dt>
                        <dd><?= $this->Number->format($stock->id) ?></dd>
                        <dt scope="row"><?= __('Total') ?></dt>
                        <dd><?= $this->Number->format($stock->total) ?></dd>
                        <dt scope="row"><?= __('Created') ?></dt>
                        <dd><?= h($stock->created) ?></dd>
                        <dt scope="row"><?= __('Modified') ?></dt>
                        <dd><?= h($stock->modified) ?></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Stock Details') ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php if (!empty($stock->stock_details)): ?>
                    <table class="table table-hover">
                        <tr>
                            <th scope="col"><?= __('Id') ?></th>
                            <!--<th scope="col"><?= __('Stock Id') ?></th>-->
                            <th scope="col"><?= __('Book Id') ?></th>
                            <!--<th scope="col"><?= __('Cost Price') ?></th>-->
                            <th scope="col"><?= __('Sales Price') ?></th>
                            <th scope="col"><?= __('Quantity') ?></th>
                            <th scope="col"><?= __('Quantity Out') ?></th>
                            <th scope="col"><?= __('Created') ?></th>
                            <th scope="col"><?= __('Modified') ?></th>
                            <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($stock->stock_details as $stockDetails): ?>
                        <tr>
                            <td><?= h($stockDetails->id) ?></td>
                            <!--<td><?= h($stockDetails->stock_id) ?></td>-->
                            <td><?= h($stockDetails->book->title) ?></td>
                            <!--<td><?= h($stockDetails->cost_price) ?></td>-->
                            <td><?= h($stockDetails->sales_price) ?></td>
                            <td><?= h($stockDetails->quantity) ?></td>
                            <td><?= h($stockDetails->quantity_out) ?></td>
                            <td><?= h($stockDetails->created) ?></td>
                            <td><?= h($stockDetails->modified) ?></td>
                            <td class="actions text-right">
                                <?= $this->Html->link(__('View'), ['controller' => 'StockDetails', 'action' => 'view', $stockDetails->id], ['class'=>'btn btn-info btn-xs']) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'StockDetails', 'action' => 'edit', $stockDetails->id], ['class'=>'btn btn-warning btn-xs']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'StockDetails', 'action' => 'delete', $stockDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stockDetails->id), 'class'=>'btn btn-danger btn-xs']) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>