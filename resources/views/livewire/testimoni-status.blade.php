{{-- <div>
    {{-- Care about people's approval and you will be their prisoner.
</div> --}}

@php
    switch ($status) {
        case 0:
            $title = 'Di Sembunyikan';
            break;
        case 1:
            $title = 'Di Tampilkan';
            break;

        default:
            return $title =  ''; 
        break;
    };
@endphp

<div class="form-check d-flex justify-content-center form-switch ">
    <input class="form-check-input btnStatus" wire:model.lazy="status" type="checkbox" role="switch" @if($status) checked @endif id="flexSwitchCheckDefault" title="{{ $title }}">
</div>
