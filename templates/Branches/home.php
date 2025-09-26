<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Version 3.0</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="<?php echo $this->Url->build('/users/index'); ?>">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">STAFF</span>
                        <span class="info-box-number"><?= h($u_count) ?><small></small></span>
                    </div>
            </a>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="<?php echo $this->Url->build('/branches/index'); ?>">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-building"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">BRANCHES</span>
                    <span class="info-box-number"><?= h($branches->count()) ?></span>
                </div>
        </a>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">PRODUCTS & SERVICES</span>
                <span class="info-box-number">20</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">CUSTOMER</span>
                <span class="info-box-number"><?= $this->Number->format($c_count) ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Monthly Recap Report</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-wrench"></i></button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="text-center">
                                <strong>Sales: Jan, 2020 - Sept, 2020</strong>
                            </p>

                            <div class="chart">
                                <!-- Sales Chart Canvas -->
                                <canvas id="salesChart" style="height: 180px;"></canvas>
                            </div>
                            <!-- /.chart-responsive -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4">
                            <p class="text-center">
                                <strong>Goal Completion</strong>
                            </p>

                            <div class="progress-group">
                                <span class="progress-text">Add new Products & Services</span>
                                <span class="progress-number"><b>160</b>/200</span>

                                <div class="progress sm">
                                    <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                                </div>
                            </div>
                            <!-- /.progress-group -->
                            <div class="progress-group">
                                <span class="progress-text">Have more branches in Ibadan</span>
                                <span class="progress-number"><b>310</b>/400</span>

                                <div class="progress sm">
                                    <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                                </div>
                            </div>
                            <!-- /.progress-group -->
                            <div class="progress-group">
                                <span class="progress-text">Staff Strength</span>
                                <span class="progress-number"><b>480</b>/800</span>

                                <div class="progress sm">
                                    <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                                </div>
                            </div>
                            <!-- /.progress-group -->
                            <div class="progress-group">
                                <span class="progress-text">Send emails to all clients</span>
                                <span class="progress-number"><b>250</b>/500</span>

                                <div class="progress sm">
                                    <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                                </div>
                            </div>
                            <!-- /.progress-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- ./box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-3 col-xs-6">
                            <div class="description-block border-right">
                                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i>
                                    17%</span>
                                <h5 class="description-header">₦<?= $this->Number->format($credit) ?></h5>
                                <span class="description-text">TOTAL CREDIT</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 col-xs-6">
                            <div class="description-block border-right">
                                <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i>
                                    0%</span>
                                <h5 class="description-header">₦<?= $this->Number->format($debit) ?></h5>
                                <span class="description-text">TOTAL DEBIT</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 col-xs-6">
                            <div class="description-block border-right">
                                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i>
                                    20%</span>
                                <h5 class="description-header">₦<?= $this->Number->format($balance) ?></h5>
                                <span class="description-text">TOTAL BALANCE</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 col-xs-6">
                            <div class="description-block">
                                <span class="description-percentage text-red"><i class="fa fa-caret-down"></i>
                                    18%</span>
                                <h5 class="description-header">1200</h5>
                                <span class="description-text">GOAL COMPLETIONS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
            <!-- MAP & BOX PANE -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Visitors Report</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="row">
                        <div class="col-md-9 col-sm-8">
                            <div class="pad">
                                <!-- Map will be created here -->
                                <div id="world-map-markers" style="height: 325px;"></div>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-4">
                            <div class="pad box-pane-right bg-green" style="min-height: 280px">
                                <div class="description-block margin-bottom">
                                    <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                                    <h5 class="description-header">8390</h5>
                                    <span class="description-text">Visits</span>
                                </div>
                                <!-- /.description-block -->
                                <div class="description-block margin-bottom">
                                    <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                                    <h5 class="description-header">30%</h5>
                                    <span class="description-text">Referrals</span>
                                </div>
                                <!-- /.description-block -->
                                <div class="description-block">
                                    <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                                    <h5 class="description-header">70%</h5>
                                    <span class="description-text">Organic</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="row">
                <div class="col-md-6">
                    <!-- DIRECT CHAT -->
                    <div class="box box-warning direct-chat direct-chat-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Direct Chat</h3>

                            <div class="box-tools pull-right">
                                <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow">3</span>
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts"
                                    data-widget="chat-pane-toggle">
                                    <i class="fa fa-comments"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages">
                                <!-- Message. Default to the left -->
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-left">Head Office</span>
                                        <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                                    </div>
                                    <!-- /.direct-chat-info -->
                                    <?php echo $this->Html->image('user1-128x128.jpg', array('class' => 'direct-chat-img', 'alt' => 'message user image')); ?>
                                    <div class="direct-chat-text">
                                        Please send in all the schedules as soon as possible, thanks.
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                                <!-- Message to the right -->
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-right">Apete Branch</span>
                                        <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                                    </div>
                                    <!-- /.direct-chat-info -->
                                    <?php echo $this->Html->image('user3-128x128.jpg', array('class' => 'direct-chat-img', 'alt' => 'message user image')); ?>
                                    <div class="direct-chat-text">
                                        We will asap sir.
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                                <!-- Message. Default to the left -->
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-left">Head Office</span>
                                        <span class="direct-chat-timestamp pull-right">23 Jan 5:37 pm</span>
                                    </div>
                                    <!-- /.direct-chat-info -->
                                    <?php echo $this->Html->image('user1-128x128.jpg', array('class' => 'direct-chat-img', 'alt' => 'message user image')); ?>
                                    <div class="direct-chat-text">
                                        ok.
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                                <!-- Message to the right -->
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-right">Apete Branch</span>
                                        <span class="direct-chat-timestamp pull-left">23 Jan 6:10 pm</span>
                                    </div>
                                    <!-- /.direct-chat-info -->
                                    <?php echo $this->Html->image('user3-128x128.jpg', array('class' => 'direct-chat-img', 'alt' => 'message user image')); ?>
                                    <div class="direct-chat-text">
                                        Kindly approve the loan dibursement sir.
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                            </div>
                            <!--/.direct-chat-messages-->

                            <!-- Contacts are loaded here -->
                            <div class="direct-chat-contacts">
                                <ul class="contacts-list">
                                    <li>
                                        <a href="#">
                                            <?php echo $this->Html->image('user1-128x128.jpg', array('class' => 'contacts-list-img', 'alt' => 'User Image')); ?>
                                            <div class="contacts-list-info">
                                                <span class="contacts-list-name">
                                                    Count Dracula
                                                    <small class="contacts-list-date pull-right">2/28/2015</small>
                                                </span>
                                                <span class="contacts-list-msg">How have you been? I was...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                    <li>
                                        <a href="#">
                                            <?php echo $this->Html->image('user7-128x128.jpg', array('class' => 'contacts-list-img', 'alt' => 'User Image')); ?>

                                            <div class="contacts-list-info">
                                                <span class="contacts-list-name">
                                                    Sarah Doe
                                                    <small class="contacts-list-date pull-right">2/23/2015</small>
                                                </span>
                                                <span class="contacts-list-msg">I will be waiting for...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                    <li>
                                        <a href="#">
                                            <?php echo $this->Html->image('user3-128x128.jpg', array('class' => 'contacts-list-img', 'alt' => 'User Image')); ?>

                                            <div class="contacts-list-info">
                                                <span class="contacts-list-name">
                                                    Nadia Jolie
                                                    <small class="contacts-list-date pull-right">2/20/2015</small>
                                                </span>
                                                <span class="contacts-list-msg">I'll call you back at...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                    <li>
                                        <a href="#">
                                            <?php echo $this->Html->image('user5-128x128.jpg', array('class' => 'contacts-list-img', 'alt' => 'User Image')); ?>

                                            <div class="contacts-list-info">
                                                <span class="contacts-list-name">
                                                    Nora S. Vans
                                                    <small class="contacts-list-date pull-right">2/10/2015</small>
                                                </span>
                                                <span class="contacts-list-msg">Where is your new...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                    <li>
                                        <a href="#">
                                            <?php echo $this->Html->image('user6-128x128.jpg', array('class' => 'contacts-list-img', 'alt' => 'User Image')); ?>

                                            <div class="contacts-list-info">
                                                <span class="contacts-list-name">
                                                    John K.
                                                    <small class="contacts-list-date pull-right">1/27/2015</small>
                                                </span>
                                                <span class="contacts-list-msg">Can I take a look at...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                    <li>
                                        <a href="#">
                                            <?php echo $this->Html->image('user8-128x128.jpg', array('class' => 'contacts-list-img', 'alt' => 'User Image')); ?>

                                            <div class="contacts-list-info">
                                                <span class="contacts-list-name">
                                                    Kenneth M.
                                                    <small class="contacts-list-date pull-right">1/4/2015</small>
                                                </span>
                                                <span class="contacts-list-msg">Never mind I found...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                </ul>
                                <!-- /.contatcts-list -->
                            </div>
                            <!-- /.direct-chat-pane -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <form action="#" method="post">
                                <div class="input-group">
                                    <input type="text" name="message" placeholder="Type Message ..."
                                        class="form-control">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-warning btn-flat">Send</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-footer-->
                    </div>
                    <!--/.direct-chat -->
                </div>
                <!-- /.col -->

                <div class="col-md-6">
                    <!-- USERS LIST -->
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Latest Customers</h3>

                            <div class="box-tools pull-right">
                                <span class="label label-danger">8 New Customer</span>
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <ul class="users-list clearfix">
                                <li>
                                    <?php echo $this->Html->image('user1-128x128.jpg', array('alt' => 'User Image')); ?>
                                    <a class="users-list-name" href="#">Khadijat</a>
                                    <span class="users-list-date">Today</span>
                                </li>
                                <li>
                                    <?php echo $this->Html->image('user8-128x128.jpg', array('alt' => 'User Image')); ?>
                                    <a class="users-list-name" href="#">Kenny 2 </a>
                                    <span class="users-list-date">Yesterday</span>
                                </li>
                                <li>
                                    <?php echo $this->Html->image('user7-128x128.jpg', array('alt' => 'User Image')); ?>
                                    <a class="users-list-name" href="#">Iya Ibeji </a>
                                    <span class="users-list-date">Last Week</span>
                                </li>
                                <li>
                                    <?php echo $this->Html->image('user6-128x128.jpg', array('alt' => 'User Image')); ?>
                                    <a class="users-list-name" href="#">Adeshewa</a>
                                    <span class="users-list-date">15 August</span>
                                </li>
                                <li>
                                    <?php echo $this->Html->image('user2-160x160.jpg', array('alt' => 'User Image')); ?>
                                    <a class="users-list-name" href="#">Adebayor </a>
                                    <span class="users-list-date">13 Jan</span>
                                </li>
                                <li>
                                    <?php echo $this->Html->image('user5-128x128.jpg', array('alt' => 'User Image')); ?>
                                    <a class="users-list-name" href="#">Adedokun </a>
                                    <span class="users-list-date">14 Jan</span>
                                </li>
                                <li>
                                    <?php echo $this->Html->image('user4-128x128.jpg', array('alt' => 'User Image')); ?>
                                    <a class="users-list-name" href="#">Folashade </a>
                                    <span class="users-list-date">15 Jan</span>
                                </li>
                                <li>
                                    <?php echo $this->Html->image('user3-128x128.jpg', array('alt' => 'User Image')); ?>
                                    <a class="users-list-name" href="#">Sakiru Lateef </a>
                                    <span class="users-list-date">15 Jan</span>
                                </li>
                            </ul>
                            <!-- /.users-list -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="javascript:void(0)" class="uppercase">View All Users</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!--/.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- TABLE: LATEST ORDERS -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Latest Orders</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        Lastest Savings
                        <!--
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Item</th>
                                    <th>Status</th>
                                    <th>Popularity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                    <td>Call of Duty IV</td>
                                    <td><span class="label label-success">Shipped</span></td>
                                    <td>
                                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                                            90,80,90,-70,61,-83,63</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                    <td>Samsung Smart TV</td>
                                    <td><span class="label label-warning">Pending</span></td>
                                    <td>
                                        <div class="sparkbar" data-color="#f39c12" data-height="20">
                                            90,80,-90,70,61,-83,68</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                    <td>iPhone 6 Plus</td>
                                    <td><span class="label label-danger">Delivered</span></td>
                                    <td>
                                        <div class="sparkbar" data-color="#f56954" data-height="20">
                                            90,-80,90,70,-61,83,63</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                    <td>Samsung Smart TV</td>
                                    <td><span class="label label-info">Processing</span></td>
                                    <td>
                                        <div class="sparkbar" data-color="#00c0ef" data-height="20">
                                            90,80,-90,70,-61,83,63</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                    <td>Samsung Smart TV</td>
                                    <td><span class="label label-warning">Pending</span></td>
                                    <td>
                                        <div class="sparkbar" data-color="#f39c12" data-height="20">
                                            90,80,-90,70,61,-83,68</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                    <td>iPhone 6 Plus</td>
                                    <td><span class="label label-danger">Delivered</span></td>
                                    <td>
                                        <div class="sparkbar" data-color="#f56954" data-height="20">
                                            90,-80,90,70,-61,83,63</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                    <td>Call of Duty IV</td>
                                    <td><span class="label label-success">Shipped</span></td>
                                    <td>
                                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                                            90,80,90,-70,61,-83,63</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    -->
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Savings</a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Savings</a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">LONG TERM</span>
                    <span class="info-box-number">5,200</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 50%"></div>
                    </div>
                    <span class="progress-description">
                        50% Increase in 30 Days
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box bg-green">
                <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">SHORT TERM</span>
                    <span class="info-box-number">92,050</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 20%"></div>
                    </div>
                    <span class="progress-description">
                        20% Increase in 30 Days
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box bg-red">
                <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Savings</span>
                    <span class="info-box-number">114,381</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                        70% Increase in 30 Days
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Loans</span>
                    <span class="info-box-number">163,921</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 40%"></div>
                    </div>
                    <span class="progress-description">
                        40% Increase in 30 Days
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Products & Services Statistics</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="chart-responsive">
                                <canvas id="pieChart" height="150"></canvas>
                            </div>
                            <!-- ./chart-responsive -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4">
                            <ul class="chart-legend clearfix">
                                <li><i class="fa fa-circle-o text-red"></i> Savings</li>
                                <li><i class="fa fa-circle-o text-green"></i> Loan</li>
                                <li><i class="fa fa-circle-o text-yellow"></i> Investment</li>
                                <li><i class="fa fa-circle-o text-aqua"></i> Deposits</li>
                                <li><i class="fa fa-circle-o text-light-blue"></i> Withdrawals</li>
                                <li><i class="fa fa-circle-o text-gray"></i> Subscriptions</li>
                            </ul>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="#">Apete Branch
                                <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
                        <li><a href="#">Ido-Ose <span class="pull-right text-green"><i class="fa fa-angle-up"></i>
                                    4%</span></a>
                        </li>
                        <li><a href="#">Orogun
                                <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
                    </ul>
                </div>
                <!-- /.footer -->
            </div>
            <!-- /.box -->

            <!-- PRODUCT LIST -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Recently Added Products</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="products-list product-list-in-box">
                        <li class="item">
                            <div class="product-img">
                                <?php echo $this->Html->image('default-50x50.gif', array('alt' => 'Product Image')); ?>
                            </div>
                            <div class="product-info">
                                <a href="javascript:void(0)" class="product-title">Recharge Card
                                    <span class="label label-warning pull-right">$1800</span></a>
                                <span class="product-description">
                                    Sales of recharge card on our platform
                                </span>
                            </div>
                        </li>
                        <!-- /.item -->
                    </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="javascript:void(0)" class="uppercase">View All Products</a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

<!-- jvectormap -->
<?php echo $this->Html->css('AdminLTE./bower_components/jvectormap/jquery-jvectormap', ['block' => 'css']); ?>
<!-- Sparkline -->
<?php echo $this->Html->script('AdminLTE./bower_components/jquery-sparkline/dist/jquery.sparkline.min', ['block' => 'script']); ?>
<!-- jvectormap -->
<?php echo $this->Html->script('AdminLTE./plugins/jvectormap/jquery-jvectormap-1.2.2.min', ['block' => 'script']); ?>
<?php echo $this->Html->script('AdminLTE./plugins/jvectormap/jquery-jvectormap-world-mill-en', ['block' => 'script']); ?>
<!-- ChartJS -->
<?php echo $this->Html->script('AdminLTE./bower_components/chart.js/Chart', ['block' => 'script']); ?>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<?php echo $this->Html->script('AdminLTE.pages/dashboard2', ['block' => 'script']); ?>