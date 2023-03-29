<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/synadmin/demo/vertical/app-chat-box.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Dec 2022 07:07:45 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include('include/scripts.php'); ?>
    <?php include('include/db.php'); ?>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <?php include('include/sidebar.php'); ?>
        <!--end sidebar wrapper -->
        <!--start header -->

        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <div class="display-6">
                    Start New Chats
                </div>
                <div class="chat-wrapper">
                    <div class="chat-sidebar">
                        <div class="chat-sidebar-header">
                            <div class="d-flex align-items-center">
                                <div class="chat-user-online">
                                    <img src="assets/images/avatars/avatar-1.png" width="45" height="45" class="rounded-circle" alt="" />
                                </div>
                                <div class="flex-grow-1 ms-2">
                                    <p class="mb-0"><?php echo  $_SESSION['first_name'] . '' .  $_SESSION['last_name']; ?> </p>
                                </div>

                            </div>
                            <div class="mb-3"></div>
                            <div class="input-group input-group-sm"> <span class="input-group-text bg-transparent"><i class='bx bx-search'></i></span>
                                <input type="text" class="form-control" placeholder="People, groups, & messages"> <span class="input-group-text bg-transparent"><i class='bx bx-dialpad'></i></span>
                            </div>

                        </div>
                        <div class="chat-sidebar-content">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-Chats">
                                    <div class="p-3">
                                        <div class="meeting-button d-flex justify-content-between">
                                            <div class="dropdown"> <a href="#" class="btn btn-white btn-sm radius-30 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class='bx bx-video me-2'></i>Meet Now<i class='bx bxs-chevron-down ms-2'></i></a>
                                                <div class="dropdown-menu"> <a class="dropdown-item" href="#">Host a meeting</a>
                                                    <a class="dropdown-item" href="#">Join a meeting</a>
                                                </div>
                                            </div>

                                            <div class="dropdown"> <a href="#" class="btn btn-white btn-sm radius-30 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown" data-display="static"><i class='bx bxs-edit me-2'></i>New Chat<i class='bx bxs-chevron-down ms-2'></i></a>
                                                <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="#">New Group Chat</a>
                                                    <a class="dropdown-item" href="#">New Moderated Group</a>
                                                    <a class="dropdown-item" href="#">New Chat</a>
                                                    <a class="dropdown-item" href="#">New Private Conversation</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown mt-3"> <a href="#" class="text-uppercase text-secondary dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">Recent Chats <i class='bx bxs-chevron-down'></i></a>
                                            <div class="dropdown-menu"> <a class="dropdown-item" href="#">Recent Chats</a>
                                                <a class="dropdown-item" href="#">Hidden Chats</a>
                                                <div class="dropdown-divider"></div> <a class="dropdown-item" href="#">Sort by Time</a>
                                                <a class="dropdown-item" href="#">Sort by Unread</a>
                                                <div class="dropdown-divider"></div> <a class="dropdown-item" href="#">Show Favorites</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $id = $_SESSION['id'];
                                    $query = "SELECT * from users where id !='$id'";
                                    $finalquery = mysqli_query($conn, $query);
                                    ?>
                                    <div class="chat-list">
                                        <div class="list-group list-group-flush">
                                            <?php while ($row = mysqli_fetch_assoc($finalquery)) {
                                                $userid = $row['id']; ?>
                                                <a href="newchat.php?id=<?php echo $row['id']; ?>&first_name=<?php echo $row['first_name']; ?>&last_name=<?php echo $row['last_name']; ?>" class="list-group-item">
                                                    <div class="d-flex">
                                                        <div class="chat-user-online">
                                                            <img src=<?php echo $row['image']; ?> width="42" height="42" class="rounded-circle" alt="" />
                                                        </div>
                                                        <div class="flex-grow-1 ms-2">
                                                            <h6 class="mb-0 chat-title"><?php echo $row['first_name'] . '' . $row['last_name']; ?></h6>
                                                            <p class="mb-0 chat-msg">You just got LITT up, Mike.</p>
                                                        </div>
                                                        <div class="chat-time">9:51 AM</div>
                                                    </div>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-header d-flex align-items-center">
                        <div class="chat-toggle-btn"><i class='bx bx-menu-alt-left'></i>
                        </div>
                        <div>
                            <?php
                            if (isset($_GET['id'])) { ?>
                                <h4 class="mb-1 font-weight-bold">
                                    <?php echo $_GET['first_name'] . '' . $_GET['last_name']; ?>
                                </h4>
                                <div class="list-inline d-sm-flex mb-0 d-none"> <a href="javascript:;" class="list-inline-item d-flex align-items-center text-secondary"><small class='bx bxs-circle me-1 chart-online'></small>Active Now</a>
                                    <a href="javascript:;" class="list-inline-item d-flex align-items-center text-secondary">|</a>
                                    <a href="javascript:;" class="list-inline-item d-flex align-items-center text-secondary"><i class='bx bx-images me-1'></i>Gallery</a>
                                    <a href="javascript:;" class="list-inline-item d-flex align-items-center text-secondary">|</a>
                                    <a href="javascript:;" class="list-inline-item d-flex align-items-center text-secondary"><i class='bx bx-search me-1'></i>Find</a>
                                </div>
                        </div>
                        <div class="chat-top-header-menu ms-auto"> <a href="javascript:;"><i class='bx bx-video'></i></a>
                            <a href="javascript:;"><i class='bx bx-phone'></i></a>
                            <a href="javascript:;"><i class='bx bx-user-plus'></i></a>
                        </div>
                    </div>
                    <div class="chat-content">
                    <?php
                            }


                    ?>

                    </div>
                    <div class="chat-footer d-flex align-items-center">
                        <div class="flex-grow-1 pe-2">
                            <div class="input-group"> <span class="input-group-text"><i class='bx bx-smile'></i></span>
                                <input type="text" class="form-control" placeholder="Type a message">
                            </div>
                        </div>
                        <div class="chat-footer-menu"> <a href="javascript:;"><i class='bx bx-file'></i></a>
                            <a href="javascript:;"><i class='bx bxs-contact'></i></a>
                            <a href="javascript:;"><i class='bx bx-microphone'></i></a>
                            <a href="javascript:;"><i class='bx bx-dots-horizontal-rounded'></i></a>
                        </div>
                    </div>
                    <!--start chat overlay-->
                    <div class="overlay chat-toggle-btn-mobile"></div>
                    <!--end chat overlay-->
                </div>
            </div>
        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <?php include('include/footer.php'); ?>
    </div>
    <!--end wrapper-->
    <!--start switcher-->
    <script type="module">
        // Import the functions you need from the SDKs you need
        import {
            initializeApp
        } from "https://www.gstatic.com/firebasejs/9.18.0/firebase-app.js";
        import {
            getDatabase,

            ref,
            set,
            child,
            update,
            remove,
            onValue,
            onChildAdded,
            onChildChanged,
            onChildRemoved,
            onChildMoved,
            get,
            push,
        }
        from "https://www.gstatic.com/firebasejs/9.18.0/firebase-database.js";

        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries

        // Your web app's Firebase configuration
        const firebaseConfig = {
            apiKey: "AIzaSyAPhfWQKpaX8jzcgaAFN-EoTfs2NjL2Ndk",
            authDomain: "jobportal-6bacc.firebaseapp.com",
            databaseURL: "https://jobportal-6bacc-default-rtdb.firebaseio.com",
            projectId: "jobportal-6bacc",
            storageBucket: "jobportal-6bacc.appspot.com",
            messagingSenderId: "646487807868",
            appId: "1:646487807868:web:3cfb86f18183351646b6f9"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const db = getDatabase();


        // get admin user

        get(ref(db, "users/employers/"))
            .then((snapshot) => {
                if (snapshot.val() == null) {
                    // create admin user
                    set(ref(db, "users/<?php echo $_SESSION['id']; ?>"), {
                            name: "<?php echo $_SESSION['first_name']; ?>",
                            email: "<?php echo $_SESSION['email']; ?>",
                            id: "<?php echo $_SESSION['id']; ?> "
                        })
                        .then(() => {
                            console.table("Users created successfully");
                        })
                } else {
                    console.table("this user already exists");

                    get(ref(db, "users/friends/<?php echo $_GET['id']; ?>"))
                        .then((snapshot) => {
                            if (snapshot.val() == null) {
                                var uniq_id = Math.random().toString(36).substr(2);
                                set(ref(db, "users/employers/friends/<?php echo $_GET['id']; ?>"), {
                                        chatroomId: uniq_id,
                                        First_Name: "<?php echo $_GET['first_name']; ?>",
                                        chatroomId: uniq_id,
                                        Last_Name: "<?php echo $_GET['last_name']; ?>",
                                        id: <?php echo $_GET['id']; ?>,
                                    })
                                    .then(() => {
                                        console.table("friends created successfully");
                                        set(ref(db, 'chatroom/' + uniq_id + '/'), {
                                            firstUser: "<?php echo $first_name; ?>",
                                            firstUserId: "<?php echo $last_name; ?>",
                                            secondUser: " <?php
                                                            echo $_GET['first_name'] . '' . $_GET['last_name'];
                                                            ?> ",

                                            secondUserId: <?php
                                                            echo $_GET['id'];
                                                            ?>,


                                        }).then(() => {
                                            console.table("chatroom created successfully");
                                            $('#chat_uniqId').val(uniq_id);
                                        })
                                    })
                            } else {
                                console.log("user already has this friend");

                                var chat_uniqId = snapshot.val().chatroomId;
                                $('#chat_uniqId').val(chat_uniqId);
                                console.log('hi' + chat_uniqId);


                                var chatroomRef = ref(db, 'chatroom/' + chat_uniqId + '/messages');

                                get(chatroomRef)
                                    .then((snapshot) => {
                                        console.table(snapshot.val());
                                        if (snapshot.exists()) {
                                            console.log(snapshot.val());
                                            var messages = snapshot.val();
                                            var keys = Object.keys(messages);
                                            for (var i = 0; i < keys.length; i++) {
                                                var k = keys[i];
                                                var message = messages[k];
                                                console.log(message);
                                                const query = 'chatroom/' + chat_uniqId + '/messages'.orderByKey().limitToLast(1);
                                                if (message.user._id == "<?php echo $id; ?>") {
                                                    $('#chatroom-content').append(
                                                        `<div class="d-flex justify-content-end border-bottom">
                                                            <p class="chat-msg">${message.text}</p>`
                                                    );
                                                } else {
                                                    $('#chatroom-content').append(
                                                        `<div class="d-flex justify-content-start border-bottom">
                                                            <p class="chat-msg">${message.text}</p>`
                                                    );

                                                }
                                            }
                                        } else {
                                            console.log("No data available");
                                        }
                                    })
                                    .catch((err) => {
                                        console.error(err);
                                    });

                            }
                        })
                }
            })

        $(document).ready(function() {
            $("#send_msg").click(function() {
                var msg = $("#message").val();
                var chat_uniqId = $("#chat_uniqId").val();

                if (msg.length > 0) {
                    var no = new Date().getTime().toString();
                    // alert(msg+chat_uniqId);
                    set(ref(db, 'chatroom/' + chat_uniqId + '/messages/' + no + '/'), {
                        _id: Math.random().toString(36).substr(2),
                        createdAt: new Date().toISOString(),
                        image: "",
                        read: false,
                        text: msg,
                        type: "text",
                        user: {
                            _id: "<?php echo $id; ?>",
                            name: "<?php echo $first_name; ?>",
                        }
                    }).then(() => {
                        console.table("msg created successfully");
                        $('#chatroom-content').append(
                            `<div class="d-flex justify-content-end border-bottom">
                                                            <p class="chat-msg">${msg}</p>`
                        );
                        $("#message").val('');
                    })

                }
            });
        });
    </script>
    <!--end switcher-->
    <?php include('include/footerscripts.php');  ?>
    <script>
        new PerfectScrollbar('.chat-list');
        new PerfectScrollbar('.chat-content');
    </script>
</body>


<!-- Mirrored from codervent.com/synadmin/demo/vertical/app-chat-box.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Dec 2022 07:07:45 GMT -->

</html>