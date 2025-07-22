<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Techstock</title>

	<base href="/Techstock/root/frontend/">
	<link rel="stylesheet" href="<?= STYLE_PATH . 'root.css' ?>">
	<link rel="stylesheet" href="<?= STYLE_PATH . 'utility.css' ?>">
	<link rel="stylesheet" href="<?= STYLE_PATH . 'component.css' ?>">
	<link rel="stylesheet" href="<?= STYLE_PATH . 'header.css' ?>">
	<link rel="stylesheet" href="<?= STYLE_PATH . 'footer.css' ?>">

	<link rel="stylesheet" href="<?= STYLE_PATH . 'index.css' ?>">
</head>

<body class="index flex-col">
	<?php include_once COMPONENT_PATH . 'header.php'; ?>

	<main class="lazy-bg flex-row center-child black-bg relative" data-bg="<?= htmlspecialchars(IMAGE_PATH . 'devices.jpg'); ?>">
		<section class="flex-row">

			<section class="right-pane flex-col center-child">
				<img src="<?= LOGO_PATH . 'logo_complete_hor.svg'; ?>" alt="Techstock logo" title="Techstock logo" />

				<h3 class="blue-text">Tech You Want. Stock You Need.</h3>
			</section>

			<section class="left-pane center-child">
				<div class="form-wrapper flex-col white-bg">
					<h3 class="black-text"><?= $component['title']; ?></h3>

					<?php include_once COMPONENT_PATH . $component['form']; ?>
				</div>
			</section>

		</section>
	</main>

	<?php require_once COMPONENT_PATH . 'footer.php' ?>

	<script type="module" src="<?= htmlspecialchars(EVENT_PATH . 'lazy-background.js'); ?>" defer></script>
	<script type="module" src="<?= htmlspecialchars(EVENT_PATH . 'toggle-password.js'); ?>" defer></script>
</body>

</html>