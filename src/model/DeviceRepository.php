<?php

namespace Emi\model;

class DeviceRepository
{

    public function getAllDevices()
    {
        $stmt = $this->database->getConnection()->prepare("SELECT * FROM device");
        $stmt->execute();

        $devices = array();
    }
}