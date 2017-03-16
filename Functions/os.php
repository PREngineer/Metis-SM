<?php

{
    /**
    * Name:           getOSInformation
    * Results:        Returns an array with the OS Information
    * Array elements:
    * - [Ubuntu] -    name,version,id,id_like,pretty_name,version_id,home_url,
    *                 support_url,bug_report_url,version_codename,ubuntu_codename
    **/
}
function getOSInformation()
{
  if (false == function_exists("shell_exec") ||
      false == is_readable("/etc/os-release"))
  {
      return null;
  }

  $os         = shell_exec('cat /etc/os-release');
  $listIds    = preg_match_all('/.*=/', $os, $matchListIds);
  $listIds    = $matchListIds[0];

  $listVal    = preg_match_all('/=.*/', $os, $matchListVal);
  $listVal    = $matchListVal[0];

  array_walk($listIds, function(&$v, $k)
  {
      $v = strtolower(str_replace('=', '', $v));
  });

  array_walk($listVal, function(&$v, $k)
  {
      $v = preg_replace('/=|"/', '', $v);
  });

  return array_combine($listIds, $listVal);
}

{
    /**
    * Name:           getRAM
    * Results:        Returns an array with the RAM details in /proc/meminfo
    * Array elements:
    * - [Ubuntu] -    MemTotal,MemFree,MemAvailable,Buffers,Cached,SwapCached,
    *                 Active,Inactive,Active(anon),Inactive(anon),Active(file),
    *                 Inactive(file),Unevictable,Mlocked,SwapTotal,SwapFree,Dirty,
    *                 Writeback,AnonPages,Mapped,Shmem,Slab,SReclaimable,SUnreclaim,
    *                 KernelStack,PageTables,NFS_Unstable,Bounce,WritebackTmp,
    *                 CommitLimit,Committed_AS,VmallocTotal,VmallocUsed,VmallocChunk,
    *                 HardwareCorrupted,AnonHugePages,CmaTotal,CmaFree,HugePages_Total,
    *                 HugePages_Free,HugePages_Rsvd,HugePages_Surp,Hugepagesize,
    *                 DirectMap4K,DirectMap2M
    **/
}
function getRAMUse()
{
    $data = explode("\n", file_get_contents("/proc/meminfo"));
    $meminfo = array();
    foreach ($data as $line)
    {
        list($key, $val) = explode(":", $line);
        $meminfo[$key] = trim($val);
    }


    return round( ( ($meminfo["MemTotal"] - $meminfo["MemAvailable"])
                    / $meminfo["MemTotal"] ) * 100 );
}

{
    /**
    * Name:           getRAM
    * Results:        Returns an array with the RAM details in /proc/cpuinfo
    * Array elements:
    * - [Ubuntu] -    processor,vendor_id,cpu family,model,model name,stepping,
    *                 microcode,cpu MHz,cache size,physical id,siblings,core id,
    *                 cpu cores,apicid,initial apicid,fpu,fpu_exception,cpuid level,
    *                 wp,flags,bugs,bogomips,clflush size,cache_alignment,address sizes,
    *                 power management
    **/
}
function getCPUInfo()
{
    $data = explode("\n", file_get_contents("/proc/cpuinfo"));
    $meminfo = array();
    foreach ($data as $line)
    {
        list($key, $val) = explode(":", $line);
        $meminfo[$key] = trim($val);
    }

    return $meminfo;
}

{
    /**
    * Name:           getLinuxCPULoadData
    * Results:        Returns an array with the CPU Load details in /proc/stat
    **/
}
function getLinuxCPULoadData()
{
    if (is_readable("/proc/stat"))
    {
        $stats = @file_get_contents("/proc/stat");

        if ($stats !== false)
        {
            // Remove double spaces to make it easier to extract values with explode()
            $stats = preg_replace("/[[:blank:]]+/", " ", $stats);

            // Separate lines
            $stats = str_replace(array("\r\n", "\n\r", "\r"), "\n", $stats);
            $stats = explode("\n", $stats);

            // Separate values and find line for main CPU load
            foreach ($stats as $statLine)
            {
                $statLineData = explode(" ", trim($statLine));

                // Found!
                if
                (
                    (count($statLineData) >= 5) &&
                    ($statLineData[0] == "cpu")
                )
                {
                    return array(
                        $statLineData[1],
                        $statLineData[2],
                        $statLineData[3],
                        $statLineData[4],
                    );
                }
            }
        }
    }

    return null;
}

{
    /**
    * Name:           getCPULoad
    * Results:        Returns the value of the CPU Load percentage
    * Works with:     Windows & Linux
    **/
}
function getCPULoad()
{
    $load = null;

    // If using Windows
    if(stristr(PHP_OS, "win"))
    {
        $cmd = "wmic cpu get loadpercentage /all";
        @exec($cmd, $output);

        if ($output)
        {
            foreach ($output as $line)
            {
                if ($line && preg_match("/^[0-9]+\$/", $line))
                {
                    $load = $line;
                    break;
                }
            }
        }
    }
    // If using Linux
    else
    {
        if (is_readable("/proc/stat"))
        {
            // Collect 2 samples - each with 1 second period
            // See: https://de.wikipedia.org/wiki/Load#Der_Load_Average_auf_Unix-Systemen
            $statData1 = getLinuxCPULoadData();
            sleep(1);
            $statData2 = getLinuxCPULoadData();

            if
            (
                (!is_null($statData1)) &&
                (!is_null($statData2))
            )
            {
                // Get difference
                $statData2[0] -= $statData1[0];
                $statData2[1] -= $statData1[1];
                $statData2[2] -= $statData1[2];
                $statData2[3] -= $statData1[3];

                // Sum up the 4 values for User, Nice, System and Idle and calculate
                // the percentage of idle time (which is part of the 4 values!)
                $cpuTime = $statData2[0] + $statData2[1] + $statData2[2] + $statData2[3];

                // Invert percentage to get CPU time, not idle time
                $load = 100 - ($statData2[3] * 100 / $cpuTime);
            }
        }
    }

    return round($load);
}

{
    /**
    * Name:           getDiskUse
    * Results:        Returns the value of the Disk Use percentage
    * Works with:     Windows & Linux
    **/
}
function getDiskUse()
{
    // If using Windows
    if(stristr(PHP_OS, "win"))
    {
        return round( ( ( disk_total_space("C:") - disk_free_space("C:") ) / disk_total_space("C:") ) * 100 );
    }
    // If using Linux
    else
    {
        return round( ( ( disk_total_space("/") - disk_free_space("/") ) / disk_total_space("/") ) * 100 );
    }
}

{
    /**
    * Name:           getNetworkInterface
    * Results:        Returns the name of the default network interface in use
    **/
}
function getNetworkInterface()
{
    $route = "/bin/netstat -rn";
    exec($route, $aoutput);
    $line = $aoutput[2];
    $iface = explode(" ",$line);

    return $iface[sizeof($iface)-1];
}

{
    /**
    * Name:           getNetworkThroughput
    * Results:        Returns the network throughput in the last 2 seconds
    * Array elements: tx,rx
    **/
}
function getNetworkThroughput()
{
    $rx[] = @file_get_contents("/sys/class/net/".getNetworkInterface()."/statistics/rx_bytes");
    $tx[] = @file_get_contents("/sys/class/net/".getNetworkInterface()."/statistics/tx_bytes");
    sleep(1);
    $rx[] = @file_get_contents("/sys/class/net/".getNetworkInterface()."/statistics/rx_bytes");
    $tx[] = @file_get_contents("/sys/class/net/".getNetworkInterface()."/statistics/tx_bytes");

    $tbps = $tx[1] - $tx[0];
    $rbps = $rx[1] - $rx[0];

    $networktransfer['tx'] = $tbps;
    $networktransfer['rx'] = $rbps;

    return $networktransfer;
}

?>
