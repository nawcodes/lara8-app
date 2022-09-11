<div>
    {{-- form create users--}}

    <form action="">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" wire:model="name">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" wire:model="email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" id="role" wire:model="role">
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            @error('role') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary" wire:click.prevent="store()">Submit</button>
    </form>

</div>
