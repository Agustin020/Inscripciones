<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require('vAdmin/libreria.php'); ?>
</head>

<script>
    function clickLink() {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                
               /* Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )*/
            }
        })
    }
</script>

<body>
    <a onclick="clickLink();" id="link" href="b.php">wdwwdwdwdwd</a>
</body>

</html>