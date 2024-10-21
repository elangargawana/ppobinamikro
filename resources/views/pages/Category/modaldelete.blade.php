<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center">Are you sure want to delete this category?</p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="col-12">
                        <button type="submit" class="btn btn-danger w-100">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function setDeleteAction(actionUrl) {
        document.getElementById('deleteForm').action = actionUrl;
    }
</script>
