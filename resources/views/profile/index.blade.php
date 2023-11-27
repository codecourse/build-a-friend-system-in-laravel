<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @auth
                        @if (auth()->user()->id !== $user->id)
                            @if (auth()->user()->isFriendsWith($user))
                                <div class="space-x-1">
                                    <span>You and {{ $user->name }} are friends</span>

                                    <form action="{{ route('friends.destroy', $user) }}" method="post" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-indigo-600">Unfriend</button>
                                    </form>
                                </div>
                            @else
                                @if (auth()->user()->hasPendingFriendRequestFor($user))
                                    <div class="space-x-1">
                                        <span>Waiting for {{ $user->name }} to accept your friend request.</span>

                                        <form action="{{ route('friends.destroy', $user) }}" method="post" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-indigo-600">Cancel</button>
                                        </form>
                                    </div>
                                @elseif ($user->hasPendingFriendRequestFor(auth()->user()))
                                    <div class="space-x-1">
                                        <span>{{ $user->name }} has sent you a friend request.</span>

                                        <form action="{{ route('friends.patch', $user) }}" method="post" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button class="text-indigo-600">Accept</button>
                                        </form>

                                        <form action="{{ route('friends.destroy', $user) }}" method="post" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-indigo-600">Reject</button>
                                        </form>
                                    </div>
                                @else
                                    <form action="{{ route('friends.store', $user) }}" method="post">
                                        @csrf
                                        <button class="text-indigo-600">Add as friend</button>
                                    </form>
                                @endif
                            @endif
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
