<div class="row mt-2">
    <div class="col">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link {{request()->path() == 'admin' ? 'active' : ''}}" aria-current="page"
                    href="{{route('admin.index')}}">Status Overview</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->path() == 'admin/files' ? 'active' : ''}}"
                    href="{{route('admin.files')}}">File Manager</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->path() == 'admin/accounts' ? 'active' : ''}}"
                    href="{{route('admin.accounts')}}">Account Manager</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->path() == 'admin/pages' ? 'active' : ''}}"
                    href="{{route('pages.index')}}">Site Page Manager</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="#">System</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">System Information</a>
            </li> --}}
        </ul>
    </div>
</div>