 <html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <a href="/">
                            
                            <h1>Contact System</h1>
                        </a>
                    </div>
                
                    <div class="col-8 d-flex justify-content-end">
                        @auth
                        <a class="p-2" href="/create">Add Contact</a>
                        <a class="p-2" href="/">Contacts</a>
                        <a class="p-2" href="/logout">Logout</a>
                        @endauth
                    </div>
                
                </div>
            </div>
        @show
 
        <div class="container pt-5">
            @yield('content')
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
            $('#search').on('keyup', function(){
                let query = $('#search').val();
                if (query.length >= 2) {
                searchContacts(query);
            } else if (query.length === 0) {
                resetSearch();
            }
                
            });

            function searchContacts(query) {
            $.ajax({
                url: "/filter",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {query: query},
                success: function (data) {
                    console.log(data)
                    $('#contacts-table-body').empty();
                    $.each(data.data, function (index, row) {
                        
                        var html = `
                            <tr>
                                <td>${row.name}</td>
                                <td>${row.company}</td>
                                <td>${row.phone}</td>
                                <td>${row.email}</td>
                                <td>
                                    <a href="${row.id}/edit" class="btn btn-primary">Edit</a>
                                    <form action="destroy/${row.id}" method="post">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        `;
                        $('#contacts-table-body').append(html);
                    });
                },
                error: function (xhr, status, error) {
                    // Handle the error if any
                    console.error(error);
                }
            });
        }

        function resetSearch() {
            location.reload();
        }

            
            </script>
    </body>
</html>