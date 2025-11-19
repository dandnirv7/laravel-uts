@props(['label', 'name', 'options' => []])

<div class="relative">
    <label for="{{ $name }}" class="font-medium">{{ $label }}</label>
    <select id="{{ $name }}" name="{{ $name }}"
            class="w-full mt-1 p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 transition-colors @error($name) border-red-500 @enderror">
        <option value="">Pilih {{ $label }}</option>
        @foreach($options as $option)
            <option value="{{ $option }}" {{ old($name)==$option?'selected':'' }}>{{ $option }}</option>
        @endforeach
    </select>
    @error($name)
    <div class="absolute left-0 mt-1 text-red-600 text-sm animate-fadeIn" role="alert">{{ $message }}</div>
    @enderror
</div>
