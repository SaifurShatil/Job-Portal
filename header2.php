<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="sidebar.css">
  <link rel="stylesheet" href="job.css">
    <script>
       function openSlideMenu() {
         document.getElementById('side-menu').style.width='250px';
         document.getElementById('main').style.marginLeft='250px';
       }
       function closeSlideMenu() {
         document.getElementById('side-menu').style.width='0';
         document.getElementById('main').style.marginLeft='0';
       }

    </script>
    <title>Student</title>
  </head>
  <body>
    <nav class="navbar">
      <span class="open-slide">
        <a href="#" onclick="openSlideMenu()">
          <svg width="30" height="30">
             <path d="M0,5 30,5" stroke="#fff" stroke-width="5"/>
             <path d="M0,14 30,14" stroke="#fff" stroke-width="5"/>
             <path d="M0,23 30,23" stroke="#fff" stroke-width="5"/>
          </svg>
        </a>
      </span>

      <ul class="navbar-nav">
        <li><a href="index.html">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="search2.php">Search</a></li>
      </ul>

    </nav>

    <div id="side-menu" class="side-nav">
      <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
      <a href="index.html">Home</a>
      <a href="about.php">About</a>
      <a href="services.php">Services</a>
      <a href="viewjob.php">View Jobs</a>
      <a href="applyjob.php">Apply Job</a>
      <a href="messageview.php">Messages</a>
      <a href="contact.php">Contact</a>
      <a href="search2.php">Search</a>

    </div>
