@extends('layout')
@section('content')


<div class="mx-4">
    <div class="bg-gray-50 border border-gray-200 p-10 rounded">
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Manage Gigs
            </h1>
        </header>

        <input type="text" class="border border-gray-200 rounded p-2 w-full mb-4" name="search" placeholder="Search by text">
        
        <table class="w-full table-auto rounded-sm">
            <tbody>
                @foreach ($listings as $listing)
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg"><a href="/listing/{{ $listing->id }}">{{ $listing->title }}</a></td>
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <a
                            href="/listings/{{ $listing->id }}/edit"
                            class="text-blue-400 px-6 py-2 rounded-xl"
                            ><i
                                class="fa-solid fa-pen-to-square"
                            ></i>
                            Edit</a
                        ></td>
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <form method="POST" action="/listings/{{ $listing->id }}">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                            </form>

                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const csrf=document.querySelector("meta[name='csrf-token']");
        const searchInput = document.querySelector('input[name="search"]');

        searchInput.addEventListener('keyup', function (event) {
            const searchValue = event.target.value.trim();
            
                fetch('{{ route("search") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrf.content
                    },
                    body: JSON.stringify({
                        search: searchValue
                    })
                })
                   .then(response => {
                    if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                
                    })
                   .then(data => {
                        console.log(data);

                        const searchResults = document.querySelector('table tbody');
                        searchResults.innerHTML = data.html;
                    })
                   .catch(error => console.error(error));
        });
    });
    

</script>
@endsection