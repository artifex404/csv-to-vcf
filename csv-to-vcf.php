<?php

require_once __DIR__ . '/vendor/autoload.php';

use JeroenDesloovere\VCard\VCard;
use League\Csv\Reader;

/******* CONFIG *******/

$csv_file_name = "contacts.csv";
$vcf_file_name = "contacts.vcf";

/***** END CONFIG *****/

// Initialize CSV reader
$reader = Reader::createFromPath($csv_file_name);

$i = 0;

$contacts = [];
$str_contacts = "";

// Iterate over CSV contacts
foreach ($reader as $index => $column) {

	if ($i === 0) {
		$i++;
		continue;
	}

	// Initialize VCard
	$vcard = new VCard();

	// Define CSV file columns
	$lastname = $column[0];
	$firstname = $column[4];
	$additional = '';
	$prefix = '';
	$suffix = '';
	$birthday = $column[10];
	$phone = $column[8];
	// END Define CSV file columns

	$vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);
	$vcard->addPhoneNumber($phone, 'PREF;WORK');
	$vcard->addBirthday($birthday);

	$contacts[] = $vcard->getOutput();

	$i++;
}

$str_contacts = implode("", $contacts);

file_put_contents($vcf_file_name, $str_contacts);