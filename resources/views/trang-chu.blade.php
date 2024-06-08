<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Sử dụng CDN cho Bootstrap (nếu cần thiết) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-5">
        <h1 class="mb-4">SweetAlert2 Example</h1>
        <button id="alertButton" class="btn btn-primary">Show Alert</button>
    </div>

    <!-- Sử dụng CDN cho SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    document.getElementById('alertButton').addEventListener('click', function() {
        Swal.fire({
            title: 'Success!',
            text: 'This is a SweetAlert2 notification.',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    });
</script>

</body>
</html>
