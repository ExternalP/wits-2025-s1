<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Users Edit') }}
        </h2>
    </x-slot>

    <article class="-mx-4">
        <header
            class="bg-zinc-700 text-zinc-200 rounded-t-lg -mx-4 -mt-8 p-8 text-2xl font-bold flex flex-row items-center">
            <h2 class="grow">
                {{__('Users')}} ({{__('Edit')}})
            </h2>
            <div class="order-first">
                {{-- <i class="fa-solid fa-user min-w-8 text-white"></i>--}}
            </div>
            <x-primary-link-button href="{{ route('users.create') }}"
                class="bg-zinc-200 hover:bg-zinc-900 text-zinc-800 hover:text-white">
                <i class="fa-solid fa-user-plus "></i>
                <span class="pl-4">Add User</span>
            </x-primary-link-button>
        </header>

        <x-flash-message :data="session()"/>

        <div class="flex flex-col flex-wrap my-4 mt-8">
            <section class="grid grid-cols-1 gap-4 px-4 mt-4 sm:px-8">

                <section class="min-w-full items-center bg-zinc-50 border border-zinc-600 rounded overflow-hidden">
                    <form action="{{ route('users.update', $user) }}"
                        method="POST"
                        class="flex gap-4">

                        @csrf
                        @method('PATCH')

                        <form action="{{ route('users.updatePhoto', $user->id) }}" method="POST" enctype="multipart/form-data" class="mb-4">
                            @csrf
                            @method('PUT')
                            <label for="profile_photo" class="block mb-2 font-medium">Profile Photo</label>
                            <input type="file" name="profile_photo" id="profile_photo" accept="image/png, image/jpeg, image/jpg" class="mb-2">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Upload</button>
                            <p class="text-xs text-gray-500 mt-1">Acceptable formats: JPG, JPEG, PNG. Max size: 50KB</p>
                        </form>

                        <div class="w-full text-left text-sm font-light text-surface dark:text-white">
                            <header
                                class="border-b border-neutral-200 bg-zinc-800 font-medium text-white dark:border-white/10">
                                <p class="col-span-1 px-6 py-4 border-b border-zinc-200 dark:border-white/10">

                                </p>
                            </header>

                            <section
                                class="py-4 px-6 border-b border-neutral-200 bg-white font-medium text-zinc-800 dark:border-white/10">

                                <div class="flex flex-col my-2 mt-2">
                                    <x-input-label for="given_name">
                                        Given Name
                                    </x-input-label>
                                    <x-text-input id="given_name" name="given_name" value="{{ old('given_name') ?? $user->given_name }}" />
                                    {{-- <x-input-error :messages="1" class="mt-2"/>--}}
                                </div>

                                <div class="flex flex-col my-2">
                                    <x-input-label for="family_name">
                                        Family Name
                                    </x-input-label>
                                    <x-text-input id="family_name" name="family_name" value="{{ old('family_name') ?? $user->family_name }}" />
                                    {{-- <x-input-error :messages="1" class="mt-2"/>--}}
                                </div>

                                <div class="flex flex-col my-2">
                                    <x-input-label for="preferred_name">
                                        Preferred Name
                                    </x-input-label>
                                    <x-text-input id="preferred_name" name="preferred_name" value="{{ old('preferred_name') ?? $user->preferred_name }}" />
                                    {{-- <x-input-error :messages="1" class="mt-2"/>--}}
                                </div>

                                <div class="flex flex-col my-2">
                                    <x-input-label for="email">
                                        Email
                                    </x-input-label>
                                    <x-text-input id="email" name="email" value="{{ old('email') ?? $user->email }}" />
                                    <x-input-error :messages="1" class="mt-2"/>
                                </div>

                                <div class="flex flex-col my-2">
                                    <x-input-label for="password">
                                        Password
                                    </x-input-label>
                                    <x-text-input id="password" name="password" />
                                </div>

                                <div class="flex flex-col my-2">
                                    <x-input-label for="password_confirmation">
                                        Confirm password
                                    </x-input-label>
                                    <x-text-input id="password_confirmation" name="password_confirmation" />
                                    <x-input-error :messages="1" class="mt-2"/>
                                </div>

                                <div class="flex flex-col my-2">
                                    <x-input-label for="roles">
                                        Roles
                                    </x-input-label>
                                    <select id="roles" name="roles[]" class="form-select" {{ !$editable ? 'disabled' : '' }}>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->name }}"
                                    @if(in_array($role->name, old('roles', $user->roles->pluck('name')->toArray())))
                                    selected
                                    @endif>
                                    {{ $role->name }}
                                    </option>
                                    @endforeach
                                    </select>
                                    @if(!$editable)
                                        @foreach($user->roles as $role)
                                         <input type="hidden" name="roles[]" value="{{ $role->name }}">
                                          @endforeach
                                            @endif
                                    <x-input-error :messages="$errors->get('roles')" class="mt-2" />
                                </div>
                            </section>
                            <footer
                                class="flex gap-4 px-6 py-4 border-b border-neutral-200 font-medium text-zinc-800 dark:border-white/10">

                                <x-primary-link-button href="{{ route('users.show', $user) }}" class="bg-zinc-800">
                                    Cancel
                                </x-primary-link-button>

                                <x-primary-button type="submit" class="bg-zinc-800">
                                    Save
                                </x-primary-button>
                            </footer>
                        </div>
                    </form>
                </section>
            </section>
                      </div>     
                    </article>
</x-app-layout>