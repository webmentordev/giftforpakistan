@extends('layouts.profile')
@section('content')
    <div class="box w-full px-4">
        <h1 class="text-3xl mb-3 font-bold text-dark">Login Activity</h1>
        <table class="w-full">
            <tr class="bg-gray-900 text-white py-2">
                <th class="text-sm py-2 px-2 text-start">IP Address</th>
                <th class="text-sm py-2 px-2 text-end">Login At</th>
            </tr>
            @if(count($logs) && $logs != null)
                @foreach ($logs as $item)
                    <tr class="text-center odd:bg-gray-100">
                        <td class="py-2 px-2 text-start">{{ $item->ip_address }}</td>
                        <td class="px-2 py-2 text-end">{{ $item->login_at }}</td>
                    </tr>
                @endforeach
            @endif
        </table>
        @if($logs->hasPages())
            <div class="p-2 bg-gray-100">
                {{ $logs->links() }}
            </div>
        @endif
    </div>
@endsection