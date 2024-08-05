<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>Real-Time Data</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<input type="text" id="searchInput" placeholder="Search...">
<table id="dataTable" border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Name_fa</th>
        <th>Population</th>
        <th>Area</th>
        <th>Latlng</th>
        <th>Timezones</th>
        <th>Flag</th>
    </tr>
    </thead>
    <tbody>
    <!-- Rows will be dynamically added here -->
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#searchInput').on('keyup', function() {
            var query = $(this).val();
            $.ajax({
                url: '/search',
                type: 'GET',
                data: {query: query},
                success: function(response) {
                    // Clear existing rows
                    $('#dataTable tbody tr').remove();

                    // Add new rows based on the response
                    response.forEach(function(item) {
                        var row = '<tr><td>' + item.id + '</td><td>' + item.name + '</td><td>' + item.name_fa + '</td><td>' + item.population + '</td><td>' + item.area + '</td><td>' + item.latlng + '</td><td>' + item.timezones + '</td><td><img src="'+item.flag_img+'"/></td></tr>';
                        $('#dataTable tbody').append(row);
                    });
                }
            });
        });
    });
</script>
</body>
</html>
