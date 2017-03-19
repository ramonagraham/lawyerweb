</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Collapsed Nav Bar Div -->
        <div class="center-span">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a ontouchstart="" id="nav-home" class="button special active" href="index.php">Home</a></li>
                <li><a ontouchstart="" id="nav-services" class="button special" href="services.php">Services</a></li>
                <li><a ontouchstart="" id="nav-bios" class="button special" href="bios.php">About Arthur</a></li>
                <li><a ontouchstart="" id="nav-blog" class="button special" href="blog.php">Blogs</a></li>
                <li><a ontouchstart="" id="nav-contact" class="button special" href="contact.php">Contact Arthur</a></li>
                <?php
                if (isset($_SESSION['login_user'])) {
                    echo "<li><a ontouchstart='' id='nav-postblog' class='button special' href='postblog.php'>Post Blog</a></li>";
                    echo "<li><a ontouchstart='' id='nav-logout' class='button special'>Logout</a></li>";

                }
                ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<!-- Wrapper -->
<div id="wrapper">
    <!-- Menu -->
