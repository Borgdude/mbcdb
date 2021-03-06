<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100,300" rel="stylesheet" type="text/css">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <style>
            html, body {
                height: 100%;
            }


            body {
                margin: 0;
                padding: 0;
                width: 100%;
                /*color: #B0BEC5;*/
                display: table;
                font-weight: 300;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            @yield('style')

            .title {
                font-size: 36px;
                margin: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">
									<div class="alert alert-danger">
                  	@yield('message')
									</div>
                </div>
              	@yield('buttons')
            </div>
        </div>
    </body>
</html>

{{-- example of a large red button for cancels and such --}}
{{-- <a href="#" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete User</a> --}}

{{-- large blue '<- back' button --}}
{{-- <a href="#" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</a> --}}

{{-- 'back to safety' button --}}
{{-- <button type="button" class="btn btn-primary" onClick="location='/home'" name="button"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back to Safety</button> --}}
