<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>task-<?php echo $sheet['id']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Custom fonts for this template -->
    <link href="<?= base_url('assets/library/fontawesome-free/css/all.min.css" rel="stylesheet') ?>" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/library/stint/  /css2.css" rel="stylesheet') ?>" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets/library/datatables/dataTables.bootstrap4.min.css" rel="stylesheet') ?>" rel="stylesheet">
    <style>
        /* ::-webkit-scrollbar {
            display: none;
        } */

        * {
            box-sizing: border-box;
        }

        a {
            text-decoration: none;
            color: #379937;
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

<body style="background-color: #cfd2d5;">

    <?php
    //to get the assigned_to data
    // $userId_of_assigned_member = $sheet['assigned_to'];
    // $assignedToArray = explode(',', $userId_of_assigned_member);
    // $assignedToArray = array_map('trim', $assignedToArray);
    // $query = $this->db->where_in('id', $assignedToArray)->get('users');
    // $result_member = $query->result_array();

    // //to get the assigned_by data
    // $userId_of_main = $sheet['assigned_by'];
    // $query = $this->db->get_where('users', array('id' => $userId_of_main));
    // $result_main = $query->row();
    ?>



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


                            <!-- edit Task Modal -->
                            <div id="editTaskModal " class="" style="display: block; width: 100%;">
                                <div class="">
                                    <div class="">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Sheet</h4>
                                            <!-- <a href="javascript:history.go(-1)"><button type="button" class="close" data-dismiss="modal">&times;</button></a> -->
                                        </div>

                                        <!-- Modal Body -->
                                        <div style="width: 100%;" class="modal-body">
                                            <form action="<?= base_url('index.php/task/updateTask/' . $sheet['id']) ?>" method="post">
                                                <div class="mb-3">
                                                    <label for="edittitle" class="form-label">Title:</label>
                                                    <input type="text" id="edittitle" name="edittitle" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="editdescription" class="form-label">Description:</label>
                                                    <textarea id="editdescription" name="editdescription" class="form-control" required></textarea>
                                                </div>
                                                <label for="assigned_to" class="form-label">Assign To:</label>
                                                <div class="dropdown" data-control="checkbox-dropdown">
                                                    <label class="dropdown-label">Select</label>

                                                    <div class="dropdown-list">
                                                        <a href="#" data-toggle="check-all" class="dropdown-option">
                                                            Check All
                                                        </a>


                                                        <?php if ($this->session->role == 'admin') { ?>
                                                            <label class="dropdown-heading">MANAGERS</label>
                                                        <?php } else {
                                                        } ?>
                                                        <?php
                                                        if ($this->session->role == 'admin') {
                                                            $drop_down = $manager_employees;
                                                        } else if ($this->session->role == 'manager') {
                                                            $drop_down = $all_employees;
                                                        }

                                                        foreach ($drop_down as $member) : ?>
                                                            <?php if ($member['role'] === 'manager' && $member['user_type'] == '1') : ?>
                                                                <label class="dropdown-option">
                                                                    <input type="checkbox" name="dropdown-group" value="<?= $member['id']; ?>" />
                                                                    <?= $member['name'] . ' (' . $member['username'] . ')'; ?>
                                                                </label>
                                                            <?php endif; ?>
                                                            <!-- to fetch the employee data first -->
                                                        <?php endforeach; ?>
                                                        <label class="dropdown-heading">EMPLOYEES</label>
                                                        <?php foreach ($drop_down as $member) : ?>
                                                            <?php if ($member['role'] === 'employee' && $member['user_type'] == '1') : ?>
                                                                <label class="dropdown-option">
                                                                    <input type="checkbox" name="dropdown-group" value="<?= $member['id']; ?>" />
                                                                    <?= $member['name'] . ' (' . $member['username'] . ')'; ?>
                                                                </label>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editsheet_link" class="form-label">Sheet Link:</label>
                                                    <input id="editsheet_link" type="link" name="editsheet_link" class="form-control" required>
                                                </div>
                                                <!-- <div class="mb-3" style="display: none;">
                            <label for="sheet_link" class="form-label">Assigned by:</label>
                            <input type="text" name="assigned_by" value="<?php echo $user_id; ?>" class="form-control" required>
                        </div> -->
                                                <!-- to check the value of the selected Employees -->
                                                <input style="display: none;" type="text" value="<?php echo $sheet["assigned_to"]; ?>" name="prevassigned_to" id="prevassigned_to" class="form-control" required>
                                                <input style="display: none;" value="<?php echo $sheet["assigned_to"]; ?>" type="text" name="assigned_to_employees" id="assigned_to_employees" class="form-control">
                                                <input style="display: none;" type="text" name="editassigned_to" id="editassigned_to" class="form-control" required>


                                                <div class="mb-3">
                                                    <label for="editdeadline" class="form-label">Deadline:</label>
                                                    <input id="editdeadline" type="date" name="editdeadline" class="form-control" required>
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary">Edit Task</button>
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
        var title = '<?php echo $sheet["title"]; ?>';
        var description = '<?php echo $sheet["description"]; ?>';
        var link = '<?php echo $sheet["link"]; ?>';
        var assigned_by_id = '<?php echo $sheet["assigned_by"]; ?>';
        var assigned_to_id = '<?php echo $sheet["assigned_to"]; ?>';
        var deadline = '<?php echo $sheet["deadline"]; ?>';

        document.getElementById("edittitle").value = title;
        document.getElementById("editdescription").value = description;
        document.getElementById("editsheet_link").value = link;
        document.getElementById("editdeadline").value = deadline;
        // document.getElementById("assigned_to_employees").value = <?php echo $sheet["assigned_to"] ?>



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


                this.updateCheckboxDropdown = function(selectedValues) {
                    // Get all checkboxes inside the dropdown
                    var checkboxes = this.$el.find('[type="checkbox"]');

                    // Uncheck all checkboxes
                    checkboxes.prop('checked', false);

                    // Check the checkboxes based on selected values
                    selectedValues.forEach(function(value) {
                        checkboxes.filter('[value="' + value + '"]').prop('checked', true);
                    });

                    // Manually trigger the updateStatus function
                    this.updateStatus();
                };
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
                // storing the value in the input field assigned_to_employees(hidden)
                document.getElementById("assigned_to_employees").value = target_employee;


                //to set the values of the employee in dropdown with the update in the edit page
                var assignedToEmployees = document.getElementById('assigned_to_employees').value;
                var prevAssignedTo = document.getElementById('prevassigned_to').value;
                var editAssignedTo = document.getElementById('editassigned_to');

                // Set the value of editassigned_to based on the condition
                editAssignedTo.value = assignedToEmployees !== '' ? assignedToEmployees : prevAssignedTo;
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

            document.addEventListener('DOMContentLoaded', function() {
                // Initialize an array to store selected values
                var selectedValues = [];

                // Get all checkboxes inside the dropdown container
                var checkboxes = document.querySelectorAll('.dropdown [type="checkbox"]');

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

                        // Log the array of selected values
                        console.log('Selected Values:', selectedValues);

                        // Update the assigned_to_id variable with the selected values
                        assigned_to_id = selectedValues.join(',');

                        // Update the dropdown to reflect the selected values
                        checkboxesDropdown.updateCheckboxDropdown(selectedValues);


                    });

                    // Check the checkboxes based on the values in the array
                    if (assigned_to_id.includes(checkbox.value)) {
                        checkbox.checked = true;
                    }






                });
            });




        })(jQuery);
    </script>
</body>

</html>