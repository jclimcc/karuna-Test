<form action="{{ $action }}" method="POST">
    @csrf
    @if ($method)
        @method($method)
    @endif
    <div class="flex flex-row justify-between">
        <h1 class="text-3xl font-bold ">{{ $pageSubTitle }}</h1>
        <a href="{{ url()->previous() }}"
            class="cursor-pointer content-center py-4 px-6 bg-blue-700  text-white font-semibold rounded-md">Back</a>
    </div>
    <div class="form-group pt-5">
        <label for="name" class="font-bold">Name</label><br>
        <input type="text" id="name" name="name" placeholder="name"
            value="{{ old('name', $product->name ?? '') }}" class="border border-gray-300 rounded-md w-full">
        @error('name')
            <div class="text-red-500 font-bold">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group pt-5">
        <label for="price" class="font-bold">Price(RM)</label>
        <input type="text" id="price" name="price" placeholder="price"
            value="{{ old('price', $product->price ?? '') }}" class="border border-gray-300 rounded-md w-full">
        @error('price')
            <div class="text-red-500 font-bold">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group pt-5">
        <label for="details" class="font-bold">Details</label>
        <textarea id="details" name="details" class="border border-gray-300 rounded-md w-full">{{ old('details', $product->details ?? '') }}</textarea>
        @error('details')
            <div class="text-red-500 font-bold">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group pt-5">
        <label for="published" class="font-bold">Publish</label><br>
        @error('published')
            <div class="text-red-500 font-bold">{{ $message }}</div>
        @enderror

        <input type="radio" id="publish_yes" name="published" value="1"
            {{ old('published', $product->published ?? '') == '1' ? 'checked' : '' }}>
        <label for="publish_yes">Yes</label><br>
        <input type="radio" id="publish_no" name="published" value="0"
            {{ old('published', $product->published ?? '') == '0' ? 'checked' : '' }}>
        <label for="publish_no">No</label>
    </div>
    <!-- Add more fields as necessary -->

    <button type="submit"
        class="cursor-pointer mx-auto block py-4 px-6 bg-blue-700 text-white font-semibold rounded-md">{{ $buttonText }}</button>
</form>
