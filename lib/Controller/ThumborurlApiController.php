<?php
namespace OCA\ThumborUrl\Controller;

use OCP\IRequest;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\JSONResponse;
use Thumbor\Url\Builder;

class ThumborurlApiController extends Controller {
    private $userId;
    private $config;
    public function __construct($appName, IRequest $request, $userId, $config) {
        parent::__construct($appName, $request);
        $this->userId = $userId;
        $this->config = $config;
    }

    public function index($path, $filename, $filters): JSONResponse {
        $base = $this->config->getUserValue($this->userId, $this->appName, "thumbor_base");
        $base = trim($base, "/");
        $key = $this->config->getUserValue($this->userId, $this->appName, "thumbor_key");
        $dir = $this->config->getUserValue($this->userId, $this->appName, "thumbor_dir");
        $dir = trim($dir, "/");
        $path = preg_replace('/'.$dir.'/', "", trim($path, "/"), 1);

        $url = trim($filters, "/");
        if($url != "") $url .= "/";
        $url .= trim(trim($path, "/") . "/" . trim($filename, "/"), "/");
        $url = trim($url, "/");
        $signed_url = Builder::construct($base, $key, $url);
        return new JSONResponse(array('user' => $this->userId, 'url'=> strval($signed_url)));
    }
    public function saveSettings($thumbor_base, $thumbor_key, $thumbor_dir) {
        $this->config->setUserValue($this->userId, $this->appName, "thumbor_base", $thumbor_base);
        $this->config->setUserValue($this->userId, $this->appName, "thumbor_dir", $thumbor_dir);
        $this->config->setUserValue($this->userId, $this->appName, "thumbor_key", $thumbor_key);

        return new JSONResponse(array('data' => 'ok'));
    }
}

?>
