@extends('layouts.guest')


@section('head')
	<title>{{ '@' . $user->username }} - {{ config('app.name') }}</title>
	<meta property="og:type" content="article" />
	<meta property="og:title" content="{{ '@' . $user->username }} - {{ config('app.name') }}" />
	<meta property="og:url" content="{{ config('app.url') }}/{{ '@' . $user->name }}" />
	<meta property="og:site_name" content="{{ config('app.name') }}" />

	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="{{ config('app.twitter_username') }}" />
	<meta name="twitter:title" content="{{ '@' . $user->username }} - {{ config('app.name') }}" />

	@if ($user->bio)
		<meta name="description" content="{{ $user->bio }}"/>
		<meta property="og:description" content="{{ $user->bio }}" />
		<meta name="twitter:description" content="{{ $user->bio }}" />
	@endif

	<meta property="og:image" content="{{ $user->avatar }}" />
	<meta name="twitter:image" content="{{ $user->avatar }}" />
@stop


@section('content')
	<router-view></router-view>
@endsection


@section('script')
	<script>
		var preload = {
			user: {!! json_encode($user->resolve()) !!},
			comments: {!! $comments->toJson() !!}
		}; 
	</script>
@endsection