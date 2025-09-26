<section class="content-header">
  <h1>
    Payment Mode
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
            <dd><?= h($paymentMode->name) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($paymentMode->id) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($paymentMode->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($paymentMode->modified) ?></dd>
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
          <h3 class="box-title"><?= __('Orders') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($paymentMode->orders)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Client Id') ?></th>
                    <th scope="col"><?= __('Payment Mode Id') ?></th>
                    <th scope="col"><?= __('Paid Date') ?></th>
                    <th scope="col"><?= __('Status Id') ?></th>
                    <th scope="col"><?= __('Total') ?></th>
                    <th scope="col"><?= __('Received') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($paymentMode->orders as $orders): ?>
              <tr>
                    <td><?= h($orders->id) ?></td>
                    <td><?= h($orders->client_id) ?></td>
                    <td><?= h($orders->payment_mode_id) ?></td>
                    <td><?= h($orders->paid_date) ?></td>
                    <td><?= h($orders->status_id) ?></td>
                    <td><?= h($orders->total) ?></td>
                    <td><?= h($orders->received) ?></td>
                    <td><?= h($orders->created) ?></td>
                    <td><?= h($orders->modified) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $orders->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $orders->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id), 'class'=>'btn btn-danger btn-xs']) ?>
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
