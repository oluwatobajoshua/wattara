<section class="content-header">
  <h1>
    Stock Detail
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
            <dt scope="row"><?= __('Stock') ?></dt>
            <dd><?= $stockDetail->has('stock') ? $this->Html->link($stockDetail->stock->id, ['controller' => 'Stocks', 'action' => 'view', $stockDetail->stock->id]) : '' ?></dd>
            <dt scope="row"><?= __('Book') ?></dt>
            <dd><?= $stockDetail->has('book') ? $this->Html->link($stockDetail->book->title, ['controller' => 'Books', 'action' => 'view', $stockDetail->book->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($stockDetail->id) ?></dd>
            <dt scope="row"><?= __('Cost Price') ?></dt>
            <dd><?= $this->Number->format($stockDetail->cost_price) ?></dd>
            <dt scope="row"><?= __('Sales Price') ?></dt>
            <dd><?= $this->Number->format($stockDetail->sales_price) ?></dd>
            <dt scope="row"><?= __('Quantity') ?></dt>
            <dd><?= $this->Number->format($stockDetail->quantity) ?></dd>
            <dt scope="row"><?= __('Quantity Out') ?></dt>
            <dd><?= $this->Number->format($stockDetail->quantity_out) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($stockDetail->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($stockDetail->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
