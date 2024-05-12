@extends("Backend.app")
@section('title')
Add Contact
@endsection
@section('dashboard')

@include('message.message')
<div>
    <h4 class="mx-4 mt-5">All Contact</h4>
</div>
<div class="mx-5 mt-10 border border-dashed p-5">
    <div class="overflow-x-auto">
        <form action="{{ route('delete.multiple.contacts') }}" method="post" id="deleteMultipleContactsForm">
            @csrf
            @method('DELETE')
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <div class="flex items-center">
                                <input type="checkbox" class="checkbox checkbox-accent" id="selectAllContacts" />
                                <p class="mx-2">Select All </p>
                            </div>
                        </th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $data)
                        <tr>
                            <td>
                                <label>
                                    <input type="checkbox" class="checkbox checkbox-accent" name="selectedContacts[]"
                                        value="{{ $data->id }}" />
                                </label>
                            </td>
                            <td>
                                <div class="font-bold">{{ $data->name }}</div>
                            </td>
                            <td>{{ $data->address }}</td>
                            <td>{{ $data->mobile_no }}</td>
                            <td>
                                <form action="{{ route('delete.contact', $data->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex justify-end mt-5">
                <button type="submit" class="btn btn-error text-white mt-2" id="deleteSelectedContacts">Delete
                    Selected</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('selectAllContacts').addEventListener('change', function () {
            var checkboxes = document.querySelectorAll('input[name="selectedContacts[]"]');
            checkboxes.forEach(function (checkbox) {
                checkbox.checked = document.getElementById('selectAllContacts').checked;
            });
        });
    });
</script>
@endsection