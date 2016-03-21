<?php
ini_set('display_errors', 1); error_reporting(E_ALL);
include 'vendor/autoload.php';
use Carbon\Carbon;

ini_set('display_errors', 1);
//error_reporting(E_ALL);
use DebugBar\StandardDebugBar;
$debugbar = new StandardDebugBar();
$debugbarRenderer = $debugbar->getJavascriptRenderer();
$debugbarRenderer->setBaseUrl('https://iuhealthcpe.org/admin/dash/includes/vendor/maximebf/debugbar/src/DebugBar/Resources/');
$my_error_handler = function($errno, $errstr, $errfile, $errline) use($debugbar) {
	$debugbar['messages']->info($errstr);
};
set_error_handler($my_error_handler);


use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection(array(
	'driver' => 'sqlsrv',
	'host' => '10.8.217.129',
	'database' => 'stagingdev',
	'username' => 'physicianeducation',
	'password' => '',
	'charset' => 'utf8',
	'collation' => 'utf8_general_ci',
	'prefix' => '',
));

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

$capsule->setEventDispatcher(new Dispatcher(new Container));

// Set the cache manager instance used by connections... (optional)
//$capsule->setCacheManager(...);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();
$pdo = Illuminate\Database\Capsule\Manager::connection()->getPdo();
$pdo = new DebugBar\DataCollector\PDO\TraceablePDO($pdo);
$debugbar->addCollector(new DebugBar\DataCollector\PDO\PDOCollector($pdo));
Illuminate\Database\Capsule\Manager::connection()->setPdo($pdo);

session_start();
echo "Lets start!<br>";
$CDNs = CdnTest::get();

foreach($CDNSs as $CDN){
	echo "hello";
	echo $pie = Pie::where('CDN', $CDN->CDN)->count();
	if($pie != 0){
		echo "Found one!<br>";
	}
}





