<?php
if($validate->PostKey("taskid")):
    $id = $validate->sanitize($_POST['taskid']);
    $row = $conn->Gettask("tasks",$id);

?>
<div class="container mt-5">
<div class="d-grid mx-auto gap-2 co-6">
                                    <a class='btn btn-light p-2' href="index.php">Back To Task List</a>
                                </div>
    <div class="card o-hidden border-0 shadow-lg my-5 bg-dark">
        <div class="card-body p-0 ">
            <!-- Nested Row within Card Body -->
            <div class="row d-flex justify-content-center">
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-light mb-4">edit task!</h1>
                        </div>
                        <form  method='post' action="handlers/handle_edit_task.php">
                            <div class="form-group p-2">
                                <input type="hidden" name='id' value="<?= $id ?>" >
                                <input type="text" class="form-control form-control-user" id="exampleInputEmail" name='task' value="<?= $row['Description'] ?>"
                                    placeholder="Task Description">
                            </div>
                                <div class="d-grid mx-auto gap-2 col-6">
                                    <button class='btn btn-success p-2'>submit</button>
                                </div>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
    <div class="container mt-5">
        <div class="d-grid mx-auto gap-2 co-6">
                <div class="alert alert-warning text-center">
                    wrong request
                </div>
        </div>
    </div>

<?php endif; ?>
