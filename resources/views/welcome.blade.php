<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AWWorld</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/template.css" rel="stylesheet">
    <meta name="_token" content="{!! Crypt::encrypt(csrf_token()) !!}">
</head>
<body id="app-layout">

<div id="wrapper">
    <!-- Page Content -->
    <div id="page-content-wrapper" class="container-fluid ">
        <div class="container-fluid">
            <h1 class="text-center">Loading...</h1>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
        <script type="text/template" id="tpl-countries">
            <h2 class="page-header text-center">List of countries</h2>
            <button type="button" class="btn btn-success btn-sm js-sort-side <%- side == 'server' ? 'active':'' %>" data-toggle="button" aria-pressed="false" autocomplete="off">
                Sort on server side
            </button>
            <hr />
            <table class="table table-hover table-responsive country-container">
                <tr>
                    <td>
                        <a href="/#countries/continent/<%- continentType %>" class="<%- field == 'continent' ? type :'' %>"><span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span> Continent</a>
                    </td>
                    <td>
                        <a href="/#countries/region/<%- regionType %>" class="<%- field == 'region' ? type :'' %>"><span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span> Region</a>
                    </td>
                    <td>
                        <a href="/#countries/countryCount/<%- countryCountType %>" class="<%- field == 'countryCount' ? type :'' %>"><span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span> Countries</a>
                    </td>
                    <td>
                        <a href="/#countries/life/<%- lifeType %>" class="<%- field == 'life' ? type :'' %>"><span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span> Life Duration</a>
                    </td>
                    <td>
                        <a href="/#countries/population/<%- populationType %>" class="<%- field == 'population' ? type :'' %>"><span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span> Population</a>
                    </td>
                    <td>
                        <a href="/#countries/cityCount/<%- cityCountType %>" class="<%- field == 'cityCount' ? type :'' %>"><span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span> Cities</a>
                    </td>
                    <td>
                        <a href="/#countries/languagesCount/<%- languagesCountType %>" class="<%- field == 'languagesCount' ? type :'' %>"><span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span> Languages</a>
                    </td>
                </tr>
            </table>
        </script>
        <script type="text/template" id="tpl-country">
            <td>
                <%- continent %>
            </td>
            <td>
                <%- region %>
            </td>
            <td>
                <%- countryCount %>
            </td>
            <td>
                <%- life %>
            </td>
            <td>
                <%- population %>
            </td>
            <td>
                <%- cityCount %>
            </td>
            <td>
                <%- languagesCount %>
            </td>
        </script>
</div>
<!-- /#wrapper -->

<!-- JavaScripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="/bower_components/underscore/underscore-min.js"></script>
<script src="/bower_components/backbone/backbone-min.js"></script>
<script src="/bower_components/jQuery.serializeObject/dist/jquery.serializeObject.min.js"></script>

<script src="/js/app.js"></script>
<script src="/js/models/country.js"></script>
<script src="/js/collections/countries.js"></script>
<script src="/js/views/country.js"></script>
<script src="/js/views/countries.js"></script>
<script src="/js/router.js"></script>
</body>
</html>
