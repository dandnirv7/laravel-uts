@props(['label', 'name', 'type' => 'text', 'placeholder' => ''])

<div class="relative">
    <label for="{{ $name }}" class="font-medium">{{ $label }}</label>
    <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" value="{{ old($name) }}"
           placeholder="{{ $placeholder }}"
           class="w-full mt-1 p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 transition-colors @error($name) border-red-500 @enderror">
    @error($name)
    <div class="absolute left-0 mt-1 text-red-600 text-sm animate-fadeIn" role="alert">{{ $message }}</div>
    @enderror
</div>
