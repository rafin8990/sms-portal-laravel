<div class="drawer-side">
    <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
    <ul class="menu p-4 w-80 min-h-full bg-[#09605A] lg:bg-[#09605A1A] flex flex-col">
        <li><a href="/dashboard" class="text-[20px] mt-3 text-white lg:text-black py-3.5"><img src="{{asset('/icons/Group.png')}}" alt="home icon"> Dashboard</a></li>

        <li><a href="/dashboard/add-contact" class="text-[20px] mt-3 py-3.5 text-white lg:text-black"> <img src="{{asset('/icons/Vector.png')}}" alt=" mobile icon"> Add Contact</a></li>
        <li><a href="{{route('delete.contact.table')}}" class="text-[20px] mt-3 py-3.5 text-white lg:text-black"> <i class="fa-solid fa-trash"></i> Delete Contact</a></li>

        <li><a href="{{route('send.Message')}}" class="text-[20px] mt-3 py-3.5 text-white lg:text-black"><img src="{{asset('/icons/call.png')}}" alt=" mobile icon">   Send Message</a></li>

        <li><a href="#" class="text-[20px] mt-3 py-3.5 text-white lg:text-black">  <img src="{{asset('/icons/inbox-black.svg')}}" alt=" mobile icon"> <span class="mx-2">Add Message</span></a>
            <ul id="send-messages-menu" class="hidden bg- py-2   border-s-2 border-[#09605A]">
                <li><a href="{{ route('banglaMessage') }}" class="block px-4 text-gray-800 hover:bg-[#09605A] rounded-sm py-3.5 hover:text-white">Bangla Message</a></li>
                <li><a href="{{ route('engMessage') }}" class="block px-4  text-gray-800 hover:bg-[#09605A] rounded-sm py-3.5 hover:text-white">English Message</a></li>
            </ul>
        </li>

        @if($userData && $userData->role === 'admin')
            <li><a href="#" class="text-[20px] mt-3 py-3.5 text-white lg:text-black flex items-center"> <i class="fa-solid fa-gear text-2xl mr-2"></i> <span class="mx-2">Settings</span></a>
                <ul id="settings-menu" class="hidden bg- py-2   border-s-2 border-[#09605A]">
                    <li><a href="{{ route('addUserForm') }}" class="block px-4 text-gray-800 hover:bg-[#09605A] rounded-sm py-3.5 hover:text-white">Add User</a></li>
                    <li><a href="{{ route('add.sms') }}" class="block px-4  text-gray-800 hover:bg-[#09605A] rounded-sm py-3.5 hover:text-white">Add SMS</a></li>
                </ul>
            </li>
        @endif
        
        
    </ul>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addMessageLink = document.querySelector('.menu li:nth-child(5) a');
        const sendMessagesMenu = document.getElementById('send-messages-menu');
        const settingsLink = document.querySelector('.menu li:nth-child(6) a');
        const settingsMenu = document.getElementById('settings-menu');

        addMessageLink.addEventListener('click', function(event) {
            event.preventDefault(); // Prevents the default action of the link
            sendMessagesMenu.classList.toggle('hidden');
        });

        settingsLink.addEventListener('click', function(event) {
            event.preventDefault();
            settingsMenu.classList.toggle('hidden');
        });
    });
</script>