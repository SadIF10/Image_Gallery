

<head>
        <link rel="stylesheet" href="general.css">
    </head>
    
    <body>
        <div class="menu">
            <ul>
                <li class="lia"><a href="dashboard.php">Dashboard</a></li>
                <li class="lia"><a href="feed.php">My Feed</a></li>
                <li class="lia"><a href="feed2.php">Global Feed</a></li>
                <li class="lia"><a href="new-image.php">Upload Image</a></li>
                <?php
                    if($_SESSION["active"] == 5) {
                        echo '<li class="lia"><a href="admin-dashboard.php">Admin Dashboard</a></li>';
                    }
                ?>
                <li class="lia"><a href="logout.php">Logout</a></li>
                <div class="clearfix"></div>
            </ul>
        </div>
