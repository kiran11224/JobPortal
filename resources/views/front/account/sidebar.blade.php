<div class="col-lg-3">
    <div class="card border-0 shadow mb-4 p-3">
        <div class="s-body text-center mt-3">
            <img src="{{ asset('profile_pic/' . (Auth::user()->image ?? 'avatar7.png')) }}" alt="avatar" class="rounded img-fluid" style="width: 150px;">
            <h5 class="mt-3 pb-0">{{ Auth::user()->name }}</h5>
            <p class="text-muted mb-1 fs-6">{{ Auth::user()->designation }}</p>
            <div class="d-flex justify-content-center mb-2">
                <button onclick="openImageChanger()" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary">Change Profile Picture</button>
            </div>
        </div>
    </div>

    <div class="card account-nav border-0 shadow mb-4 mb-lg-0 text-none">
        <div class="card-body p-0">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <a href="{{ route('account.profile') }}">Account Settings</a>
                </li> 
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <a href="{{ route('account.jobCreate') }}">Post a Job</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <a href="{{ url('my-jobs') }}">My Jobs</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <a href="{{ url('job-applied') }}">Jobs Applied</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <a href="{{ url('saved-jobs') }}">Saved Jobs</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <a href="{{ route('account.logout') }}">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</div>

{{-- Profile Picture Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pb-0" id="exampleModalLabel">Change Profile Picture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('account.updateProfilePic') }}" method="POST" enctype="multipart/form-data" id="imageForm">
            @csrf
            <div class="mb-3">
                <label for="image" class="form-label">Profile Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mx-3">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Minimal JavaScript --}}
<script>
function openImageChanger() {
    document.getElementById('image').value = ''; // Clear file input when modal opens
}
</script>
