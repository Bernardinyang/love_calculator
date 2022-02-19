<div class="bg">
    <div class="container">
        @if($score > 0)
            <div class="alert alert-success" role="alert">
                Love between <strong class="text-capitalize">{{ $his_name }} and {{ $her_name }} </strong> is <strong>{{ $score }}%</strong> strong
            </div>
        @endif
        <form wire:submit.prevent="calculate">
            <div class="form-group">
                <label for="his_name">His Name</label>
                <input type="text" class="form-control" id="his_name" wire:model.defer="his_name">
            </div>
            <div class="form-group">
                <label for="her_name">Her Name</label>
                <input type="text" class="form-control" id="her_name" wire:model.defer="her_name">
            </div>
            <button type="submit" class="btn btn-danger">Calculate</button>
        </form>
    </div>
</div>
