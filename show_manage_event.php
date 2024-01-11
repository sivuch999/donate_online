<?php
	$currentUrl = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s://" : "://") . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$urlSegments = explode('/', trim(parse_url($currentUrl, PHP_URL_PATH), '/'));
	$lastSegment = end($urlSegments);
?>
<?php include('db/DB_session_Check.php'); ?>
<?php include('db/DB_manage_show_event.php'); ?>
<html>
	<?php include("header.php"); ?>
	<body class="is-preload">
		<div id="page-wrapper">
			<?php include("navbar.php"); ?>
			<article id="main">
				<header>
					<h3>Management Page</h3>
					<p>สวัสดีครับท่านสมาชิก</p>
					<p><?=$_SESSION['donorname']?></p>
				</header><?php include('alert.php'); ?>
			<?php if ($_SESSION["status"] == "1") { ?>
                <section class="wrapper style5">
                    <div class="inner">
                        <div class="row text-center">
                            <div class="col-md-3">
                                <a href="?page=manage_event">
                                    <label class="form-control btn <?=(($_GET["page"] == "manage_event") ? "btn-dark" : "btn-secondary")?>">Event</label>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="?page=manage_donate_items">
                                    <label class="form-control btn <?=(($_GET["page"] == "manage_donate_items") ? "btn-dark" : "btn-secondary")?>">Donate Items</label>
                                </a>
                            </div>
							<div class="col-md-3">
                                <a href="?page=manage_request_items">
                                    <label class="form-control btn <?=(($_GET["page"] == "manage_request_items") ? "btn-dark" : "btn-secondary")?>">Request Items</label>
                                </a>
                            </div>
							<div class="col-md-3">
                                <a href="?page=manage_banks">
                                    <label class="form-control btn <?=(($_GET["page"] == "manage_banks") ? "btn-dark" : "btn-secondary")?>">Bank Account</label>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <?php if ($_GET["page"] == "manage_event") { include("manage_event.php"); }?>
                            <?php if ($_GET["page"] == "manage_donate_items" || $_GET["page"] == "manage_request_items") { include("manage_donate_items.php"); }?>
							<?php if ($_GET["page"] == "manage_banks") { include("manage_banks.php"); }?>
                        </div>
                    </section>
			<?php } else { ?>
				<h3 class="text-center text-warning m-3">Please wait until the admin confirms the process</h3>
			<?php } ?>
			</article>
			<?php include("footer.php"); ?>
		</div>
	</body>
</html>

<script type="text/javascript"> // ยืนยันว่าต้องการจะ Delete
	function confirmDelete() {
		return confirm('Are you sure you want to delete this event?');
	}
	$('#datatable').DataTable();

	$( '#multiple-select-field' ).select2( {
		theme: "bootstrap-5",
		width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
		placeholder: $( this ).data( 'placeholder' ),
		closeOnSelect: false,
	} );
</script>