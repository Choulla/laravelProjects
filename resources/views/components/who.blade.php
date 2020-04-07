@if( Auth::guard("web")->check() )
<p> login in as : <strong>USER</strong></p>
@else
<p> logged out as : <strong>USER</strong></p>
@endif



@if( Auth::guard("admin")->check() )
<p> login in as : <strong>ADMIN</strong></p>

@else
<p> logged out as : <strong>ADMIN</strong></p>
@endif

