<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.5/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#09605A1A] ">
@include('message.message')
    <div class="min-h-screen md:flex justify-center items-center">
        <div class="flex items-center justify-center">
            <img src="{{ asset('/icons/login.jpeg') }}" alt="login" class="w-auto mb-8" />
        </div>

        <div class="flex items-center justify-center border border-dashed border-black mx-5">
            <form method="POST" action="{{ route('login.user') }}" class="rounded px-8 pt-6 pb-8 mb-4 max-w-md w-full">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">User Name</label>
                    <div class="relative">
                        <input id="email"  name="user_id" placeholder="Email"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline transition-colors duration-300 ease-in-out"
                             required />
                        @error('email')
                            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                        @enderror

                    </div>
                </div>

                <div class=" mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input id="password" type="password" name="password" placeholder="Password"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required />
                    @error('password')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                @if ($errors->any())
                    <div class="text-red-500">
                        {{ $errors->first() }}
                    </div>
                @endif
                <div class="flex items-center justify-center">
                    <button type="submit"
                        class="transition-all bg-[#09605A1A] hover:bg-[#09605A1A] text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline border border-black w-full">
                        Login
                    </button>


                </div>
            </form>
        </div>
    </div>


</body>


</html>