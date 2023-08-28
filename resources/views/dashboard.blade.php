<x-app-layout>
    <!-- static method for get all prescriptions-->
    @php

    if(auth()->user())
    {
        $prescriptions = App\Services\prescriptionService::prescriptionByUser(auth()->user());
    }
    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <!--User-->
                @can('user-only')
                    @if(count($prescriptions) > 0)
                        <x-slot name="header">
                            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                {{ __('User Dashboard') }}
                            </h2>
                        </x-slot>
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="shadow overflow-hidden rounded border-b border-gray-200">
                                <table class="w-full bg-white table-auto">
                                    <thead class="bg-gray-800 text-white">
                                        <tr>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">User Name</th>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Delivery Address</th>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Delivery Time</th>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Note</th>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Status</th>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Created At</th>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($prescriptions as $prescription)
                                            <tr>
                                                <td class="w-1/3 text-left py-3 px-4">{{$prescription->user->name}}</td>
                                                <td class="w-1/3 text-left py-3 px-4">{{$prescription->delivery_address}}</td>
                                                <td class="w-1/3 text-left py-3 px-4">{{$prescription->delivery_time}}</td>
                                                <td class="w-1/3 text-left py-3 px-4">{{$prescription->note}}</td>
                                                <td class="w-1/3 text-left py-3 px-4">{{ucfirst($prescription->status)}}</td>
                                                <td class="w-1/3 text-left py-3 px-4">{{$prescription->created_at}}</td>
                                                <td class="w-1/3 text-left py-3 px-4">{{ucfirst($prescription->created_at)}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <h1 class="p-5">No Prescriptions to Show</h1>
                    @endif
                @endcan

                <!--Pharmacy-->
                @can('pharmacy-only')
                    @if(count($prescriptions) > 0)
                        <x-slot name="header">
                            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                {{ __('Pharmacy Dashboard') }}
                            </h2>
                        </x-slot>
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="shadow overflow-hidden rounded border-b border-gray-200">
                                <table class="w-full bg-white">
                                    <thead class="bg-gray-800 text-white">
                                        <tr>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">User Name</th>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Delivery Address</th>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Delivery Time</th>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Note</th>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Status</th>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Created At</th>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($prescriptions as $prescription)
                                            <tr>
                                                <td class="w-1/3 text-left py-3 px-4">{{$prescription->user->name}}</td>
                                                <td class="w-1/3 text-left py-3 px-4">{{$prescription->delivery_address}}</td>
                                                <td class="w-1/3 text-left py-3 px-4">{{$prescription->delivery_time}}</td>
                                                <td class="w-1/3 text-left py-3 px-4">{{$prescription->note}}</td>
                                                <td class="w-1/3 text-left py-3 px-4">{{ucfirst($prescription->status)}}</td>
                                                <td class="w-1/3 text-left py-3 px-4">{{$prescription->created_at}}</td>
                                                @if($prescription->status == 'progress')
                                                    <td class="w-1/3 text-left py-3 px-4">
                                                        <a href="{{route('quotation.create',['id' => $prescription->id]) }}" class="w-1/3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                            Quotation
                                                        </a>
                                                    </td>
                                                @else
                                                        <td class="w-1/3 text-left py-3 px-4">{{ucfirst($prescription->status)}}</td>
                                                @endif
                                                    
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <h1 class="p-5">No Prescriptions to Show</h1>
                    @endif
                @endcan

                <!--Admin-->
                @can('admin-only')
                    @if(count($prescriptions) > 0)
                        <x-slot name="header">
                            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                {{ __('Pharmacy Dashboard') }}
                            </h2>
                        </x-slot>
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="shadow overflow-hidden rounded border-b border-gray-200">
                                <table class="w-full bg-white">
                                    <thead class="bg-gray-800 text-white">
                                        <tr>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">User Name</th>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Delivery Date</th>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Delivery Time</th>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Note</th>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Status</th>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Created At</th>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($prescriptions as $prescription)
                                            <tr>
                                                <td class="w-1/3 text-left py-3 px-4">{{$prescription->user->name}}</td>
                                                <td class="w-1/3 text-left py-3 px-4">{{$prescription->delivery_address}}</td>
                                                <td class="w-1/3 text-left py-3 px-4">{{$prescription->delivery_time}}</td>
                                                <td class="w-1/3 text-left py-3 px-4">{{$prescription->note}}</td>
                                                <td class="w-1/3 text-left py-3 px-4">{{ucfirst($prescription->status)}}</td>
                                                <td class="w-1/3 text-left py-3 px-4">{{$prescription->created_at}}</td>
                                                <td class="w-1/3 text-left py-3 px-4">{{ucfirst($prescription->status)}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <h1 class="p-5">No Prescriptions to Show</h1>
                    @endif
                @endcan
            </div>
        </div>
    </div>

    @if(session()->has('key'))
        @if(session()->has('success'))
            <script>
                Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500,
                text: '{{session('success')}}'
                })
            </script>
        @elseif(session()->has('error'))
            <script>
                Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500,
                text: '{{session('error')}}'
                })
            </script>
        @endif
    @endif
    
</x-app-layout>