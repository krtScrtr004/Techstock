<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Login</title>

	<base href="/Techstock/root/frontend/">
	<link rel="stylesheet" href="<?php echo STYLE_PATH . 'root.css' ?>">
	<link rel="stylesheet" href="<?php echo STYLE_PATH . 'utility.css' ?>">
	<link rel="stylesheet" href="<?php echo STYLE_PATH . 'component.css' ?>">
	<link rel="stylesheet" href="<?php echo STYLE_PATH . 'header.css' ?>">

	<link rel="stylesheet" href="<?php echo STYLE_PATH . 'index.css' ?>">
</head>

<body class="index flex-col">
	<?php require_once COMPONENT_PATH . 'outside-header.php'; ?>

	<main class="banner flex-row center-child black-bg">
		<section class="flex-row">

			<section class="right-pane flex-col center-child">
				<img src="<?php echo htmlspecialchars(LOGO_PATH . 'logo_complete_hor.svg'); ?>" alt="Techstock Logo" title="Techstock Logo" />

				<h3 class="blue-text">Tech You Want. Stock You Need.</h3>
			</section>

			<section class="left-pane center-child">
				<div class="form-wrapper flex-col white-bg">
					<?php include_once COMPONENT_PATH . ($page === 'login' ? 'login-form.php' : 'signup-form.php'); ?>
				</div>
			</section>

		</section>
	</main>

	<script src="<?php echo htmlspecialchars(EVENT_PATH . 'toggle-password.js'); ?>"></script>
</body>

</html>