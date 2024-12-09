<nav class="fixed top-0 z-50 w-full bg-navside border-b border-gray-200 ">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start">
          <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
            type="button"
            class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg hover:bg-hover sm:hidden  focus:outline-none focus:ring-gray-200">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 17 14">
              <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M1 1h15M1 7h15M1 13h15" />
            </svg>
          </button>
          <a href="/" class="flex md:mr-24 text-white font-sans font-semibold text-xl">MBTI
          </a>
        </div>
        <div class="flex items-center mr-1">
          <div class="flex items-center ml-3">
            <div class=" px-4 py-3" role="none">
              <p class="text-sm text-white font-bold" role="none">
                {{ auth()->user()->name }}
              </p>
  
            </div>
            <div>
              <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300"
                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                  alt="user photo">
              </button>
            </div>
  
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-md shadow "
              id="dropdown-user">
  
              <ul class="" role="none">
                <li>
                  <a href="#"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-hover hover:text-white hover:rounded-t-md"
                    role="menuitem">Settings</a>
                </li>
                <li>
                  <form action="{{ route('logout') }}" method="POST" id="formLogout">
                    @csrf
                    <button type="button" onclick="logout()"
                      class="block px-4 py-2 text-sm text-gray-700 hover:bg-hover hover:text-white hover:rounded"
                      role="menuitem">Sign out</button>
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  
  <script>
    function logout()
  {
      Swal.fire({
          text: "Apakah Anda yakin akan logout?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes",
      }).then((result) => {
          if (result.isConfirmed) {
              document.getElementById('formLogout').submit();
          }
      });
  }
  </script>