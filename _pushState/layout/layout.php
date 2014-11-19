<!DOCTYPE html>
<html>
<head>
    <title>Index Accueil</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

    <link rel="stylesheet" href="style.css">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>



    <script>
        // THIS IS WHERE THE MAGIC HAPPENS
        $(function() {
            $('nav a').click(function(e) {
                $("#loading").show();
                href = $(this).attr("href");

                loadContent(href);

                // HISTORY.PUSHSTATE
                history.pushState('', 'New URL: '+href, href);
                e.preventDefault();


            });

            // THIS EVENT MAKES SURE THAT THE BACK/FORWARD BUTTONS WORK AS WELL
            window.onpopstate = function(event) {
                $("#loading").show();
                console.log("pathname: "+location.pathname);
                loadContent(location.pathname);
            };

        });

        function loadContent(url){
            // USES JQUERY TO LOAD THE CONTENT
            $.ajax({
                type: "POST",
                url: "ajax/content.php",
                dataType: "json",
                data:{
                    cid : url
                },
                success: function(data){
                    console.log(data);
                    $("#content").html(data);
                    $("#loading").hide();
                }
            });

        }

    </script>



</head>
<body>

<div class="container">
    <div id="loading">Chargement</div>

    <!-- Static navbar -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Project name</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/_pushState/index.php">Index</a></li>
                    <li><a href="/_pushState/page.php">Page</a></li>
                    <li><a href="#">Contact</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li>
                    <li><a href="../navbar-static-top/">Static top</a></li>
                    <li><a href="../navbar-fixed-top/">Fixed top</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>


    <div class="row">
        <div class="col-md-10" id="content">
            <?php
                print($content);
            ?>
        </div>

        <aside class="video col-md-4">
            <object style="height: 390px; width: 640px">
                <param name="movie" value="http://www.youtube.com/v/2AqyHZ7JS1s?version=3&amp;autohide=1&amp;loop=1&amp;iv_load_policy=3&amp;feature=player_embedded">
                <param name="allowFullScreen" value="true">
                <param name="allowScriptAccess" value="always">
                <embed src="http://www.youtube.com/v/2AqyHZ7JS1s?version=3&amp;autohide=1&amp;loop=1&amp;iv_load_policy=3&amp;feature=player_embedded" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="300" height="225">
            </object>

        </aside>

    </div>



</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</body>
</html>

