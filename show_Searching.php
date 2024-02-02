<html>
	<?php session_start(); ?>
	<?php include("header.php")?>
	<?php include('db/DB_show_Searching.php')?>
	<body class="is-preload">
		<div id="page-wrapper">
			<?php include("navbar.php")?>
			<article id="main">
				<header style="background-image: url(images/searching_blackground.png);">
					<h3 style="color: black;">Searching Page</h3>
					<p style="color: black !important;;">สวัสดีครับท่านสมาชิก</p>
				</header><?php include('alert.php'); ?>
				<section class="wrapper style5">
                    <div class="inner">
                        <div class="row text-center">
                            <div class="col-md-6">
                                <a href="?page=searching_user">
                                    <label class="form-control btn <?=((isset($_GET["page"]) && $_GET["page"] == "searching_user") ? "btn-dark" : "btn-secondary")?>">บริจาคให้กับทาง ผู้รับบริจาค</label>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="?page=searching_website">
                                    <label class="form-control btn <?=((isset($_GET["page"]) && $_GET["page"] == "searching_website") ? "btn-dark" : "btn-secondary")?>">บริจาคให้กับทาง Website</label>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <?php if (isset($_GET["page"]) && $_GET["page"] == "searching_user") { include("searching_user.php"); }?>
                            <?php if (isset($_GET["page"]) && $_GET["page"] == "searching_website") { include("searching_website.php"); }?>
                        </div>
					</div>
				</section>
			</article>
			<?php include("footer.php"); ?>
		</div>
	</body>
</html>

<script>
    $('#multiple-select-field').select2( {
		theme: "bootstrap-5",
		width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
		placeholder: $( this ).data( 'placeholder' ),
		closeOnSelect: false,
	});
</script>