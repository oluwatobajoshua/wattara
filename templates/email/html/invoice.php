<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body class="hold-transition skin-red sidebar-mini">
    <?php //debug($invoice) ?>
    <!-- Content Wrapper. Contains page content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> <?= h('Wattara Publishers LTD') ?>
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
                    <strong><?= h('Wattara Publishers LTD') ?></strong><br>
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
                                <th scope="col"><?= __('Qty') ?></th>
                                <th scope="col"><?= __('Book Id') ?></th>
                                <th scope="col"><?= __('Unit Price') ?></th>
                                <th scope="col" class="text-center"><?= __('Discount') ?></th>
                                <th scope="col"><?= __('Total') ?></th>

                            </tr>
                            <?php foreach ($invoice->order->order_details as $orderDetails): //debug($invoice->order->returns) ?>
                            <tr>
                                <td><?= h($orderDetails->id) ?></td>
                                <td><?= h($orderDetails->qty) ?></td>
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
                                        <h3 class="box-title">
                                            <?= __('Returned Date ') ?><?= h($orderReturned->created) ?>
                                        </h3>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col"><?= __('Id') ?></th>
                                <th scope="col" class="text-center"><?= __('Qty') ?></th>
                                <th scope="col"><?= __('Book Id') ?></th>
                                <th scope="col"><?= __('Unit Price') ?></th>
                                <th scope="col"><?= __('Discount') ?></th>
                                <th scope="col"><?= __('Total') ?></th>

                            </tr>
                            <?php foreach ($orderReturned->order_details as $returnedOrderDetails): ?>
                            <tr>
                                <td><?= h($returnedOrderDetails->id) ?></td>
                                <td class="text-center"><?= h($returnedOrderDetails->qty) ?></td>
                                <td><?= h($returnedOrderDetails->book->title) ?></td>
                                <td>₦<?= $this->Number->format($returnedOrderDetails->unit_price,['places'=> 2 ]) ?>
                                </td>
                                <td><?= h($returnedOrderDetails->discount->name) ?></td>
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
    </section>
    <!-- /.content-wrapper -->

    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="/wattara/admin_l_t_e/bower_components/jquery/dist/jquery.min.js"></script><!-- Bootstrap 3.3.7 -->
    <script src="/wattara/admin_l_t_e/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/wattara/admin_l_t_e/js/adminlte.min.js"></script><!-- Slimscroll -->
    <script src="/wattara/admin_l_t_e/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/wattara/admin_l_t_e/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    <script type="text/javascript">
    $(document).ready(function() {
        $(".navbar .menu").slimscroll({
            height: "200px",
            alwaysVisible: false,
            size: "3px"
        }).css("width", "100%");

        var a = $('a[href="/wattara/invoices/view/13/35"]');
        if (!a.parent().hasClass('treeview') && !a.parent().parent().hasClass('pagination')) {
            a.parent().addClass('active').parents('.treeview').addClass('active');
        }

    });
    </script>

    <script id="__debug_kit" data-id="fb6b098d-2b9e-4d6f-a124-d5d1b0c03331" data-url="http://ict-pc/wattara/"
        src="/wattara/debug_kit/js/toolbar.js?1608499548"></script>
</body>

</html>