<?php

class StoreController implements Controller
{
	public static function index(): void
	{
        global $session;

        require_once VIEW_PATH . 'store.php';
	}
}