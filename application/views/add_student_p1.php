<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

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

    <?php
    // Check if the message parameter is set in the URL
    // $message = $this->input->get('message');
    // if ($message == 'exists') {
    //     // JavaScript to reload the page and show the alert after a delay
    //     echo '<script>
    //         setTimeout(function() {
    //             location.reload();
    //             alert("This student ID already exists.");
    //         }, 600); // Adjust the delay time in milliseconds
    //     </script>';
    // }
    ?>
    <!-- Your remaining HTML content goes here -->





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
                                            <h4 class="modal-title">Add Student</h4>
                                        </div>

                                        <!-- Modal Body -->
                                        <div class="modal-body">
                                            <form action="<?= base_url('index.php/student/add_student'); ?>" method="post">
                                                <div class="mb-3">
                                                    <label class="form-label">Select Course</label>
                                                    <select class="form-control" name="student_course" id="student_course">
                                                        <?php foreach ($course as $data) : ?>
                                                            <option value="<?= $data['course_name']; ?>"><?= $data['course_name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3" id="coursefees">
                                                    <label class="form-label">Course Fees</label>
                                                    <input type="number" name="coursefees" id="courseFeesInput" class="form-control" placeholder="Course fees" readonly required>
                                                </div>
                                                <label class="form-label">Select Batch</label>
                                                <div class="mb-3" id="batchDetails">

                                                </div>


                                                <!-- NAME -->
                                                <div class="md-3" style="padding-bottom: 16px;">
                                                    <label class="form-label">Student Id:</label><br>
                                                    <input type="number" class="form-control" name="studentid" id="studentid" placeholder="Enter Student Id">
                                                </div>


                                                <!-- NAME -->
                                                <div class="md-3" style="padding-bottom: 16px;">
                                                    <label class="form-label">Name:</label><br>
                                                    <input type="text" class="form-control" name="studentname" id="studentname" placeholder="Enter Name" required>
                                                </div>

                                                <!-- FATHER'S NAME -->
                                                <div class="md-3" style="padding-bottom: 16px;">
                                                    <label class="form-label">Father's Name:</label><br>
                                                    <input type="text" class="form-control" name="studentfathersname" id="studentfathersname" placeholder="Enter Father's Name" required>
                                                </div>

                                                <!-- DOB/Age calculation -->
                                                <div class="md-3" style="padding-bottom: 16px;">
                                                    <label class="form-label">DOB:</label><br>
                                                    <input type="date" class="form-control" name="studentdob" id="studentdob" placeholder="Enter Date of Birth" required>
                                                </div>

                                                <!-- ACADEMIC -->
                                                <div class="md-3" style="padding-bottom: 16px;">
                                                    <label class="form-label">Academic:</label><br>
                                                    <input type="text" class="form-control" name="studentacademic" id="studentacademic" placeholder="Enter Academic Details" required>
                                                </div>

                                                <!-- MOBILE -->
                                                <div class="md-3" style="padding-bottom: 16px;">
                                                    <label class="form-label">Mobile:</label><br>
                                                    <input type="number" class="form-control" name="studentmobile" id="studentmobile" placeholder="Enter Mobile Number" required>
                                                    <span id="mobileStatus" style="color: red;"></span>
                                                </div>

                                                <!-- EMAIL -->
                                                <div class="md-3" style="padding-bottom: 16px;">
                                                    <label class="form-label">Email:</label><br>
                                                    <input type="text" class="form-control" name="studentemail" id="studentemail" placeholder="Enter Email Address" required>
                                                    <span id="mailStatus" style="color: red;"></span>
                                                </div>

                                                <!-- FEES OFFERED -->
                                                <!-- <div class="md-3" style="display: none; padding-bottom: 16px;">
                                                    <label class="form-label">Fees Offered:</label><br>
                                                    <input type="text" class="form-control" name="studentfeesoffered" id="studentfeesoffered" placeholder="Enter Offered Fees">
                                                </div> -->

                                                <!-- FEES FINAL----------------------------- -->
                                                <div class="md-3" style="padding-bottom: 16px;">
                                                    <label class="form-label">Fees Final:</label><br>
                                                    <input type="number" class="form-control" name="studentfeesfinal" id="studentfeesfinal" placeholder="Enter Final Fees" required>
                                                </div>

                                                <!-- TOKEN PAID -->
                                                <div class="md-3" style="padding-bottom: 16px;">
                                                    <label class="form-label">Token Paid:</label><br>
                                                    <input type="number" class="form-control" name="studenttokenpaid" id="studenttokenpaid" placeholder="Enter Token Paid" required>
                                                </div>

                                                <!-- REFERRAL IF ANY -->
                                                <div class="md-3" style="padding-bottom: 16px;">
                                                    <label class="form-label">Referral (if any):</label><br>
                                                    <input type="text" class="form-control" name="studentreferral" id="studentreferral" placeholder="Enter Referral Information">
                                                </div>

                                                <!-- DATE OF PAYMENT -->
                                                <div class="md-3" style="display: none; padding-bottom: 16px;">
                                                    <label class="form-label">Date of Payment:</label><br>
                                                    <input type="date" class="form-control" name="studentdateofpayment" id="studentdateofpayment" placeholder="Enter Date of Payment">
                                                </div>


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



                                                <!-- INSTALMENT -->
                                                <!-- <div class="md-3" style="display: none; padding-bottom: 16px;">
                                                    <label class="form-label">Instalment:</label><br>
                                                    <input type="text" class="form-control" name="studentinstalment" id="studentinstalment" placeholder="Enter Instalment Details">
                                                </div> -->

                                                <!-- AMOUNT DUE -->
                                                <!-- <div class="md-3" style="padding-bottom: 16px;">
                                                    <label class="form-label">Amount Due:</label><br>
                                                    <input type="text" class="form-control" name="studentamountdue" id="studentamountdue" placeholder="Enter Amount Due">
                                                </div> -->

                                                <div class="text-center" id="addStudentForm">
                                                    <button type="submit" class="btn btn-primary">Add Course</button>
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
    <?php
    // echo '<pre>';
    // print_r($course); 
    ?>













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
        // Assuming you have a variable containing the batch array
        var batchData = <?php echo json_encode($all_batch); ?>;
        var batchDetailsArray = [];
        var courseFeesInput = $("#courseFeesInput"); // Reference to the course fees input

        // Assuming you have a variable containing course fees data
        var courseFeesData = <?php echo json_encode($course); ?>;

        // Function to filter and sort batch data based on selected course
        function filterAndSortBatchData(selectedCourse) {
            // Clear previous batch details
            $("#batchDetails").html('');
            courseFeesInput.val('');

            // Create a new dropdown
            var batchDropdown = '<select class="form-control" id="batchDropdown" name="student_batch">';

            // Filter batch data based on whether the selected course is present in the comma-separated string
            var filteredBatch = Object.keys(batchData).filter(function(batchKey) {
                var courseString = batchData[batchKey][1];
                return courseString.includes(selectedCourse);
            }).map(function(batchKey) {
                return batchData[batchKey];
            });

            // Sort the filtered batch array based on the date (modify the sorting criteria as needed)
            filteredBatch.sort(function(a, b) {
                // Assuming the date is at index 2 in each batch array
                var dateA = new Date(a[2]);
                var dateB = new Date(b[2]);
                return dateA - dateB;
            });

            // Display filtered and sorted batch details
            filteredBatch.forEach(function(batch) {
                // var batchDetails = '<p>Batch Name: ' + batch[0] + '</p>' +
                //     '<p>Course: ' + batch[1] + '</p>' +
                //     '<p>Date: ' + batch[2] + '</p>' +
                //     '<p>Start Time: ' + batch[3] + '</p>' +
                //     '<p>End Time: ' + batch[4] + '</p>';
                // $("#batchDetails").append('<div class="mb-3">' + batchDetails + '</div>');

                // Add batch name to the dropdown
                batchDropdown += '<option value="' + batch[0] + '">' + batch[0] + ' (' + batch[3] + ' - ' + batch[4] + ')</option>';

                batchDetailsArray.push({
                    'Batch Name': batch[0],
                    'Course': batch[1],
                    'Date': batch[2],
                    'Start Time': batch[3],
                    'End Time': batch[4]
                });
            });


            // Close the dropdown
            batchDropdown += '</select>';
            $("#batchDetails").append(batchDropdown);

            var selectedCourseFees = getCourseFees(selectedCourse);

            // Update course fees input
            courseFeesInput.val(selectedCourseFees !== null ? selectedCourseFees : '');


            console.log(batchDetailsArray);
        }

        function getCourseFees(courseName) {
            var selectedCourse = courseFeesData.find(function(course) {
                return course.course_name === courseName;
            });

            return selectedCourse ? selectedCourse.course_fees : null;
        }

        // Attach change event to the course dropdown
        $("#student_course").change(function() {
            var selectedCourse = $(this).val();
            // Call the function to filter and sort batch data based on selected course
            filterAndSortBatchData(selectedCourse);



        });

        // Initial call to display filtered and sorted batch details for the default selected course
        var initialSelectedCourse = $("#student_course").val();
        filterAndSortBatchData(initialSelectedCourse);








        $("#addStudentForm").submit(function(event) {
            // Prevent the default form submission
            event.preventDefault();

            // Retrieve selected course, batch, and fees
            var selectedCourse = $("#student_course").val();
            var selectedBatch = $("#batchDropdown").val();
            var selectedCourseFees = $("#courseFeesInput").val();

            // Create an object with the form data
            var formData = {
                selected_course: selectedCourse,
                selected_batch: selectedBatch,
                selected_course_fees: selectedCourseFees
                // Add other form data fields as needed
            };

            // Send the form data to the desired controller using AJAX
            $.ajax({
                type: "POST",
                url: "<?= base_url('index.php/student/Addstudent-2'); ?>",
                data: formData,
                success: function(response) {
                    // Redirect to the next page upon success
                    window.location.href = "<?= base_url('admin/student-2'); ?>";
                },
                error: function(error) {
                    // Handle the error, if any
                    console.error(error);
                }
            });
        });




        //Mobile No check
        $(document).ready(function() {

            // Attach change event to the mobile number input
            $("#studentmobile").on('change', function() {
                // Get the entered mobile number
                var mobileNumber = $(this).val();

                // Make an AJAX request to check the mobile number
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('index.php/student/mbcheck'); ?>",
                    data: {
                        mobileNumber: mobileNumber
                    },
                    success: function(response) {
                        // Update UI based on the response
                        if (response.exists) {
                            $("#mobileStatus").html("This number already exists. You can change or proceed with this number");
                        } else {
                            $("#mobileStatus").html("");
                        }
                    },
                    error: function(error) {
                        // Handle the error, if any
                        console.error(error);
                    }
                });
            });
        });

        $(document).ready(function() {

            // Attach change event to the mobile number input
            $("#studentemail").on('change', function() {
                // Get the entered mobile number
                var mail = $(this).val();

                // Make an AJAX request to check the mobile number
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('index.php/student/mailcheck'); ?>",
                    data: {
                        mail: mail
                    },
                    success: function(response) {
                        // Update UI based on the response
                        if (response.exists) {
                            $("#mailStatus").html("This Mail ID already exists. You can change or proceed with this Mail ID");
                        } else {
                            $("#mailStatus").html("");
                        }
                    },
                    error: function(error) {
                        // Handle the error, if any
                        console.error(error);
                    }
                });
            });
        });
    </script>




</body>

</html>