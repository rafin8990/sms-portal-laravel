@extends("Backend.app")
@section('title')
Add User
@endsection
@section('dashboard')
@include('message.message')
<div>
    <h4 class="mx-5 mt-4">Add User</h4>
</div>
<div class="mx-5 mt-10 border border-dashed p-5">
    <form action="{{route('postUser')}}" method="POST" class="">
        @csrf
        <div>
            <label class="">User Name: <span class="text-red-500">*</span></label>
            <input name="user_name" class="input input-bordered p-3 w-full bg-[#09605A1A] text-black mt-3" type="text">
        </div>

        <div class="mt-5 relative">
            <label class="">User Address: <span class="text-red-500">*</span></label>
            <input name="address" class="input input-bordered p-3 w-full bg-[#09605A1A] text-black mt-3" type="text">
        </div>
        <div class="mt-5 relative">
            <label class="">User Email: <span class="text-red-500">*</span></label>
            <input name="email" class="input input-bordered p-3 w-full bg-[#09605A1A] text-black mt-3" type="text">
        </div>
        <div class="mt-5 relative">
            <label class="">User Mobile: <span class="text-red-500">*</span></label>
            <input name="mobile" class="input input-bordered p-3 w-full bg-[#09605A1A] text-black mt-3" type="text">
        </div>
        <div class="mt-5 relative">
            <label class="">SMS: <span class="text-red-500">*</span></label>
            <input name="sms" class="input input-bordered p-3 w-full bg-[#09605A1A] text-black mt-3" type="text">
        </div>
        <div class="mt-5 ">
            <label class="">Select Role: <span class="text-red-500">*</span></label>
            <select name="role" class="select border-[#09605A1A] w-full">
                <option disabled selected>Select A Role</option>
                <option value="admin">Admin </option>
                <option value="user">User</option>
        </div>
        <div class="mt-5 relative">
            <label class="">Password: <span class="text-red-500">*</span></label>
            <input name="password" class="input input-bordered p-3 w-full bg-[#09605A1A] text-black mt-3"
                type="password">
        </div>
        
        <div class="flex justify-end mt-5">
            <button type="submit" class="btn w-72 bg-[#09605A] hover:bg-[#09605A]  text-white text-xl">
                Add User +
            </button>
        </div>
    </form>

</div>

@endsection