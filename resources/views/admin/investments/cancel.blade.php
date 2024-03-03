









<form action="{{ route('requests.cancel', ['id' => $canceldeposit->id]) }}" method="POST">
    @csrf
    @method('DELETE') <!-- Add this line to override the method to DELETE -->
    <h1>Are you sure you want to cancel this deposit request?</h1>
    <button type="submit" class="btn btn-primary btn-sm mr-3" title="Cancel">
        <i class="bi bi-check2"></i> confirm
    </button>
    <a href="{{ route('investments.deposit') }}" class="btn btn-secondary" title="Confirm">cancel</a>
</form>