<?php namespace App\Providers;

use Overtrue\LaravelWechat\Events\WeChatUserAuthorized as WeChatUserAuthorizedEvent;
use App\Listeners\WeChatUserAuthorized as WeChatUserAuthorizedListener;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		WeChatUserAuthorizedEvent::class => [
			WeChatUserAuthorizedListener::class,
		],
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);

		//
	}

}
