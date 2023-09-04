<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>User Image</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="{{ asset('css/user_image.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body >
    <h1>User Image</h1>
    <form id="create-user-form" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="city">City:</label>
        <input type="text" id="city" name="city" required><br>
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required><br>
        <button type="submit">Create User</button><br>
        <select class="selectedOrder">
            <option value="desc" selected>DESC</option>
            <option value="asc" >ASC</option>
        </select>
    </form>
    <table id="users-table" class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>City</th>
            <th>Images Count</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
    <div class="divSwitch">
        <div class="pageSwitcher">
            <button type="button" class="previousPage">PREVIOUS</button>
            <div class="page">
                <div class="pagesize currentPage"></div><div class="pagesize">/</div><div class=" pagesize lastPage"></div>
            </div>
            <button type="button" class="nextPage">NEXT</button>
        </div>
    </div>

    </body>
<script src="{{ asset('js/userImage.js')}}" type="text/javascript"></script>
</html>
