
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/template-admin/demo/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/template-admin/demo/assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="/template-admin/demo/assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="/template-admin/demo/assets/vendors/fontawesome/all.min.css">

    <link rel="stylesheet" href="/template-admin/demo/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/template-admin/demo/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/template-admin/demo/assets/css/app.css">
    <link rel="shortcut icon" href="/template-admin/demo/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">

        @include('admin.partials.sidebar')

        @include('admin.partials.header')

        @yield('content')
        
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>

            </div>
        </div>
    </div>
    @stack('addon-script')
    <script src="/template-admin/demo/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/template-admin/demo/assets/js/bootstrap.bundle.min.js"></script>

    <script src="/template-admin/demo/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="/template-admin/demo/assets/js/pages/dashboard.js"></script>
    <script src="/template-admin/demo/assets/vendors/fontawesome/all.min.js"></script>

    <script src="/template-admin/demo/assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="/template-admin/demo/assets/js/main.js"></script>

    <script src="/template-admin/demo/assets/vendors/ckeditor/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>


    @stack('prepend-script')

    
</body>

</html>