<table>
    <thead>
        <th>ID</th>
        <th>fruit</th>
        <th>price</th>
    </thead>
    <tbody>
        @foreach ($fruits as $fruit)
            <tr>
                <td><a href="/fruitdetail/{{ $fruit["id"] }}">{{ $fruit["id"] }}</a></td>
                <td>{{ $fruit["fruitname"] }}</td>
                <td>{{ $fruit["price"] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

