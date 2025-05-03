<style>
    .custom-header {
        font-size: 2.5rem; /* Adjust the size as needed */
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold custom-header text-gray-800 leading-tight">
            {{ __('ONLY FOR TECHNICIAN') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>


 <!-- Footer -->
 <footer class="footer">
        <p>&copy; {{ date('Y') }} Maintenance Management System. All rights reserved.</p>
        <!-- <p><a href="#">Privacy Policy</a>  <a href="#">Terms of Service</a></p> -->
    </footer>
