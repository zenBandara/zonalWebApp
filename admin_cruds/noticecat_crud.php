<?php


require_once ($_SERVER['DOCUMENT_ROOT'].'/process/faqcat_process.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/php_action/db_connect_client.php');

if (!isset($_SESSION['userId'])) {
    header('HTTP/1.0 403 Forbidden');
    exit;
}
?>



<?php
if (isset($_SESSION['message'])) : ?>

    <div style="display:flex; top:30px;" class="alert alert-<?= $_SESSION['msg_type'] ?> fade show" role="alert">


        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<div class="container">
    <?php
    $result = $mysqli->query("SELECT * from notice_cat") or die($mysqli->error);
    //pre_r($result);
    //pre_r($result->fetch_assoc());
    //pre_r($result->fetch_assoc());
    ?>
    <div class="breadtop">
        <!-- Trigger the modal with a button -->


        <table id="tbl" class="table table-bordered table-hover" style=" width: 100%; ">
            <thead>
                <tr>
                    <th>Notice category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['category']; ?></td>

                        <td style="text-align: center; width: 10%; padding:0.8em;">

                            <a href="/process/notice_process.php?delete_cat=<?php echo $row['id'] ?>" class="btn btn-admin btn-xl" style="display: inline !important; " onclick="return confirm('Do you need to delete this item?')">Delete</a>

                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>


    </div>


    <!-- Modal update and add -->
    <div>
        <div>

            <!-- Modal content-->
            <div>
                <div>

                    <h4>Add category</h4>


                </div>
                <div>
                    <div>
                        <form action="/process/notice_process.php" method="POST" enctype="multipart/form-data">

                            <input type="hidden" name="id" class="form-control" placeholder="ID" class="form-control" required>
                            <div class="form-group">


                            </div>
                            <div class="form-group">
                                <label>New category name</label>
                                <input type="text" name="category" class="form-control" placeholder="Enter the new category" class="form-control" required>
                            </div>

                    </div>
                </div>
                <div>
                    <button type="submit" style="margin-bottom:5%;" class="btn btn-admin btn-xl" name="save_cat">Save</button>

                </div>

                </form>

            </div>

        </div>
    </div>



</div>