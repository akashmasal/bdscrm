<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Department Management</h4>
                        TODO : Akash (Add/Update/Delete/Listing)
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-6">
                    <div class="card-box">
                        <p><?php echo $this->session->flashdata("error");?></p>

                        <form action="<?php echo base_url('master/submit_departments'); ?>" method="post">
                            <div class="form-group">
                                <label>Department Name</label>
                                <input type="text" name="department_name" class="form-control" placeholder="Enter Name..." required="">
                            </div>


                            <div class="form-group">
                                <label>Sort Name</label>
                                <input type="text" name="sort_name" class="form-control" placeholder="Enter Sort Name.." required="">
                            </div>

                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>

                        </form>
                    </div>
                    <!-- end card-box -->
                </div>
                <!-- end col -->

                <div class="col-lg-6">
                    <div class="card-box">

                        <table id="datatable" class="table table-striped table-bordered dt-responsive " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr</th>
                                    <th>Department</th>
                                    <th>Action</th>

                                </tr>
                            </thead>

                            <?php
                            if (!empty($getAllDepartments)) {
                                foreach ($getAllDepartments as $value) {
                            ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $value['id']?></td>
                                            <td><?php echo $value['dept_name']?></td>
                                            <td><i class="fa-solid fa-pen-to-square"></i>&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-trash"></i></td>

                                        </tr>
                                    </tbody>
                                <?php
                                }
                            } 

                            ?>

                            
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>





</div>