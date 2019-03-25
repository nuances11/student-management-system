<div class="row">
    <div class="col-12">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table table-bordered" id="subjects-table">
            <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Grade</td>
                <td>Action</td>
            </tr>
            </thead>
        </table>

    </div>
</div>