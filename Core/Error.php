<?php

namespace Core;

use Throwable;

/**
 * Error end exception handler
 */
class Error
{

   /**
     * Error handler. Convert all errors to Exceptions by throwing an ErrorException.
     *
     * @param int $level  Error level
     * @param string $message  Error message
     * @param string $file  Filename the error was raised in
     * @param int $line  Line number in the file
     *
     * @return void
     */
    public static function errorHandler(int $level, string $message, string $file, int $line): void
    {
        if (error_reporting() !== 0) {  // to keep the @ operator working
            throw new \ErrorException($message, 0, $level, $file, $line);
        }
    }
   
    /**
     * Throwable handler.
     *
     * @param Throwable $throwable  The throwable
     *
     * @return void
     */
    public static function exceptionHandler(Throwable $throwable): void
    {
        // Code is 404 (not found) or 500 (general error)
        $code = $throwable->getCode();
        if ($code != 404) {
            $code = 500;
        }
        http_response_code($code);

        if (\App\Config::SHOW_ERRORS) {
            echo "<h1>Fatal error</h1>";
            echo "<p>Uncaught throwable type: '" . get_class($throwable) . "'</p>";
            echo "<p>Message: '" . $throwable->getMessage() . "'</p>";
            echo "<p>Stack trace:<pre>" . $throwable->getTraceAsString() . "</pre></p>";
            echo "<p>Thrown in '" . $throwable->getFile() . "' on line " . $throwable->getLine() . "</p>";
        } else {
            $log = dirname(__DIR__) . '/logs/' . date('Y-m-d') . '.txt';
            ini_set('error_log', $log);

            $message = "Uncaught throwable type: '" . get_class($throwable) . "'";
            $message .= " with message '" . $throwable->getMessage() . "'";
            $message .= "\nStack trace: " . $throwable->getTraceAsString();
            $message .= "\nThrown in '" . $throwable->getFile() . "' on line " . $throwable->getLine();

            error_log($message);
            
            if ($code == 404) {
                echo "<h1>Page not found</h1>";
            } else {
                echo "<h1>An error occurred</h1>";
            }
        }
    }
}
