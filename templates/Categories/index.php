<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Categories

    <div class="pull-right"><?php echo $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
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
                <input type="text" name="table_search" class="form-control pull-right" placeholder="<?php echo __('Search'); ?>">

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
                  <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('repayment_mode') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('interest') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('service_charge') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('soft_loan') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('soft_loan_sc') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('normal_loan') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($categories as $category): ?>
                <tr>
                  <td><?= $this->Number->format($category->id) ?></td>
                  <td><?= h($category->name) ?></td>
                  <td><?= h($category->repayment_mode) ?></td>
                  <td><?= $this->Number->format($category->interest) ?></td>
                  <td><?= $this->Number->format($category->service_charge) ?></td>
                  <td><?= $this->Number->format($category->soft_loan) ?></td>
                  <td><?= $this->Number->format($category->soft_loan_sc) ?></td>
                  <td><?= $this->Number->format($category->normal_loan) ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $category->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $category->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>