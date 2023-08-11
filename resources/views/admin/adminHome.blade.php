<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
    @section('content') 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in as Admin!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <h1 class="pt-6 text-gray-900 dark:text-gray-100">All Users</h1>
        <table class="min-w-full bg-white text-gray-900 dark:text-gray-100">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b border-gray-200 text-left">Name</th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left">Email</th>
                    <th class="px-6 py-3 border-b border-gray-200 text-left">ETH</th>
                    <!-- Add other fields as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="px-6 py-3 border-b border-gray-200">{{ $user->name }}</td>
                        <td class="px-6 py-3 border-b border-gray-200">{{ $user->email }}</td>
                        <td class="px-6 py-3 border-b border-gray-200">{{ $user->portfolio }}</td>
                        <!-- Add other fields as needed -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
</x-app-layout>