<?php
namespace Concrete\Core\Error\Handler;

use Config;
use Concrete\Core\Logging\Logger;
use Concrete\Core\Package\PackageList;
use Concrete\Core\Support\Facade\Database;
use Core;
use Whoops\Example\Exception;
use Whoops\Handler\PrettyPageHandler;

/**
 * Class ErrorHandler
 *
 * @package Concrete\Core\Error\Handler
 */
class ErrorHandler extends PrettyPageHandler
{

    /**
     * {@inheritDoc}
     */
    public function handle()
    {
        $this->setPageTitle("concrete5 has encountered an issue.");
        if (Config::get('concrete.log.errors')) {
            try {
                $e = $this->getInspector()->getException();
                $db = Database::get();
                if ($db->isConnected()) {
                    $l = new Logger(LOG_TYPE_EXCEPTIONS);
                    $l->emergency(
                      t('Exception Occurred: ') . sprintf(
                          "%s:%d %s (%d)\n",
                          $e->getFile(),
                          $e->getLine(),
                          $e->getMessage(),
                          $e->getCode()
                      ), array($e)
                    );
                }
            } catch (Exception $e) {}
        }

        $debug = Config::get('concrete.debug.level', 0);
        if ($debug === DEBUG_DISPLAY_ERRORS) {
            $this->addDetails();
            return parent::handle();
        }

        Core::make('helper/concrete/ui')->renderError(
            t('An unexpected error occurred.'),
            t('An error occurred while processing this request.')
        );
        Core::shutdown();

    }

    /**
     * Add the c5 specific debug stuff
     */
    protected function addDetails()
    {
        /**
         * General
         */
        $this->addDataTable(
             'Concrete5',
             array(
                 'Version'           => APP_VERSION,
                 'Installed Version' => Config::get('app.version')
             )
        );

        /**
         * Cache
         */
        $this->addDataTable(
             'Preferences',
             array(
                 'Block Cache'        => Config::get('concrete.cache.blocks') ? 'ON' : 'OFF',
                 'Overrides Cache'    => Config::get('concrete.cache.overrides') ? 'ON' : 'OFF',
                 'Full Page'          => Config::get('concrete.cache.pages') ? 'ON' : 'OFF',
                 'Full Page Lifetime' => Config::get('concrete.cache.full_page_lifetime', 'default')
             )
        );

        /**
         * Installed Packages
         */
        $pla = PackageList::get();
        $pl = $pla->getPackages();
        $packages = array();
        foreach ($pl as $p) {
            if ($p->isPackageInstalled()) {
                $packages[$p->getPackageName()] = $p->getPackageVersion();
            }
        }

        $this->addDataTable('Installed Packages', $packages);
    }

}
