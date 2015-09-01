<?php

use Illuminate\View\Compilers\BladeCompiler;

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication()
	{
		$app = require __DIR__.'/../bootstrap/app.php';

		$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

        $storagePath = '/tmp/storage';
        if (!file_exists($storagePath)) {
            mkdir($storagePath);
        }

        $app->singleton('blade.compiler', function($app) use ($storagePath)
        {
            return new BladeCompiler($app['files'], $storagePath);
        });

        return $app;
	}

    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate');
    }

}
