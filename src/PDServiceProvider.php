<?php

namespace Milestone\PD;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

use Milestone\PD\Event\SavingWishlistVisitor;
use Milestone\PD\Event\VisitorCreated;
use Milestone\PD\Event\WishlistCreated;
use Milestone\PD\Event\NewWishlistShare;
use Milestone\PD\Event\WishlistProductAdded;
use Milestone\PD\Listener\AddWishlistVendor;
use Milestone\PD\Listener\CheckAndCreateDefaultWishlist;
use Milestone\PD\Listener\PreventWishlistVisitorIfAlreadyIn;
use Milestone\PD\Listener\SendWishlistShareEmail;
use Milestone\PD\Listener\SendMailForFirstProduct;

class PDServiceProvider extends ServiceProvider
{

    protected $bootDataDir = __DIR__ . '/../';
    protected $bootData = [
        'loadRoutesFrom' => 'routes/web.php',
        'loadViewsFrom' => ['views','pd'],
        'loadMigrationsFrom' => 'migrations',
    ];

    protected $publishData = [
        'assets' => ['public_path','pd'],
        'views' => ['resource_path','views/milestone/pd'],
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
	 
    public function boot()
    {
        $bootDir = $this->bootDataDir;
        foreach ($this->bootData as $method => $data){
            $args = (array) $data;
            $args[0] = $bootDir . $args[0];
            call_user_func_array([$this,$method],$args);
        }

        $publishDataArray = [];
        foreach ($this->publishData as $from => $data){
            $source = $bootDir . $from;
            $destination = call_user_func($data[0],$data[1]);
            $publishDataArray[$source] = $destination;
        }

        $this->publishes($publishDataArray);
        $this->publishes($publishDataArray,'pd-update');

        Event::listen(WishlistCreated::class, AddWishlistVendor::class);
        Event::listen(VisitorCreated::class, CheckAndCreateDefaultWishlist::class);
        Event::listen(NewWishlistShare::class, SendWishlistShareEmail::class);
        Event::listen(WishlistProductAdded::class, SendMailForFirstProduct::class);
        Event::listen(SavingWishlistVisitor::class, PreventWishlistVisitorIfAlreadyIn::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/filesystems.php', 'filesystems.disks'
        );
    }
}
