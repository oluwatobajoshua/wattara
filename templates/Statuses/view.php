<section class="content-header">
  <h1>
    Status
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
            <dd><?= h($status->name) ?></dd>
            <dt scope="row"><?= __('Description') ?></dt>
            <dd><?= h($status->description) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($status->id) ?></dd>
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
          <h3 class="box-title"><?= __('Deposit Withdrawals') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($status->deposit_withdrawals)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Transaction Id') ?></th>
                    <th scope="col"><?= __('Name') ?></th>
                    <th scope="col"><?= __('Phone') ?></th>
                    <th scope="col"><?= __('Beneficiary Name') ?></th>
                    <th scope="col"><?= __('Beneficiary Bank') ?></th>
                    <th scope="col"><?= __('Beneficiary Account') ?></th>
                    <th scope="col"><?= __('Beneficiary Phone') ?></th>
                    <th scope="col"><?= __('Beneficiary Card Name') ?></th>
                    <th scope="col"><?= __('Beneficiary Card Number') ?></th>
                    <th scope="col"><?= __('Deposit Withdrawal Amount') ?></th>
                    <th scope="col"><?= __('Transaction Time') ?></th>
                    <th scope="col"><?= __('Status Id') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($status->deposit_withdrawals as $depositWithdrawals): ?>
              <tr>
                    <td><?= h($depositWithdrawals->id) ?></td>
                    <td><?= h($depositWithdrawals->transaction_id) ?></td>
                    <td><?= h($depositWithdrawals->name) ?></td>
                    <td><?= h($depositWithdrawals->phone) ?></td>
                    <td><?= h($depositWithdrawals->beneficiary_name) ?></td>
                    <td><?= h($depositWithdrawals->beneficiary_bank) ?></td>
                    <td><?= h($depositWithdrawals->beneficiary_account) ?></td>
                    <td><?= h($depositWithdrawals->beneficiary_phone) ?></td>
                    <td><?= h($depositWithdrawals->beneficiary_card_name) ?></td>
                    <td><?= h($depositWithdrawals->beneficiary_card_number) ?></td>
                    <td><?= h($depositWithdrawals->deposit_withdrawal_amount) ?></td>
                    <td><?= h($depositWithdrawals->transaction_time) ?></td>
                    <td><?= h($depositWithdrawals->status_id) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'DepositWithdrawals', 'action' => 'view', $depositWithdrawals->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'DepositWithdrawals', 'action' => 'edit', $depositWithdrawals->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'DepositWithdrawals', 'action' => 'delete', $depositWithdrawals->id], ['confirm' => __('Are you sure you want to delete # {0}?', $depositWithdrawals->id), 'class'=>'btn btn-danger btn-xs']) ?>
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
          <h3 class="box-title"><?= __('Packages') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($status->packages)): ?>
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
              <?php foreach ($status->packages as $packages): ?>
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
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Profiles') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($status->profiles)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Last Name') ?></th>
                    <th scope="col"><?= __('First Name') ?></th>
                    <th scope="col"><?= __('Date Of Birth') ?></th>
                    <th scope="col"><?= __('Email') ?></th>
                    <th scope="col"><?= __('Phone') ?></th>
                    <th scope="col"><?= __('Address') ?></th>
                    <th scope="col"><?= __('Passport') ?></th>
                    <th scope="col"><?= __('Sign') ?></th>
                    <th scope="col"><?= __('Status Id') ?></th>
                    <th scope="col"><?= __('User Id') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($status->profiles as $profiles): ?>
              <tr>
                    <td><?= h($profiles->id) ?></td>
                    <td><?= h($profiles->last_name) ?></td>
                    <td><?= h($profiles->first_name) ?></td>
                    <td><?= h($profiles->date_of_birth) ?></td>
                    <td><?= h($profiles->email) ?></td>
                    <td><?= h($profiles->phone) ?></td>
                    <td><?= h($profiles->address) ?></td>
                    <td><?= h($profiles->passport) ?></td>
                    <td><?= h($profiles->sign) ?></td>
                    <td><?= h($profiles->status_id) ?></td>
                    <td><?= h($profiles->user_id) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Profiles', 'action' => 'view', $profiles->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Profiles', 'action' => 'edit', $profiles->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Profiles', 'action' => 'delete', $profiles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profiles->id), 'class'=>'btn btn-danger btn-xs']) ?>
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
          <h3 class="box-title"><?= __('Transactions') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($status->transactions)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Account Id') ?></th>
                    <th scope="col"><?= __('Package Id') ?></th>
                    <th scope="col"><?= __('Status Id') ?></th>
                    <th scope="col"><?= __('Editable') ?></th>
                    <th scope="col"><?= __('In Use') ?></th>
                    <th scope="col"><?= __('Credit Officer') ?></th>
                    <th scope="col"><?= __('Bank Teller') ?></th>
                    <th scope="col"><?= __('Ledger Number') ?></th>
                    <th scope="col"><?= __('Reg Year') ?></th>
                    <th scope="col"><?= __('Reg Month') ?></th>
                    <th scope="col"><?= __('Reg Day') ?></th>
                    <th scope="col"><?= __('State') ?></th>
                    <th scope="col"><?= __('Amount') ?></th>
                    <th scope="col"><?= __('Particular') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($status->transactions as $transactions): ?>
              <tr>
                    <td><?= h($transactions->id) ?></td>
                    <td><?= h($transactions->account_id) ?></td>
                    <td><?= h($transactions->package_id) ?></td>
                    <td><?= h($transactions->status_id) ?></td>
                    <td><?= h($transactions->editable) ?></td>
                    <td><?= h($transactions->in_use) ?></td>
                    <td><?= h($transactions->credit_officer) ?></td>
                    <td><?= h($transactions->bank_teller) ?></td>
                    <td><?= h($transactions->ledger_number) ?></td>
                    <td><?= h($transactions->reg_year) ?></td>
                    <td><?= h($transactions->reg_month) ?></td>
                    <td><?= h($transactions->reg_day) ?></td>
                    <td><?= h($transactions->state) ?></td>
                    <td><?= h($transactions->amount) ?></td>
                    <td><?= h($transactions->particular) ?></td>
                    <td><?= h($transactions->created) ?></td>
                    <td><?= h($transactions->modified) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Transactions', 'action' => 'view', $transactions->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Transactions', 'action' => 'edit', $transactions->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Transactions', 'action' => 'delete', $transactions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactions->id), 'class'=>'btn btn-danger btn-xs']) ?>
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
