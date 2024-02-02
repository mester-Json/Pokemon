class Image
{
private $path;

public function __construct($path)
{
$this->path = $path;
}

public function getPath()
{
return $this->path;
}
}