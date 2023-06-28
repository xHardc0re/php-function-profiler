# PHP Function Profiler

The PHP Function Profiler is a wrapper class that measures memory usage, CPU usage, and execution time for each function in PHP. It provides a convenient way to profile and analyze the performance of individual functions within your PHP code.

## Prerequisites

- PHP version 5.4 or above

## Installation

1. Download the `ProfilerWrapper.php` file from this repository.
2. Place the `ProfilerWrapper.php` file in your project directory.

## Usage

1. Include the `ProfilerWrapper.php` file in your PHP script:

```php
require_once 'ProfilerWrapper.php';
```

2. Start profiling before the function you want to measure:

```php
ProfilerWrapper::startProfiling();
```

3. Perform your function or code execution:

```php
// Your code here...
```

4. Stop profiling after the function or code execution:

```php
ProfilerWrapper::stopProfiling();
```

5. Run your PHP script and check the JavaScript console in your browser's developer tools. The profiling results will be displayed there, including execution time, memory usage, and CPU usage for the respective function.

## Example

Here's an example of how to use the `ProfilerWrapper` class to measure the execution of a factorial function:

```php
class MathOperations
{
    public static function factorial($n)
    {
        ProfilerWrapper::startProfiling();

        // Calculate the factorial of $n...

        ProfilerWrapper::stopProfiling();
        
        return $result;
    }
}

echo MathOperations::factorial(5);
```

## Notes

- The CPU usage measurement may vary depending on the operating system and server configuration. The provided implementation uses `getrusage()` to obtain the CPU usage specifically for the PHP script, but it may not be available or accurate in all environments.
- Ensure that the `shell_exec()` function is allowed to execute in your server environment if you're using a Windows system for CPU usage measurement.

## License

This project is licensed under the [MIT License](LICENSE).
