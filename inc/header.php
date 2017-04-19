<?php include "db.php";
if (!$MYACCOUNT && $_SERVER['REQUEST_URI'] != "/login/") header("Location: /login/"); // IF USER IS NOT LOGGED IN -> REDIRECT TO /LOGIN/
else if ($MYACCOUNT && $MYACCOUNT['firstname'] == NULL && $_SERVER['REQUEST_URI'] != "/complete/") header("Location: /complete/");
$data = isset($_GET['data']) ? $_GET['data'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Casting Portal | Chapman University</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <link rel='stylesheet' href='/resources/chapman.css'>
  <!-- <script src="//use.typekit.net/eyn5jyy.js" type="text/javascript"></script> -->
  <!-- <script type='text/javascript'>try {Typekit.load()} catch(e) {}</script> -->
  <script type='text/javascript'>
    function post(url, data, callback) {
      var r = new XMLHttpRequest()
      r.open("POST", url, true)
      r.onreadystatechange = function() {
        if (r.readyState == 4) callback(r.responseText)
      }
      var formData = new FormData();
      for (var key in data) formData.append(key, data[key])
      r.send(formData)
    }

    function parse(form) {
      data = {}
      for (var i = 0; i < form.elements.length; i++) {
        if (form.elements[i].name && form.elements[i].type != 'radio' || (form.elements[i].type == 'radio' && form.elements[i].checked)) {
          data[form.elements[i].name] = form.elements[i].value
        }
      }
      return data
    }

    function addAlert(message) {
      var e = document.createElement('div')
      e.className = "alert-container"
      e.innerHTML = "<div class='alert' onclick='dismissAlert(this.parentElement)'\">"+message+"</div>"
      document.getElementById("alerts").insertBefore(e, document.getElementById("alerts").firstChild)
      setTimeout(function() {
        e.style.height = "73px"
      }, 15)
      if (document.getElementById("alerts").children.length == 1) {
        setTimeout(function() {
          dismissAlert(e)
        }, 2500)
      }
    }

    function dismissAlert(e) {
      if (document.body.contains(e)) {
        e.style.height = "0"
        e.children[0].style.backgroundColor = "rgba(255,255,255,0)"
        e.children[0].style.color = "rgba(0,0,0,0)"
        setTimeout(function() {
          document.getElementById("alerts").removeChild(e)
          var next = document.getElementById("alerts").lastChild
          setTimeout(function() {
            dismissAlert(next)
          }, 1500)
        }, 400)
      }
    }

    function toggleMode(mode) {
      window.location = "/toggle/" + mode + "/"
    }
    </script>
</head>
<body>
  <div id="alerts"></div>
  <div id="header">
    <a href='/' id="cu_logo"></a>
    <div style='text-align:right'>
      <div id='search' class='equal'>
        <select class='type' name='search_type'>
            <option value='All'>All</option>
            <option value='Blog Stories'>Actors</option>
            <option value='Faculty Directory'>Directors</option>
            <option value='Events'>Casting Calls</option>
        </select>
        <input type='text' class='query' placeholder='Search' spellcheck='false' autocomplete='off' maxlength='40' name='email'>
      </div>
      <?php
        if ($MYACCOUNT && $MYACCOUNT['firstname'] != null) {
          if ($MYACCOUNT['mode']) {
            echo "
              <a href='/director/".$MYACCOUNT['d_id']."/' id='account'></a>
            ";
          } else {
              // <select onchange='toggleMode(this.value)' style='background-color:#fff;width: auto;'>
              //     <option value='0' selected>Actor</option>
              //     <option value='1'>Director</option>
              // </select>
            echo "
              <a href='/actor/".$MYACCOUNT['a_id']."/' id='account'></a>
            ";
          }
        }
      ?>
    </div>
  </div>
  <div id='nav'>
    <div class='master'>
      <?php
      if ($MYACCOUNT && $MYACCOUNT['mode']) {
        echo "
          <a href='/create/'>POST CALL</a>
          <a href='/my_calls/'>MY CALLS</a>
        ";
      } else if ($MYACCOUNT && $MYACCOUNT['firstname'] != "") {
        echo "
          <a href='/'>OPEN CALLS</a>
        ";
      } else {
        echo "";
      }
      ?>
    </div>
  </div>
  <div class="master">
