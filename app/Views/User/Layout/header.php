<!DOCTYPE html>
<html>
<head>
	<title><?= $title; ?></title>
	<!-- Include Bootstrap CSS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
	<!-- font awesome -->
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'>

	<!-- data table -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
  
	<!-- sweet alert -->
	<script src="
	https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js
	"></script>
	<link href="
	https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.min.css
	" rel="stylesheet">

	<!-- title style -->
	<style>
		
		.main-content{
			max-width: 100%; /* Adjust the maximum width as needed */
      margin: 0 auto; /* Center the content horizontally */
      padding: 10px; /* Add padding to the content */
		}
	</style>
	<!-- sidebar style -->
	<style>
		.sidebar-wrap {
			width: 240px;
			height: 100vh;
			background-color: #000;
			color: #fff;
			padding: 10px;
			transition: 0.8s;
		}
		.sidebar-wrap:hover {
			width: 240px;
		}
		.sidebar-wrap:hover .logo-wrap span {
			display: flex;
		}
		.sidebar-wrap:hover .nav li .nav-link span {
			display: flex;
		}
		.sidebar-wrap:hover .dropdown-wrap strong {
			display: flex;
		}
		.sidebar-wrap:hover .dropdown-wrap::after {
			display: inline-block;
		}
		.sidebar-wrap:hover .dropdown-wrap {
			justify-content: flex-start;
		}
		.sidebar-wrap .logo-wrap {
			color: #fff;
			font-size: 35px;
			display: flex;
			align-items: center;
			gap: 4px;
		}
		.sidebar-wrap .logo-wrap span {
			font-size: 18px;
		}
		.sidebar-wrap .logo-wrap .icon-wrap {
			display: flex;
			align-items: center;
			justify-content: center;
			height: 40px;
			min-width: 40px;
		}
		.sidebar-wrap .nav {
			height: 100%;
			overflow-x: hidden;
			overflow-y: auto;
			flex-wrap: nowrap;
		}
		.sidebar-wrap .nav::-webkit-scrollbar-track {
			-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
			border-radius: 5px;
			background-color: #f5f5f5;
		}
		.sidebar-wrap .nav::-webkit-scrollbar {
			width: 5px;
			background-color: #f5f5f5;
			border-radius: 5px;
		}
		.sidebar-wrap .nav::-webkit-scrollbar-thumb {
			border-radius: 5px;
			-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
			background-color: #9b9b9b;
		}
		.sidebar-wrap .nav li {
			margin-top: 5px;
		}
		.sidebar-wrap .nav li .nav-link {
			color: #fff;
			padding: 0;
			font-size: 20px;
			display: flex;
			align-items: center;
			gap: 5px;
		}
		.sidebar-wrap .nav li .nav-link .icon-wrap {
			display: flex;
			align-items: center;
			justify-content: center;
			height: 40px;
			min-width: 40px;
		}
		.sidebar-wrap .nav li .nav-link span {
			font-size: 16px;
		}
		.sidebar-wrap .nav li .nav-link.active {
			background-color: #ffa200;
		}
		.sidebar-wrap .nav li .nav-link:hover {
			background-color: #ffa200;
		}
		.sidebar-wrap .dropdown-wrap {
			display: flex;
			align-items: center;
			color: #fff;
			gap: 15px;
			font-size: 16px;
		}
		.sidebar-wrap .dropdown-wrap .icon-wrap {
			min-width: 40px;
			height: 40px;
			display: flex;
			align-items: center;
			justify-content: center;
		}
	</style>
	<!-- modal style -->
	<style>
		/* CSS for the modal */
		.modal {
				display: none;
				position: fixed;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				background-color: rgba(0,0,0,0.7);
		}

		.modal-content {
				background-color: #fff;
				margin: 15% auto;
				padding: 20px;
				border: 1px solid #888;
				width: 90%;
				position: relative;
		}

		.close {
				position: absolute;
				top: 0;
				right: 0;
				padding: 10px;
				cursor: pointer;
		}
	</style>

</head>
<body>
	<div class="d-flex">
