@extends("Backend.app")
@section('title')
Add Message
@endsection
@section('dashboard')
@include('message.message')
<div>
    <h4 class="mx-5 mt-4">Add English Messages</h4>
</div>
<div>
    <p class="text-xl text-center text-red-500">প্রতি ১৩০ টি ওয়ার্ডের জন্য একটি করে মেসেজ কাউন্ট করা হবে</p>
</div>
<div class="mx-5 mt-10 border border-dashed p-5">
    <form action="{{ route('post.message') }}" method="post">
        @csrf
        <div>
            <label class="">Message Type:</label>
            <input name="message_type" class="input input-bordered p-3 w-full bg-[#09605A1A] text-black mt-3"
                type="text">
        </div>

        <div class="mt-5 relative">
            <label class="">Message:</label>
            <textarea id="message" name="message"
                class="textarea textarea-bordered w-full bg-[#09605A1A] text-black mt-3 lg:h-[500px]"
                oninput="countCharacters()"></textarea>
            <span id="wordCount" class="absolute bottom-5 right-5 text-sm text-gray-500">Word count: 0</span>
            <input name="message_count" id="message_count" class="hidden" type="text">
        </div>
        <div>
            <input name="user_id" value="{{$userData->id}}" class="hidden" type="text">
        </div>
        <div class="flex justify-end mt-5">
            <button type="submit" class="btn w-72 bg-[#09605A] hover:bg-[#09605A]  text-white text-xl">
                Add Messages +
            </button>

        </div>
    </form>

</div>
<script>
    function countCharacters() {
        const messageTextarea = document.getElementById('message');
        const message = messageTextarea.value;
        const trimmedMessage = message.trim();
        const characterCount = trimmedMessage.length;
        const numMessages = Math.ceil(characterCount / 130); // Calculate number of messages based on 130-character chunks
        document.getElementById('wordCount').innerText = `${numMessages} message${numMessages > 1 ? 's' : ''}`;
        document.getElementById('message_count').value = numMessages; // Assigning the number of messages to a hidden input field for submission
    }
</script>
@endsection