<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Friends
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-6 gap-6">
            <div class="col-span-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="space-y-3">
                            <h2 class="text-lg font-semibold">Friends</h2>
                            <div class="space-y-3">
                                @forelse ($friends as $friend)
                                    <div class="flex items-center justify-between">
                                        <a href="#">{{ $friend->name }}</a>
                                        <div class="space-x-2">
                                            <form action="{{ route('friends.destroy', $friend) }}" method="post" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-indigo-600">Unfriend</button>
                                            </form>
                                        </div>
                                    </div>
                                @empty
                                    You have no friends
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 space-y-6">
                        <div class="space-y-3">
                            <h2 class="text-lg font-semibold">Friend requests</h2>
                            <div class="space-y-3">
                                @forelse ($pendingFriendsFrom as $pendingFriendFrom)
                                    <div class="flex items-center justify-between">
                                        <a href="#">{{ $pendingFriendFrom->name }}</a>
                                        <div class="space-x-2">
                                            <form action="{{ route('friends.patch', $pendingFriendFrom) }}" method="post" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button class="text-indigo-600">Accept</button>
                                            </form>

                                            <form action="{{ route('friends.destroy', $pendingFriendFrom) }}" method="post" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-indigo-600">Reject</button>
                                            </form>
                                        </div>
                                    </div>
                                @empty
                                    You have no friend request
                                @endforelse
                            </div>
                        </div>

                        <div class="space-y-3">
                            <h2 class="text-lg font-semibold">Pending friend requests</h2>
                            <div class="space-y-3">
                                @forelse ($pendingFriendsTo as $pendingFriendTo)
                                    <div class="flex items-center justify-between">
                                        <a href="{{ route('profile', $pendingFriendTo) }}">{{ $pendingFriendTo->name }}</a>
                                        <div class="space-x-2">
                                            <form action="{{ route('friends.destroy', $pendingFriendTo) }}" method="post" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-indigo-600">Cancel</button>
                                            </form>
                                        </div>
                                    </div>
                                @empty
                                    You have no pending friend request
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
