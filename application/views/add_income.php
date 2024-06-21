<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Sheet</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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

<body>






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


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
                        <div class="card-body">


                            <!-- Add Task Modal -->
                            <div id="addTaskModal" class="" style="display: block; width: 100%;">
                                <div class="">
                                    <div class="">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Income</h4>
                                        </div>

                                        <!-- Modal Body -->
                                        <div class="modal-body">
                                            <form action="<?= base_url('index.php/income/add_income'); ?>" method="post">
                                                <div class="mb-3">
                                                    <label class="form-label">Select Income Category:</label><br>
                                                    <select class="form-control" name="budgetType" id="budgetType">
                                                        <?php
                                                        $options = explode(',', $income_category[0]['options_list']);
                                                        foreach ($options as $option) : ?>
                                                            <option value="<?php echo trim($option); ?>"><?php echo trim($option); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <h5>or</h5>
                                                <div class="md-3" style="padding-bottom: 16px;">
                                                    <label class="form-label">Add Income Category:</label><br>
                                                    <input type="text" class="form-control" name="custom_category" id="custom_category" placeholder="Add Category">
                                                </div>

                                                <div class="mb-3" style="display: none;">
                                                    <label class="form-label">prev option list:</label>
                                                    <input type="text" name="prevCategory" id="prevCategory" class="form-control" readonly value="<?php echo $income_category[0]['options_list']; ?>">
                                                </div>
                                                <input style="display: none;" type="text" id="final_expension_category" readonly required>
                                                <!-- <div id="add_custom_category" style="display: none;"><input type="text"> <button>Add</button></div> -->
                                                <div class="mb-3">
                                                    <label for="budgetName" class="form-label">Income Name:</label>
                                                    <input type="text" name="budgetName" class="form-control" placeholder="Income Name" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="budgetRemarks" class="form-label">Income Remarks:</label>
                                                    <textarea name="budgetRemarks" class="form-control" placeholder="Income Remarks" required></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="budgetAmount" class="form-label">Income Amount:</label>
                                                    <input type="number" name="budgetAmount" class="form-control" placeholder="" required></textarea>
                                                </div>
                                                <!-- <input style="display: none" type="test" name="assigned_to_employees" id="assigned_to_employees" class="form-control" required> -->
                                                <!-- <input style="display: none;" type="text" name="assigned_by" value="<?php echo $this->session->user_id; ?>" class="form-control" required> -->
                                                <div class="mb-3">
                                                    <label for="budgetDate" class="form-label">Date:</label>
                                                    <input type="date" name="budgetDate" class="form-control" required>
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary">Add Budget</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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













    <!-- 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> -->

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
        var flag_category_check = 0; //to check the change of the category
        document.getElementById("budgetType").onchange = function() {
            var selectedOption = this.value;
            flag_category_check = 0;
            console.log(flag_category_check);
            document.getElementById("final_expension_category").value = selectedOption;

        };

        function checkCategory() {
            var customCategory = document.getElementById("custom_category").value.trim();
            var dropdown = document.getElementById("budgetType");
            var options = dropdown.options;
            var finalExpensionCategory = document.getElementById("final_expension_category");

            for (var i = 0; i < options.length; i++) {
                if (options[i].value.trim() === customCategory) {
                    flag_category_check = 0;
                    finalExpensionCategory.value = customCategory;
                    // alert("Category already exists in the dropdown menu!");
                    return;
                }
            }
            // If the category is not found in the dropdown
            flag_category_check = 1;
            finalExpensionCategory.value = customCategory;
            // alert("Category is not present in the dropdown menu.");
            console.log(flag_category_check);
        }
        document.getElementById("custom_category").onchange = function() {
            checkCategory();
        };
    </script>

</body>

</html>