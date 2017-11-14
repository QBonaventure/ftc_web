<?php
namespace FTC\PageReaper;

class Explorer
{
    
    private $basePath;
    
    private $paths = [];
    
    private $wantedExtensions = [
        'txt',
        'jpg',
    ];
    
    private $unwantedDirs = [
        'cache',
    ];
    
    private $discriminators;
    
    public function __construct($config)
    {
        $this->basePath = $config['wikiBasePath'];
        $this->discriminators = $config['discriminators'];
        $this->explore();
    }
    
    public function getFilePath($group, $filename)
    {
        if (!isset($this->paths[$group][$filename])) {
            throw new \Exception();
        }
        return join(DIRECTORY_SEPARATOR, [$this->basePath, $this->paths[$group][$filename]['path']]);
    }
    
    public function getBasePath()
    {
        return $this->basePath; 
    }
    
    
    public function getPaths()
    {
        if (!isset($this->paths)) {
            $this->explore();
        }
        
        return $this->paths;
    }
    
    private function explore()
    {
        $path = "/wiki/data";
        $directory = new \RecursiveDirectoryIterator($this->basePath, \FilesystemIterator::FOLLOW_SYMLINKS);
        $filter = new \RecursiveCallbackFilterIterator($directory, function ($current, $key, $iterator) {
            if ($current->getFilename()[0] === '.') {
                return FALSE;
            }
            if ($current->isDir()) {
                return !in_array($current->getFilename(), $this->unwantedDirs);
            }
            else {
                $extension = pathinfo($current->getFilename(), PATHINFO_EXTENSION);
                return in_array($extension, $this->wantedExtensions);
            }
        });
        
        $iterator = new \RecursiveIteratorIterator($filter);
        foreach ($iterator as $info) {
            $path = str_replace($this->basePath, '', $info->getPathname());
            $group = $this->getGroup($path);
            $filename = explode('.', basename($path))[0];
            
            $this->paths[$group][$filename]['path'] = trim($path, '/');
            $this->paths[$group][$filename]['name'] = $filename;
        }
    }
    
    private function getGroup($path)
    {
        foreach ($this->discriminators as $disciminator => $group) {
            if (strpos($path, $disciminator) === 0) {
                return $group;
            }
        }
        return 'misc';
    }
    
}
