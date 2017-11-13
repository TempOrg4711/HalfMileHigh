<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>{pagetitle}</title>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" media="all" href="../../../../css/reset.css" />
        <link rel="stylesheet" type="text/css" media="all" href="../../../../css/text.css" />
        <link rel="stylesheet" type="text/css" media="all" href="../../../../css/style.css" />
        <link rel="stylesheet" type="text/css" media="all" href="../../../../css/lightbox.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bttn.css/0.2.4/bttn.css" />

    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                
                <div class="row">
                    <div class="col-sm-6">
                      <img src="../../../../assets/images/plane.png" alt="Plane" width="100px" height="100px">
                      <h2 id="title">Dove Airport & Flights Info Site</h2>
                    </div>
                    <div class="col-sm-2">
                      <button class="bttn-material-flat bttn-sm bttn-success bttn-block"><a href="/">Homepage</a></button>
                    </div>
                    <div class="col-sm-2">
                      <button class="bttn-material-flat bttn-sm bttn-primary bttn-block"><a href="/flights">Flights</a></button>
                    </div>
                    <div class="col-sm-2">
                      <button class="bttn-material-flat bttn-sm bttn-warning bttn-block"><a href="/fleet">Fleet</a></button>
                    </div>
                </div>
            </div>

            <div id="content">
                {content}
            </div>

            <div id="footer">
              <p>
                Copyright &copy; 2017, Half Mile High (Dove).
              </p>
            </div>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="js/lightbox.min.js"></script>
    </body>
</html>
