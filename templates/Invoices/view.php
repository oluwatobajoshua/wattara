<!------------------------- Invoice ------------------------>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Invoice
        <small>#<?= $this->Number->format($invoice->id) ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo $this->Url->build(['controller' => 'Invoices', 'action' => 'index']); ?>"><i
                    class="fa fa-dashboard"></i> Home</a></li>
        <li><a
                href="<?php echo $this->Url->build(['controller' => 'Orders', 'action' => 'view', $invoice->order->id]); ?>">Order</a>
        </li>
        <li class="active">Invoices</li>
    </ol>
</section>

<div class="pad margin no-print">
    <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Note:</h4>
        Click the print button at the bottom of the invoice to print.
    </div>
</div>

<!-- Main content -->
<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-globe"></i> <?= h($branch->company->name) ?>
                <small class="pull-right">Date: <?= h($invoice->created) ?></small>
            </h2>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            From
            <address>
                <strong><?= h($branch->company->name) ?></strong><br>
                70, Liberty Road Ibadan,<br>Oyo State <br>
                08035799616,
                08030972260,<br>
                wattarapublishers@gmail.com
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            To
            <address>
                <strong><?= h($invoice->order->client->profile->full_name) ?></strong><br>
                <?= h($invoice->order->client->profile->addresses[0]->name) ?>
                Phone: <?= h($invoice->order->client->profile->phone) ?><br>
                Email: <?= h($invoice->order->client->profile->email) ?>
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b>Invoice #<?= $invoice->id ?></b><br>
            <b>Order ID:</b><?= $invoice->order->id ?><br>
            <b>Payment Due:</b> <?= h($invoice->created) ?><br>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <!-- /.box-header -->
                <div class="box-body">
                    <?php //debug($invoice->order->order_details) ?>
                    <?php if (!empty($invoice->order->order_details)): ?>
                    <table class="table table-hover">
                        <tr>
                            <td colspan="3">
                                <div class="box-header with-border">
                                    <i class="fa fa-cart-plus"></i>
                                    <h3 class="box-title"><?= __('Book Order Details') ?></h3>
                                </div>
                            </td>
                            <td colspan="3">
                                <div class="box-header with-border">
                                    <i class="fa fa-calendar"></i>
                                    <h3 class="box-title"><?= __('Order Date ') ?><?= h($invoice->order->created) ?>
                                    </h3>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col"><?= __('Id') ?></th>
                            <th scope="col" class="text-center"><?= __('Qty') ?></th>
                            <th scope="col"><?= __('Book Id') ?></th>
                            <th scope="col"><?= __('Unit Price') ?></th>
                            <th scope="col" class="text-center"><?= __('Discount') ?></th>
                            <th scope="col"><?= __('Total') ?></th>

                        </tr>
                        <?php foreach ($invoice->order->order_details as $orderDetails): //debug($invoice->order->returns) ?>
                        <tr>
                            <td><?= h($orderDetails->id) ?></td>
                            <td class="text-center"><?= h($orderDetails->qty) ?></td>
                            <td><?= h($orderDetails->book->title) ?></td>
                            <td>₦<?= $this->Number->format($orderDetails->unit_price,['places'=> 2 ]) ?></td>
                            <td class="text-center"><?= h($orderDetails->discount->name) ?></td>
                            <td>₦<?= $this->Number->format($orderDetails->total,['places'=> 2 ]) ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <th>Order Total :</th>
                            <td>₦<?= $this->Number->format($invoice->order->total,['places'=>2]) ?></td>
                        </tr>
                        <?php if (!empty($invoice->order->returns)): ?>
                        <?php foreach ($invoice->order->returns as $orderReturned): //debug($orderReturned) ?>
                        <tr>
                            <td colspan="3">
                                <div class="box-header with-border">
                                    <i class="fa fa-cart-arrow-down"></i>
                                    <h3 class="box-title"><?= __('Book Returned Details') ?></h3>
                                </div>
                            </td>
                            <td colspan="3">
                                <div class="box-header with-border">
                                    <i class="fa fa-calendar"></i>
                                    <h3 class="box-title"><?= __('Returned Date ') ?><?= h($orderReturned->created) ?>
                                    </h3>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col"><?= __('Id') ?></th>
                            <th scope="col" class="text-center"><?= __('Qty') ?></th>
                            <th scope="col"><?= __('Book Id') ?></th>
                            <th scope="col"><?= __('Unit Price') ?></th>
                            <th scope="col" class="text-center"><?= __('Discount') ?></th>
                            <th scope="col"><?= __('Total') ?></th>

                        </tr>
                        <?php foreach ($orderReturned->order_details as $returnedOrderDetails): ?>
                        <tr>
                            <td><?= h($returnedOrderDetails->id) ?></td>
                            <td class="text-center"><?= h($returnedOrderDetails->qty) ?></td>
                            <td><?= h($returnedOrderDetails->book->title) ?></td>
                            <td>₦<?= $this->Number->format($returnedOrderDetails->unit_price,['places'=> 2 ]) ?></td>
                            <td class="text-center"><?= h($returnedOrderDetails->discount->name) ?></td>
                            <td>₦<?= $this->Number->format($returnedOrderDetails->total,['places'=> 2 ]) ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <th>Returned Books Total:</th>
                            <td>₦<?= $this->Number->format($orderReturned->total,['places'=>2]) ?></td>
                        </tr>
                        <?php endforeach; ?>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <th>Order Total :</th>
                            <th>₦<?= $this->Number->format($invoice->order->total,['places'=>2]) ?></th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <th>Returned Sub Total :</th>
                            <th>₦<?= $this->Number->format($invoice->order->return_total,['places'=>2]) ?></th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <th>Sub Total :</th>
                            <th>₦<?= $this->Number->format($invoice->order->total - $invoice->order->return_total ,['places'=>2]) ?>
                            </th>
                        </tr>
                        <?php endif; ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <th>Amount Paid:</th>
                            <th>₦<?= $this->Number->format($invoice->order->received,['places'=>2]) ?></th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <th>Balance Due:</th>
                            <th>₦<?= $this->Number->format($invoice->order->balance_due,['places'=>2]) ?></th>
                        </tr>
                    </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-8">
            <!--
            <p class="lead">Payment Methods:</p>
            <?php echo $this->Html->image('credit/visa.png', array('alt' => 'Visa')); ?>
            <?php echo $this->Html->image('credit/mastercard.png', array('alt' => 'Mastercard')); ?>
            <?php echo $this->Html->image('credit/american-express.png', array('alt' => 'American Express')); ?>
            <?php echo $this->Html->image('credit/paypal2.png', array('alt' => 'Paypal')); ?>

            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                Wattara Payment Methods here
            </p>-->
        </div>
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
            <!-- <a href="<?php echo $this->Url->build(['controller' => 'pages', 'action' => 'display', 'examples', 'invoice-print']); ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>-->
            <a onClick="window.print();" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
            <!---
            <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
            </button>
            <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                <i class="fa fa-download"></i> Generate PDF
            </button>-->
        </div>
    </div>
</section>
<!-- /.content -->
<div class="clearfix"></div>