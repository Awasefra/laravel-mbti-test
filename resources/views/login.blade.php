<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login</title>
</head>

<body class="bg-[#05253a] h-screen flex items-center justify-center">
    <div
        class="flex h-screen w-screen 3xl:w-[60%] justify-center items-center bg-no-repeat bg-center bg-cover bg-[#05253a]">
        <div
            class="flex flex-col lg:flex-row w-full md:w-2/6 m-[5vh] md:mx-[12vw] justify-center items-center bg-[#0c3350] shadow-lg rounded-lg">

            <div class="flex w-full  p-6 md:p-12 shadow-none ">
                <div class="w-full ">
                    <div class="flex justify-center mb-6">
                        <p class="block text-white font-sans font-semibold text-2xl">MBTI</p>
                    </div>
                    <h2 class="text-white font-sans font-semibold text-2xl text-center mb-6">Login</h2>
                    @if (session()->has('error'))
                    <div class="text-red-400 text-center text-lg font-bold mb-4">
                        {{ session('error') }}
                    </div>
                    @endif
                    <form action="{{ route('authenticate') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label for="email" class="block itext-sm mb-2 font-light text-white">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2"
                                placeholder="email@email" required autocomplete="off" aria-label="Email">
                        </div>
                        <div class="mb-6">
                            <label for="password" class="block text-sm mb-2 font-light text-white">Password</label>
                            <input type="password" name="password" id="password"
                                class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2"
                                placeholder="Password" required aria-label="Password">
                        </div>
                        <button type="submit"
                            class="text-white font-bold bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none rounded-lg text-sm w-full px-4 py-2 text-center transition duration-200 ease-in-out transform hover:scale-105">Sign
                            in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>