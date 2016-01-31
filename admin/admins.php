<?php 
 include './admin_includes/admin_head.php';
?>

            <div style="background:white; padding-top:85px; padding-bottom: 4px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-11 tile">
                            <div class="panel panel-default">
                                <!-- Default panel contents -->
                                <div class="panel-heading"><h3>Admins</h3></div>

                                <!-- Table -->
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">


                                                <table id="mytable" class="table table-bordred table-striped">
                                                  
                                                    <thead>
                                                    <th>Full Name</th>
                                                    <th>User Name</th>
                                                    <th>Email</th>
                                                    <th>Priviledge Level</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                    </thead>
                                                    <tbody>

<!--  =-------------------------------------------- query to select all admins-->
                                                    <?php 
                                                     $query = "SELECT * FROM cozdb_users";
                                                     $select_all_admins = mysqli_query($con, $query);
                                                     while($row = mysqli_fetch_assoc($select_all_admins)) {
                                                    ?>	
                                                        <tr>
                                                            <td><?php echo $row['fName']." ".$row['lName']; ?></td>
                                                            <td><?php echo $row['username']; ?></td>
                                                            <td><?php echo $row['email']; ?></td>
                                                            <td><?php echo "Level ".$row['priviledges']; ?></td>
<!--                                                            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><a href="id='<?php echo $row['id']; ?>'"><span class="glyphicon glyphicon-pencil"></span></a></button></p></td>-->
                                                            <td><?php echo $row['status']; ?></td>
                                                            <?php if($row['status']== "active"){ ?>
                                                            <td><p><button class="btn btn-danger btn-xs"><a href="?admin_block_id=<?php echo $row['id']; ?>"><span id="white">BLOCK</span></a></button></p></td>
                                                            <?php }else if($row['status']== "blocked"){ ?>
                                                            <td><p><button class="btn btn-warning btn-xs"><a href="?admin_unblock_id=<?php echo $row['id']; ?>"><span id="white">UNBLOCK</span></a></button></p></td>                                                          
                                                            <?php }else{ ?>
                                                            <td><p><button class="btn btn-success btn-xs"><a href="?admin_activate_id=<?php echo $row['id']; ?>"><span id="white">ACTIVATE</span></a></button></p></td>
                                                            <?php }?>
                                                            <td><a href="?admin_edit_id=<?php echo $row['id']; ?>"><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></td>     
                                                            <td><a href="?admin_delete_id=<?php echo $row['id']; ?>"><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></a></td> 
<!--                                                            <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>-->
                                                        </tr>
                                                        
                                                     <?php } ?>

                                                    </tbody>

                                                </table>

                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="background-color:#e1edf7; border-top: 3px solid #ccc; padding:5px 5px; display:<?php echo $admin_update_form;?>">
                                        <div class="col-sm-12 col-xs-12">
                                            <?php 
                                            $query = "SELECT * FROM cozdb_users WHERE id ='{$admin_edit_id}'";
                                            $admin_query = mysqli_query($con,$query);
                                            while ($row = mysqli_fetch_assoc($admin_query)) {
                                                $id = $row['id'];
                                                $fname = $row['fName'];
                                                $lname = $row['lName'];
                                                $username = $row['username'];
                                                $email = $row['email'];
                                                $status = $row['status'];
                                                $priviledges = $row['priviledges'];
                                            
                                            ?>
                                            <form method="post">
                                                <input class="textbox" type='text' name='update_fname' placeholder="first name" value="<?php echo $fname; ?>" />
                                               <input class="textbox" type='text' name='update_lname' placeholder="last name"  value="<?php echo $lname; ?>"/>
                                               <input class="textbox" type='text' name='update_username' placeholder="username"  value="<?php echo $username; ?>" />
                                               <input class="textbox" type='text' name='update_email' placeholder="email"  value="<?php echo $email; ?>" />
                                               <select name="update_admin-level" id="textbox">
                                                        <option value="0">Priviledge Level 0</option>
                                                        <option value="1">Priviledge Level 1</option>
                                                        <option value="2">Priviledge Level 2</option>
                                               </select>
<!--                                               <input type="button" class="btn  btn-sm btn-default"name="update_admin_details" value="UPDATE" />-->
                                               
                                               <button name="update_admin_btn" class="btn btn-default btn-sm">UPDATE</button>
                                           </form>
                                            <?php } ?>
                                        </div>
                                     </div>
                                </div>


                                <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                                <h4 class="modal-title custom_align" id="Heading">Edit Admin Details</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                <div class="form-group">
                                                    <label class="col-xs-3 control-label sr-only" for="username">User Name</label>
                                                    <input class="form-control " id="username" type="text" placeholder="isometric01" style="width:100%;">
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-xs-3 control-label sr-only" for="contact">Contact</label>
                                                    <input class="form-control " id="contact" type="text" placeholder="+923335586757" style="width:100%;">
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-xs-3 control-label sr-only" for="admin-level">Admin Level</label>
                                                    <select name="admin-level" id="admin-level" class="form-control">
                                                        <option value="0">Admin Level 0</option>
                                                        <option value="1" selected="selected">Admin Level 1</option>
                                                        <option value="2">Admin Level 2</option>
                                                        <option value="3">Admin Level 3</option>
                                                        <option value="4">Admin Level 4</option>
                                                    </select>
                                                </div>
                                                </form>
                                            </div>

                                            <div class="modal-footer ">
                                                <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content --> 
                                    </div>
                                    <!-- /.modal-dialog --> 
                                </div>



                                <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                                <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                                            </div>
                                            <div class="modal-body">

                                                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

                                            </div>
                                            <div class="modal-footer ">
                                                <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content --> 
                                    </div>
                                    <!-- /.modal-dialog --> 
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-11 tile">
                            <div class="panel panel-info">
                                <div class="panel-heading"><h5>Admins Level Info</h5></div>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat 
                                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."

                            </div>
                        </div>
                    </div>
                </div>
 
                <?php include './admin_includes/admin_footer.php'; ?>