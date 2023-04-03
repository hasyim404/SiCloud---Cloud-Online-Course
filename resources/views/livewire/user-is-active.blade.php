{{-- <div>
    Be like water. 
</div> --}}

<div class="form-check d-flex justify-content-center form-switch">
    <input class="form-check-input btnIsActive" wire:model.lazy="isactive" type="checkbox" role="switch" @if($isactive) checked @endif id="flexSwitchCheckDefault">
</div>
