@extends('Admin.layout')

@section('title')
    Events Table
@endsection

@section('content')
    <div class="p-6 bg-white rounded-lg shadow-md dark1:bg-gray-800">
        <form class="grid grid-cols-1 md:grid-cols-2 gap-6" action="{{ route('create-event') }}" method="POST">
            @csrf
            {{-- First Half --}}
            <div class="space-y-4">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark1:text-white">
                        Event Name
                    </label>
                    <input type="text" name="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 
                        focus:border-blue-500 block w-full p-2.5 dark1:bg-gray-700 dark1:border-gray-600 
                        dark1:placeholder-gray-400 dark1:text-white"
                        required />
                </div>

                <div>
                    <label for="province" class="block mb-2 text-sm font-medium text-gray-900 dark1:text-white">
                        Select Province
                    </label>
                    <select name="province"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 
                        focus:border-blue-500 block w-full p-2.5 dark1:bg-gray-700 dark1:border-gray-600 dark1:text-white">
                        @foreach ($provinces as $province)
                            <option value="{{ $province }}">{{ $province }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="start_at" class="block mb-2 text-sm font-medium text-gray-900 dark1:text-white">
                        Start Date & Time
                    </label>
                    <input type="datetime-local" name="start_at" id="start_at"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 
                        focus:border-primary-600 block w-full p-2.5 dark1:bg-gray-600 dark1:border-gray-500 dark1:text-white"
                        required>
                </div>

                <div>
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark1:text-white">
                        Description
                    </label>
                    <textarea name="description" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border 
                        border-gray-300 dark1:bg-gray-700 dark1:border-gray-600 dark1:text-white"
                        placeholder="Write your event description here..."></textarea>
                </div>
            </div>

            {{-- Second Half --}}
            <div class="space-y-4">
                <div>
                    <label for="district" class="block mb-2 text-sm font-medium text-gray-900 dark1:text-white">
                        Select District
                    </label>
                    <select name="district"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 
                        focus:border-blue-500 block w-full p-2.5 dark1:bg-gray-700 dark1:border-gray-600 dark1:text-white">
                        @foreach ($districts as $district)
                            <option value="{{ $district }}">{{ $district }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="venue" class="block mb-2 text-sm font-medium text-gray-900 dark1:text-white">
                        Event Venue
                    </label>
                    <input type="text" name="venue"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 
                        focus:border-blue-500 block w-full p-2.5 dark1:bg-gray-700 dark1:border-gray-600 dark1:text-white"
                        required />
                </div>

                <div>
                    <label for="end_at" class="block mb-2 text-sm font-medium text-gray-900 dark1:text-white">
                        End Date & Time
                    </label>
                    <input type="datetime-local" name="end_at" id="end_at"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 
                        focus:border-primary-600 block w-full p-2.5 dark1:bg-gray-600 dark1:border-gray-500 dark1:text-white"
                        required>
                </div>
            </div>

            <div class="col-span-1 md:col-span-2 flex justify-start mt-4">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
                    focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2.5 dark1:bg-blue-600 
                    dark1:hover:bg-blue-700 dark1:focus:ring-blue-800">
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection
