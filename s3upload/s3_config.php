<?php

require 'aws-autoloader.php';
//if (!class_exists('S3'))require_once('Aws\S3\S3Client.php');
// Bucket Name
$bucket="iowtest";

//instantiate the class
$s3 = Aws\S3\S3Client::factory(array(
	'key'   	 		=> 		'AKIAIEPJXKZTRQ6DMAOA',
	'secret' 		=> 		'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'
));

//$s3->putObject($bucket, S3::ACL_PUBLIC_READ);

?>
