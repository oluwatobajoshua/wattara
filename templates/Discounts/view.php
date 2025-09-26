<section class="content-header">
  <h1>
    Discount
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
            <dt scope="row"><?= __('Name') ?></dt>
            <dd><?= h($discount->name) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($discount->id) ?></dd>
            <dt scope="row"><?= __('Value') ?></dt>
            <dd><?= $this->Number->format($discount->value) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($discount->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($discount->modified) ?></dd>
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
          <h3 class="box-title"><?= __('Order Details') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($discount->order_details)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Order Id') ?></th>
                    <th scope="col"><?= __('Qty') ?></th>
                    <th scope="col"><?= __('Book Id') ?></th>
                    <th scope="col"><?= __('Unit Price') ?></th>
                    <th scope="col"><?= __('Discount Id') ?></th>
                    <th scope="col"><?= __('Total') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($discount->order_details as $orderDetails): ?>
              <tr>
                    <td><?= h($orderDetails->id) ?></td>
                    <td><?= h($orderDetails->order_id) ?></td>
                    <td><?= h($orderDetails->qty) ?></td>
                    <td><?= h($orderDetails->book_id) ?></td>
                    <td><?= h($orderDetails->unit_price) ?></td>
                    <td><?= h($orderDetails->discount_id) ?></td>
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
