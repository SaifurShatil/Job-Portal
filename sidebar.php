<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="sidebar.css">
    <title></title>
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
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>
      </ul>

    </nav>

    <div id="side-menu" class="side-nav">
      <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
      <a href="#">Home</a>
      <a href="#">About</a>
      <a href="#">Services</a>
      <a href="#">Contact</a>
    </div>

    <div id="main">
      <h1>Responsive Side Menu</h1>
    </div>

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

  </body>
</html>