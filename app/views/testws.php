<!-- /*
* Template Name: Blogy
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="<?= base_url('assets/favicon.png')?>">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap5" />

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?= base_url('assets/fonts/icomoon/style.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/fonts/flaticon/font/flaticon.css') ?>">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	
	<link rel="stylesheet" href="<?= base_url('assets/css/tiny-slider.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/aos.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/glightbox.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

	<link rel="stylesheet" href="<?= base_url('assets/css/flatpickr.min.css') ?>">

	<link rel="stylesheet" href="<?= base_url('dist/datatables/datatables.min.css') ?>" />
	
	<title>Blogy &mdash; Free Bootstrap 5 Website Template by Untree.co</title>
</head>

<body>

	<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>

	<nav class="site-nav">
		<div class="container">
			<div class="menu-bg-wrap">
				<div class="site-navigation">
					<div class="row g-0 align-items-center">
						<div class="col-2">
							<a href="index.html" class="logo m-0 float-start">Microsistema<span
									class="text-primary">.</span></a>
						</div>
						<div class="col-8 text-center">
							<ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
								<li class="active"><a href="index.html">Inicio</a></li>
								<li class="has-children">
									<a href="#">Regiones</a>
									<ul class="dropdown">
										<li><a href="search-result.html">Directorio</a></li>
										<li><a href="blog.html">Planes optimización</a></li>
										<li><a href="single.html">Cronograma</a></li>
										<li><a href="category.html">Otros</a></li>
									</ul>
								</li>
								<li class="has-children">
									<a href="#">Institutos</a>
									<ul class="dropdown">
										<li><a href="search-result.html">Directorio</a></li>
										<li><a href="blog.html">Licenciados</a></li>
										<li><a href="single.html">No licenciados</a></li>
										<li><a href="category.html">En proceso de Lic.</a></li>
										<li><a href="category.html">En proceso de Fort.</a></li>
									</ul>
								</li>
							</ul>
						</div>
						<div class="col-2 text-end">
							<a href="#"
								class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
								<span></span>
							</a>
							<form action="#" class="search-form d-none d-lg-inline-block">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="bi-search"></span>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<!-- Start retroy layout blog posts -->
	<section class="section bg-light">
		<div class="container">
			<div class="row align-items-stretch retro-layout">
				<div class="col-md-4">
					<a href="single.html" class="h-entry mb-30 v-height gradient">

						<div class="featured-img"
							style="background-image: url('<?= base_url('assets/images/img_2_horizontal.jpg') ?>');"></div>

						<div class="text">
							<span class="date">Apr. 14th, 2022</span>
							<h2>AI can now kill those annoying cookie pop-ups</h2>
						</div>
					</a>
					<a href="single.html" class="h-entry v-height gradient">

						<div class="featured-img"
							style="background-image: url('<?= base_url('assets/images/img_5_horizontal.jpg') ?>');"></div>

						<div class="text">
							<span class="date">Apr. 14th, 2022</span>
							<h2>Don’t assume your user data in the cloud is safe</h2>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="single.html" class="h-entry img-5 h-100 gradient">

						<div class="featured-img"
							style="background-image: url('<?= base_url('assets/images/img_1_vertical.jpg') ?>');"></div>

						<div class="text">
							<span class="date">Apr. 14th, 2022</span>
							<h2>Why is my internet so slow?</h2>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="single.html" class="h-entry mb-30 v-height gradient">

						<div class="featured-img"
							style="background-image: url('<?= base_url('assets/images/img_3_horizontal.jpg') ?>');"></div>

						<div class="text">
							<span class="date">Apr. 14th, 2022</span>
							<h2>Startup vs corporate: What job suits you best?</h2>
						</div>
					</a>
					<a href="single.html" class="h-entry v-height gradient">

						<div class="featured-img"
							style="background-image: url('<?= base_url('assets/images/img_4_horizontal.jpg') ?>');"></div>

						<div class="text">
							<span class="date">Apr. 14th, 2022</span>
							<h2>Thought you loved Python? Wait until you meet Rust</h2>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>
	<!-- End retroy layout blog posts -->

	<!-- Start posts-entry -->
	<section class="section posts-entry">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Business</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
			</div>
			<div class="row g-3">
				<div class="col-md-9">
					<div class="row g-3">
						<div class="col-md-6">
							<div class="blog-entry">
								<a href="single.html" class="img-link">
									<img src="<?= base_url('assets/images/img_1_sq.jpg') ?>" alt="Image"
										class="img-fluid">
								</a>
								<span class="date">Apr. 14th, 2022</span>
								<h2><a href="single.html">Thought you loved Python? Wait until you meet Rust</a></h2>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis
									inventore vel voluptas.</p>
								<p><a href="single.html" class="btn btn-sm btn-outline-primary">Read More</a></p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="blog-entry">
								<a href="single.html" class="img-link">
									<img src="<?= base_url('assets/images/img_2_sq.jpg') ?>" alt="Image"
										class="img-fluid">
								</a>
								<span class="date">Apr. 14th, 2022</span>
								<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis
									inventore vel voluptas.</p>
								<p><a href="single.html" class="btn btn-sm btn-outline-primary">Read More</a></p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<ul class="list-unstyled blog-entry-sm">
						<li>
							<span class="date">Apr. 14th, 2022</span>
							<h3><a href="single.html">Don’t assume your user data in the cloud is safe</a></h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore
								vel voluptas.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</li>

						<li>
							<span class="date">Apr. 14th, 2022</span>
							<h3><a href="single.html">Meta unveils fees on metaverse sales</a></h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore
								vel voluptas.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</li>

						<li>
							<span class="date">Apr. 14th, 2022</span>
							<h3><a href="single.html">UK sees highest inflation in 30 years</a></h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore
								vel voluptas.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- End posts-entry -->

	<!-- Start posts-entry -->
	<section class="section posts-entry posts-entry-sm bg-light">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-3">
					<div class="blog-entry">
						<a href="single.html" class="img-link">
							<img src="<?= base_url('assets/images/img_1_horizontal.jpg') ?>" alt="Image"
								class="img-fluid">
						</a>
						<span class="date">Apr. 14th, 2022</span>
						<h2><a href="single.html">Thought you loved Python? Wait until you meet Rust</a></h2>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
						<p><a href="#" class="read-more">Continue Reading</a></p>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="blog-entry">
						<a href="single.html" class="img-link">
							<img src="<?= base_url('assets/images/img_2_horizontal.jpg') ?>" alt="Image"
								class="img-fluid">
						</a>
						<span class="date">Apr. 14th, 2022</span>
						<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
						<p><a href="#" class="read-more">Continue Reading</a></p>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="blog-entry">
						<a href="single.html" class="img-link">
							<img src="<?= base_url('assets/images/img_3_horizontal.jpg') ?>" alt="Image"
								class="img-fluid">
						</a>
						<span class="date">Apr. 14th, 2022</span>
						<h2><a href="single.html">UK sees highest inflation in 30 years</a></h2>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
						<p><a href="#" class="read-more">Continue Reading</a></p>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="blog-entry">
						<a href="single.html" class="img-link">
							<img src="<?= base_url('assets/images/img_4_horizontal.jpg') ?>" alt="Image"
								class="img-fluid">
						</a>
						<span class="date">Apr. 14th, 2022</span>
						<h2><a href="single.html">Don’t assume your user data in the cloud is safe</a></h2>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
						<p><a href="#" class="read-more">Continue Reading</a></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End posts-entry -->

	<!-- Start posts-entry -->
	<section class="section posts-entry">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Culture</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
			</div>
			<div class="row g-3">
				<div class="col-md-9 order-md-2">
					<div class="row g-3">
						<div class="col-md-6">
							<div class="blog-entry">
								<a href="single.html" class="img-link">
									<img src="<?= base_url('assets/images/img_1_sq.jpg') ?>" alt="Image"
										class="img-fluid">
								</a>
								<span class="date">Apr. 14th, 2022</span>
								<h2><a href="single.html">Thought you loved Python? Wait until you meet Rust</a></h2>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis
									inventore vel voluptas.</p>
								<p><a href="single.html" class="btn btn-sm btn-outline-primary">Read More</a></p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="blog-entry">
								<a href="single.html" class="img-link">
									<img src="<?= base_url('assets/images/img_2_sq.jpg') ?>" alt="Image"
										class="img-fluid">
								</a>
								<span class="date">Apr. 14th, 2022</span>
								<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis
									inventore vel voluptas.</p>
								<p><a href="single.html" class="btn btn-sm btn-outline-primary">Read More</a></p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<ul class="list-unstyled blog-entry-sm">
						<li>
							<span class="date">Apr. 14th, 2022</span>
							<h3><a href="single.html">Don’t assume your user data in the cloud is safe</a></h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore
								vel voluptas.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</li>

						<li>
							<span class="date">Apr. 14th, 2022</span>
							<h3><a href="single.html">Meta unveils fees on metaverse sales</a></h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore
								vel voluptas.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</li>

						<li>
							<span class="date">Apr. 14th, 2022</span>
							<h3><a href="single.html">UK sees highest inflation in 30 years</a></h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore
								vel voluptas.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="section">
		<div class="container">

			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Politics</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
			</div>

			<div class="row">
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img
								src="<?= base_url('assets/images/img_7_horizontal.jpg') ?>" alt="Image"
								class="img-fluid"></a>
						<div class="excerpt">


							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img
										src="<?= base_url('assets/images/person_1.jpg') ?>" alt="Image" class="img-fluid">
								</figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
								laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
								aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img
								src="<?= base_url('assets/images/img_6_horizontal.jpg') ?>" alt="Image"
								class="img-fluid"></a>
						<div class="excerpt">


							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img
										src="<?= base_url('assets/images/person_2.jpg') ?>" alt="Image" class="img-fluid">
								</figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
								laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
								aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img
								src="<?= base_url('assets/images/img_5_horizontal.jpg') ?>" alt="Image"
								class="img-fluid"></a>
						<div class="excerpt">


							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img
										src="<?= base_url('assets/images/person_3.jpg') ?>" alt="Image" class="img-fluid">
								</figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
								laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
								aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>


				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img
								src="<?= base_url('assets/images/img_4_horizontal.jpg') ?>" alt="Image"
								class="img-fluid"></a>
						<div class="excerpt">


							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img
										src="<?= base_url('assets/images/person_4.jpg') ?>" alt="Image" class="img-fluid">
								</figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
								laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
								aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img
								src="<?= base_url('assets/images/img_3_horizontal.jpg') ?>" alt="Image"
								class="img-fluid"></a>
						<div class="excerpt">


							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img
										src="<?= base_url('assets/images/person_5.jpg') ?>" alt="Image" class="img-fluid">
								</figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
								laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
								aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img
								src="<?= base_url('assets/images/img_2_horizontal.jpg') ?>" alt="Image"
								class="img-fluid"></a>
						<div class="excerpt">


							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img
										src="<?= base_url('assets/images/person_4.jpg') ?>" alt="Image" class="img-fluid">
								</figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
								laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
								aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>


				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img
								src="<?= base_url('assets/images/img_1_horizontal.jpg') ?>" alt="Image"
								class="img-fluid"></a>
						<div class="excerpt">


							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img
										src="<?= base_url('assets/images/person_3.jpg') ?>" alt="Image" class="img-fluid">
								</figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
								laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
								aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img
								src="<?= base_url('assets/images/img_4_horizontal.jpg') ?>" alt="Image"
								class="img-fluid"></a>
						<div class="excerpt">



							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img
										src="<?= base_url('assets/images/person_2.jpg') ?>" alt="Image" class="img-fluid">
								</figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
								laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
								aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img
								src="<?= base_url('assets/images/img_3_horizontal.jpg') ?>" alt="Image"
								class="img-fluid"></a>
						<div class="excerpt">



							<h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img
										src="<?= base_url('assets/images/person_5.jpg') ?>" alt="Image" class="img-fluid">
								</figure>
								<span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
								<span>&nbsp;-&nbsp; July 19, 2019</span>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
								laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
								aliquid, dicta beatae quia porro id est.</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>

	<div class="section bg-light">
		<div class="container">

			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Travel</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
			</div>

			<div class="row align-items-stretch retro-layout-alt">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title mb-0 text-info">Empty card</h5>
						</div>
						<div class="card-body">
							<table id="example" class="table table-hover" style="width:100%">
								<thead>
									<tr>
										<th colspan="7" class="heading"><span style="float: right">Jquery
												Datatables</span></th>
									</tr>
									<tr class="bg-warning text-dark">
										<th>Order</th>
										<th>Start Date</th>
										<th>Salary</th>
										<th>Name</th>
										<th>Position</th>
										<th>Office</th>
										<th>Age</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($query as $item): ?>
										<tr>
											<td>
												<?= $item->id ?>
											</td>
											<td>
												<?= $item->region_id ?>
											</td>
											<td>
												<?= $item->codentidad ?>
											</td>
											<td>
												<?= $item->entidad ?>
											</td>
											<td>
												<?= $item->titulo_entidad ?>
											</td>
											<td class="text-center">
												<?php
												if ($item->codtipoentidad == NULL) {
												} else {
													echo '<a class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Descargar CV" target="_blank" download="' . $item->codtipoentidad . '" href="' . base_url('/uploads/filescv/' . $item->codtipoentidad) . '"><i class="icon-file-pdf-o" title="' . $item->codtipoentidad . '"></i></a></td>';
												}
												?>
											<td>
												<?= $item->codgestionentidad ?>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>


	<footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="widget">
						<h3 class="mb-4">About</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
							there live the blind texts.</p>
					</div> <!-- /.widget -->
					<div class="widget">
						<h3>Social</h3>
						<ul class="list-unstyled social">
							<li><a href="#"><span class="icon-instagram"></span></a></li>
							<li><a href="#"><span class="icon-twitter"></span></a></li>
							<li><a href="#"><span class="icon-facebook"></span></a></li>
							<li><a href="#"><span class="icon-linkedin"></span></a></li>
							<li><a href="#"><span class="icon-pinterest"></span></a></li>
							<li><a href="#"><span class="icon-dribbble"></span></a></li>
						</ul>
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
				<div class="col-lg-4 ps-lg-5">
					<div class="widget">
						<h3 class="mb-4">Company</h3>
						<ul class="list-unstyled float-start links">
							<li><a href="#">About us</a></li>
							<li><a href="#">Services</a></li>
							<li><a href="#">Vision</a></li>
							<li><a href="#">Mission</a></li>
							<li><a href="#">Terms</a></li>
							<li><a href="#">Privacy</a></li>
						</ul>
						<ul class="list-unstyled float-start links">
							<li><a href="#">Partners</a></li>
							<li><a href="#">Business</a></li>
							<li><a href="#">Careers</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="#">FAQ</a></li>
							<li><a href="#">Creative</a></li>
						</ul>
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
				<div class="col-lg-4">
					<div class="widget">
						<h3 class="mb-4">Recent Post Entry</h3>
						<div class="post-entry-footer">
							<ul>
								<li>
									<a href="">
										<img src="<?= base_url('assets/images/img_1_sq.jpg') ?>" alt="Image placeholder"
											class="me-4 rounded">
										<div class="text">
											<h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
											<div class="post-meta">
												<span class="mr-2">March 15, 2018 </span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="">
										<img src="<?= base_url('assets/images/img_2_sq.jpg') ?>" alt="Image placeholder"
											class="me-4 rounded">
										<div class="text">
											<h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
											<div class="post-meta">
												<span class="mr-2">March 15, 2018 </span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="">
										<img src="<?= base_url('assets/images/img_3_sq.jpg') ?>" alt="Image placeholder"
											class="me-4 rounded">
										<div class="text">
											<h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
											<div class="post-meta">
												<span class="mr-2">March 15, 2018 </span>
											</div>
										</div>
									</a>
								</li>
							</ul>
						</div>


					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
			</div> <!-- /.row -->

			<div class="row mt-5">
				<div class="col-12 text-center">
					<!-- 
			  **==========
			  NOTE: 
			  Please don't remove this copyright link unless you buy the license here https://untree.co/license/  
			  **==========
			-->

					<p>Copyright &copy;
						<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash;
						Designed with love by <a href="https://untree.co">Untree.co</a> Distributed by <a
							href="https://themewagon.com">ThemeWagon</a>
						<!-- License information: https://untree.co/license/ -->
					</p>
				</div>
			</div>
		</div> <!-- /.container -->
	</footer> <!-- /.site-footer -->

	<!-- Preloader -->
	<div id="overlayer"></div>
	<div class="loader">
		<div class="spinner-border text-primary" role="status">
			<span class="visually-hidden">Loading...</span>
		</div>
	</div>

	<script src="<?= base_url('dist/js/jquery-3.7.0.min.js') ?>"></script>
	<script src="<?= base_url('dist/datatables/datatables.min.js') ?>"></script>-->

	<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
	
	<script src="<?= base_url('assets/js/tiny-slider.js') ?>"></script>

	<script src="<?= base_url('assets/js/flatpickr.min.js') ?>"></script>

	<script src="<?= base_url('assets/js/aos.js') ?>"></script>
	<script src="<?= base_url('assets/js/glightbox.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/navbar.js') ?>"></script>
	<script src="<?= base_url('assets/js/counter.js') ?>"></script>
	<script src="<?= base_url('assets/js/custom.js') ?>"></script>

	
	<script>
        //document.addEventListener("DOMContentLoaded", function() {
        // Datatables Responsive
        // https://datatables.net/reference/button/excelHtml5

        //https://www.youtube.com/watch?v=j59H9xnyCBs
        $(document).ready(function () {
            var mytable = $("#example").DataTable({
                deferRender: true,
                responsive: true,
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50],
                scrollH: true,
                scrollX: true,
                order: [],
                stateSave: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
					"paginate": {
                        "previous": "<<",
                        "next": ">>",
                        "first": "<",
                        "last": ">"
                    },
                }
            });

            new $.fn.dataTable.Buttons(mytable, {
                buttons: [
                    'copy', 'pdf',
                    {
                        extend: 'excelHtml5',
                        text: 'Excel',
                        customize: function (xlsx) {
                            var sheet = xlsx.xl.worksheets['sheet1.xml'];
                            //Para ver los estilos de formato https://datatables.net/reference/button/excelHtml5
                            $('row c[r^="B"]', sheet).attr('s', '57');
                            //Para que la columna se muestre como texto https://datatables.net/forums/discussion/73814/export-to-excel-with-format-text-for-column-b-c-and-d
                            $('row c[r^="C"]', sheet).attr('s', '50');
                        }
                    }
                ]
            });

            mytable.buttons().container().appendTo($('tr th.heading', mytable.table().container()));

        });
    </script>
</body>

</html>