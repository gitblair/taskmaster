<?php
echo'


<div class="container">
  <h2>Multi-Level Dropdowns</h2>
  <p>In this example, we have created a .dropdown-submenu class for multi-level dropdowns (see style section above).</p>
  <p>Note that we have added jQuery to open the multi-level dropdown on click (see script section below).</p>
  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Tutorials
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a tabindex="-1" href="#">HTML</a></li>
      <li><a tabindex="-1" href="#">CSS</a></li>
      <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">New dropdown <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
          <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
          <li class="dropdown-submenu">
            <a class="test" href="#">Another dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">3rd level dropdown</a></li>
              <li><a href="#">3rd level dropdown</a></li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>










<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="bootstrap-logo.svg" alt="Logo" width="60" height="48" class="d-inline-block align-text-top">
      <div class="navbar-brand-text ms-3 me-3">
        <span class="brand-name">Christian Blair Projects</span>
        <span class="brand-projects">Coding, Data Analytics, and More</span>
      </div>
    </a>

    <!-- Navbar Toggler Button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-item nav-link" href="index.php">Index</a></li>
        <li class="nav-item"><a class="nav-item nav-link" href="leaderboards.php">Leaderboards</a></li>
        <li class="nav-item"><a class="nav-item nav-link" href="score-along.php">JavaScript: Score Along</a></li>
        <li class="nav-item"><a class="nav-item nav-link" href="error_log.txt">Error Log</a></li>
        <li class="nav-item"><a class="nav-item nav-link" href="about.php">About</a></li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Projects
          </a>



          <ul class="dropdown-menu">
           <!-- Taskmaster Dropdown with Submenu -->
           <li class="dropdown-submenu">
             <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Taskmaster
             </a>
             <ul class="dropdown-menu">
               <li><a class="dropdown-item" href="#">Submenu Item 1</a></li>
               <li><a class="dropdown-item" href="#">Submenu Item 2</a></li>
               <li><a class="dropdown-item" href="#">Submenu Item 3</a></li>
             </ul>
           </li>





            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Podcast Search</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">MP3 Editor</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">MPG Editor</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Color Bar Creator</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">HoneyComb</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Tools
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Visuals</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Tableau</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Excel / Sheets</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Functions & Formulas</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">R / R Studio</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">SQL</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Bash Scripts</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Crontab</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">PHP</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


';
?>
