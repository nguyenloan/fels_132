<div class="col-lg-3">
    <div class="thumbnail">
        <img src="{{ url('uploads/image/' . $user->avatar) }}" class="img-thumbnail"><br/>
        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>Learned</b> <a class="pull-right">{!! $user->userWords()->count() !!}</a>
            </li>
            <li class="list-group-item">
                <b>Followers</b> <a class="pull-right">{!! $user->followers()->count() !!}</a>
            </li>
            <li class="list-group-item">
                <b>Following</b> <a class="pull-right">{!! $user->followings()->count() !!}</a>
            </li>
        </ul>
    </div>
</div>
