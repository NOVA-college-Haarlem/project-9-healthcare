<x-base>
    <h1>Welcome to the Inventory!</h1>
    <table class="table table-bordered" style="width: 100%; margin: 0 auto;">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventoryItems as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <div style="display: flex; justify-content:space-between; gap:20px;">
                            <a href="inventor_itemsy/show/{{$item->id}}" class="btn btn-info btn-sm" style="width: 100px">View</a>
                            <a href="inventory_items/edit/{{$item->id}}" class="btn btn-success btn-sm" style="width: 100px">Edit</a>
                            <form action="{{ route('inventory_items.destroy', $item->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" style="width: 100px;">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-base>
