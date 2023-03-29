<header>
    <?php
    function formatTime($timestamp)
    {
        date_default_timezone_set('Asia/Karachi');
        $datetime1 = DateTime::createFromFormat('Y-m-d H:i:s', $timestamp);
        $datetime2 = new DateTime();
        $interval = $datetime1->diff($datetime2);
        $years = $interval->format('%y');
        $months = $interval->format('%m');
        $days = $interval->format('%d');
        $hours = $interval->format('%h');
        $minutes = $interval->format('%i');
        $seconds = $interval->format('%s');
        if ($years > 0) {
            return $years . " years ago";
        } elseif ($months > 0) {
            return $months . " months ago";
        } elseif ($days > 0) {
            return $days . " days ago";
        } elseif ($hours > 0) {
            return $hours . " hours ago";
        } elseif ($minutes > 0) {
            return $minutes . " minutes ago";
        } else {
            return $seconds . " seconds ago";
        }
    }
    ?>

    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <a href="findajob.php">Find a Job</a>
            <div class="search-bar flex-grow-1">
                <div class="position-relative search-bar-box">
                    <input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
                    <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
                </div>
            </div>
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item mobile-search-icon">
                        <a class="nav-link" href="javascript:;"> <i class='bx bx-search'></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class='bx bx-category'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="row row-cols-3 g-3 p-3">
                                <div class="col text-center">
                                    <div class="app-box mx-auto bg-gradient-cosmic text-white"><i class='bx bx-group'></i>
                                    </div>
                                    <div class="app-title">Teams</div>
                                </div>
                                <div class="col text-center">
                                    <div class="app-box mx-auto bg-gradient-burning text-white"><i class='bx bx-atom'></i>
                                    </div>
                                    <div class="app-title">Projects</div>
                                </div>
                                <div class="col text-center">
                                    <div class="app-box mx-auto bg-gradient-lush text-white"><i class='bx bx-shield'></i>
                                    </div>
                                    <div class="app-title">Tasks</div>
                                </div>
                                <div class="col text-center">
                                    <div class="app-box mx-auto bg-gradient-kyoto text-dark"><i class='bx bx-notification'></i>
                                    </div>
                                    <div class="app-title">Feeds</div>
                                </div>
                                <div class="col text-center">
                                    <div class="app-box mx-auto bg-gradient-blues text-dark"><i class='bx bx-file'></i>
                                    </div>
                                    <div class="app-title">Files</div>
                                </div>
                                <div class="col text-center">
                                    <div class="app-box mx-auto bg-gradient-moonlit text-white"><i class='bx bx-filter-alt'></i>
                                    </div>
                                    <div class="app-title">Alerts</div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php if ($_SESSION['role'] == 'JobSeeker') { ?>
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" onClick="read_nof_all()" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
                                <i class='bx bx-bell'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">

                                <a href="javascript:;">
                                    <div class="msg-header">
                                        <p class="msg-header-title">Notifications</p>
                                        <p class="msg-header-clear ms-auto">Marks all as read</p>
                                    </div>
                                </a>
                                <?php
                                $id = $_SESSION['id'];
                                $SQL = "SELECT * from notification where user_id='$id'";


                                $FINALQuery = mysqli_query($conn, $SQL);
                                while ($row = mysqli_fetch_assoc($FINALQuery)) { ?>
                                    <div class="header-notifications-list">
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-primary text-primary"><i class="bx bx-user"></i>
                                                </div>
                                                <div class="flex-grow-1">

                                                    <h6 class="msg-name">Notification<span class="msg-time float-end time-ago">
                                                            <?php $timestamp = $row['date'];
                                                            $time = formatTime($timestamp);
                                                            echo $time; ?>
                                                        </span></h6>
                                                    <p class="msg-info">Admin has reached you out for Interview </p>

                                                    <p>Kindly check email</p>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                <?php } ?>
                                <a href="javascript:;">
                                    <div class="text-center msg-footer">View All Notifications</div>
                                </a>
                            </div>
                        </li>
                    <?php } ?>

                </ul>
            </div>
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="profile-avatar text-center">
                        <?php
                        $id = $_SESSION['id'];
                        $query = "SELECT * from users where id=' $id'";
                        $finalquery = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($finalquery)) {
                            if ($row['image'] == '') {
                                echo '<div class="icon-badge  bg-info text-white">' . strtoupper(substr($row['first_name'], 0, 1)) . '</div>';
                            } else {
                                echo '<img src="' . $row['image'] . '"class="rounded-circle shadow" width="50" height="50" alt="">';
                            }
                        } ?>

                    </div>
                    <div class="user-info ps-3">
                        <p class="user-name mb-0"><?php echo $_SESSION['first_name'] . '' . $_SESSION['last_name']; ?></p>
                        <p class="designattion mb-0">Web Designer</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="profile.php"><i class="bx bx-user"></i><span>Profile</span></a>
                    </li>
                    <li><a class="dropdown-item" href="settings.php"><i class="bx bx-cog"></i><span>Settings</span></a>
                    </li>

                    <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li><a class="dropdown-item" href="logout.php"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<script src="jquery.min.js" type="text/javascript"></script>
<script src="jquery.timeago.js" type="text/javascript"></script>
<script>
    function read_nof_all() {
        alert('hi');
        $.ajax({
            type: 'POST',
            url: 'read_notification.php',
            success: function(response) {
                response = JSON.parse(response);
                if (response.status == true) {
                    location.reload(true)
                }
            }
        });
    }
</script>
</script>