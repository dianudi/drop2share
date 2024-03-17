<div class="modal fade" id="confirmDeletion" tabindex="-1" aria-labelledby="confirmDeletionAccount" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="confirmDeletion">Confirm Deletion</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="fs-5 text-center">All data will deleted, are you sure?</p>
                <form action="{{route('account.delete')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger d-block mx-auto">Delete My
                        Account</button>
                </form>
            </div>
        </div>
    </div>
</div>