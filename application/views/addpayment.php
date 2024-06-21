<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course Payment</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">


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
                                <div id="bootstrapToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                                    <div class="d-flex">
                                        <div class="toast-body" id="bootstrapToastBody"></div>
                                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Payment</h4>
                                        </div>

                                        <!-- Modal Body -->
                                        <div class="modal-body">
                                            <form method="post" action="<?php echo base_url('index.php/student/add_payment_money'); ?>">
                                                <label class="form-lebel" for="searchTerm">Search Student:</label>
                                                <input class="form-control" type="text" name="searchTerm" id="searchTerm" placeholder="S ID or NAME or EMAIL or MOBILE" />

                                                <br />

                                                <label class="form-lebel" for="foundedStudentsDropdown">Select Student:</label>
                                                <select class="form-control" name="foundedStudentsDropdown" id="foundedStudentsDropdown" required></select>

                                                <br />

                                                <!-- Input fields for fees final and due -->
                                                <label class="form-lebel" for="feesFinal">Final Fees:</label>
                                                <input class="form-control" type="text" name="feesFinal" id="feesFinal" required readonly/>

                                                <br />

                                                <label class="form-lebel" for="feesPaid">Fees Paid:</label>
                                                <input class="form-control" type="text" name="feesPaid" id="feesPaid" required readonly/>

                                                <br />

                                                <label class="form-lebel" for="feesDue">Fees Due:</label>
                                                <input class="form-control" type="text" name="feesDue" id="feesDue" required readonly/>

                                                <br />

                                                <label class="form-lebel" for="currentPayment">Payment Amount:</label>
                                                <input class="form-control" type="number" name="currentPayment" id="currentPayment" required />
                                                <br />

                                                <div class="mb-3">
                                                    <label class="form-label">Payment Method</label>
                                                    <select class="form-control" name="payment_method" id="payment_method">
                                                        <?php
                                                        $options = explode(',', $payment_method[0]['options_list']); // Remove [0] indexing if not needed
                                                        foreach ($options as $option) : ?>
                                                            <option value="<?php echo trim($option); ?>"><?php echo trim($option); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>


                                                <div class="text-center" id="addStudentForm">
                                                    <button type="submit" class="btn btn-primary">ADD PAYMENT</button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#searchTerm').on('input', function() {
                // Get the search term
                var searchTerm = $(this).val();

                // Send an AJAX request to get student details
                $.ajax({
                    url: '<?php echo base_url("index.php/student/getStudentDetails"); ?>',
                    type: 'POST',
                    data: {
                        searchTerm: searchTerm
                    },
                    success: function(response) {
                        // Handle the response if needed
                        console.log(response);
                        var foundedStudents = JSON.parse(response);
                        updateFoundedStudentsDropdown(foundedStudents);
                    }
                });
            });

            function updateFoundedStudentsDropdown(foundedStudents) {
                // Clear existing options
                $('#foundedStudentsDropdown').empty();

                // Add new options
                $.each(foundedStudents, function(index, student) {
                    $('#foundedStudentsDropdown').append('<option value="' + student.student_id + '">' + student.student_name + ' - ' + student.student_id + ' - ' + student.student_email + ' - ' + student.student_mobile + '</option>');
                });

                $('#foundedStudentsDropdown').click(function() {
                    // Get the selected student object
                    var selectedStudent = foundedStudents.find(student => student.student_id == $(this).val());
                    console.log(selectedStudent);
                    // Update the fees fields using the selected student object
                    $('#feesFinal').val(selectedStudent.student_fees_final);
                    $('#feesDue').val(selectedStudent.total_due);
                    $('#feesPaid').val(selectedStudent.total_paid);
                });
            }
        });


        // Check if there is a flashdata with the key 'success'
        var successMessage = "<?php echo $this->session->flashdata('success'); ?>";

        // If 'success' flashdata exists, display the Toastr toast
        if (successMessage !== "") {
            var toast = new bootstrap.Toast(document.getElementById('bootstrapToast'));

            // Set the toast message
            document.getElementById('bootstrapToastBody').innerText = successMessage;

            // Show the toast
            toast.show();
        }
    </script>

</body>

</html>