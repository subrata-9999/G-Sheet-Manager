<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $username; ?></title>

    <!-- Custom fonts for this template -->
    <link href="<?= base_url('assets/library/fontawesome-free/css/all.min.css" rel="stylesheet') ?>" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/library/stint/style/css2.css" rel="stylesheet') ?>" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets/library/datatables/dataTables.bootstrap4.min.css" rel="stylesheet') ?>" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

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


    <!-- Add Task Modal -->

    <?php
    // to fetch all users from users table whose role is employee(for showing in the add task dropdown)
    $query = $this->db->select('id, username, name')
        ->where('role', 'employee')
        ->get('users');
    $all_employees = $query->result_array();
    ?>
    <div id="addTaskModal" class="modal" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Task</h4>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeAddTaskModal()">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?= base_url('index.php/manager/addTask'); ?>" method="post">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <textarea name="description" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="sheet_link" class="form-label">Sheet Link:</label>
                            <input type="link" name="sheet_link" class="form-control" required>
                        </div>
                        <div class="mb-3" style="display: none;">
                            <label for="sheet_link" class="form-label">Assigned by:</label>
                            <input type="text" name="assigned_by" value="<?php echo $user_id; ?>" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="deadline" class="form-label">Deadline:</label>
                            <input type="date" name="deadline" class="form-control" required>
                        </div>
                        <label for="assigned_to" class="form-label">Assign To:</label>
                        <div class="dropdown" data-control="checkbox-dropdown">
                            <label class="dropdown-label">Select</label>

                            <div class="dropdown-list">
                                <a href="#" data-toggle="check-all" class="dropdown-option">
                                    Check All
                                </a>

                                <?php foreach ($all_employees as $employee) : ?>
                                    <!-- <label class="dropdown-option">
                                        <input type="checkbox" name="dropdown-group" value="<?= $employee['id']; ?>" />
                                        <?= $employee['username']; ?>
                                    </label> -->

                                    <label class="dropdown-option">
                                        <input type="checkbox" name="dropdown-group" value="<?= $employee['id']; ?>" />
                                        <?= $employee['name'] . ' (' . $employee['username'] . ')'; ?>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <input style="display: none;" type="test" name="assigned_to_employees" id="assigned_to_employees" class="form-control" required>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Add Task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?php echo $user_designation; ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Assigned Sheets To Employee -->
            <li id="showSheetsOfEmployee" class="nav-item">
                <a class="nav-link" href="#">
                    <span>Assigned Sheets Of Employees</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li id="showSheetsOfManager" class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <span>Assigned Sheets To You</span>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Pages Collapse Menu -->
            <li onclick="openAddTaskModal()" class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <span>Add Sheet To Employee</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
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


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name; ?></span>
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

                <?php
                // to fetch all users from users table whose role is employee(for showing in the add task dropdown)
                $query = $this->db->select('id, username, name')
                    ->where('role', 'employee')
                    ->get('users');
                $all_employees = $query->result_array();
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tasks</h6>
                        </div>
                        <div class="card-body">
                            <div id="assigned_by_you" class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Sheet Link</th>
                                            <th>Assigned Date & Time</th>
                                            <th>Deadline</th>
                                            <th>Assigned To</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Sheet Link</th>
                                            <th>Assigned Date & Time</th>
                                            <th>Deadline</th>
                                            <th>Assigned To</th>
                                            <th>Control</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $reversedTasks = array_reverse($tasks); ?>
                                        <?php foreach ($reversedTasks as $task) : ?>
                                            <?php
                                            //to get the assigned_to data
                                            $userId_of_assigned_employee = $task['assigned_to'];
                                            $assignedToArray = explode(',', $userId_of_assigned_employee);
                                            $assignedToArray = array_map('trim', $assignedToArray);
                                            $query = $this->db->where_in('id', $assignedToArray)->get('users');
                                            $results = $query->result_array();
                                            ?>
                                            <tr>
                                                <td><a href="<?= base_url('index.php/task/' . $task['id']) ?>"><?= $task['title']; ?></a></td>
                                                <td><?= $task['description']; ?></td>
                                                <td><a href="<?= $task['link']; ?>" target="_blank">Sheet Link</a></td>
                                                <td><?= time_ago($task['assigned_date']) . '<br>' . date('jS F Y', strtotime($task['assigned_date'])); ?><br>
                                                <?= date('g:i a', strtotime($task['assigned_date'])); ?></td>
                                                <td><?= $task['deadline']; ?></td>
                                                <td><?php foreach ($results as $employee) {
                                                        echo $employee['username'] . '<br>';
                                                    } ?></td>
                                                <td><a href="<?= base_url('index.php/manager/edit/' . $task['id']) ?>" class="btn btn-primary" onclick="editModalTask(<?= $task['id'] ?>)">Edit</a>
                                                    <a href="#" class="btn btn-danger" onclick="confirmDelete(<?= $task['id']; ?>)">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>


                            <div id="assigned_to_you" class="table-responsive" style="display: none;">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Sheet Link</th>
                                            <th>Assigned Date & Time</th>
                                            <th>Deadline</th>
                                            <th>Assigned To</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Sheet Link</th>
                                            <th>Assigned Date & Time</th>
                                            <th>Deadline</th>
                                            <th>Assigned To</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $reversedTasks = array_reverse($tasks_to_you); ?>
                                        <?php foreach ($reversedTasks as $task) : ?>
                                            <?php
                                            //to get the assigned_to data
                                            $userId_of_assigned_admin = $task['assigned_to'];
                                            $assignedToArray = explode(',', $userId_of_assigned_admin);
                                            $assignedToArray = array_map('trim', $assignedToArray);
                                            $query = $this->db->where_in('id', $assignedToArray)->get('users');
                                            $results = $query->result_array();

                                            //to get the username of admin(assigned_by)
                                            $userId_of_manager = $task['assigned_by'];
                                            $query = $this->db->get_where('users', array('id' => $userId_of_manager));
                                            $result_admin_name = $query->row();
                                            ?>
                                            <tr>
                                                <td><a href="<?= base_url('index.php/task/' . $task['id']) ?>"><?= $task['title']; ?></a></td>
                                                <td><?= $task['description']; ?></td>
                                                <td><a href="<?php echo $task['link']; ?>" target="_blank">Sheet Link</a></td>
                                                <td><?= time_ago($task['assigned_date']) . '<br>' . date('jS F Y', strtotime($task['assigned_date'])); ?><br>
                                                <?= date('g:i a', strtotime($task['assigned_date'])); ?></td>
                                                <!-- <td><?= $task['assigned_date'] ?></td> -->
                                                <td><?= $result_admin_name->username; ?></td>
                                                <td><?= $task['deadline']; ?></td>
                                            </tr>
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
                        <span>Task Management System</span>
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
        var showAssignedByYouSheets = document.getElementById("assigned_by_you");
        var showAssignedToYouSheets = document.getElementById("assigned_to_you");
        document.getElementById("showSheetsOfEmployee").addEventListener("click", function() {
            showAssignedToYouSheets.style.display = "none";
            showAssignedByYouSheets.style.display = "block";

        });
        document.getElementById("showSheetsOfManager").addEventListener("click", function() {
            showAssignedByYouSheets.style.display = "none";
            showAssignedToYouSheets.style.display = "block";



        });


        function openAddTaskModal() {
            $('#addTaskModal').modal('show');
        }

        function closeAddTaskModal() {
            $('#addTaskModal').modal('hide');
        }


        (function($) {
            var CheckboxDropdown = function(el) {
                var _this = this;
                this.isOpen = false;
                this.areAllChecked = false;
                this.$el = $(el);
                this.$label = this.$el.find('.dropdown-label');
                this.$checkAll = this.$el.find('[data-toggle="check-all"]').first();
                this.$inputs = this.$el.find('[type="checkbox"]');
                this.selectedValues = ''; // New property to store selected values as a comma-separated string

                this.onCheckBox();

                this.$label.on('click', function(e) {
                    e.preventDefault();
                    _this.toggleOpen();
                });

                this.$checkAll.on('click', function(e) {
                    e.preventDefault();
                    _this.onCheckAll();
                });

                this.$inputs.on('change', function(e) {
                    _this.onCheckBox();
                });
            };

            CheckboxDropdown.prototype.onCheckBox = function() {
                this.updateStatus();
            };
            //to store the assigned employees data in string with the response of manager
            CheckboxDropdown.prototype.updateStatus = function() {
                var checked = this.$el.find(':checked');

                this.areAllChecked = false;
                this.$checkAll.html('Check All');

                if (checked.length <= 0) {
                    this.$label.html('Select Options');
                    this.selectedValues = '';
                } else if (checked.length === 1) {
                    this.$label.html(checked.parent('label').text());
                    this.selectedValues = checked.val();
                } else if (checked.length === this.$inputs.length) {
                    this.$label.html('All Selected');
                    this.areAllChecked = true;
                    this.$checkAll.html('Uncheck All');
                    this.selectedValues = this.$inputs.map(function() {
                        return this.value;
                    }).get().join(',');
                } else {
                    this.$label.html(checked.length + ' Selected');
                    this.selectedValues = checked.map(function() {
                        return this.value;
                    }).get().join(',');
                }
                var target_employee = this.selectedValues;
                // Log the string of selected values
                console.log('Selected Values:', target_employee);
                //storing the value in the input field assigned_to_employees(hidden)
                document.getElementById("assigned_to_employees").value = target_employee;
            };

            CheckboxDropdown.prototype.onCheckAll = function(checkAll) {
                if (!this.areAllChecked || checkAll) {
                    this.areAllChecked = true;
                    this.$checkAll.html('Uncheck All');
                    this.$inputs.prop('checked', true);
                } else {
                    this.areAllChecked = false;
                    this.$checkAll.html('Check All');
                    this.$inputs.prop('checked', false);
                }

                this.updateStatus();
            };

            CheckboxDropdown.prototype.toggleOpen = function(forceOpen) {
                var _this = this;

                if (!this.isOpen || forceOpen) {
                    this.isOpen = true;
                    this.$el.addClass('on');
                    $(document).on('click', function(e) {
                        if (!$(e.target).closest('[data-control]').length) {
                            _this.toggleOpen();
                        }
                    });
                } else {
                    this.isOpen = false;
                    this.$el.removeClass('on');
                    $(document).off('click');
                }
            };

            var checkboxesDropdowns = document.querySelectorAll('[data-control="checkbox-dropdown"]');
            for (var i = 0, length = checkboxesDropdowns.length; i < length; i++) {
                new CheckboxDropdown(checkboxesDropdowns[i]);
            }

        })(jQuery);




        document.addEventListener('DOMContentLoaded', function() {
            // Initialize an array to store selected values
            var selectedValues = [];

            // Get all checkboxes inside the dropdown container
            var checkboxes = document.querySelectorAll('#dropdown-container input[type="checkbox"]');

            checkboxes.forEach(function(checkbox) {
                // Add click event listener to each checkbox
                checkbox.addEventListener('click', function() {
                    // Check if the checkbox is checked or unchecked
                    if (this.checked) {
                        // If checked, add the value to the array
                        selectedValues.push(this.value);
                    } else {
                        // If unchecked, remove the value from the array
                        var index = selectedValues.indexOf(this.value);
                        if (index !== -1) {
                            selectedValues.splice(index, 1);
                        }
                    }


                });
            });
        });


        function confirmDelete(taskId) {
            var confirmation = confirm("Are you sure you want to delete this task?");
            if (confirmation) {
                // If the user clicks "OK" in the confirmation dialog, redirect to the delete URL
                window.location.href = "<?= base_url('index.php/manager/deleteTask/'); ?>" + taskId;
            }
        }
    </script>

</body>

</html>