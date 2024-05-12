
<div class="py-5 mx-4 px-4 border-b flex justify-between">
<div class="hidden lg:block" >
        <h2 id="clock" class="text-2xl"></h2>
        <p class="text-sm">{{ date('l, F j, Y') }}</p>
    </div>
    <div>
        <label for="my-drawer-2" class="drawer-button lg:hidden mx-2"><i class="fa-solid fa-bars text-4xl"></i></label>
    </div>
    
    <div class="flex items-center gap-3">
        <div class="flex items-center gap-3 me-3">
            <div>
                <h2 class="font-semibold text-xl">{{$userData->user_name}}</h2>
                <p class="text-sm opacity-55 ps-1">{{$userData->email}}</p>
            </div>
            @if($userData)
                <div>
                    <a href="{{route('logout')}}">Log Out</a>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
      function updateClock() {
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');
        const timeString = `${hours}:${minutes}:${seconds}`;
        document.getElementById('clock').textContent = timeString;
    }

    setInterval(updateClock, 1000);
    updateClock();
</script>