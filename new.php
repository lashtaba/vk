<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.11/handlebars.js"></script>
    <script
      src="http://code.jquery.com/jquery-3.3.1.js"
      integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
      crossorigin="anonymous"></script>
    <script src="scripts.js"></script>
    <title>Hello, world!</title>
  </head>

  <body>

    <div class="container-fluid">
      <div class="row">
        <div class="col-2 menu">

          <form id="btngroups" class="GetGroupsForm">
            <input type="submit" value="Получить список групп" class="btn btn-outline-success">
          </form>

             

          
        </div>
        <div class="col area">
          <div class="row">
            <div class="col-5 groups table-responsive" id="groups">
            </div>
            <div class="col-6 posts">

            </div>
              
          </div>
        </div>
      </div>
    </div>

<script id="entry-template" type="text/x-handlebars-template">
  <form action="function.php" method="get" id="btnposts">
    {{#each response}}
    <label><input type="checkbox" name={{screen_name}} value={{gid}}><img src={{photo}} alt={{screen_name}}> {{name}}</label><br>
    {{/each}}
    <input type="submit" value="Посты" class="btn btn-outline-success">
  </form>
</script>

<script>
$(document).ready(function(){
  $( "#btngroups" ).submit(function( event ) {
      event.preventDefault();

    $.ajax({
      type: 'get',
      url: 'function.php',
      data: {'getGroups':'yes'},
      contentType: false,
      cache: false,
      proccessData: true,
      success: function(data) {
        var json = JSON.parse(data);
        var source   = document.getElementById("entry-template").innerHTML;
        var template = Handlebars.compile(source);
        var html    = template(json);
        $('#groups').append(html);
      }
    })
  });

$(document).on('submit', '#btnposts', function() {
    event.preventDefault();
    var data = $('#btnposts').serialize();
    $.ajax({
      type: 'get',
      url: 'function.php',
      data: 'getPosts=yes&'+data,
      contentType: false,
      cache: false,
      proccessData: true,
      success: function(result) {
        alert(result);
      }
    })
  });


})
</script>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>