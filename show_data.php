<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="uper">
    <h1>
        Php With Ajax
    </h1>
    <div class="form">
    <center>
        <button type="submit" id="submit">Load</button>
    </center>
    </div>
</div>
<div id="table1">

</div>
<script>
    $(document).ready(function(){
        $('#submit').click(function(e){
            $.ajax({
                url:'ajax_load.php',
                type:'post',
                success:function(data){
                    $('#table1').html(data)
                }
            })
        })
    })
</script>
</body>
</html>