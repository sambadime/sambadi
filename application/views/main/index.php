<!DOCTYPE HTML>
<!--
    Dimension by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>sambadi</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/mainpage.css" />
        <!--[if lte IE 9]><link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/ie9.css" /><![endif]-->
        <noscript><link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/noscript.css" /></noscript>
    </head>
    <body>

        <!-- Wrapper -->
            <div id="wrapper">

                <!-- Header -->
                    <header id="header">
                        <div class="logo">
                            <span class="icon fa-gg"></span>
                        </div>
                        <div class="content">
                            <div class="inner">
                                <h1>sambadi</h1>
                            </div>
                        </div>
                        <nav>
                            <ul>
                                <li><a href="#login">Login</a></li>
                                <li><a href="#register">Register</a></li>
                                <li><a href="#contact">Contact</a></li>
                            </ul>
                        </nav>
                    </header>

                <!-- Main -->
                    <div id="main">

                        <!-- Login -->
                            <article id="login">
                                <h2 class="major">Login</h2>
                                <?= form_open("main/login"); ?>
                                    <div class="field first">
                                        <label for="name">Name</label>
                                        <input type="text" name="username" id="name" />
                                    </div>
                                    <div class="field">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" />
                                    </div>
                                    <ul class="actions">
                                        <li><input type="submit" value="Send Message" class="special" /></li>
                                        <li><input type="reset" value="Reset" /></li>
                                    </ul>
                                </form>
                            </article>


                        <!-- Register -->
                            <article id="register">
                                <h2 class="major">Register</h2>
                                <?= form_open("main/register"); ?>
                                    <div class="field first">
                                        <label for="name">Username</label>
                                        <input type="text" name="username" id="name" />
                                    </div>
                                    <div class="field">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" />
                                    </div>
                                    <div class="field">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" />
                                    </div>
                                    <ul class="actions">
                                        <li><input type="submit" value="Send Message" class="special" /></li>
                                        <li><input type="reset" value="Reset" /></li>
                                    </ul>
                                </form>
                            </article>


                        <!-- Contact -->
                            <article id="contact">
                                <h2 class="major">Contact</h2>
                                <form method="post" action="#">
                                    <div class="field half first">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" />
                                    </div>
                                    <div class="field half">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email" />
                                    </div>
                                    <div class="field">
                                        <label for="message">Message</label>
                                        <textarea name="message" id="message" rows="4"></textarea>
                                    </div>
                                    <ul class="actions">
                                        <li><input type="submit" value="Send Message" class="special" /></li>
                                        <li><input type="reset" value="Reset" /></li>
                                    </ul>
                                </form>
                                <h4 class="major">Or you can contact me by:</h4>
                                <ul class="icons">
                                    <li><a href="#" class="icon fa-steam"><span class="label">Steam</span></a></li>
                                    <li><a href="#" class="icon fa-github"><span class="label">GitHub</span></a></li>
                                </ul>
                            </article>


                    </div>

                <!-- Footer -->
                    <footer id="footer">
                        <p class="copyright">&copy; sambadi</p>
                    </footer>

            </div>

        <!-- BG -->
            <div id="bg"></div>

        <!-- Scripts -->
            <script src="<?php echo base_url() ?>/assets/js/jquery.min.js"></script>
            <script src="<?php echo base_url() ?>/assets/js/skel.min.js"></script>
            <script src="<?php echo base_url() ?>/assets/js/util.js"></script>
            <script src="<?php echo base_url() ?>/assets/js/mainpage.js"></script>

    </body>
</html>
