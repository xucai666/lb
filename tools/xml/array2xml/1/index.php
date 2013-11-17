<?php

// array sample
$sample = Array
(
    0 => Array
        (
            'Post' => Array
                (
                    'id' => 1,
                    'title' => 'The title',
                    'body' => 'This is the post body.',
                    'created' => '2008-07-28 12:01:06',
                    'modified' => '',
                )
        ),
    1 => Array
        (
            'Post' => Array
                (
                    'id' => 2,
                    'title' => 'A title once again',
                    'body' => 'And the post body follows.',
                    'created' => '2008-07-28 12:01:06',
                    'modified' => '',
					array('fdgs'),
                )
        ),
    2 => Array
        (
            'Post' => Array
                (
                    'id' => 3,
                    'title' => 'Title strikes back',
                    'body' => 'This is really exciting Not.',
                    'created' => '2008-07-28 12:01:06',
                    'modified' => '',
                )
        ),
);

// howto
include ('array2xml.php');

$xml = new arr2xml($sample);
header ("content-type: text/xml");
echo $xml->get_xml();

?>