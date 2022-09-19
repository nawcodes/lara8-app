<div class="row d-flex justify-content-center">
    {{-- form update users--}}
    <div class="col-lg-6 card mb-3 p-5 ">
        <input type="hidden" name="" wire:model="user_id">
        <form action="">
            <div class="form-group">
                <label for="name">Name</label>
                <input wire:model="name" name="name" type="text" class="form-control" id="name" value="{{$name}}">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input wire:model="email" type="email" class="form-control" id="email" >
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
                @error('role') <span class="text-danger">{{ $message }}</span> @enderror
            </div>


            <button type="submit" class="btn btn-primary m-5" wire:click.prevent="update">Submit</button>

        </form>

    </div>

</div>
