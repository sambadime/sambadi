<!DOCTYPE HTML>
<html>
    <head>
        <title>sambadi</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/loader.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/mainpage.css" />
        <script src="<?php echo base_url() ?>assets/js/sweetalert.js"></script>
        <!--[if lte IE 9]><link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ie9.css" /><![endif]-->
        <link href="<?php echo base_url() ?>assets/img/favicon.ico" rel="shortcut icon" type="image/ico">
    </head>
    <body>
        <div class="loader-wrapper">
            <div class="sk-folding-cube">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
            </div>
        </div>

        <!-- Wrapper -->
            <div id="wrapper">

                <!-- Header -->
                    <header id="header">
                        <?php if(isset($_SESSION['error-msg'])) {
                            ?>
                            <script type="text/javascript">
                                swal({
                                    title: "<?= ucfirst($_SESSION['error-type']) ?>",
                                    text: "<?= $_SESSION['error-msg'] ?>",
                                    icon: "<?= $_SESSION['error-type'] ?>",
                                });

                            </script>
                        <?php
                        }
                        ?>
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
                                <?= form_open("sambadi/login"); ?>
                                    <div class="field first">
                                        <label for="name">Name</label>
                                        <input type="text" name="username" id="name" autocomplete="off" />
                                    </div>
                                    <div class="field">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" autocomplete="off" />
                                    </div>
                                    <ul class="actions">
                                        <li><input type="submit" value="Submit" class="special" /></li>
                                        <li><input type="reset" value="Reset" /></li>
                                    </ul>
                                </form>
                            </article>


                        <!-- Register -->
                            <article id="register">
                                <h2 class="major">Registration is closed</h2>
                                <?= form_open_multipart("sambadi/register"); ?>
                                    <div class="field first">
                                        <label for="name">Username</label>
                                        <input type="text" name="username" id="name" autocomplete="off" autocomplete="off" />
                                    </div>
                                    <div class="field">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" autocomplete="off" autocomplete="off"/>
                                    </div>
                                    <div class="field">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" autocomplete="off" autocomplete="off"/>
                                    </div>
                                    <div class="field">
                                        <label for="userfile">Avatar (Max Size 100kb)</label>
                                        <input type="file" name="userfile" id="userfile" autocomplete="off">
                                    </div>
                                    <ul class="actions">
                                        <li><input type="submit" value="Submit" class="special" autocomplete="off"/></li>
                                        <li><input type="reset" value="Reset" autocomplete="off"/></li>
                                    </ul>
                                </form>
                            </article>


                        <!-- Contact -->
                            <article id="contact">
                                <h2 class="major">Contact</h2>
                                <form method="post">
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
                                <h4 class="major">Or</h4>
                                <ul class="icons">
                                    <li><a href="https://steamcommunity.com/id/sambadis" class="icon fa-steam"><span class="label">Steam</span></a></li>
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
            <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
            <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
            <script src="<?php echo base_url() ?>assets/js/skel.min.js"></script>
            <script src="<?php echo base_url() ?>assets/js/util.js"></script>
            <script src="<?php echo base_url() ?>assets/js/mainpage.js"></script>
            <script>
                $(document).ready(function() {
                    setTimeout(function() {
                        $('.loader-wrapper').fadeOut(500);
                    }, 1500);
                });

            </script>

    </body>
</html>
