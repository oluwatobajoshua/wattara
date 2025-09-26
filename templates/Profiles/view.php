<section class="content-header">
  <h1>
    Profile
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
            <dt scope="row"><?= __('Last Name') ?></dt>
            <dd><?= h($profile->last_name) ?></dd>
            <dt scope="row"><?= __('First Name') ?></dt>
            <dd><?= h($profile->first_name) ?></dd>
            <dt scope="row"><?= __('Email') ?></dt>
            <dd><?= h($profile->email) ?></dd>
            <dt scope="row"><?= __('Phone') ?></dt>
            <dd><?= h($profile->phone) ?></dd>
            <dt scope="row"><?= __('Passport') ?></dt>
            <dd><?= h($profile->passport) ?></dd>
            <dt scope="row"><?= __('Sign') ?></dt>
            <dd><?= h($profile->sign) ?></dd>
            <dt scope="row"><?= __('Status') ?></dt>
            <dd><?= $profile->has('status') ? $this->Html->link($profile->status->name, ['controller' => 'Statuses', 'action' => 'view', $profile->status->id]) : '' ?></dd>
            <dt scope="row"><?= __('User') ?></dt>
            <dd><?= $profile->has('user') ? $this->Html->link($profile->user->username, ['controller' => 'Users', 'action' => 'view', $profile->user->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($profile->id) ?></dd>
            <dt scope="row"><?= __('Date Of Birth') ?></dt>
            <dd><?= h($profile->date_of_birth) ?></dd>
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
          <h3 class="box-title"><?= __('Addresses') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($profile->addresses)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Profile Id') ?></th>
                    <th scope="col"><?= __('Name') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($profile->addresses as $addresses): ?>
              <tr>
                    <td><?= h($addresses->id) ?></td>
                    <td><?= h($addresses->profile_id) ?></td>
                    <td><?= h($addresses->name) ?></td>
                    <td><?= h($addresses->created) ?></td>
                    <td><?= h($addresses->modified) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Addresses', 'action' => 'view', $addresses->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Addresses', 'action' => 'edit', $addresses->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Addresses', 'action' => 'delete', $addresses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addresses->id), 'class'=>'btn btn-danger btn-xs']) ?>
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
          <h3 class="box-title"><?= __('Clients') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($profile->clients)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Profile Id') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($profile->clients as $clients): ?>
              <tr>
                    <td><?= h($clients->id) ?></td>
                    <td><?= h($clients->profile_id) ?></td>
                    <td><?= h($clients->created) ?></td>
                    <td><?= h($clients->modified) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Clients', 'action' => 'view', $clients->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Clients', 'action' => 'edit', $clients->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clients', 'action' => 'delete', $clients->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clients->id), 'class'=>'btn btn-danger btn-xs']) ?>
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
