<?php

namespace Emi\Controllers;

use Emi\model\DeviceRepository;

require __DIR__ . '/../../vendor/autoload.php';

class DeviceController
{
    public readonly DeviceRepository $deviceRepository;

    public function __construct() {
        $this->deviceRepository = new DeviceRepository();
    }

    public function get(): void
    {
        $devices = $this->deviceRepository->getAllDevices();
        require_once 'templates/app/devices/index.php';
    }
}