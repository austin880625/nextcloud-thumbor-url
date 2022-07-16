<?php

namespace OCA\ThumborUrl\AppInfo;

use OCA\Files_Sharing\Event\BeforeTemplateRenderedEvent as SharingBeforeTemplateRenderedEvent;
use OCA\ThumborUrl\Listener\BeforeLoggedInTemplateRenderedListener;
use OCA\ThumborUrl\Listener\BeforeTemplateRenderedListener;
use OCA\ThumborUrl\Controller\ThumborurlApiController;
use OCA\ThumborUrl\Settings\ThumborUrlSettings;
use OCP\AppFramework\App;
use OCP\AppFramework\Bootstrap\IBootContext;
use OCP\AppFramework\Bootstrap\IBootstrap;
use OCP\AppFramework\Bootstrap\IRegistrationContext;
use OCP\AppFramework\Http\Events\BeforeTemplateRenderedEvent;

class Application extends App implements IBootstrap {
    public function __construct() {
        parent::__construct('thumborurl');
		$container = $this->getContainer();

        $container->registerService('Config', function($c) {
            return $c->query('ServerContainer')->getConfig();
        });

        $container->registerService('ThumborUrlSettings', function($c) {
            return new ThumborUrlSettings(
                $c->get('AppName'),
                $c->get('UserId'),
                $c->get('Config')
            );
        });

        $container->registerService('ThumborurlApiController', function($c) {
            return new ThumborurlApiController(
                $c->get('AppName'),
                $c->get('Request'),
                $c->get('UserId'),
                $c->get('Config')
            );
        });
    }

    public function register(IRegistrationContext $context): void {
        include_once __DIR__ . '/../../vendor/autoload.php';

        $context->registerEventListener(BeforeTemplateRenderedEvent::class, BeforeTemplateRenderedListener::class);
        $context->registerEventListener(SharingBeforeTemplateRenderedEvent::class, BeforeTemplateRenderedListener::class);
        $context->registerEventListener(BeforeTemplateRenderedEvent::class, BeforeLoggedInTemplateRenderedListener::class);
    }

    public function boot(IBootContext $context): void {
    }
}
