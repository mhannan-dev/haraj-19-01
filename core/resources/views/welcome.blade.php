<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Hello, world!</title>
</head>

<body>
    <h1>Hello, world!</h1>

    <form action="">
        <input class="form-control typeahead" name="search" placeholder="Auto complete search" />
    </form>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js">
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>


    </script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            var route = "{{ url('ads/auto/search') }}";
            $('input.typeahead').typeahead({
                source: function(query, process) {
                    return $.get(route, {
                        term: query
                    }, function(data) {
                        return process(data);
                    });
                }
            });
        });
    </script>
</body>

</html>
