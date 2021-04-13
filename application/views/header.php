<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>TimeTrials -- Race against your peers in un-real time.</title>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	<link rel="stylesheet" href="/assets/darkly.css" >
	<link rel="stylesheet" href="https://timetrials.io/assets/tuesday.css">

	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">

	<meta property="og:title" content="TimeTrials.io">
	<meta property="og:description" content="TimeTrials - Race against the clock and your peers!">
	<meta property="og:image" content="https://timetrials.io/assets/images/mountain-climber.png">
	<meta property="og:url" content="https://timetrials.io">

	<style type="text/css">

	@font-face {
	  font-family: animal;
	  src: url("/assets/fonts/animal.woff");
	}

	@font-face {
	  font-family: arcade;
	  src: url("/assets/fonts/arcade.woff");
	}

	h1,h3{
		font-family: "animal";
		text-align: center;
		margin: auto;
	}


	.subheading{
		text-align: center;
		margin: auto;
		font-size:1.5em;
	}

	.container{
		margin-top: 20px;

	}

	.center{
		text-align: center;
	}
	.center-image{
		text-align: center;
		margin: auto;
	}

	.center-image > img{
		width: 80%;
		height: auto;
	}

	.box{
		width: 80%;
		padding: 12px;
		margin-left: 10%;

	}

	.card{
		width: 100%;
	}

	.navbar-brand > img {
		width: 180px;
		height: auto;
	}


	.vspace{
		height: 200px;
	}
	@media screen and (max-width: 600px) {
	  .box {
		width: 100%;
		margin-left: 0%;
	  }

	}

	</style>
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="/"><? echo isset($title) ? $title : 'TimeTrials.io'; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>

			<li class="nav-item">
        <a class="nav-link" href="/race/start">Race!</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/about">About</a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="/contact">Contact</a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a class="btn btn-secondary my-2 my-sm-0" href="/welcome/logout">Logout</a>
    </form>
  </div>
</nav>


<body>
	<div class="container">
