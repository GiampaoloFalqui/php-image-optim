<?php

namespace PHPImageOptim\Tools\Jpeg;

use Exception;
use PHPImageOptim\Tools\Common;
use PHPImageOptim\Tools\ToolsInterface;

class JpegOptim extends Common implements ToolsInterface
{
    public function optimise()
    {
        $command = escapeshellcmd("{$this->binaryPath} --strip-all --all-progressive {$this->customOptions} {$this->imagePath}");

        exec($command, $aOutput, $iResult);

        if ($iResult !== 0) {
            throw new Exception('JpegOptim was unable to optimise image, result:' . $iResult . ' File: ' . $this->imagePath);
        }

        return $this;
    }

    public function checkVersion()
    {
        exec($this->binaryPath . ' --version', $aOutput, $iResult);
    }
}