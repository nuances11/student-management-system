<div class="row">
    <div class="col-12">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
    </div>
    <div class="col-md-6 col-sm-6 col-lg-3 col-12 mb-4">
        <div class="card ">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif
                <form method="POST" action="{{ route('subject-assign.store') }}">
                    @csrf 
                    <label class="form-group has-float-label">
                        <select class="form-control" name="subject_id">
                            <option value="">Select</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id . '-' . $subject->grade_id }}">{{ ucfirst($subject->name) }}</option>
                            @endforeach
                        </select>
                        <span>Subject</span>
                    </label>

                    <label class="form-group has-float-label">
                        <select class="form-control" name="user_id">
                            <option value="">Select</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ ucfirst($user->name) }}</option>
                            @endforeach
                        </select>
                        <span>User</span>
                    </label>

                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @if (count($assigns))
        <div class="col-md-6 col-sm-6 col-lg-6 col-12 mb-4">
            <div class="card ">
                <div class="card-body">
                    <table id="subject-assign-table" width="100%" class="table table-bordered">
                        <thead>
                            <tr class="text-center" style="background-color: #576a3d; color: #fff">
                                <td>Subject</td>
                                <td>User</td>
                            </tr>
                        </thead>
                        <tbody>
                            
                                @foreach ($assigns as $assign)
                                <tr class="text-center">
                                    <td>{{ $assign->subject->name }}</td>
                                    <td>{{ $assign->user->name }}</td>
                                <tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
    @endif
       
</div>