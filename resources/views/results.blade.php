@extends('layout')

<section class="mx-auto p-16 mt-12">
    <div class="w-full mb-8 rounded-lg shadow-lg">
        <div class="w-full overflow-x-scroll lg:overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="text-sm font-semibold tracking-wide text-left text-gray-900 bg-gray-100 border-b border-gray-600">
                        <th class="px-4 py-3">Serial</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Client Name</th>
                        <th class="px-4 py-3">Client NIC</th>
                        <th class="px-4 py-3">Client Phone</th>
                        <th class="px-4 py-3">Client Email</th>
                        <th class="px-4 py-3">Distributor Name</th>
                        <th class="px-4 py-3">Distributor Phone</th>
                        <th class="px-4 py-3">Value</th>
                        <th class="px-4 py-3">Code</th>
                        <th class="px-4 py-3">Date</th>
                    </tr>
                </thead>
                @foreach($serials as $serial)
                    <tbody class="bg-white">
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 border">{{ $serial->number }}</td>
                            <td class="px-4 py-3 text-xs border">
                                @if($serial->status)
                                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">Available</span>
                                @else
                                    <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm">Used</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm border">
                                @if($serial->client)
                                    {{ $serial->client->full_name }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm border">
                                @if($serial->client)
                                    {{ $serial->client->nic }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm border">
                                @if($serial->client)
                                    {{ $serial->client->phone }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm border">
                                @if($serial->client)
                                    {{ $serial->client->email }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm border">
                                @if($serial->distributor)
                                    {{ $serial->distributor->full_name }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm border">
                                @if($serial->distributor)
                                    {{ $serial->distributor->phone }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm border">
                                @if($serial->code)
                                    {{ $serial->code->value->value }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm border">
                                @if($serial->code)
                                    {{ $serial->code->code }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm border">
                                @if($serial->code)
                                    {{ $serial->code->updated_at->format('Y-m-d') }}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</section>