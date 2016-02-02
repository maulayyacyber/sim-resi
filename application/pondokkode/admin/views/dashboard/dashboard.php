
                        <!--mini statistics start-->
                        <div class="row">
                            <div class="col-sm-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                        Statistik Pengunjung
                                        <span class="tools pull-right">
                                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                                            <a href="javascript:;" class="fa fa-times"></a>
                                         </span>
                                    </header>
                                    <div class="panel-body">
                                                <div class="col-md-3">
                                                    <div class="mini-stat clearfix">
                                                        <span class="mini-stat-icon orange"><i class="fa fa-calendar"></i></span>
                                                        <div class="mini-stat-info">
                                                            <span style='color:#fff'>Hari ini</span>
                                                           <span style='color:#fff'><?php print $today_visit ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mini-stat clearfix">
                                                        <span class="mini-stat-icon tar"><i class="fa fa-calendar"></i></span>
                                                        <div class="mini-stat-info">
                                                            <span style='color:#fff'>Minggu ini</span>
                                                            <span style='color:#fff'><?php print $week_visit ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mini-stat clearfix">
                                                        <span class="mini-stat-icon pink"><i class="fa fa-calendar"></i></span>
                                                        <div class="mini-stat-info">
                                                            <span style='color:#fff'>Bulan ini</span>
                                                            <span style='color:#fff'><?php print $month_visit ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mini-stat clearfix">
                                                        <span class="mini-stat-icon green"><i class="fa fa-calendar"></i></span>
                                                        <div class="mini-stat-info">
                                                            <span style='color:#fff'>Tahun ini</span>
                                                            <span style='color:#fff'><?php print $year_visit ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                </section>
                              </div>
                          </div>
                        <!--mini statistics end-->

                        <!--mini statistics start-->
                        <div class="row">
                            <div class="col-sm-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                        Grafik Pengunjung
                                        <span class="tools pull-right">
                                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                                            <a href="javascript:;" class="fa fa-times"></a>
                                         </span>
                                    </header>
                                    <div class="panel-body">
                                    <div class="btn-group">
                                            <button type="button" id="button-today" onclick="javascript:GetToday('<?php print date("Y-m-d") ?>')" class="btn btn-primary"><i class="fa  fa-calendar"></i> Hari ini</button>
                                            <button type="button" onclick="javascript:GetWeek(<?php print date("Y-m-d") ?>, <?php print date( "Y-m-d", strtotime( date("Y-m-d"). "-7 day" ) ) ?>)" class="btn btn-primary"><i class="fa  fa-calendar"></i> Minggu ini</button>
                                            <button type="button" onclick="javascript:GetMonth(<?php print date("Y-m-d") ?>)" class="btn btn-primary"><i class="fa  fa-calendar"></i> Bulan ini</button>
                                            <button type="button" onclick="javascript:GetAllTime()" class="btn btn-primary"><i class="fa  fa-calendar"></i> Semua</button>
                                    </div>
                                    <div id="containerchart"></div>
                                    </div>
                                </section>
                              </div>
                          </div>
                        <!--mini statistics start-->
                        <div class="row">
                            <div class="col-sm-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                        Server Information
                                        <span class="tools pull-right">
                                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                                            <a href="javascript:;" class="fa fa-times"></a>
                                         </span>
                                    </header>
                                    <div class="panel-body">
                                                <div class="col-md-3">
                                                    <div class="profile-nav alt">
                                                        <section class="panel text-center">
                                                            <div class="user-heading alt wdgt-row terques-bg">
                                                                <i class="fa fa-tasks"></i>
                                                            </div>

                                                            <div class="panel-body">
                                                                <div class="wdgt-value">
                                                                    <h1 class="count" style="color:#AEB2B7">SERVER</h1>
                                                                    <hr>
                                                                    <i><p style="color:#32323A"><?php echo $server; ?></p></i>
                                                                </div>
                                                            </div>

                                                        </section>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="profile-nav alt">
                                                        <section class="panel text-center">
                                                            <div class="user-heading alt wdgt-row purple-bg">
                                                                <i class="fa fa-database"></i>
                                                            </div>

                                                            <div class="panel-body">
                                                                <div class="wdgt-value">
                                                                    <h1 class="count" style="color:#AEB2B7">DATABASE</h1>
                                                                    <hr>
                                                                    <i><p style="color:#32323A"><?php echo $database; ?></p></i>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="profile-nav alt">
                                                        <section class="panel text-center">
                                                            <div class="user-heading alt wdgt-row gray-bg">
                                                                <i class="fa fa-hdd-o"></i>
                                                            </div>

                                                            <div class="panel-body">
                                                                <div class="wdgt-value">
                                                                    <h1 class="count" style="color:#AEB2B7">PLATFORM</h1>
                                                                    <hr>
                                                                    <i><p style="color:#32323A"><?php echo $platform; ?></p></i>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="profile-nav alt">
                                                        <section class="panel text-center">
                                                            <div class="user-heading alt wdgt-row red-bg">
                                                                <i class="fa fa-map-marker"></i>
                                                            </div>

                                                            <div class="panel-body">
                                                                <div class="wdgt-value">
                                                                    <h1 class="count" style="color:#AEB2B7">IP SERVER</h1>
                                                                    <hr>
                                                                    <i><p style="color:#32323A"><?php echo $ip_server; ?></p></i>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </div>
                                                </div>
                                            </div>
                                </section>
                            </div>
                        </div>
                        <!--mini statistics end-->
