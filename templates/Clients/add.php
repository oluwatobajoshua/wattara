<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Client
      <small><?php echo __('Add'); ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo __('Form'); ?></h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php echo $this->Form->create($client, ['role' => 'form', 'type'=> 'file']); ?>
                <div class="box-body">
                    <?php              
                echo '<div class="col-md-12 col-xs-12">';
                echo '<h4>Client Information</h4>';                            
                echo $this->Form->control('profile.id',['type' => 'hidden']);                
                echo '<div class="col-md-4 col-xs-6">';                
                echo $this->Form->control('profile.first_name');
                echo '</div>';
                echo '<div class="col-md-4 col-xs-6">';
                echo $this->Form->control('profile.last_name');
                echo '</div>';
                echo '<div class="col-md-4 col-xs-6">';
                echo $this->Form->control('profile.email');
                echo '</div>';
                echo '<div class="col-md-4 col-xs-6">';
                echo $this->Form->control('profile.phone');                
                echo $this->Form->control('profile.user_id', ['value' => $user, 'type' => 'hidden']);
                //echo $this->Form->control('photo', ['type' => 'file']);
                //echo $this->Form->control('my_file', ['label' => 'Upload File','type' => 'file', 'accept' => 'application/msword']);
                echo '</div>';
                echo '<div class="col-md-4 col-xs-6">';
                echo $this->Form->control('profile.addresses.0.name', ['rows' => '1', 'cols' => '5', 'label' => 'Address']);
                echo '</div>';
                echo '<div class="col-md-4 col-xs-6">';
                echo $this->Form->control('profile.date_of_birth');
                echo '</div>'; 
                //echo '<div class="col-md-3 col-xs-6">';
                echo $this->Form->control('profile.status_id',['type' => 'hidden','value' => 1]);
                //echo '</div>';                                                             
                echo '</div>';                                     
                                               
              ?>
                </div>
                <!-- /.box-body -->

                <?php echo $this->Form->submit(__('Submit')); ?>

                <?php echo $this->Form->end(); ?>
        </div>
        <!-- /.box -->
      </div>
  </div>
  <!-- /.row -->
</section>

