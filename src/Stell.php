<?php


class Stell
{
    const VERSION = '1.0.9';

    private $appDir;

    public function __construct($dir)
    {
        $this->appDir = $dir;
    }

    public function make()
    {
        date_default_timezone_set('UTC');

        $fileName = 'update' . date('Y-m-d');

        echo "created file for migration -\033[32m $fileName \033[0m " . PHP_EOL;

        $sqlDir = $this->appDir . '/sql';

        if (!file_exists($sqlDir)) {
            mkdir($sqlDir, 0777, true);
        }

        $handle = file_put_contents($sqlDir . "/$fileName.php", "<?php \r\n\r\n", LOCK_EX);

    }
    public function migrate()
    {
        echo 'migrate from Stell' . PHP_EOL;
    }
    public function help()
    {
        echo "\033[31m Hello, it`s stell. \033[0m Helper for opencart migrations \n";

        echo PHP_EOL;
        echo '       /‾‾‾‾‾‾‾‾/ |‾‾‾‾‾‾‾‾‾‾‾|  |‾‾‾‾‾‾‾‾‾‾|  |‾‾|         |‾‾|        ' . PHP_EOL;
        echo '      /  ___   /  |____   ____|  |          |  |  |         |  |        ' . PHP_EOL;
        echo '     /  /  /__/        |  |      |   |‾‾‾‾‾‾   |  |         |  |        ' . PHP_EOL;
        echo '     \  \              |  |      |   |         |  |         |  |        ' . PHP_EOL;
        echo '      \  \             |  |      |    ‾‾‾‾‾‾|  |  |         |  |        ' . PHP_EOL;
        echo '       \  \            |  |      |   |‾‾‾‾‾‾   |  |         |  |        ' . PHP_EOL;
        echo '  |‾‾|  \  \           |  |      |   |         |  |         |  |        ' . PHP_EOL;
        echo '  |  |___|  |          |  |      |    ‾‾‾‾‾‾|  |   ‾‾‾‾‾‾‾| |   ‾‾‾‾‾‾‾|' . PHP_EOL;
        echo '  |_________/          |__|      |__________|  |__________| |__________|' . PHP_EOL;

        echo "\033[32m Stell \033[0m version \033[33m " . self::VERSION . " \033[0m \n";
    }
}