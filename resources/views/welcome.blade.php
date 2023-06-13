<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
   

</head>
<body>
    <a href="{{ route('login') }}" class="btn btn-info">Login</a>
    <a href="{{ route('register') }}" class="btn btn-info">Register</a>


        <select class="js-example-basic-single" name="state">
            <option value="AL">Alabama</option>
            <option value="WY">Wyoming</option>
            <option value="WY">Rakib</option>
            <option value="WY">Robin</option>
            <option value="WY">Siam</option>
        </select>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
        <script>
    $(document).ready(function() {
        $('.select-user-for-order').select2();
        tags: true
    });
</script>

</body>
</html>