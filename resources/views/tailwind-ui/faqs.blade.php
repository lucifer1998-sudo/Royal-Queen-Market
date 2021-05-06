@extends('tailwind-ui.master.main')

@section('title','FAQs')

@section('content')
    <div class="pt-20 w-full">
        <div class="w-full">
            <div>
                <div class="flex items-center justify-center text-2xl text-rqm-yellow-dark">How can we help you?</div>
                <div class="flex items-center justify-center text-rqm-yellow-dark text-sm">Explore our help and find the answers to your questions</div>
                <div class="px-32 py-20">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-rqm-dark p-2 shadow">
                            <div class="flex text-rqm-yellow-darkest">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                </svg>
                                First Steps
                            </div>
                            <div>
                                <details class="mb-4">
                                    <summary class="text-rqm-yellow text-sm">
                                        You are new here and need help with setting up your profile and placing your first order?
                                    </summary>
                                    <div class="m-2 text-justify text-sm text-white">
                                      Laboris qui labore cillum culpa in sunt quis sint veniam. Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis minim velit nostrud pariatur culpa magna in aute.
                                    </div>
                                </details>
                            </div>
                        </div>
                        <div class="bg-rqm-dark p-2 shadow">
                            <div class="flex text-rqm-yellow-darkest">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                Security
                            </div>
                            <div>
                                <details class="mb-4">
                                    <summary class="text-rqm-yellow text-sm">
                                        You have a question regarding PGP or looking for general security recommendations?
                                    </summary>
                                    <div class="m-2 text-justify text-sm text-white">
                                        Laboris qui labore cillum culpa in sunt quis sint veniam. Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis minim velit nostrud pariatur culpa magna in aute.
                                    </div>
                                </details>
                            </div>
                        </div>
                        <div class="bg-rqm-dark p-2 shadow">
                            <div class="flex text-rqm-yellow-darkest">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Orders
                            </div>
                            <div>
                                <details class="mb-4">
                                    <summary class="text-rqm-yellow text-sm">
                                        For questions about orders, auto-finalize and ratings have a look here.
                                    </summary>
                                    <div class="m-2 text-justify text-sm text-white">
                                        Laboris qui labore cillum culpa in sunt quis sint veniam. Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis minim velit nostrud pariatur culpa magna in aute.
                                    </div>
                                </details>
                            </div>
                        </div>
                        <div class="bg-rqm-dark p-2 shadow">
                            <div class="flex text-rqm-yellow-darkest">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                                Payment
                            </div>
                            <div>
                                <details class="mb-4">
                                    <summary class="text-rqm-yellow text-sm">
                                        Bitcoin and Monero questions or general payment information can be found here.
                                    </summary>
                                    <div class="m-2 text-justify text-sm text-white">
                                        Laboris qui labore cillum culpa in sunt quis sint veniam. Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis minim velit nostrud pariatur culpa magna in aute.
                                    </div>
                                </details>
                            </div>
                        </div>
                        <div class="bg-rqm-dark p-2 shadow">
                            <div class="flex text-rqm-yellow-darkest">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                </svg>
                                Shipping
                            </div>
                            <div>
                                <details class="mb-4">
                                    <summary class="text-rqm-yellow text-sm">
                                        Find information and recommendations about shipping and packaging here.
                                    </summary>
                                    <div class="m-2 text-justify text-sm text-white">
                                        Laboris qui labore cillum culpa in sunt quis sint veniam. Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis minim velit nostrud pariatur culpa magna in aute.
                                    </div>
                                </details>
                            </div>
                        </div>
                        <div class="bg-rqm-dark p-2 shadow">
                            <div class="flex text-rqm-yellow-darkest">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                </svg>
                                Become a Vendor
                            </div>
                            <div>
                                <details class="mb-4">
                                    <summary class="text-rqm-yellow text-sm">
                                        Looking for requirements, rules or other information for vendors?
                                    </summary>
                                    <div class="m-2 text-justify text-sm text-white">
                                        Laboris qui labore cillum culpa in sunt quis sint veniam. Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis minim velit nostrud pariatur culpa magna in aute.
                                    </div>
                                </details>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
