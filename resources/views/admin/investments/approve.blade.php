           
           
           
           
           @foreach ($depositrequest as $deposit)
            @endforeach
                <h1>Are you sure you want to approve this deposit request?</h1>
                <div class="modal-footer">
                    <a href="{{ route('investments.deposit') }}">Cancel</a>
                    <a href="{{ route('deposit_requests.approve', ['id' => $deposit->id]) }}" class="btn btn-primary btn-sm mr-3" title="Approve">
                        <i class="bi bi-check2"></i> Approve
                    </a>
                </div>
