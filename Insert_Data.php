<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>
    .pagination {

        display: block;
        text-align: center;
        margin: 15px;
    }

    .pagination li {
        width: 20px;
        display: inline-block;
        background: #77e8f9;
        margin: 0 5px 0 0;
        cursor: pointer;
    }

    .pagination li a {
        border: none;
        color: #fff;
    }
    </style>
</head>

<body>
    <div class="uper">

        <h1>
            Php With Ajax

        </h1>


        <div id="form" style="height: auto;">
            <center>
                <label for="" id='fname' name='fname'>First name: </label><input type="text" id="namef">
                <label for="" id='lname' name='lname'>Last name: </label><input type="text" id="namel">
                <button type="submit" id="submit">Add</button>
                <button type="submit" id="load">load</button>

            </center>
            <br><br>
            <center>
                <label>search</label>
                <input type="text" name="" id="search">
            </center>
        </div>
    </div>
    <div id="table1">

    </div>
    <div id="error_message"></div>
    <div id="success_message"></div>
    <div id="modal">
        <div id="modal-form">
            <h2 style="text-align: center;">Edit Form</h2>
            <table cellpadding="0" width="100%">

            </table>
            <div id="close-btn">X</div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        function loadtable(page) {
            $.ajax({
                url: 'ajax_load.php',
                type: 'post',
                data: {
                    page: page
                },
                success: function(data) {
                    $('#table1').html(data)
                }
            })
        };
        $('#load').click(function() {
            $('#success_message').html("Data Load succesfully").slideDown()

            $('#error_message').slideUp()
            setTimeout(function() {
                $('#success_message').html("Data Load succesfully").slideUp()
            }, 5000);
            loadtable();
        })
        $('#submit').click(function(e) {
            e.preventDefault();
            var fname = $('#namef').val();
            var lname = $('#namel').val();
            if (fname == '' || lname == '') {
                $('#error_message').html("All Filed Are requires").slideDown();
                $('#success_message').slideUp()
                setTimeout(function() {
                    $('#error_message').html("All Filed Are requires").slideUp();
                }, 5000);
            } else {
                $.ajax({
                    url: 'data.php',
                    type: 'POST',
                    data: {
                        first_name: fname,
                        last_name: lname
                    },
                    success: function(data) {
                        if (data) {
                            $('#namef').val('')
                            $('#namel').val('')
                            $('#success_message').html("Data Enter SuccesFully").slideDown()
                            $('#error_message').slideUp()
                            setTimeout(function() {
                                $('#success_message').html("Data Enter SuccesFully")
                                    .slideUp();
                            }, 5000);
                            loadtable(1);

                        } else {
                            $('#error_message').html("Can't Save Record").slideDown()
                            $('#success_message').slideUp()
                            setTimeout(function() {
                                $('#error_message').html("Can't Save Record").slideUp()
                            }, 5000);
                        }
                    }
                })
            }
        })
        $(document).on('click', '.delete-btn', function() {
            if (confirm("Do you Want to Delete this Recode ")) {
                var id = $(this).data('id')
                var element = this
                $.ajax({
                    url: 'Delete_data.php',
                    type: 'post',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data) {
                            $(element).closest("tr").fadeOut();
                        } else {
                            $('#error_message').html("Can't Delete Recode ").slideDown();
                            $('#success_message').slideUp()
                            setTimeout(function() {
                                $('#error_message').html("Can't delete Record").slideUp()
                            }, 5000);
                        }
                    }
                })
            }
        })
        $(document).on('click', '.update-btn', function() {

            var id = $(this).data('id');
            $.ajax({
                url: 'load-update-form.php',
                method: 'POST',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#modal-form table').html(data);
                    $('#modal').show()
                }
            })

        })
        $(document).on('click', '#close-btn', function() {
            $('#modal').hide();
        })
        $(document).on('click', '.pagination li ', function(e) {
            e.preventDefault()
            var page = $(this).attr('id');
            loadtable(page);
        })
        $(document).on('click', '#edit-submit', function() {
            var id = $('#edit-id').val();
            var fname = $('#edit-fname').val();
            $.ajax({
                url: 'update-data.php',
                method: 'POST',
                data: {
                    id: id,
                    name: fname
                },
                success: (function(data) {
                    if (data) {
                        $('#modal').hide()
                        loadtable(1);
                    } else {

                    }
                })
            })
        })
        $('#search').on('keyup', function() {
            var text = $(this).val()
            $.ajax({
                url: 'live-search.php',
                method: 'POST',
                data: {
                    text: text
                },
                success: function(data) {
                    $('#table1').html(data)
                }
            })
        })
    })
    </script>
</body>

</html>