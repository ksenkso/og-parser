<?php
namespace app\tests;

class BaseTest
{
    /**
     * @param string $msg
     * @throws \TypeError
     */
    public function fail($msg)
    {
        throw new \TypeError($msg . '\\n');
    }
    /**
     * @param string $msg
     */
    public function pass($msg)
    {
        echo '+ ' . $msg . "\n";
    }

    /**
     * @param string $needed
     * @param string $given
     */
    public function failAssert($needed, $given)
    {
        $this->fail("Line " . __LINE__ . ": Expected $needed, but $given given");
    }
}