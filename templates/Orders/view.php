<section class="content-header">
    <h1>
        Order
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
        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-info"></i>
                    <h3 class="box-title"><?php echo __('Information'); ?></h3>
                    <?= $this->Html->link(__('Return'), ['controller'=>'Orders','action' => 'returns', $order->id], ['class'=>'btn btn-default btn-xs pull-right']) ?>
                    <?= $this->Html->link(__('Invoice'), ['controller'=>'Invoices','action' => 'view', $order->id], ['class'=>'btn btn-default btn-xs pull-right']) ?>
                    <?php if ($order->total - $order->received != 0): ?>
                    <div class="pull-right">

                        <?php echo $this->Html->link(__('Add Payment'), ['controller'=> 'receipts','action' => 'add',$order->id], ['class'=>'btn btn-success btn-xs']) ?>
                    </div>
                    <?php endif; ?>
                </div>

                <?php //debug($order->client) ?>
                <!-- /.box-header -->
                <div class="box-body">
                    <dl class="dl-horizontal">
                        <dt scope="row"><?= __('Client') ?></dt>
                        <dd><?= $order->has('client') ? $this->Html->link($order->client->profile->full_name, ['controller' => 'Clients', 'action' => 'view', $order->client->id]) : '' ?>
                        </dd>
                        <dt scope="row"><?= __('Payment Mode') ?></dt>
                        <dd><?= $order->has('payment_mode') ? $this->Html->link($order->payment_mode->name, ['controller' => 'PaymentModes', 'action' => 'view', $order->payment_mode->id]) : '' ?>
                        </dd>
                        <dt scope="row"><?= __('Status') ?></dt>
                        <dd><?= $order->has('status') ? $this->Html->link($order->status->name, ['controller' => 'Statuses', 'action' => 'view', $order->status->id]) : '' ?>
                        </dd>
                        <dt scope="row"><?= __('Order Number') ?></dt>
                        <dd><?= $this->Number->format($order->id) ?></dd>
                        <dt scope="row"><?= __('Amount Received') ?></dt>
                        <dd><?= $this->Number->format($order->received) ?></dd>
                        <dt scope="row"><?= __('Total') ?></dt>
                        <dd><?= $this->Number->format($order->total) ?></dd>
                        <dt scope="row"><?= __('Returned Total') ?></dt>
                        <dd><?= $this->Number->format($order->return_total) ?></dd>
                        <dt scope="row"><?= __('Balance Due') ?></dt>
                        <dd><?= $this->Number->format($order->total - ($order->received + $order->return_total)) ?></dd>
                        <dt scope="row"><?= __('Created') ?></dt>
                        <dd><?= h($order->created) ?></dd>
                        <dt scope="row"><?= __('Modified') ?></dt>
                        <dd><?= h($order->modified) ?></dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Order Payments') ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php if (!empty($order->receipts)): ?>
                    <table class="table table-hover">
                        <tr>
                            <th scope="col"><?= __('Id') ?></th>
                            <th scope="col"><?= __('Amount') ?></th>
                            <th scope="col"><?= __('Created') ?></th>
                            <th scope="col"><?= __('Modified') ?></th>
                            <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($order->receipts as $receipt): ?>
                        <tr>
                            <td><?= h($receipt->id) ?></td>
                            <td><?= h($receipt->amount) ?></td>
                            <td><?= h($receipt->created) ?></td>
                            <td><?= h($receipt->modified) ?></td>
                            <td class="actions text-right">
                                <?= $this->Html->link(__('View'), ['controller' => 'Receipts', 'action' => 'view', $receipt->id], ['class'=>'btn btn-info btn-xs']) ?>
                                <!--<?= $this->Html->link(__('Edit'), ['controller' => 'Receipts', 'action' => 'edit', $receipt->id], ['class'=>'btn btn-warning btn-xs']) ?>-->
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Receipts', 'action' => 'delete', $receipt->id], ['confirm' => __('Are you sure you want to delete # {0}?', $receipt->id), 'class'=>'btn btn-danger btn-xs']) ?>
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
                    <?php if (!empty($order->order_details)): ?>
                    <table class="table table-hover">
                        <tr>
                            <th scope="col"><?= __('Id') ?></th>
                            <th scope="col"><?= __('Qty') ?></th>
                            <th scope="col"><?= __('Book Id') ?></th>
                            <th scope="col"><?= __('Unit Price') ?></th>
                            <th scope="col"><?= __('Discount Id') ?></th>
                            <th scope="col"><?= __('Total') ?></th>
                            <th scope="col"><?= __('Created') ?></th>
                            <th scope="col"><?= __('Modified') ?></th>
                            <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($order->order_details as $orderDetails): ?>
                        <tr>
                            <td><?= h($orderDetails->id) ?></td>
                            <td><?= h($orderDetails->qty) ?></td>
                            <td><?= h($orderDetails->book->title) ?></td>
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