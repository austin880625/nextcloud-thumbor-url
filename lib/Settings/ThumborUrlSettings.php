<?php
namespace OCA\ThumborUrl\Settings;

use OCP\IConfig;
use OCP\IDateTimeFormatter;
use OCP\IL10N;
use OCP\Settings\ISettings;
use OCP\AppFramework\Http\TemplateResponse;
class ThumborUrlSettings implements ISettings {
    private $config;
    private $userId;
    private $appName;
    public function __construct($appName, $userId, IConfig $config) {
        $this->appName = $appName;
        $this->config = $config;
        $this->userId = $userId;
    }
    public function getForm() {
        $thumborBase = $this->config->getUserValue($this->userId, $this->appName, "thumbor_base");
        $thumborKey = $this->config->getUserValue($this->userId, $this->appName, "thumbor_key");
        $thumborDir = $this->config->getUserValue($this->userId, $this->appName, "thumbor_dir");
        return new TemplateResponse('thumborurl', 'settings', array(
            'user_id' => $this->userId,
            'thumbor_key' => $thumborKey,
            'thumbor_dir' => $thumborDir,
            'thumbor_base' => $thumborBase,
        ));  // templates/index.php
    }
    public function getSection() {
        return 'sharing';
    }

    public function getPriority() {
        return 50;
    }
}
?>
