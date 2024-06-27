{{-- NAV START --}}
<div class="w-full max-w-md mx-auto bg-[#F2F5FE] shadow-lg rounded-lg">
    <div class="border-b">
        <button class="w-full text-left px-4 py-2 focus:outline-none {{ Request::is('site-*') ? 'bg-gray-300 rounded-b' : '' }}" onclick="toggleMenu('main-menu')">
            <span class="font-semibold flex items-center">
                <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" clip-rule="evenodd"/>
                </svg>             
                &nbsp; Dashboard &nbsp;
                <svg id="main-menu-dropdown" class="w-6 h-6 text-gray-800 {{ Request::is('site-*') ? 'hidden' : '' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M18.425 10.271C19.499 8.967 18.57 7 16.88 7H7.12c-1.69 0-2.618 1.967-1.544 3.271l4.881 5.927a2 2 0 0 0 3.088 0l4.88-5.927Z" clip-rule="evenodd"/>
                </svg>
            </span>
        </button>
        <div id="main-menu" class="px-4 py-2 bg-white {{ Request::is('site-*') ? '' : 'hidden' }}{{ Request::is('site-*') ? 'bg-gray-200 rounded-b' : '' }}">
            <ul>
                <a href="/site-dashboard"><li class="py-1">Dashboard</li></a>
                <a href="/site-setting"><li class="py-1">Site Settings</li></a>
                <a href="/site-integration"><li class="py-1">Midtrans Integration</li></a>
            </ul>
        </div>
    </div>
    <div class="border-b">
        <button class="w-full text-left px-4 py-2 focus:outline-none {{ Request::is('transactions/*') ? 'bg-gray-300 rounded-b' : '' }}" onclick="toggleMenu('menu-transaction')">
            <span class="font-semibold flex items-center">
                <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M9 15a6 6 0 1 1 12 0 6 6 0 0 1-12 0Zm3.845-1.855a2.4 2.4 0 0 1 1.2-1.226 1 1 0 0 1 1.992-.026c.426.15.809.408 1.111.749a1 1 0 1 1-1.496 1.327.682.682 0 0 0-.36-.213.997.997 0 0 1-.113-.032.4.4 0 0 0-.394.074.93.93 0 0 0 .455.254 2.914 2.914 0 0 1 1.504.9c.373.433.669 1.092.464 1.823a.996.996 0 0 1-.046.129c-.226.519-.627.94-1.132 1.192a1 1 0 0 1-1.956.093 2.68 2.68 0 0 1-1.227-.798 1 1 0 1 1 1.506-1.315.682.682 0 0 0 .363.216c.038.009.075.02.111.032a.4.4 0 0 0 .395-.074.93.93 0 0 0-.455-.254 2.91 2.91 0 0 1-1.503-.9c-.375-.433-.666-1.089-.466-1.817a.994.994 0 0 1 .047-.134Zm1.884.573.003.008c-.003-.005-.003-.008-.003-.008Zm.55 2.613s-.002-.002-.003-.007a.032.032 0 0 1 .003.007ZM4 14a1 1 0 0 1 1 1v4a1 1 0 1 1-2 0v-4a1 1 0 0 1 1-1Zm3-2a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1Zm6.5-8a1 1 0 0 1 1-1H18a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-.796l-2.341 2.049a1 1 0 0 1-1.24.06l-2.894-2.066L6.614 9.29a1 1 0 1 1-1.228-1.578l4.5-3.5a1 1 0 0 1 1.195-.025l2.856 2.04L15.34 5h-.84a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                </svg>                  
                &nbsp; Transaction &nbsp;
                <svg id="menu-transaction-dropdown" class="w-6 h-6 text-gray-800 {{ Request::is('transactions/*') ? 'hidden' : '' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M18.425 10.271C19.499 8.967 18.57 7 16.88 7H7.12c-1.69 0-2.618 1.967-1.544 3.271l4.881 5.927a2 2 0 0 0 3.088 0l4.88-5.927Z" clip-rule="evenodd"/>
                </svg>
            </span>
        </button>
        <div id="menu-transaction" class="px-4 py-2 bg-white {{ Request::is('transactions/*') ? '' : 'hidden' }}{{ Request::is('transactions/*') ? 'bg-gray-200 rounded-b' : '' }}">
            <ul>
                <a href="/transactions/lists"><li class="py-1">All Transactions</li></a>
                <a href="/transactions/add-invoice"><li class="py-1">Create Invoice</li></a>
                <a href="#"><li class="py-1">Invoice Setting</li></a>
            </ul>
        </div>
    </div>
    <div class="border-b">
        <button class="w-full text-left px-4 py-2 focus:outline-none {{ Request::is('user/*') ? 'bg-gray-300 rounded-b' : '' }}" onclick="toggleMenu('menu-user')">
            <span class="font-semibold flex items-center">
                <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
                </svg>                  
                &nbsp; Users &nbsp;
                <svg id="menu-user-dropdown" class="w-6 h-6 text-gray-800 {{ Request::is('user/*') ? 'hidden' : '' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M18.425 10.271C19.499 8.967 18.57 7 16.88 7H7.12c-1.69 0-2.618 1.967-1.544 3.271l4.881 5.927a2 2 0 0 0 3.088 0l4.88-5.927Z" clip-rule="evenodd"/>
                </svg>
            </span>
        </button>
        <div id="menu-user" class="px-4 py-2 bg-white {{ Request::is('user/*') ? '' : 'hidden' }}{{ Request::is('user/*') ? 'bg-gray-200 rounded-b' : '' }}">
            <ul>
                <a href="/user/lists"><li class="py-1">All Users</li></a>
                <a href="$"><li class="py-1">Add Users</li></a>
                <a href="#"><li class="py-1">Your Profile</li></a>
            </ul>
        </div>
    </div>
</div>
{{-- NAV END --}}