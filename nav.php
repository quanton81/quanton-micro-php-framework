<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Bootstrap Test</title>
        <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
        <style>
            .navbar-nav > li {
                float: none;
                vertical-align: bottom;
            }
            .navbar-nav > li.active {
                border-bottom: 2px solid #666633;
            }
            #site-logo {
                position: relative;
                vertical-align: bottom;
                bottom: -35px;
            }
            #site-logo a {
                margin-top: -53px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Navigazione</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav nav-justified navbar-nav center-block">
                        <li class="active"><a href="#">Un primo Link</a></li>
                        <li><a href="#">Un secondo Link</a></li>
                        <li><a href="#">Un terzo Link</a></li>
                        <li id="site-logo" class="hidden-xs"><a href="#"><img id="logo-navbar-middle" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/32877/logo-thing.png" width="200" alt="Logo Thing main logo"></a></li>
                        <li><a href="#">Un quarto Link</a></li>
                        <li><a href="#">Un quinto Link</a></li>
                        <li class="hidden-xs" style="visibility: hidden;"><a href="#">Un sesto Link</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <scripts>
            <script type="text/javascript" src="./jquery/jquery.js"></script>
            <script type="text/javascript" src="./bootstrap/js/bootstrap.js"></script>
            <script type="text/javascript">
                $(document).ready(function () {

                });
            </script>
        </scripts>
    </body>
</html>
