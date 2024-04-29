<?php
session_start();

if (isset($_GET['userId'])) {

    $userid = $_GET['userId'];
    // echo $_GET['userId'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            showAll()

            function showAll() {
                $.ajax({

                    url: '../ajax-file/ajax.php',
                    type: 'GET',
                    data: {
                        userId: <?php echo $userid; ?>
                    },
                    success: function(resp) {

                        console.log(resp);
                    }
                })
            }
        })
    </script>
</body>

</html>