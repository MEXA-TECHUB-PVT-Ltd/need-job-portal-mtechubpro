<?php

?><div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text text-blue">M Techub</h4>
        </div>
        <div class="text-blue toggle-icon ms-auto"><i class='bx bx-first-page'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="index.php" class="has-arrow">
                <div class="parent-icon text-blue"><i class='bx bx-home'></i>
                </div>
                <div class="menu-title text-blue">Dashboard</div>
            </a>

        </li>
        <li>
            <a href="resumes.php" class="has-arrow">
                <div class="parent-icon text-blue"><i class='bx bx-file'></i>
                </div>
                <div class="menu-title text-blue">Resumes</div>
            </a>

        </li>
        <?php if ($_SESSION['role'] == 'A') { ?>
            <li>
                <a href="addjob.php" class="has-arrow">
                    <div class="parent-icon text-blue"><i class='fadeIn animated bx bx-plus'></i>
                    </div>
                    <div class="menu-title text-blue"> New Job Post</div>
                </a>

            </li>
        <?php } ?>
        <li>

            <a href="aboutorganization.php" class="has-arrow">
                <div class="parent-icon text-blue"><i class='fadeIn animated bx bx-globe'></i>
                </div>
                <div class="menu-title text-blue">About Organization</div>
            </a>

        </li>
        <?php if ($_SESSION['role'] == 'A') { ?>
            <li>
                <a href="viewjobseekers.php" class="has-arrow">
                    <div class="parent-icon text-blue"><i class='fadeIn animated bx bxs-show'></i>
                    </div>
                    <div class="menu-title text-blue">View Job Seekers</div>
                </a>

            </li>
        <?php  } ?>
        <?php if ($_SESSION['role'] == 'JobSeeker') { ?>
            <li>
                <a href="viewappliedjobs.php" class="has-arrow">
                    <div class="parent-icon text-blue"><i class='fadeIn animated bx bxs-show'></i>
                    </div>
                    <div class="menu-title text-blue">View All Applied Jobs</div>
                </a>

            </li>
        <?php  } ?>
        <li>
            <a href="chat.php" class="has-arrow">
                <div class="parent-icon text-blue"><i class='fadeIn animated bx bx-globe'></i>
                </div>
                <div class="menu-title text-blue">Chat</div>
            </a>

        </li>
        <li>
            <a href="newchat.php" class="has-arrow">
                <div class="parent-icon text-blue"><i class='fadeIn animated bx bx-globe'></i>
                </div>
                <div class="menu-title text-blue">New Chat</div>
            </a>

        </li>
    </ul>
    <!--end navigation-->
</div>