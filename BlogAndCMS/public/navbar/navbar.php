<header class="d-flex justify-content-between align-items-center py-3">
    <!-- Left Side - Navigation Links -->
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a href="home.php" class="nav-link <?php echo ($currentPage == 'home') ? 'active' : ''; ?>" aria-current="page">
                Home
            </a>
        </li>
        <li class="nav-item">
            <a href="posts.php" class="nav-link <?php echo ($currentPage == 'posts') ? 'active' : ''; ?>">
                Posts
            </a>
        </li>
        <li class="nav-item">
            <a href="about.php" class="nav-link <?php echo ($currentPage == 'about') ? 'active' : ''; ?>">
                About
            </a>
        </li>
        <li class="nav-item">
            <a href="contact.php" class="nav-link <?php echo ($currentPage == 'contact') ? 'active' : ''; ?>">
                Contact
            </a>
        </li>
        <li class="nav-item">
            <a href="create_post.php" class="nav-link <?php echo ($currentPage == 'create_post') ? 'active' : ''; ?>">
                Add Post
            </a>
        </li>
        <li class="nav-item">
            <a href="manage_posts.php" class="nav-link <?php echo ($currentPage == 'manage_posts') ? 'active' : ''; ?>">
                Manage Posts</a>
        </li>
    </ul>

    <!-- Center - Image or Text -->
    <div class="navbar-center">
        <img src="http://localhost/BlogAndCMS/public/images/blog.png" alt="Center Image" class="navbar-center-image">
        <!-- or use text -->
        <!-- <span class="navbar-center-text">Your Text Here</span> -->
    </div>

    <!-- Right Side - Profile Dropdown -->
    <div class="dropdown profile-dropdown">
        <a href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="http://localhost/BlogAndCMS/public/images/profile_img.jpg" class="rounded-circle" width="40" height="40" alt="Profile Picture">
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="profile.php">Profile</a>
            <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
    </div>
</header>