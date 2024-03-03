









<form action="{{ route('requests.approve', ['id' => $deposit->id]) }}" method="POST">
    @csrf
    <h1>Are you sure you want to approve this deposit request?</h1>
    <button type="submit" class="btn btn-primary btn-sm mr-3" title="Approve">
        <i class="bi bi-check2"></i> Approve
    </button>
    <a href="{{ route('investments.deposit') }}" class="btn btn-secondary btn-sm" role="button">Cancel</a>
</form>
