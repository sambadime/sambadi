<!DOCTYPE HTML>
<html>
	<head>
		<title>sambadi</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="<?php echo base_url() ?>assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/mainhome.css" />
		<script src="<?php echo base_url() ?>assets/js/sweetalert.js"></script>
		<!--[if lte IE 9]><link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ie8.css" /><![endif]-->
		<link href="<?php echo base_url() ?>assets/img/favicon.ico" rel="shortcut icon" type="image/ico">
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">
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

				<!-- Header -->
					<header id="header">
						<h1><a href="#">sambadi</a></h1>
						<nav class="links">
							<ul>
								<li><a href="<?= base_url().'home2' ?>">Home</a></li>
								<?php if($_SESSION['rank'] == "admin") { ?> <li><a href="<?= base_url().'admin/index' ?>">Admin</a></li> <?php } ?>
								<li><a href="<?= base_url().'logout' ?>">Logout</a></li>
								
							</ul>
						</nav>
						<nav class="main">
							<ul>
								<li class="search">
									<a class="fa-search" href="#search">Search</a>
									<form id="search" method="get" action="<?= base_url().'search/' ?>">
										<input type="text" name="query" placeholder="Search" />
									</form>
								</li>
								<li class="menu">
									<a class="fa-bars" href="#menu">Menu</a>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Menu -->
					<section id="menu">

						<!-- Search -->
							<section>
								<form class="search" method="get" action="<?= base_url().'search/' ?>">
									<input type="text" name="query" placeholder="Search" />
								</form>
							</section>

						<!-- Links -->
							<section>
								<ul class="links">
									<li>
										<a>
											<h3>Write something</h3>
										</a>
									</li>
								</ul>
							</section>

						<!-- Actions -->
							<section>
								<ul class="actions vertical">
									<li><a href="#" class="button big fit">Browse</a></li>
								</ul>
							</section>

					</section>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
						<?php
						if(empty($result)) {
							?>
							<h1>No post published</h1>
						<?php
						}
						else {
							foreach($result as $row) {
								if($viewtype == "list") {

						?>
						
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="#"><?= $row->title ?></a></h2>
									</div>
									<div class="meta">
										<time class="published" datetime="2015-11-01"><?= date("M jS, Y", strtotime($row->date)) ?></time>
										<a href="#" class="author"><span class="name"><?= $row->author ?></span><img src="<?= $_SESSION['avatar-path'] ?>" alt="avatar" /></a>
									</div>
								</header>
								<a href="#" class="image featured"><img src="<?php echo base_url() ?>assets/img/pic01.jpg" alt="" /></a>
								<p><?= $row->deskripsi ?></p>
								<footer>
									<ul class="actions">
										<li><a href="<?= base_url().'read/'.$row->url ?>" class="button big">Continue Reading</a></li>
									</ul>
									<ul class="stats">
										<li><a href="#"><?= strtoupper($row->category) ?></a></li>
										<li><a href="#" class="icon fa-heart">28</a></li>
										<li><a href="#" class="icon fa-comment">128</a></li>
									</ul>
								</footer>
							</article>
						<?php
								}
								else if($viewtype == "read") {
									?>
									<article class="post">
										<header>
											<div class="title">
												<h2><a href="#"><?= $row->title ?></a></h2>
											</div>
											<div class="meta">
												<time class="published" datetime="2015-11-01"><?= date("M jS, Y", strtotime($row->date)) ?></time>
												<a href="#" class="author"><span class="name"><?= $row->author ?></span><img src="<?= $_SESSION['avatar-path'] ?>" alt="avatar" /></a>
											</div>
										</header>
										<a href="#" class="image featured"><img src="<?php echo base_url() ?>assets/img/pic01.jpg" alt="" /></a>
										<p><?= $row->content ?></p>
										<footer>
											<ul class="stats">
												<li><a href="#"><?= strtoupper($row->category) ?></a></li>
												<li><a href="#" class="icon fa-heart">28</a></li>
												<li><a href="#" class="icon fa-comment">128</a></li>
											</ul>
										</footer>
									</article>
						<?php
								}
							}
						}	
						?>

						<?php if(isset($link)) {
							?>
						<!-- Pagination -->
							<ul class="actions pagination">
								<?= $link ?>
							</ul>
						<?php
						}	
						?>
					</div>

				<!-- Sidebar -->
					<section id="sidebar">

						<!-- Intro -->
							<section id="intro">
								<a href="#" class="logo"><img src="<?= $_SESSION['avatar-path'] ?>" alt="avatar" /></a>
								<header>
									<h2><?= $_SESSION['username'] ?></h2>
									<h3>Last Post</h3>
								</header>
							</section>

						<!-- Mini Posts -->
							<section>
								<div class="mini-posts">
									<?php
									if(is_array($lastpost)) {
										foreach($lastpost as $row) {			
									?>
									<!-- Last Post -->
										<article class="mini-post">
											<header>
												<h3><a href="#"><?= $row->title ?></a></h3>
												<time class="published" datetime="2015-10-20"><?= date("M jS, Y", strtotime($row->date)) ?></time>
												<a href="#" class="author"><?= $row->author ?></a>
											</header>
											<a href="#" class="image"><img src="<?php echo base_url() ?>assets/img/pic04.jpg" alt="" /></a>
										</article>
									<?php
										}
									}
									else {
										?>
										<article class="mini-post">
											<header>
												<h3><a href="#"><?= $row->title ?></a></h3>
												<time class="published" datetime="2015-10-20"><?= date("M jS, Y", strtotime($row->date)) ?></time>
												<a href="#" class="author"><?= $row->author ?></a>
											</header>
											<a href="#" class="image"><img src="<?php echo base_url() ?>assets/img/pic04.jpg" alt="" /></a>
										</article>
									<?php
									}

									?>
								</div>
							</section>

						<!-- Posts List -->
							<section>
								<ul class="posts">
									<?php
									if(is_array($randompost)) {
										foreach($randompost as $row) {
									?>
									
									<li>
										<article>
											<header>
												<h3><a href="#"><?= $row->title ?></a></h3>
												<time class="published" datetime="<?= $row->date ?>"><?= date("M jS, Y", strtotime($row->date)) ?></time>
											</header>
											<a href="#" class="image"><img src="<?php echo base_url() ?>assets/img/pic08.jpg" alt="" /></a>
										</article>
									</li>
									<?php
										}
									}
									else {
										?>
									<li>
										<article>
											<header>
												<h3><a href="#"><?= $row->title ?></a></h3>
												<time class="published" datetime="<?= $row->date ?>"><?= date("M jS, Y", strtotime($row->date)) ?></time>
											</header>
											<a href="#" class="image"><img src="<?php echo base_url() ?>assets/img/pic08.jpg" alt="" /></a>
										</article>
									</li>
									<?php
									}
									?>

								</ul>
							</section>

						<!-- About -->
							<section class="blurb">
								<h2>About</h2>
								<p>This website is created by sambadi with help of <a href="https://html5up.net">html5up</a> and some magic trick of ...</p>
								<ul class="actions">
									<li><a href="#" class="button">Learn More</a></li>
								</ul>
							</section>

						<!-- Footer -->
							<section id="footer">
								<ul class="icons">
									<li><a href="#" class="fa-steam"><span class="label">Steam</span></a></li>
									<li><a href="#" class="fa-rss"><span class="label">RSS</span></a></li>
									<li><a href="#" class="fa-envelope"><span class="label">Email</span></a></li>
								</ul>
								<p class="copyright">&copy; sambadi</p>
							</section>

					</section>

			</div>

		<!-- Scripts -->
			<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
			<script src="<?php echo base_url() ?>assets/js/skel.min.js"></script>
			<script src="<?php echo base_url() ?>assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="<?php echo base_url() ?>assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="<?php echo base_url() ?>assets/js/mainhome.js"></script>

	</body>
</html>