<!-- resources/views/livewire/edit-user.blade.php -->
<div class="col-md-12">
    <div class="order-summary-container">
        <div class="order-summary-header mb-20">
            <h4>Your Info </h4>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="edit-user-form">
            <form wire:submit.prevent="save">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input wire:model="name" type="text" class="form-control" id="name" placeholder="Enter your name">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input wire:model="mobile" type="text" class="form-control" id="mobile" placeholder="Enter your mobile number">
                    @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input wire:model="address" type="text" class="form-control" id="address" placeholder="Enter your address">
                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</div>
