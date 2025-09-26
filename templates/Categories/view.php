<section class="content-header">
  <h1>
    Category
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
            <dd><?= h($category->name) ?></dd>
            <dt scope="row"><?= __('Repayment Mode') ?></dt>
            <dd><?= h($category->repayment_mode) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($category->id) ?></dd>
            <dt scope="row"><?= __('Interest') ?></dt>
            <dd><?= $this->Number->format($category->interest) ?></dd>
            <dt scope="row"><?= __('Service Charge') ?></dt>
            <dd><?= $this->Number->format($category->service_charge) ?></dd>
            <dt scope="row"><?= __('Soft Loan') ?></dt>
            <dd><?= $this->Number->format($category->soft_loan) ?></dd>
            <dt scope="row"><?= __('Soft Loan Sc') ?></dt>
            <dd><?= $this->Number->format($category->soft_loan_sc) ?></dd>
            <dt scope="row"><?= __('Normal Loan') ?></dt>
            <dd><?= $this->Number->format($category->normal_loan) ?></dd>
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
          <h3 class="box-title"><?= __('Packages') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($category->packages)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Account Id') ?></th>
                    <th scope="col"><?= __('Package Type Id') ?></th>
                    <th scope="col"><?= __('Plan Duration Id') ?></th>
                    <th scope="col"><?= __('Category Id') ?></th>
                    <th scope="col"><?= __('Repayment Mode Id') ?></th>
                    <th scope="col"><?= __('Amount') ?></th>
                    <th scope="col"><?= __('Target') ?></th>
                    <th scope="col"><?= __('Comment') ?></th>
                    <th scope="col"><?= __('Start Date') ?></th>
                    <th scope="col"><?= __('End Date') ?></th>
                    <th scope="col"><?= __('Status Id') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($category->packages as $packages): ?>
              <tr>
                    <td><?= h($packages->id) ?></td>
                    <td><?= h($packages->account_id) ?></td>
                    <td><?= h($packages->package_type_id) ?></td>
                    <td><?= h($packages->plan_duration_id) ?></td>
                    <td><?= h($packages->category_id) ?></td>
                    <td><?= h($packages->repayment_mode_id) ?></td>
                    <td><?= h($packages->amount) ?></td>
                    <td><?= h($packages->target) ?></td>
                    <td><?= h($packages->comment) ?></td>
                    <td><?= h($packages->start_date) ?></td>
                    <td><?= h($packages->end_date) ?></td>
                    <td><?= h($packages->status_id) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Packages', 'action' => 'view', $packages->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Packages', 'action' => 'edit', $packages->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Packages', 'action' => 'delete', $packages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $packages->id), 'class'=>'btn btn-danger btn-xs']) ?>
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
