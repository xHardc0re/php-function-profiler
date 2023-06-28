<?php

class ProfilerWrapper
{
    private static $startTime;
    private static $startMemory;

    public static function startProfiling()
    {
        self::$startTime   = microtime(true);
        self::$startMemory = memory_get_usage(true);
    }

    public static function stopProfiling()
    {
        $executionTime = round(microtime(true) - self::$startTime, 4);
        $memoryUsage = round((memory_get_usage(true) - self::$startMemory) / 1024, 2);
        $cpuUsage = round(self::getCpuUsage(), 2);
        
        $functionName = debug_backtrace()[1]['function'];
        $className = debug_backtrace()[1]['class'];
        
        $output = "console.log('Profiling results for $className::$functionName():');\n";
        $output .= "console.log('Execution Time: $executionTime seconds');\n";
        $output .= "console.log('Memory Usage: $memoryUsage KB');\n";
        $output .= "console.log('CPU Usage: $cpuUsage%');";
        
        echo "<script>$output</script>";
    }

    private static function getCpuUsage()
    {
        $usage = getrusage();
        
        $userCpuTime = $usage['ru_utime.tv_sec'] + ($usage['ru_utime.tv_usec'] / 1000000);
        $systemCpuTime = $usage['ru_stime.tv_sec'] + ($usage['ru_stime.tv_usec'] / 1000000);
        
        $totalCpuTime = $userCpuTime + $systemCpuTime;
        
        return round($totalCpuTime, 2);
    }
}
