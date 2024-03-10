<div class="modal fade" id="unlockFileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Unlock File</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('unlockDownloadFile', ['file' => $slug])}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="passwordUnlock" class="form-label">Password</label>
                        <input type="password" name="password" autofocus required autocomplete="off"
                            class="form-control" id="passwordUnlock">
                    </div>
                    <button class="btn btn-primary rounded-pill mx-auto px-4 py-2 d-block" type="submit">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>