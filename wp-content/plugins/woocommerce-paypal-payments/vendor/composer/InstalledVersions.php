<?php











namespace Composer;

use Composer\Autoload\ClassLoader;
use Composer\Semver\VersionParser;








class InstalledVersions
{
private static $installed = array (
  'root' => 
  array (
    'pretty_version' => 'dev-trunk',
    'version' => 'dev-trunk',
    'aliases' => 
    array (
    ),
    'reference' => 'e13dfad27c862c64d6d85ce86d03b51c7e72465f',
    'name' => 'woocommerce/woocommerce-paypal-payments',
  ),
  'versions' => 
  array (
    'container-interop/service-provider' => 
    array (
      'pretty_version' => 'v0.4.0',
      'version' => '0.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '4969b9e49460690b7430b3f1a87cab07be61418a',
    ),
    'dhii/collections-interface' => 
    array (
      'pretty_version' => 'v0.3.0-alpha4',
      'version' => '0.3.0.0-alpha4',
      'aliases' => 
      array (
      ),
      'reference' => 'da334f75f6477ef7eecaf28df1d5253fe05684ee',
    ),
    'dhii/containers' => 
    array (
      'pretty_version' => 'v0.1.0-alpha1',
      'version' => '0.1.0.0-alpha1',
      'aliases' => 
      array (
      ),
      'reference' => '73eed5422e106006c81ca1fa8b7213c6be33efbc',
    ),
    'dhii/data-container-interface' => 
    array (
      'pretty_version' => 'v0.2.1-alpha1',
      'version' => '0.2.1.0-alpha1',
      'aliases' => 
      array (
      ),
      'reference' => '6be46e427184b95785d9dd563d6acf2e0700cc31',
    ),
    'dhii/data-key-value-aware-interface' => 
    array (
      'pretty_version' => 'v0.1',
      'version' => '0.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '220232bc9040fab78a6c039f5a4a5f9542317bdc',
    ),
    'dhii/exception-interface' => 
    array (
      'pretty_version' => 'v0.2',
      'version' => '0.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b69feebf7cb2879cd43977a03342e2393b73f7fb',
    ),
    'dhii/factory-interface' => 
    array (
      'pretty_version' => 'v0.1',
      'version' => '0.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b8d217aec8838e64ccaa770cb03dc164bf6f0515',
    ),
    'dhii/module-interface' => 
    array (
      'pretty_version' => 'v0.1',
      'version' => '0.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a4271f2040e54f81cb7c4d5b3f18cb4a7532c277',
    ),
    'dhii/stringable-interface' => 
    array (
      'pretty_version' => 'v0.1',
      'version' => '0.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b6653905eef2ebf377749feb80a6d18abbe913ef',
    ),
    'dhii/wp-containers' => 
    array (
      'pretty_version' => 'v0.1.0-alpha1',
      'version' => '0.1.0.0-alpha1',
      'aliases' => 
      array (
      ),
      'reference' => 'e91a6f741622770ed724a2b594145fa917811f0c',
    ),
    'psr/container' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b7ce3b176482dbbc1245ebf52b181af44c2cf55f',
    ),
    'psr/log' => 
    array (
      'pretty_version' => '1.1.3',
      'version' => '1.1.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '0f73288fd15629204f9d42b7055f72dacbe811fc',
    ),
    'ralouphie/getallheaders' => 
    array (
      'pretty_version' => '3.0.3',
      'version' => '3.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '120b605dfeb996808c31b6477290a714d356e822',
    ),
    'woocommerce/woocommerce-paypal-payments' => 
    array (
      'pretty_version' => 'dev-trunk',
      'version' => 'dev-trunk',
      'aliases' => 
      array (
      ),
      'reference' => 'e13dfad27c862c64d6d85ce86d03b51c7e72465f',
    ),
  ),
);
private static $canGetVendors;
private static $installedByVendor = array();







public static function getInstalledPackages()
{
$packages = array();
foreach (self::getInstalled() as $installed) {
$packages[] = array_keys($installed['versions']);
}

if (1 === \count($packages)) {
return $packages[0];
}

return array_keys(array_flip(\call_user_func_array('array_merge', $packages)));
}









public static function isInstalled($packageName)
{
foreach (self::getInstalled() as $installed) {
if (isset($installed['versions'][$packageName])) {
return true;
}
}

return false;
}














public static function satisfies(VersionParser $parser, $packageName, $constraint)
{
$constraint = $parser->parseConstraints($constraint);
$provided = $parser->parseConstraints(self::getVersionRanges($packageName));

return $provided->matches($constraint);
}










public static function getVersionRanges($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

$ranges = array();
if (isset($installed['versions'][$packageName]['pretty_version'])) {
$ranges[] = $installed['versions'][$packageName]['pretty_version'];
}
if (array_key_exists('aliases', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['aliases']);
}
if (array_key_exists('replaced', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['replaced']);
}
if (array_key_exists('provided', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['provided']);
}

return implode(' || ', $ranges);
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getVersion($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['version'])) {
return null;
}

return $installed['versions'][$packageName]['version'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getPrettyVersion($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['pretty_version'])) {
return null;
}

return $installed['versions'][$packageName]['pretty_version'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getReference($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['reference'])) {
return null;
}

return $installed['versions'][$packageName]['reference'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getRootPackage()
{
$installed = self::getInstalled();

return $installed[0]['root'];
}







public static function getRawData()
{
return self::$installed;
}



















public static function reload($data)
{
self::$installed = $data;
self::$installedByVendor = array();
}





private static function getInstalled()
{
if (null === self::$canGetVendors) {
self::$canGetVendors = method_exists('Composer\Autoload\ClassLoader', 'getRegisteredLoaders');
}

$installed = array();

if (self::$canGetVendors) {
foreach (ClassLoader::getRegisteredLoaders() as $vendorDir => $loader) {
if (isset(self::$installedByVendor[$vendorDir])) {
$installed[] = self::$installedByVendor[$vendorDir];
} elseif (is_file($vendorDir.'/composer/installed.php')) {
$installed[] = self::$installedByVendor[$vendorDir] = require $vendorDir.'/composer/installed.php';
}
}
}

$installed[] = self::$installed;

return $installed;
}
}
