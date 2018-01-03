<!doctype html>
<html>
<head>
  <title>A Cretin Do CYOCAR</title>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#username').keyup(function()
    {
      $.post("availuser.php",
    {username : $('#username').val()
    },function(response){
      $('#usernameResult').fadeOut();
      setTimeout("Userresult('usernameResult','"+escape(response)+"')",350);
    });
    return false;
    });
  });
  function Userresult(id,response)
  {
    $('#usernameLoading').hide();
    $('#'+ id).html(unescape(response));
    $('#'+ id).fadeIn();
  }
  </script>
</head>
<body>
<form>
<center>
  <h1>Check Username if Available or Not</h1>
  <h2>Php - MySqli</h2>
  <hr />
  Username : <input type="text" name="username" id="username" placeholder="Enter Username" required />
  <br />
  <div id="usernameLoading"></div>
  <div id="usernameResult"></div>
</center>
</form>
</body>
</html>
