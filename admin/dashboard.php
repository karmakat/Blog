<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Multipage Blog Website</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
</head>

<body>
    <nav>
        <div class="container nav_container">
            <a href="index.html" class="nav_logo">EGATOR</a>
            <ul class="nav_items">
                <li><a href="blog.html">Blog</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="contact.htm">Contact</a></li>
                <!-- <li><a href="signin.html">Sign in</a></li> -->
                <li class="nav_profile">
                    <div class="avatar">
                        <img src="img/avatar.jpg" alt="">
                    </div>
                    <ul>
                        <li><a href="dashboard.html">Dashboard</a></li>
                        <li><a href="logout.html">Log out</a></li>
                    </ul>
                </li>
            </ul>
            <button id="open_nav-btn"><i class="icon-menu"></i></Menu></button>
            <button id="close_nav-btn"><i class="icon-close"></i></button>
        </div>
    </nav>

    <section class="dashboard">
        <div class="container dashboard_container">
            <button class="sidebar_toggle hide_sidebar-btn">
                <i class="icon-chevron-left"></i>
            </button>
            <button class="sidebar_toggle show_sidebar-btn">
                <i class="icon-chevron-right"></i>
            </button>
            <aside>
                <ul>
                    <li>
                        <a href="add-post.html"><i class="icon-pencil-square-o"></i>
                            <h5>Add Post</h5>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.html" class="active"><i class="icon-dashboard2"></i>
                            <h5>Manage Posts</h5>
                        </a>
                    </li>
                    <li>
                        <a href="add-user.html"><i class="icon-user-plus"></i>
                            <h5>Add Users</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manage-users.html"><i class="icon-users"></i>
                            <h5>Manage Users</h5>
                        </a>
                    </li>
                    <li>
                        <a href="add-category.html"><i class="icon-th-list"></i>
                            <h5>Add Category</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manage-categories.html"><i class="icon-th"></i>
                            <h5>Manage Categories</h5>
                        </a>
                    </li>
                </ul>
            </aside>
            <main>
                <h2>Manage Posts</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                            <td>Health</td>
                            <td><a href="edit-category.html" class="btn sm">Edit</a></td>
                            <td><a href="delete-category.html" class="btn sm danger">Delete</a></td>
                        </tr>
                    <tbody>
                        <tr>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                            <td>Health</td>
                            <td><a href="edit-category.html" class="btn sm">Edit</a></td>
                            <td><a href="delete-category.html" class="btn sm danger">Delete</a></td>
                        </tr>
                    <tbody>
                        <tr>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                            <td>Health</td>
                            <td><a href="edit-category.html" class="btn sm">Edit</a></td>
                            <td><a href="delete-category.html" class="btn sm danger">Delete</a></td>
                        </tr>

                    </tbody>
                </table>
            </main>
        </div>

        <footer>
            <div class="footer_socials">
                <a href="https://youtube.com"><i class="icon-youtube"></i></a>
                <a href="https://instagram.com"><i class="icon-instagram"></i></a>
                <a href="https://linkedin.com"><i class="icon-linkedin"></i></a>
                <a href="https://twitter.com"><i class="icon-twitter"></i></a>
                <a href="https://facebook.com"><i class="icon-facebook"></i></a>
            </div>
            <div class="container footer_container">
                <article>
                    <h4>Categories</h4>
                    <ul>
                        <li><a href="">Art</a></li>
                        <li><a href="">Wild Life</a></li>
                        <li><a href="">Travel</a></li>
                        <li><a href="">Science & Technology</a></li>
                        <li><a href="">Food</a></li>
                        <li><a href="">Music</a></li>
                    </ul>
                </article>

                <article>
                    <h4>Support</h4>
                    <ul>
                        <li><a href="">Online Support </a></li>
                        <li><a href="">Call Numbers</a></li>
                        <li><a href="">Emails</a></li>
                        <li><a href="">Social Support</a></li>
                        <li><a href="">Location</a></li>
                        <li><a href="">Food</a></li>
                    </ul>
                </article>

                <article>
                    <h4>Blog</h4>
                    <ul>
                        <li><a href="">Safety</a></li>
                        <li><a href="">Repair</a></li>
                        <li><a href="">Recent</a></li>
                        <li><a href="">Popular</a></li>
                        <li><a href="">Categories</a></li>
                    </ul>
                </article>

                <article>
                    <h4>Permalinks</h4>
                    <ul>
                        <li><a href="">Home</a></li>
                        <li><a href="">Blog</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Services</a></li>
                        <li><a href="">Contact</a></li>
                    </ul>
                </article>
            </div>
            <div class="footer_copyright">
                <small>Copyright &copy; EGATOR TUTORIALS</small>
            </div>
        </footer>

        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/main.js"></script>

    </section>