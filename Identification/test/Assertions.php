<?php

class Assertions {

    function assertEquals($expected, $actual, $delta = 0.0001) {
        if (is_float($expected) && is_float($actual)) {
            if (abs($expected - $actual) > $delta) {
                throw new Exception("Assertion failed: expected '$expected' but got '$actual'");
            }
        } elseif ($expected !== $actual) {
            throw new Exception("Assertion failed: expected '$expected' but got '$actual'");
        }
    }

    function assertContains($needle, $haystack, $useTypeCheck = false) {
        if ($useTypeCheck) {
            $check = function ($a, $b) {
                return $a === $b;
            };
        } else {
            $check = function ($a, $b) {
                return $a == $b;
            };
        }
        $contains = false;
        if (is_array($haystack)) {
            foreach ($haystack as $item) {
                if (is_array($item)) {
                    $contains = $this->assertContains($needle, $item, $useTypeCheck);
                } elseif ($check($item, $needle)) {
                    $contains = true;
                    break;
                }
            }
        }
        if (!$contains) {
            throw new Exception("Assertion failed: expected '$needle' to be in '$haystack'");
        }
    }
    
    function assertNotContains($needle, $haystack, $useTypeCheck = false) {
        if ($useTypeCheck) {
            $check = function ($a, $b) {
                return $a === $b;
            };
        } else {
            $check = function ($a, $b) {
                return $a == $b;
            };
        }
        $contains = false;
        if (is_array($haystack)) {
            foreach ($haystack as $item) {
                if (is_array($item)) {
                    $contains = $this->assertContains($needle, $item, $useTypeCheck);
                } elseif ($check($item, $needle)) {
                    $contains = true;
                    break;
                }
            }
        }
        if ($contains) {
            throw new Exception("Assertion failed: expected '$needle' to not be in '$haystack'");
        }
    }
    
    function assertNull($actual) {
        if (!is_null($actual)) {
            throw new Exception("Assertion failed: expected null but got '$actual'");
        }
    }


    function assertNotNull($actual) {
        if (is_null($actual)) {
            throw new Exception("Assertion failed: expected not null value but got '$actual'");
        }
    }


    function expectException($class, $message = null, $code = null) {
        try {
            $this->call();
        } catch (Exception $e) {
            if (!($e instanceof $class)) {
                throw $e;
            }
            if ($message !== null && $e->getMessage() !== $message) {
                throw $e;
            }
            if ($code !== null && $e->getCode() !== $code) {
                throw $e;
            }
        }
    }
    

}



?>