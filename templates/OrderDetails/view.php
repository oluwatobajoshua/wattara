<section class="content-header">
  <h1>
    Order Detail
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
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
            <dt scope="row"><?= __('Order') ?></dt>
            <dd><?= $orderDetail->has('order') ? $this->Html->link($orderDetail->order->id, ['controller' => 'Orders', 'action' => 'view', $orderDetail->order->id]) : '' ?></dd>
            <dt scope="row"><?= __('Book') ?></dt>
            <dd><?= $orderDetail->has('book') ? $this->Html->link($orderDetail->book->title, ['controller' => 'Books', 'action' => 'view', $orderDetail->book->id]) : '' ?></dd>
            <dt scope="row"><?= __('Discount') ?></dt>
            <dd><?= $orderDetail->has('discount') ? $this->Html->link($orderDetail->discount->name, ['controller' => 'Discounts', 'action' => 'view', $orderDetail->discount->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($orderDetail->id) ?></dd>
            <dt scope="row"><?= __('Qty') ?></dt>
            <dd><?= $this->Number->format($orderDetail->qty) ?></dd>
            <dt scope="row"><?= __('Unit Price') ?></dt>
            <dd><?= $this->Number->format($orderDetail->unit_price) ?></dd>
            <dt scope="row"><?= __('Total') ?></dt>
            <dd><?= $this->Number->format($orderDetail->total) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($orderDetail->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($orderDetail->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
