<div class="h-full">
    <div class="bg-rqm-lighter p-5 rounded shadow w-full text-center h-full">
        <div class="flex pb-36 pt-10 px-10">
            <div class="h-screen w-1/4">
                <div class="block pb-5 w-full"><span class="bg-rqm-dark block shadow text-2xl text-rqm-yellow-darkest w-full">Inbox</span></div>
                <div class="pl-5 py-2 shadow-md text-left @if(!$conversation) text-rqm-yellow @endif">
                    <a href="{{ route("profile.messages") }}">New Message</a>
                </div>
                <form method="POST" action="{{ route('profile.messages.read') }}">
                    {{ csrf_field() }}
                    <div class="pl-5 py-2 shadow-md text-left ">

                    <div class="bg-rqm-lighter"><button type="submit" name="read" value="1" class="text-rqm-yellow">Mark as Read</button></div>
                    <hr class="my-2">
                    <div><button type="submit" name="delete" value="1" class="text-rqm-yellow">Delete</button></div>
                    </div>
                    @foreach($usersConversations as $conversationItem)
                        <div class="pl-5 py-2 shadow-md text-left @if(!empty($conversation) && $conversation->id == $conversationItem->id) text-rqm-yellow @endif">
                            <input type="checkbox" name="conversation_id[]" value="{{ $conversationItem -> id }}" class="checkbox-form">
                            <a href="{{ route('profile.messages', $conversationItem) }}">
                                {{ $conversationItem -> otherUser() -> username }}
                            </a>
                            @if($conversationItem -> unreadMessages() > 0)
                                <span class="bg-rqm-yellow-dark h-0.5 ml-2 px-2 rounded-full text-rqm-dark text-xs">
                                {{ $conversationItem -> unreadMessages() }}
                            </span>
                            @endif
                        </div>
                    @endforeach
                </form>
            </div>
            @if(!$conversation)
                <form action="{{ route('profile.messages.conversation.new') }}" method="POST" class="bg-rqm-lighter relative w-3/4">
            @else
                <form action="{{ route('profile.messages.message.new', $conversation) }}" method="POST" class="bg-rqm-lighter relative w-3/4">
            @endif
                <form action="{{ route('profile.messages.conversation.new') }}" method="POST" class="bg-gray-800 w-3/4 relative">
                    {{ csrf_field() }}
                    <div class="block pb-5 w-full"><span class=""></span></div>
                    @if(!$conversation)
                    <div class="flex items-center pl-5 py-2 text-rqm-yellow">
                        <div class="pr-10 py-2 shadow-md text-left w-2/3">
                            <input class="bg-rqm-dark border border-rqm-yellow-darkest p-3 text-rqm-yellow w-full rounded" type="text" id="username" name="username" placeholder="Username" value="{{$new_conversation_other_party}}">
                        </div>
                    </div>
                    @endif
                    <div class="flex items-center p-5 text-rqm-yellow">
                        <div class="absolute bottom-0 inset-x-0 px-2 py-2 shadow-md text-left w-full flex">
                            <textarea type="text" rows="2" id="message" name="message" placeholder="Your message..." class="bg-rqm-dark border border-rqm-yellow-darkest text-rqm-yellow w-full rounded px-3">{{$new_conversation_other_party}}</textarea>
                            <button type="submit" class="bg-rqm-yellow-dark font-extrabold px-3 py-1 rounded-sm text-rqm-dark">
                                Send
                            </button>
                        </div>
                    </div>
                    @if($conversation != null)
                    @if(!$conversation -> messages -> isEmpty())
                        @foreach($conversationMessages as $message)
                            @if($message -> getSender() -> username == auth()->user()->username)
                                <div class="flex items-center justify-end py-2 text-rqm-yellow">
                                    <div class="pr-10 py-2 shadow-md text-right w-2/3">
                                        @if($message -> isEncrypted())
                                            <textarea readonly class="form-control"
                                                      rows="5">{{ $message -> getContent() }}</textarea>
                                        @else
                                            <p class="card-text">{{ $message -> getContent() }}</p>
                                            <span class="opacity-20 text-white text-xs">{{ $message -> timeAgo() }}</span>
                                        @endif
                                    </div>
                                </div>
                            @else
                                <div class="flex items-center justify-start py-2 text-rqm-yellow">
                                    <div class="py-2 shadow-md w-2/3 text-left pl-10">
                                        @if($message -> isEncrypted())
                                            <textarea readonly class="form-control"
                                                      rows="5">{{ $message -> getContent() }}</textarea>
                                        @else
                                            <p class="card-text">{{ $message -> getContent() }}</p>
                                            <span class="opacity-20 text-white text-xs">{{ $message -> timeAgo() }}</span>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                    @endif
                </form>
        </div>
    </div>
</div>
