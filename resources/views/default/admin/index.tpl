{include file='admin/main.tpl'}

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            管理中心
            <small>Admin Control</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- START PROGRESS BARS -->
        <div class="row">

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{$sts->getTotalUser()}</h3>

                        <p>總用戶</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="admin/user" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"></i> </a>
                </div>
            </div>
            <!-- <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{$sts->getCheckinUser()}</h3>

                        <p>簽到用戶</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"></i> </a>
                </div>
            </div> -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{$sts->getOnlineUser(3600)}</h3>

                        <p>前一小時在線用戶</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="admin/user/tool/lasthr" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"></i> </a>
                </div>

            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{$sts->getLateCheckinUser()}</h3>

                        <p>簽到過期用戶</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-alert-circled"></i>
                    </div>
                    <a href="admin/user/tools/latecheckin" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"></i> </a>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{$sts->getTotalNode()}</h3>

                        <p>節點數</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-map"></i>
                    </div>
                    <a href="admin/node" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"></i> </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{$sts->getTrafficUsage()}</h3>

                        <p>產生流量</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-speedometer"></i>
                    </div>
                    <a href="admin/trafficlog" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"></i> </a>
                </div>
            </div>
        </div>
        <!-- /.row --><!-- END PROGRESS BARS -->
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->


{include file='admin/footer.tpl'}