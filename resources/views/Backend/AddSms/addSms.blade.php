@extends("Backend.app")
@section('title')
Add SMS
@endsection
@section('dashboard')
@include('message.message')
<div>
    <h4 class="mx-5 mt-4">Add SMS</h4>
</div>
<div class="mx-5 mt-10 border border-dashed p-5">
    <form action="{{route('update.user')}}" method="post" class="">
        @csrf
        @method('put')
        <div>
            <label for="user_name">User Name:</label>
            <select id="user_name" name="user_name" class="select select-accent w-full " onchange="fillUserId()">
                <option disabled selected>Select User</option>
                @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->user_name}}</option>
                @endforeach
                
            </select>
        </div>
        <div>
            <input id="user_id" name="user_id" class="hidden" type="text">
        </div>
        <div class="mt-5">
            <label for="sms">SMS:</label>
            <input id="sms" placeholder="Add SMS" name="sms" class="input input-bordered input-accent w-full" type="text">
        </div>
        <div></div>
        <div class="flex justify-end mt-5">
            <button type="submit" class="btn w-72 bg-[#09605A] hover:bg-[#09605A]  text-white text-xl">
                Add SMS +
            </button>
        </div>
    </form>

</div>

<script>
    function fillUserId() {
        var userIdInput = document.getElementById('user_id');
        var userNameSelect = document.getElementById('user_name');
        userIdInput.value = userNameSelect.value;
    }
</script>
@endsection