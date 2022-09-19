<div>
    {{-- Component Form livewire --}}

    @if ($updateMode)
        @livewire('users-update')
    @else
         @livewire('users-form', ['users' => $users])
    @endif


    {{-- End component form livewire --}}


    <div class="row d-flex justify-content-center">

        <div class="col-md-8 ">
            <div class="card ">
                 <div class="row">
                    <div class="col">
                        <select wire:model="paginate" name="" id="">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                </div>

                <input type="" name="search" wire:model="search" placeholder="search">
                <div class="card-header">
                    <h4 class="card-title"> Users </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Role
                                </th>
                                <th>
                                    Created At
                                </th>
                                <th>
                                    Updated At
                                </th>
                                <th>
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            {{ $user->role }}
                                        </td>
                                        <td>
                                            {{ $user->created_at }}
                                        </td>
                                        <td>
                                            {{ $user->updated_at }}
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-primary" wire:click="getUser({{$user->id}})">Edit</a>
                                            <button wire:click="destroy({{ $user->id }})" class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
