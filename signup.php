<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 bg-dark">
        <div class="card-body p-0 ">
            <!-- Nested Row within Card Body -->
            <div class="row d-flex justify-content-center">
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-light mb-4">Sign Up!</h1>
                        </div>
                        <form  method='post' action="handlers/handle_signup.php">
                            <?php if($session->IssetKey("errors")): ?>
                                <div class="alert alert-danger" role="alert">
                                <?= $session->CallFlashMessage("errors") ?>
                                </div>
                                <?php endif; ?>
                            <div class="form-group p-2">
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName" name='name'
                                        placeholder="Name">
                            </div>
                            <div class="form-group p-2">
                                <input type="email" class="form-control form-control-user" id="exampleInputEmail" name='email'
                                    placeholder="Email Address">
                            </div>
                                <div class="form-group p-2">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name='password'>
                                </div>
                                <div class="d-grid mx-auto gap-2 col-6">
                                    <button class='btn btn-primary p-2'>submit</button>
                                </div>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small text-light" href="index.php">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div