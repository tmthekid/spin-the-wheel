<div style="background: rgba(255, 255, 255, .7); padding: 3rem; border-radius: 1rem;">
    <h1 class="text-3xl font-semibold">Search serial numbers</h1>
    <form class="mt-3" method="POST" action="{{ route('search') }}">
        @csrf
        <div class="flex">
            <input id="number" name="number" class="focus:border-light-blue-500 focus:ring-1 focus:ring-light-blue-500 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-400 rounded-md py-2 px-10" type="text" aria-label="Search" placeholder="Serial Number" />
            <button class="w-1/3 h-9 px-4 rounded-md bg-blue-700 text-sm text-white ml-3" type="submit">Search</button>
        </div>
        @error('number')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
        @if(isset($custom_error))
            <div class="text-red-500">{{ $custom_error }}</div>
        @endif
    </form>
</div>