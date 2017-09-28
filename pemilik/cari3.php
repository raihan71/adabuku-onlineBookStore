<?php include"config.php" ;?>

<style type="text/css">
	.searchform {
		position: relative;
		top: 10px;
	}
	.searchform input[type="text"]{
		background-color: #EBEBEB;
		height: auto;
		-webkit-border-radius: 0;
		-moz-border-radius: 0;
		border-radius: 0;
		margin-bottom: 0;
		padding: 7px;
		border: none;
		float: left;
		color: black;
		width: 25%;
		height: 34px;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}
	.input[type="submit"]{
		background-color: #6B6B6B;
		border: none;
		padding: 7px;
		color: #fff;
		height: 34px;
		position: absolute;
		bottom: 0;
		right: 0;
		margin: 0;
	}
</style>
<form class="searchform" action="cari-action3.php" method="get">
	<input type="text" name="cari">
	<input type="submit" value="Cari" title="Cari.." class="button-default-search">
</form>