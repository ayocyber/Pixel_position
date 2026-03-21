@props(['employer', 'width' => 90])

@php
    $logo = $employer->logo;
    
    if (empty($logo) || str_contains($logo, 'placeholder')) {
        $src = 'https://picsum.photos/seed/' . $employer->id . '/' . $width . '/' . $width;
    } elseif (str_starts_with($logo, 'http')) {
        $src = $logo;
    } else {
        $src = asset($logo);
    }
@endphp

<img 
    src="{{ $src }}"
    class="rounded-xl"
    width="{{ $width }}"
    height="{{ $width }}"
/>