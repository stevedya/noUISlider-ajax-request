<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>

    <!--  Slider CSS -->
    <link href="extras/nouislider.css" rel="stylesheet">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col s6">
            <h1>Test Slider</h1>
            <p>Test paragraph</p>
            <div id="test-slider"></div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row" id="results">

    </div>
</div>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>

<!--No Ui Slider-->
<script src="extras/nouislider.js"></script>
<script>
    var slider = document.getElementById('test-slider');
    noUiSlider.create(slider, {
        start: [20, 80],
        connect: true,
        step: 1,
        orientation: 'horizontal', // 'horizontal' or 'vertical'
        range: {
            'min': 0,
            'max': 100
        },
        format: wNumb({
            decimals: 0
        })
    });

    /*************************************************
     *  COPY FROM HERE DOWN - Replace our old Ajax
     *************************************************/
    slider.noUiSlider.on('update', function (values, handle) {
        // value for updated handle is in values[handle]
        var valueOne = values[0];
        var valueTwo = values[1];
        //aka the get request, goes into the open function
        var url = 'get-books.php?valueOne=' + valueOne + '&valueTwo=' + valueTwo;

        $.ajax({
            url: "get-books.php",
            method: "GET",
            data: 'valueOne=' + valueOne + '&valueTwo=' + valueTwo,
            dataType: "text",
            success: function(result) {
                $('#results').html(result);
            }
        });

    });
</script>
</body>
</html>