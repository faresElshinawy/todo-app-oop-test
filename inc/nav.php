<nav class="navbar navbar-expand-lg bg-dark d-flex justify-content-center" data-bs-theme="dark">
  <div class="container-fluid">
    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
      <?php if($session->IssetKey("auth")): ?>
      <ul class="navbar-nav ">
                    <!-- <li class="nav-item">
                    <a class="nav-link active fs-4" aria-current="page" href="index.php">Task List</a>
                    </li> -->
                    <li class="nav-item">
                    <a class="nav-link text-muted fs-4" aria-current="page" href="handlers/signout.php">sign out </a>
                    </li>
                  </ul>
                  <?php endif; ?>
              </div>
            </div>
    </nav>