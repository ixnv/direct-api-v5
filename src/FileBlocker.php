<?php

namespace eLama\DirectApiV5;

final class FileBlocker implements Blocker
{
    /**
     * @var string
     */
    private $pathToBlockFile;
    /**
     * @var int
     */
    private $blockTimeInSeconds;

    /**
     * @param string $pathToBlockFile
     * @param int $blockTimeInSeconds
     */
    public function __construct($pathToBlockFile, $blockTimeInSeconds)
    {
        $this->pathToBlockFile = $pathToBlockFile;
        $this->blockTimeInSeconds = $blockTimeInSeconds;
    }

    /**
     * @return bool
     */
    public function isBlocked()
    {
        return file_exists($this->pathToBlockFile)
            && time() - filemtime($this->pathToBlockFile) < $this->blockTimeInSeconds;
    }

    /**
     * @return void
     */
    public function block()
    {
        touch($this->pathToBlockFile);
    }
}
