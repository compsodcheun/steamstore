<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="./css/bootstrap-theme.min.css" />
        <link rel="stylesheet" type="text/css" href="./css/defaults.css" />
        <script type="text/javascript" src="./js/jquery.js"></script>
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./js/loading.js"></script>
        <title>ss</title>
    </head>

    <body>
        <div id="warpper">
            <nav class="navbar navbar-default navbar-fixed-top" style="margin-bottom: 0;" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./index.php">Steam Store</a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i> <span class="caret"></span>
                        </a>
                        <ul class="dropdown dropdown-menu">
                            <li>
                                <a href="<?php echo $baseUrl; ?>/back/user/profile"><i class="glyphicon glyphicon-user"></i>
                                    User Profile 
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $baseUrl; ?>/back/user/changepassword"><i class="glyphicon glyphicon-pencil"></i>
                                    Change Password
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo $baseUrl; ?>/back/user/logout"><i class="glyphicon glyphicon-log-out"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="navbar-default navbar-static-side" role="navigation">
                    <div class="sidebar-collapse">
                        <ul id="side-menu" class="nav">
                            <li>
                                <a href="<?php echo $baseUrl; ?>/itoffside-admin"><i class="glyphicon glyphicon-home"></i> หน้าแรก</a>
                            </li>
                            <li>
                                <a href="<?php echo $baseUrl; ?>/back/user"><i class="glyphicon glyphicon-user"></i> ผู้ใช้(ลูกค้า)</a>
                            </li>
                            <li>
                                <a href="<?php echo $baseUrl; ?>/back/productcategorie"><i class="glyphicon glyphicon-list-alt"></i> หมวดหมู่สินค้า</a>
                            </li>
                            <li>
                                <a href="<?php echo $baseUrl; ?>/back/product"><i class="glyphicon glyphicon-book"></i> สินค้า</a>
                            </li>
                            <li>
                                <a href="<?php echo $baseUrl; ?>/back/order"><i class="glyphicon glyphicon-align-justify"></i> รายการสั่งซื้อ</a>
                            </li>
                            <li>
                                <a href="<?php echo $baseUrl; ?>/back/howtopay"><i class="glyphicon glyphicon-folder-open"></i> วิธีการสั่งซื้อ</a>
                            </li>
                            <li>
                                <a href="<?php echo $baseUrl; ?>/back/aboutus"><i class="glyphicon glyphicon-hdd"></i> เกี่ยวกับเรา</a>
                            </li>
                            <li>
                                <a href="<?php echo $baseUrl; ?>"><i class="glyphicon glyphicon-share-alt"></i> กลับไปเว็บไซต์</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

<div id="page-warpper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">จัดการสินค้า</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="subhead">
                <a role="button" class="btn btn-success btn-xs new-data"
                   href="<?php echo $baseUrl; ?>/back/product/create">
                    <i class="glyphicon glyphicon-plus-sign"></i>
                    เพิ่มใหม่
                </a>
                <a role="button" class="search-button btn btn-default btn-xs" href="#">
                    <i class="glyphicon glyphicon-search"></i>
                    ค้นหาขั้นสูง
                </a>
                <a role="button" class="btn btn-default btn-xs" 
                   href="<?php echo $baseUrl; ?>/back/product">
                    <i class="glyphicon glyphicon-refresh"></i>
                    โหลดหน้าจอใหม่
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="search-form" style="display:none">

                <form id="yw0" action="<?php echo $baseUrl; ?>/back/product/index" method="get">
                    <div class="form-horizontal" style="margin-top: 10px;">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">ชื่อสินค้า</label>
                            <div class="col-sm-4">
                                <input class="form-control input-sm" name="name" id="name" type="text" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="brandname" class="col-sm-2 control-label">ยีห้อสินค้า</label>
                            <div class="col-sm-4">
                                <input size="60" maxlength="100" class="form-control input-sm" name="brandname" id="brandname" type="text" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-4">
                                <button type="submit" class="btn btn-primary searchbtn"><i class="glyphicon glyphicon-search"></i> ค้นหาเดี๋ยวนี้!</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- search-form -->
            <div id="user-grid" class="grid-view">
                <div class="summary">หน้า <?php echo $page;?> จากทั้งหมด <?php echo $pages; ?> หน้า</div>
                <table class="table table-striped table-custom">
                    <thead>
                        <tr>
                            <th id="user-grid_c0">
                                <a class="sort-link" href="<?php echo $uri; ?>">สินค้า</a>
                            </th>
                            <th id="user-grid_c1">
                                <a class="sort-link" href="<?php echo $uri; ?>">ราคา</a>
                            </th>
                            <th id="user-grid_c2">
                                <a class="sort-link" href="<?php echo $uri; ?>">ยีห้อ</a>
                            </th><th id="user-grid_c3">
                                <a class="sort-link" href="<?php echo $uri; ?>">หมวดหมู่</a>
                            </th><th id="user-grid_c4">
                                <a class="sort-link" href="<?php echo $uri; ?>">สร้าง</a>
                            </th>
                            <th class="button-column" id="user-grid_c6">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        while ($rs_pd = $db->get($query_pd_page)) {
                            $tr = ($i % 2 == 0) ? "odd" : "even";
                            ?>
                            <tr class="<?php echo $tr; ?>">
                                <td>
                                    <a class="load_data" href="<?php echo $baseUrl; ?>/back/product/update/<?php echo $rs_pd['id']; ?>"><?php echo $rs_pd['pname']; ?></a>
                                </td>
                                <td><?php echo $rs_pd['price']; ?></td>
                                <td><?php echo $rs_pd['brandname']; ?></td>
                                <td><?php echo $rs_pd['cname']; ?></td>
                                <td><?php echo thaidate($rs_pd['created']); ?></td>
                                <td class="button-column">
                                    <a class="btn btn-info btn-xs load_data" title="" href="<?php echo $baseUrl; ?>/product/view/<?php echo $rs_pd['id']; ?>" target="_blank"><i class="glyphicon glyphicon-zoom-in"></i> รายละเอียด</a>
                                    <a class="btn btn-warning btn-xs load_data" title="" href="<?php echo $baseUrl; ?>/back/product/update/<?php echo $rs_pd['id']; ?>"><i class="glyphicon glyphicon-edit"></i> แก้ไข</a>
                                    <a class="btn btn-danger btn-xs confirm" title="" href="#" data-toggle="modal" data-target="#deleteModal<?php echo $rs_pd['id'];?>"><i class="glyphicon glyphicon-remove"></i> ลบ</a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal<?php echo $rs_pd['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">แจ้งเตือนการลบข้อมูล</h4>
                                                </div>
                                                <div class="modal-body">
                                                    คุณยืนยันต้องการจะลบข้อมูลนี้ ใช่หรือไม่?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">ไม่ใช่</button>
                                                    <a role="button" class="btn btn-primary" href="<?php echo $baseUrl; ?>/back/product/delete/<?php echo $rs_pd['id']; ?>">ใช่ ยืนยันการลบ</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div>
                    <?php $pagination->render(); ?>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.search-button').click(function () {
                $('.search-form').toggle();
                return false;
            });
        });
    </script>
</div>

<?php
/*
 * footer***********************************************************************
 */
require 'template/back/footer.php';
/*
 * footer***********************************************************************
 */
mysql_close();