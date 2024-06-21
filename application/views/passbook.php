<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $this->session->username; ?></title>

    <!-- Custom fonts for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">






    <link href="<?= base_url('assets/library/fontawesome-free/css/all.min.css" rel="stylesheet') ?>" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/library/stint/style/css2.css" rel="stylesheet') ?>" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets/library/datatables/dataTables.bootstrap4.min.css" rel="stylesheet') ?>" rel="stylesheet">

    <!-- for download -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">



    <style>
        * {
            box-sizing: border-box;
        }

        a {
            text-decoration: none;

        }

        .dropdown {
            position: relative;
            font-size: 14px;
            color: #333;

            .dropdown-list {
                height: 30vh;
                padding: 12px;
                background: #fff;
                position: absolute;
                top: 30px;
                left: 2px;
                right: 2px;
                box-shadow: 0 1px 2px 1px rgba(0, 0, 0, .15);
                transform-origin: 50% 0;
                transform: scale(1, 0);
                transition: transform .15s ease-in-out .15s;
                max-height: 66vh;
                overflow-y: scroll;
            }

            .dropdown-option {
                display: block;
                padding: 8px 12px;
                opacity: 0;
                transition: opacity .15s ease-in-out;
            }

            .dropdown-label {
                display: block;
                height: 30px;
                background: #fff;
                border: 1px solid #ccc;
                padding: 6px 12px;
                line-height: 1;
                cursor: pointer;

                &:before {
                    content: '▼';
                    float: right;
                }
            }

            &.on {
                .dropdown-list {
                    transform: scale(1, 1);
                    transition-delay: 0s;

                    .dropdown-option {
                        opacity: 1;
                        transition-delay: .2s;
                    }
                }

                .dropdown-label:before {
                    content: '▲';
                }
            }

            [type="checkbox"] {
                position: relative;
                top: -1px;
                margin-right: 4px;
            }
        }

        .clickable-card {
            cursor: pointer;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        <?php $this->load->view('sidebar') ?>
        <!-- End of Sidebar -->




        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">




                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->name; ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/library/stint/media/Frame.png') ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <form action="<?= base_url('index.php/login/logout'); ?>" method="post">
                                    <center><button style="border: 0; margin: 0; padding: 0; background-color: white;" type="submit" value="">Logout</button></center>
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">




                    <div class="d-sm-flex flex-row align-items-start justify-content-between mb-4">
                        <div class="dropdown mb-2" style="display: flex; flex-direction: row ">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Filters
                            </button>
                            <ul class="dropdown-menu clickable-card">
                                <li><a href="<?= base_url('index.php/passbook/passbook_dashboard') ?>" class="card-link">
                                        <div class="card-body">
                                            OverAll
                                        </div>

                                    </a></li>
                                <li>
                                    <div class="card-body clickable-card" onclick="document.getElementById('filterFormThisMonth').submit();">
                                        This Month
                                        <form method="post" action="<?= base_url('index.php/passbook/passbook_dashboard') ?>" id="filterFormThisMonth" style="display: none;">
                                            <input type="hidden" id="startDate" name="startDate" value="<?= date('Y-m-01') ?>">
                                            <input type="hidden" id="endDate" name="endDate" value="<?= date('Y-m-t') ?>">
                                        </form>
                                    </div>
                                </li>
                                <li>
                                    <div class="card-body clickable-card" onclick="document.getElementById('filterFormLastMonth').submit();">
                                        Last Month
                                        <form method="post" action="<?= base_url('index.php/passbook/passbook_dashboard') ?>" id="filterFormLastMonth" style="display: none;">
                                            <input type="hidden" id="startDate" name="startDate" value="<?= date('Y-m-01', strtotime('first day of last month')) ?>">
                                            <input type="hidden" id="endDate" name="endDate" value="<?= date('Y-m-t', strtotime('last day of last month')) ?>">
                                        </form>
                                    </div>
                                </li>
                                <li>
                                    <div class="card-body clickable-card" onclick="document.getElementById('filterFormLastThirtyDays').submit();">
                                        Last 30 Days
                                        <form method="post" action="<?= base_url('index.php/passbook/passbook_dashboard') ?>" id="filterFormLastThirtyDays" style="display: none;">
                                            <input type="hidden" id="startDate" name="startDate" value="<?= date('Y-m-d', strtotime('-30 days')) ?>">
                                            <input type="hidden" id="endDate" name="endDate" value="<?= date('Y-m-d') ?>">
                                        </form>
                                    </div>
                                </li>
                                <li>
                                    <div class="card-body clickable-card" onclick="document.getElementById('filterFormLastSevenDays').submit();">
                                        Last 7 Days
                                        <form method="post" action="<?= base_url('index.php/passbook/passbook_dashboard') ?>" id="filterFormLastSevenDays" style="display: none;">
                                            <input type="hidden" id="startDate" name="startDate" value="<?= date('Y-m-d', strtotime('-7 days')) ?>">
                                            <input type="hidden" id="endDate" name="endDate" value="<?= date('Y-m-d') ?>">
                                        </form>
                                    </div>
                                </li>
                                <li>
                                    <div class="card-body clickable-card" onclick="document.getElementById('filterFormThisYear').submit();">
                                        This Year
                                        <form method="post" action="<?= base_url('index.php/passbook/passbook_dashboard') ?>" id="filterFormThisYear" style="display: none;">
                                            <input type="hidden" id="startDate" name="startDate" value="<?= date('Y-01-01'); ?>">
                                            <input type="hidden" id="endDate" name="endDate" value="<?= date('Y-m-d') ?>">
                                        </form>
                                    </div>

                                </li>
                            </ul>

                        </div>
                        <div class="d-sm-flex justify-content-adjust">
                            <form method="post" action="<?= base_url('index.php/passbook/passbook_dashboard') ?>" id="filterForm" class="d-sm-flex">
                                <div class="form-group d-flex align-items-center me-2">
                                    <label for="startDate" class="text-black me-2">From:</label>
                                    <input type="date" class="form-control" id="startDate" placeholder="From" name="startDate">
                                </div>

                                <div class="form-group d-flex align-items-center me-2">
                                    <label for="endDate" class="text-black me-2">To:</label>
                                    <input type="date" class="form-control" id="endDate" placeholder="TO" name="endDate">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" id="filterButton">Filter</button>
                                </div>
                            </form>
                        </div>

                        <h3 class="h6 mb-0 text-gray-800">
                            <?php
                            if (isset($start_date) && isset($end_date)) {
                                $formatted_start_date = date('jS M Y', strtotime($start_date));
                                $formatted_end_date = date('jS M Y', strtotime($end_date));
                                echo $formatted_start_date . ' to ' . $formatted_end_date;
                            }
                            ?>
                        </h3>
                    </div>
                    <div class="row">
                        <!-- Card 1 -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Maximum Income<?php echo '<br>' . $maximum_income_type; ?></div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800"><i class="fas fa-rupee-sign"></i><?php echo '  ' . $maximum_income_amount; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Maximum Expense<?php echo '<br>' . $maximum_expenses_type; ?></div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800"><i class="fas fa-rupee-sign"></i><?php echo '  ' . $maximum_expenses_amount; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Income</div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800"><i class="fas fa-rupee-sign"></i><?php echo '  ' . $total_income; ?></div>
                                        </div>

                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Expense</div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800"><i class="fas fa-rupee-sign"></i><?php echo '   ' . $total_expenses; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 4 -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <?php
                                                if ($total_income - $total_expenses >= 0) {
                                                    echo 'Profit';
                                                } else {
                                                    echo 'Loss';
                                                }
                                                ?></div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800"><i class="fas fa-rupee-sign"></i><?php echo '   ' . abs($total_income - $total_expenses); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>






                    <!-- DataTales Example -->
                    <!-- ------------------------------------------------------------------------------------------------------------- -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">PASSBOOK</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTablePassbook" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="display: none;">Record ID</th>
                                            <th>Record Name</th>
                                            <th>Record Type</th>
                                            <th>Record Category</th>
                                            <th>Record Date</th>
                                            <th>Record Remark</th>
                                            <th>Income Amount</th>
                                            <th>Expenses Amount</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th style="display: none;">Record ID</th>
                                            <th>Record Name</th>
                                            <th>Record Type</th>
                                            <th>Record Category</th>
                                            <th>Record Date</th>
                                            <th>Record Remark</th>
                                            <th>Income Amount</th>
                                            <th>Expenses Amount</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php echo '<pre>';
                                        // print_r($all_expenses_and_income);
                                        // exit; 
                                        ?>
                                        <?php foreach ($all_expenses_and_income as $data) : ?>
                                            <tr>
                                                <td style="display: none;"><?php echo $data['ENI_id'] ?></td>
                                                <td><?php echo $data['ENI_name']; ?></td>
                                                <td><?php echo $data['ENI_type']; ?></td>
                                                <td><?php echo $data['ENI_category']; ?></td>
                                                <td><?php echo date('jS M Y', strtotime($data['ENI_date'])); ?></td>
                                                <td><?php echo $data['ENI_remark']; ?></td>
                                                <td><?php if ($data['ENI_type'] == 'Income') {
                                                        echo '' . $data['ENI_amount'] . '';
                                                    } else {
                                                        echo '';
                                                    } ?></td>
                                                <td><?php if ($data['ENI_type'] == 'Expenses') {
                                                        echo '' . $data['ENI_amount'] . '';
                                                    } else {
                                                        echo '';
                                                    } ?></td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <!-- <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card bg-dark text-white shadow">
                                <div class="card-body">
                                    <form method="post" action="<?= base_url('index.php/passbook/index') ?>" id="filterForm">
                                        <div class="form-group">
                                            <label for="startDate" class="text-white">From:</label>
                                            <input type="date" class="form-control" id="startDate" name="startDate">
                                        </div>
                                        <div class="form-group">
                                            <label for="endDate" class="text-white">To:</label>
                                            <input type="date" class="form-control" id="endDate" name="endDate">
                                        </div>
                                        <button type="submit" class="btn btn-primary" id="filterButton">Filter</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> -->


                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Sheet Management System</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>









        <script src="<?= base_url('assets/library/jquery/jquery.min.js" rel="stylesheet') ?>"></script>
        <script src="<?= base_url('assets/library/bootstrap/js/bootstrap.bundle.min.js" rel="stylesheet') ?>"></script>
        <script src="<?= base_url('assets/library/jquery-easing/jquery.easing.min.js" rel="stylesheet') ?>"></script>
        <script src="<?= base_url('assets/library/js/sb-admin-2.min.js" rel="stylesheet') ?>"></script>
        <script src="<?= base_url('assets/library/datatables/jquery.dataTables.min.js" rel="stylesheet') ?>"></script>
        <script src="<?= base_url('assets/library/datatables/dataTables.bootstrap4.min.js" rel="stylesheet') ?>"></script>
        <script src="<?= base_url('assets/library/js/demo/datatables-demo.js" rel="stylesheet') ?>"></script>



        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function() {
                $('#dataTablePassbook').DataTable({
                    lengthMenu: [10, 25, 50],
                    dom: 'Blfrtip',
                    buttons: [
                        'excelHtml5',
                    ]
                });
            });

        </script>



</body>

</html>