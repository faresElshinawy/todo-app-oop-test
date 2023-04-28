    <div class="container mt-5 mb-4 justify-content-center">
        <div class="row d-flex">
            <div class="mx-auto col-4 bg-dark">
                <h1 align='center' class='text-light'>Welcome <?= $session->SessionData("auth","Name") ?> ♥ </h1>
            </div>
        </div>
    </div>

    <div class="container ">
    <button class="btn btn-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
    Add New Task
    </button>
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0  bg-dark text-light">
                <!-- Nested Row within Card Body -->
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-9">
                        <div class="p-5">
                <table class="table bg-dark text-light ">
                <thead>
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">description</th>
                    <th scope="col">created at</th>
                    <th scope="col">done at</th>
                    <th scope="col">status</th>
                    <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $result = $conn->Gettasks($session->SessionData("auth","Id"));
                    if(!empty($result)):
                    while($row = mysqli_fetch_assoc($result)):
                    
                    ?>
                <tr>
                    <td scope="col"><?= $row['Id'] ?></td>
                    <td scope="col"><?= $row['Description'] ?></td>
                    <td scope="col"><?= $row['Created_at'] ?></td>
                    <td scope="col"><?= $row['Done_at'] ?></td>
                    <td scope="col" class="

                    <?php if($row['Name'] == 'Done'): ?>

                    text-success

                    <?php else: ?>

                    text-secondary

                    <?php endif; ?>
                    
                    ">
                    <?= $row['Name'] ?>
                    </td>
                    <td>
                    <div class="dropdown">
                            <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                            </svg>
                            </button>
                            <ul class="dropdown-menu">
                                <?php if($row['Name'] != "Done"): ?>
                            <li>
                                    <form action="handlers/task_done.php" method='post'>
                                        <input type="hidden" value="<?= $row['Id'] ?>" name='taskid'>
                                <button class="dropdown-item" type='submit'>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                                        <path class='text-success' d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                                        <path class='text-success' d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                                        </svg> <span class='text-success'> Done </span>
                                </button>
                                </form>
                                </li>
                                <li>
                                    <form action="<?= $_SERVER['PHP_SELF'] ?>?page=edittask" method='post'>
                                        <input type="hidden" value="<?= $row['Id'] ?>" name='taskid'>
                                        <button class="dropdown-item" type='submit'>
                                            </form>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path class='text-success' d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path class='text-secondary' fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg> <span class='text-dark'> Edit </span>
                                        </button>
                                    </li>
                                    <li>
                                </form> 
                                    <?php endif; ?>
                                    <form action="handlers/delete_task.php" method='post'>
                                        <input type="hidden" value="<?= $row['Id'] ?>" name='taskid'>
                                        <button class="dropdown-item" type='submit'>
                                    </form>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                <path class = 'text-danger' d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path class = 'text-danger'  d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg> <span class='text-danger'> Delete </span>
                                </button>
                                </li>
                            </ul>
                        </div>
                        </td>
                </tr>
                <?php endwhile; ?>
                <?php endif; ?>
            </tbody>
        </table>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>


        <div class="offcanvas offcanvas-start bg-dark text-light" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Add New Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
            <div class="offcanvas-body bg-dark">
                <div class="container-fluid">
                    <div class="p-2">
                        <form  method='post' action="handlers/addtask.php">
                            <div class="form-group">
                            <input type="text" class="form-control rounded p-2" id="exampleFirstName" name='task'
                                placeholder="Task Description">     
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                            <button class='btn btn-success m-2'>submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    

