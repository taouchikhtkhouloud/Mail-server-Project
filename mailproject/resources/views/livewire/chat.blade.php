<div wire:poll.keep-alive>

    <div class="container">
        <h3 class=" text-center">

           
           chat room
        </h3>
        <div class="row">
            <div class="inbox_msg">
                <div class="mesgs">
                    <div id="chat" class="msg_history">
                        @forelse ($messages as $message)

                            @if ($message->user->name == auth()->user()->name)
                                <!-- Reciever Message-->
                                <div class="outgoing_msg">
                                    <div class="sent_msg">
                                        <p>{{ $message->message_text }}</p>
                                        <span class="time_date">
                                            {{ $message->created_at->diffForHumans(null, false, false) }}</span>
                                    </div>
                                </div>

                            @else

                                <div class="incoming_msg">
                                    <div class="incoming_msg_img"> 
                                       
                        
                                
                                    
                                            {!! makeImageFromName($message->user->name) !!}
               
                                    </div>
                                     
                                    {{ $message->user->name }}
                                    
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p>{{ $message->message_text }}</p>
                                            <span
                                                class="time_date">{{ $message->created_at->diffForHumans(null, false, false) }}</span>
                                        </div>
                                    </div>
                                </div>

                            @endif
                        @empty
                            <h5 style="text-align: center;color:red"> you don't have any messages</h5>
                        @endforelse

                    </div>
                    <div class="type_msg">
                        <div class="input_msg_write">
                            <form wire:submit.prevent="sendMessage">
                                <input onkeydown='scrollDown()' wire:model.defer="messageText" type="text"
                                    class="write_msg" placeholder="write your message" />
                                <button class="msg_send_btn" type="submit">send</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
