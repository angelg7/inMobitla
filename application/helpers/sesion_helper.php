<?php

	session_start();

	if (!isset($_SESSION['id']) && !defined('NOLOGIN')) {
		redirect('welcome');
	}