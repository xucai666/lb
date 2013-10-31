<?php

use Doctrine\Common\ClassLoader,
	Doctrine\ORM\Tools\Setup,
	Doctrine\ORM\EntityManager;

/**
 * Doctrine bootstrap library for CodeIgniter
 *
 * @author	Joseph Wynn <joseph@wildlyinaccurate.com>
 * @link	http://wildlyinaccurate.com/integrating-doctrine-2-with-codeigniter-2
 */
//doctrine
/**
 * 调用方式，说明Entity设置表格特征，Proxies目录下的文件自动生成
 */
/**try {
	$this->load->library('doctrine');
	$em = $this->doctrine->em;
	$conn  = $em->getConnection();

	$rs = $em->getRepository('Entity\User')
                 ->findOneBy(array('id' => 1));

} catch (Exception $e) {
	echo $e->getMessage();
}
**/
class Doctrine
{

	public $em;

	public function __construct()
	{
		require_once __DIR__ . '/Doctrine/ORM/Tools/Setup.php';
		Setup::registerAutoloadDirectory(__DIR__);

		// Load the database configuration from CodeIgniter
		require APPPATH . 'config/database.php';

		$connection_options = array(
			'driver'		=> 'pdo_mysql',
			'user'			=> $db['zh']['username'],
			'password'		=> $db['zh']['password'],
			'host'			=> $db['zh']['hostname'],
			'dbname'		=> $db['zh']['database'],
			'charset'		=> $db['zh']['char_set'],
			'driverOptions'	=> array(
				'charset'	=> $db['zh']['char_set'],
			),
		);

		// With this configuration, your model files need to be in application/models/Entity
		// e.g. Creating a new Entity\User loads the class from application/models/Entity/User.php
		$models_namespace = 'Entity';
		$models_path = APPPATH . 'models';
		$proxies_dir = APPPATH . 'models/Proxies';
		$metadata_paths = array(APPPATH . 'models');

		// Set $dev_mode to TRUE to disable caching while you develop
		$dev_mode = true;

		// If you want to use a different metadata driver, change createAnnotationMetadataConfiguration
		// to createXMLMetadataConfiguration or createYAMLMetadataConfiguration.
		$config = Setup::createAnnotationMetadataConfiguration($metadata_paths, $dev_mode, $proxies_dir);
		$this->em = EntityManager::create($connection_options, $config);

		$loader = new ClassLoader($models_namespace, $models_path);
		$loader->register();
	}

}
