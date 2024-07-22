<!-- resources/views/contact/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Contacts</title>
</head>
<body>
<h1>Contact List</h1>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Phone</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($contacts as $contact)
        <tr>
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->title }}</td>
            <td>{{ $contact->phone }}</td>
            <td>{{ $contact->email }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
