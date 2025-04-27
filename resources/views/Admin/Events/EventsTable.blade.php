@extends('Admin.layout')

@section('title')
    Events Table
@endsection

@section('content')
    <div>
        <form action="{{ route('get-addevent') }}" method="GET">
            <button type="submit"
                class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700">Add
                Event</button>
        </form>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark1:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark1:bg-gray-700 dark1:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Event name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            District
                        </th>
                        <th scope="col" class="px-6 py-3">
                            province
                        </th>
                        <th scope="col" class="px-6 py-3">
                            venue
                        </th>
                        <th scope="col" class="px-6 py-3">
                            description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            start time
                        </th>
                        <th scope="col" class="px-6 py-3">
                            end time
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $event)
                        <tr class="bg-white border-b dark1:bg-gray-800 dark1:border-gray-700 border-gray-200">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark1:text-white">
                                {{ $event->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $event->district }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $event->province }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $event->venue }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $event->description }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $event->start_at }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $event->end_at }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4">
                                No Records To Preview
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection
