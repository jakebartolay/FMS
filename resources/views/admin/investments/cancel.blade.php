           
           
           
           
           @foreach ($depositrequest as $deposit)
           <form action="{{ route('investments.deposit') }}" method="POST">
            @csrf
                </form>
            @endforeach
                <h1>Are you sure you want to approve this deposit request?</h1>
                <div class="modal-footer">
                    <a href="{{ route('investments.deposit') }}">Cancel</a>
                    <form action="{{ route('deposit_requests.approve', ['id' => $deposit->id]) }}" method="POST">
                        @csrf
                        <!-- Other form fields or submit button -->
                        <button type="submit">Approve</button>
                    </form>
                </div>
