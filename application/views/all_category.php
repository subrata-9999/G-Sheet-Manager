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
    <link href="<?= base_url('assets/library/fontawesome-free/css/all.min.css" rel="stylesheet') ?>" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/library/stint/style/css2.css" rel="stylesheet') ?>" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets/library/datatables/dataTables.bootstrap4.min.css" rel="stylesheet') ?>" rel="stylesheet">

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

                    <!-- Change Category -->
                    <div class="col-lg-4 mb-4" id="editModal" style="display: none;">
                        <div class="card text-white shadow">
                            <div class="card-body">
                                <form method="post" action="<?= base_url('index.php/expenses/updateCategoryType') ?>" id="updateCategoryForm">
                                    <div class="form-group">
                                        <label for="updateCategory" class="text-black-50">Category</label>
                                        <input type="text" class="form-control" id="updateCategoryFix" name="updateCategoryFix" readonly>
                                        <br>
                                        <input type="text" class="form-control" id="updateCategory" name="updateCategory">
                                    </div>
                                    <button type="button" class="btn btn-primary" id="updateCategoryButton">Change</button>
                                    <button type="button" class="btn btn-secondary" id="cancelButton">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>

                        <div class="card-body">


                            <div class="card-body">
                                <div id="assigned_by_you" class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Category Name</th>
                                                <th>Total Expenses</th>
                                                <th>Control</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Category Name</th>
                                                <th>Total Expenses</th>
                                                <th>Control</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                            <?php foreach ($total_expenses_by_category as $category => $details) : ?>
                                                <?php if ($details['bud_stat'] == 1) : ?>
                                                    <tr>
                                                        <td><?= $category; ?></td>
                                                        <td><?= $details['bud_amount']; ?></td>
                                                        <td>
                                                            <a class="btn btn-primary edit-btn" data-id="<?php echo $category; ?>">Edit</a>
                                                            <a class="btn btn-danger dlt-dtn" data-id="<?php echo $category; ?>">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <?php foreach ($total_expenses_by_category as $category => $details) : ?>
                                                <?php if ($details['bud_stat'] != 1) : ?>
                                                    <tr>
                                                        <td><?= $category; ?></td>
                                                        <td><?= $details['bud_amount']; ?></td>
                                                        <td>
                                                            <a class="btn btn-success restore-dtn" data-id="<?php echo $category; ?>">Restore</a>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>

                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>

                    </div>
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



        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url('assets/library/jquery/jquery.min.js" rel="stylesheet') ?>"></script>
        <script src="<?= base_url('assets/library/bootstrap/js/bootstrap.bundle.min.js" rel="stylesheet') ?>"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url('assets/library/jquery-easing/jquery.easing.min.js" rel="stylesheet') ?>"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?= base_url('assets/library/js/sb-admin-2.min.js" rel="stylesheet') ?>"></script>

        <!-- Page level plugins -->
        <script src="<?= base_url('assets/library/datatables/jquery.dataTables.min.js" rel="stylesheet') ?>"></script>
        <script src="<?= base_url('assets/library/datatables/dataTables.bootstrap4.min.js" rel="stylesheet') ?>"></script>

        <!-- Page level custom scripts -->
        <script src="<?= base_url('assets/library/js/demo/datatables-demo.js" rel="stylesheet') ?>"></script>

        <script>
            $(document).ready(function() {
                // Add click event listener to the Edit button
                $(".edit-btn").click(function() {
                    // Get the data-id attribute value from the Edit button
                    var categoryValue = $(this).data("id");

                    // Set the value of the input field in the modal
                    $("#updateCategoryFix").val(categoryValue);
                    $("#updateCategory").val(categoryValue);

                    // Show the modal
                    $("#editModal").show();
                });
            });


            $(document).ready(function() {
                // Add click event listener to the Change button
                $("#updateCategoryButton").click(function() {
                    // Get the value of the input field
                    var categoryValueFix = $("#updateCategoryFix").val().toLowerCase();
                    var categoryValue = $("#updateCategory").val().toLowerCase();

                    // Set the value in the form
                    if (categoryValueFix !== categoryValue) {
                        // Set the lowercase values in the form
                        $("#updateCategoryFix").val(categoryValueFix);
                        $("#updateCategory").val(categoryValue);

                        // Submit the form
                        $("#updateCategoryForm").submit();
                    } else {
                        alert("Values are the same. No changes to submit.");
                    }
                });
            });
            $("#cancelButton").click(function() {
                // Hide the modal or perform any other cancel action
                $("#editModal").hide();
            });

            $(document).ready(function() {
                $(".dlt-dtn").click(function() {
                    // Get the data-id attribute value
                    var categoryValue = $(this).data("id");

                    // Make an AJAX request to the controller function
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('index.php/expenses/deleteCategory'); ?>",
                        data: {
                            categoryValue: categoryValue
                        },
                        success: function(response) {
                            // Handle the response from the server
                            console.log(response);
                            location.reload();
                        },
                        error: function(error) {
                            console.log("Error:", error);
                        }
                    });
                });
            });
            $(document).ready(function() {
                $(".restore-dtn").click(function() {
                    // Get the data-id attribute value
                    var categoryValue = $(this).data("id");

                    // Make an AJAX request to the controller function
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('index.php/expenses/restoreCategory'); ?>",
                        data: {
                            categoryValue: categoryValue
                        },
                        success: function(response) {
                            // Handle the response from the server
                            console.log(response);
                            location.reload();
                        },
                        error: function(error) {
                            console.log("Error:", error);
                        }
                    });
                });
            });

            // $(document).ready(function() {
            //     $('#edataTable').DataTable({
            //         dom: 'ZBflrtip',
            //         buttons: [
            //             'copy', 'csv', 'excel', 'pdf', 'print'
            //         ],
            //         colResize: {
            //             exclude: []
            //         },
            //     });
            // });
        </script>



</body>

</html>