<div class="col-md-12 col-sm-12 col-lg-3 col-12 mb-4">
    <div class="card ">
        <div class="card-body">
            <div class="text-center">
                <img alt="Profile" src="@if($user->details->image)
                        {{ url("img/users/{$user->details->image}") }}
                @else
                        {{ url("img/placeholder/user-placeholder.jpg") }}
                @endif" class="img-thumbnail border-0 rounded-circle list-thumbnail">
                <form action="{{ route('user.image.upload', $user->details->id) }}" id="image-upload-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <label for="image-upload" class="text-small text-black-50">Click to change photo</label>
                    <input type="file" id="image-upload" name="image" style="display: none;">
                    {{--<div class="btn-container text-center">--}}
                        {{--<button type="submit" id="upload-submit" class="text-small btn btn-circle btn-xs" style="margin: 0 auto; margin-bottom: 10px;">Change</button>--}}
                        {{--<button type="reset" id="upload-submit" class="text-small btn btn-circle btn-xs btn-outline-warning" style="margin: 0 auto; margin-bottom: 10px;">Cancel</button>--}}
                    {{--</div>--}}
                </form>
                <p class="list-item-heading mb-1">{{ ucfirst($user->name) }}</p>
                <p class="mb-4 text-muted text-small">{{ ucfirst($user->details->group->name) }}</p>
                <button type="button" data-url="{{ url("/users/{$user->id}/edit") }}" class="btn btn-sm btn-outline-primary ">Edit</button>
                <button type="button" data-url="{{ url("/users/{$user->id}/schedule") }}" class="btn btn-sm btn-outline-default ">View Schedule</button>
            </div>
        </div>
    </div>
</div>