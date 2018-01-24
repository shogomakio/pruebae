    
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/imgareaselect-default.css" />
  <script type="text/javascript" src="scripts/jquery.min.js"></script>
  <script type="text/javascript" src="scripts/jquery.imgareaselect.pack.js"></script>

</head>
<body>

<div class="container">
    <img id="photo" src="https://i.ytimg.com/vi/3R2uvJqWeVg/maxresdefault.jpg">
</div>
<script type="text/javascript">


$(document).ready(function () {
    $('#photo').imgAreaSelect({ x1: 0, y1: 0, x2: 250, y2: 400, maxHeight:400, minHeight:400, maxWidth:250,minWidth:250,
    });
});

$('img#photo').imgAreaSelect({
    onSelectEnd: function (img, selection) {
        alert('width: ' + selection.width + '; height: ' + selection.height);
    }
});

</script>
</body>
</html>
    