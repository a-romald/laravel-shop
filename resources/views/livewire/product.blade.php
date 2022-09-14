<div class="p-6 sm:px-20">
    <div class="mt-6">

        <div>
            <button wire:click="resetFilter" style="border: 2px solid black; padding:5px;">
                    Reset Filter
            </button>
        </div>

        <div class="flex justify-between">
            <div class="mr-2">                
                @foreach($cities as $city)
                    <span style="margin-left:25px;"> 
                        <input type="checkbox" value="{{ $city->id }}" class="mr-2 leading-tight" wire:model="checkboxes.{{ $city->id }}"/>{{ $city->name }}
                    </span>
                @endforeach
            </div>
        </div>

        <table class="table-layout w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">
                        <div class="flex items-center">ID</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Title</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">
                            <select class="focus:ring focus:ring-opacity-50 rounded-md shadow-sm" wire:model="cat">
                                <option value="">-Category-</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Cities</div>
                    </th>                    
                </tr>
            </thead>

            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td class="px-4 py-2">{{ $item->id }}</td>
                        <td class="px-4 py-2">{{ $item->title }}</td>
                        <td class="px-4 py-2">{{ $item->category->title }}</td>
                        <td class="px-4 py-2">
                            @foreach ($item->cities as $city)
                                {{ $loop->first ? '' : ', ' }}
                                {{ $city->name }}
                            @endforeach
                        </td>                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $items->links() }}
    </div>
</div>
