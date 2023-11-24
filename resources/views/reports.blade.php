<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reports') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <form action="/reports/export">
            @csrf
            <div class="flex items-center justify-start mt-4">
                <x-primary-button>
                    {{ __('Export to excel') }}
                </x-primary-button>
            </div>
        </form>
    </div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <table class="border-collapse table-fixed w-full text-sm">
                        <thead>
                        <tr>
                            <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-center">No</th>
                            <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-center">Booking Date</th>
                            <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-center">Vehicle Type</th>
                            <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-center">Driver</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white ">
                        @foreach($reports as $report)
                            <tr>
                                <td class="border-b border-slate-100 p-4 pl-8 text-slate-500 text-center">{{ $loop->iteration }}</td>
                                <td class="border-b border-slate-100 p-4 pl-8 text-slate-500 text-center">{{ Carbon\Carbon::parse($report->date)->format('d/m/Y');}}</td>
                                <td class="border-b border-slate-100 p-4 pl-8 text-slate-500 text-center">{{ $report->vehicle->type }}</td>
                                <td class="border-b border-slate-100 p-4 pl-8 text-slate-500 text-center">{{ $report->driver->name }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>


</x-app-layout>