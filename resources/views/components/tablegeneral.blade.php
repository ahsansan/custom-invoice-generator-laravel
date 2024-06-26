<div class="w-full overflow-x-auto">
    <table class="table-fixed w-full">
        <thead class="bg-blue-400 text-left">
            <tr>
                @foreach($headerLabels as $index => $label)
                    <th class="p-2 text-left text-white bg-blue-400 border-blue-400 border-2 {{ $headerStyles[$index] ?? 'w-[120px]' }}">
                        {{ $label }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody class="border-l-2 border-r-2 border-b-2 border-blue-400">
            @foreach($data as $index => $item)
                <tr class="{{ $index % 2 === 0 ? 'bg-blue-50' : 'bg-blue-100' }}">
                    @foreach($headers as $header)
                        <td class="p-2">
                            {{ $item[$header] }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>