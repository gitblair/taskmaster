<?php
echo'
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <i class="fa fa-solid fa-gears" aria-hidden="true" style="font-size: 2rem;"></i>
        <div class="navbar-brand-text ms-3 me-3">
          <span class="brand-name">Taskmaster</span>
          <span class="brand-projects">Series, Episodes, and Contestants</span>
        </div>
      </a>

      <!-- Navbar Toggler Button -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-item nav-link" href="edit-series.php">Update Series Table</a></li>
          <li class="nav-item"><a class="nav-item nav-link" href="edit-episode.php">Update Episode Table</a></li>
          <li class="nav-item"><a class="nav-item nav-link" href="leaderboards.php">Leaderboards</a></li>
          <li class="nav-item"><a class="nav-item nav-link" href="score-along.php">What if?</a></li>
          <li class="nav-item"><a class="nav-item nav-link" href="log.txt">Log</a></li>
          <li class="nav-item"><a class="nav-item nav-link" href="index.php">index</a></li>
        </ul>
      </div>
    </div>
</nav>

';
?>
