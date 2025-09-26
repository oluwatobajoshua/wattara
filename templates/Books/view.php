<section class="content-header">
    <h1>
        Book
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
                        <dt scope="row"><?= __('Title') ?></dt>
                        <dd><?= h($book->title) ?></dd>
                        <dt scope="row"><?= __('Publisher') ?></dt>
                        <dd><?= $book->has('publisher') ? $this->Html->link($book->publisher->name, ['controller' => 'Publishers', 'action' => 'view', $book->publisher->id]) : '' ?>
                        </dd>
                        <dt scope="row"><?= __('Book Type') ?></dt>
                        <dd><?= $book->has('book_type') ? $this->Html->link($book->book_type->name, ['controller' => 'BookTypes', 'action' => 'view', $book->book_type->id]) : '' ?>
                        </dd>
                        <dt scope="row"><?= __('Id') ?></dt>
                        <dd><?= $this->Number->format($book->id) ?></dd>
                        <dt scope="row"><?= __('Created') ?></dt>
                        <dd><?= h($book->created) ?></dd>
                        <dt scope="row"><?= __('Modified') ?></dt>
                        <dd><?= h($book->modified) ?></dd>
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
                    <?php if (!empty($book->stock_details)): ?>
                    <table class="table table-hover">
                        <tr>
                            <th scope="col"><?= __('Id') ?></th>
                            <th scope="col"><?= __('Stock Id') ?></th>
                            <!--<th scope="col"><?= __('Cost Price') ?></th>-->
                            <th scope="col"><?= __('Sales Price') ?></th>
                            <th scope="col"><?= __('Quantity') ?></th>
                            <th scope="col"><?= __('Quantity Out') ?></th>
                            <th scope="col"><?= __('Created') ?></th>
                            <th scope="col"><?= __('Modified') ?></th>
                            <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($book->stock_details as $stockDetails): ?>
                        <tr>
                            <td><?= h($stockDetails->id) ?></td>
                            <td><?= $stockDetails->has('stock') ? $this->Html->link($stockDetails->stock_id, ['controller' => 'Stocks', 'action' => 'view', $stockDetails->stock_id]) : '' ?>
                            </td>
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

    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Order Details') ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php if (!empty($book->order_details)): ?>
                    <table class="table table-hover">
                        <tr>
                            <th scope="col"><?= __('Id') ?></th>
                            <th scope="col"><?= __('Order') ?></th>
                            <th scope="col"><?= __('Qty') ?></th>
                            <th scope="col"><?= __('Book Id') ?></th>
                            <th scope="col"><?= __('Unit Price') ?></th>
                            <th scope="col"><?= __('Discount Id') ?></th>
                            <th scope="col"><?= __('Total') ?></th>
                            <th scope="col"><?= __('Created') ?></th>
                            <th scope="col"><?= __('Modified') ?></th>
                            <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($book->order_details as $orderDetails): ?>
                        <tr>
                            <td><?= h($orderDetails->id) ?></td>
                            <td>
                                <?= $orderDetails->has('order') ? $this->Html->link($orderDetails->order_id, ['controller' => 'Orders', 'action' => 'view', $orderDetails->order_id]) : '' ?>
                            </td>
                            <td><?= h($orderDetails->qty) ?></td>
                            <td><?= h($book->title) ?></td>
                            <td><?= h($orderDetails->unit_price) ?></td>
                            <td><?= h($orderDetails->discount->name) ?></td>
                            <td><?= h($orderDetails->total) ?></td>
                            <td><?= h($orderDetails->created) ?></td>
                            <td><?= h($orderDetails->modified) ?></td>
                            <td class="actions text-right">
                                <?= $this->Html->link(__('View'), ['controller' => 'OrderDetails', 'action' => 'view', $orderDetails->id], ['class'=>'btn btn-info btn-xs']) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'OrderDetails', 'action' => 'edit', $orderDetails->id], ['class'=>'btn btn-warning btn-xs']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'OrderDetails', 'action' => 'delete', $orderDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderDetails->id), 'class'=>'btn btn-danger btn-xs']) ?>
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