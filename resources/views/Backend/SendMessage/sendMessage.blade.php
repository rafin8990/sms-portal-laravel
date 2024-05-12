@extends("Backend.app")
@section('title')
Send Message
@endsection
@section('dashboard')
@include('message.message')

<div class="p-4">
    <h2 class="text-2xl">Send Message</h2>

    <form class="mt-8" action="{{route('get.contact')}}" method="POST">
        @csrf
        <div>
            <div class="">
                <div class="flex flex-col items-center justify-start">
                    <select name="messageType" id="messageType" class="w-full h-10 border border-gray-300 rounded-md px-6 mb-4 ">
                        <option disabled selected>Select a Message Type</option>
                        @foreach($messages as $data)
                            <option value="{{$data->message_type}}">{{$data->message_type}}</option>
                        @endforeach
                    </select>
                </div>
                <div>

                  <input class="hidden" name="message_count" id="message-count" type="text">
                  <input class="hidden" name="user_id" value="{{$userData->id}}" type="text">
                       
                </div>

            </div>
            <div class="">
                <textarea readonly id="message" name="message" cols="30" rows="13"
                    class="textarea textarea-bordered w-full bg-[#09605A1A] text-black lg:h-[300px]"
                    placeholder="Enter your message..."></textarea>
            </div>
            <div>
                <button type="submit"
                    class=" bg-[#09605A] hover:bg-[#09605A] text-white font-bold py-4 px-4 rounded me-auto ">Send
                    Message</button>
            </div>
        </div>


        <div class=" mt-10">
            <div class="table-container overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr class="rounded-md">
                            <th
                                class="px-6 py-4 bg-[#09605A1A] text-left font-medium text-gray-500 capitalize tracking-wider rounded-s-sm">
                                <input id="selectAllCheckbox" type="checkbox" class="checkbox checkbox-accent" />
                            </th>
                            <th
                                class="px-6 py-4 bg-[#09605A1A] text-left font-medium text-gray-500 capitalize tracking-wider">
                                Student</th>
                            <th
                                class="px-6 py-4 bg-[#09605A1A] text-left font-medium text-gray-500 capitalize tracking-wider">
                                Contacts</th>
                            <th
                                class="px-6 py-4 bg-[#09605A1A] text-left font-medium text-gray-500 capitalize tracking-wider">
                                Address</th>
                            <th
                                class="px-6 py-4 bg-[#09605A1A] text-left font-medium text-gray-500 capitalize tracking-wider">
                                Message</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($contacts as  $contact)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input type="checkbox" name="contacts[]" value="{{$contact->mobile_no}}"
                                        class="checkbox checkbox-accent" />
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{$contact->name}}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{$contact->mobile_no}}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{$contact->address}}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input readonly name="text_message" class="text-message border-0 input" type="text">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </form>
</div>


<script>
    const messageTypeSelect = document.getElementById('messageType').addEventListener('change', function () {
        const messageTextarea = document.getElementById('message');
        const textInputs = document.querySelectorAll('.text-message');
        const selectedMessageType = document.getElementById('messageType').value;
        const countMessage=document.getElementById('message-count');
        const selectedMessage = {!! json_encode($messages->keyBy('message_type')->toArray()) !!}[selectedMessageType];
        countMessage.value=selectedMessage.message_count;
        console.log( selectedMessage);
       
        messageTextarea.value = selectedMessage.message;
    
        textInputs.forEach(input => {
            input.value = selectedMessage.message;
        });
    });
</script>
<script>
    const selectAllCheckbox = document.getElementById('selectAllCheckbox');
    const checkboxes = document.querySelectorAll('.checkbox-accent');

    selectAllCheckbox.addEventListener('change', function () {
        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
    });
</script>
@endsection