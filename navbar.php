<!-- <?php session_start(); ?> -->
<header id="header">
    <h1 style="font-size: 1.2rem;"><a href="./">Donate Online</a></h1>
    <nav id="nav">
        <ul>
            <li class="special">
                <a href="#menu" class="menuToggle" style="text-decoration: unset;"><span>Menu</span></a>
                <div id="menu">
                    <ul>
                        <li><a href="./">Home</a></li>
                        <li><a href="show_Searching.php?page=searching_user">Searching</a></li>
                    <?php if (isset($_SESSION["type"])) { ?>
                        <?php if ($_SESSION["type"] == "admin") { ?>
                            <li><a href="admin_page.php?page=admin_users_management">Admin</a></li>
                        <?php } else if ($_SESSION["type"] == "user") { ?>
                            <li><a href="show_manage_event.php?page=manage_event">Management</a></li>
                        <?php } ?>
                        <li><a href="logout.php">Log Out</a></li>
                    <?php } else { ?>
                        <li><a href="show_register.php">Sign Up</a></li>
                        <li><a href="show_login.php">Log In</a></li>
                    <?php } ?>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</header>