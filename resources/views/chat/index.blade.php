<div class="container">
    <h1>Chat with Users from Your School</h1>

    @if($receivers->isEmpty())
        <p>No users are available to chat with.</p>
    @else
        <!-- Loop through all receivers -->
        @foreach($receivers as $receiver)
            <div class="chat-box-container">
                <h2>Chat with {{ $receiver->Fname}}{{ $receiver->Mname}}{{ $receiver->Lname}}</h2>

                <!-- Display the chat messages for this receiver -->
                <div id="chat-box-{{ $receiver->id }}">
                    <!-- Example messages (populate dynamically later) -->
                </div>

                <!-- Chat form -->
                <form method="POST" action="{{ route('chat.send') }}">
                    @csrf
                    <input type="hidden" name="receiver_id" value="{{ $receiver->id }}">
                    <textarea name="message" required></textarea>
                    <button type="submit">Send</button>
                </form>
            </div>
        @endforeach
    @endif
</div>

<div id="chat-box">
    @foreach($messages as $message)
        <div>
            <strong>{{ $message->sender->Fname }}:</strong> {{ $message->message }}
        </div>
    @endforeach
</div>

2

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="{{ mix('js/app.js') }}"></script> <!-- Ensure this file includes Echo and Pusher setup -->
<script>
    var userId = {{ Auth::id() }}; // Authenticated user ID

    // Set up Pusher/Echo channels for each receiver
    @foreach($receivers as $receiver)
        Pusher.logToConsole = true;

        var channel = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
            cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
        }).subscribe('chat-channel-{{ $receiver->id }}'); // Create a unique channel for each user

        channel.bind('message-sent', function(data) {
            if (data.receiver_id == {{ $receiver->id }}) {
                var chatBox = document.getElementById('chat-box-{{ $receiver->id }}');
                var newMessage = document.createElement('div');
                newMessage.innerText = data.message;
                chatBox.appendChild(newMessage);
            }
        });
    @endforeach

     
    // Subscribe to the channel for this user
    Echo.channel('chat-channel-' + userId)
        .listen('.message-sent', (data) => {
            // Update the chat box with the new message
            const chatBox = document.getElementById('chat-box');
            const newMessage = document.createElement('div');
            newMessage.innerText = data.message.message; // Message content
            chatBox.appendChild(newMessage);
        });

</script>


